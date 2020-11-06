<div class="la-cart__bill">
    <div class="la-cart__bill-title mb-4">Total</div>
    <div class="la-cart__bill-items mb-4">
        <div class="la-cart__bill-item d-flex justify-content-between mb-2">
            <div class="la-cart__bill-label">Total Price</div>
            <div class="la-cart__bill-amount">$ {{ $totalAmount }}</div>
        </div>
        <div class="la-cart__bill-item d-flex justify-content-between mb-2">
            <div class="la-cart__bill-label">Offer Discount</div>
            <div class="la-cart__bill-amount">$ {{ $offerAmount }}</div>
        </div>
        <div class="la-cart__bill-item d-flex justify-content-between mb-2">
            <div class="la-cart__bill-label">Coupon Discount</div>
            <a class="la-cart__bill-amount" role="button" data-toggle="modal" data-target="#cartCoupons"> 
                <span class="text text--purble"> {{ $applyCoupon }} </span>
            </a>

            <!-- Apply Coupon Popup: Start -->
            <div class="modal fade la-cart__bill-modal" id="cartCoupons">
                <div class="modal-dialog la-cart__bill-mdialog">
                  <div class="modal-content la-cart__bill-mcontent">
                  
                    <div class="modal-header la-cart__bill-mheader">
                      <h4 class="modal-title la-cart__bill-mtitle">Add Coupon</h4>
                      <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                    </div>
                    
                    <div class="modal-body la-cart__bill-mbody">
                        <div class="la-cart__bill-mapply">
                            <input type="text" class="la-cart__bill-input" name="enterCoupon" placeholder="Enter Coupon" />
                            <button class="la-cart__bill-submit" > APPLY </button>
                        </div>

                        <ul class="la-cart__bill-coupons">
                            <li class="la-cart__bill-coupon">Coupon A</li>
                            <li class="la-cart__bill-coupon">Coupon B</li>
                            <li class="la-cart__bill-coupon">Coupon C</li>
                            <li class="la-cart__bill-coupon">Coupon D</li>
                            <li class="la-cart__bill-coupon">Coupon E</li>
                            <li class="la-cart__bill-coupon">Coupon F</li>
                            <li class="la-cart__bill-coupon">Coupon G</li>
                            <li class="la-cart__bill-coupon">Coupon H</li>
                        </ul>
                    </div>
                  </div>
                </div>
            </div>
            <!-- Apply Coupon Popup: End -->
        </div>

        <div class="la-cart__bill-item d-flex justify-content-between">
            <div class="la-cart__bill-label">Discount Percent</div>
            <div class="la-cart__bill-amount">$ {{ $discountAmount }} </div>
        </div>
    </div>
    <div class="la-cart__bill-btn">
        <div class="la-hero__actions d-flex align-items-center justify-content-end">
            <a class="la-btn__app text--black w-100 px-18 py-3" href= {{ $checkoutUrl }}>checkout</a>
        </div>
    </div>
</div>