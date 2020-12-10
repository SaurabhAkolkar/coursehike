@extends('learners.layouts.app')

@section('content')
    <section class="la-section la-cbg--main">
        <div class="la-section__inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="la-personal__billing-title">Personal Billing</h1>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="la-personal__billing-card">
                            <p class="la-personal__card-title m-0">Current Monthly Bill</p>
                            <h6 class="la-personal__card-bill m-0">$ 45</h6>
                            <div class="la-personal__card-action text-right">
                                <a role="button" href="" class="la-personal__card-cta position-relative"> 
                                    Switch to yearly billing
                                    <span class="la-icon la-icon--5xl icon-right-arrow"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="la-personal__billing-card">
                            <p class="la-personal__card-title m-0">Next Payment Due</p>
                            <h6 class="la-personal__card-bill m-0">Today</h6>
                            <div class="la-personal__card-action text-right">
                                <a role="button" href="" class="la-personal__card-cta position-relative"> 
                                    View payment history
                                    <span class="la-icon la-icon--5xl icon-right-arrow"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="la-personal__billing-card">
                            <p class="la-personal__card-title m-0">Frequent actions</p>
                            <div class="la-personal__card-update">
                                <a role="button" href="" class="la-personal__card-desc"> Update payment method</a> <br/>
                                <a role="button" href="" class="la-personal__card-desc"> Explore subscription options</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="la-personal__info-title">Payment Information</h1>
                    </div>

                    <div class="col-md-4">
                        <div class="la-personal__info">
                            <div class="la-personal__info-subtitle text-uppercase">Payment Method</div>
                            <div class="la-personal__info-card ">
                                <div class="d-inline-flex align-items-center">
                                    <span class="la-icon la-icon--2xl icon-card-filled"></span>
                                    <div class="la-personal__info-desc pl-2">
                                        <strong>Visa</strong> ends in <strong>5525</strong>
                                    </div>
                                </div>
                                <p class="la-personal__info-desc m-0">Exp: <strong>7/2023</strong></p>
                                <div class="la-personal__info-action ">
                                    <a role="button" href="" class="la-personal__info-cta position-relative"> 
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="la-personal__info">
                            <div class="la-personal__info-subtitle text-uppercase">Last Payment</div>
                            <div class="la-personal__info-card">
                                <div class="la-personal__info-desc">
                                    <strong>$45</strong> failed
                                </div>
                            
                                <p class="la-personal__info-desc m-0">On <strong>12/12/2020</strong></p>
                                <div class="la-personal__info-action ">
                                    <a role="button" href="" class="la-personal__info-cta position-relative"> 
                                        View all Payments
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection