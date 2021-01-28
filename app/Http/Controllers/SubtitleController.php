<?php

namespace App\Http\Controllers;

use App\CourseClass;
use Illuminate\Http\Request;
use App\Subtitle;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SubtitleController extends Controller
{
    public function post(Request $request,$id)
    {
    	if($request->has('sub_t')){
            foreach($request->file('sub_t') as $key=> $file)
            {
                $file_name = basename(Storage::putFile(config('path.course.subtitles'). $id, $file, 'private'));

                $video = CourseClass::findOrFail($id);
                $response = Http::withHeaders([
                    'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                    'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
                ])->attach(
                    'file', file_get_contents($file), 'subtile.vtt'
                )->put('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'. $video->stream_url.'/captions/'.$request->sub_lang[$key]);
                
                if($response->successful()){
                    $response->json();
                }

                $form= new Subtitle();
                $form->sub_lang = $request->sub_lang[$key];
                $form->file_url=$file_name;
                $form->c_id = $id;
                $form->save();
            }
        }

        return back()->with('success','Subtitle added !');
    }

    public function delete($id)
    {
    	$record = Subtitle::findorfail($id);
        $exists = Storage::exists(config('path.course.subtitles'). $record->c_id .'/'. $record->file_url);
        // dd($exists, config('path.course.subtitles'). $record->c_id .'/'. $record->file_url);
        if ($exists){
            Storage::delete(config('path.course.subtitles'). $record->c_id .'/'. $record->file_url);

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'. $record->courseclass->stream_url.'/captions/'.$record->sub_lang);
            
            // dd($response->json());
            if($response->successful()){
                $response->json();
            }
        }
        $record->delete();
         
    	return back()->with('deleted','Subtitle has been deleted !');
    }
}
