<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Chooseplan extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $plan;
     public $discount;
     public $oldPrice;
     public $saving;


    public function __construct($plan, $discount, $oldPrice, $saving)
    {
        $this->plan =  $plan;
        $this->discount = $discount;
        $this->oldPrice = $oldPrice;
        $this->saving = $saving;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.chooseplan');
    }
}
