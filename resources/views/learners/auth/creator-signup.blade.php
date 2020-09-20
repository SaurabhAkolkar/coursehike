@extends('learners.layouts.app')

@section('content')
<section class="la-entry__sec">
    <div class="container-fluid la-entry__sec-inner">
      <div class="row la-entry__row h-100">
        <div class="col-md-7 la-entry__col la-entry__col-left h-100 d-none d-md-block">
                      <div class="la-entry__slider-wrap d-flex align-items-center">
                        <div class="swiper-container entry-swiper-container h-100 la-entry__slider">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(./images/login-register/slide1.png)"></div>
                            <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(./images/creator/earn.png)"></div>
                          </div>
                          <div class="swiper-pagination swiper-pagination-black"></div>
                        </div>
                      </div>
        </div>
        <div class="col-md-5 la-entry__col la-entry__col-right h-100">
          <div class="la-entry__content-wrap d-flex flex-column justify-content-center">
            <div class="la-entry__content-top">
              <div class="la-entry__interests-title la-entry__content-title text-center mb-8">Tell us about your work</div>
              <form class="la-entry__form" action="">
                          <div class="la-form__input-wrap la-entry__input-wrap"><span class="la-entry__input-icon"><img src="./images/icons/mail.svg" alt=""></span>
                            <input class="la-form__input la-entry__input" type="text" value="" name="expert-in" placeholder="Expert In">
                          </div>
                          <div class="la-form__input-wrap la-entry__input-wrap"><span class="la-entry__input-icon"><img src="./images/icons/password.svg" alt=""></span>
                            <input class="la-form__input la-entry__input" type="number" value="" name="years-of-experience" placeholder="Years of Experience">
                          </div>
                          <div class="la-form__input-wrap la-entry__input-wrap"><span class="la-entry__input-icon"><img src="./images/icons/password.svg" alt=""></span>
                            <input class="la-form__input la-entry__input" type="date" value="" name="date-of-birth" placeholder="Date of Birth(dd/mm/yyyy)">
                          </div>
                          <div class="la-form__input-wrap la-entry__input-wrap mb-12"><span class="la-entry__input-icon"><img src="./images/icons/password.svg" alt=""></span>
                            <input class="la-form__input la-entry__input" type="email" value="" name="email-id" placeholder="Email ID">
                          </div>
                <submit class="btn la-btn la-btn--secondary text--black w-100" type="button">CONTINUE</submit>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection