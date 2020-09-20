<div class="la-rto__items d-none d-lg-block">
    <div class="la-rto__item row align-items-center pb-8">           
        <div class="col-lg-4">
            <div class="la-rto__item-info d-flex align-items-center">
                <div class="la-rto__item-img mr-4">
                    <img class="d-inline-block" src= {{ $img }}   alt= {{ $course }} />
                </div>
                <div class="la-purcaseh__item-by">  
                    <div class="la-rto__categories text-sm"> {{ $classes }} </div>
                    <div class="la-rto__item-title text-2xl"> {{ $course }} </div>
                    <div class="la-rto__item-author">by <span> {{ $creator }} </span></div>
                </div>
            </div>
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
            <div class="la-rto__item-total">$ {{ $total }} </div>
        </div>

        <div class="col-lg-1 text-center">
            <div class="la-rto__item-paystatus"> {{ $paystatus }} </div>
        </div>

        <div class="col-lg-1 p-0 text-center">
            <div class="la-rto__item-invoice">{{ $invoice}}
                <a class="la-icon icon-download la-rto__item-download" href= {{ $invoiceUrl}} ></a>
            </div>
        </div>

        <div class="col-lg-1 text-center">
            <a class="la-rto__item-actions" href= {{ $upgradeUrl }} >  {{ $upgrade }}  </a>
        </div>
    </div>
</div>