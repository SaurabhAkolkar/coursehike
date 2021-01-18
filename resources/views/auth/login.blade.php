@extends('learners.layouts.intro')
{{-- @include('theme.head') --}}
@section('title', 'Login')
@include('admin.message')

<!-- top-nav bar start-->
{{-- <section id="nav-bar " class="nav-bar-main-block nav-bar-main-block-one p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="nav-bar-btn btm-20">
                    <a href="{{ url('/') }}" class="btn btn-secondary" title="Home"><i class="fa fa-chevron-left"></i>{{ __('frontstaticword.Backtohome') }}</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="logo text-center btm-10">
                    @php
                        $logo = App\Setting::first();
                    @endphp

                    @if($logo->logo_type == 'L')
                        <a href="{{ url('/') }}" title="logo"><img src="{{ asset('images/logo/'.$logo->logo) }}" class="img-fluid" alt="logo"></a>
                    @else()
                        <a href="{{ url('/') }}"><b><div class="logotext">{{ $logo->project_title }}</div></b></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="Login-btn txt-rgt">
                    <a href="{{ route('register') }}" class="btn btn-primary" title="signup">{{ __('frontstaticword.Signup') }}</a>
                </div> 
            </div> 
        </div>
    </div>
</section> --}}
<!-- top-nav bar end-->

<!-- Signup start-->
@section('content')

    <section id="signup" class="la-entry__sec">
        <div class="container-fluid la-entry__sec-inner ">
            <div class="row la-entry__row h-100">
                <div class="col-md-7 la-entry__col la-entry__col-left h-100 d-none d-md-block">
                    <div class="la-entry__slider-wrap d-flex align-items-center">
                        <div class="swiper-container entry-swiper-container h-100 la-entry__slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(../images/learners/login-register/slide1.png)"></div>
                                    <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(../images/learners/creator/earn.png)"></div>
                                </div>
                            <div class="swiper-pagination swiper-pagination-black"></div>
                        </div>
                    </div> 
                </div>

                <div class="col-md-5 la-entry__col la-entry__col-right h-100">
                    {{-- <div class="signup-heading">
                        {{ __('frontstaticword.LogIntoYour') }} {{ $project_title }} {{ __('frontstaticword.Account') }}!
                    </div> --}}

                    <div class="la-entry__content-wrap d-flex flex-column justify-content-center">  
                        <div class="d-flex flex-column la-entry__content-top mt-md-5">
                                <form method="POST" class="signup-form la-entry__form" action="{{ route('login') }}">
                                    @csrf
                                    <div class="la-form__input-wrap la-entry__input-wrap mb-md-10">
                                        <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                                        <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-mail-id"></span></span>
                                        <input id="email" type="email" class="la-form__input la-entry__input{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Your E-Mail"   name="email" value="{{ old('email') }}" required autofocus>
                
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert"  style="margin-left:60px;position:absolute">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                
                                    <div class="la-form__input-wrap la-entry__input-wrap  mb-md-6">
                                        <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                                        <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-password"></span></span>
                                        <input id="password" type="password" class="la-form__input la-entry__input{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter Your Password" name="password" required>
                                        <span class="la-entry__input-picon"><span class="la-icon la-icon--xl icon-hide-Password"></span></span>
                                        <span class="la-entry__input-picon"><span class="la-icon la-icon--xl icon-show-password"></span></span>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <!-- <div class="form-group">                       
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    
                                                <label class="form-check-label text-sm" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div> -->
                                        <div class="form-group ml-auto">
                                            <div class="forgot-password la-btn__plain text--burple text-right mb-md-8">
                                                <a class="text-sm" href="{{ 'password/reset' }}" title="sign-up">{{ __('frontstaticword.ForgotPassword') }} ?</a>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                        <button type="submit"  class="la-btn__app la-btn__secondary py-md-4 text-sm w-100">
                                            {{ __('frontstaticword.Login') }}
                                        </button>   
                                    </div>
                
                                    {{-- <div class="signin-link text-center pt-2 pb-10">
                                    {{ __('frontstaticword.Bysigningup') }} <a href="{{url('terms_condition')}}" title="Policy">{{ __('frontstaticword.Terms&Condition') }} </a>, <a href="{{url('privacy_policy')}}" title="Policy">{{ __('frontstaticword.PrivacyPolicy') }}.</a>
                                    </div> --}}
                                </form>
                        </div>
                            
                        <div class="la-entry__content-bottom text-center pt-md-14">
                            <span class="la-entry__bottom-title">Login with</span>
                            <div class="d-flex justify-content-center align-items-center">
                                    
                                    {{-- @if($gsetting->fb_login_enable == 1)   --}}
                                        <div class="la-entry__social-lnk">
                                            <a href="{{ url('/auth/facebook') }}" target="_blank" title="facebook" class="" title="Facebook">
                                                <span class="la-icon la-icon--6xl icon-facebook-colored"></span>
                                                {{-- {{ __('frontstaticword.ContinuewithFacebook') }} --}}
                                            </a>
                                        </div>
                                    {{-- @endif --}}

                                    {{-- @if($gsetting->linkedin_enable == 0) --}}
                                    <div class="la-entry__social-lnk">
                                        <a href="{{ url('/auth/linkedin') }}" target="_blank" title="linkedin" class="" title="Linkedin">
                                            <span class="la-icon la-icon--6xl icon-linkedin-colored"></span>
                                            {{-- {{ __('frontstaticword.ContinuewithLinkedin') }} --}}
                                        </a>
                                    </div>
                                    {{-- @endif --}}

                                    {{-- @if($gsetting->google_login_enable == 1) --}}
                                        <div class="la-entry__social-lnk">
                                            <a href="{{ url('/auth/google') }}" target="_blank" title="google" class="" title="google">
                                                <span class="la-icon la-icon--6xl icon-google-colored"><span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span></span>
                                                {{-- {{ __('frontstaticword.ContinuewithGoogle') }} --}}
                                            </a>
                                        </div>
                                    {{-- @endif --}}
                                    
                                    {{-- @if($gsetting->amazon_enable == 1)
                                        <div class="signin-link amazon-button">
                                            <a href="{{ url('/auth/amazon') }}" target="_blank" title="amazon" class="btn btn-info rounded-circle" title="Amazon"><i class="m-0 fab fa-amazon"></i>
                                                {{ __('frontstaticword.ContinuewithAmazon') }}
                                            </a>
                                        </div>
                                    @endif --}}
                
                                
                                    {{-- @if($gsetting->twitter_enable == 1)
                                        <div class="signin-link twitter-button">
                                            <a href="{{ url('/auth/twitter') }}" target="_blank" title="twitter" class="btn btn-info rounded-circle" title="Twitter"><i class="m-0 fab fa-twitter"></i>
                                                 {{ __('frontstaticword.ContinuewithTwitter') }} 
                                            </a>
                                        </div>
                                    @endif --}}
                
                                    {{-- @if($gsetting->gitlab_login_enable == 1)
                                        <div class="signin-link">
                                            <a href="{{ url('/auth/gitlab') }}" target="_blank" title="gitlab" class="btn btn-white rounded-circle" title="gitlab"><i class="m-0 fab fa-gitlab"></i>
                                                 {{ __('frontstaticword.ContinuewithGitLab') }} 
                                            </a>
                                        </div>
                                    @endif --}}
                            </div>
                        </div>

                        <div class="text-center la-entry__other-option mt-md-8">{{ __('frontstaticword.Donothaveanaccount') }}?
                            <span class="la-btn__plain text--burple text--md ml-2">
                                <a href="{{ route('register') }}" title="sign-up">  {{ __('frontstaticword.Signup') }}</a>
                            </span>
                        </div>  
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!--  Signup end-->

<!-- jquery -->
{{-- @include('theme.scripts') --}}
<!-- end jquery -->







