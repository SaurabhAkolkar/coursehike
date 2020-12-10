@extends('learners.layouts.app')

@section('content')
    <section class="la-section la-cbg--main">
        <div class="la-section__inner">
            <div class="container py-md-10">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center">
                        <h1 class="la-payment__add-title">Payment Details</h1>

                        <div class="la-payment__add-card">
                            <h4 class="la-payment__add-subtitle ">Pay with</h4>
                            <a role="button" href="" class="d-inline-flex align-items-center">
                                <span class="la-icon la-icon--2xl icon-card-filled"></span>
                                <p class="la-payment__add-details m-0 pl-2"><strong> Visa </strong> ending **** **** **** 5525</p>
                            </a>
                            <div class="la-payment__add-new mt-6">
                                <a href="" role="button" class="la-btn__app py-3">Add New Card</a>
                            </div>
                        </div>

                        <p class="la-payment__add-desc">You have a past due balance of $0, which we will attempt to charge again on December 09, 2020, or as soon as you update your payment details</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
