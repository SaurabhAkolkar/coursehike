<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Cart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $courseImg;
    public $collapseId;
    public $course;
    public $creator;
    public $remove;
    public $removeUrl;
    public $wishlist;
    public $wishlistUrl;
    public $edit;
    public $allClasses;
    public $bestPrice;
    public $realPrice;
    public $courseId;
    public $classType;
    public $cartId;
    public $cart;


    public function __construct($courseImg, $cart, $collapseId, $course, $creator, $remove, $removeUrl, $wishlist, $wishlistUrl, $edit, $allClasses, $bestPrice, $realPrice, $courseId, $classType, $cartId)
    {
        $this->courseImg = $courseImg;
        $this->collapseId = $collapseId;
        $this->course = $course;
        $this->creator = $creator;
        $this->remove = $remove;
        $this->removeUrl = $removeUrl;
        $this->wishlist = $wishlist;
        $this->wishlistUrl = $wishlistUrl;
        $this->edit = $edit;
        $this->allClasses = $allClasses;
        $this->bestPrice = $bestPrice;
        $this->realPrice = $realPrice;
        $this->courseId = $courseId;
        $this->classType = $classType;
        $this->cartId = $cartId;
        $this->cart = $cart;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cart');
    }
}
