<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\PublishRequest;
use Auth;
use Carbon\Carbon;

class CourseReviewController extends Controller
{
    public function index()
    {   
        $requests = PublishRequest::with('course')->where(['status'=>1])->get();
     
    	$course = Course::where('user_id', '!=' ,Auth::User()->id)->get();
        return view('admin.course_review.index',compact('course','requests'));
    }

    public function coursePublish()
    {   
        $requests = PublishRequest::with('course')->where([ 'request_type'=>'publish', 'status'=>1])->get();
    
        $course = Course::where('user_id', '!=' ,Auth::User()->id)->get();
        
        return view('admin.course_review.publishRequest',compact('course','requests'));
    }

    public function courseUnpublish()
    {   
        $requests = PublishRequest::with('course')->where([ 'request_type'=>'unpublish', 'status'=>1])->get();

        $course = Course::where('user_id', '!=' ,Auth::User()->id)->get();
        
        return view('admin.course_review.unpublishRequest',compact('course','requests'));
    }

    public function publishRequestApproval(Request $request){
      
        PublishRequest::where(['status'=>1, 'course_id'=>$request->course_id])->update(['status'=>0]);
        $course = Course::findorfail($request->course_id);
        $course->published = 1;
        $course->updated_at = Carbon::now();
        $course->save();

        return redirect()->back()->with('success','Course Published');
    }

    public function unpublishCourse(Request $request){
      
        $course = Course::findorfail($request->course_id);
        $course->published = 0;
        $course->updated_at = Carbon::now();
        $course->save();

        return redirect()->back()->with('success','Course unpublished.');
    }
}
