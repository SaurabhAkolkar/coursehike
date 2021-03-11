@extends('learners.layouts.app')

@section('content')
<section class="la-cbg--main">
    <div class="la-section">
      <div class="la-section__inner">
          <div class="container">
              <div class="row">

                <!-- Mobile Version Banner: Start -->
                <div class="col-12 d-block d-md-none la-anim__wrap">
                    <div class="la-status__mobile-banner pt-8 pb-16 la-anim__stagger-item">
                      <div class="la-status__mobile-img ">
                          <img src="../images/learners/status/success.svg" class="img-fluid mx-auto d-block" alt="Successful">
                      </div>
                    </div>
                </div>
                <!-- Mobile Version Banner:End -->

                <div class="col-md-10 la-anim__wrap">
                      <div class="la-status__info d-flex">
                          <div class="la-status__info-card ">
                              <h1 class="la-status__info-title m-0 la-anim__stagger-item">Thank you!</h1>
                              <div class="la-status__info-tag la-anim__stagger-item">Your payment was successful</div>

                              <div class="la-status__info-list">
                                  <div class="la-status__info-item d-flex align-items-start">
                                      <div class="col-6 col-md-4 px-0  la-anim__stagger-item--x">Payment for</div>
                                      <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x"><strong>Annual Subscription</strong></div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Amount Paid</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x"><strong>$ 423</strong></div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Subscription ends on</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">20.12.2021</div>
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

                                  <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Download</div>
                                    <div class="col-6 col-md-4 px-0">
                                      <a href="" role="button" class="la-anim__stagger-item--x">
                                        <strong>Invoice</strong>
                                        <span class="la-icon la-icon--md icon-download" style="color:var(--app-indigo-1)"></span>
                                      </a>
                                    </div>
                                  </div>
                              </div>

                              <div class="la-status__info-btm">
                                  <div class="la-status__info-moto la-anim__stagger-item--x">Start learning from the best mentors across the globe!</div>
                                  <div class="la-status__info-browse la-anim__stagger-item--x">
                                      <button href="/browse/courses" class="btn btn--primary la-btn__app la-status__info-cta py-3" type="button">Browse Courses</button>
                                  </div>
                              </div>
                          </div>

                          <div class="la-status__info-banner d-none d-md-block la-anim__wrap">
                              <div class="la-status__info-showcase la-anim__stagger-item--x ">
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