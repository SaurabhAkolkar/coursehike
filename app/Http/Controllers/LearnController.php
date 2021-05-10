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
use App\CartItem;
use App\ReviewRating;
use App\WatchCourse;
use App\Playlist;
Use Alert;
use App\Setting;
use App\UserPurchasedCourse;
use Illuminate\Support\Facades\Storage;
use Debugbar;
use PDF;
use Carbon\Carbon;
use App\CourseLanguage;
use App\Categories;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;

class LearnController extends Controller
{
    public function show($id, $slug)
    {
       
        if($id < 1000)
            return redirect('/learn/class/'.$id.'/'.$slug);

        $playlists = [];     
          
        $course = BundleCourse::where('id', $id)->first();
        
        $related_courses =  BundleCourse::where('category_id', $course->category_id)->where('status', 1)->where('id','!=', $course->id)->take(3)->get();

        $mentor_other_courses =  BundleCourse::where('user_id', $course->user_id)->where('status', 1)->where('id','!=', $course->id)->take(3)->get();

        $course_slug = Str::slug($course->title, '-');
        if($course_slug != $slug)
            return redirect()->route('learn.course', ['id' => $id, 'slug' => $course_slug]);

        $video_access = false;
        $class_access = false;
        $in_cart = null;
        // $order_type = null;

        if(Auth::check())
        {
        	$order = $course->isPurchased();
            
            if( Auth::User()->role == "admin" || 
                (Auth::User()->subscription() && Auth::User()->subscription()->active()) ||
                !empty( $order) )
            {
                // TODO: Verify the Order Purchased and Subscription area
                $video_access = true;
                if($order && $order->purchase_type == 'all_classes')
                    $class_access = 1;
                elseif($order && $order->purchase_type == 'selected_classes')
                    $class_access = json_decode($order->class_id);
            }

            // $cart = Cart::where(['user_id' => Auth::User()->id, 'status' => 1])->first();
            // if($cart){
            //     $in_cart = CartItem::where(['cart_id' => $cart->id, 'course_id' => $id])->get();
             
            //     if(count($in_cart) > 0){
            //         foreach($in_cart as $a){
                        
            //             if($a->purchase_type == 'all_classes'){
            //                 $order_type = 'all_classes';
            //             }
            //             if($a->purchase_type == 'selected_classes'){
            //                 $order_type = 'selected_classes';
            //             }
            //         }
            //     }
            // }

        }

        $reviews = $course->reviews()->sortByDesc('rating');
        if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
		}
        // $average_rating = $course->review->average('rating');
        $average_rating = $course->average_rating;
       
        $total_rating = $course->reviews()->count() > 0 ? $course->reviews()->count() : 1 ;

        $five_rating_percentage= round(100*$course->reviews()->where('rating',5)->count()/$total_rating);
        $four_rating_percentage =  round(100*$course->reviews()->where('rating',4)->count()/$total_rating);
        $three_rating_percentage = round(100*$course->reviews()->where('rating',3)->count()/$total_rating);
        $two_rating_percentage = round(100*$course->reviews()->where('rating',2)->count()/$total_rating);
        $one_rating_percentage = round(100*$course->reviews()->where('rating',1)->count()/$total_rating);

        $subscription_rate = '$39';
        if (getLocation() == 'IN')
            $subscription_rate = '₹2999';
        
        $data = array(
            'video_access'=> $video_access,
            'class_access' => $class_access,
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
            // 'order_type'=>$order_type,
            'subscription_rate'=>$subscription_rate,
            'playlists'=>$playlists
        );


        return view('learners.pages.course')->with($data);

    }

    public function class($id, $slug)
    {
        $playlists = [];       
        $course = Course::with('chapter', 'courseclass', 'review','review.user')->where('id', $id)->first();

        $related_courses =  Course::whereHas('category', function($query) use($course) 
        {
            $query->where('id', $course->category_id); 
        })->where('status', 1)->whereNotIn('id', [$course->id])->take(3)->get();

        $mentor_other_courses =  Course::where('user_id', $course->user_id)->where('status', 1)->whereNotIn('id', [$course->id])->take(3)->get();

        $course_slug = Str::slug($course->title, '-');
        if($course_slug != $slug)
            return redirect()->route('learn.course', ['id' => $id, 'slug' => $course_slug]);

        $video_access = false;
        $class_access = false;
        $in_cart = null;
        // $order_type = null;

        if(Auth::check())
        {
        	$order = $course->isPurchased();
            
            if( Auth::User()->role == "admin" || 
                (Auth::User()->subscription() && Auth::User()->subscription()->active()) ||
                !empty( $order) )
            {
                // TODO: Verify the Order Purchased and Subscription area
                $video_access = true;
                if($order && $order->purchase_type == 'all_classes')
                    $class_access = 1;
                elseif($order && $order->purchase_type == 'selected_classes')
                    $class_access = json_decode($order->class_id);
            }

            // $cart = Cart::where(['user_id' => Auth::User()->id, 'status' => 1])->first();
            // if($cart){
            //     $in_cart = CartItem::where(['cart_id' => $cart->id, 'course_id' => $id])->get();
             
            //     if(count($in_cart) > 0){
            //         foreach($in_cart as $a){
                        
            //             if($a->purchase_type == 'all_classes'){
            //                 $order_type = 'all_classes';
            //             }
            //             if($a->purchase_type == 'selected_classes'){
            //                 $order_type = 'selected_classes';
            //             }
            //         }
            //     }
            // }

        }

        $reviews = $course->review->sortByDesc('rating');
        if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
		}
        // $average_rating = $course->review->average('rating');
        $average_rating = $course->average_rating;
        $total_rating = $course->review->count() > 0 ? $course->review->count() : 1 ;

        $five_rating_percentage= round(100*$course->review->where('rating',5)->count()/$total_rating);
        $four_rating_percentage =  round(100*$course->review->where('rating',4)->count()/$total_rating);
        $three_rating_percentage = round(100*$course->review->where('rating',3)->count()/$total_rating);
        $two_rating_percentage = round(100*$course->review->where('rating',2)->count()/$total_rating);
        $one_rating_percentage = round(100*$course->review->where('rating',1)->count()/$total_rating);

        $subscription_rate = '$39';
        if (getLocation() == 'IN')
            $subscription_rate = '₹2999';
        
        $data = array(
            'video_access'=> $video_access,
            'class_access' => $class_access,
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
            // 'order_type'=>$order_type,
            'subscription_rate'=>$subscription_rate,
            'playlists'=>$playlists
        );


        return view('learners.pages.class')->with($data);

    }

    public function video($video_id)
    {
        $class_video = CourseClass::where('id', $video_id)->first();
        if(Auth::check() || $class_video->is_preview == '1')
        {
            if(Auth::check()){
                // $have_purchased = UserPurchasedCourse::where('user_id', Auth::User()->id)->where('course_id', $class_video->course_id)->whereJsonContains('class_id', [(int)$video_id])->exists();
                // $course = UserPurchasedCourse::where('user_id', Auth::User()->id)->where('course_id', $class_video->course_id)->first();
                
                $course = UserPurchasedCourse::where(['course_id'=> $class_video->course_id , 'user_id'=> Auth::User()->id])
                                ->orWhere( function($query) use ($class_video) {
                                    // Accept int datatype
                                    $query->whereJsonContains( 'class_id', (int) $class_video->course_id )
                                        ->where('user_id', '=', Auth::User()->id);
                                })
                                ->orWhere( function($query) use ($class_video) {
                                    // Accept String datatype
                                    $query->whereJsonContains( 'class_id', $class_video->course_id.'' )
                                        ->where('user_id', '=', Auth::User()->id);
                                })->firstOr(function () {
                                    return null;
                                });
                if($course){
                    $have_purchased = true;
                }else
                    $have_purchased = false;
            }
            
            if(
                $class_video->is_preview == '1' || 
                $class_video->courses->package_type == '0' ||
                (Auth::check() && ( Auth::User()->role == "admin" || 
                (Auth::User()->subscription() && Auth::User()->subscription()->active()) ||
                $have_purchased ))
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

   

   
    public function downloadCertificate($id){
        
        $course = Course::with('user')->findorfail($id);
        $learner_name = Auth::User()->fname.' '.Auth::User()->lname;
        $date = Carbon::now()->isoFormat('D/M/YYYY'); 
        $mentor = $course->user->fname.' '.$course->user->lname;
        $pdf = PDF::loadView('learners.pages.courseCertificate', compact('course','learner_name','mentor','date'))->setPaper('A4','landscape');
        return $pdf->stream('certificate.pdf');
        

    }
}
