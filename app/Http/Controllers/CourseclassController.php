<?php

namespace App\Http\Controllers;

use App\AudioTrack;
use App\CourseClass;
use Illuminate\Http\Request;
use Notification;
use Image;
use App\CourseChapter;
use App\Course;
use App\CourseLanguage;
use App\Events\UploadFileToCloudEvent;
use App\Order;
use App\User;
use App\Notifications\CourseNotification;
use App\Subtitle;
use Illuminate\Support\Facades\Http;
use Session;
use Storage;
use Auth;
use DB;

use \Firebase\JWT\JWT;
use League\Flysystem\File;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class CourseclassController extends Controller
{
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

    function searchVideo(Request $request){
        if($request->title && $request->title !=""){
            $course_id = $request->course_id;
            $chapter_id = $request->chapter_id;
            if(Auth::user()->role == 'admin'){
                $courses = CourseClass::where('title','like','%'.$request->title.'%')->where('course_id','!=',$request->course_id)->where('status', 2)->get();
            }
            else{
                $course_ids = Course::where(['user_id'=>Auth::user()->id])->where('id','!=',$request->course_id)->pluck('id')->toArray();

                $courses = CourseClass::where('title','like','%'.$request->title.'%')->whereIn('course_id',$course_ids)->get();
            }
           
            return response()->view('admin.course.courseclass.video_search', compact('courses','course_id','chapter_id'));
        }
        else{
            return "<p class='alert-danger'>Video Title is required</p>";
        }
    }

    public function saveExitingVideo(Request $request){
       
    
        $course = CourseClass::findorfail($request->video_id);
        $raw_data = DB::table('course_classes')->where('id',$request->video_id)->first();
        $image = $raw_data->image;
        $video = $raw_data->video;
        
        if($course){

            $course->position = 0;
            $exists = Storage::exists(config('path.course.video_thumnail').$request->course_id.'/'. $image);
            if ($exists)
                Storage::delete(config('path.course.video_thumnail').$request->course_id.'/'. $image);
            
            $video_exists = Storage::exists(config('path.course.video').$request->course_id .'/'. $video);
                if ($video_exists)
                    Storage::delete(config('path.course.video').$request->course_id .'/'. $video);

            Storage::copy(config('path.course.video_thumnail').$course->course_id.'/'. $image, config('path.course.video_thumnail').$request->course_id .'/'. $image);
            
            Storage::copy(config('path.course.video').$course->course_id .'/'. $video, config('path.course.video').$request->course_id .'/'. $video);
            
            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
                'url' => Storage::temporaryUrl(config('path.course.video'). $course->course_id.'/'.$video, now()->addMinutes(60)),
                'meta' => [
                    'name' => $video
                ],
                "requireSignedURLs" => true,
                // "allowedorigins" => ["*.lila.com","localhost"],
            ]);
            if($response->successful()){
                $res = $response->json();
                $course->stream_url = $res['result']['uid'];
            }

            $course->course_id = $request->course_id;
            $course->coursechapter_id = $request->chapter_id;
            

            $course = $course->toArray();
            $course['video'] = $video;
            $course['image'] = $image;
               // $video['image'] = $image;
            CourseClass::create($course);
            return back()->with('success',' Video is Added');
        }

        return back('/course/create/'.$request->course_id)->with('success','Something went wrong');
        
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
        if ($receiver->isUploaded() !== false ) {
            $save = $receiver->receive();
        
            if ($save->isFinished()) {

                $video_local_path = Storage::disk('local')->putFile('upload/course', $save->getFile());
                unset($request['file']);
                UploadFileToCloudEvent::dispatch($video_local_path, $courseclass);

                $courseclass = new CourseClass;
                $courseclass->course_id = $request->course_id;
                $courseclass->coursechapter_id =  $request->course_chapters;
                $courseclass->title = $request->title;
                $courseclass->duration = $request->duration;
                $courseclass->status = $request->status;
                $courseclass->featured = $request->featured;
                $courseclass->video = $request->video;
                $courseclass->date_time = $request->date_time;
                $courseclass->detail = $request->detail;

                $courseclass['position'] = (CourseClass::count()+1);
                $courseclass->type = "video";

                $courseclass->status = $request->status;        

                $courseclass->featured = isset($request->featured) ? '1' : '0';
                $courseclass->is_preview = isset($request->is_preview) ? '1' : '0';
                $courseclass->save();

                if($file = $request->file('preview_image'))
                {
                    $file_name = time().rand().'.'.$file->getClientOriginalExtension();
                    Storage::put(config('path.course.video_thumnail').$request->course_id .'/'. $file_name, fopen($file->getRealPath(), 'r+') );
                    $courseclass->image = $file_name;
                }

                $courseclass->save();

            }else{
                $handler = $save->handler();
                return response()->json([
                    "done" => $handler->getPercentageDone(),
                    'status' => true
                ]);
            }

        }else
            return back()->with('error','Video must be uploaded');
  
        

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
    
        $languages = CourseLanguage::all();
        $cate = CourseClass::find($id);
        $coursechapt = CourseChapter::where('course_id', $cate->course_id)->get();
        $subtitles = Subtitle::where('c_id', $id)->get();
        // $audio_tracks = AudioTrack::where('c_id', $id)->get();

        $datetimevalue= strtotime($cate->date_time);
        $formatted = date('Y-m-d', $datetimevalue);

        $pd = $cate['date_time'];
        $live_date = str_replace(" ", "T", $pd);

        return view('admin.course.courseclass.edit',compact('cate','coursechapt', 'languages','subtitles', 'live_date')); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $courseclass = CourseClass::findOrFail($id);

        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        if ($receiver->isUploaded() !== false ) {
            $save = $receiver->receive();
        
            if ($save->isFinished()) {
            
                $video_local_path = Storage::disk('local')->putFile('upload/course', $save->getFile());
                unset($request['file']);
                UploadFileToCloudEvent::dispatch($video_local_path, $courseclass);
            }else{
                $handler = $save->handler();
                return response()->json([
                    "done" => $handler->getPercentageDone(),
                    'status' => true
                ]);
            }
        }

        if($file = $request->file('preview_image'))
        {
            if ($courseclass->image != null) {
                $exists = Storage::exists(config('path.course.video_thumnail').$courseclass->course_id .'/'.$courseclass->image);
                if ($exists)
                    Storage::delete(config('path.course.video_thumnail').$courseclass->course_id .'/'.$courseclass->image);
            }

            $file_name = time().rand().'.'.$file->getClientOriginalExtension();
            Storage::put(config('path.course.video_thumnail').$courseclass->course_id .'/'. $file_name, fopen($file->getRealPath(), 'r+') );
            $courseclass->image = $file_name;
        }

        $courseclass->coursechapter_id=$request->coursechapter_id;
        $courseclass->title = $request->title;
        $courseclass->duration = $request->duration;
        $courseclass->status = $request->status;
        $courseclass->featured = $request->featured;
        $courseclass->date_time = $request->date_time;
        $courseclass->detail = $request->detail;         

        $courseclass->type = "video";

        $courseclass['status'] = isset($request->status) ? '1' : '0';

        $courseclass['featured'] = isset($request->featured) ? '1' : '0';
        $courseclass['is_preview'] = $request->is_preview =='on' ? '1' : '0';

        $courseclass->save();

        if ($receiver->isUploaded() === false) {
            Session::flash('success','Updated Successfully !');
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
        if($courseclass){
            if($courseclass->type == "video")
            {
                    
                $video_file = @file_get_contents(public_path().'/video/class/'.$courseclass->video);
    
                if($video_file)
                {
                    unlink(public_path().'/video/class/'.$courseclass->video);
                }
            }
    
            if($courseclass->type == "audio")
            {
                    
                $video_file = @file_get_contents(public_path().'/files/audio/'.$courseclass->audio);
    
                if($video_file)
                {
                    unlink(public_path().'/files/audio/'.$courseclass->audio);
                }
            }
    
            if($courseclass->type == "image")
            {
                    
                $image_file = @file_get_contents(public_path().'/images/class/'.$courseclass->image);
    
                if($image_file)
                {
                    unlink(public_path().'/images/class/'.$courseclass->image);
                }
            }
    
            if($courseclass->type == "zip")
            {
                    
                $zip_file = @file_get_contents(public_path().'/files/zip/'.$courseclass->zip);
    
                if($zip_file)
                {
                    unlink(public_path().'/files/zip/'.$courseclass->zip);
                }
            }
    
            if($courseclass->type == "pdf")
            {
                    
                $pdf_file = @file_get_contents(public_path().'/files/pdf/'.$courseclass->pdf);
    
                if($pdf_file)
                {
                    unlink(public_path().'/files/pdf/'.$courseclass->pdf);
                }
            }
    
            if($courseclass->preview_type = "video")
            {
                $content = @file_get_contents(public_path().'/video/class/preview/'.$courseclass->preview_video);
                if($content) {
                  unlink(public_path().'/video/class/preview/'.$courseclass->preview_video);
                }
            }
    
            $courseclass->delete();
        }        
        
        return back();
    }


    public function sort(Request $request){
        
        $posts = CourseClass::all();

        foreach ($posts as $post) {

            foreach ($request->order as $order) {

                if($order['id'] == $post->id) {

                    \DB::table('course_classes')->where('id',$post->id)->update(['position' => $order['position']]);
                    
                }
            }
        }
        
        return response()->json('Update Successfully.', 200);
    }

    public function token_generate()
    {
        // $expiration = time() + 3600;
        // $issuer = 'localhost';

        // $token = Token::getToken('userIdentifier', 'secret', $expiration, $issuer);
        // $payload = [
        //     'iat' => time(),
        //     'uid' => 1,
        //     'exp' => time() + 3600,
        //     // 'iss' => 'localhost',
        //     'kid' => 'e629e2b6fe352f9fe49415fdc36fc8f8',
        //     'sub' => '048850df97dc19cf7137aaf583a281ef',
        // ];
        // $secret = base64_decode(env('CLOUDFLARE_PEM_KEY'));
        // // dd($secret);

        // $token = Token::customPayload($payload, $secret);

        // $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

        // // Create token payload as a JSON string
        // $payload = json_encode(['kid' => 'e629e2b6fe352f9fe49415fdc36fc8f8',
        // 'sub' => '048850df97dc19cf7137aaf583a281ef','exp' => time() + 3600]);

        // // Encode Header to Base64Url String
        // $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        // // Encode Payload to Base64Url String
        // $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        // // Create Signature Hash
        // $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, base64_decode(env('CLOUDFLARE_PEM_KEY')), true);

        // // Encode Signature to Base64Url String
        // $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], env('CLOUDFLARE_PEM_KEY'));

        // // Create JWT
        // $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

        // echo $jwt;

        $privateKey = base64_decode(env('CLOUDFLARE_PEM_KEY'));
        $payload = array(
            // "iss" => "example.org",
            // "aud" => "example.com",
            'exp' => time() + 3600,
            // 'iss' => 'localhost',
            'kid' => 'e629e2b6fe352f9fe49415fdc36fc8f8',
            'sub' => '048850df97dc19cf7137aaf583a281ef',
        );
        
        $jwt = JWT::encode($payload, $privateKey, 'RS256');
        echo print_r($jwt, true);
    }

   
}
