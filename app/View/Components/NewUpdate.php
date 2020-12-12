<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NewUpdate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $img;
    public $title;
    public $timestamp;
    public $updateId;
    public $desc;

    public function __construct($img, $title, $timestamp,  $updateId, $desc)
    {
        $this->img = $img;
        $this->title = $title;
        $this->timestamp = $timestamp;
        $this->updateId = $updateId;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.new-update');
    }
}
