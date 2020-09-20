<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubscriptionMobile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $subscription;
    public $fromdate;
    public $todate;
    public $paymode;
    public $total;
    public $paystatus;
    public $invoice;
    public $invoiceUrl;
    public $renew;
    public $renewUrl;

    public function __construct($subscription, $fromdate, $todate, $paymode, $total, $paystatus, $invoice, $invoiceUrl, $renew, $renewUrl)
    {
        $this->subscription = $subscription;
        $this->fromdate = $fromdate;
        $this->todate = $todate;
        $this->paymode = $paymode;
        $this->total = $total;
        $this->paystatus = $paystatus;
        $this->invoice = $invoice;
        $this->invoiceUrl = $invoiceUrl;
        $this->renew = $renew;
        $this->renewUrl = $renewUrl;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.subscription-mobile');
    }
}
