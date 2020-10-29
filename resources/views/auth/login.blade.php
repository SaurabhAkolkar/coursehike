@section('title', 'Login')
@include('theme.head')

@include('admin.message')

<!-- end head -->
<!-- body start-->
<body>
<!-- top-nav bar start-->
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
                    <a href="{{ route('register') }}" class="btn btn-primary" title="signup">{{ __('frontstaticword.Signup') }}</a>
                </div> 
            </div>
        </div>
    </div>
</section>

<!-- top-nav bar end-->
<!-- Signup start-->
<section id="signup" class="signup-block-main-block la-entry__sec">
    <div class="container-fluid la-entry__sec-inner">
        <div class="row la-entry__row h-100">
            <div class="col-md-7 la-entry__col la-entry__col-left h-100 d-none d-md-block">
                <!-- <div class="la-entry__slider-wrap d-flex align-items-center">
                    <div class="swiper-container entry-swiper-container h-100 la-entry__slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(../images/learners/login-register/slide1.png)"></div>
                                <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(../images/learners/creator/earn.png)"></div>
                            </div>
                        <div class="swiper-pagination swiper-pagination-black"></div>
                    </div>
                </div> -->
            </div>

            <div class="col-md-5">
                <!-- <div class="signup-heading">
                    {{ __('frontstaticword.LogIntoYour') }} {{ $project_title }} {{ __('frontstaticword.Account') }}!
                </div> -->

                <div class="signup-block">  
                    <div class="d-flex flex-column btm-10">
                        <div class="">
                            <form method="POST" class="signup-form" action="{{ route('login') }}">
                                @csrf
                            
                                <div class="form-group mb-3">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Your E-Mail"   name="email" value="{{ old('email') }}" required autofocus>
            
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
            
                                <div class="form-group mb-3">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter Your Password" name="password" required>
            
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="d-flex align-items-center mb-8">
                                    <div class="form-group">                       
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                                            <label class="form-check-label text-sm" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group ml-auto">
                                        <div class="forgot-password">
                                            <a class="text-xs" href="{{ 'password/reset' }}" title="sign-up">{{ __('frontstaticword.ForgotPassword') }}</a>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="form-group ">
                                    <button type="submit"  class="btn-primary">
                                        {{ __('frontstaticword.Login') }}
                                    </button>
                                    <br>
                                    <br>
                                </div>
            
                                <div class="signin-link text-center pt-2 pb-10">
                                {{ __('frontstaticword.Bysigningup') }} <a href="{{url('terms_condition')}}" title="Policy">{{ __('frontstaticword.Terms&Condition') }} </a>, <a href="{{url('privacy_policy')}}" title="Policy">{{ __('frontstaticword.PrivacyPolicy') }}.</a>
                                </div>
                            </form>
                        </div>
                        
                        <div class="signin-social d-inline-flex mx-auto">
                            @if($gsetting->fb_login_enable == 1)  
                                <div class="signin-link">
                                    <a href="{{ url('/auth/facebook') }}" target="_blank" title="facebook" class="" title="Facebook">
                                        <span class="la-icon la-icon--6xl icon-facebook-colored"></span>
                                        {{-- {{ __('frontstaticword.ContinuewithFacebook') }} --}}
                                    </a>
                                </div>
                            @endif

                            @if($gsetting->linkedin_enable == 1)
                            <div class="signin-link linkedin-button">
                                <a href="{{ url('/auth/linkedin') }}" target="_blank" title="linkedin" class="" title="Linkedin">
                                    <span class="la-icon la-icon--6xl icon-linkedin-colored"></span>
                                    {{-- {{ __('frontstaticword.ContinuewithLinkedin') }} --}}
                                </a>
                            </div>
                             @endif

                            @if($gsetting->google_login_enable == 1)
                                <div class="signin-link google">
                                    <a href="{{ url('/auth/google') }}" target="_blank" title="google" class="" title="google">
                                        <span class="la-icon la-icon--6xl icon-google-colored"><span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span></span>
                                        {{-- {{ __('frontstaticword.ContinuewithGoogle') }} --}}
                                    </a>
                                </div>
                            @endif
                            
                            <!-- @if($gsetting->amazon_enable == 1)
                                <div class="signin-link amazon-button">
                                    <a href="{{ url('/auth/amazon') }}" target="_blank" title="amazon" class="btn btn-info rounded-circle" title="Amazon"><i class="m-0 fab fa-amazon"></i>
                                        {{-- {{ __('frontstaticword.ContinuewithAmazon') }} --}}
                                    </a>
                                </div>
                            @endif -->
        
                           
                            <!--@if($gsetting->twitter_enable == 1)
                                <div class="signin-link twitter-button">
                                    <a href="{{ url('/auth/twitter') }}" target="_blank" title="twitter" class="btn btn-info rounded-circle" title="Twitter"><i class="m-0 fab fa-twitter"></i>
                                        {{-- {{ __('frontstaticword.ContinuewithTwitter') }} --}}
                                    </a>
                                </div>
                            @endif -->
        
                            <!-- @if($gsetting->gitlab_login_enable == 1)
                                <div class="signin-link">
                                    <a href="{{ url('/auth/gitlab') }}" target="_blank" title="gitlab" class="btn btn-white rounded-circle" title="gitlab"><i class="m-0 fab fa-gitlab"></i>
                                        {{-- {{ __('frontstaticword.ContinuewithGitLab') }} --}}
                                    </a>
                                </div>
                            @endif -->
                        </div>

                        <div class="sign-up text-center">{{ __('frontstaticword.Donothaveanaccount') }}?<a href="{{ route('register') }}" title="sign-up">  {{ __('frontstaticword.Signup') }}</a>
                        </div>  
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Signup end-->
<!-- jquery -->
@include('theme.scripts')
<!-- end jquery -->
</body>
<!-- body end -->
</html> 






