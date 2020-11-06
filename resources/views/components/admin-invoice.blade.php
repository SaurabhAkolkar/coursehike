<li class="la-admin__invoice-items d-flex justify-content-between align-items-center">
    <div class="la-admin__item-info d-flex justify-content-between align-items-center"> 
        <div class="la-admin__item-img mr-5">
            <img src= {{ $img }} alt= {{ $course }} class="img-fluid" />
        </div>

        <div class="la-admin__item-desc">
            <strong>{{ $course }}</strong> <br/>
            <span>by {{ $profile }} </span>
        </div>
    </div>

    <div class="la-admin__item-price">$ <span>{{ $price }}</span></div>
</li>