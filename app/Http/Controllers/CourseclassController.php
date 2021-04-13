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


class CourseclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseclass = CourseClass::all();
       

        return view('admin.course.courseclass.index',compact("courseclass",'video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $courseclass = CourseClass::all();
        return view('admin.course.courseclass.insert',compact('courseclass')); 
 
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
       
    
        $video = CourseClass::findorfail($request->video_id);
        $image = DB::table('course_classes')->where('id',$request->video_id)->first()->image;
        if($video){
            
            $video->course_id = $request->course_id;
            $video->coursechapter_id = $request->chapter_id;
            $video->position = 0;
            $video->video = $video->getOriginal('video');
            //$image = $video->getOriginal('image');
            $video = $video->toArray();
            $video['image'] = $image;
            CourseClass::create($video);

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
        
        // $request->validate([
        //     'video_upld' => 'mimes:mp4,avi,wmv'
        // ]);
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

        $courseclass->status = $request->status;
        

        if(isset($request->featured))
        {
            $courseclass->featured = '1';
        }
        else
        {
            $courseclass->featured = '0';
        }

        if(isset($request->is_preview))
        {
            $courseclass->is_preview = '1';
        }
        else
        {
            $courseclass->is_preview = '0';
        }

           
        $courseclass->type = "video";
                
        if($file = $request->file('video_upld'))
        {
            $file_name = basename(Storage::putFile(config('path.course.video'). $request->course_id, $file , 'private'));
            $courseclass->video = $file_name;

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
                'url' => Storage::temporaryUrl(config('path.course.video'). $courseclass->course_id.'/'.$file_name, now()->addMinutes(60)),
                'meta' => [
                    'name' => $file_name
                ],
                "requireSignedURLs" => true,
                // "allowedorigins" => ["*.lila.com","localhost"],
            ]);
            
            if($response->successful()){
                $res = $response->json();
                $courseclass->stream_url = $res['result']['uid'];
            }

        }
  
        if($file = $request->file('preview_image'))
        {

            $file_name = time().rand().'.'.$file->getClientOriginalExtension();
            Storage::put(config('path.course.video_thumnail').$request->course_id .'/'. $file_name, fopen($file->getRealPath(), 'r+') );
            $courseclass->image = $file_name;
        }

        // Notification when course class add
        $cor = Course::where('id', $request->course_id)->first();

        $course = [
          'title' => $cor->title,
          'image' => $cor->preview_image,
        ];

        $enroll = Order::where('course_id', $request->course_id)->get();

        if(!$enroll->isEmpty())
        {
            foreach($enroll as $enrol)
            {
              if($courseclass->save()) 
              {
                $user = User::where('id', $enrol->user_id)->get();
                Notification::send($user,new CourseNotification($course));
              }
            }
        }
        else
        {
            $courseclass->save();
        }
          
        // Subtitle 
        // if($request->has('sub_t')){
        // foreach($request->file('sub_t') as $key=> $image)
        //   {
          
        //     $name = $image->getClientOriginalName();
        //     $image->move(public_path().'/subtitles/', $name);  
           
        //     $form= new Subtitle();
        //     $form->sub_lang = $request->sub_lang[$key];
        //     $form->sub_t=$name;
        //     $form->c_id = $courseclass->id;
        //     $form->save(); 
        //   }
        // }

        return back()->with('success','Class Video is Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\courseclass  $courseclass
     * @return \Illuminate\Http\Response
     */
    public function edit(courseclass $courseclass)
    {
        //
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
        $request->validate([
            'video' => 'mimes:mp4,avi,wmv'
        ]);

        // ini_set('max_execution_time', 400);

        $courseclass = CourseClass::findOrFail($id);

        $courseclass->coursechapter_id=$request->coursechapter_id;
        $courseclass->title = $request->title;
        $courseclass->duration = $request->duration;
        $courseclass->status = $request->status;
        $courseclass->featured = $request->featured;
        $courseclass->date_time = $request->date_time;
        $courseclass->detail = $request->detail;
         
        $coursefind  = CourseChapter::findOrFail($request->coursechapter);
        $maincourse = Course::findorfail($coursefind->course_id);

        $courseclass->type = "video";

        if($file = $request->file('video_upld'))
        {

            if ($courseclass->stream_url != "") {
                // $exists = Storage::exists(config('path.course.video'). $courseclass->course_id .'/'. $courseclass->video);
                // if ($exists) {
                Storage::delete(config('path.course.video'). $courseclass->course_id .'/'. $courseclass->video);

                $response = Http::withHeaders([
                    'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                    'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
                ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'.$courseclass->stream_url);
                // }
            }

            // $file_name = md5(microtime().rand()). time().'.'.$file->getClientOriginalExtension();
            $file_name = basename(Storage::putFile(config('path.course.video'). $courseclass->course_id, $file , 'private'));
            $courseclass->video = $file_name;

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
                'url' => Storage::temporaryUrl(config('path.course.video'). $courseclass->course_id.'/'.$file_name, now()->addMinutes(10)),
                'meta' => [
                    'name' => $file_name
                ],
                "requireSignedURLs" => true,
                // "allowedorigins" => ["*.lila.com","localhost","*.thestudiohash.com", "*"],
            ]);
            
            if($response->successful()){
                $res = $response->json();
                $courseclass->stream_url = $res['result']['uid'];
            }
            
            $courseclass->date_time = null;
            $courseclass->aws_upload = null;

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

        if(isset($request->status))
        {
            $courseclass['status'] = '1';
        }
        else
        {
            $courseclass['status'] = '0';
        }

        if(isset($request->featured))
        {
            $courseclass['featured'] = '1';
        }
        else
        {
            $courseclass['featured'] = '0';
        }   
        $courseclass['is_preview'] = $request->is_preview =='on'?'1':'0';

   
        $courseclass->save();
        Session::flash('success','Updated Successfully !');
        return redirect()->route('course.show',$maincourse->id); 
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
