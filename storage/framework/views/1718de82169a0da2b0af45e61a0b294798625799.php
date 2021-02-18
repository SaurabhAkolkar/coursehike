
<div class="la-cart__bill la-anim__stagger-item--x">
    <div class="la-cart__bill-title mb-4  ">Total</div>
    <div class="la-cart__bill-items mb-4">
        <div class="la-cart__bill-item d-flex justify-content-between mb-2 ">
            <div class="la-cart__bill-label">Total Price</div>
            <div class="la-cart__bill-amount"><?php echo e(getSymbol()); ?> <?php echo e($totalAmount); ?></div>
        </div>
        
        <div class="la-cart__bill-item d-flex justify-content-between mb-2">
            <div class="la-cart__bill-label">Sub Total</div>
            <div class="la-cart__bill-amount"><?php echo e(getSymbol()); ?> <?php echo e($subTotal); ?></div>
        </div>
        <?php if($location=='India'): ?>
                <div class="la-cart__bill-item d-flex justify-content-between mb-2">
                    <div class="la-cart__bill-label">CGST (9%)</div>
                    <div class="la-cart__bill-amount"> ₹  <?php echo e(round(($subTotal * 9 )/100, 2)); ?></div>
                </div>
                <div class="la-cart__bill-item d-flex justify-content-between mb-2">
                    <div class="la-cart__bill-label">SGST (9%)</div>
                    <div class="la-cart__bill-amount"> ₹  <?php echo e(round(($subTotal * 9 )/100, 2)); ?></div>
                </div>
        <?php endif; ?>
        
        <div class="la-cart__bill-item d-flex justify-content-between mb-2">
            <div class="la-cart__bill-label">Offer Discount</div>
            <div class="la-cart__bill-amount"><?php echo e(getSymbol()); ?> <?php echo e($offerAmount); ?></div>
        </div>

        <div class="la-cart__bill-item d-flex justify-content-between mb-2 ">
            <div class="la-cart__bill-label">Coupon Discount</div>
            <?php if($totalAmount == 0 ): ?>
                <a class="la-cart__bill-amount" role="button" disabled > 
                <span class="text text-secondary"> <?php echo e($applyCoupon); ?> </span>
                </a>
            <?php else: ?>
                <a class="la-cart__bill-amount" role="button" data-toggle="modal" data-target="#cartCoupons"> 
                    <span class="text text--purble"> <?php echo e($applyCoupon); ?> </span>
                </a>
            <?php endif; ?>
                
        </div>

        <div class="la-cart__bill-item d-flex justify-content-between">
            <div class="la-cart__bill-label">Discount Percent</div>
            <div class="la-cart__bill-amount"> <?php echo e(round(($offerAmount/($totalAmount+$offerAmount+1))*100, 2 )); ?> %</div>
        </div>
    </div>
    <div class="la-cart__bill-btn la-anim__stagger-item--x">
        <div class="la-hero__actions d-flex align-items-center justify-content-end">    
            
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e($totalAmount); ?>" name ="sub_total" />
                <input type="hidden" value="<?php echo e($offerAmount); ?>" name ="discount" />
                <?php if(Session::has('appliedCoupon')): ?>
                    <input type="hidden" value="coupon_discount" name ="discount_type" />
                    <input type="hidden" value="<?php echo e(Session::get('appliedCoupon')); ?>" name ="coupon_id" />
                <?php else: ?>
                    <input type="hidden" value="regular_discount" name ="discount_type" />
                    <input type="hidden" value="0" name ="coupon_id" />
                <?php endif; ?>
                <input type="hidden" value="5" name ="taxes" />
                <input type="hidden" value="<?php echo e($totalAmount + ($totalAmount * 5/ 100)); ?>" name ="total" />
                <input type="hidden" value="<?php echo e($totalAmount + ($totalAmount * 5/ 100)); ?>" name ="total" />
            
           
            <button id="checkout-button" type="submit"  class="w-25 la-btn__app py-3 w-100  text--black" type="button">Checkout</button>
            
        </div>
    </div>
</div>


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
                            <form action="/apply-coupon" method="post" id="apply_coupon" class="d-flex align-items-center">
                                <?php echo csrf_field(); ?>
                                <input type="text" class="la-cart__bill-input" name="coupon_name" placeholder="Enter Coupon" required/>
                                <button class="la-cart__bill-submit" onclick="$('#apply_coupon').submit()"> APPLY </button>
                            </form>
                        </div>

                        <ul class="la-cart__bill-coupons">
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="la-cart__bill-coupon"><a href="/apply-coupon/<?php echo e($coupon->id); ?>"><?php echo e($coupon->code); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                  </div>
                </div>
            </div>
            <!-- Apply Coupon Popup: End --><?php /**PATH E:\lila-laravel\resources\views/components/cart-total.blade.php ENDPATH**/ ?>