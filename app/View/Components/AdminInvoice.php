<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminInvoice extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $img;
    public $course;
    public $profile;
    public $price;
    public function __construct($img, $course, $profile, $price)
    {
        $this->img = $img;
        $this->course = $course;
        $this->profile = $profile;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin-invoice');
    }
}
