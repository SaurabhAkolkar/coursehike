<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use DB;
use Image;
use App\CourseInclude;
use App\WhatLearn;
use App\CourseChapter;
use App\RelatedCourse;
use App\CourseClass;
use App\CourseResource;
use App\Categories;
use App\User;
use App\Wishlist;
use App\ReviewRating;
use App\Question;
use App\Announcement;
use App\Order;
use App\Answer;
use App\Cart;
use App\CartItem;
use App\ReportReview;
use App\SubCategory;
use Session;
use App\QuizTopic;
use App\Quiz;
use Auth;
use Redirect;
use App\BundleCourse;
use App\CourseProgress;
use App\Adsense;
use App\Assignment;
use App\Appointment;
use App\BBL;
use App\Meeting;
use App\PublishRequest;
use App\Currency;
use App\MasterClass;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $course = Course::all();
        $coursechapter = CourseChapter::all()->sortByDesc('id');
           
        return view('admin.course.index', compact("course", 'coursechapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $category = Categories::all();
        $user =  User::where(['role' => 'mentors'])->orWhere(['role'=>'admin'])->get();
        $course = Course::all();
        $coursechapter = CourseChapter::all();
        return view('admin.course.insert', compact("course", 'coursechapter', 'category', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
 
        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'title' => 'required',
            'short_detail' => 'required',
            'detail' => 'required',
            'preview_image'=>'required',
            'language_id'=>'required',
            'requirement'=>'required',
            'video' => 'mimes:mp4,avi,wmv',
            // 'slug' => 'required|unique:courses,slug',
        ]);

        $input = $request->all();

        $data = Course::create($input);
        $data->package_type = $request->package_type;


        if ($file = $request->file('preview_image')) {
            // $photo = Image::make($file)->fit(600, 360, function ($constraint) {
            //     $constraint->upsize();
            // })->encode('jpg', 70);

            $file_name = time().rand().'.'.$file->getClientOriginalExtension();
            Storage::put(config('path.course.img').$file_name, fopen($file->getRealPath(), 'r+') );
            $data->preview_image = $file_name;

        }
                  
        if ($file = $request->file('preview_video')) {

            $file_name = time().rand().'.'.$file->getClientOriginalExtension();

            Storage::put(config('path.course.preview_video').$file_name, fopen($file->getRealPath(), 'r+') );
            $data->preview_video = $file_name;

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
                'url' => Storage::temporaryUrl(config('path.course.preview_video'). $file_name, now()->addMinutes(10)),
                'meta' => [
                    'name' => $file_name
                ],
                "requireSignedURLs" => true,
            ]);
            
            if($response->successful()){
                $res = $response->json();
                $data->stream_video = $res['result']['uid'];
            }
        }

        $data->slug = Str::slug($request->title, '-');
        $data->status = 0;
        

        $data->save();

        return redirect('course');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cor = Course::find($id);
        
        return view('admin.course.editcor', compact('cor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */

    public function edit(course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
          'title' => 'required',
          'video' => 'mimes:mp4,avi,wmv'
        ]);

        if($request->master_class){
            $check = MasterClass::where('course_id', $id)->first();
            if(!$check){
                MasterClass::create(['course_id' => $id]);
            }
        }else{
            MasterClass::where('course_id', $id)->delete(); 
        }
        
        $course = Course::findOrFail($id);
        $input = $request->all();
  
        $course->package_type = $request->package_type;

        
        if ($file = $request->file('preview_image')) {
            if ($course->preview_image != null) {
                $exists = Storage::exists(config('path.course.img').$course->preview_image);
                if ($exists)
                    Storage::delete(config('path.course.img').$course->preview_image);
            }

            $file_name = time().rand().'.'.$file->getClientOriginalExtension();

            Storage::put(config('path.course.img').$file_name, fopen($file->getRealPath(), 'r+') );
            $input['preview_image'] = $file_name;
        }

        if ($file = $request->file('preview_video')) {
            if ($course->preview_video != "") {
                $exists = Storage::exists(config('path.course.preview_video').$course->preview_video);
                if ($exists){
                    Storage::delete(config('path.course.preview_video').$course->preview_video);

                    Http::withHeaders([
                        'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                        'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
                    ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'.$course->stream_video);
                }
            }

            $file_name = basename(Storage::putFile(config('path.course.preview_video'), $file ));
            $input['preview_video'] = $file_name;

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
                'url' => Storage::temporaryUrl(config('path.course.preview_video'). $file_name, now()->addMinutes(10)),
                'meta' => [
                    'name' => $file_name
                ],
                "requireSignedURLs" => true,
            ]);
            
            if($response->successful()){
                $res = $response->json();
                $course->stream_video = $input['stream_video'] = $res['result']['uid'];
            }

        }
        
        
        if(($course->status == '0' || $course->status == '2') && $input['status'] == '1' ){
            PublishRequest::where(['status'=>'1', 'request_type' => 'publish','course_id'=> $id ])->update(['status'=>0]);
            
         }
         if(($input['status'] == '0' || $input['status'] == '2') && $course->status == '1' ){
             PublishRequest::where(['status'=>1, 'request_type' => 'unpublish','course_id'=> $id ])->update(['status'=>0]);
     
         }  

       
        CartItem::where('course_id', $id)
         ->update([
             'price' => $request->price,
             'offer_price' => $request->discount_price,
          ]);

        $course->update($input);
        
        return back()->with('success', 'Updated Successfully !');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('course_id', $id)->get();

        if (config('app.demolock') == 0) {
            if (!$order->isEmpty()) {
                return back()->with('delete', 'Users are Enrolled in Course');
            } else {
                $course = Course::find($id);
          
                if ($course->preview_image != null) {
                    $exists = Storage::exists(config('path.course.img').$course->preview_image);
                    if ($exists)
                        Storage::delete(config('path.course.img').$course->preview_image);
                }
                if ($course->video != null) {
                    $exists = Storage::exists(config('path.course.preview_video').$course->preview_video);
                    if ($exists)
                        Storage::delete(config('path.course.preview_video').$course->preview_video);
                }

                $value = $course->delete();


                Wishlist::where('course_id', $id)->delete();
                CartItem::where('course_id', $id)->delete();
                ReviewRating::where('course_id', $id)->delete();
                Question::where('course_id', $id)->delete();
                Answer::where('course_id', $id)->delete();
                Announcement::where('course_id', $id)->delete();
                CourseInclude::where('course_id', $id)->delete();
                WhatLearn::where('course_id', $id)->delete();
                CourseChapter::where('course_id', $id)->delete();
                RelatedCourse::where('course_id', $id)->delete();
                CourseClass::where('course_id', $id)->delete();
          
                return back()->with('delete', 'Course is Deleted');
            }
        } else {
            return back()->with('delete', 'You can\'t delete Courses in Demo');
        }
    }

    public function upload_info(Request $request)
    {
        $id = $request['catId'];
        $category = Categories::findOrFail($id);
        $upload = $category->subcategory->where('category_id', $id)->pluck('title', 'id')->all();

        return response()->json($upload);
    }


    public function gcato(Request $request)
    {
        $id = $request['catId'];

        $subcategory = SubCategory::findOrFail($id);
        $upload = $subcategory->childcategory->where('subcategory_id', $id)->pluck('title', 'id')->all();

        return response()->json($upload);
    }

    public function showCourse($id)
    {
        $course = Course::all();
        
        $cor = Course::with('user')->findOrFail($id);
        $categories = Categories::where('status',1)->pluck('title','id');
        $publisRequest = PublishRequest::where(['status' => 1, 'course_id' => $id, 'user_id' => Auth::User()->id])->first();
        $users =  User::where(['role' => 'mentors'])->orWhere(['role'=>'admin'])->get();
        $check_master_class = MasterClass::where(['course_id'=>$id])->first();

        $courseinclude = CourseInclude::where('course_id', '=', $id)->get();
        $coursechapter = CourseChapter::where('course_id', '=', $id)->get();
        $whatlearns = WhatLearn::where('course_id', '=', $id)->get();
        $coursechapters = CourseChapter::where('course_id', '=', $id)->get();
        $relatedcourse = RelatedCourse::where('main_course_id', '=', $id)->get();
        $courseclass = CourseClass::where('course_id', '=', $id)->orderBy('position', 'ASC')->get();
        $courseresources = CourseResource::where('course_id', '=', $id)->get();
        $announsments = Announcement::where('course_id', '=', $id)->get();
        $reports = ReportReview::where('course_id', '=', $id)->get();
        $questions = Question::where('course_id', '=', $id)->get();
        $answers = Answer::where('course_id', '=', $id)->get();
        $quizes = Quiz::where('course_id', '=', $id)->get();
        $topics = QuizTopic::where('course_id', '=', $id)->get();
        $appointment = Appointment::where('course_id', '=', $id)->get();
        return view('admin.course.show', compact('cor', 'users','course', 'categories', 'publisRequest','courseinclude', 'whatlearns', 'coursechapters', 'coursechapter', 'check_master_class','relatedcourse', 'courseclass', 'courseresources', 'announsments', 'answers', 'reports', 'questions', 'quizes', 'topics', 'appointment'));
    }


    public function sendToPublish(Request $request){
        $check = PublishRequest::where(['course_id'=> $request->course_id , 'user_id' => Auth::User()->id , 'request_type'=>'publish','status' => 1])->first();
  
        if($check){
            return redirect()->back()->with('success','Course has already sent for publish approval.');
        }

        PublishRequest::create(['course_id' => $request->course_id, 'user_id' => Auth::User()->id, 'request_type'=>'publish','status' => 1 ]);

        return redirect()->back()->with('success','Course has been sent for publish approval.');
    }

    public function sendToUnPublish(Request $request){

        $check = PublishRequest::where(['course_id'=> $request->course_id ,  'user_id' => Auth::User()->id , 'request_type'=>'unpublish','status' => 1])->first();
  
        if($check){
            return redirect()->back()->with('success','Course has already sent for unpublish unapproval.');
        }

        PublishRequest::create(['course_id' => $request->course_id, 'user_id' => Auth::User()->id, 'request_type'=>'unpublish', 'status' => 1]);

        return redirect()->back()->with('success','Course has been sent for  unpublish unapproval.');
    }


    public function CourseDetailPage($id, $slug)
    {
        $course = Course::findOrFail($id);
       
        $courseinclude = CourseInclude::where('course_id', '=', $id)->get();
        $whatlearns = WhatLearn::where('course_id', '=', $id)->get();
        $coursechapters = CourseChapter::where('course_id', '=', $id)->get();
        $relatedcourse = RelatedCourse::where('main_course_id', '=', $id)->get();
        $coursereviews = ReviewRating::where('course_id', '=', $id)->get();
        $courseclass = CourseClass::orderBy('position', 'ASC')->get();
        $reviews = ReviewRating::where('course_id', '=', $id)->get();
        $bundle_check = BundleCourse::first();

        $currency = Currency::first();

        $bigblue = BBL::where('course_id', '=', $id)->get();

        $meetings = Meeting::where('course_id', '=', $id)->get();

        $ad = Adsense::first();

        if (Auth::check()) {
            $order = Order::where('user_id', Auth::User()->id)->where('course_id', $id)->first();
            $wish = Wishlist::where('user_id', Auth::User()->id)->where('course_id', $id)->first();
            $cart = Cart::where('user_id', Auth::User()->id)->where('course_id', $id)->first();

            if (!empty($bundle_check)) {
                if (Auth::user()->role == 'user') {
                    $bundle = Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', null)->get();

                    $course_id = array();
            

                    foreach ($bundle as $b) {
                        $bundle = BundleCourse::where('id', $b->bundle_id)->first();
                        array_push($course_id, $bundle->course_id);
                    }

                    $course_id = array_values(array_filter($course_id));

                    $course_id = array_flatten($course_id);

                    return view('front.course_detail', compact('course', 'courseinclude', 'whatlearns', 'coursechapters', 'courseclass', 'coursereviews', 'reviews', 'relatedcourse', 'course_id', 'ad', 'bigblue', 'meetings', 'order', 'wish', 'currency', 'cart'));
                } else {
                    return view('front.course_detail', compact('course', 'courseinclude', 'whatlearns', 'coursechapters', 'courseclass', 'coursereviews', 'reviews', 'relatedcourse', 'ad', 'bigblue', 'meetings', 'order', 'wish', 'currency', 'cart'));
                }
            } else {
                return view('front.course_detail', compact('course', 'courseinclude', 'whatlearns', 'coursechapters', 'courseclass', 'coursereviews', 'reviews', 'relatedcourse', 'ad', 'bigblue', 'meetings', 'order', 'wish', 'currency', 'cart'));
            }
        } else {
            return view('front.course_detail', compact('course', 'courseinclude', 'whatlearns', 'coursechapters', 'courseclass', 'coursereviews', 'reviews', 'relatedcourse', 'ad', 'bigblue', 'meetings', 'currency'));
        }
    }

    public function storeAnnoucement(Request $request){
        

        $request->validate([
            'announcement_title' => 'required',
            'announcement_category' => 'required',
            'announcement_short' => 'required',
            'announcement_long' => 'required',
            'layouts' => 'required',
            'status' => 'required',
            'preview_image'=>'mimes:jpg,jpeg',
            'preview_video'=>'mimes:mp4,avi,wmv'
          ]);
  
        $input['title'] = $request->announcement_title;
        $input['category_id'] = $request->announcement_category;
        $input['short_description'] = $request->announcement_short;
        $input['long_description'] = $request->announcement_long;
        $input['status'] = $request->status;
        $input['layout'] = $request->layouts;
        $input['course_id'] = $request->course_id;
        $input['user_id'] = Auth::user()->id;
        
        if ($file = $request->file('preview_image')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/announcement/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['preview_image'] = $image;
          
        }

        if ($file = $request->file('preview_video')) {

            // $file_name = md5(microtime().rand()). time().'.'.$file->getClientOriginalExtension();
            $file_name = basename(Storage::putFile(config('path.announcement.preview_video'), $file ));
            $input['preview_video'] = $file_name;

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
                'url' => Storage::temporaryUrl(config('path.announcement.preview_video'). $file_name, now()->addMinutes(10)),
                'meta' => [
                    'name' => $file_name
                ],
                "requireSignedURLs" => true,
            ]);
            
            if($response->successful()){
                $res = $response->json();
              
                $input['stream_video'] = $res['result']['uid'];
            }

        }

        Announcement::create($input);

        return redirect()->back()->with('success','Announcement Created Successfully');


    }

    public function CourseContentPage($id)
    {
        $course = Course::findOrFail($id);
       
        $courseinclude = CourseInclude::where('course_id', '=', $id)->get();
        $whatlearns = WhatLearn::where('course_id', '=', $id)->get();
        $coursechapters = CourseChapter::where('course_id', '=', $id)->get();
        $coursequestions = Question::where('course_id', '=', $id)->get();
        $courseclass= CourseClass::get();
        $announsments = Announcement::where('course_id', '=', $id)->get();

        if (Auth::check()) {
            $progress = CourseProgress::where('course_id', '=', $id)->where('user_id', Auth::User()->id)->first();

            $assignment = Assignment::where('course_id', '=', $id)->where('user_id', Auth::User()->id)->get();

            $appointment = Appointment::where('course_id', '=', $id)->where('user_id', Auth::User()->id)->get();
      
            return view('front.course_content', compact('course', 'courseinclude', 'whatlearns', 'coursechapters', 'courseclass', 'coursequestions', 'announsments', 'progress', 'assignment', 'appointment'));
        }
     
        return Redirect::route('login')->withInput()->with('delete', 'Please Login to access restricted area.');
    }

    public function mycoursepage()
    {
        $course = Course::all();
        $enroll = Order::where('user_id', Auth::user()->id)->get();
        
        return view('front.my_course', compact('course', 'enroll'));
    }
}
