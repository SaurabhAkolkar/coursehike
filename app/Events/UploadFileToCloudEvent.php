<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UploadFileToCloudEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $video_local_path;
    public $courseclass;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($video_local_path, $courseclass)
    {
        $this->video_local_path = $video_local_path;
        $this->courseclass = $courseclass;
    }

}
