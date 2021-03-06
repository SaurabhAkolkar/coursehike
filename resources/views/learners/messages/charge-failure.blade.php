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
                      <img src="/images/learners/status/failure.svg" class="img-fluid mx-auto d-block" alt="Successful">
                  </div>
                </div>
            </div>
            <!-- Mobile Version Banner:End -->

            <div class="col-md-10">
                  <div class="la-status__info d-flex">
                      <div class="la-status__info-card ">
                          <h1 class="la-status__info-title la-status__info-title2 m-0">Oops!</h1>
                          <div class="la-status__info-tag">Your payment failed</div>

                          <div class="la-status__info-list ">

                              <div class="la-status__info-item d-flex align-items-center">
                                <div class="col-6 col-md-4 px-0">Transaction Id</div>
                                <div class="col-6 col-md-4 px-0"><strong>{{ $invoice->invoice_id }}</strong></div>
                              </div>

                              <div class="la-status__info-item d-flex align-items-center">
                                <div class="col-6 col-md-4 px-0">Payment Status</div>
                                <div class="col-6 col-md-4 px-0 danger"><strong>Failed</strong></div>
                              </div>

                              <div class="la-status__info-item d-flex align-items-center">
                                  <div class="col-6 col-md-4 px-0">Payment for</div>
                                  <div class="col-6 col-md-4 px-0"><strong>Course Purchase</strong></div>
                              </div>

                              <div class="la-status__info-item d-flex align-items-center">
                                <div class="col-6 col-md-4 px-0">Amount to be Paid</div>
                                <div class="col-6 col-md-4 px-0"><strong>{{$invoice->currency == 'INR' ? '₹' : '$'}} {{ $invoice->total }}</strong></div>
                              </div>
                          </div>

                          <div class="la-status__info-btm">
                              {{-- <div class="la-status__info-moto">Reason for payment failure message displayed here.</div> --}}
                              <div class="la-status__info-browse">
                                <a href="/cart">  <button class="la-btn la-payment__pay-btn la-status__info-cta py-3" type="button">Try Again</button> </a>
                              </div>
                          </div>
                      </div>

                      <div class="la-status__info-banner d-none d-md-block">
                          <div class="la-status__info-showcase  ">
                              <img src="/images/learners/status/failure.svg" class="d-block la-status__info-failureimg" alt="Successful">
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