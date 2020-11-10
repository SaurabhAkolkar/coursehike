<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ClassVideo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id, $title, $thumbnail, $detail, $author, $watchduration, $statuspercentage, $access;

    public function __construct($id, $title, $thumbnail, $detail, $author, $watchduration, $statuspercentage, $access)
    {
        $this->id =  $id;
        $this->title =  $title;
        $this->thumbnail = $thumbnail;
        $this->detail = $detail;
        $this->author = $author;
        $this->watchduration = $watchduration;
        $this->statuspercentage = $statuspercentage;
        $this->access = $access;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.class-video');
    }
}
