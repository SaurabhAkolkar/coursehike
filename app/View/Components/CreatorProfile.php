<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreatorProfile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $img;
    public $name;
    public $desc;
    public $skill;
    public $location;
    public $courses;
    public $rating;
    public $awards;
    public $facebook;
    public $google;
    public $email;

    public function __construct($img, $name, $desc, $skill, $location, $courses, $rating, $awards, $facebook, $google, $email)
    {
        $this->img = $img;
        $this->name = $name;
        $this->desc = $desc;
        $this->skill = $skill;
        $this->location = $location;
        $this->courses = $courses;
        $this->rating = $rating;
        $this->awards = $awards;
        $this->facebook = $facebook;
        $this->google = $google;
        $this->email = $email;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.creator-profile');
    }
}
