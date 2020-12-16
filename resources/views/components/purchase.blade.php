<div class="la-puchaseh__items d-none d-lg-block">
    <div class="la-purchaseh__item row align-items-center pb-8">           
        <div class="col-lg-4 la-anim__stagger-item--x">
            <div class="la-purchaseh__item-info d-flex align-items-center">
                <div class="col la-purchaseh__item-img px-0">
                    <img class="d-inline-block" src= {{ $img }}  alt= {{ $course }}  />
                </div>
                <div class="col la-purcaseh__item-by la-anim__stagger-item--x">
                    <div class="la-purchaseh__item-title text-lg text-md-xl"> {{ $course }} </div>
                    <div class="la-purchaseh__item-author">by <span>{{ $creator }}</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1 text-center la-anim__stagger-item--x">
            <div class="la-purchaseh__item-date text-md">{{ $date }}</div>
        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-1 text-center la-anim__stagger-item--x">
            <div class="la-purchaseh__item-paymode"> {{ $paymode }}</div>
        </div>

        <div class="col-lg-1 px-0 text-center la-anim__stagger-item--x">
            <div class="la-purchaseh__item-total">$ {{ $total }}</div>
        </div>

        <div class="col-lg-1 text-center la-anim__stagger-item--x">
            <div class="la-purchaseh__item-paystatus">{{ $paystatus }}</div>
        </div>

        <div class="col-lg-1 p-0 text-right la-anim__stagger-item--x">
            <a class="la-purchaseh__item-invoice" role="button" target="_blank" href= {{ $invoiceUrl }}>{{ $invoice }}
                <span class="la-icon icon-download la-purchaseh__item-download" ></span>
            </a>
        </div>
    </div>
  </div>