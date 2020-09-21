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
    public $desc;
    public $appCollapseId;

    public function __construct($title, $timestamp, $desc, $appCollapseId)
    {
        $this->title = $title;
        $this->timestamp = $timestamp;
        $this->desc = $desc;
        $this->appCollapseId = $appCollapseId;
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
