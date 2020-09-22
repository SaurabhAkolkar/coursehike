 <!-- For Mobile Version-->
 <div class="la-purchaseh__items-mobile d-block d-lg-none">
    <div class="la-rto__item d-flex justify-content-between mb-4">           
        <div class="la-rto__item-info d-flex align-items-center">
            <div class="la-rto__item-img mr-4">
                <img class="d-inline-block" src=  {{ $img }}   alt= {{ $course }}  />
            </div>
            <div class="la-purcaseh__item-by">  
                <div class="la-rto__categories text-sm"> {{ $classes }} </div>
                <div class="la-rto__item-title text-2xl"> {{ $course }} </div>
                <div class="la-rto__item-author">by <span>  {{ $course }}   </span></div>

                <div class="la-purchaseh__item-invoice mt-4">   {{ $invoice }}
                    <a class="la-icon icon-download la-purchaseh__item-download" href= {{$invoiceUrl}} ></a>
                </div>
            </div>
        </div>

        <div class="la-rto__item-paystatus">  {{ $paystatus}}
            <div class="la-purchaseh__item-collapse position-relative text-sm mt-18" data-toggle="collapse" href="#viewDetails" aria-expanded="false">Details<span class="la-icon icon-arrow la-purchaseh__item-toggler"></span></div>
        </div>
    </div>

    <div class="la-purchaseh__item-content collapse mt-3 mb-8" id="viewDetails">
        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <p class="text-md">Purchase Date</p>
            <div class="la-rto__item-fromdate text-md"> {{ $fromdate }}  </div>
        </div>

        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <p class="text-md">Expiry Date</p>
            <div class="la-rto__item-todate text-md"> {{ $todate }} </div>
        </div>

        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <p class="text-md">Paid Amount</p>
            <div class="la-rto__item-total">$  {{ $total }} </div>
        </div>

        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <p class="text-md">Payment Method</p>
            <div class="la-rto__item-paymode"> {{ $paymode }} </div>
        </div>

        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <p class="text-md">Actions</p>
            <a class="la-rto__item-actions" href= {{ $upgradeUrl }}> {{ $upgrade }} </a>
        </div>
    </div>
</div>