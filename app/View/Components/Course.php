<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Course extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $img;
    public $course;
    public $rating;
    public $url;
    public $creatorImg;
    public $creatorName;
    public $creatorUrl;

    public function __construct($img, $course, $rating, $url, $creatorImg, $creatorName, $creatorUrl)
    {
        $this->img = $img;
        $this->course = $course;
        $this->rating = $rating;
        $this->url = $url;
        $this->creatorImg = $creatorImg;
        $this->creatorName = $creatorName;
        $this->creatorUrl = $creatorUrl;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.course');
    }
}
