<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MyInterest extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $img;
    public $name;

    public function __construct($img, $name)
    {
        $this->img = $img;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.my-interest');
    }
}
