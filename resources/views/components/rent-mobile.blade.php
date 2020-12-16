 <!-- For Mobile Version-->
 <div class="la-purchaseh__items-mobile d-block d-lg-none">
    <div class="la-rto__item d-flex justify-content-between mb-4">           
        <div class="la-rto__item-info d-flex align-items-center">
            <div class="la-rto__item-img mr-4 la-anim__stagger-item">
                <img class="d-inline-block" src=  {{ $img }}   alt= {{ $course }}  />
            </div>
            <div class="la-purcaseh__item-by la-anim__stagger-item">  
                <div class="la-rto__categories text-sm"> {{ $classes }} </div>
                <div class="la-rto__item-title text-lg"> {{ $course }} </div>
                <div class="la-rto__item-author mb-4">by <span>  {{ $course }}   </span></div>

                <a class="la-purchaseh__item-invoice" role="button" target="_blank" href= {{$invoiceUrl}} >   {{ $invoice }}
                    <span class="la-icon icon-download la-purchaseh__item-download" ></span>
                </a>
            </div>
        </div>

        <div class="la-rto__item-paystatus la-anim__stagger-item">  {{ $paystatus}}
            <div class="la-purchaseh__item-toggler collapsed position-relative text-sm mt-16" data-toggle="collapse" href="#details_{{$id}}" aria-expanded="false">Details</div>
        </div>
    </div>

    <div class="la-purchaseh__item-content collapse mt-3 mb-8" id="details_{{$id}}">
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