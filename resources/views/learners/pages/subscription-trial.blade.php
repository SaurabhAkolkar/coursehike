@extends('learners.layouts.app')

@section('seo_content')
    <title> Free Trial </title>
@endsection

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
                          <img src="../images/learners/status/trial.svg" class="img-fluid mx-auto d-block" alt="Successful">
                      </div>
                    </div>
                </div>
                <!-- Mobile Version Banner:End -->

                <div class="col-md-10 la-anim__wrap">
                      <div class="la-status__info d-flex">
                          <div class="la-status__info-card ">
                              <h1 class="la-status__info-title m-0 la-anim__stagger-item">Enjoy!</h1>
                              <div class="la-status__info-tag la-anim__stagger-item">Your trial started successfully.</div>

                              <div class="la-status__info-list">
                                  <div class="la-status__info-item d-flex align-items-center">
                                      <div class="col-6 col-md-4 px-0  la-anim__stagger-item--x">Trial Period</div>
                                      <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x"><strong>7 days</strong></div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-center">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Amount Paid</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x"><strong>$ 0</strong></div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-center">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Trial ends on</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">20.12.2021</div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-center">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Trial Start</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">14.12.2020</div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-center">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Trial End</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">20.12.2020</div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-center">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Next Billing</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">21.12.2020</div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-center">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Billing Card</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">HDFC Debit Card ending in 5525</div>
                                  </div>
                              </div>

                              <div class="la-status__info-btm">
                                  <div class="la-status__info-moto la-anim__stagger-item--x">Start learning from the best mentors across the globe!</div>
                                  <div class="la-status__info-browse la-anim__stagger-item--x">
                                      <button href="/browse/courses" class="la-btn__app la-status__info-cta py-3" type="button">Browse Courses</button>
                                  </div>
                              </div>
                          </div>

                          <div class="la-status__info-banner d-none d-md-block la-anim__wrap">
                              <div class="la-status__info-showcase la-anim__stagger-item--x ">
                                  <img src="../images/learners/status/trial.svg" class="d-block la-status__info-successimg" alt="Trial">
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