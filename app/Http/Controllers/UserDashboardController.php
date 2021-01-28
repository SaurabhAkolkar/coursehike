<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\UserInterest;
use App\User;
use Auth;
use App\UserWatchTimelog;

class UserDashboardController extends Controller
{
    public function index(){

        $userInterest = UserInterest::where(['user_id'=>Auth::User()->id])->pluck('category_id');
        $lastViewed = UserWatchTimelog::with('course','course.user')->where(['user_id'=>Auth::User()->id])->orderBy('created_at','DESC')->first();
        if($userInterest){
            $courses = Course::with('user','category')->where(['status'=>1])->whereIn('category_id', $userInterest)->get();
            
        }else{
            $courses = Course::with('user','category')->where(['status'=>1])->get()->limit(6);
        }
       
        return view('learners.pages.user-dashboard', compact('courses','lastViewed'));
    }
}
