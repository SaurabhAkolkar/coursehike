<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RentMobile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $img;
    public $classes;
    public $course;
    public $creator;
    public $id;
    public $fromdate;
    public $todate;
    public $paymode;
    public $total;
    public $paystatus;
    public $invoice;
    public $invoiceUrl;
    public $upgrade;
    public $upgradeUrl;

    public function __construct( $img, $classes, $course, $creator, $id, $fromdate, $todate, $paymode, $total, $paystatus, $invoice, $invoiceUrl, $upgrade, $upgradeUrl)
    {
        
        $this->img = $img;
        $this->classes = $classes;
        $this->course = $course;
        $this->creator = $creator;
        $this->id = $id;
        $this->fromdate = $fromdate;
        $this->todate = $todate;
        $this->paymode = $paymode;
        $this->total = $total;
        $this->paystatus = $paystatus;
        $this->invoice = $invoice;
        $this->invoiceUrl = $invoiceUrl;
        $this->upgrade = $upgrade;
        $this->upgradeUrl = $upgradeUrl;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.rent-mobile');
    }
}
