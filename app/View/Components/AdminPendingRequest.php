<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminPendingRequest extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sr;
    public $creatorName;
    public $courseName;
    public $dateOn;
    public $requestType;

    public function __construct($sr, $creatorName, $courseName, $dateOn, $requestType)
    {
        $this->sr = $sr;
        $this->creatorName = $creatorName;
        $this->courseName = $courseName;
        $this->dateOn = $dateOn;
        $this->requestType = $requestType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin-pending-request');
    }
}
