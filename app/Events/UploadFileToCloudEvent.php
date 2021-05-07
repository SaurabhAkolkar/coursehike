<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UploadFileToCloudEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $timeout = 600;
    public $tries = 5;

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
