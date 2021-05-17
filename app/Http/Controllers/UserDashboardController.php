<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\UserInterest;
use App\User;
use App\UserWatchProgress;
use Auth;
use App\UserWatchTimelog;

class UserDashboardController extends Controller
{
    public function index(){

        $userInterest = UserInterest::where(['user_id'=>Auth::User()->id])->pluck('category_id');
        $lastViewed = UserWatchTimelog::with('course', 'course.courseclass','course.user')->where(['user_id'=>Auth::User()->id])->latest()->first();
        $pendingCourse= UserWatchProgress::with('courses','user')->where(['user_id'=>Auth::User()->id])->latest()->groupBy('course_id')->limit(4)->get();
        $courses = [];
        $recentWatchedCourseCompletion = 0;

        if($lastViewed){
            //Total Class Videos
            $lastViewedTotalVideo = $lastViewed->course->courseclass->count();

            // User watched videos
            $lastWatchedCourse = UserWatchProgress::where([ 'course_id'=> $lastViewed->course_id, 'user_id'=>Auth::User()->id ])->get();
            $lastWatchedCourseAvg = $lastWatchedCourse->avg('current_position'); // 60% competed

            $lastWatchedCourseCount = $lastWatchedCourse->count();

            $recentWatchedCourseCompletion = round(abs($lastWatchedCourseAvg / (abs($lastViewedTotalVideo - $lastWatchedCourseCount) + 1)));
        }

        if(count($userInterest)){
            $courses = Course::with('user','category')->where(['status'=>1])->whereIn('category_id', $userInterest)->get();

        }else{
            $courses = Course::with('user','category')->where(['status'=>1])->get();
        }

        return view('learners.pages.user-dashboard', compact('courses','lastViewed', 'recentWatchedCourseCompletion','pendingCourse'));
    }
}
