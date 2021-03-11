@extends('learners.layouts.app')

@section('content')
<section class="la-cbg--main">
    <div class="la-section">
      <div class="la-section__inner">
          <div class="container">
              <div class="row">

                <!-- Mobile Version Banner: Start -->
                <div class="col-12 d-block d-md-none">
                    <div class="la-status__mobile-banner pt-8 pb-16">
                      <div class="la-status__mobile-img ">
                          <img src="../images/learners/status/success.svg" class="img-fluid mx-auto d-block" alt="Successful">
                      </div>
                    </div>
                </div>
                <!-- Mobile Version Banner:End -->

                <div class="col-md-10">
                      <div class="la-status__info d-flex">
                          <div class="la-status__info-card ">
                              <h1 class="la-status__info-title m-0">Thank you!</h1>
                              <div class="la-status__info-tag">Your payment was successful</div>

                              <div class="la-status__info-list">

                                  <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0">Transaction Id</div>
                                    <div class="col-6 col-md-4 px-0"><strong>{{ $invoice->invoice_id }}</strong></div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-start">
                                      <div class="col-6 col-md-4 px-0">Payment for</div>
                                      <div class="col-6 col-md-4 px-0"><strong>Cart Checkout</strong></div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0">Amount Paid</div>
                                    <div class="col-6 col-md-4 px-0"><strong>{{$invoice->currency == 'INR' ? '₹' : '$'}} {{ $invoice->total }}</strong></div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0">Payment Status</div>
                                    <div class="col-6 col-md-4 px-0"><strong>Successful</strong></div>
                                  </div>

                                  {{-- <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0">Download</div>
                                    <div class="col-6 col-md-4 px-0">
                                      <a href="" role="button">
                                        <strong>Invoice</strong>
                                        <span class="la-icon la-icon--md icon-download" style="color:var(--app-indigo-1)"></span>
                                      </a>
                                    </div>
                                  </div> --}}
                              </div>

                              <div class="la-status__info-btm">
                                  <div class="la-status__info-moto">Start learning from the best mentors across the globe!</div>
                                  <div class="la-status__info-browse">
                                      <a href="/my-courses" class="btn btn--primary la-btn__app text-white text-uppercase la-status__info-cta py-3" role="button">Browse Your Courses</a>
                                  </div>
                              </div>
                          </div>

                          <div class="la-status__info-banner d-none d-md-block">
                              <div class="la-status__info-showcase  ">
                                  <img src="../images/learners/status/success.svg" class="d-block la-status__info-successimg" alt="Successful">
                              </div>
                          </div>
                      </div>
                </div>

              </div>
          </div>
      </div>
    </div>
</section>
@endsection