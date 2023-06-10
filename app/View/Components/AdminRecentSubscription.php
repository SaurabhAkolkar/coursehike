<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminRecentSubscription extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $userImg;
    public $userName;
    public $userTag;
    public $userDate;

    public function __construct($userImg, $userName, $userTag, $userDate)
    {
        $this->userImg = $userImg;
        $this->userName = $userName;
        $this->userTag = $userTag;
        $this->userDate = $userDate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin-recent-subscription');
    }
}
