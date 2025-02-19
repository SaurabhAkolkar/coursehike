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
     public $class;
     public $saving;
     public $slug;


    public function __construct($plan, $discount, $oldPrice, $class, $saving, $slug)
    {
        $this->plan =  $plan;
        $this->discount = $discount;
        $this->oldPrice = $oldPrice;
        $this->class = $class;
        $this->saving = $saving;
        $this->slug = $slug;
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
