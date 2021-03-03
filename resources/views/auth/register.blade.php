@extends('learners.layouts.intro')
{{-- @include('theme.head') --}}
@section('seo_content')
    <title>Register | Start For Free Today | LILA</title>
    <meta name='description' itemprop='description' content='Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now' />

    <meta property="og:description"content="Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now" />
    <meta property="og:title"content="Register | Start For Free Today | LILA" />
    <meta property="og:url"content="{{Request::url()}}" />
    <meta property="og:type"content="website" />
    <meta property="og:site_name"content="LILA Art" />
    <meta property="og:image"content="/images/learners/logo.svg" />
    <meta property="og:image:url"content="/images/learners/logo.svg" />
    <meta property="og:image:size"content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Register | Start For Free Today | LILA" />
    <meta name="twitter:site"content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Register | Start For Free Today | LILA"}</script>
@endsection
@include('admin.message')


{{-- <section id="nav-bar" class="nav-bar-main-block nav-bar-main-block-one">
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
</section> --}}

@section('content')
<section id="signup" class="la-entry__sec">
    <div class="container-fluid la-entry__sec-inner">
        <div class="row la-entry__row ">
            <div class="col-md-7 la-entry__col la-entry__col-left h-100 d-none d-md-block la-anim__wrap">
                <div class="la-entry__slider-wrap d-flex align-items-center la-anim__fade-in-left">
                   <div class="swiper-container entry-swiper-container h-100 la-entry__slider">
                       <div class="swiper-wrapper">
                           <div class="swiper-slide" style="width: 80vw;height: 80vh;background-image:url(../images/learners/login-register/login-slide1.svg)"></div>
                            <div class="swiper-slide" style="width: 80vw;height: 80vh;background-image:url(../images/learners/login-register/login-slide2.svg)"></div>
                        </div>
                       <div class="swiper-pagination swiper-pagination-black"></div>
                   </div>
               </div> 
           </div>

            <div class="col-md-5  la-entry__col la-entry__col-right h-100 la-anim__wrap">
                {{-- <div class="signup-heading">
                    {{ __('frontstaticword.StartLearning') }}!
                </div> --}}

                <div class="la-entry__content-wrap d-flex flex-column justify-content-center la-anim__stagger-item" >     
                    <div class="d-flex flex-column la-entry__content-top">
                        <form class="la-entry__form " method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="la-form__input-wrap la-entry__input-wrap ">
                                <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-profile"></span></span>
                                <input type="text" class="la-form__input la-entry__input{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" id="fname" placeholder="First Name">
                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="la-form__input-wrap la-entry__input-wrap ">
                                <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-profile"></span></span>
                                <input type="text" class="la-form__input la-entry__input{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" id="lname" placeholder="Last Name">
                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" id="lname" placeholder="Last Name">
                                @if($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div> --}}
                            {{-- @if($gsetting->mobile_enable == 0) --}}
                            <div class="la-form__input-wrap la-entry__input-wrap ">
                                <!-- <i class="fa fa-phone" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-contact-number"></span></span>
                                <input type="text" class="la-form__input la-entry__input{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Mobile Number" maxlength="10">
                                @if($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- @endif --}}
                            
                            <div class="la-form__input-wrap la-entry__input-wrap ">
                                <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-mail-id"></span></span>
                                <input type="email" class="la-form__input la-entry__input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="Email ID">
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="la-form__input-wrap la-entry__input-wrap">
                                <span class="la-entry__input-icon">
                                    <span class="la-icon la-icon--xl icon-birthday"></span>
                                </span>
                                <input class="la-form__input la-entry__input" type="text" value="" onfocus="(this.type='date')" name="dob" min='1899-01-01' max='{{ Carbon\Carbon::now()->subYear(18)->format('Y-m-d') }}' placeholder="Date of Birth(dd/mm/yyyy)">
                            </div>
                           
                            <div class="la-form__input-wrap la-entry__input-wrap ">
                                <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-password"></span></span>
                                <input type="password" class="la-form__input la-entry__input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password">
                                <span class="la-entry__input-picon d-none" id="password_hide_icon"><span class="la-icon la-icon--xl icon-hide-Password"></span></span>
                                <span class="la-entry__input-picon" id="password_show_icon"><span class="la-icon la-icon--xl icon-show-password"></span></span>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
        
                            {{-- <div class="la-form__input-wrap la-entry__input-wrap mb-12">
                                <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-confirm-password"></span></span>
                                <input id="password-confirm" type="password" class="la-form__input la-entry__input" name="password_confirmation" placeholder="Confirm Password" required>
                            </div> --}}
                            
                            {{-- @if($gsetting->captcha_enable == 1)
                             <div class="form-group mb-5{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                {!! app('captcha')->display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div> 
                            @endif --}}
                            
                            <button type="submit" title="Sign Up" class="la-btn__app la-btn__secondary w-100 la-anim__stagger-item">{{ __('frontstaticword.Signup') }}</button> 
                        </form>
                    </div>

                    <div class="la-entry__content-bottom text-center la-anim__wrap">
                        <span class="la-entry__bottom-title la-anim__fade-in-top">Register with</span>
                        <div class="d-flex justify-content-center align-items-center ">

                                {{-- @if($gsetting->fb_login_enable == 1) --}}
                                    <div class="la-entry__social-lnk la-anim__stagger-item">
                                        <a href="{{ url('/auth/facebook') }}" target="_blank" title="facebook" class="" title="Facebook">
                                            <span class="la-icon la-icon--6xl icon-facebook-colored"></span>
                                            {{-- {{ __('frontstaticword.ContinuewithFacebook') }} --}}
                                        </a>
                                    </div>
                                {{-- @endif --}}

                                {{-- @if($gsetting->linkedin_enable == 0) --}}
                                <div class="la-entry__social-lnk la-anim__stagger-item">
                                    <a href="{{ url('/auth/linkedin') }}" target="_blank" title="linkedin" class="" title="Linkedin">
                                        <span class="la-icon la-icon--6xl icon-linkedin-colored"></span>
                                        {{-- {{ __('frontstaticword.ContinuewithLinkedin') }} --}}
                                    </a>
                                </div>
                                {{-- @endif --}}
                                
                                {{-- @if($gsetting->google_login_enable == 1) --}}
                                    <div class="la-entry__social-lnk la-anim__stagger-item">
                                        <a href="{{ url('/auth/google') }}" target="_blank" title="google" class="" title="google">
                                            <span class="la-icon la-icon--6xl icon-google-colored"><span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span></span>
                                            {{-- {{ __('frontstaticword.ContinuewithGoogle') }} --}}
                                        </a>
                                    </div>
                                {{-- @endif --}}
                                
                               {{-- @if($gsetting->amazon_enable == 1)
                                    <div class="signin-link amazon-button">
                                        <a href="{{ url('/auth/amazon') }}" target="_blank" title="amazon" class="" title="Amazon">
                                             {{ __('frontstaticword.ContinuewithAmazon') }} 
                                        </a>
                                    </div>
                                @endif  --}}
                
                            
                                {{-- @if($gsetting->twitter_enable == 1)
                                    <div class="signin-link twitter-button">
                                        <a href="{{ url('/auth/twitter') }}" target="_blank" title="twitter" class="rounded-circle btn btn-info btm-10" title="Twitter"><i class="fab fa-twitter"></i>
                                             {{ __('frontstaticword.ContinuewithTwitter') }} 
                                        </a>
                                    </div> 
                                @endif --}}
                
                                {{-- @if($gsetting->gitlab_login_enable == 1)
                                    <div class="signin-link">
                                        <a href="{{ url('/auth/gitlab') }}" target="_blank" title="gitlab" class="rounded-circle btn btn-white" title="gitlab"><i class="fab fa-gitlab"></i>
                                             {{ __('frontstaticword.ContinuewithGitLab') }} 
                                        </a>
                                    </div> 
                                @endif --}}
                        </div>
                    </div>
        
                    <!-- <div class="signin-link text-center btm-20">
                        {{ __('frontstaticword.Bysigningup') }} <a href="{{url('terms_condition')}}" title="Policy">{{ __('frontstaticword.Terms&Condition') }} </a>, <a href="{{url('privacy_policy')}}" title="Policy">{{ __('frontstaticword.PrivacyPolicy') }}.</a>
                    </div> -->

                    <div class="la-entry__other-option text-center mt-md-4">{{ __('frontstaticword.Alreadyhaveanaccount') }}? 
                        <span class="la-btn__plain text--burple text--md ml-2">
                            <a href="{{ route('login') }}" >{{ __('frontstaticword.Login') }}</a>
                        </span>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

{{-- @include('theme.scripts') --}}
<!-- end jquery -->

@section('footerScripts')
<script>
    $('#password_show_icon').click(function(){
        $(this).addClass('d-none');
        $('#password_hide_icon').removeClass('d-none');
        $('#password').prop('type', 'text');
    });

    $('#password_hide_icon').click(function(){
        $(this).addClass('d-none');
        $('#password_show_icon').removeClass('d-none');
        $('#password').prop('type', 'password');
    });
</script>
@endsection