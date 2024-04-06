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
                                                            <li><a href="{{ route('subcategoryallcourse',$subcategory->id) }}">{{ $subcategory->title }} </a></li>
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
                            <li>
                                <a href="#" class="header-search header_search_btn"><i
                                        class="fa fa-search"></i></a>
                            </li>
                            {{-- <li class="position-relative" id="chike-top-menu-notifications-btn">
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
                                <a href="/wishlist"><i class="fa fa-heart"></i></a>
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
                                    style="top: -3px;"  id="cart_count"></span>
                                @endif
                                <a href="/carts"><i class="fa fa-shopping-cart"></i></a>
                            </li>
                        </ul>

                        <a href="#" class="nav-close"><i class="fal fa-times"></i></a>
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
                        <div class="course-grid bg-shadow tooltip-style">
                            <div class="course-header">
                                <div class="course-thumb">
                                    <img src="{{ $course->VideoPreviewImg }}" alt="" class="img-fluid">
                                </div>
                            </div>

                            <div class="course-content">
                                <div class="course-footer mb-10 d-flex align-items-center justify-content-between ">
                                    <span class="students"><i class="far fa-language me-2"></i>
                                        {{ $course->language->name }}
                                    </span>
                                    <span class="lessons"><i class="far fa-play-circle me-2"></i>
                                        {{ $course->courseclass->count() }}
                                        {{ $course->courseclass->count() > 1 ? 'Lessons' : 'Lesson' }}</span>
                                    <span class="duration"><i class="far fa-clock me-2"></i> {{ $course->duration }}
                                        {{ $course->duration > 1 ? 'Hourse' : 'Hour' }} </span>
                                </div>
                                <h3 class="course-title mb-10">
                                    <a href="#">
                                        {{ $course->title }}
                                    </a>
                                </h3>
                                <div class="rating mb-10">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>3.9 (30 reviews)</span>
                                </div>
                                <div class="course-footer d-flex">
                                    <div class="course-meta d-flex">
                                        <div class="author me-4">
                                            <span class="chike-profile-name">{{ $course->user->fname[0] }}</span>
                                            <a href="#">{{ $course->user->fname }}</a>
                                        </div>
                                        @if ($course->package_type == 1)
                                            <span class="lesson text-primary">
                                                <div class="price">₹ {{ $course->price }}</div>
                                            </span>
                                        @else
                                            <span class="lesson text-success">
                                                <div class="price">Free</div>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="course-hover-content">
                                <h3 class="course-title">
                                    <a href="{{ route("course.overview",$course->id) }}">
                                        {{ $course->title }}
                                    </a>
                                </h3>
                                <div class="course-footer d-flex align-items-center justify-content-between ">
                                    <span class="students"><i class="far fa-language me-2"></i>
                                        {{ $course->language->name }}</span>
                                    <span class="lessons"><i
                                            class="far fa-play-circle me-2"></i>{{ $course->courseclass->count() }}
                                        {{ $course->courseclass->count() > 1 ? 'Lessons' : 'Lesson' }}</span>
                                    <span class="duration"><i class="far fa-clock me-2"></i>{{ $course->duration }}
                                        {{ $course->duration > 1 ? 'Hourse' : 'Hour' }}</span>
                                </div>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>3.9 (30 reviews)</span>
                                </div>
                                <p class="mb-0"><strong>Description: {{ $course->short_detail }}</strong> <a
                                        href="{{ route("course.overview",$course->id) }}">Read More</a></p>
                                @if ($course->package_type == 1)
                                    <div class="price mt-2 mb-2 text-primary">₹ {{ $course->price }}</div>
                                @else
                                    <div class="price mt-2 mb-2 text-success">Free</div>
                                @endif
                                @guest
                                    <a onclick="alert('login popup')"
                                        class="btn btn-primary btn-sm rounded chike-course-card-houre-add-to-card-btn">
                                        Add to cart
                                    </a>
                                @endguest

                                @auth
                                    <a onclick="addToCart({{ $course->id }},{{ $cart_items }})"
                                        class="btn btn-primary btn-sm rounded chike-course-card-houre-add-to-card-btn">
                                        Add to cart
                                    </a>
                                @endauth

                                
                                <a onclick="addToWishlist({{ $course->id }})"  id="wishlist-color" class="text-right chike-course-like">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- COURSE CARD END -->
            </div>
            <br>
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center">
                        <a href="{{ route("allcourselist") }}" class="text-style2 fw-bold chike-explore-more-title">Explore More</a>
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
                        <a href="#" class="btn btn-sm btn-main m-2 rounded">Join Now</a>
                        <a href="#" class="btn btn-sm btn-main-outline m-2 rounded">Learn More</a>
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
                            <form action="{{ route("emailsubscriber") }}"  method="POST" class="form border rounded-pill">
                               @csrf
                                <input type="email"  required name="email" class="form-control rounded-pill"
                                    placeholder="Enter your email">
                                    <button type="submit" class="btn btn-main rounded rounded-pill">SUBSCRIBE NOW</button>
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
                                <li><a href="#">News & Blogs</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Return Policy</a></li>
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
    <script></script>
</body>

</html>
