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
use App\Cart;
use App\ReviewRating;
use App\WatchCourse;
use App\Playlist;
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
        $in_cart = null;
        if(Auth::check())
        {
        	$order = Order::where('user_id', Auth::User()->id)->where('course_id', $id)->first();

            if( Auth::User()->role == "admin" || 
                (Auth::User()->subscription('main') && Auth::User()->subscription('main')->active()) ||
                !empty( $order) )
            {
                $video_access = true;
            }

            $in_cart = Cart::where('user_id', Auth::User()->id)->where('course_id', $id)->get();

        }
        $reviews = ReviewRating::with('user')->where('course_id',$id)->orderBy('rating','DESC')->get();
        $average_rating = ReviewRating::where('course_id',$id)->average('rating');
        $five_rating_percentage= round(100*ReviewRating::where(['course_id'=>$id,'rating'=>5])->count()/count($reviews));
        $four_rating_percentage =  round(100*ReviewRating::where(['course_id'=>$id,'rating'=>4])->count()/count($reviews));
        $three_rating_percentage = round(100*ReviewRating::where(['course_id'=>$id,'rating'=>3])->count()/count($reviews));
        $two_rating_percentage = round(100*ReviewRating::where(['course_id'=>$id,'rating'=>2])->count()/count($reviews));
        $one_rating_percentage = round(100*ReviewRating::where(['course_id'=>$id,'rating'=>1])->count()/count($reviews));

        $data = array(
            'video_access'=> $video_access,
            'course'=> $course,
            'related_courses'=> $related_courses,
            'mentor_other_courses'=> $mentor_other_courses,
            'reviews'=>$reviews,
            'average_rating'=> round($average_rating,2),
            'five_rating_percentage' => $five_rating_percentage,
            'four_rating_percentage' => $four_rating_percentage,
            'three_rating_percentage' => $three_rating_percentage,
            'two_rating_percentage' => $two_rating_percentage,
            'one_rating_percentage' => $one_rating_percentage,
            'in_cart'=>$in_cart,

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

    public function searchCourse(Request $request){
        
        $input['course_name'] = $request->course_name;

        $courses = Course::where('title','like','%'.$input['course_name'].'%')->where('featured',1)->get();
        $playlists = [];
		if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
        }	
        $search_input = $input['course_name'];
        return view('learners.pages.search_courses', compact('courses','playlists','search_input'));
    }

   
}
