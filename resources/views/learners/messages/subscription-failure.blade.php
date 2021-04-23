@extends('learners.layouts.app')

@section('seo_content')
    <title> Subscription Failed </title>
@endsection

@section('content')
<section class="la-cbg--main">
    <div class="la-section">
      <div class="la-section__inner">
        <div class="container">
          <div class="row">

            <!-- Mobile Version Banner: Start -->
            <div class="col-12 d-block d-md-none la-anim__wrap">
                <div class="la-status__mobile-banner pt-8 pb-16">
                  <div class="la-status__mobile-img la-anim__stagger-item">
                      <img src="../images/learners/status/failure.svg" class="img-fluid mx-auto d-block" alt="Successful">
                  </div>
                </div>
            </div>
            <!-- Mobile Version Banner:End -->

            <div class="col-md-10 ">
                  <div class="la-status__info d-flex">
                      <div class="la-status__info-card la-anim__wrap">
                          <h1 class="la-status__info-title la-status__info-title2 m-0 la-anim__stagger-item">Oops!</h1>
                          <div class="la-status__info-tag la-anim__stagger-item">Your payment failed</div>

                          <div class="la-status__info-list ">
                              <div class="la-status__info-item d-flex align-items-start">
                                  <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Payment for</div>
                                  <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x"><strong>Annual Subscription</strong></div>
                              </div>

                              <div class="la-status__info-item d-flex align-items-start">
                                <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Amount Paid</div>
                                <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x"><strong>$ 423</strong></div>
                              </div>

                              <div class="la-status__info-item d-flex align-items-start">
                                <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Payment Status</div>
                                <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Successful</div>
                              </div>

                              <div class="la-status__info-item d-flex align-items-start">
                                <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Payment Method</div>
                                <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Debit Card</div>
                              </div>

                              <div class="la-status__info-item d-flex align-items-start">
                                <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Transaction Id</div>
                                <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">hgkfih457fhf55</div>
                              </div>
                          </div>

                          <div class="la-status__info-btm">
                              <div class="la-status__info-moto la-anim__stagger-item--x">Reason for payment failure message displayed here.</div>
                              <div class="la-status__info-browse la-anim__stagger-item--x">
                                  <button href="/browse/courses" class="la-btn la-payment__pay-btn la-status__info-cta py-3" type="button">Try Again</button>
                              </div>
                          </div>
                      </div>

                      <div class="la-status__info-banner d-none d-md-block la-anim__wrap">
                          <div class="la-status__info-showcase la-anim__stagger-item--x ">
                              <img src="../images/learners/status/failure.svg" class="d-block la-status__info-failureimg" alt="Successful">
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