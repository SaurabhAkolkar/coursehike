<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Handpicked extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $hpImg;
    public $hpCourse;
    public $hpCname;
    public $hpUrl;
    public function __construct($hpImg, $hpCourse, $hpCname, $hpUrl)
    {
        $this->hpImg = $hpImg;
        $this->hpCourse = $hpCourse;
        $this->hpCname = $hpCname;
        $this->hpUrl = $hpUrl;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.handpicked');
    }
}
