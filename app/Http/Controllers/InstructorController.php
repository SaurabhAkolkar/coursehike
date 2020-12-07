<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\CourseChapter;
use App\Instructor;
use App\User;
use App\ReviewRating;

class InstructorController extends Controller
{

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
            if(Auth::user()->dob == "" || Auth::user()->detail =="" || Auth::user()->address =="" || Auth::user()->state_id =="" || Auth::user()->country_id =="" ){
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

            return 1;
    }

    public function allMentors(){

        $mentors = User::where(['role'=>'mentors','status'=>'1'])->get();
        
        return view('learners.pages.mentors',compact('mentors'));

    }

    public function creator($id){
        $creator = User::findorfail($id);
        $courses = Course::with('user','review')->where('user_id', $id)->get();
        $courses_ids = Course::where('user_id', $id)->pluck('id');
        $rating = ReviewRating::whereIn('course_id', $courses_ids)->avg('rating');
        $awards = count(Instructor::where('user_id', $id)->pluck('awards'));
        
        return view('learners.pages.creator', compact('creator','courses','rating','awards'));
    }

    public function searchMentor(Request $request){
        define("MENTOR_SEARCH_INPUT", $request->name);
        $mentors = User::where(['role'=>'mentors','status'=>'1'])
                            ->where(
                                function ($q) {
                                $q->where('fname','like', '%'.MENTOR_SEARCH_INPUT.'%')->orWhere('lname','like', '%'.MENTOR_SEARCH_INPUT.'%');
                            })->get();
        $inputValue = $request->name;
        return view('learners.pages.search_mentor',compact('mentors','inputValue'));
    }
    
}

        
