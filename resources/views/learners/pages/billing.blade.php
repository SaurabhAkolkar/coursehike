@extends('learners.layouts.app')

@section('content')

<div class="la-profile">
    <div class="la-profile__wrap">
      
       <!-- Side Navbar: Start -->
       @include ('learners.pages.sidebar')
       <!-- Side Navbar: End -->  

        <div class="la-profile__main pb-md-20">
            <div class="container la-anim__wrap">
                <div class="la-profile__main-inner ">
                    <h1 class="la-profile__title  text-2xl text-lg-4xl la-anim__stagger-item">Billing</h1>

                    <!-- PERSONAL BILLING DETAILS: START -->
                    <div class="row">                        
                        <div class="col-md-6 col-lg-4 ">
                            <div class="la-personal__billing-card la-anim__stagger-item--x">
                                <p class="la-personal__card-title m-0 la-anim__stagger-item--x">Current Monthly Bill</p>
                                <h6 class="la-personal__card-bill m-0 la-anim__stagger-item--x">$ 45</h6>
                                <div class="la-personal__card-action text-right la-anim__stagger-item--x">
                                    <a role="button" href="" class="la-personal__card-cta"> 
                                        Switch to yearly billing
                                    </a>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-6 col-lg-4">
                            <div class="la-personal__billing-card la-anim__stagger-item--x">
                                <p class="la-personal__card-title m-0 la-anim__stagger-item--x">Next Payment Due</p>
                                <h6 class="la-personal__card-bill m-0 la-anim__stagger-item--x">Today</h6>
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
                    <div class="col-12 la-anim__stagger-item">
                        <div class="la-personal__info-msg pt-6 d-flex align-items-center">
                            <span class="la-icon la-icon--2xl icon-error mr-2"></span>
                            <span>Your most recent billing attempt failed. We will try again on December 09, 2020. </span>
                        </div>
                    </div>
                    <!-- Error Message: End -->

                    <div class="col-md-4">
                        <div class="la-personal__info">
                            <div class="d-flex align-items-center ">
                                <div class="la-personal__info-subtitle la-anim__stagger-item--x">Payment Method</div>
                                <div class="la-personal__info-action ml-5 la-anim__stagger-item--x">
                                    <a role="button" href="/payment-cards" class="la-personal__info-cta position-relative"> 
                                        Edit
                                    </a>
                                </div>
                            </div>

                            <div class="la-personal__info-card">
                                <div class="d-inline-flex align-items-center la-anim__stagger-item--x">
                                    <span class="la-icon la-icon--2xl icon-card-filled"></span>
                                    <div class="la-personal__info-desc pl-2">
                                        <strong>Visa</strong> ends in <strong>5525</strong>
                                    </div>
                                </div>
                                <p class="la-personal__info-desc m-0 la-anim__stagger-item--x">Exp: <strong>7/2023</strong></p>
                                
                            </div>
                        </div>
                    </div>

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
                                    <p class="la-personal__info-desc m-0 la-anim__stagger-item--x"><strong>$45</strong> failed</p>
                                    <p class="la-personal__info-desc m-0 la-anim__stagger-item--x">On <strong>12/12/2020</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- PAYMENT INFORMATION: END -->
        </div>
    </div>
</div>

@endsection