@extends('newui.layouts.master')
@section('seo_content')
    <title>Sign Up at Coursehike | Best Online Courses</title>
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
    <link rel="stylesheet" href="assets/vendors/country-code/intltelInput.min.css">
    <style type="text/css">
        .helptext {
            color: #e63946;
        }
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

        .chike-input-group-box {
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .chike-input-group-box .input-group-text {
            border: none;
            border-right: 2px solid #eee;
        }

        .input-group-text {
            border: none;
            background-color: #fff;
        }

        .chike-input-group-box .input-group-text i {
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

@section('body')
<!--shop register start-->
<section class="woocommerce single page-wrapper p-0">
    <div class="fuild-container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-xl-7 chike-left-side-box">
                <div class="chike-left-side-inner-box">
                    <h1>Watch.<BR> Learn.<BR> Practice.<BR> Repeat.</h1><BR>
                    <p class="chike-graduation"><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
                </div>
            </div>
            <div class="col-md-5 col-xl-5 m-0 p-0">

                <div class="login-form">
                    <div class="form-header">
                        <h2 class="font-weight-bold mb-3">Sign Up</h2>
                    </div>
                    <form action="{{ route('register') }}" class="woocommerce-form woocommerce-form-login login"
                        method="post">
                        @csrf
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <div class="input-group flex-nowrap chike-input-group-box">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-user"
                                    aria-hidden="true"></i></span>
                            <input name="full_name" type="text" class="form-control" placeholder="Enter Full Name"
                                aria-label="Enter Full Name" aria-describedby="addon-wrapping" required>

                        </div>
                        </p>
                        @if ($errors->has('full_name'))
                            <div id="namehelp" class="form-text helptext">{{ $errors->first('full_name') }}</div>
                        @endif

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <div class="input-group flex-nowrap chike-input-group-box">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-envelope"
                                    aria-hidden="true"></i></span>
                            <input name="email" type="email" class="form-control" placeholder="Enter Email"
                                aria-label="Enter Email" aria-describedby="addon-wrapping" required>
                        </div>
                        </p>
                        @if ($errors->has('email'))
                            <div id="emailHelp" class="form-text helptext">{{ $errors->first('email') }}</div>
                        @endif

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <div class="input-group chike-input-group-box">
                            <span class="input-group-text" id="addon-wrapping" style="font-size: 18px;"><i
                                    class="fa fa-lock" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"
                                autocomplete="Enter Password" placeholder="********" aria-describedby="Enter Password" required>
                            <a class="input-group-text togglePassword border-0"><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                        </div>
                        </p>
                        @if ($errors->has('password'))
                            <div id="passwordHelpBlock" class="form-text helptext">
                                Your password must be 8-20 characters long, contain letters and numbers, and must not
                                contain spaces, special characters, or emoji.
                            </div>
                        @endif

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <div class="chike-input-group-box pb-0">
                            <input type="text" class="form-control" name="mobile" id="telephone"
                                autocomplete="Enter Mobile Number" placeholder="Enter Mobile Number"
                                aria-describedby="Enter Mobile Number" required>
                        </div>
                        </p>
                        @if ($errors->has('mobile'))
                            <div id="mobileHelp" class="form-text helptext">{{ $errors->first('mobile') }}</div>
                        @endif

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <div class="input-group flex-nowrap chike-input-group-box pb-0">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-birthday-cake"
                                    aria-hidden="true"></i></span>
                            <input type="date" class="form-control" name="dob"
                                placeholder="Enter date of birth" aria-label="Enter date of birth"
                                aria-describedby="addon-wrapping" required>
                        </div>
                        </p>
                        @if ($errors->has('dob'))
                            <div id="dobHelp" class="form-text helptext" >{{ $errors->first('dob') }}</div>
                        @endif

                        <p class="woocommerce-FormRow form-row text-center">
                            <button type="submit" class="btn btn-sm btn-main-outline m-2 rounded w-50">Sign
                                Up</button>
                        </p>

                        <div class="text-center">
                            <div class="mb-3">Register with</div>
                            <div class="chike-login-share align-items-center mb-3">
                                <ul class="social-icon">
                                    <li class="chike-social-icon-box"><a href="#"><img
                                                src="assets/images/login/chike-linkedin-icon.svg" class="img-fluid"
                                                alt="linkedin" width="20" height="20"></a></li>
                                    <li class="chike-social-icon-box"><a href="#"><img
                                                src="assets/images/login/chike-facebook-icon.svg" class="img-fluid"
                                                alt="facebook" width="20" height="20"></a></li>
                                    <li class="chiksocial-icon-box"><a href="#"><img
                                                src="assets/images/login/chike-google-icon.svg" class="img-fluid"
                                                alt="google" width="20" height="20"></a></li>
                                </ul>
                            </div>
                            <div class="woocommerce-register mb-2">
                                Don't have an account yet? <a href="#" class="text-decoration-underline"
                                    style="color:#3479E2;font-weight: 700;">Sign Up</a>
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
    <!-- Country Code -->
    <script src="assets/vendors/country-code/intltelInput.min.js"></script>
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
        var input = document.querySelector("#telephone");
        window.intlTelInput(input, ({
            preferredCountries: ["in"],
            separateDialCode: true,
        }));
    </script>
@endsection
@endsection
