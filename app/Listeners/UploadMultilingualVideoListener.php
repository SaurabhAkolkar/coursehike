<?php

namespace App\Listeners;

use App\Events\UploadMultilingualVideoToCloudEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UploadMultilingualVideoListener implements ShouldQueue
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
     * @param  UploadMultilingualVideoToCloudEvent  $event
     * @return void
     */
    public function handle(UploadMultilingualVideoToCloudEvent $event)
    {
        $multilingual = $event->multilingual;

        if ($multilingual->stream_url != "") {
            Storage::delete(config('path.course.video').$multilingual->course_id.'/'.$multilingual->video);

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'.$multilingual->stream_url);            
        }

        $file_name = basename(Storage::putFile( config('path.course.video').$multilingual->course_id, Storage::disk('local')->path($event->video_local_path), 'private'));
        $multilingual->video_path = $file_name;

        $response = Http::withHeaders([
            'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
            'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
        ])->post('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/copy', [
            'url' => Storage::temporaryUrl(config('path.course.video'). $multilingual->course_id.'/'.$file_name, now()->addMinutes(10)),
            'meta' => [
                'name' => $file_name
            ],
            "requireSignedURLs" => true,
        ]);
        
        if($response->successful()){
            $res = $response->json();
            $multilingual->stream_url = $res['result']['uid'];
        }
        
        $multilingual->save();

        Storage::disk('local')->delete($event->video_local_path);
    }
}
