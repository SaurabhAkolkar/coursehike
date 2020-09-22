<div class="la-rto__items d-none d-lg-block">
    <div class="la-rto__item row align-items-center py-8">           
        <div class="col-lg-4">
            <div class="la-rto__item-subscribed text-xl"> {{ $subscription }} </div>
        </div>

        <div class="col-lg-2 text-center">
            <div class="la-rto__item-fromdate text-md"> {{ $fromdate }} </div>
        </div>

        <div class="col-lg-1 px-0 text-center">
            <div class="la-rto__item-todate text-md"> {{ $todate }} </div>
        </div>

        <div class="col-lg-1 text-center">
            <div class="la-rto__item-paymode"> {{ $paymode }} </div>
        </div>

        <div class="col-lg-1 px-0 text-center">
            <div class="la-rto__item-total">$  {{ $total }} </div>
        </div>

        <div class="col-lg-1 text-center">
            <div class="la-rto__item-paystatus"> {{ $paystatus }} </div>
        </div>

        <div class="col-lg-1 p-0 text-center">
            <div class="la-rto__item-invoice"> {{ $invoice }} 
                <a class="la-icon icon-download la-rto__item-download" href= {{ $invoiceUrl }} ></a>
            </div>
        </div>

        <div class="col-lg-1 text-center">
            <a class="la-rto__item-actions" href= {{ $renewUrl }} >  {{ $renew }}  </a>
        </div>
    </div>
  </div>