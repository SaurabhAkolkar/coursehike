<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseChapter;
use App\CourseClass;
use App\CourseClassMultilingual;
use App\CourseLanguage;
use App\Events\UploadMultilingualVideoToCloudEvent;
use App\Subtitle;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Session;
use Storage;
use Iman\Streamer\VideoStreamer;

class CourseclassController extends Controller
{

    public function playVideo()
    {
        if (Auth::check()) {
            $path = public_path('/content/videos/travel.mp4');

            VideoStreamer::streamFile($path);
        } else {
            $path = public_path('/content/videos/party.mp4');

            VideoStreamer::streamFile($path);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $courseclass = CourseClass::all();
        // return view('admin.course.courseclass.index',compact("courseclass"));
        return redirect()->to('/course');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $courseclass = CourseClass::all();
        // return view('admin.course.courseclass.insert',compact('courseclass'));
        return redirect()->to('/course');
    }

    public function searchVideo(Request $request)
    {
        if ($request->title && $request->title != "") {
            $course_id = $request->course_id;
            $chapter_id = $request->chapter_id;
            if (Auth::user()->role == 'admin') {
                $courses = CourseClass::where('title', 'like', '%' . $request->title . '%')->where('course_id', '!=', $request->course_id)->get();
            } else {
                $course_ids = Course::where(['user_id' => Auth::user()->id])->where('id', '!=', $request->course_id)->pluck('id')->toArray();

                $courses = CourseClass::where('title', 'like', '%' . $request->title . '%')->whereIn('course_id', $course_ids)->get();
            }

            return response()->view('admin.course.courseclass.video_search', compact('courses', 'course_id', 'chapter_id'));
        } else {
            return "<p class='alert-danger'>Video Title is required</p>";
        }
    }

    public function saveExitingVideo(Request $request)
    {

        $course = CourseClass::findorfail($request->video_id);
        $raw_data = DB::table('course_classes')->where('id', $request->video_id)->first();
        $image = $raw_data->image;
        $video = $raw_data->video;

        if ($course) {

            $course->position = 0;

            $image_filename = uniqid() . '.' . pathinfo($image, PATHINFO_EXTENSION);
            Storage::copy(config('path.course.video_thumnail') . $course->course_id . '/' . $image, config('path.course.video_thumnail') . $request->course_id . '/' . $image_filename);

            $video_filename = uniqid() . '.' . pathinfo($video, PATHINFO_EXTENSION);
            Storage::copy(config('path.course.video') . $course->course_id . '/' . $video, config('path.course.video') . $request->course_id . '/' . $video_filename);

            // $response = Http::withHeaders([
            //     'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
            //     'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            // ])->post('https://api.cloudflare.com/client/v4/accounts/' . env('CLOUDFLARE_ACCOUNT_ID') . '/stream/copy', [
            //     'url' => Storage::temporaryUrl(config('path.course.video') . $course->course_id . '/' . $video, now()->addMinutes(60)),
            //     'meta' => [
            //         'name' => $video,
            //     ],
            //     "requireSignedURLs" => true,
            //     // "allowedorigins" => ["*.lila.com","localhost"],
            // ]);
            $stream_url = '';
            // if ($response->successful()) {
            //     $res = $response->json();
            //     $stream_url = $res['result']['uid'];
            // }

            $course->course_id = $request->course_id;
            $course->coursechapter_id = $request->chapter_id;

            $courseArray = $course->toArray();
            $courseArray['video'] = $video_filename;
            $courseArray['image'] = $image_filename;
            $courseArray['stream_url'] = $stream_url;

            $newCourse = CourseClass::create($courseArray);

            foreach ($course->multilingual as $multilingual) {
                $a = $multilingual->replicate()->fill([
                    'class_id' => $newCourse->id,
                ]);
                $a->save();
            }

            return back()->with('success', ' Video is Added');
        }

        return back('/course/create/' . $request->course_id)->with('success', 'Something went wrong');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $courseclass = null;

        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        if ($receiver->isUploaded() !== false) {
            $save = $receiver->receive();

            if ($save->isFinished()) {

                $courseclass = new CourseClass;
                $courseclass->course_id = $request->course_id;
                $courseclass->coursechapter_id = $request->course_chapters;
                $courseclass->title = $request->title;
                $courseclass->duration = $request->duration;

                $courseclass->video = $request->video;
                $courseclass->date_time = $request->date_time;
                $courseclass->detail = $request->detail;

                $courseclass['position'] = (CourseClass::count() + 1);
                $courseclass->type = "video";

                $courseclass->status = $request->status;

                $courseclass->featured = isset($request->featured) ? '1' : '0';
                $courseclass->is_preview = isset($request->is_preview) ? '1' : '0';
                $courseclass->save();

                $video_local_path = Storage::disk('local')->putFile('public/upload/course', $save->getFile());
                unset($request['file']);
                // UploadFileToCloudEvent::dispatch($video_local_path, $courseclass);

                if ($file = $request->file('preview_image')) {
                    $file_name = time() . rand() . '.' . $file->getClientOriginalExtension();
                    Storage::put(config('path.course.video_thumnail') . $request->course_id . '/' . $file_name, fopen($file->getRealPath(), 'r+'));
                    $courseclass->image = $file_name;
                }

                $courseclass->save();

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

        // TODO: Notification when course class add
        // $cor = Course::where('id', $request->course_id)->first();

        // $course = [
        //   'title' => $cor->title,
        //   'image' => $cor->preview_image,
        // ];

        // $enroll = Order::where('course_id', $request->course_id)->get();

        // if(!$enroll->isEmpty())
        // {
        //     foreach($enroll as $enrol)
        //     {
        //       if($courseclass->save())
        //       {
        //         $user = User::where('id', $enrol->user_id)->get();
        //         Notification::send($user,new CourseNotification($course));
        //       }
        //     }
        // }
        // else
        // {
        //     $courseclass->save();
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $languages = CourseLanguage::where('iso_code', '!=', 'en')->get();
        $cate = CourseClass::find($id);
        $coursechapt = CourseChapter::where('course_id', $cate->course_id)->get();
        $subtitles = Subtitle::where('c_id', $id)->get();
        $additional_videos = CourseClassMultilingual::where('class_id', $id)->get();
        // $audio_tracks = AudioTrack::where('c_id', $id)->get();

        $datetimevalue = strtotime($cate->date_time);
        $formatted = date('Y-m-d', $datetimevalue);

        $pd = $cate['date_time'];
        $live_date = str_replace(" ", "T", $pd);

        return view('admin.course.courseclass.edit', compact('cate', 'coursechapt', 'languages', 'subtitles', 'live_date', 'additional_videos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $courseclass = CourseClass::findOrFail($id);

        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        if ($receiver->isUploaded() !== false) {
            $save = $receiver->receive();

            if ($save->isFinished()) {

                $video_local_path = Storage::disk('local')->putFile('public/upload/course', $save->getFile());
                unset($request['file']);
                // UploadFileToCloudEvent::dispatch($video_local_path, $courseclass);
            } else {
                $handler = $save->handler();
                return response()->json([
                    "done" => $handler->getPercentageDone(),
                    'status' => true,
                ]);
            }
        }

        if ($file = $request->file('preview_image')) {
            if ($courseclass->image != null) {
                $exists = Storage::exists(config('path.course.video_thumnail') . $courseclass->course_id . '/' . $courseclass->image);
                if ($exists) {
                    Storage::delete(config('path.course.video_thumnail') . $courseclass->course_id . '/' . $courseclass->image);
                }

            }

            $file_name = time() . rand() . '.' . $file->getClientOriginalExtension();
            Storage::put(config('path.course.video_thumnail') . $courseclass->course_id . '/' . $file_name, fopen($file->getRealPath(), 'r+'));
            $courseclass->image = $file_name;
        }

        $courseclass->coursechapter_id = $request->coursechapter_id;
        $courseclass->title = $request->title;
        $courseclass->duration = $request->duration;
        $courseclass->status = $request->status;
        $courseclass->featured = $request->featured;
        $courseclass->date_time = $request->date_time;
        $courseclass->detail = $request->detail;

        $courseclass->type = "video";

        $courseclass->status = $request->editClass_status;

        $courseclass->featured = isset($request->featured) ? '1' : '0';
        $courseclass->is_preview = isset($request->is_preview) ? '1' : '0';

        $courseclass->save();

        if ($receiver->isUploaded() === false) {
            Session::flash('success', 'Updated Successfully !');
            return redirect()->route('course.show', $courseclass->course_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseclass = CourseClass::find($id);
        if ($courseclass) {
            if ($courseclass->type == "video") {
                $video_file = @file_get_contents(public_path() . '/video/class/' . $courseclass->video);
                if ($video_file) {
                    unlink(public_path() . '/video/class/' . $courseclass->video);
                }

            }

            if ($courseclass->type == "audio") {
                $video_file = @file_get_contents(public_path() . '/files/audio/' . $courseclass->audio);
                if ($video_file) {
                    unlink(public_path() . '/files/audio/' . $courseclass->audio);
                }

            }

            if ($courseclass->type == "image") {
                $image_file = @file_get_contents(public_path() . '/images/class/' . $courseclass->image);
                if ($image_file) {
                    unlink(public_path() . '/images/class/' . $courseclass->image);
                }

            }

            if ($courseclass->type == "zip") {
                $zip_file = @file_get_contents(public_path() . '/files/zip/' . $courseclass->zip);
                if ($zip_file) {
                    unlink(public_path() . '/files/zip/' . $courseclass->zip);
                }

            }

            if ($courseclass->type == "pdf") {
                $pdf_file = @file_get_contents(public_path() . '/files/pdf/' . $courseclass->pdf);
                if ($pdf_file) {
                    unlink(public_path() . '/files/pdf/' . $courseclass->pdf);
                }

            }

            if ($courseclass->preview_type = "video") {
                $content = @file_get_contents(public_path() . '/video/class/preview/' . $courseclass->preview_video);
                if ($content) {
                    unlink(public_path() . '/video/class/preview/' . $courseclass->preview_video);
                }

            }

            $courseclass->delete();
        }
        return back();
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
                $multilingual->class_id = $request->course_class_id;
                $multilingual->vid_lang = $language->name;
                $multilingual->lang_code = $request->sub_lang;
                $multilingual->save();

                $video_local_path = Storage::disk('local')->putFile('upload/course', $save->getFile());
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

    public function delete_multilingual(Request $request, $id)
    {
        $record = CourseClassMultilingual::findorfail($id);
        $exists = Storage::exists(config('path.course.video') . $request->course_id . '/' . $record->video_path);
        // if ($exists){
        //     Storage::delete(config('path.course.video'). $request->course_id .'/'. $record->video_path);

        //     if($record->stream_url){
        //         $response = Http::withHeaders([
        //             'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
        //             'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
        //         ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'.$record->stream_url);
        //     }
        // }
        $record->delete();

        return back()->with('deleted', 'Video has been deleted !');
    }

    public function sort(Request $request)
    {
        $posts = CourseClass::all();
        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    \DB::table('course_classes')->where('id', $post->id)->update(['position' => $order['position']]);
                }

            }
        }
        return response()->json('Update Successfully.', 200);
    }

}
