<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\CourseChapter;
use App\User;
use App\UserWatchTime;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Cartalyst\Stripe\Stripe;
use App\Instructor;
use App\ReviewRating;
use App\UserSubscriptionInvoice;
use Illuminate\Support\Str;
use App\Playlist;
use App\BundleCourse;

class InstructorController extends Controller
{

    public static $REVENUE_POOL = 40;
    public static $LEARNER_PAID = 39;

    public function index()
    {   
        if(Auth::User()->role == "mentors")
        {
            return view('instructor.dashboard');
        }
        else
        {
            return "You're Not a Instructor !";
        }
    }

    public function creatorSignUpPage(){
        $check = null;
        if(Auth::check()){
                $check = Instructor::where('user_id',Auth::user()->id)->first();

        }
        return view('learners.auth.creator-signup',compact('check'));
    }

    public function payoutCalculate()
    {

        $stripe = Stripe::make(config('services.stripe.secret'));
        
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');
        // echo $start->startOfMonth();
        // echo $end->endOfMonth();

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

            // dd(User::find($learner)->subscription()->active(),
            // User::find($learner)->subscription()->onTrial());
            // $customer = $stripe->customers()->find(User::find($learner)->stripe_id);
            // $subscription = $stripe->subscriptions()->find(User::find($learner)->stripe_id, User::find($learner)->subscribed->subscription_id);
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

            $creatorPoolShare = InstructorController::$REVENUE_POOL * ($creator_watch_share / 100) ;

            $creator_per_income = InstructorController::$LEARNER_PAID * ($creatorPoolShare / 100);

            $total_income += $creator_per_income;

            echo "User:".$learner.
                    " userTotaltime:".$totalWatchtime.
                    " creatorCourseWatchtime:".$creatorCourseWatchtime.
                    " creator_watch_share:".round($creator_watch_share, 1)."%".
                    " creatorPoolShare:".round($creatorPoolShare, 1)."%".
                    " creator_per_income: $".round($creator_per_income, 1).
                     "<br/>";
        }
        $watch_time = $watch_logs->count() * 3;

        echo "Total Income: $".$total_income." $watch_time";
        // print_r($learners);
        // dd($watch_logs, $learners_grouped);
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

            echo ($minutes > 1) ? $minutes . "Minutes" : "less than minute";
            return;
        }

        echo $this->number_format_short($hours) . " Hours";
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

    public function creatorSignUp(Request $request){
           
            $request->validate([
                'display_name' => 'required|min:3',
                'expert_in' => 'required|min:3',
                'yoe' => 'required',
            ]);
          

            if(Auth::user()->role == "admin" || Auth::user()->role == "mentors" ){
                return 'You are already a mentor.';
            }
            
            $check = Instructor::where('user_id', Auth::User()->id)->first();
            if($check){
                return 'You already have a request for the becoming a mentor.';
            }
            if(Auth::user()->dob == "" || Auth::user()->address =="" || Auth::user()->state_id =="" || Auth::user()->country_id =="" ){
                return 'Update your profile to become a creator';
            }
            $portfolio = $request->all_portfolio;
            $portfolio= json_encode(explode(",",$portfolio));
            $awards = $request->all_awards;
            $awards= json_encode(explode(",",$awards));
            $input['user_id'] = Auth::user()->id;
            $input['fname'] = Auth::user()->fname;
            $input['lname'] = Auth::user()->lname;
            $input['dob'] = Auth::user()->dob;
            $input['email'] = Auth::user()->email;
            $input['gender'] = Auth::user()->gender;
            $input['detail'] = Auth::user()->detail;
            $input['image'] = Auth::user()->user_img;
            $input['role'] = Auth::user()->role;

            $input['display_name'] = $request->display_name;
            $input['awards'] = $awards;
            $input['portfolio_links'] = $portfolio;
            $input['yoe'] = $request->yoe;
            $input['expert_in'] = $request->expert_in;

            Instructor::create($input);

            return 'Your request has been sent to Admin. Our team will contact you soon.';
    }

    public function allMentors(){

        $mentors = User::where([ ['role', '=', 'mentors'],['status', '=', '1'] ])->get();
        
        return view('learners.pages.mentors',compact('mentors'));

    }

    public function creator($id, $name = null){

        $creator = User::findorfail($id);
        
        $playlists = [];
        if(Auth::check())
            $playlists = Playlist::where('user_id', Auth::user()->id)->get();
        
        if($name == null)
            return redirect()->route('mentor.profile', ['id' => $id, 'name'=> Str::slug($creator->fname.' '.$creator->lname, '-') ]);

        $courses = BundleCourse::with('user')->where(['user_id' => $id, 'status' => 1])->get();
        $classes = Course::with('user','review')->where(['user_id' => $id, 'status' => 1])->get();
        $courses_ids = Course::where('user_id', $id)->pluck('id');
        $rating = ReviewRating::whereIn('course_id', $courses_ids)->avg('rating');
        $awards = count(Instructor::where('user_id', $id)->pluck('awards'));
        
        return view('learners.pages.creator', compact('creator','classes','playlists','courses','rating','awards'));
    }

    public function searchMentor(Request $request){
        define("MENTOR_SEARCH_INPUT", $request->name);
        $role = ['mentors', 'admin'];
        $mentors = User::whereIn('role', $role)
                            ->where(['status'=>'1'])
                            ->where(
                                function ($q) {
                                $q->where('fname','like', '%'.MENTOR_SEARCH_INPUT.'%')->orWhere('lname','like', '%'.MENTOR_SEARCH_INPUT.'%');
                            })->get();
        $inputValue = $request->name;
     
        return view('learners.pages.search_mentor',compact('mentors','inputValue'));
    }
    
}

        
