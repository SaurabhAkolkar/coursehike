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
            <div class="la-cart__bill-amount"> <span class="text text--purble"> {{ $applyCoupon }} </span></div>
        </div>
        <div class="la-cart__bill-item d-flex justify-content-between">
            <div class="la-cart__bill-label">Discount Percent</div>
            <div class="la-cart__bill-amount">$ {{ $discountAmount }} </div>
        </div>
    </div>
    <div class="la-cart__bill-btn">
        <div class="la-hero__actions d-flex align-items-center justify-content-end">
            <a class="btn la-btn la-btn--secondary text--black w-100" href= {{ $checkoutUrl }}>checkout</a>
        </div>
    </div>
</div>