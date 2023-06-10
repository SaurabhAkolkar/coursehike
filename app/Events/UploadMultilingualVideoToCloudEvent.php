<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UploadMultilingualVideoToCloudEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $video_local_path;
    public $multilingual;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($video_local_path, $multilingual)
    {
        $this->video_local_path = $video_local_path;
        $this->multilingual = $multilingual;
    }
}
