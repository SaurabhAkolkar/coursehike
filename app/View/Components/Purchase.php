<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Purchase extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $img;
    public $course;
    public $creator;
    public $date;
    public $paymode;
    public $total;
    public $paystatus;
    public $invoice;
    public $invoiceUrl;

    public function __construct($img, $course, $creator, $date, $paymode, $total, $paystatus, $invoice, $invoiceUrl)
    {
        $this->img = $img;
        $this->course = $course;
        $this->creator = $creator;
        $this->date = $date;
        $this->paymode = $paymode;
        $this->total = $total;
        $this->paystatus = $paystatus;
        $this->invoice = $invoice;
        $this->invoiceUrl = $invoiceUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.purchase');
    }
}
