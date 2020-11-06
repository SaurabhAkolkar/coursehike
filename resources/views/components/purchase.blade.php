<div class="la-puchaseh__items d-none d-lg-block">
    <div class="la-purchaseh__item row align-items-center pb-8">           
        <div class="col-lg-4">
            <div class="la-purchaseh__item-info d-flex align-items-center">
                <div class="la-purchaseh__item-img mr-4">
                    <img class="d-inline-block" src= {{ $img }}  alt= {{ $course }}  />
                </div>
                <div class="la-purcaseh__item-by">
                    <div class="la-purchaseh__item-title text-lg text-sm-2xl"> {{ $course }} </div>
                    <div class="la-purchaseh__item-author">by <span>{{ $creator }}</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1 text-center">
            <div class="la-purchaseh__item-date text-md">{{ $date }}</div>
        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-1 text-center">
            <div class="la-purchaseh__item-paymode"> {{ $paymode }}</div>
        </div>

        <div class="col-lg-1 px-0 text-center">
            <div class="la-purchaseh__item-total">$ {{ $total }}</div>
        </div>

        <div class="col-lg-1 text-center">
            <div class="la-purchaseh__item-paystatus">{{ $paystatus }}</div>
        </div>

        <div class="col-lg-1 p-0 text-right">
            <div class="la-purchaseh__item-invoice">{{ $invoice }}
                <a class="la-icon icon-download la-purchaseh__item-download" href= {{ $invoiceUrl }}></a>
            </div>
        </div>
    </div>
  </div>