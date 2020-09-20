
    <div class="la-cart__items">
        <div class="la-cart__items mb-8">
            <div class="la-cart__item row">
                <div class="la-cart__item-course col-md-7">
                    <div class="la-cart__item-label mb-4">Course</div>
                    <div class="la-cart__item-content d-md-flex">
                        <div class="la-cart__item-left mr-4">
                            <div class="la-cart__item-img">
                                <img src= {{ $courseImg }} alt= {{ $course }} />
                            </div>
                        </div>
                        <div class="la-cart__item-right">
                            <div class="la-cart__item-name">{{ $course }}</div>
                            <div class="la-cart__item-author mb-2">by <span>{{ $creator}}</span></div>
                            <div class="la-cart__item-actions d-flex">
                                <div class="la-cart__item-action remove"> 
                                    <a href= {{ $removeUrl }}>{{ $remove }}</a>
                                </div>
                                <div class="la-cart__item-action wishlist">
                                    <a href={{ $wishlistUrl }}>{{ $wishlist }}</a>
                                </div>
                                <div class="la-cart__item-action edit">
                                    <a href= {{ $editUrl }}> {{ $edit }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="la-cart__item-classes col-md-3">
                    <div class="la-cart__item-label mb-4">Classes</div>
                    <div class="la-cart__item-content"><span>{{ $allClasses }}</span></div>
                </div>
                <div class="la-cart__item-price col-md-2">
                    <div class="la-cart__item-label mb-4">Price</div>
                    <div class="la-cart__item-content">
                        <div class="la-soffer ml-0">
                            <div class="la-soffer__bestprice"> 
                                <sup><small>$</small></sup><span>{{ $bestPrice}}</span>
                            </div>
                            <div class="la-soffer__realprice"> 
                                <sup><small>$</small></sup><span>{{ $realPrice }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


