<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LearnerInterest extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $img;
    public $name;
    public $id;

    public function __construct($img, $name, $id)
    {
        $this->img = $img;
        $this->name = $name;
        $this->id = $id;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.learner-interest');
    }
}
