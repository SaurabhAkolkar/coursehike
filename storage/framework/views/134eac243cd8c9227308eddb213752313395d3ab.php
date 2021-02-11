<?php $__env->startSection('content'); ?>
<div class="la-profile">
    <div class="la-profile__wrap">
    
       <!-- Side Navbar: Start -->
       <?php echo $__env->make('learners.pages.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <!-- Side Navbar: End -->

      <div class="la-profile__main">
        <div class="container ">
          <div class="la-profile__main-inner">
              <?php if(session('message')): ?>
              <div class="la-btn__alert position-relative">
                <div class="la-btn__alert-success col-lg-4 offset-lg-2  alert alert-success alert-dismissible" role="alert">
                    <span class="la-btn__alert-msg"><?php echo e(session('message')); ?></span>
                    <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" style="color:#56188C">&times;</span>
                    </button>
                </div>
              </div>
            <?php endif; ?>
            <div class="la-profile__title-wrap la-anim__wrap">
              <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5 la-anim__stagger-item--x" href="<?php echo e(URL::previous()); ?>"></a>
              <h1 class="la-profile__title la-anim__stagger-item">Cart</h1>
            </div>

            <section class="la-section la-cart__sec pt-0">
              <div class="la-cart__inner">
                <div class="la-cart__row">
                  <div class="row flex-column-reverse flex-md-row">
                    <!-- Cousre Cart:  Start -->
                      <?php
                        $courseImg = "https://picsum.photos/160/85";
                        $edit = 'Edit';
                        $wishlist ='Move to Wishlist';
                        $remove = 'Remove';
                    ?>

                    <div class="col-lg-8 ">
                      <div class="la-anim__wrap">
                        <h2 class="la-cart__title text-2xl d-block d-md-none pt-14 pb-3 la-anim__stagger-item">
                            Courses in the Cart
                        </h2>
                      </div>

                      <?php if(count($carts) > 0): ?>
                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if (isset($component)) { $__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Cart::class, ['cartId' => $cart->id,'cart' => $cart,'courseId' => $cart->course_id,'collapseId' => $cart->collapseId,'courseImg' => $cart->courses->preview_image,'classType' => $cart->cartItems->first()->purchase_type,'course' => $cart->courses->title,'creator' => $cart->courses->user->fullName,'remove' => $remove,'removeUrl' => 'remove-from-cart/'.$cart->id,'wishlist' => $wishlist,'wishlistUrl' => 'move-to-wishlist/'.$cart->course_id,'edit' => $edit,'allClasses' => $cart->allClasses,'bestPrice' => $cart->price,'realPrice' => $cart->offer_price]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50)): ?>
<?php $component = $__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50; ?>
<?php unset($__componentOriginalf4b4cbd14aa875689d096f75790a47118f19ba50); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php else: ?>
                          <div class="d-flex justify-content-center align-items-center la-anim__wrap ">
                              <h2 class="text-center my-20 py-10 la-anim__stagger-item" style="color: var(--gray8);">Cart is empty</h2>
                          </div>
                      <?php endif; ?>
                      
                    </div>
                    <!-- Cousre Cart:  End -->

                    <div class="col-lg-4 mb-5 mb-md-0 la-anim__wrap">
                      <div class="la-profile__title body-font text-xl  la-anim__stagger-item--x">Billing Address</div>
                      <form class="form-row la-payment__form-row pb-10">                        
                            <?php
                                $address1 = new stdClass;
                                $address1->inputLabel = "House No./Street/Area";
                                $address1->inputType = "text";
                                $address1->inputValue = "H.No:7/52,BDD,Worli,Mumbai";
                                $address1->inputName = "street_name";
                                $address1->inputId = "bill-address";
                                $address1->value = "bill-address";

                                $address3 = new stdClass;
                                $address3->inputLabel = "State";
                                $address3->inputType = "text";
                                $address3->inputValue = "Maharastra";
                                $address3->inputName = "state";
                                $address3->inputId = "bill-state";

                                $address4 = new stdClass;
                                $address4->inputLabel = "City";
                                $address4->inputType = "text";
                                $address4->inputValue = "Mumbai";
                                $address4->inputName = "city";
                                $address4->inputId = "bill-city";

                                $address5 = new stdClass;
                                $address5->inputLabel = "Zip Code";
                                $address5->inputType = "number";
                                $address5->inputValue = "500073";
                                $address5->inputName = "zipcode";
                                $address5->inputId = "bill-zipcode";


                                $countries = [];
                                $addresses = array( $address3, $address4, $address5);
                            ?>

                            <div class="col-12 col-md-12">
                                 <?php if (isset($component)) { $__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Payment::class, ['inputLabel' => $address1->inputLabel,'inputType' => $address1->inputType,'inputValue' => $address1->inputValue,'inputName' => $address1->inputName,'inputId' => $address1->inputId]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47)): ?>
<?php $component = $__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47; ?>
<?php unset($__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                            </div>

                            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-md-6">
                                     <?php if (isset($component)) { $__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Payment::class, ['inputLabel' => $address->inputLabel,'inputType' => $address->inputType,'inputValue' => $address->inputValue,'inputName' => $address->inputName,'inputId' => $address->inputId]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47)): ?>
<?php $component = $__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47; ?>
<?php unset($__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="col-12 col-md-6">
                                <div class="la-payment__card la-anim__stagger-item--x">
                                    <label class="la-payment__card-label text-sm">Country <span style="color:var(--danger);">*</span></label>
                                    <select name="country" class="form-control select2 la-payment__card-input">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->iso); ?>" <?php echo e((old("country") == $country->iso ? "selected":"")); ?>>
                                            <?php echo e($country->nicename); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            
                        </form>
                      

                        <!-- Cart Checkout: Start -->
                        <?php
                            $checkout = new stdClass;
                            $checkout->totalAmount = 39;
                            $checkout->offerAmount = 10;
                            $checkout->applyCoupon = "Apply Coupon";
                            $appliedCoupon = null;
                            if(Session::get('appliedCoupon')){
                              $checkout->applyCoupon = $coupon->code;
                            }

                            $checkout->discountAmount = 10;
                            $checkout->checkoutUrl = "";

                            $checkouts = array($checkout);
                        ?>

                        <?php if(count($carts) > 0): ?>
                        
                             <?php if (isset($component)) { $__componentOriginal45365d94e67667781c0f00aa4c64f2e796633235 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CartTotal::class, ['totalAmount' => $total,'offerAmount' => $discount,'applyCoupon' => $checkout->applyCoupon,'coupons' => $coupons,'discountAmount' => $checkout->discountAmount,'checkoutUrl' => $checkout->checkoutUrl]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal45365d94e67667781c0f00aa4c64f2e796633235)): ?>
<?php $component = $__componentOriginal45365d94e67667781c0f00aa4c64f2e796633235; ?>
<?php unset($__componentOriginal45365d94e67667781c0f00aa4c64f2e796633235); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        
                        <!-- Cart Checkout: End -->
                        <?php endif; ?>

                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="la-section la-cart__product pt-0 la-anim__wrap">
              <div class="la-cart__product-title la-cart__product-title--light la-anim__stagger-item">
                <h2>You might also like</h2>
              </div>

              <!-- playlist : Start  -->
                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.add-to-playlist','data' => ['playlists' => $playlists]]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['playlists' => $playlists]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
              <!-- Playlist : End -->
              
              <?php if(count($suggested_courses) == 0): ?>

                <div class="la-empty__courses w-100 d-md-flex justify-content-between align-items-center mt-0 mt-md-6 la-anim__stagger-item">
                  <div class="col la-empty__inner">
                    <h6 class="la-empty__course-title text-xl la-anim__stagger-item--x">No more courses available right now!</h6>
                  </div>
                </div>  
              <?php else: ?>

                <div class="row row-cols-lg-4 la-anim__stagger-item">
                  <?php $__currentLoopData = $suggested_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $sc->id,'img' => $sc->preview_image,'course' => $sc->title,'url' => $sc->slug,'rating' => round($sc->average_rating, 2),'creatorImg' => $sc->user->user_img,'creatorName' => $sc->user->fname,'creatorUrl' => $sc->user->id,'learnerCount' => $sc->learnerCount]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706)): ?>
<?php $component = $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706; ?>
<?php unset($__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                  <div class="col-md-6 col-lg-3 la-anim__stagger-item--x">
                      <div class=" la-btn__plain text--burple text-md h-75 d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8 la-anim__fade-in-right">
                          <a href="/browse/courses" >explore more<span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                        </div>
                      </div>
                  </div>
                </div>

              <?php endif; ?>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScripts'); ?>
<script src="https://js.stripe.com/v3/"></script>
<script>    
  function checkBoxs(type, id){
        if(type == 'all'){
            $('.selected_classes'+id).prop('checked', true);
        }
        if(type =='selected'){
            $('.selected_classes'+id).prop('checked', false);
        }

  }

  function changeInputs(){

    $('.cart_radio_button').attr('name','classes');
    
  }
  </script>

<script>
    <?php if(session('couponModal')): ?> 
        $('#cartCoupons').modal('show');
    <?php endif; ?>

  // Create a Stripe client.
  var stripe = Stripe('<?php echo e(env("STRIPE_KEY")); ?>');

  var checkoutButton = document.getElementById('checkout-button');
  checkoutButton.addEventListener("click", function () {

    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url: "/stripe-checkout",
      // data: {playlist_name: playlistName, ajax_request: true},
      success:function(session){
        stripe.redirectToCheckout({ sessionId: session.id });
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
 
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/learners/pages/cart.blade.php ENDPATH**/ ?>