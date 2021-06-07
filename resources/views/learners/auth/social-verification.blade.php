@extends('learners.layouts.intro')
@section('seo_content')
    <title>Login | Start For Free Today | LILA</title>
    <meta name='description' itemprop='description' content='Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now' />

    <meta property="og:description"content="Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now" />
    <meta property="og:title"content="Login | Start For Free Today | LILA" />
    <meta property="og:url"content="{{Request::url()}}" />
    <meta property="og:type"content="website" />
    <meta property="og:site_name"content="LILA Art" />
    <meta property="og:image"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url"content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size"content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Login | Start For Free Today | LILA" />
    <meta name="twitter:site"content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Login | Start For Free Today | LILA"}</script>

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

                <div class="col-md-5 la-entry__col la-entry__col-right h-100 la-anim__wrap">
                    <div class="la-entry__content-wrap d-flex flex-column justify-content-center">  
                        <div class="d-flex flex-column la-entry__content-top mt-md-5 ">
                            <form method="POST" class="signup-form la-entry__form" action="">
                                @csrf
                                <div class="la-form__input-wrap la-entry__input-wrap mb-md-10 la-anim__stagger-item">
                                    <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-mail-id"></span></span>
                                    <input id="social_email" type="email" class="la-form__input la-entry__input{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Your E-Mail"   name="social_email" value="" required autofocus>
                
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert"  style="margin-left:60px;position:absolute">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                
                                <div class="la-form__input-wrap la-entry__input-wrap  mb-md-14 la-anim__stagger-item">
                                    <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-contact-number"></span></span>
                                    <input id="social_mobile" type="number" class="la-form__input la-entry__input{{ $errors->has('') ? ' is-invalid' : '' }}" placeholder="Enter Your Mobile Number" name="social_mobile" required>
                                       
                                    @if ($errors->has(''))
                                        <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                            <strong>{{ $errors->first('') }}</strong>
                                        </span>
                                    @endif
                                </div>
                
                                <div class="form-group la-anim__stagger-item ">
                                    <button type="submit"  class="la-btn__app la-btn__secondary py-md-4 text-sm w-100">
                                        Verify
                                    </button>   
                                </div>
                            </form>
                        </div>
                            
                        
                        <div class="la-anim__wrap">
                            <div class="text-center la-entry__other-option mt-md-8 la-anim__stagger-item">Create a new account?
                                <span class="la-btn__plain text--burple text--md ml-2 ">
                                    <a href="{{ route('register') }}" title="sign-up">  {{ __('frontstaticword.Signup') }}</a>
                                </span>
                            </div>  
                        
                            <div class="text-center la-entry__other-option mt-md-4 la-anim__stagger-item">Facing an issue?
                                <span class="la-btn__plain text--burple text--md ml-2">
                                    <a href="https://desk.zoho.com/portal/alienstattoo/en/newticket" title="support">Get support</a>
                                </span>
                            </div>  
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!--  Signup end-->


