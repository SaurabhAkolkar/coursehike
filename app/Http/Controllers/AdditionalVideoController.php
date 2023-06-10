<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseLanguage;
use App\AdditionalVideo;
use App\Events\UploadFileToCloudEvent;
use Storage;
use Illuminate\Support\Facades\Http;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class AdditionalVideoController extends Controller
{
    public function post(Request $request)
    {

        $multilingual = null;

        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        if ($receiver->isUploaded() !== false ) {
            $save = $receiver->receive();
        
            if ($save->isFinished()) {

                $multilingual = new CourseClass;
                $multilingual->course_id = $request->course_id;
                $multilingual->coursechapter_id =  $request->course_chapters;
                $multilingual->title = $request->title;
                $multilingual->duration = $request->duration;
                $multilingual->featured = $request->featured;

                $multilingual['position'] = (multilingual::count()+1);
                $multilingual->type = "video";

                $multilingual->status = $request->status;        

                $multilingual->featured = isset($request->featured) ? '1' : '0';
                $multilingual->is_preview = isset($request->is_preview) ? '1' : '0';
                $multilingual->save();


                $video_local_path = Storage::disk('local')->putFile('upload/course', $save->getFile());
                unset($request['file']);
                UploadFileToCloudEvent::dispatch($video_local_path, $multilingual);

                if($file = $request->file('preview_image'))
                {
                    $file_name = time().rand().'.'.$file->getClientOriginalExtension();
                    Storage::put(config('path.course.video_thumnail').$request->course_id .'/'. $file_name, fopen($file->getRealPath(), 'r+') );
                    $multilingual->image = $file_name;
                }

                $multilingual->save();

            }else{
                $handler = $save->handler();
                return response()->json([
                    "done" => $handler->getPercentageDone(),
                    'status' => true
                ]);
            }

        }else
            return back()->with('error','Video must be uploaded');



        
        $request->validate([
                'video_upld' => 'mimes:mp4,avi,wmv',
                'sub_lang' => 'required'
            ]);

       $language = CourseLanguage::where('iso_code',$request->sub_lang)->first();
       $input = [];
       $input['course_class_id'] = $request->course_class_id;
       $input['vid_lang'] = $language->name;
       $input['lang_code'] = $request->sub_lang;

       $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        if ($receiver->isUploaded() !== false ) {
            $save = $receiver->receive();
        
            if ($save->isFinished()) {
            
                $video_local_path = Storage::disk('local')->putFile('upload/course', $save->getFile());
                unset($request['file']);
                UploadFileToCloudEvent::dispatch($video_local_path, $multilingual);
            }else{
                $handler = $save->handler();
                return response()->json([
                    "done" => $handler->getPercentageDone(),
                    'status' => true
                ]);
            }
        }
        
    //    if($file = $request->file('video'))
    //    {
    //        $file_name = basename(Storage::putFile(config('path.course.video'). $request->course_id, $file , 'private'));
    //        $input['video_path'] = $file_name;

    //        $response = Http::withHeaders([
    //            'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
    //            'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
    //        ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
    //            'url' => Storage::temporaryUrl(config('path.course.video'). $request->course_id.'/'.$file_name, now()->addMinutes(60)),
    //            'meta' => [
    //                'name' => $file_name
    //            ],
    //            "requireSignedURLs" => true,
    //            // "allowedorigins" => ["*.lila.com","localhost"],
    //        ]);
           
    //        if($response->successful()){
    //            $res = $response->json();
    //            $video['stream_url'] = $res['result']['uid'];
    //        }

    //    }

       AdditionalVideo::create($input);

       return redirect()->back()->with('Video Added Successfully.');       
       
    }

    public function delete(Request $request, $id)
    {
    	$record = AdditionalVideo::findorfail($id);
        $exists = Storage::exists(config('path.course.video'). $request->course_id .'/'. $record->video_path);
        // dd($exists, config('path.course.subtitles'). $record->c_id .'/'. $record->file_url);
        if ($exists){
            Storage::delete(config('path.course.video'). $request->course_id .'/'. $record->video_path);

            if($record->stream_url){

                $response = Http::withHeaders([
                    'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                    'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
                ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'.$record->stream_url);

            }          

        }
        $record->delete();
         
    	return back()->with('deleted','Video has been deleted !');
    }
}
