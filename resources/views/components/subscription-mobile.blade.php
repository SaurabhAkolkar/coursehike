 <!-- For Mobile Version-->
 <div class="la-purchaseh__items-mobile d-block d-lg-none">
    <div class="la-rto__item d-flex justify-content-between mb-4">           
        <div class="la-rto__categories text-sm">
            <div class="la-rto__item-title text-2xl"> {{ $subscription }} </div>
            <div class="la-purchaseh__item-invoice mt-4"> {{ $invoice }} 
                <a class="la-icon icon-download la-purchaseh__item-download" href= {{ $invoiceUrl }} ></a>
            </div>
        </div>

        <div class="la-rto__item-paystatus">{{ $paystatus }} </div>
    </div>

    <div class="la-purchaseh__label-mobile d-flex justify-content-between">
        <p class="text-md">Purchase Date</p>
        <div class="la-rto__item-fromdate text-md">{{ $fromdate }} </div>
    </div>

    <div class="la-purchaseh__label-mobile d-flex justify-content-between">
        <p class="text-md">Expiry Date</p>
        <div class="la-rto__item-todate text-md">{{ $todate }} </div>
    </div>

    <div class="la-purchaseh__label-mobile d-flex justify-content-between">
        <p class="text-md">Paid Amount</p>
        <div class="la-rto__item-total">$ {{ $total }} </div>
    </div>

    <div class="la-purchaseh__label-mobile d-flex justify-content-between">
        <p class="text-md">Payment Method</p>
        <div class="la-rto__item-paymode">{{ $paymode }} </div>
    </div>

    <div class="la-purchaseh__label-mobile d-flex justify-content-between">
        <p class="text-md">Actions</p>
        <a class="la-rto__item-actions" href={{ $renewUrl }} > {{ $renew }} </a>
    </div>

  </div>