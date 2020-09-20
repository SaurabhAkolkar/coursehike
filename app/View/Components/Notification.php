<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Notification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $url;
    public $img;
    public $name;
    public $comment;
    public $timestamp;
     
    public function __construct($url, $img, $name, $comment, $timestamp)
    {
       $this->url = $url;
       $this->img = $img;
       $this->name = $name;
       $this->comment = $comment;
       $this->timestamp = $timestamp;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.notification');
    }
}
