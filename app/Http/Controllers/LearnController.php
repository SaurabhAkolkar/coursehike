<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\CourseClass;
use App\CourseChapter;
use App\Course;
use Auth;
use Crypt;
use Redirect;
use App\BundleCourse;
use App\WatchCourse;
Use Alert;
use App\Setting;
use Illuminate\Support\Facades\Storage;

class LearnController extends Controller
{
    public function show($id, $slug)
    {
        $course = Course::where('id', $id)->first();

        $related_courses =  Course::whereHas('category', function($query) use($course) 
        {
            $query->where('id', $course->category_id); 
        })->whereNotIn('id', [$course->id])->take(3)->get();

        $mentor_other_courses =  Course::where('user_id', $course->user_id)->whereNotIn('id', [$course->id])->take(3)->get();

        if($course->slug != $slug)
            return redirect()->route('learn.show', ['id' => $id,'slug'=>$course->slug]);

        // Not Logged-In
        // Logged-In
        // In Trial
        // Course Bought
        // Individual Class Bought
        // Subscibed

        $video_access = false;

        if(Auth::check())
        {
        	$order = Order::where('user_id', Auth::User()->id)->where('course_id', $id)->first();

            if( Auth::User()->role == "admin" || 
                (Auth::User()->subscription('main') && Auth::User()->subscription('main')->active()) ||
                !empty( $order) )
            {
                $video_access = true;
            }
        }

        $data = array(
            'video_access'=> $video_access,
            'course'=> $course,
            'related_courses'=> $related_courses,
            'mentor_other_courses'=> $mentor_other_courses,
        );
        return view('learners.pages.course')->with($data);

    }

    public function video($video_id)
    {
        $class_video = CourseClass::where('id', $video_id)->first();
        if(Auth::check() || $class_video->is_preview == '1')
        {
            if(Auth::check())
        	    $order = Order::where('user_id', Auth::User()->id)->where('course_id', $class_video->course_id)->first();

            if(
                $class_video->is_preview == '1' || 
                $class_video->courses->package_type == '0' ||
                (Auth::check() && ( Auth::User()->role == "admin" || 
                (Auth::User()->subscription('main') && Auth::User()->subscription('main')->active()) ||
                !empty($order) )) 
            )
            {
                $response = array(
                    'status' => 'success',
                    'data' => [
                        'title' => $class_video->title,
                        'url' => $class_video->getSignedStreamURL(),
                        'poster' => $class_video->image,
                        'subtitles' => $class_video->subtitle,
                        'audio_tracks' => $class_video->audio,
                    ],
                );
                return response()->json($response, 200);
            }
        }

        $response = array(
            'status' => 'failed'
        );

        return response()->json($response, 400);
    }


    public function watchclass($id)
    {
        $class = CourseClass::where('id',$id)->first();

        $courses = Course::where('id', $class->course_id)->first();

        if(Auth::check())
        { 

            $order = Order::where('user_id', Auth::User()->id)->where('course_id', $courses->id)->first();

            $gsetting = Setting::first();

            $bundle = Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

            $course_id = array();

            foreach($bundle as $b)
            {
               $bundle = BundleCourse::where('id', $b->bundle_id)->first();
                array_push($course_id, $bundle->course_id);
            }

            $course_id = array_values(array_filter($course_id));

            $course_id = array_flatten($course_id);


            if(Auth::User()->role == "admin")
            {
                return view('classwatch',compact('class'));
            }
            else
            {
                if(!empty($order))
                {

                    $coursewatch = WatchCourse::where('course_id','=',$courses->id)->where('user_id', Auth::User()->id)->first();


                    if($gsetting->device_control == 1)
                    {

                        if(!$coursewatch)
                        {

                            $watching = WatchCourse::create([
                                'user_id'    => Auth::user()->id,
                                'course_id'  => $courses->id,
                                'start_time' => \Carbon\Carbon::now()->toDateTimeString(),
                                'active'     => '1',
                                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                ]
                            );

                            return view('classwatch',compact('class'));

                        }
                        else{
                          
                            if($coursewatch->active == 0){

                               
                                $coursewatch->active = 1;
                                $coursewatch->save();
                                return view('classwatch',compact('class'));
                            }
                            else{

                                Alert::error('Active', 'User Already Watching Course !!');
                                return back(); 
                            }

                        }
                    }
                    else{
                        return view('classwatch',compact('class'));
                    }
                   
                }
                elseif(isset($course_id) && in_array($courses->id, $course_id))
                {
                    return view('classwatch',compact('class'));
                }
                else
                {
                    return back()->with('delete', '401 Unauthorized Action !');
                }
            }

        }
        return Redirect::route('login')->withInput()->with('delete', 'Please Login to access restricted area.');
    }

    public function view($url, $course_id)
    {
        $course = $course_id;
        $url = Crypt::decrypt($url);

        if(Auth::check())
        { 

            $order = Order::where('user_id', Auth::User()->id)->where('course_id', $course)->first();

            $gsetting = Setting::first();

            $bundle = Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

            $course_id = array();

            foreach($bundle as $b)
            {
               $bundle = BundleCourse::where('id', $b->bundle_id)->first();
                array_push($course_id, $bundle->course_id);
            }

            $course_id = array_values(array_filter($course_id));

            $course_id = array_flatten($course_id);


            if(Auth::User()->role == "admin")
            {
                return view('iframe',compact('url', 'course'));
            }
            elseif(isset($course_id) && in_array($course, $course_id))
            {
                return view('iframe',compact('url', 'course'));
            }
            else
            {
                if(!empty($order))
                { 
                    return view('iframe',compact('url', 'course'));
                }
                else
                {
                    return back()->with('delete', '401 Unauthorized Action !');
                }
            }

        }
        return Redirect::route('login')->withInput()->with('delete', 'Please Login to access restricted area.');
        
    }

    public function lightbox($id)
    {
        $class = CourseClass::where('id',$id)->first();
        
        return view('lightbox',compact('class'));
    }


    public function audioclass($id)
    {
        $class = CourseClass::where('id',$id)->first();

        $courses = Course::where('id', $class->course_id)->first();


        if(Auth::check())
        { 

            $order = Order::where('user_id', Auth::User()->id)->where('course_id', $courses->id)->first();

            $gsetting = Setting::first();

            $bundle = Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

            $course_id = array();

            foreach($bundle as $b)
            {
               $bundle = BundleCourse::where('id', $b->bundle_id)->first();
                array_push($course_id, $bundle->course_id);
            }

            $course_id = array_values(array_filter($course_id));

            $course_id = array_flatten($course_id);


            if(Auth::User()->role == "admin")
            {
                return view('audioclass',compact('class'));
            }
            else
            {
                if(!empty($order))
                {

                    $coursewatch = WatchCourse::where('course_id','=',$courses->id)->where('user_id', Auth::User()->id)->first();


                    if($gsetting->device_control == 1)
                    {

                        if(!$coursewatch)
                        {

                            $watching = WatchCourse::create([
                                'user_id'    => Auth::user()->id,
                                'course_id'  => $courses->id,
                                'start_time' => \Carbon\Carbon::now()->toDateTimeString(),
                                'active'     => '1',
                                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                                ]
                            );

                            return view('audioclass',compact('class'));

                        }
                        else{
                          
                            if($coursewatch->active == 0){

                               
                                $coursewatch->active = 1;
                                $coursewatch->save();
                                return view('audioclass',compact('class'));
                            }
                            else{

                                Alert::error('Active', 'User Already Watching Course !!');
                                return back(); 
                            }

                        }
                    }
                    else{
                        return view('audioclass',compact('class'));
                    }
                    
                }
                elseif(isset($course_id) && in_array($courses->id, $course_id))
                {
                    return view('audioclass',compact('class'));
                }
                else
                {
                    return back()->with('delete', '401 Unauthorized Action !');
                }
            }

        }
        return Redirect::route('login')->withInput()->with('delete', 'Please Login to access restricted area.');
    }

   
}
