@extends('learners.layouts.app')
@section('title', 'Forgot Password')
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
    @if (session('status'))
        <div class="la-btn__alert position-relative">
            <div class="la-btn__alert-success col-md-4 offset-md-4 alert alert-success alert-dismissible fade show" role="alert">
                <span class="la-btn__alert-msg">{{session('status')}}</span>
                <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="color:#56188C">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 ">
                <div class="la-reset__password text-center la-anim__wrap">
                    <h1 class="la-reset__password-title text-2xl text-md-4xl la-anim__fade-in-top">Forgot Password</h1>
                    <p class="la-reset__password-tag la-anim__stagger-item" style="color: var(--gray6)">Provide email id to receive password reset link</p>

                    <div class="la-reset__password-info">
                        @if (session('status'))
                            <div class="la-btn__alert position-relative">
                                <div class="la-btn__alert-success col-md-4 offset-md-4 alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="la-btn__alert-msg">{{session('status')}}</span>
                                    <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="color:#56188C">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="/reset-passoword-mail">
                            @csrf
                            <div class="form-group py-8 py-md-12">
                                <div class="col-md-3 offset-md-2 text-left la-anim__stagger-item">
                                    <label for="email" class="la-form__lable" style="color: var(--gray6);font-weight:var(--font-medium);">Email ID</label><br/>
                                </div>

                                <div class="col-md-8 offset-md-2 text-center la-anim__stagger-item">
                                    <input id="email" type="email" class="la-form__input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter your Email ID" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback text-right" role="alert" >
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row la-anim__stagger-item">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="la-btn__app w-50">Send Link</button>
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

