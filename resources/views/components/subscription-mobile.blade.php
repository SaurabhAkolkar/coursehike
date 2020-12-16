 <!-- For Mobile Version-->
 <div class="la-purchaseh__items-mobile d-block d-lg-none">
    <div class="la-rto__item d-flex justify-content-between mb-4 " >           
        <div class="la-rto__categories text-sm">
            <div class="la-rto__item-title text-2xl mb-6 la-anim__stagger-item--x"> {{ $subscription }} </div>
            <a class="la-purchaseh__item-invoice la-anim__stagger-item--x" role="button" target="_blank" href= {{ $invoiceUrl }}> {{ $invoice }} 
                <span class="la-icon icon-download la-purchaseh__item-download"  ></span>
            </a>
        </div>

        <div class="la-rto__item-paystatus pt-2 la-anim__stagger-item--x">{{ $paystatus }} </div>
    </div>

    <div class="la-purchaseh__label-mobile d-flex justify-content-between">
        <p class="text-md la-anim__stagger-item--x">Purchase Date</p>
        <div class="la-rto__item-fromdate text-md la-anim__stagger-item--x">{{ $fromdate }} </div>
    </div>

    <div class="la-purchaseh__label-mobile d-flex justify-content-between">
        <p class="text-md la-anim__stagger-item--x">Expiry Date</p>
        <div class="la-rto__item-todate text-md la-anim__stagger-item--x">{{ $todate }} </div>
    </div>

    <div class="la-purchaseh__label-mobile d-flex justify-content-between">
        <p class="text-md la-anim__stagger-item--x">Paid Amount</p>
        <div class="la-rto__item-total la-anim__stagger-item--x">$ {{ $total }} </div>
    </div>

    <div class="la-purchaseh__label-mobile d-flex justify-content-between">
        <p class="text-md la-anim__stagger-item--x">Payment Method</p>
        <div class="la-rto__item-paymode la-anim__stagger-item--x">{{ $paymode }} </div>
    </div>

    <div class="la-purchaseh__label-mobile d-flex justify-content-between">
        <p class="text-md la-anim__stagger-item--x">Actions</p>
        <a class="la-rto__item-actions la-anim__stagger-item--x" href={{ $renewUrl }} > {{ $renew }} </a>
    </div>

  </div>