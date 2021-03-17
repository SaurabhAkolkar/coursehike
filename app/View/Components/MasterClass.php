<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MasterClass extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $img;
    public $title;
    public $profileImg;
    public $profileName;
    public $learners;
    public $id;
    public $slug;
    public $price;
    public $bought;
    public $checkCart;
    public $checkWishList;

    public function __construct($img, $title, $checkWishList, $checkCart,$profileImg, $price, $bought, $profileName, $learners, $id, $slug)
    {
        $this->img = $img;
        $this->title = $title;
        $this->profileImg = $profileImg;
        $this->profileName = $profileName;
        $this->learners = $learners;
        $this->slug = $slug;
        $this->id = $id;
        $this->price = $price;
        $this->bought = $bought;
        $this->checkWishList = $checkWishList;
        $this->checkCart = $checkCart;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.master-class');
    }
}
