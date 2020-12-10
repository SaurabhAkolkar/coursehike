<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppUpdate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $timestamp;
    public $appId;
    public $desc;

    public function __construct($title, $timestamp, $appId, $desc)
    {
        $this->title = $title;
        $this->timestamp = $timestamp;
        $this->appId = $appId;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.app-update');
    }
}
