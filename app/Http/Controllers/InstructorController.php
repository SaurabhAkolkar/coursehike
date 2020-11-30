<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\CourseChapter;
use App\Instructor;

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
                return redirect()->back()->withErrors(['You are already a mentor.']);
            }
            
            $check = Instructor::where('user_id', Auth::User()->id)->first();
            if($check){
                return redirect()->back()->withErrors(['You already have a request for the becoming a mentor.']);
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

            return redirect('/home');
    }


	
}
