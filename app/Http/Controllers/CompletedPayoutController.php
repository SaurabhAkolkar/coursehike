<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompletedPayout;
use App\User;
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

            $mentor->push($this->payoutCalculate($mentor->id));

            $creator = collect([
                'id' => $mentor->id,
                'name' => $mentor->fname,
                'payout' => $this->payoutCalculate($mentor->id),
            ]);

            $creators[] = $creator;

        }
        dd($creators);
    	return view('admin.revenue.revenue_analytics', compact('payout'));
    }




    public function payoutCalculate($creator_userid)
    {
        
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');

        $watch_logs =  UserWatchTime::whereHas('courses', function($query) use($creator_userid){
            $query->where('user_id', $creator_userid ?? 1);
        })->whereBetween('created_at', [$start->startOfMonth(), $end->endOfMonth()])->get();

        $learners = $watch_logs->unique('user_id')->pluck('user_id')->all();
        $creator_courses = $watch_logs->unique('course_id')->pluck('course_id')->all();

        dd($creator_userid);

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
            $checkUserSubscribedLastMonth = UserSubscriptionInvoice::where([['user_id',$learner],['status','paid']])->whereBetween('end_date', [$start->startOfMonth(), $end->endOfMonth()])->exists();
            dd($checkUserSubscribedLastMonth);
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
