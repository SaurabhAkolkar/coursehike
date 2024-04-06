@extends('newui.layouts.auth_master')
@section('seo_content')
    <title> {{-- $course->title --}} | Courses | Best Online Courses for Art & Creativity | LILA</title>
    <meta name='description' itemprop='description'
        content='Best Online Courses in art & creativity for creative minds Get Started for free and learn from passionate creators & mentors all around the world. Join now' />

    <meta property="og:description"
        content="Best Online Courses in art & creativity for creative minds Get Started for free and learn from passionate creators & mentors all around the world. Join now" />
    <meta property="og:title" content="Courses | Best Online Courses for Art & Creativity | LILA" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{-- $course->preview_image --}}" />
    <meta property="og:image:url" content="{{-- $course->preview_image --}}" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Courses | Best Online Courses for Art & Creativity | LILA" />
    <meta name="twitter:site"content="@coursehike" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Courses | Best Online Courses for Art & Creativity | LILA"}</script>
@section('stylesheets')
    <style type="text/css">
        .chike-left-side-box {
            background: linear-gradient(180deg, #C087EC 0%, #87C8EC 100%);
        }

        .chike-left-side-inner-box {
            position: relative;
            text-align: center;
        }

        .chike-left-side-inner-box h1 {
            color: #fff;
            font-size: 40px;
            margin-top: 100px;
        }

        .chike-graduation {
            color: #fff;
            font-size: 75px;
        }

        .required {
            color: red;
        }

        .chike-login-share ul li {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            font-size: 13px;
            color: #0e1133;
            border-radius: 4px;
        }

        .chike-login-share ul li a img {
            width: 35px;
            height: 35px;
        }

        .woocommerce-form p {
            margin-bottom: 10px;
        }

        .chike-email-box,
        .chike-password-box {
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .chike-email-box .input-group-text {
            border: none;
            border-right: 2px solid #eee;
        }

        .chike-password-box .input-group-text {
            border: none;
            border-right: 2px solid #eee;
        }

        .input-group-text {
            border: none;
            background-color: #fff;
        }

        .chike-password-box .input-group-text i {
            color: #A1A1A1;
        }

        .chike-email-box .input-group-text i {
            color: #A1A1A1;
        }

        .woocommerce-form-login .form-control {
            height: 40px !important;
            border: none !important;
        }

        @media (max-width: 768px) {
            .chike-left-side-box {
                display: none;
            }
        }
    </style>
@endsection
@endsection
@include('admin.message')

@section('body')

<!--====== Header start ======-->
<header class="header-style-2">
    <div class="header-navbar navbar-sticky">
        <div class="container-xxl">
            <div class="d-flex align-items-center justify-content-between">
                <div class="site-logo">
                    <a href="#">
                        <img src="assets/images/logos/logo.png" alt="" class="img-fluid chike-logo-black" />
                    </a>
                </div>
                <div class="header-btn d-none d-xl-block">
                    <a href="/login" class="login rounded-pill border btn-sm-2 chike-top-login-btn">Login</a>
                    <a href="/register" class="btn-sm-2 rounded-pill signup-btn border chike-top-signup-btn">Sign
                        up</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!--====== Header End ======-->



<!--shop register start-->
<section class="woocommerce single page-wrapper p-0">
    <div class="fuild-container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-8 chike-left-side-box">
                <div class="chike-left-side-inner-box">
                    <h1>Watch.<BR> Learn.<BR> Practice.<BR> Repeat.</h1><BR>
                    <p class="chike-graduation"><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
                </div>
            </div>
            <div class="col-md-4 col-xl-4 m-0 p-0">

                <div class="login-form">
                    <div class="form-header">
                        <h2 class="font-weight-bold mb-3">sign in</h2>
                    </div>
                    <form method="POST" class="woocommerce-form woocommerce-form-login login"
                        action="{{ route('login') }}">
                        @csrf

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <div class="input-group flex-nowrap chike-email-box">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-envelope"
                                    aria-hidden="true"></i></span>
                            <input id="email" type="email" class="form-control" placeholder="Enter Your E-Mail"
                                name="email" value="{{ old('email') }}" required autofocus
                                aria-label="Enter Your E-Mail" aria-describedby="addon-wrapping">
                        </div>
                        </p>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <div class="input-group chike-password-box">
                            <span class="input-group-text" id="addon-wrapping" style="font-size: 18px;"><i
                                    class="fa fa-lock" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"
                                autocomplete="Enter Password" placeholder="Enter Password"
                                aria-describedby="Enter Password" required>
                            <a class="input-group-text togglePassword border-0"><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                        </div>
                        </p>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                        <div class="d-flex align-items-center justify-content-between py-2">
                            <p class="form-row">
                                <label
                                    class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                        name="rememberme" type="checkbox" id="rememberme" value="forever">
                                    <span>Remember me</span>
                                </label>
                            </p>

                            <p class="woocommerce-LostPassword lost_password">
                                <a href="{{ 'password/reset' }}">{{ __('frontstaticword.ForgotPassword') }} ?</a>
                            </p>
                        </div>

                        <p class="woocommerce-FormRow form-row text-center">
                            <button type="submit" class="btn btn-sm btn-main-outline m-2 rounded w-50">{{ __('frontstaticword.Login') }}</button>
                        </p>

                        <div class="text-center">
                            <div class="mb-3">Login with</div>
                            <div class="chike-login-share align-items-center mb-3">
                                <ul class="social-icon">
                                    <li class="chike-social-icon-box">
                                        <a href="{{ url('/auth/linkedin') }}"><img src="assets/images/login/chike-linkedin-icon.svg"
                                                class="img-fluid" alt="linkedin" width="20" height="20"></a>
                                    </li>
                                    <li class="chike-social-icon-box">
                                        <a href="{{ url('/auth/facebook') }}"><img src="assets/images/login/chike-facebook-icon.svg"
                                                class="img-fluid" alt="facebook" width="20" height="20"></a>
                                    </li>
                                    <li class="chiksocial-icon-box">
                                        <a hhref="{{ url('/auth/google') }}"><img src="assets/images/login/chike-google-icon.svg"
                                                class="img-fluid" alt="google" width="20" height="20"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="woocommerce-register mb-2">
                                Don't have an account yet? <a class="text-decoration-underline"
                                style="color:#3479E2;font-weight: 700;" href="{{ route('register') }}" title="sign-up">  {{ __('frontstaticword.Signup') }} </a>
                            </div>
                            <p>Facing an issue? <a href="#" class="ml-1"
                                    style="color:#3479E2;font-weight: 700;">Get support</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--shop register end-->
@section('scripts')
    <script type="text/javascript">
        $(".togglePassword").click(function(e) {
            e.preventDefault();
            var type = $("#password").attr('type');
            if (type == "password") {
                $(this).html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
                $("#password").attr("type", "text");
            } else if (type == "text") {
                $(this).html('<i class="fa fa-eye" aria-hidden="true"></i>');
                $("#password").attr("type", "password");
            }
        });
    </script>
@endsection
@endsection
