@extends('learners.layouts.intro')

@section('content')
<section class="la-entry__sec">
    <div class="container-fluid la-entry__sec-inner">
      <div class="row la-entry__row h-100">
        <div class="col-md-7 la-entry__col la-entry__col-left h-100 d-none d-md-block">
                      <div class="la-entry__slider-wrap d-flex align-items-center">
                        <div class="swiper-container entry-swiper-container h-100 la-entry__slider">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(./images/learners/login-register/slide1.png)"></div>
                            <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(./images/learners/creator/earn.png)"></div>
                          </div>
                          <div class="swiper-pagination swiper-pagination-black"></div>
                        </div>
                      </div>
        </div>
        <div class="col-md-5 la-entry__col la-entry__col-right h-100">
          <div class="la-entry__content-wrap d-flex flex-column justify-content-center">
            <div class="la-entry__content-top">
              <form class="la-entry__form" action="">
                          <div class="la-form__input-wrap la-entry__input-wrap"><span class="la-entry__input-icon"><span class="la-icon la-icon--lg icon-mail-id"></span></span>
                            <input class="la-form__input la-entry__input" type="email" value="" name="email-id" placeholder="Email Id">
                          </div>
                          <div class="la-form__input-wrap la-entry__input-wrap mb-4"><span class="la-entry__input-icon"><span class="la-icon la-icon--lg icon-password"></span></span>
                            <input class="la-form__input la-entry__input" type="password" value="" name="password" placeholder="Password">
                          </div>
                <div class="la-btn__plain text--burple text-right mr-5 mb-8"><a href="">Forgot Password ?</a></div>
                <submit class="btn la-btn la-btn--secondary w-100" type="button">LOGIN</submit>
              </form>
            </div>
            <div class="la-entry__content-bottom text-center"><span class="la-entry__bottom-title">Login with</span>
              <div class="la-entry__social-lnks d-flex align-items-center justify-content-center">
                <a href="" class="la-entry__social-lnk"> <span class="la-icon la-icon--6xl icon-facebook-colored"></span></a>
                <a href="" class="la-entry__social-lnk"> <span class="la-icon la-icon--6xl icon-linkedin-colored"></span></a>
                <a href="" class="la-entry__social-lnk"> <span class="la-icon la-icon--6xl icon-google-colored"><span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span></span></a>
              </div>
              <div class="la-entry__other-option mt-10">Don't have an account? <span class="la-btn__plain text--burple text--md ml-2"><a href="">Register</a></span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection