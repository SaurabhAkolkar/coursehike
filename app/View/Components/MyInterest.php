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
    public $id;
    public $alreadyAdded;

    public function __construct($img, $name, $id, $alreadyAdded=false)
    {
        $this->img = $img;
        $this->name = $name;
        $this->id = $id;
        $this->alreadyAdded = $alreadyAdded;
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
