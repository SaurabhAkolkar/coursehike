<?php

namespace App\Listeners;

use App\Events\UploadFileToCloudEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Http\UploadedFile;
use Storage;
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
        return $this->saveFileToS3($event->file, $event->course_id);
    }


    protected function saveFileToS3($file, $course_id)
    {
        $fileName = $this->createFilename($file);
        // $disk = Storage::disk('s3');
        // It's better to use streaming Streaming (laravel 5.4+)
        $file_name = basename(Storage::putFile(config('path.course.video').$course_id, $file , 'private'));

        // $disk->putFileAs('photos', $file, $fileName);
        // for older laravel
        // $disk->put($fileName, file_get_contents($file), 'public');
        $mime = str_replace('/', '-', $file->getMimeType());
        // We need to delete the file when uploaded to s3
        unlink($file->getPathname());
        return response()->json([
            'path' => $fileName,
            'name' => $fileName,
            'mime_type' =>$mime
        ]);
    }

    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    protected function createFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = str_replace(".".$extension, "", $file->getClientOriginalName()); // Filename without extension
        // Add timestamp hash to name of the file
        $filename .= "_" . md5(time()) . "." . $extension;
        return $filename;
    }
}
