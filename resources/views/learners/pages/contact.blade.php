@extends('learners.layouts.app')

@section('seo_content')
    <title>Contact |Best Online Creativity Platform |Explore Your Creativity</title>
    <meta name='description' itemprop='description' content='Join the best online art coursed & creativity platform for online tattoo learning, digital protraits, artistic baking and much more online courses. ' />

    <meta property="og:description"content="Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now" />
    <meta property="og:title"content="Contact |Best Online Creativity Platform |Explore Your Creativity" />
    <meta property="og:url"content="{{Request::url()}}" />
    <meta property="og:type"content="website" />
    <meta property="og:site_name"content="LILA Art" />
    <meta property="og:image"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size"content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Contact |Best Online Creativity Platform |Explore Your Creativity" />
    <meta name="twitter:site"content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Contact |Best Online Creativity Platform |Explore Your Creativity"}</script>
@endsection

@section('content')
 <!-- Main Section: Start-->
 @if(session('success'))
  <div class="la-btn__alert position-relative">
    <div class="la-btn__alert-success col-lg-4 offset-lg-4  alert alert-success alert-dismissible" role="alert">
        <span class="la-btn__alert-msg">{{session('success')}}</span>
        <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:#56188C">&times;</span>
        </button>
    </div>
  </div>
  @endif
 <section class="la-cbg--main">
    <!-- Section: Strat-->
    <section class="la-contact--page">
      <div class="container-fluid">
        <div class="row la-anim__wrap">
          <!-- Column: Start-->
          <div class="col-12 mt-5 mt-lg-10 la-anim__stagger-item--x">
            <a class="la-back__page" href="{{URL::previous()}}"> 
              <span class="la-icon la-icon--5xl icon-back-arrow"></span>
            </a>
          </div>
          <!-- Column: End-->
          <!-- Column: Start-->
          <div class="col-12 d-none d-sm-block ">
            <div class="text-center pt-5">
              <h1 class="la-contact__title la-anim__fade-in-top la-anim__A">CONTACT US</h1>
            </div>
          </div>
          <!-- Column: End-->
        </div>
        <div class="row la-contact--info d-flex flex-row justify-content-between la-anim__wrap">
          <!-- Column: Start-->
          <div class="col-12  col-md-7 col-lg-5 order-1 ">
            <div class="la-contact__lft">
              <div class="la-contact__connect order-first">
                <h6 class="la-contact__connect-tag m-0 text-xl text-md-2xl la-anim__stagger-item">Feel free to reach us</h6>
                <h2 class="la-contact__connect-title text-6xl la-anim__stagger-item">Let's Connect </h2>
                <p class="la-contact__connect-para pt-2 la-anim__stagger-item">Your search for world-class mentors, loyal student base, ends with LILA. Holler at us! Let’s get talking!</p>
              </div>
              <div class="la-contact__btm d-none d-sm-block">
                <div class="la-contact__details la-anim__stagger-item mb-1">
                  <span class="la-contact__details-icon la-icon--xl icon-contact-number mr-2"></span>
                  <a class="la-contact__details-desc" href="tel:+91 8779056596">+91 8779056596</a>
                </div>
                <div class="la-contact__details d-flex align-items-center la-anim__stagger-item">
                  <span class="la-contact__details-icon la-icon--xl icon-mail-id mr-3"></span>
                  <a  class="la-contact__details-desc" href="mailto:lila@learnitlikealiens.com">lila@learnitlikealiens.com</a>
                </div>
                <div class="la-contact__smedia mt-6">
                  <a class="la-contact__smedia-link la-anim__stagger-item" href="https://www.facebook.com/learnitlikealiens" target="_blank"><span class="la-icon la-icon--6xl icon-facebook"></a>
                  <a class="la-contact__smedia-link la-anim__stagger-item" href="https://www.instagram.com/learnitlikealiens/" target="_blank"><span class="la-icon la-icon--6xl icon-insta"></a>
                  <a class="la-contact__smedia-link la-anim__stagger-item" href="https://www.youtube.com/channel/UC1LRPWR4rltOLKiR7e-pWEg" target="_blank"><span class="la-icon la-icon--6xl icon-youtube"></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Column: End-->

          <!-- Mobile Column: Start-->
          <div class="col order-3 order-sm-none  py-5 px-5 d-block d-sm-none"> 
            <div class="la-contact__btm-mobile py-5">
              <div class="la-contact__details la-anim__stagger-item mb-2">
                <span class="la-contact__details-icon la-icon--lg icon-contact-number mr-2"></span>
                <a class="la-contact__details-desc text-md" href="tel:+91 8779056596">+91 8779056596</a>
              </div>
              <div class="la-contact__details d-flex align-items-center la-anim__stagger-item">
                <span class="la-contact__details-icon la-icon--xl icon-mail-id mr-3"></span>
                <a class="la-contact__details-desc text-md" href="mailto:lila@learnitlikealiens.com">lila@learnitlikealiens.com</a>
              </div>
              <div class="la-contact__smedia la-anim__stagger-item mt-8">
                <a class="la-contact__smedia-link mr-1" href="https://www.facebook.com/learnitlikealiens" target="_blank"><span class="la-icon la-icon--5xl icon-facebook"></span></a>
                <a class="la-contact__smedia-link mr-1" href="https://www.instagram.com/learnitlikealiens/" target="_blank"><span class="la-icon la-icon--5xl icon-insta"></span></a>
                <a class="la-contact__smedia-link mr-1" href="https://www.youtube.com/channel/UC1LRPWR4rltOLKiR7e-pWEg" target="_blank"><span class="la-icon la-icon--5xl icon-youtube"></span></a>
              </div>
            </div>
          </div>
          <!-- Mobile Column: End-->

          <!-- Column: Start-->
          <div class="col-12 col-md-5 col-lg-5 offset-lg-2 order-2 order-sm-3 px-0 px-md-3">
            <div class=" text-center pt-5 d-block d-sm-none">
              <h1 class="la-contact__title la-anim__fade-in-top la-anim__A">CONTACT</h1>
            </div>
            <div class="la-contact__rgt">
              <form class="la-contact__form" action="/contact" method="post"  id="contactForm">
                @csrf
                <div class="form-group mb-6 la-anim__stagger-item--x">
                  <label class="la-form__lable la-form__lable--contact" for="contName">Full Name: <span style="color:var(--danger)">*</span></label>
                  <input class="form-control la-form__input p-0" id="contName" type="text" name="fname" placeholder="Enter your name" required >
                </div>
                <div class="form-group mb-6 la-anim__stagger-item--x">
                  <label class="la-form__lable la-form__lable--contact" for="contEmail">Email: <span style="color:var(--danger)">*</span></label>
                  <input class="form-control la-form__input p-0" id="contEmail" type="email" name="email" placeholder="Enter your email id" required>
                </div>
                <div class="form-group mb-6 la-anim__stagger-item--x">
                  <label class="la-form__lable la-form__lable--contact" for="contPhone">Contact Number: <span style="color:var(--danger)">*</span></label>
                  <input class="form-control la-form__input p-0" id="contPhone" type="tel" name="mobile" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group mb-6 la-anim__stagger-item--x">
                  <label class="la-form__lable la-form__lable--contact mb-2" for="contMsg">Message: <span style="color:var(--danger)">*</span></label>
                  <textarea class="form-control  la-form__textarea p-2" id="contMsg" rows="5" cols="50" name="message" placeholder="Type here" required></textarea>
                </div>
                <div class="la-contact__btn text-right d-none d-sm-block la-anim__stagger-item--x">
                  <button class="btn la-contact__btn-desktop text-lg text-center" type="submit" >SEND</button>
                </div>
                <!-- Mobile Button: Start-->
                <div class="la-contact__btn text-center pt-5 d-block d-sm-none la-anim__stagger-item">
                  <button class="btn  btn-block la-contact__btn-mobile text-lg text-center" type="submit">SEND</button>
                </div>
                <!-- Mobile Button: End-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
@endsection