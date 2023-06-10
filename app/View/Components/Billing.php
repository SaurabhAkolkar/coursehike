<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Billing extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public $inputType;
    public $inputValue;
    public $inputName;
    public $inputId;
    public $title;
    public $desc;

    public function __construct($inputType, $inputValue, $inputName, $inputId, $title, $desc)
    {
        $this->inputType = $inputType;
        $this->inputValue = $inputValue;
        $this->inputName = $inputName;
        $this->inputId = $inputId;
        $this->title = $title;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.billing');
    }
}
