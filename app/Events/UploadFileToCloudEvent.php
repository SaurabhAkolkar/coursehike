<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UploadFileToCloudEvent 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $file;
    public $course_class_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($file, $course_class_id)
    {
        $this->file = $file;
        $this->course_class_id = $course_class_id;
    }

}
