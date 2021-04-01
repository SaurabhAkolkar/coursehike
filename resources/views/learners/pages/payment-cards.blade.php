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
                    <h1 class="la-profile__title  text-2xl text-lg-4xl la-anim__stagger-item">
                        <a href="/manage-billing" role="button" style="color: var(--app-indigo-1)">Billing</a>/
                            Payment Cards
                    </h1>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="la-payment__add-card">
                                <h4 class="la-payment__add-subtitle la-anim__stagger-item">Pay with</h4>
                                <a role="button" href="" class="la-payment__add-old d-inline-flex align-items-center la-anim__stagger-item">
                                    <span class="la-icon la-icon--2xl icon-card-filled"></span>
                                    <p class="la-payment__add-details m-0 pl-2"><strong> Visa </strong> ending **** **** **** 5525</p>
                                </a>
                                <div class="la-payment__add-new mt-6 la-anim__stagger-item">
                                    <a href="/payment-details" role="button" class="la-btn__app py-3">Add New Card</a>
                                </div>
                            </div>

                            <p class="la-payment__add-desc la-anim__stagger-item">You have a past due balance of $0, which we will attempt to charge again on December 09, 2020, or as soon as you update your payment details</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
