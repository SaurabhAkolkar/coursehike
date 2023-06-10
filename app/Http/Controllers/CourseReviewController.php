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

    public function instructorRequests(){

        $publishRequest = PublishRequest::with('course')->where(['status'=> 1, 'user_id' => Auth::User()->id])->get();
        $publishRequestResolved = PublishRequest::with('course')->where(['status'=> 0, 'user_id' => Auth::User()->id])->get();

        return view('instructor.requests.index', compact('publishRequest', 'publishRequestResolved'));
    }

    public function deleteCourseRequest(Request $request){

        $request = PublishRequest::where(['user_id'=>Auth::User()->id, 'id'=>$request->request_id])->delete();
        
        return redirect()->back()->with('success','Course request delete successfully.');
    }
}
