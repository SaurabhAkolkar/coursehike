<?php

namespace App\Http\Controllers;

use App\Adsense;
use App\Announcement;
use App\Answer;
use App\Appointment;
use App\Assignment;
use App\BBL;
use App\BundleCourse;
use App\Cart;
use App\CartItem;
use App\Categories;
use App\Course;
use App\CourseChapter;
use App\CourseClass;
use App\CourseClassMultilingual;
use App\CourseInclude;
use App\CourseLanguage;
use App\CourseProgress;
use App\CourseResource;
use App\Currency;
use App\Events\UploadMultilingualVideoToCloudEvent;
use App\MasterClass;
use App\Meeting;
use App\Order;
use App\PublishRequest;
use App\Question;
use App\Quiz;
use App\QuizTopic;
use App\RelatedCourse;
use App\ReportReview;
use App\ReviewRating;
use App\SubCategory;
use App\User;
use App\WhatLearn;
use App\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Redirect;
use Session;

class CourseController extends Controller
{

    public function course_overview($course_id)
    {
        $categories = Cache::remember('home_categories', $seconds = 86400, function () {
            return Categories::with('subcategory')->orderBy('id', 'ASC')->get();
        });
        $course = Course::with('review', 'user')->where("id", $course_id)->first();
        $cart_items = Cart::where("user_id", Auth::id())->get()->count();
        // $faqs = FaqStudent::all(); , compact('faqs')
        return view("newui.course_overview")
            ->with("categories", $categories)
            ->with("course", $course)
            ->with("cart_items", $cart_items);
    }

    public function course_content($course_id)
    {
        $categories = Cache::remember('home_categories', $seconds = 86400, function () {
            return Categories::with('subcategory')->orderBy('id', 'ASC')->get();
        });
        $course = Course::with('review', 'user')->where("id", $course_id)->first();
        $cart_items = Cart::where("user_id", Auth::id())->get()->count();
        // $faqs = FaqStudent::all(); , compact('faqs')
        return view("newui.course_content")
            ->with("categories", $categories)
            ->with("course", $course)
            ->with("cart_items", $cart_items);
    }

    public function all_course_list()
    {
        $categories = Cache::remember('home_categories', $seconds = 86400, function () {
            return Categories::with('subcategory')->orderBy('id', 'ASC')->get();
        });
        $courses = Cache::remember('home_classes', $seconds = 86400, function () {
            return Course::with('review', 'user')->get();
        });
        $cart_items = Cart::where("user_id", Auth::id())->get()->count();
        return view("newui.all_course_list")
            ->with("categories", $categories)
            ->with("courses", $courses)
            ->with("cart_items", $cart_items);
    }

    public function subcategoryAllCourse($subcategory_id)
    {
        $categories = Cache::remember('home_categories', $seconds = 86400, function () {
            return Categories::with('subcategory')->orderBy('id', 'ASC')->get();
        });
        $courses = Course::with('review', 'user')->where("subcategory_id", $subcategory_id)->get();
        $cart_items = Cart::where("user_id", Auth::id())->get()->count();
        return view("newui.all_course_list")
            ->with("categories", $categories)
            ->with("courses", $courses)
            ->with("cart_items", $cart_items);
    }

    public function my_courses_list()
    {
        return view("newui.my_courses_list");
    }

    public function coursehike_sign_in()
    {
        $categories = Cache::remember('home_categories', $seconds = 86400, function () {
            return Categories::with('subcategory')->orderBy('id', 'ASC')->get();
        });
        return view("newui.sign_in")->with("categories", $categories);

    }
    public function coursehike_sign_up()
    {
        $categories = Cache::remember('home_categories', $seconds = 86400, function () {
            return Categories::with('subcategory')->orderBy('id', 'ASC')->get();
        });
        return view("newui.sign_up")->with("categories", $categories);
    }

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
        $user = User::where(['role' => 'mentors'])->orWhere(['role' => 'admin'])->get();
        $course = Course::all();
        $coursechapter = CourseChapter::all();
        $languages = CourseLanguage::where(['status' => 1])->get();
        return view('admin.course.insert', compact("course", 'coursechapter', 'category', 'user', 'languages'));
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
            'preview_image' => 'required',
            'language_id' => 'required',
            'requirement' => 'required',
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

            $file_name = time() . rand() . '.' . $file->getClientOriginalExtension();
            Storage::put(config('path.course.img') . $file_name, fopen($file->getRealPath(), 'r+'));
            $data->preview_image = $file_name;

        }

        if ($file = $request->file('preview_video')) {

            $file_name = time() . rand() . '.' . $file->getClientOriginalExtension();

            Storage::put(config('path.course.preview_video') . $file_name, fopen($file->getRealPath(), 'r+'));
            $data->preview_video = $file_name;

            // $response = Http::withHeaders([
            //     'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
            //     'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            // ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
            //     'url' => Storage::temporaryUrl(config('path.course.preview_video'). $file_name, now()->addMinutes(10)),
            //     'meta' => [
            //         'name' => $file_name
            //     ],
            //     "requireSignedURLs" => true,
            // ]);

            // if($response->successful()){
            //     $res = $response->json();
            //     $data->stream_video = $res['result']['uid'];
            // }
        }

        if ($file = $request->file('video_preview_img')) {
            $file_name = time() . rand() . '.' . $file->getClientOriginalExtension();

            Storage::put(config('path.course.img') . $file_name, fopen($file->getRealPath(), 'r+'));
            $data['video_preview_img'] = $file_name;
        }

        $data->slug = Str::slug($request->title, '-');
        $data->status = 0;

        $data->save();
        Session::flash('success', 'Course Added Successfully !');
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
            'video' => 'mimes:mp4,avi,wmv',
        ]);

        if ($request->master_class) {
            $check = MasterClass::where('course_id', $id)->first();
            if (!$check) {
                MasterClass::create(['course_id' => $id]);
            }
        } else {
            MasterClass::where('course_id', $id)->delete();
        }

        $course = Course::findOrFail($id);
        $input = $request->all();

        // $course->package_type = $request->package_type;

        if ($file = $request->file('preview_image')) {
            if ($course->preview_image != null) {
                $exists = Storage::exists(config('path.course.img') . $course->preview_image);
                if ($exists) {
                    Storage::delete(config('path.course.img') . $course->preview_image);
                }

            }

            $file_name = time() . rand() . '.' . $file->getClientOriginalExtension();

            Storage::put(config('path.course.img') . $file_name, fopen($file->getRealPath(), 'r+'));
            $input['preview_image'] = $file_name;
        }

        if ($file = $request->file('video_preview_img')) {
            if ($course->video_preview_img != null) {
                $exists = Storage::exists(config('path.course.img') . $course->video_preview_img);
                if ($exists) {
                    Storage::delete(config('path.course.img') . $course->video_preview_img);
                }

            }

            $file_name = time() . rand() . '.' . $file->getClientOriginalExtension();

            Storage::put(config('path.course.img') . $file_name, fopen($file->getRealPath(), 'r+'));
            $input['video_preview_img'] = $file_name;
        }

        if ($file = $request->file('preview_video')) {
            if ($course->preview_video != "") {
                $exists = Storage::exists(config('path.course.preview_video') . $course->preview_video);
                if ($exists) {
                    Storage::delete(config('path.course.preview_video') . $course->preview_video);

                    // Http::withHeaders([
                    //     'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                    //     'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
                    // ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'.$course->stream_video);
                }
            }

            $file_name = basename(Storage::putFile(config('path.course.preview_video'), $file));
            $input['preview_video'] = $file_name;

            // $response = Http::withHeaders([
            //     'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
            //     'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            // ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
            //     'url' => Storage::temporaryUrl(config('path.course.preview_video'). $file_name, now()->addMinutes(10)),
            //     'meta' => [
            //         'name' => $file_name
            //     ],
            //     "requireSignedURLs" => true,
            // ]);

            // if($response->successful()){
            //     $res = $response->json();
            //     $course->stream_video = $input['stream_video'] = $res['result']['uid'];
            // }

        }

        if (isset($input['status'])) {

            if (($course->status == '0' || $course->status == '2') && $input['status'] == '1') {
                PublishRequest::where(['status' => '1', 'request_type' => 'publish', 'course_id' => $id])->update(['status' => 0]);
            }
            if (($input['status'] == '0' || $input['status'] == '2') && $course->status == '1') {
                PublishRequest::where(['status' => 1, 'request_type' => 'unpublish', 'course_id' => $id])->update(['status' => 0]);
            }

        }

        CartItem::where('course_id', $id)
            ->update([
                'price' => $request->price,
                'offer_price' => $request->discount_price,
            ]);

        $course->update($input);

        return back()->with('success', 'Updated Successfully !');
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
                    $exists = Storage::exists(config('path.course.img') . $course->preview_image);
                    if ($exists) {
                        Storage::delete(config('path.course.img') . $course->preview_image);
                    }

                }
                if ($course->video != null) {
                    $exists = Storage::exists(config('path.course.preview_video') . $course->preview_video);
                    if ($exists) {
                        Storage::delete(config('path.course.preview_video') . $course->preview_video);
                    }

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

    public function featuredCourses()
    {
        $courses = Course::where('featured', '1')->orderBy('order')->get();

        return view('admin.course.featured', compact('courses'));
    }

    public function reposition(Request $request)
    {

        $data = $request->all();

        $posts = Course::where(['featured' => 1])->get();
        $pos = $data['id'];

        $position = json_encode($data);

        foreach ($pos as $key => $item) {
            Course::where('id', $item)->update(array('order' => $key));
            // $new_data = Course::findOrFail($itme->id)

        }

        return response()->json(['msg' => 'Updated Successfully', 'success' => true]);

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
        $categories = Categories::where('status', 1)->pluck('title', 'id');
        $publisRequest = PublishRequest::where(['status' => 1, 'course_id' => $id, 'user_id' => Auth::User()->id])->first();
        $users = User::where(['role' => 'mentors'])->orWhere(['role' => 'admin'])->get();
        $check_master_class = MasterClass::where(['course_id' => $id])->first();

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

        $preview_languages = CourseLanguage::where('iso_code', '!=', 'en')->get();
        $additional_videos = CourseClassMultilingual::where('course_id', $id)->where('type', 'preview')->get();

        return view('admin.course.show', compact('cor', 'users', 'course', 'categories', 'additional_videos', 'preview_languages', 'publisRequest', 'courseinclude', 'whatlearns', 'coursechapters', 'coursechapter', 'check_master_class', 'relatedcourse', 'courseclass', 'courseresources', 'announsments', 'answers', 'reports', 'questions', 'quizes', 'topics', 'appointment'));
    }

    public function sendToPublish(Request $request)
    {
        $check = PublishRequest::where(['course_id' => $request->course_id, 'user_id' => Auth::User()->id, 'request_type' => 'publish', 'status' => 1])->first();

        if ($check) {
            return redirect()->back()->with('success', 'Class has already sent for publish approval.');
        }

        PublishRequest::create(['course_id' => $request->course_id, 'user_id' => Auth::User()->id, 'request_type' => 'publish', 'status' => 1]);

        return redirect()->back()->with('success', 'Class has been sent for publish approval.');
    }

    public function sendToUnPublish(Request $request)
    {

        $check = PublishRequest::where(['course_id' => $request->course_id, 'user_id' => Auth::User()->id, 'request_type' => 'unpublish', 'status' => 1])->first();

        if ($check) {
            return redirect()->back()->with('success', 'Class has already sent for unpublish unapproval.');
        }

        PublishRequest::create(['course_id' => $request->course_id, 'user_id' => Auth::User()->id, 'request_type' => 'unpublish', 'status' => 1]);

        return redirect()->back()->with('success', 'Class has been sent for  unpublish unapproval.');
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

    public function storeAnnoucement(Request $request)
    {

        $request->validate([
            'announcement_title' => 'required',
            'announcement_category' => 'required',
            'announcement_short' => 'required',
            'announcement_long' => 'required',
            'layouts' => 'required',
            'status' => 'required',
            'preview_image' => 'mimes:jpg,jpeg',
            'preview_video' => 'mimes:mp4,avi,wmv',
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
            $optimizePath = public_path() . '/images/announcement/';
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $image, 72);
            $input['preview_image'] = $image;

        }

        if ($file = $request->file('preview_video')) {

            // $file_name = md5(microtime().rand()). time().'.'.$file->getClientOriginalExtension();
            $file_name = basename(Storage::putFile(config('path.announcement.preview_video'), $file));
            $input['preview_video'] = $file_name;

            // $response = Http::withHeaders([
            //     'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
            //     'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            // ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
            //     'url' => Storage::temporaryUrl(config('path.announcement.preview_video'). $file_name, now()->addMinutes(10)),
            //     'meta' => [
            //         'name' => $file_name
            //     ],
            //     "requireSignedURLs" => true,
            // ]);

            // if($response->successful()){
            //     $res = $response->json();

            //     $input['stream_video'] = $res['result']['uid'];
            // }

        }

        Announcement::create($input);

        return redirect()->back()->with('success', 'Announcement Created Successfully');

    }

    public function CourseContentPage($id)
    {
        $course = Course::findOrFail($id);

        $courseinclude = CourseInclude::where('course_id', '=', $id)->get();
        $whatlearns = WhatLearn::where('course_id', '=', $id)->get();
        $coursechapters = CourseChapter::where('course_id', '=', $id)->get();
        $coursequestions = Question::where('course_id', '=', $id)->get();
        $courseclass = CourseClass::get();
        $announsments = Announcement::where('course_id', '=', $id)->get();

        if (Auth::check()) {
            $progress = CourseProgress::where('course_id', '=', $id)->where('user_id', Auth::User()->id)->first();

            $assignment = Assignment::where('course_id', '=', $id)->where('user_id', Auth::User()->id)->get();

            $appointment = Appointment::where('course_id', '=', $id)->where('user_id', Auth::User()->id)->get();

            return view('front.course_content', compact('course', 'courseinclude', 'whatlearns', 'coursechapters', 'courseclass', 'coursequestions', 'announsments', 'progress', 'assignment', 'appointment'));
        }

        dd("CourseContentPage");
        return Redirect::route('login')->withInput()->with('delete', 'Please Login to access restricted area.');
    }

    public function mycoursepage()
    {
        $course = Course::all();
        $enroll = Order::where('user_id', Auth::user()->id)->get();

        return view('front.my_course', compact('course', 'enroll'));
    }

    public function post_multilingual(Request $request)
    {

        $multilingual = null;

        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        if ($receiver->isUploaded() !== false) {
            $save = $receiver->receive();

            if ($save->isFinished()) {

                $language = CourseLanguage::where('iso_code', $request->sub_lang)->first();

                $multilingual = new CourseClassMultilingual;
                $multilingual->course_id = $request->course_id;
                $multilingual->vid_lang = $language->name;
                $multilingual->lang_code = $request->sub_lang;
                $multilingual->type = 'preview';
                $multilingual->save();

                $video_local_path = Storage::disk('local')->putFile('upload/course_preview', $save->getFile());
                unset($request['file']);
                UploadMultilingualVideoToCloudEvent::dispatch($video_local_path, $multilingual);

                $multilingual->save();

            } else {
                $handler = $save->handler();
                return response()->json([
                    "done" => $handler->getPercentageDone(),
                    'status' => true,
                ]);
            }

        } else {
            return back()->with('error', 'Video must be uploaded');
        }

    }

    public function loadMoreChapters(Request $request)
    {
        $course_id = $request->input('course_id');
        $offset = $request->input('offset', 0);
        $limit = 1; // Number of chapters to load each time

        // Query chapters based on course_id and offset
        $chapters = CourseChapter::where('course_id', $course_id)
            ->skip($offset)
            ->take($limit)
            ->get();
        // Determine if there are more chapters
        $skip = $offset + $limit;
        // Check if there are more chapters
        $hasMoreChapters = CourseChapter::where('course_id', $course_id)
            ->where('id', '>', function ($query) use ($course_id, $offset, $limit) {
                $query->select('id')
                    ->from('course_chapters')
                    ->where('course_id', $course_id)
                    ->orderBy('id')
                    ->skip($offset)
                    ->take(1);
            })
            ->exists();

        // Return view with additional chapters
        return view('newui.load_more', compact('chapters', 'hasMoreChapters'));
    }

}
