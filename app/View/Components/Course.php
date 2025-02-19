<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Course extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $img;
    public $course;
    public $rating;
    public $url;
    public $creatorImg;
    public $creatorName;
    public $creatorUrl;
    public $addedToWhishList;
    public $removeFromPlaylist;
    public $learnerCount;
    public $price;
    public $bought;
    public $checkWishList;
    public $checkCart;
    public $wishlistId;
    public $videoCount;
    public $chapterCount;
    public $progress;


    public function __construct($id, $img, $videoCount = 0, $progress, $chapterCount = 0, $wishlistId=false, $checkWishList, $checkCart, $bought, $course, $price, $learnerCount, $rating, $url, $creatorImg, $creatorName, $creatorUrl, $addedToWhishList=false, $removeFromPlaylist = false)
    // public function __construct()
    {
        $this->id = $id;
        $this->img = $img;
        $this->course = $course;
        $this->rating = $rating;
        $this->url = $url;
        $this->creatorImg = $creatorImg;
        $this->creatorName = $creatorName;
        $this->creatorUrl = $creatorUrl;
        $this->addedToWhishList = false;
        $this->addedToWhishList = $addedToWhishList;
        $this->removeFromPlaylist = false;
        $this->removeFromPlaylist = $removeFromPlaylist;
        $this->wishlistId = false;
        $this->wishlistId = $wishlistId;
        $this->learnerCount = $learnerCount;
        $this->price = $price;
        $this->bought = $bought;
        $this->checkWishList = $checkWishList;
        $this->checkCart = $checkCart;
        $this->videoCount = $videoCount;
        $this->chapterCount = $chapterCount;
        $this->progress = $progress;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.course');
    }
}
