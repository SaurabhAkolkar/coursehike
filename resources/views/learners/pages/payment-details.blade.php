@extends('learners.layouts.app')

@section('content')

<div class="la-profile">
    <div class="la-profile__wrap">
      
       <!-- Side Navbar: Start -->
       @include ('learners.pages.sidebar')
       <!-- Side Navbar: End -->  

        <div class="la-profile__main pb-md-20">
            <div class="la-section__card-payments">
                <div class="container la-anim__wrap">
                    <div class="la-profile__main-inner ">
                        <h1 class="la-profile__title  text-2xl text-lg-4xl la-anim__stagger-item">
                            <a href="/billing" role="button" style="color: var(--app-indigo-1)">Billing</a>/
                                Payment Details
                        </h1>

                        <form action="" name="payment_info" id="payment-info" method="" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="la-payment__details">
                                        <div class="la-payment__form">
                                            <div class="form-row la-payment__form-row "> 
                                                <div class="col-12 col-md-6 la-anim__stagger-item--x">
                                                    <div class="la-payment__card">
                                                        <label class="la-payment__card-label text-sm">Card Number </label>
                                                        <input class="form-control la-payment__card-input" type="text"  name="card_number" id="card_number" placeholder="Enter Card Number"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row la-payment__form-row"> 
                                                <div class="col-12 col-md-3 la-anim__stagger-item--x">
                                                    <div class="la-payment__card">
                                                        <label class="la-payment__card-label text-sm">Expiry Date </label>
                                                        <input class="form-control la-payment__card-input" type="date"  name="card_expiry" id="card_expiry" placeholder="Enter Expiry Date"/>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3 la-anim__stagger-item--x">
                                                    <div class="la-payment__card">
                                                        <label class="la-payment__card-label text-sm">CVV </label>
                                                        <input class="form-control la-payment__card-input" type="number"  name="card_cvv" id="card_cvv" placeholder="Enter CVV"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row la-payment__form-row"> 
                                                <div class="col-12 col-md-6 la-anim__stagger-item--x">
                                                    <div class="la-payment__card">
                                                        <label class="la-payment__card-label text-sm">Address1 </label>
                                                        <input class="form-control la-payment__card-input" type="text"  name="address_1" id="address_1" placeholder="Enter Address1"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row la-payment__form-row"> 
                                                <div class="col-12 col-md-6 la-anim__stagger-item--x">
                                                    <div class="la-payment__card">
                                                        <label class="la-payment__card-label text-sm">Address2 </label>
                                                        <input class="form-control la-payment__card-input" type="text"  name="address_2" id="address_2" placeholder="Enter Address2"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row la-payment__form-row"> 
                                                <div class="col-12 col-md-3 la-anim__stagger-item--x">
                                                    <div class="la-payment__card">
                                                        <label class="la-payment__card-label text-sm">Country </label>
                                                        <input class="form-control la-payment__card-input" type="text"  name="country_name" id="country_name" placeholder="Enter Country Name"/>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3 la-anim__stagger-item--x">
                                                    <div class="la-payment__card">
                                                        <label class="la-payment__card-label text-sm">State </label>
                                                        <input class="form-control la-payment__card-input" type="text"  name="state_name" id="state_name" placeholder="Enter State Name"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row la-payment__form-row"> 
                                                <div class="col-12 col-md-3 la-anim__stagger-item--x">
                                                    <div class="la-payment__card">
                                                        <label class="la-payment__card-label text-sm">City </label>
                                                        <input class="form-control la-payment__card-input" type="text"  name="city_name" id="city_name" placeholder="Enter City Name"/>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3 la-anim__stagger-item--x">
                                                    <div class="la-payment__card">
                                                        <label class="la-payment__card-label text-sm">Postal Code </label>
                                                        <input class="form-control la-payment__card-input" type="number"  name="postal_code" id="postal_code" placeholder="Enter Postal Code"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row la-payment__form-row mt-10 mt-md-14 la-anim__stagger-item--x">
                                                <div class="col-md-6 offset-md-4 col-md la-payment__pay">
                                                    <button class="la-btn la-payment__pay-btn py-3 text-center" type="submit">Submit Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection