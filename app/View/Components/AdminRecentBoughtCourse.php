<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminRecentBoughtCourse extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $courseImg;
    public $courseName;
    public $courseTag;
    public $courseDate;
    public $coursePrice;

    public function __construct($courseImg, $courseName, $courseTag, $courseDate, $coursePrice)
    {
        $this->courseImg = $courseImg;
        $this->courseName = $courseName;
        $this->courseTag = $courseTag;
        $this->courseDate = $courseDate;
        $this->coursePrice = $coursePrice;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin-recent-bought-course');
    }
}
