<div class="la-puchaseh__items">
    <div class="la-purchaseh__item row align-items-center pb-8 la-anim__stagger-item">           
        {{-- <div class="col-lg-4 ">
            <div class="la-purchaseh__item-info d-flex align-items-center">
                <div class="col la-purchaseh__item-img px-0">
                    <img class="d-inline-block" src= {{ $img }}  alt= {{ $course }}  />
                </div>
                <div class="col la-purcaseh__item-by">
                    <div class="la-purchaseh__item-title text-lg text-md-xl"> {{ $course }} </div>
                    <div class="la-purchaseh__item-author">by <span>{{ $creator }}</span></div>
                </div>
            </div>
        </div> --}}
        <div class="col-3 col-lg-4">
            <div class="la-purchaseh__item-date text-sm text-md-md">{{ $invoice }}</div>
        </div>
        {{-- <div class="col-lg-1"></div> --}}

        <div class="col-3 col-lg-2 ">
            <div class="la-purchaseh__item-date text-xs text-md-md">{{ $date }}</div>
        </div>

        {{-- <div class="col-lg-1"></div> --}}

        {{-- <div class="col-lg-1 ">
            <div class="la-purchaseh__item-paymode"> {{ $paymode }}</div>
        </div> --}}

        <div class="col-2 col-lg-1">
            <div class="la-purchaseh__item-total text-sm text-md-md"> {{ getSymbol(). $total }}</div>
        </div>

        <div class="col-2 col-lg-1">
            <div class="la-purchaseh__item-paystatus text-capitalize text-sm text-md-md">{{ $paystatus }}</div>
        </div>

        <div class="col-2 col-lg-2 ">
            <a class="la-purchaseh__item-invoice text-xs text-md-md" role="button" target="_blank" href= {{ $invoiceUrl }}>Invoice
                <span class="la-icon icon-download la-purchaseh__item-download" ></span>
            </a>
        </div>
    </div>
  </div>


  <!-- For Mobile Version-->
{{--<div class="la-purchaseh__items-mobile d-block d-lg-none">
    <div class="la-purchaseh__items d-flex justify-content-between">
        <div class="la-purchaseh__item align-items-center mb-4 ">           
            <div class="la-purchaseh__item-info d-flex align-items-start">
            <div class="la-purchaseh__item-date text-sm text-md-md">{{ $invoice }}</div>
            </div>
        </div>

        <div class="la-purchaseh__item-paystatus la-anim__stagger-item"> {{ $paystatus }}
            <div class="la-purchaseh__item-toggler collapsed position-relative text-sm mt-16" data-toggle="collapse" data-target="#purchased_{{ $id }}" aria-expanded="false" aria-controls="1">Details</div>
        </div>
    </div>
    
    <div class="la-purchaseh__item-content collapse mt-3 mb-8" id="purchased_{{ $id  }}">
        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <p class="text-md">Purchase Date</p>
            <div class="la-purchaseh__item-date text-md ml-auto">{{ $date }}</div>
        </div>

        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <p class="text-md">Paid Amount</p>
            <div class="la-purchaseh__item-total">{{ getSymbol(). $total }}</div>
        </div>

        <div class="la-purchaseh__label-mobile d-flex justify-content-between">
            <a class="la-purchaseh__item-invoice text-xs text-md-md" role="button" target="_blank" href= {{ $invoiceUrl }}>Invoice
                <span class="la-icon icon-download la-purchaseh__item-download" ></span>
            </a>
        </div>
    </div>

</div> --}}
