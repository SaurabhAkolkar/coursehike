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
            <div class="la-purchaseh__item-total text-sm text-md-md">$ {{ $total }}</div>
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