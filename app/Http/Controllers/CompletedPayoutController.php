<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompletedPayout;
use App\User;
use App\UserPurchasedCourse;
use App\UserSubscriptionInvoice;
use App\UserWatchTime;
use Auth;
use Carbon\Carbon;

class CompletedPayoutController extends Controller
{
    public function show()
    {
        if(Auth::user()->role == 'admin' )
        {
        	$payout = CompletedPayout::get();
        }
        else
        {
            $payout = CompletedPayout::where('user_id', Auth::User()->id)->get();
        }
    	return view('admin.revenue.completed', compact('payout'));
    }

    public function view($id)
    {
    	$payout = CompletedPayout::where('id', $id)->first();
    	return view('admin.revenue.view', compact('payout'));
    }

    public function analytics()
    {
        $mentors = User::where([['role','mentors'],['status','1']])->get();

        $creators = array();
        foreach ($mentors as $mentor) {

            // $mentor->push($this->payoutCalculate($mentor->id));

            $creator = [
                'id' => $mentor->id,
                'name' => $mentor->fname,
                'email' => $mentor->email,
                'payout' => $this->payoutCalculate($mentor),
                'month' => Carbon::now()->subMonth()->format('F'),
                'year' => Carbon::now()->subMonth()->format('Y'),
            ];

            $creators[] = $creator;

        }

        // dd($creators);
        
    	return view('admin.revenue.revenue_analytics', compact('creators'));
    }


    public function payoutCalculate($creator)
    {
        $creator_userid = $creator->id;
        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');

        $watch_logs =  UserWatchTime::whereHas('courses', function($query) use($creator_userid){
            $query->where('user_id', $creator_userid);
        })->whereBetween('created_at', [$start->startOfMonth(), $end->endOfMonth()])->get();

        $learners = $watch_logs->unique('user_id')->pluck('user_id')->all();
        $creator_courses = $watch_logs->unique('course_id')->pluck('course_id')->all();

        $learners_grouped = UserWatchTime::whereIn('user_id', $learners)
        ->whereBetween('created_at', [$start->startOfMonth(), $end->endOfMonth()])->get()
        ->groupBy([
            'user_id',
            function ($item,$key) {
                return $item['course_id'];
            },
        ], true)->toArray();

        $total_income = 0;
        foreach($learners_grouped as $learner => $watch_course){

            // If user didn't paid/subscribed last month then skip calculating it...
            $UserSubscribedLastMonth = UserSubscriptionInvoice::where([['user_id',$learner],['status','paid']])->whereBetween('end_date', [$start->startOfMonth(), $end->endOfMonth()])->latest()->first();
            $UserSubscribedYearly = UserSubscriptionInvoice::where([['user_id',$learner],['status','paid']])->where(function($query) use ($start, $end)
            {   $query->where('start_date', '<=', $start->startOfMonth() );
                $query->where('end_date', '>', $end->endOfMonth() );
            })->latest()->first();

            if(!$UserSubscribedLastMonth && !$UserSubscribedYearly)
                continue;

            $totalWatchtime = 0;
            $creatorCourseWatchtime = 0;
            foreach($watch_course as $course_id => $watched_course){

                if(in_array($course_id, $creator_courses))
                    $creatorCourseWatchtime += (count($watched_course) * InstructorRevenueController::$WATCHTIME_LOG_SECONDS);

                $totalWatchtime += count($watched_course) * InstructorRevenueController::$WATCHTIME_LOG_SECONDS;
            }
            $creator_watch_share = ($creatorCourseWatchtime * 100) / $totalWatchtime;

            $creatorPoolShare = InstructorRevenueController::$REVENUE_POOL * ($creator_watch_share / 100) ;

            $user_paid = 39;

            if($UserSubscribedLastMonth){
                $user_paid = $UserSubscribedLastMonth->invoice_paid;
                if($UserSubscribedLastMonth->invoice_currency == 'INR')
                    $user_paid /= 75; //Convert to USD
            }else{
                $d1 = new DateTime($UserSubscribedYearly->start_date, new DateTimeZone('Europe/London'));
                $d2 = new DateTime($UserSubscribedYearly->end_date, new DateTimeZone('Europe/London'));
                $diffInMonths = ($d2->diff($d1))->m;

                $$user_paid = ($UserSubscribedYearly->invoice_paid / $diffInMonths );
                if($UserSubscribedYearly->invoice_currency == 'INR')
                    $user_paid /= 75; //Convert to USD
            }

            $creator_per_income = $user_paid * ($creatorPoolShare / 100);

            $total_income += $creator_per_income;

        }
        $watch_time = $watch_logs->count() * InstructorRevenueController::$WATCHTIME_LOG_SECONDS;

        return [
            'learners' => $learners,
            'watch_time' => $this->formatSecondsToWord($watch_time),
            'subscribers_total_income' => $total_income,
            'course_sale' => $this->payoutCalculateCoursePurchase($creator),
        ];
    }

    public function payoutCalculateCoursePurchase($creator)
    {
        
        $creator_userid = $creator->id;
        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');

        $purchase_logs =  UserPurchasedCourse::whereHas('course', function($query) use($creator_userid){
            $query->where('user_id', $creator_userid ?? 1);
        })->whereBetween('created_at', [$start->startOfMonth(), $end->endOfMonth()])->get();

        $purchase_logs = $purchase_logs->unique('order_id')->all();

        $total_income = 0;
        foreach($purchase_logs as $purchase){

            // If user didn't paid/subscribed last month then skip calculating it...
            $purchase_order = $purchase->user_invoice_details;
            
            if($purchase_order->status != "paid")
                continue;

            $order_total = $purchase_order->total;

            $CREATOR_SHARE = InstructorRevenueController::$CREATOR_COMMISSION * ($order_total / 100);

            $total_income += $CREATOR_SHARE;

        }
        return [
            'total_income' => $total_income,
            'count' => count($purchase_logs),
        ];
    }

    public function formatSecondsToWord($seconds)
    {
        $hours = floor(($seconds) / 3600);

        if($hours <= 0){
            $minutes = floor(($seconds / 60) % 60);

            return ($minutes > 1) ? $minutes . "Minutes" : $seconds. " seconds";
        }

        return $this->number_format_short($hours) . " Hours";
    }

    public function number_format_short( $n ) {
        if ($n > 0 && $n < 1000) {
            // 1 - 999
            $n_format = floor($n);
            $suffix = '+';
        } else if ($n >= 1000 && $n < 1000000) {
            // 1k-999k
            $n_format = floor($n / 1000);
            $suffix = 'K+';
        } else if ($n >= 1000000 && $n < 1000000000) {
            // 1m-999m
            $n_format = floor($n / 1000000);
            $suffix = 'M+';
        } else if ($n >= 1000000000 && $n < 1000000000000) {
            // 1b-999b
            $n_format = floor($n / 1000000000);
            $suffix = 'B+';
        } else if ($n >= 1000000000000) {
            // 1t+
            $n_format = floor($n / 1000000000000);
            $suffix = 'T+';
        }
    
        return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
    }
}
