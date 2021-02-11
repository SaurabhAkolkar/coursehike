<?php $__env->startSection('content'); ?>

<div class="la-profile">
    <div class="la-profile__wrap">
      
       <!-- Side Navbar: Start -->
       <?php echo $__env->make('learners.pages.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <!-- Side Navbar: End -->  

        <div class="la-profile__main pb-md-20">

            <?php if($active_plan != null): ?>
                <div class="container la-anim__wrap">
                    <div class="la-profile__main-inner ">
                        <h1 class="la-profile__title  text-2xl text-lg-4xl la-anim__stagger-item">Subscription Billing</h1>

                        <!-- PERSONAL BILLING DETAILS: START -->
                        <div class="row">                        
                            <div class="col-md-6 col-lg-4 ">
                                <div class="la-personal__billing-card la-anim__stagger-item--x">
                                    <p class="la-personal__card-title m-0 la-anim__stagger-item--x">Current Monthly Bill</p>
                                    <h6 class="la-personal__card-bill m-0 la-anim__stagger-item--x">$ <?php echo e($active_plan->plan->price); ?></h6>
                                    <div class="la-personal__card-action text-right la-anim__stagger-item--x">
                                        <a role="button" href="/learning-plans" class="la-personal__card-cta"> 
                                            Switch Plans
                                        </a>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-md-6 col-lg-4">
                                <div class="la-personal__billing-card la-anim__stagger-item--x">
                                    <?php if($canceled_subscription): ?>
                                        <p class="la-personal__card-title m-0 la-anim__stagger-item--x">Subscription ends on</p>
                                    <?php else: ?>
                                        <p class="la-personal__card-title m-0 la-anim__stagger-item--x">Next Payment Due</p>
                                    <?php endif; ?>
                                    <h6 class="la-personal__card-bill m-0 la-anim__stagger-item--x"><?php echo e(\Carbon\Carbon::parse($active_plan->ends_at)->format('d M Y')); ?></h6>
                                    <div class="la-personal__card-action text-right la-anim__stagger-item--x">
                                        <a role="button" href="/payment-history" class="la-personal__card-cta"> 
                                            View payment history
                                        </a>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-md-12 col-lg-4">
                                <div class="la-personal__billing-card la-anim__stagger-item--x">
                                    <p class="la-personal__card-title m-0 la-anim__stagger-item--x">Frequent actions</p>
                                    <div class="la-personal__card-update">
                                        <div class="la-personal__card-desc la-anim__stagger-item--x">
                                            <a role="button" href="/payment-details" class=""> Update payment method</a>
                                        </div>
                                        <div class="la-personal__card-desc pt-2 la-anim__stagger-item--x">
                                            <a role="button" href="/learning-plans" class="la-personal__card-desc"> Explore subscription options</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PERSONAL BILLING DETAILS: END -->
                    </div>
                </div>

                <!-- PAYMENT INFORMATION: START -->
                <div class="container la-anim__wrap">
                    <div class="row">
                        <div class="col-12 la-anim__stagger-item">
                            <h1 class="la-personal__info-title">Payment Information</h1>
                        </div>

                        <!-- Error Message: Start -->
                        
                        <!-- Error Message: End -->

                        <div class="col-md-4">
                            <div class="la-personal__info">
                                <div class="d-flex align-items-center ">
                                    <div class="la-personal__info-subtitle la-anim__stagger-item--x">Payment Method</div>
                                    <div class="la-personal__info-action ml-5 la-anim__stagger-item--x">
                                        <a role="button" href="/payment-details" class="la-personal__info-cta position-relative"> 
                                            Edit
                                        </a>
                                    </div>
                                </div>

                                <div class="la-personal__info-card">
                                    <div class="d-inline-flex align-items-center la-anim__stagger-item--x">
                                        <span class="la-icon la-icon--2xl icon-card-filled"></span>
                                        <div class="la-personal__info-desc pl-2">
                                            <strong><?php echo e($card['brand']); ?></strong> ends in <strong><?php echo e($card['last4']); ?></strong>
                                        </div>
                                    </div>
                                    <p class="la-personal__info-desc m-0 la-anim__stagger-item--x">Exp: <strong><?php echo e($card['exp_month']); ?>/<?php echo e($card['exp_year']); ?></strong></p>
                                    
                                </div>
                            </div>
                        </div>

                        <?php if($last_payment): ?>
                        <div class="col-md-4">
                            <div class="la-personal__info">
                                <div class="d-flex align-items-center">
                                    <div class="la-personal__info-subtitle la-anim__stagger-item--x">Last Payment</div>
                                    <div class="la-personal__info-action ml-5 la-anim__stagger-item--x">
                                        <a role="button" href="/payment-history" class="la-personal__info-cta position-relative"> 
                                            View all Payments
                                        </a>
                                    </div>
                                </div>

                                <div class="la-personal__info-card">
                                    <div class="la-personal__info-desc">
                                        <p class="la-personal__info-desc m-0 la-anim__stagger-item--x"><strong>$<?php echo e($last_payment->invoice_paid); ?></strong> <?php echo e($last_payment->status); ?></p>
                                        <p class="la-personal__info-desc m-0 la-anim__stagger-item--x">On <strong><?php echo e(\Carbon\Carbon::parse($last_payment->created_at)->format('d M Y')); ?></strong></p>                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- PAYMENT INFORMATION: END -->


                <!-- CANCEL SUBSCRIPTION: START -->
                <div class="container la-anim__wrap">
                    <div class="row">
                        <div class="col-12 la-anim__stagger-item">
                            <h1 class="la-personal__info-title">Pause / Cancel Subscription</h1>
                        </div>

                        <?php if($canceled_subscription): ?>
                            <div class="col-md-6">
                                <div class="la-personal__info">
                                    <p class="la-personal__info-desc m-0 text-danger la-anim__stagger-item--x">You have already canceled the current subscription plan. You won't be charged in the future</p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-md-4">
                                <div class="la-personal__info">
                                    <p class="la-personal__info-desc m-0 la-anim__stagger-item--x">If you want to <strong>switch/pause/cancel</strong> a plan</p>
                                    <div class="la-personal__info-card">
                                        <form method="POST" action="/subscription/cancel">
                                            <?php echo csrf_field(); ?>
                                            <button class="la-btn__app la-status__info-cta py-3" type="submit">Cancel Future Billing</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                        

                    </div>
                </div>
                <!-- CANCEL SUBSCRIPTION: END -->
             <?php else: ?>
                    <div class="container la-anim__wrap">
                        <div class="la-profile__main-inner ">
                            <h1 class="la-profile__title  text-2xl text-lg-4xl la-anim__stagger-item">Subscription Billing</h1>

                            <!-- PERSONAL BILLING DETAILS: START -->
                            <div class="row">                        
                                <div class="col-md-12">
                                    <div class="la-personal__billing-card la-anim__stagger-item--x">
                                        <p class="la-personal__card-title m-0 la-anim__stagger-item--x">You have no Subscription Billing to show</p>
                                    </div>
                                </div>
            
                            </div>
                            <!-- PERSONAL BILLING DETAILS: END -->
                        </div>
                    </div>
             <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/learners/pages/billing.blade.php ENDPATH**/ ?>