<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseLanguage;
use App\AdditionalVideo;
use Storage;
use Illuminate\Support\Facades\Http;

class AdditionalVideoController extends Controller
{
    public function post(Request $request){
        
        $request->validate([
                'video_upld' => 'mimes:mp4,avi,wmv',
                'sub_lang' => 'required'
            ]);

       $language = CourseLanguage::where('iso_code',$request->sub_lang)->first();
       $input = [];
       $input['course_class_id'] = $request->course_class_id;
       $input['vid_lang'] = $language->name;
       $input['lang_code'] = $request->sub_lang;
       if($file = $request->file('video'))
       {
           $file_name = basename(Storage::putFile(config('path.course.video'). $request->course_id, $file , 'private'));
           $input['video_path'] = $file_name;

           $response = Http::withHeaders([
               'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
               'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
           ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
               'url' => Storage::temporaryUrl(config('path.course.video'). $request->course_id.'/'.$file_name, now()->addMinutes(60)),
               'meta' => [
                   'name' => $file_name
               ],
               "requireSignedURLs" => true,
               // "allowedorigins" => ["*.lila.com","localhost"],
           ]);
           
           if($response->successful()){
               $res = $response->json();
               $video['stream_url'] = $res['result']['uid'];
           }

       }

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
