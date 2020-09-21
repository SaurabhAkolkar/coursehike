<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    
    
    public $title;
    public $desc;
    public $badgeImg;
    public $count;

    public function __construct($title, $desc, $badgeImg, $count)
    {
       $this->title= $title;
       $this->desc= $desc;
       $this->badgeImg= $badgeImg;
       $this->count= $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.badge');
    }
}
