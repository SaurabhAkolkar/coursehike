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

    public $creatorId;
    public $creatorName;
    public $courseId;
    public $courseName;
    public $dateOn;
    public $requestType;

    public function __construct($creatorId, $creatorName, $courseId, $courseName, $dateOn, $requestType)
    {
        $this->creatorId = $creatorId;
        $this->creatorName = $creatorName;
        $this->courseId = $courseId;
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
