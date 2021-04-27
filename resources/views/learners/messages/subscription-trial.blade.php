@extends('learners.layouts.app')

@section('seo_content')
    <title> Subscription Trial Started </title>
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
                          <img src="../images/learners/status/trial.svg" data-src="../images/learners/status/trial.svg" class="lazy img-fluid mx-auto d-block" alt="Trial Started" />
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
                                  <div class="la-status__info-item d-flex align-items-start">
                                      <div class="col-6 col-md-4 px-0  la-anim__stagger-item--x">Trial Period</div>
                                      <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x"><strong>{{$plan_subscription->plan->trial_period}} days</strong></div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Trial Start from</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Today</div>
                                  </div>
                                  
                                  <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Trial ends on</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">{{(new \Carbon\Carbon($plan_subscription->trial_ends_at))->toDayDateTimeString()}} </div>
                                  </div>

                                  {{-- <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Trial End</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">20.12.2020</div>
                                  </div> --}}

                                  <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Amount to be Paid after trial</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x"><strong> {{getSymbol().$plan_subscription->plan->price}}</strong> + tax if applicable</div>
                                  </div>

                                  <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Next Billing</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">{{(new \Carbon\Carbon($plan_subscription->trial_ends_at))->toDayDateTimeString()}} </div>
                                  </div>

                                  {{-- <div class="la-status__info-item d-flex align-items-start">
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">Billing Card</div>
                                    <div class="col-6 col-md-4 px-0 la-anim__stagger-item--x">HDFC Debit Card ending in 5525</div>
                                  </div> --}}
                              </div>

                              <div class="la-status__info-btm">
                                  <div class="la-status__info-moto la-anim__stagger-item--x">Start learning from the best mentors across the globe!</div>
                                  <div class="la-status__info-browse la-anim__stagger-item--x">
                                    <a href="/browse/courses">
                                      <button class="btn btn--primary la-btn__app la-status__info-cta py-3" type="button">Browse Courses</button>
                                    </a>
                                  </div>
                              </div>
                          </div>

                          <div class="la-status__info-banner d-none d-md-block la-anim__wrap">
                              <div class="la-status__info-showcase la-anim__stagger-item--x ">
                                  <img src="../images/learners/status/trial.svg"  data-src="../images/learners/status/trial.svg" class="lazy d-block la-status__info-successimg" alt="Trial Started" /> 
                              </div>
                          </div>
                      </div>
                </div>

              </div>
          </div>
      </div>
    </div>
</section>
{{-- {{dd($plan_subscription)}} --}}
@endsection