<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LastViewed extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $img;
    public $progress;
    public $desc;
    public $name;
    public $rating;
    public $id;
    public $slug;

    public function __construct($img, $progress, $desc, $name, $rating, $id, $slug)
    {
        $this->img = $img;
        $this->progress = $progress;
        $this->desc = $desc;
        $this->name = $name;
        $this->rating = $rating;
        $this->id = $id;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.last-viewed');
    }
}
