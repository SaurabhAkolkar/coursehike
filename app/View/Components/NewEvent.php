<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NewEvent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $timestamp;
    public $about;
    public $img;
    public $desc;
    
    public function __construct($title, $timestamp, $about, $img, $desc)
    {
        $this->title = $title;
        $this->timestamp = $timestamp;
        $this->about = $about;
        $this->img = $img;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.new-event');
    }
}
