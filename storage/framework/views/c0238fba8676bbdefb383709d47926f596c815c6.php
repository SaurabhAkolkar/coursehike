<?php $__env->startSection('content'); ?>
<div class="la-profile">
    <div class="la-profile__wrap">
      
      <!-- Side Navbar: Start -->
      <?php echo $__env->make('learners.pages.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Side Navbar: End -->  
        <div class="la-profile__main">
            <div class="container la-anim__wrap">
                <div class="la-profile__main-inner">
                    <div class="la-profile__title-wrap la-anim__stagger-item">
                        <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="<?php echo e(URL::previous()); ?>"></a>
                        <h1 class="la-profile__title m-0">Billing Address</h1>
                    </div>

                    <section class="la-profile__form">
                        <div class="la-profile__form-inner pb-8 pb-md-20">
                            <form class="la-form" action="">
                                <div class="row la-anim__wrap">
                                    <div class="col-md-6 la-anim__stagger-item--x">
                                        <div class="la-form__input-wrap">
                                            <div class="la-form__lable la-form__lable--medium mb-2">First Name <span style="color:var(--danger);">*</span></div>
                                            <input class="la-form__input" type="text" value="" name="c_fname" placeholder="First Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6 la-anim__stagger-item--x">
                                        <div class="la-form__input-wrap">
                                            <div class="la-form__lable la-form__lable--medium mb-2">Last Name <span style="color:var(--danger);">*</span></div>
                                            <input class="la-form__input" type="text" value="" name="c_lname" placeholder="Last Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6 la-anim__stagger-item--x">
                                        <div class="la-form__input-wrap">
                                            <div class="la-form__lable la-form__lable--medium mb-2">Email ID <span style="color:var(--danger);">*</span></div>
                                            <input class="la-form__input" type="email" value="" name="c_email" placeholder="Email Address">
                                        </div>
                                    </div>

                                    <div class="col-md-6 la-anim__stagger-item--x">
                                        <div class="la-form__input-wrap">
                                            <div class="la-form__lable la-form__lable--medium mb-2">Contact Number <span style="color:var(--danger);">*</span></div>
                                            <input class="la-form__input" type="mobile" value="" name="c_phone" placeholder="Phone Number">
                                        </div>
                                    </div>

                                    <div class="col-12 la-anim__stagger-item--x">
                                        <div class="la-form__input-wrap">
                                            <div class="la-form__lable la-form__lable--medium mb-2">House No./Street/Area <span style="color:var(--danger);">*</span></div>
                                            <input class="la-form__input" type="text" value="" name="c_address" placeholder="Enter House No./Street/Area">
                                        </div>
                                    </div>

                                    <div class="col-md-6 la-anim__stagger-item--x">
                                        <div class="la-form__input-wrap">
                                            <div class="la-form__lable la-form__lable--medium mb-2">Country <span style="color:var(--danger);">*</span></div>
                                            <input class="la-form__input" type="text" value="" name="c_country" placeholder="Country">
                                        </div>
                                    </div>

                                    <div class="col-md-6 la-anim__stagger-item--x">
                                        <div class="la-form__input-wrap">
                                            <div class="la-form__lable la-form__lable--medium mb-2">State <span style="color:var(--danger);">*</span></div>
                                            <input class="la-form__input" type="text" value="" name="c_state" placeholder="State">
                                        </div>
                                    </div>

                                    <div class="col-md-6 la-anim__stagger-item--x">
                                        <div class="la-form__input-wrap">
                                            <div class="la-form__lable la-form__lable--medium mb-2">City <span style="color:var(--danger);">*</span></div>
                                            <input class="la-form__input" type="text" value="" name="c_city" placeholder="City">
                                        </div>
                                    </div>

                                    <div class="col-md-6 la-anim__stagger-item--x">
                                        <div class="la-form__input-wrap">
                                            <div class="la-form__lable la-form__lable--medium mb-2">Zip Code <span style="color:var(--danger);">*</span></div>
                                            <input class="la-form__input" type="text" value="" name="c_zipcode" placeholder="Zipcode">
                                        </div>
                                    </div>

                                    <div class="col-12 text-md-right pt-6 la-anim__stagger-item--x">
                                        <button class="la-btn la-btn__secondary bg-transparent">Proceed to Payment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </secttion>

                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/checkout-address.blade.php ENDPATH**/ ?>