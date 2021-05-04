<?php

namespace App\Listeners;

use App\Events\UploadFileToCloudEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Http\UploadedFile;
use Storage;
use File;
use App\CourseClass;
use Illuminate\Support\Facades\Http;

class UploadFileListener implements ShouldQueue
{
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
        $courseclass = CourseClass::findOrFail($event->course_class_id);

        if ($courseclass->stream_url != "") {
            // $exists = Storage::exists(config('path.course.video'). $courseclass->course_id .'/'. $courseclass->video);
            // if ($exists) {
            Storage::delete(config('path.course.video').$courseclass->course_id.'/'.$courseclass->video);

            $response = Http::withHeaders([
                'X-Auth-Key' => env('CLOUDFLARE_Auth_Key'),
                'X-Auth-Email' => env('CLOUDFLARE_Auth_EMAIL'),
            ])->delete('https://api.cloudflare.com/client/v4/accounts/'.env('CLOUDFLARE_ACCOUNT_ID').'/stream/'.$courseclass->stream_url);
            // }
        }

        // $file_name = md5(microtime().rand()). time().'.'.$file->getClientOriginalExtension();
        $file_name = basename(Storage::putFileAs(config('path.course.video').$courseclass->course_id, new UploadedFile(storage_path("app/upload/course/".$event->file),$event->file), 'private'));
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
        $courseclass->save();
        // return $this->saveFileToS3($event->file, $event->course_id);
    }


    // protected function saveFileToS3($file, $course_id)
    // {
    //     // $fileName = $this->createFilename($file);
    //     // $disk = Storage::disk('s3');
    //     // It's better to use streaming Streaming (laravel 5.4+)
    //     $file_name = basename(Storage::putFile(config('path.course.video').$course_id, new File('upload/course/') , , 'private'));

    //     // $disk->putFileAs('photos', $file, $fileName);
    //     // for older laravel
    //     // $disk->put($fileName, file_get_contents($file), 'public');
    //     $mime = str_replace('/', '-', $file->getMimeType());
    //     // We need to delete the file when uploaded to s3
    //     unlink($file->getPathname());
    //     return response()->json([
    //         'path' => $fileName,
    //         'name' => $fileName,
    //         'mime_type' =>$mime
    //     ]);
    // }

    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    // protected function createFilename(UploadedFile $file)
    // {
    //     $extension = $file->getClientOriginalExtension();
    //     $filename = str_replace(".".$extension, "", $file->getClientOriginalName()); // Filename without extension
    //     // Add timestamp hash to name of the file
    //     $filename .= "_" . md5(time()) . "." . $extension;
    //     return $filename;
    // }
}
