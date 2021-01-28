<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CartTotal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $totalAmount;
    public $offerAmount;
    public $applyCoupon;
    public $discountAmount;
    public $checkoutUrl;
    public $coupons;

    public function __construct($totalAmount, $offerAmount, $applyCoupon, $discountAmount, $checkoutUrl, $coupons)
    {
        $this->totalAmount = $totalAmount;
        $this->offerAmount = $offerAmount;
        $this->applyCoupon = $applyCoupon;
        $this->discountAmount = $discountAmount;
        $this->checkoutUrl = $checkoutUrl;
        $this->coupons= $coupons;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cart-total');
    }
}
