@section('title', 'Sign Up')
@include('theme.head')
@include('admin.message')

<!-- end head -->
<!-- body start-->
<body>
<section id="nav-bar" class="nav-bar-main-block nav-bar-main-block-one">
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
                    <a href="{{ route('login') }}" class="btn btn-secondary" title="login">{{ __('frontstaticword.Login') }}</a>
                </div> 
            </div>
        </div>
    </div>
</section>

<section id="signup" class="la-entry__sec">
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

            <div class="col-md-5  la-entry__col la-entry__col-right h-100">
                <!-- <div class="signup-heading">
                    {{ __('frontstaticword.StartLearning') }}!
                </div> -->

                <div class="la-entry__content-wrap d-flex flex-column justify-content-center">     
                    <div class="d-flex flex-column la-entry__content-top">
                        <form class="la-entry__form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="la-form__input-wrap la-entry__input-wrap ">
                                <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><img src="./images/icons/mail.svg" alt=""></span>
                                <input type="text" class="la-form__input la-entry__input{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('fname') }}" id="fname" placeholder="Full Name">
                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--<div class="form-group">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" id="lname" placeholder="Last Name">
                                @if($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div> -->
                            <div class="la-form__input-wrap la-entry__input-wrap">
                                <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><img src="./images/icons/password.svg" alt=""></span>
                                <input type="email" class="la-form__input la-entry__input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="Email ID">
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if($gsetting->mobile_enable == 1)
                            <div class="la-form__input-wrap la-entry__input-wrap">
                                <!-- <i class="fa fa-phone" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><img src="./images/icons/password.svg" alt=""></span>
                                <input type="text" class="la-form__input la-entry__input{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Mobile Number">
                                @if($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @endif
                            <div class="la-form__input-wrap la-entry__input-wrap">
                                <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><img src="./images/icons/password.svg" alt=""></span>
                                <input type="password" class="la-form__input la-entry__input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
        
                            <div class="la-form__input-wrap la-entry__input-wrap mb-12">
                                <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><img src="./images/icons/password.svg" alt=""></span>
                                <input id="password-confirm" type="password" class="la-form__input la-entry__input" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                            
                            <!--@if($gsetting->captcha_enable == 1)
                             <div class="form-group mb-5{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                {!! app('captcha')->display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div> 
                            @endif-->
        
                            
                            <button type="submit" title="Sign Up" class="btn la-btn la-btn--secondary text--black w-100">{{ __('frontstaticword.Signup') }}</button> 
                        </form>
                        
                        <div class="la-entry__content-bottom text-center">
                            <span class="la-entry__bottom-title">Register with</span>
                            @if($gsetting->fb_login_enable == 1)
                                <div class="la-entry__social-lnk">
                                    <a href="{{ url('/auth/facebook') }}" target="_blank" title="facebook" class="rounded-circle btn btn-info btm-10" title="Facebook"><img src="/images/icons/facebook.svg" alt="">
                                        {{-- {{ __('frontstaticword.ContinuewithFacebook') }} --}}
                                    </a>
                                </div>
                            @endif
                            
                            @if($gsetting->google_login_enable == 1)
                                <div class="la-entry__social-lnk">
                                    <a href="{{ url('/auth/google') }}" target="_blank" title="google" class="rounded-circle btn btn-white btm-10" title="google"><img src="/images/icons/google.svg" alt="">
                                        {{-- {{ __('frontstaticword.ContinuewithGoogle') }} --}}
                                    </a>
                                </div>
                            @endif
                            
                            <!--@if($gsetting->amazon_enable == 1)
                                <div class="signin-link amazon-button">
                                    <a href="{{ url('/auth/amazon') }}" target="_blank" title="amazon" class="rounded-circle btn btn-info btm-10" title="Amazon"><i class="fab fa-amazon"></i>
                                        {{-- {{ __('frontstaticword.ContinuewithAmazon') }} --}}
                                    </a>
                                </div>
                            @endif -->
            
                            @if($gsetting->linkedin_enable == 1)
                                <div class="la-entry__social-lnk">
                                    <a href="{{ url('/auth/linkedin') }}" target="_blank" title="linkedin" class="rounded-circle btn btn-info btm-10" title="Linkedin"><img src="/images/icons/linkedin.svg" alt="">
                                        {{-- {{ __('frontstaticword.ContinuewithLinkedin') }} --}}
                                    </a>
                                </div>
                            @endif
            
                            <!--@if($gsetting->twitter_enable == 1)
                                 <div class="signin-link twitter-button">
                                    <a href="{{ url('/auth/twitter') }}" target="_blank" title="twitter" class="rounded-circle btn btn-info btm-10" title="Twitter"><i class="fab fa-twitter"></i>
                                        {{-- {{ __('frontstaticword.ContinuewithTwitter') }} --}}
                                    </a>
                                </div> 
                            @endif-->
            
                            <!--@if($gsetting->gitlab_login_enable == 1)
                                 <div class="signin-link">
                                    <a href="{{ url('/auth/gitlab') }}" target="_blank" title="gitlab" class="rounded-circle btn btn-white" title="gitlab"><i class="fab fa-gitlab"></i>
                                        {{-- {{ __('frontstaticword.ContinuewithGitLab') }} --}}
                                    </a>
                                </div> 
                            @endif-->
                        </div>
        
                        <!-- <div class="signin-link text-center btm-20">
                            {{ __('frontstaticword.Bysigningup') }} <a href="{{url('terms_condition')}}" title="Policy">{{ __('frontstaticword.Terms&Condition') }} </a>, <a href="{{url('privacy_policy')}}" title="Policy">{{ __('frontstaticword.PrivacyPolicy') }}.</a>
                        </div> -->
                        <div class="sign-up text-center">
                            <small>{{ __('frontstaticword.Alreadyhaveanaccount') }}?</small><a href="{{ route('login') }}" title="sign-up"> {{ __('frontstaticword.Login') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('theme.scripts')
<!-- end jquery -->
</body>
<!-- body end -->
</html> 
