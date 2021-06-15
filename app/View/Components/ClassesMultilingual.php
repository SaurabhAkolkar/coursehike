<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ClassesMultilingual extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $img;
    public $title;
    public $url;
    public $creatorName;
    public $creatorUrl;
    public $videoCount;
    public $chapterCount;
    public $duration;   

    public function __construct($id, $img, $title, $url, $creatorName, $creatorUrl, $videoCount, $chapterCount, $duration)
    {
        $this->id = $id;
        $this->img = $img;
        $this->title = $title;
        $this->url = $url;
        $this->creatorName = $creatorName;
        $this->creatorUrl = $creatorUrl;
        $this->videoCount = $videoCount;
        $this->chapterCount = $chapterCount;
        $this->duration = $duration;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.classes-multilingual');
    }
}
