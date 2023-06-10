<?php

namespace App\Listeners;

use App\Events\UploadFileToCloudEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;
use Illuminate\Support\Facades\Http;

class UploadFileListener implements ShouldQueue
{

    public $timeout = 600;
    public $tries = 5;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UploadFileToCloudEvent  $event
     * @return void
     */
    public function handle(UploadFileToCloudEvent $event)
    {
        $courseclass = $event->courseclass;

        if ($courseclass->stream_url != "") {
            Storage::delete(config('path.course.video').$courseclass->course_id.'/'.$courseclass->video);

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'.$courseclass->stream_url);            
        }

        $file_name = basename(Storage::putFile( config('path.course.video').$courseclass->course_id, Storage::disk('local')->path($event->video_local_path) , 'private'));
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
        ]);
        
        if($response->successful()){
            $res = $response->json();
            $courseclass->stream_url = $res['result']['uid'];
        }
        
        $courseclass->save();

        Storage::disk('local')->delete($event->video_local_path);
    }
}
