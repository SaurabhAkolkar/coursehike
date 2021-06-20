@extends('learners.layouts.intro')
@section('seo_content')
    <title>Social Login OTP | Start For Free Today | LILA</title>
    <meta name='description' itemprop='description' content='Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now' />

    <meta property="og:description"content="Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now" />
    <meta property="og:title"content="Social Login OTP | Start For Free Today | LILA" />
    <meta property="og:url"content="{{Request::url()}}" />
    <meta property="og:type"content="website" />
    <meta property="og:site_name"content="LILA Art" />
    <meta property="og:image"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size"content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Social Login OTP | Start For Free Today | LILA" />
    <meta name="twitter:site"content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Social Login OTP | Start For Free Today | LILA"}</script>

    <script>
        (function(h,e,a,t,m,p) {
        m=e.createElement(a);m.async=!0;m.src=t;
        p=e.getElementsByTagName(a)[0];p.parentNode.insertBefore(m,p);
        })(window,document,'script','https://u.heatmap.it/log.js');
    </script>
@endsection

@include('admin.message')

<!-- Signup start-->
@section('content')

    <section id="signup" class="la-entry__sec">
        <div class="container-fluid la-entry__sec-inner ">
            <div class="row la-entry__row h-100">
                <div class="col-md-7 la-entry__col la-entry__col-left h-100 d-none d-md-block la-anim__wrap">
                    <div class="la-entry__slider-wrap d-flex align-items-center la-anim__fade-in-left">
                        <div class="swiper-container entry-swiper-container h-100 la-entry__slider ">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide " style="width: 80vw;height: 80vh;background-image:url(../images/learners/login-register/login-slide1.svg)"></div>
                                <div class="swiper-slide" style="width: 80vw;height: 80vh;background-image:url(../images/learners/login-register/login-slide2.svg)"></div>
                            </div>
                            <div class="swiper-pagination swiper-pagination-black"></div>
                        </div>
                    </div> 
                </div>

                <div class="col-md-5 la-entry__col la-entry__col-right h-100 pt-20 la-anim__wrap">
                    <div class="la-entry__content-wrap d-flex flex-column justify-content-center align-items-center la-anim__stagger-item">
                        <h1 class="la-entry__content-title text-xl text-center mb-md-2" style="font-weight: var(--font-medium);">Verify Email</h1>
                        <p class="text-sm text-center" style="color:var(--gray5);">Enter 6 digit OTP sent to username@gmail.com</p>  

                        <div class="d-flex flex-column la-entry__content-top mt-5">
                            <form method="POST" class="signup-form la-entry__form" action="">
                               
                                <div class="row mb-10">
                                    <div class="col-2 px-2">
                                        <input type="text" id="social_otp1" name="social_otp1" class="la-form__input text-center text-lg border py-3" placeholder="5" maxlength="1" required autofocus>
                                    </div>

                                    <div class="col-2 px-2">
                                        <input type="text" id="social_otp2" name="social_otp2" class="la-form__input text-center text-lg border py-3" placeholder="2" maxlength="1" required>
                                    </div>

                                    <div class="col-2 px-2">
                                        <input type="text" id="social_otp3" name="social_otp4" class="la-form__input text-center text-lg border py-3" placeholder="1" maxlength="1" required>
                                    </div>

                                    <div class="col-2 px-2">
                                        <input type="text" id="social_otp5" name="social_otp5" class="la-form__input text-center text-lg border py-3" placeholder="4" maxlength="1" required>
                                    </div>

                                    <div class="col-2 px-2">
                                        <input type="text" id="social_otp6" name="social_otp6" class="la-form__input text-center text-lg border py-3" placeholder="8" maxlength="1" required>
                                    </div>

                                    <div class="col-2 px-2">
                                        <input type="text" id="social_email" name="social_email" class="la-form__input text-center text-lg border py-3" placeholder="1" maxlength="1" required>
                                    </div>
                                </div>
                
                
                                <div class="form-group">
                                    <button type="submit"  class="la-btn__app la-btn__secondary py-md-4 text-sm w-100">
                                        Confirm
                                    </button>  
                                    <div class="text-center mt-2" style="font-weight: var(--font-medium)">
                                        <span class="text-sm">Didn't recieve OTP?</span>
                                        <a role="button" href="" class="text-sm" style="color:var(--app-indigo-1);text-decoration:underline">Resend</a>
                                    </div> 
                                </div>
                            </form>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!--  Signup end-->


