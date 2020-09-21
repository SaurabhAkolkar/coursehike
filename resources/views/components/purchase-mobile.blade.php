 <!-- For Mobile Version-->

<div class="la-purchaseh__items-mobile d-block d-lg-none">
    <div class="la-purchaseh__items d-flex justify-content-between">
        <div class="la-purchaseh__item align-items-center mb-4">           
            <div class="la-purchaseh__item-info d-flex align-items-start">
                <div class="la-purchaseh__item-img mr-4">
                    <img class="d-inline-block" src={{ $img }} alt= {{ $course }}>
                </div>
                <div class="la-purcaseh__item-by">
                    <div class="la-purchaseh__item-title text-2xl">{{ $course }}</div>
                    <div class="la-purchaseh__item-author">by <span>{{ $creator }}</span></div>
                    <div class="la-purchaseh__item-invoice mt-4">{{ $invoice }}
                        <a class="la-icon icon-download la-purchaseh__item-download" href= {{ $invoiceUrl }}></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="la-purchaseh__item-paystatus"> {{ $paystatus }}
            <div class="la-purchaseh__item-collapse position-relative text-sm mt-14" data-toggle="collapse" href="#id" aria-expanded="false" aria-controls="1">Details<span class="la-icon icon-arrow la-purchaseh__item-toggler"></span></div>
        </div>
    </div>
    
    <div class="la-purchaseh__item-content collapse mt-3 mb-8" id="id">
        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <p class="text-md">Purchase Date</p>
            <div class="la-purchaseh__item-date text-md ml-auto">{{ $date }}</div>
        </div>

        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <p class="text-md">Paid Amount</p>
            <div class="la-purchaseh__item-total">$ {{ $total }}</div>
        </div>

        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <p class="text-md">Payment Method</p>
            <div class="la-purchaseh__item-paymode">{{ $paymode }}</div>
        </div>
    </div>

</div>
