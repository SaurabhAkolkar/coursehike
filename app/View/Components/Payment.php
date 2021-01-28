<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Payment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $inputLabel;
    public $inputType;
    public $inputValue;
    public $inputName;
    public $inputId;
    public function __construct($inputLabel, $inputType, $inputValue, $inputName, $inputId)
    {
        $this->inputLabel = $inputLabel;
        $this->inputType = $inputType;
        $this->inputValue = $inputValue;
        $this->inputName = $inputName;
        $this->inputId = $inputId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.payment');
    }
}
