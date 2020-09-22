<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Announcement extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $url;
    public $img;
    public $event;
    public $timestamp;

    public function __construct($url, $img, $event, $timestamp)
    {
        $this->url = $url;
        $this->img = $img;
        $this->event = $event;
        $this->timestamp = $timestamp;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.announcement');
    }
}
