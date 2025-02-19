<div class="la-rto__items d-none d-lg-block">
    <div class="la-rto__item row align-items-center py-8">           
        <div class="col-lg-4 la-anim__stagger-item--x">
            <div class="la-rto__item-subscribed text-xl"> {{ $subscription }} </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1 text-center la-anim__stagger-item--x">
            <div class="la-rto__item-fromdate text-md"> {{ $fromdate }} </div>
        </div>

        <div class="col-lg-1 px-0 text-center la-anim__stagger-item--x">
            <div class="la-rto__item-todate text-md"> {{ $todate }} </div>
        </div>

        <div class="col-lg-1 text-center la-anim__stagger-item--x">
            <div class="la-rto__item-paymode"> {{ $paymode }} </div>
        </div>

        <div class="col-lg-1 px-0 text-center la-anim__stagger-item--x">
            <div class="la-rto__item-total">$  {{ $total }} </div>
        </div>

        <div class="col-lg-1 text-center la-anim__stagger-item--x">
            <div class="la-rto__item-paystatus"> {{ $paystatus }} </div>
        </div>

        <div class="col-lg-1 p-0 text-center la-anim__stagger-item--x">
            <a class="la-rto__item-invoice" role="button" target="_blank" href= {{ $invoiceUrl }} > {{ $invoice }} 
                <span class="la-icon icon-download la-rto__item-download"></span>
            </a>
        </div>

        <div class="col-lg-1 text-center la-anim__stagger-item--x">
            <a class="la-rto__item-actions"  href= {{ $renewUrl }} >  {{ $renew }}  </a>
        </div>
    </div>
  </div>