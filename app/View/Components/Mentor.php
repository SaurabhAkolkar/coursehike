<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Mentor extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $img;
    public $name;
    public $skill;
    public $id;

    public function __construct($img, $name, $skill,$id)
    {
        $this->img = $img;
        $this->name = $name;
        $this->skill = $skill;
        $this->id = $id;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.mentor');
    }
}
