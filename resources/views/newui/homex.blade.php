<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>Coursehike</title>

    <!-- Mobile Specific Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.css">
    <!-- Iconfont Css -->
    <link rel="stylesheet" href="assets/vendors/awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/vendors/owl/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl/assets/owl.theme.default.min.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="assets/css/woocomerce.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/coursehike.css">

    <!-- course list -->
    <style type="text/css">
        .chike-course-like-btn {
            background-color: #fff;
            padding: 1px 7px;
            position: absolute;
            border-radius: 20px;
            right: 10px;
            width: 30px;
            height: 30px;
            top: 10px;
            cursor: pointer;
        }

        .chike-course-like-btn .chike-course-like {
            color: #3479E2 !important;
        }

        .chike-course-like-btn .chike-course-not-like {
            color: #C9C8C8;
        }

        .chike-course-like-btn .chike-course-not-like:hover {
            color: #ff0000 !important;
        }

        .chike-course-like-btn .fa-heart-red {
            color: #ff0000 !important;
        }

        .fa-heart-blue {
            color: #0d6efd !important;
        }

        .chike-course-buy-status-success-label {
            background-color: #008000;
            color: #ffffff;
            font-size: 12px;
            font-weight: 500;
            position: absolute;
            top: 5px;
            left: 5px;
            padding: 0px 15px;
            border-radius: 20px;
        }

        .chike-course-explore-more-btn {
            color: #3479E2;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            display: inline-block;
        }
    </style>

    <style type="text/css">
        /*====top menu=========*/
        .header-style-2 {
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 9;
        }

        .header-style-2 .navbar-sticky .header-category-menu li a,
        .header-style-2 .navbar-sticky .header-category-menu li.has-submenu a i,
        .header-style-2 .navbar-sticky .primary-menu li .menu-trigger,
        .header-style-2 .navbar-sticky .site-navbar .primary-menu li a,
        .header-style-2 .navbar-sticky .header-btn .login {
            color: #ffffff;
        }

        .header-style-2 .navbar-sticky.menu_fixed .header-category-menu li.has-submenu a,
        .header-style-2 .navbar-sticky.menu_fixed .header-category-menu li.has-submenu a i,
        .header-style-2 .navbar-sticky.menu_fixed .primary-menu li .menu-trigger,
        .header-style-2 .navbar-sticky.menu_fixed .site-navbar .primary-menu li a,
        .header-style-2 .navbar-sticky.menu_fixed .header-btn .login {
            color: #000000;
        }

        /*.header-style-2 .navbar-sticky .site-logo .chike-logo-white{
         display: block;
        }*/
        .header-style-2 .navbar-sticky .site-logo .chike-logo-black {
            display: none;
        }

        .header-style-2 .navbar-sticky.menu_fixed .chike-logo-black {
            display: block;
        }

        .header-style-2 .navbar-sticky.menu_fixed .site-logo .chike-logo-white {
            display: none;
        }

        .chike-top-header-navbar-desktop .primary-menu li a {
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            line-height: 1.4;
            text-transform: capitalize;
            font-family: var(--theme-heading-font);
        }

        /*==========home slider=============*/
        .hero-carousel-header {
            padding: 325px 0px;
            background: #F4F5F8;
            position: relative;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: 1;
            height: 600px;
        }

        .owl-carousel .owl-item {
            overflow: hidden;
            padding: 0px;
            margin: 0px;
        }

        .chike-section-heading-title {
            text-align: center;
        }

        /*==course card========*/
        .chike-profile-name {
            padding: 10px 15px;
            background-color: #43454b;
            color: #fff;
            font-size: 16px !important;
            font-weight: 600;
            width: 30px !important;
            height: 30px !important;
            border-radius: 100%;
            margin-right: 15px;
        }

        .chike-course-card-houre-add-to-card-btn {
            width: 80%;
            max-width: 100%;
        }

        .chike-title-color-blue {
            color: #3479E2;
            margin-bottom: 25px;
        }

        .course-wrapper .price {
            font-size: 25px;
            font-weight: 700;
        }

        .course-wrapper .course-meta,
        .course-wrapper .author {
            width: 100%;
        }

        .chike-course-like {
            float: right;
            padding: 8px;
            color: #808080;
            font-size: 20px;
            padding: 8px 15px 5px 15px;
            /* border: 1px solid #eee; */
        }

        .chike-explore-more-title {
            font-size: 24px;
        }

        /*====Why Choose Us==========*/
        .chike-why-choose-us .list-item {
            margin: 0px;
        }

        .chike-why-choose-us .list-item i {
            font-size: 24px
        }

        .chike-why-choose-us .list-item h5 {
            font-size: 24px;
            display: contents;
        }

        @media (max-width: 768px) {
            .hero-carousel-header {
                height: 100%;
            }

            .chike-why-choose-us .list-item i {
                font-size: 18px;
                float: none;
            }

            .chike-why-choose-us .list-item h5 {
                font-size: 18px;
            }

            .chike-why-choose-us {
                text-align: center;
            }

            .subscribe-form .form-control {
                height: 55px;
                padding-right: 0px
            }

            .subscribe-form .btn {
                font-size: 10px;
                padding: 15px 10px;
            }

            .course-hover-content {
                display: none;
            }
        }
    </style>

</head>

<body id="top-header" class="bg-grey">
    <div id="pageMessages"></div>
    <header class="header-style-2">
        <div class="header-navbar navbar-sticky">
            <div class="container-xxl">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="site-logo">
                        <a href="/">
                            <img src="assets/images/logos/logo-white.png" alt=""
                                class="img-fluid chike-logo-white" />
                            <img src="assets/images/logos/logo.png" alt="" class="img-fluid chike-logo-black" />
                        </a>
                    </div>

                    <div class="offcanvas-icon d-block d-lg-none">
                        <a href="#" class="nav-toggler"><i class="fal fa-bars"></i></a>
                    </div>
                    <nav class="site-navbar ms-auto chike-mobile-menu-site-navbar">
                        <ul class="primary-menu">
                            <li>
                                <a href="#"><i class="fa fa-arrow-right mr-2"></i> Become Instructor</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-arrow-right mr-2"></i> Refer and Earn</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-arrow-right mr-2"></i> About us</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-arrow-right mr-2"></i> Contact us</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-arrow-right mr-2"></i> Services</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-arrow-right mr-2"></i> Support</a>
                            </li>
                        </ul>
                        <a href="#" class="nav-close"><i class="fal fa-times"></i></a>
                    </nav>

                    <div class="header-category-menu d-none d-xl-block">
                        <ul class="primary-menu">
                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-th me-2"></i>Categories</a>
                                <ul class="submenu">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="#">{{ $category->title }}</a>
                                            @if (count($category->subcategory) != 0)
                                                <ul class="submenu">
                                                    @if ($category->subcategory)
                                                        @foreach ($category->subcategory as $subcategory)
                                                            <li><a
                                                                    href="{{ route('subcategoryallcourse', $subcategory->id) }}">{{ $subcategory->title }}
                                                                </a></li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <nav class="chike-top-header-navbar-desktop ms-auto">
                        <ul class="primary-menu">
                            {{-- <li>
                                <a href="#" class="header-search header_search_btn"><i
                                        class="fa fa-search"></i></a>
                            </li>
                             <li class="position-relative" id="chike-top-menu-notifications-btn">
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger chike-top-menu-notifications-btn"
                                    id="chike-top-menu-notifications-btn">9</span>
                                <a href="javascript:;" class=""><i class="fa fa-bell"></i></a>
                                <span class="chike-top-menu-notifications">
                                    <h4 class="chike-menu-notifications-title">Notification</h4>
                                    <p class="chike-menu-notifications-title-sub chike-hide">No Notifications.</p>
                                    <div id="chike-menu-notifications-both-box">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-student-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-student" type="button"
                                                    role="tab" aria-controls="pills-student"
                                                    aria-selected="true">Student</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-mentor-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-mentor" type="button" role="tab"
                                                    aria-controls="pills-mentor" aria-selected="false">Mentor</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <!-- Student -->
                                            <div class="tab-pane fade show active" id="pills-student" role="tabpanel"
                                                aria-labelledby="pills-student-tab">
                                                <p class="chike-menu-notifications-title-sub">No Notifications.</p>
                                            </div>
                                            <!-- /Student -->
                                            <!-- Mentor -->
                                            <div class="tab-pane fade" id="pills-mentor" role="tabpanel"
                                                aria-labelledby="pills-mentor-tab">
                                                <p class="chike-menu-notifications-title-sub">No Notifications.</p>
                                            </div>
                                            <!-- /Mentor -->
                                        </div>
                                    </div>
                                </span>
                            </li> --}}
                            <li>

                                @auth
                                    <a href="/wishlist"><i id="wishlist-nav-i"
                                            class="fa fa-heart {{ Auth::user()->CheckWishlist ? 'fa-heart-blue' : '' }} "></i></a>
                                @endauth

                                @guest
                                    <a data-bs-toggle="modal" data-bs-target="#chikeLoginModal" href="/wishlist">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                @endguest

                            </li>
                            <li>
                                @if ($cart_items)
                                    <span
                                        class="position-absolute start-100 translate-middle badge rounded-pill bg-success"
                                        style="top: -3px;" id="cart_count">
                                        {{ $cart_items }}
                                    </span>
                                @else
                                    <span class="position-absolute start-100 translate-middle badge rounded-pill"
                                        style="top: -3px;" id="cart_count"></span>
                                @endif
                                @auth
                                    <a href="/carts"><i class="fa fa-shopping-cart"></i></a>
                                @endauth

                                @guest
                                    <a data-bs-toggle="modal" data-bs-target="#chikeLoginModal" href="/carts"><i
                                            class="fa fa-shopping-cart"></i></a>
                                @endguest


                            </li>
                        </ul>

                        {{-- <a href="#" class="nav-close"><i class="fal fa-times"></i></a> --}}
                    </nav>


                    @if (Auth::check())
                        @php
                            $user = Auth::User();
                            $first_name = explode(' ', Auth::User()->fname)[0];
                        @endphp
                        <!-- Profile -->
                        <div class="header-btn d-none d-xl-block mr-5">
                            <span id="chike-user-profile-menu-btn">
                                <button class="chike-user-profile">{{ $first_name[0] }}</button>
                                <div class="chike-my-profile-top-menu">
                                    <div class="client-info d-flex align-items-center">
                                        <div class="client-img">
                                            @if (Auth::User()->user_img != null || Auth::User()->user_img != '')
                                                <img src="assets/images/users-profile/default-img.jpg" alt=""
                                                    class="img-fluid">
                                            @else
                                                <img src="assets/images/users-profile/default-img.jpg" alt=""
                                                    class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="testimonial-author">
                                            <h4 style="text-align: center">Hi !{{ $first_name }}</h4>
                                        </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <a href="#" class="list-group-item">My Learning</a>
                                        <a href="#" class="list-group-item">Teach on CourseHike</a>
                                        <a href="#" class="list-group-item">Messages</a>
                                        <a href="#" class="list-group-item">My Profile</a>
                                        <a href="#" class="list-group-item">Language</a>
                                        <a href="#" class="list-group-item">Help</a>
                                        <a class="list-group-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('adminstaticword.Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <!-- /Profile -->
                    @else
                        <div class="header-btn d-none d-xl-block">
                            <a href="/login" class="login rounded-pill border btn-sm-2 chike-top-login-btn">Login</a>
                            <a href="/register"
                                class="btn-sm-2 rounded-pill signup-btn border chike-top-signup-btn">Sign
                                up</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <!--====== Header End ======-->

    <!-- Banner Section Start -->
    <section class="course-page-headerx page-header-3">
        <div class="owl-carousel owl-theme hero-carousel">
            <div class="hero-carousel-header"
                style="background-image: url(./assets/images/home-page/top-home-page-banner1.jpg);"></div>
            <div class="hero-carousel-header"
                style="background-image: url(./assets/images/home-page/top-home-page-banner2.jpg);"></div>
        </div>
    </section><!-- Banner Section End -->


    <!--  Course style 1 -->
    <section class="course-wrapper bg-grey" style="padding: 0px 0px 60px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-heading mb-30 chike-section-heading-title">
                        <h2 class="font-md">Start Your Journey</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-lg-center">

                <!-- COURSE CARD START -->
                @foreach ($cor as $course)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="course-grid course-style-3 bg-white">

                            <div class="course-header">

                                <div class="course-thumb p-0">

                                    @auth
                                        <span onclick="addToWishlist({{ $course->id }})" id="wishlist-color"
                                            class="chike-course-like-btn"><i id="wishlist-i"
                                                class="fa fa-heart {{ $course->CheckWishlist ? 'fa-heart-red' : 'chike-course-not-like' }}"></i>
                                        </span>
                                    @endauth

                                    @guest
                                        <span data-bs-toggle="modal" data-bs-target="#chikeLoginModal"
                                            id="wishlist-color" class="chike-course-like-btn"><i
                                                class="fa fa-heart chike-course-not-like"></i>
                                        </span>
                                    @endguest

                                    {{-- <span class="chike-course-buy-status-success-label">Purchased</span> --}}
                                    <img src="{{ $course->VideoPreviewImg }}" alt="{{ $course->title }}"
                                        class="img-fluid">
                                </div>
                            </div>

                            <div class="course-content">
                                <div class="course-meta d-flex justify-content-between mb-10">
                                    <b><span class="students"><i class="far fa-language me-2"></i>
                                            {{ $course->language->name }}</span></b>
                                    <b><span class="lessons"><i
                                                class="far fa-play-circle me-2"></i>{{ $course->courseclass->count() }}
                                            {{ $course->courseclass->count() > 1 ? 'Lessons' : 'Lesson' }}</span></b>
                                    <b><span class="duration"><i
                                                class="far fa-clock me-2"></i>{{ $course->duration }}
                                            {{ $course->duration > 1 ? 'Hourse' : 'Hour' }}</span></b>
                                </div>
                                <h3 class="course-title mb-10"> <a
                                        href="{{ route('course.overview', $course->id) }}">{{ $course->title }}</a>
                                </h3>
                                <div class="course-meta-info">
                                    <div class="d-flex align-items-center">
                                        <div class="author me-3">
                                            By <a href="#">{{ $course->user->fname }}</a>
                                        </div>
                                        <div class="rating mb-10">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span>3.9 (30 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-footer mt-3 pt-3 d-flex align-items-center justify-content-between">
                                    @if ($course->package_type == 1)
                                        <div class="course-price text-primary">₹ {{ $course->price }}</div>
                                    @else
                                        <div class="course-price text-success">Free</div>
                                    @endif
                                    @auth
                                        <a href="{{ route('buynow', $course->id) }}"
                                            class="btn btn-main-outline btn-radius btn-sm">Buy Now
                                            <i class="fa fa-long-arrow-right"></i>
                                        </a>
                                    @endauth

                                    @guest
                                        <a data-bs-toggle="modal" data-bs-target="#chikeLoginModal"
                                            class="btn btn-main-outline btn-radius btn-sm">Buy Now
                                            <i class="fa fa-long-arrow-right"></i>
                                        </a>
                                    @endguest

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COURSE END -->
                @endforeach
                <!-- COURSE CARD END -->
            </div>
            <br>
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center">
                        <a href="{{ route('allcourselist') }}"
                            class="text-style2 fw-bold chike-explore-more-title">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Course style 1 End -->

    <!-- InstructorsSection Start -->
    <section class="instructors section-padding bg-white chike-why-choose-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="section-heading">
                        <h2 class="font-lg chike-title-color-blue">Why Choose Us</h2>
                        <ul class="list-item">
                            <li><i class="fa fa-check-circle text-success"></i>
                                <h5>Get Lifetime access to the course</h5>
                            </li>
                            <li><i class="fa fa-check-circle text-success"></i>
                                <h5>7 Days Moneyback Garantee</h5>
                            </li>
                            <li><i class="fa fa-check-circle text-success"></i>
                                <h5>100 % Return policy</h5>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6">
                    <img src="assets/images/home-page/why-choose-us.png" alt="Why Choose Us" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!--Instructors Section End -->

    <!-- InstructorsSection Start -->
    <section class="be-instructor section-padding">
        <div class="container">
            <div class="row align-items-center justify-content-lg-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="section-heading mt-4 mt-lg-0 text-center">
                        <h2 class="font-lg mb-20 chike-title-color-blue">Become Instructor With CourseHike</h2>
                        <p class="mb-20">Share your expertise with the world! Become an instructor on CourseHike and
                            create high-quality <BR>e-learning courses that reach a global audience. Apply today and
                            join our community of educators and creators.</p>
                        {{-- <a href="#" class="btn btn-sm btn-main m-2 rounded">Join Now</a> --}}
                        <a href="{{ route('become_a_mentor') }}"
                            class="btn btn-sm btn-main-outline m-2 rounded">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Instructors Section End -->


    <!-- InstructorsSection Start -->
    <section class="be-instructor section-padding bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <img src="assets/images/home-page/news-subscribe-form.png" alt="" class="img-fluid">
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="section-heading mt-4 mt-lg-0">
                        <h2 class="font-lg mb-20">Let’s Join To Our Newsletters</h2>
                        <div class="subscribe-form rounded-pill">
                            <form action="{{ route('emailsubscriber') }}" method="POST"
                                class="form border rounded-pill">
                                @csrf
                                <input type="email" required name="email" class="form-control rounded-pill"
                                    placeholder="Enter your email">
                                <button type="submit" class="btn btn-main rounded rounded-pill">SUBSCRIBE
                                    NOW</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Instructors Section End -->


    <!-- Footer section start -->
    <section class="footer footer-1">
        <div class="footer-mid">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-sm-12 me-auto">
                        <div class="widget footer-widget mb-5 mb-lg-0">
                            <div class="footer-logo">
                                <img src="assets/images/logos/logo-white.png" alt="" class="img-fluid">
                            </div>

                            <p class="mt-4">Share your expertise with the world! Become an instructor on CourseHike
                                and create high-quality e-learning courses that reach a global audience. Apply today and
                                join our community of educators and creators.</p>

                            <div class="footer-socials mt-5">
                                <span class="me-2 widget-title">Connect :</span>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-sm-4">
                        <div class="footer-widget mb-5 mb-lg-0">
                            <h5 class="widget-title">Explore</h5>
                            <ul class="list-unstyled footer-links">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-sm-4">
                        <div class="footer-widget mb-5 mb-lg-0">
                            <h5 class="widget-title ">Programs</h5>
                            <ul class="list-unstyled footer-links">
                                <li><a href="#">Become Instructor</a></li>
                                <li><a href="#">Refer and Earn</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Credits</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-sm-4">
                        <div class="footer-widget mb-5 mb-lg-0">
                            <h5 class="widget-title">Links</h5>
                            <ul class="list-unstyled footer-links">
                                <li><a href="#" onclick="showMessageBox('SUCCESS',1)">News & Blogs</a></li>
                                <li><a href="#" onclick="showMessageBox('Completed',2)">Privacy Policy</a></li>
                                <li><a href="#" onclick="showMessageBox('Failed',3)">Support</a></li>
                                <li><a href="#" onclick="showMessageBox('ERROR',4)">Return Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-btm">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-sm-12 col-lg-12">
                        <p class="mb-0 copyright text-center text-white">© 2023 Coursehike All rights reserved by <a
                                href="#" rel="nofollow">www.coursehike.com</a> </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-btm-top">
            <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
        </div>
    </section>
    <!-- Footer section end -->

    <!-- search box popup box -->
    <div class="page_search_box">
        <div class="search_close">
            <i class="fa fa-times"></i>
        </div>
        <form class="border" action="#">
            <span class="chike-page_search_box-icon"><i class="fa fa-search"></i></span>
            <input class="border-0" placeholder="Search Courses..." type="text">
        </form>
    </div>
    <!-- /search box popup box -->




    <!-- login model -->

    <!-- Modal -->
    <style type="text/css">
        #chikeLoginModal .login-form,
        #chikeLoginModal.signup-form {
            padding: 0px 25px !important;
            border: 0px !important;
        }

        #chikeLoginModal .chike-left-side-box {
            background: linear-gradient(180deg, #C087EC 0%, #87C8EC 100%);
        }

        #chikeLoginModal .chike-left-side-inner-box {
            position: relative;
            text-align: center;
        }

        #chikeLoginModal .chike-left-side-inner-box h1 {
            color: #fff;
            font-size: 40px;
            margin-top: 80px;
        }

        #chikeLoginModal .chike-graduation {
            color: #fff;
            font-size: 75px;
        }

        #chikeLoginModal .required {
            color: red;
        }

        #chikeLoginModal .chike-login-share ul li {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            font-size: 13px;
            color: #0e1133;
            border-radius: 4px;
        }

        #chikeLoginModal .chike-login-share ul li a img {
            width: 35px;
            height: 35px;
        }

        #chikeLoginModal .chike-email-box,
        .chike-password-box {
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        #chikeLoginModal .chike-email-box .input-group-text {
            border: none;
            border-right: 2px solid #eee;
        }

        #chikeLoginModal .chike-password-box .input-group-text {
            border: none;
            border-right: 2px solid #eee;
        }

        #chikeLoginModal .input-group-text {
            border: none;
            background-color: #fff;
        }

        #chikeLoginModal .chike-password-box .input-group-text i {
            color: #A1A1A1;
        }

        #chikeLoginModal .chike-email-box .input-group-text i {
            color: #A1A1A1;
        }

        #chikeLoginModal .woocommerce-form-login .form-control {
            height: 40px !important;
            border: none !important;
            background-color: #fff !important;
        }

        #chikeLoginModal .togglePassword:hover i {
            color: #3479e2;
            cursor: pointer;
        }

        #chikeLoginModal .chike-tandc-title {
            font-size: 12px;
            color: #A1A1A1;
            margin-bottom: 0px;
        }

        #chikeLoginModal .btn-close {
            cursor: pointer;
        }
    </style>
    <div class="modal fade" id="chikeLoginModal" tabindex="-1" aria-labelledby="chikeLoginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 1rem;">
                <div class="modal-header border-0">
                    <span class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
                </div>
                <div class="modal-body">
                    <div class="login-form">
                        <div class="form-header">
                            <h2 class="font-weight-bold mb-3">Login</h2>
                            <p>to continue your journey with <strong>CourseHike</strong></p>
                        </div>
                        <form class="woocommerce-form woocommerce-form-login login" method="POST"
                            action="{{ route('login') }}">
                            @csrf
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <div class="input-group flex-nowrap chike-email-box">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-envelope"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" placeholder="Enter Your E-Mail"
                                    name="email" value="{{ old('email') }}" required autofocus
                                    aria-label="Enter Your E-Mail" aria-describedby="addon-wrapping">
                            </div>
                            </p>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert"
                                    style="margin-left:60px;position:absolute">
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
                                <span class="invalid-feedback" role="alert"
                                    style="margin-left:60px;position:absolute">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <p class="woocommerce-FormRow form-row text-center">
                                <button type="submit" class="btn btn-sm btn-main-outline m-2 rounded w-50"
                                    name="register" value="LOGIN">LOGIN</button>
                            </p>

                            <div class="text-center">
                                <p class="woocommerce-LostPassword lost_password fw-bolder mb-1">
                                    <a href="{{ 'password/reset' }}">Forgot password?</a>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <hr>
                                </div>
                                <div class="col-auto">OR</div>
                                <div class="col">
                                    <hr>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="chike-login-share align-items-center mb-3">
                                    <ul class="social-icon">
                                        <li class="chike-social-icon-box">
                                            <a href="{{ url('/auth/linkedin') }}">
                                                <img src="assets/images/login/chike-linkedin-icon.svg"
                                                    class="img-fluid" alt="linkedin" width="20" height="20">
                                            </a>
                                        </li>
                                        <li class="chike-social-icon-box">
                                            <a href="{{ url('/auth/facebook') }}">
                                                <img src="assets/images/login/chike-facebook-icon.svg"
                                                    class="img-fluid" alt="facebook" width="20" height="20">
                                            </a>
                                        </li>
                                        <li class="chiksocial-icon-box">
                                            <a href="{{ url('/auth/google') }}">
                                                <img src="assets/images/login/chike-google-icon.svg" class="img-fluid"
                                                    alt="google" width="20" height="20">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="chike-tandc-title">By continuing you agree to CourseHike’s Terms and
                                    conditions, privacy policy. </p>
                                <hr>
                                <div class="woocommerce-register mb-2">
                                    Don't have an account yet? <a href="{{ route('register') }}"
                                        class="text-decoration-none" style="color:#3479E2;font-weight: 700;">Sign Up
                                        Now</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /login model -->


    <!-- message-box-css -->
    <style type="text/css">
        .msg_box_hide {
            display: none !important
        }

        .chike-icon-notification-box {
            float: left;
            margin-right: 5px;
        }

        .chike-notification-content-box {
            overflow: hidden;
        }

        .chike-notification-content-box .chike-notification-box-title {
            font-weight: 500;
            font-size: 16px;
            line-height: 1.5;
            margin-left: 5px;
            display: inline-flex;
        }

        /*-------error info box--------*/
        #chike-error-notification-box {
            width: 350px;
            max-width: 100%;
            font-size: .875rem;
            pointer-events: auto;
            background-color: rgba(255, 255, 255, .85);
            border: 1px solid rgba(0, 0, 0, .1);
            border-radius: .25rem;
            padding: 15px;
            position: fixed;
            right: 15px;
            bottom: 15px;
            z-index: 999;
        }

        #chike-error-notification-box .chike-error-notification-box-text {
            font-weight: 500;
            font-size: 16px;
            line-height: 1.5;
            margin-left: 5px;
        }

        /*-------error info box--------*/
        #chike-failed-notification-box {
            width: 350px;
            max-width: 100%;
            font-size: .875rem;
            pointer-events: auto;
            background-color: rgba(255, 255, 255, .85);
            border: 1px solid rgba(0, 0, 0, .1);
            border-radius: .25rem;
            padding: 15px;
            position: fixed;
            right: 15px;
            bottom: 15px;
            z-index: 999;
        }

        #chike-failed-notification-box .chike-failed-notification-box-text {
            font-weight: 500;
            font-size: 16px;
            line-height: 1.5;
            margin-left: 5px;
        }

        /*--------success  info box-----*/
        #chike-success-notification-box {
            width: 350px;
            max-width: 100%;
            font-size: .875rem;
            pointer-events: auto;
            background-color: rgba(255, 255, 255, .85);
            border: 1px solid rgba(0, 0, 0, .1);
            border-radius: .25rem;
            padding: 15px;
            position: fixed;
            right: 15px;
            bottom: 15px;
            z-index: 999;
        }

        #chike-success-notification-box .chike-success-notification-box-text {
            font-weight: 500;
            font-size: 16px;
            line-height: 1.5;
            margin-left: 5px;
        }

        /*--------complete  info box-----*/
        #chike-complete-notification-box {
            width: 350px;
            max-width: 100%;
            font-size: .875rem;
            pointer-events: auto;
            background-color: rgba(255, 255, 255, .85);
            border: 1px solid rgba(0, 0, 0, .1);
            border-radius: .25rem;
            padding: 15px;
            position: fixed;
            right: 15px;
            bottom: 15px;
            z-index: 999;
        }
    </style>
    <!-- /message-box-css -->


    {{-- message box started --}}

    <!-- chike-error-notification-box -->
    <div class="d-flex align-items-center msg_box_hide" id="chike-error-notification-box">
        <div class="chike-icon-notification-box">
            <svg width="34" height="34" viewBox="0 0 61 61" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <circle cx="30.3246" cy="30.5" r="29.7807" fill="#F8BC24" />
                <path
                    d="M27.076 36.044L25.9 22.422L25.606 15.17H34.034L33.74 22.422L32.564 36.044H27.076ZM29.82 48.588C28.3827 48.588 27.2067 48.098 26.292 47.118C25.3773 46.138 24.92 44.9293 24.92 43.492C24.92 42.0547 25.3773 40.846 26.292 39.866C27.2067 38.886 28.3827 38.396 29.82 38.396C31.2573 38.396 32.4333 38.886 33.348 39.866C34.2627 40.846 34.72 42.0547 34.72 43.492C34.72 44.9293 34.2627 46.138 33.348 47.118C32.4333 48.098 31.2573 48.588 29.82 48.588Z"
                    fill="white" />
            </svg>
        </div>
        <div class="chike-notification-content-box">
            {{-- <span class="chike-notification-box-title">Opps! Something went wrong Please try again</span> --}}
        </div>
    </div>
    <!-- /chike-error-notification-box -->



    <!-- chike-failed-notification-box -->
    <div class="d-flex align-items-center msg_box_hide" id="chike-failed-notification-box">
        <div class="chike-icon-notification-box">
            <svg width="34" height="34" viewBox="0 0 60 61" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <circle cx="29.7807" cy="30.4999" r="29.7807" fill="#FF0000" />
                <path
                    d="M40.6461 21.705C40.6461 22.2183 40.4827 22.6967 40.1561 23.14C37.2394 27.06 34.9877 30.07 33.4011 32.17L39.2811 40.185C39.8411 40.9083 40.1211 41.445 40.1211 41.795C40.1211 42.4483 39.8294 43.0433 39.2461 43.58C38.6861 44.0933 38.0327 44.35 37.2861 44.35C36.9127 44.35 36.6211 44.2683 36.4111 44.105C36.2011 43.965 35.9794 43.7433 35.7461 43.44C33.9027 41.0367 32.0944 38.645 30.3211 36.265L25.5611 42.635C25.1877 43.125 24.8027 43.4867 24.4061 43.72C24.0327 43.93 23.5894 44.035 23.0761 44.035C22.3294 44.035 21.6994 43.8017 21.1861 43.335C20.6727 42.8683 20.4161 42.3433 20.4161 41.76C20.4161 41.3633 20.4627 41.0717 20.5561 40.885C20.6494 40.6983 20.8127 40.465 21.0461 40.185C21.9794 38.9717 22.6794 38.085 23.1461 37.525L27.2761 32.17C25.7594 30.1167 23.7177 27.3167 21.1511 23.77L20.6961 23.14C20.3694 22.72 20.2061 22.335 20.2061 21.985C20.2061 21.285 20.4861 20.69 21.0461 20.2C21.6294 19.71 22.3294 19.465 23.1461 19.465C23.6127 19.465 23.9744 19.5933 24.2311 19.85C24.4877 20.0833 24.8261 20.48 25.2461 21.04L30.4261 28.11L36.0961 20.585C36.3994 20.1883 36.6444 19.9083 36.8311 19.745C37.0411 19.5583 37.3094 19.465 37.6361 19.465C38.1494 19.465 38.6394 19.5817 39.1061 19.815C39.5727 20.0483 39.9461 20.34 40.2261 20.69C40.5061 21.04 40.6461 21.3783 40.6461 21.705Z"
                    fill="white" />
            </svg>
        </div>
        <div class="chike-notification-content-box">
            {{-- <span class="chike-notification-box-title">Opps! Something went wrong Please try again</span> --}}
        </div>
    </div>
    <!-- /chike-failed-notification-box -->


    <!-- chike-success-notification-box -->
    <div class="d-flex align-items-center msg_box_hide" id="chike-success-notification-box">
        <div class="chike-icon-notification-box">
            <svg width="34" height="34" viewBox="0 0 60 61" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <circle cx="29.7807" cy="30.4999" r="29.7807" fill="#00AF51" />
                <path d="M16.5457 31.6509L25.2359 39.3238L45.2234 21.676" stroke="white" stroke-width="5" />
            </svg>
        </div>
        <div class="chike-notification-content-box">
            {{-- <span class="chike-notification-box-title">Successful</span> --}}
        </div>
    </div>
    <!-- /chike-success-notification-box -->


    <!-- chike-complete-notification-box -->
    <div class="d-flex align-items-center msg_box_hide" id="chike-complete-notification-box">
        <div class="chike-icon-notification-box">
            <svg width="34" height="34" viewBox="0 0 61 61" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <circle cx="29.7807" cy="30.4999" r="29.7807" fill="#3479E2" />
                <path
                    d="M27.076 36.044L25.9 22.422L25.606 15.17H34.034L33.74 22.422L32.564 36.044H27.076ZM29.82 48.588C28.3827 48.588 27.2067 48.098 26.292 47.118C25.3773 46.138 24.92 44.9293 24.92 43.492C24.92 42.0547 25.3773 40.846 26.292 39.866C27.2067 38.886 28.3827 38.396 29.82 38.396C31.2573 38.396 32.4333 38.886 33.348 39.866C34.2627 40.846 34.72 42.0547 34.72 43.492C34.72 44.9293 34.2627 46.138 33.348 47.118C32.4333 48.098 31.2573 48.588 29.82 48.588Z"
                    fill="white" />
            </svg>
        </div>
        <div class="chike-notification-content-box">
            {{-- <span class="chike-notification-box-title">Completed Successfully</span> --}}
        </div>
    </div>
    <!-- /chike-complete-notification-box -->
    {{-- message box ended  --}}

    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="assets/vendors/jquery/jquery.js"></script>
    <!-- Bootstrap 5:0 -->
    <script src="assets/vendors/bootstrap/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.js"></script>
    <!--  Owl Carousel -->
    <script src="assets/vendors/owl/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>
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

        function showMessageBox(message, type) {

            let element;
            let contentBox
            if (type == 1) {
                element = document.getElementById('chike-success-notification-box');
            } else if (type == 2) {
                element = document.getElementById('chike-complete-notification-box');
            } else if (type == 3) {
                element = document.getElementById('chike-failed-notification-box');
            } else if (type == 4) {
                element = document.getElementById('chike-error-notification-box');
            }

            contentBox = element.querySelector('.chike-notification-content-box');

            // Replace the content dynamically
            contentBox.innerHTML = `<span class="chike-notification-box-title">${message}</span>`;

            element.classList.remove('msg_box_hide');

            // Remove the notification after 3 seconds
            setTimeout(() => {
                element.classList.add('msg_box_hide');
            }, 5000); // Duration in milliseconds
        }
    </script>

    @if ($errors->has('email') || $errors->has('password'))
        <script>
            showMessageBox('The provided username or password is incorrect. Please try again.', 3)
        </script>
    @endif


    @if (session('EmailSubscribe'))
        <script>
            showMessageBox("Thanks for subscribe.", 1)
        </script>
    @endif

</body>

</html>
