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
            $instructor_revenue = new InstructorRevenueController();
            $payout = $instructor_revenue->payoutCalculate( Auth::User(), "all");

            $total_earning = $instructor_revenue->payoutCalculateCoursePurchase(Auth::user(), "all");
            return view('instructor.dashboard', compact('payout', 'total_earning'));
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

    public function creatorSignUp(Request $request){
           
            $request->validate([
                'display_name' => 'required|min:3',
                'expert_in' => 'required|min:3',
                'yoe' => 'required',
            ]);
          

            if(Auth::user()->role == "admin" || Auth::user()->role == "mentors" ){
                return 'You are already a mentor.';
            }
            
            // $check = Instructor::where('user_id', Auth::User()->id)->first();
            // if($check){
            //     return 'You already have a request for the becoming a mentor.';
            // }
            
            // if(Auth::user()->dob == "" || Auth::user()->detail == "" || Auth::user()->address =="" || Auth::user()->state_id =="" || Auth::user()->country_id =="" ){
            //     return 'Update your profile to become a creator';
            // }
            $user = Auth::user();
            $portfolio = $request->all_portfolio;
            $portfolio= json_encode(explode(",",$portfolio));
            $awards = $request->all_awards;
            $awards= json_encode(explode(",",$awards));
            $input['user_id'] = $user->id;
            $input['fname'] = $user->fname;
            $input['lname'] = $user->lname;
            $input['dob'] = $user->dob;
            $input['email'] = $user->email;
            $input['gender'] = $user->gender;
            $input['detail'] = $user->detail;
            $input['image'] = $user->user_img;
            $user->role = "mentors";
            $user->save();
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

        
