<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\InvoiceDetail;
use App\UserInvoiceDetail;
use App\UserSubscriptionInvoice;
use App\UserWatchTime;
use Carbon\Carbon;
use Cartalyst\Stripe\Stripe;
use DB;
use Illuminate\Support\Facades\Auth;

class InstructorRevenueController extends Controller
{
    public static $REVENUE_POOL = 40;
    public static $LEARNER_PAID = 39;

    public function instructorRevenue(){
        
        $courses = Course::where(['user_id'=>Auth()->user()->id])->pluck('id');

        $invoiceDetails = DB::table('invoice_details as id')
                                ->join('user_invoice_details as uid', 'id.invoice_id', '=', 'uid.id')
                                ->join('courses as c','c.id','=','id.course_id')
                                ->leftJoin('course_chapters as cc','cc.id','=','id.class_id')
                                ->join('users as u','uid.user_id','=','u.id')
                                ->whereIn('id.course_id',$courses)
                                ->where(['uid.status' => 'successful'])
                                ->get(['c.title','uid.sub_total', 'id.id','id.course_id','cc.chapter_name','u.fname','u.lname']);

        $learners = DB::table('user_invoice_details as uid')
                        ->rightJoin('invoice_details as id', 'id.invoice_id', '=', 'uid.id')
                        ->whereIn('id.course_id',$courses)
                        ->where(['uid.status' => 'successful'])
                        ->count('uid.user_id');

        $courses_count = DB::table('invoice_details as id')
                        ->rightJoin('user_invoice_details as uid', 'id.invoice_id', '=', 'uid.id')
                        ->whereIn('id.course_id',$courses)
                        ->where(['id.class_id'=>0])
                        ->where(['uid.status' => 'successful'])
                        ->groupBy('course_id')
                        ->count('course_id');

        $classes = DB::table('invoice_details as id')
                        ->rightJoin('user_invoice_details as uid', 'id.invoice_id', '=', 'uid.id')
                        ->whereIn('id.course_id',$courses)
                        ->where('id.class_id','>' , 0 )
                        ->where(['uid.status' => 'successful'])
                        ->count('course_id');
        
        $total_earning = DB::table('user_invoice_details as uid')
                        ->join('invoice_details as id', 'id.invoice_id', '=', 'uid.id')
                        ->where(['uid.status' => 'successful'])
                        ->sum('uid.sub_total');
        
        $payout = $this->payoutCalculate();

        return view('instructor.revenue.instructorRevenue',compact('invoiceDetails','total_earning','classes','courses_count','learners', 'payout'));
    }

    public function payoutCalculate()
    {

        $stripe = Stripe::make(config('services.stripe.secret'));
        
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');

        $watch_logs =  UserWatchTime::whereHas('courses', function($query){
            $query->where('user_id', Auth::User()->id ?? 1);
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

            // dd(User::find($learner)->subscription('main')->active(),
            // User::find($learner)->subscription('main')->onTrial());
            // $customer = $stripe->customers()->find(User::find($learner)->stripe_id);
            // $subscription = $stripe->subscriptions()->find(User::find($learner)->stripe_id, User::find($learner)->subscribed->stripe_subscription_id);
            // dd($subscription, $customer);

            // If user didn't paid/subscribed last month then skip calculating it...
            $checkUserSubscribedLastMonth = UserSubscriptionInvoice::where([['user_id',$learner],['status','paid']])->whereBetween('end_date', [$start->startOfMonth(), $end->endOfMonth()])->exists();

            if(!$checkUserSubscribedLastMonth)
                continue;

            $totalWatchtime = 0;
            $creatorCourseWatchtime = 0;
            foreach($watch_course as $course_id => $watched_course){

                if(in_array($course_id, $creator_courses))
                    $creatorCourseWatchtime += (count($watched_course) * 3);

                $totalWatchtime += count($watched_course) * 3;
            }
            $creator_watch_share = ($creatorCourseWatchtime * 100) / $totalWatchtime;

            $creatorPoolShare = InstructorRevenueController::$REVENUE_POOL * ($creator_watch_share / 100) ;

            $creator_per_income = InstructorRevenueController::$LEARNER_PAID * ($creatorPoolShare / 100);

            $total_income += $creator_per_income;

            // echo "User:".$learner.
            //         " userTotaltime:".$totalWatchtime.
            //         " creatorCourseWatchtime:".$creatorCourseWatchtime.
            //         " creator_watch_share:".round($creator_watch_share, 1)."%".
            //         " creatorPoolShare:".round($creatorPoolShare, 1)."%".
            //         " creator_per_income: $".round($creator_per_income, 1).
            //          "<br/>";
        }
        $watch_time = $watch_logs->count() * 3;
        return [
            'learners' => $learners,
            'watch_time' => $this->formatSecondsToWord($watch_time),
            'total_income' => $total_income,
        ];
    }

    public function totalWatchTime()
    {

        $watch_logs =  UserWatchTime::whereHas('courses', function($query)
        {
            $query->where('user_id', Auth::User()->id ?? 1); 
        })->get();

        $watch_time = $watch_logs->count() * 3;
        $this->formatSecondsToWord($watch_time);
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
