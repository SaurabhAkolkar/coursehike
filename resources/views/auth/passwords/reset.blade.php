@extends('learners.layouts.app')
@section('title', 'Reset Password')
{{-- @include('theme.head') --}}

@include('admin.message')

<!-- top-nav bar start-->
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
<!-- top-nav bar end-->

@section('content')
<section id="signup" class="signup-block-main-block py-14 py-md-20" style="background:var(--gray)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="la-reset__password text-center">
                    <h1 class="la-reset__password-title text-2xl text-md-4xl">Reset Password</h1>
                    <p class="la-reset__password-tag mb-0" style="color: var(--gray6)">Get yourself a more secured Password!</p>

                    <div class="la-reset__password-info py-10 py-md-16">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <div class="col-md-3 offset-md-2 text-left">
                                    <label for="email" class="la-form__lable" style="color: var(--gray6);font-weight:var(--font-medium);">{{ __('frontstaticword.E-MailAddress') }}</label><br/>
                                </div>

                                <div class="col-md-8 offset-md-2 text-center">
                                    <input id="email" type="email" placeholder="Enter your Email ID" class="la-form__input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 offset-md-2 text-left">
                                    <label for="email" class="la-form__lable" style="color: var(--gray6);font-weight:var(--font-medium);">{{ __('frontstaticword.Password') }}</label><br/>
                                </div>
                                
                                <div class="col-md-8 offset-md-2 text-center">
                                    <input id="password" type="password" placeholder="Enter New Password" class="la-form__input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 offset-md-2 text-left">
                                    <label for="email" class="la-form__lable" style="color: var(--gray6);font-weight:var(--font-medium);">{{ __('frontstaticword.ConfirmPassword') }}</label><br/>
                                </div>
                                
                                <div class="col-md-8 offset-md-2 text-center">
                                    <input id="password-confirm" type="password" placeholder="Confirm New Password" class="la-form__input" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row py-10">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="la-btn__app ">
                                        {{ __('frontstaticword.ResetPassword') }}
                                    </button>
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


{{-- @include('theme.scripts') --}}

