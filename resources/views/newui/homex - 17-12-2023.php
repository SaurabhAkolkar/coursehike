<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="dreambuzz">

  <title>Coursehike</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.css">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="assets/vendors/awesome/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="assets/vendors/flaticon/flaticon.css">
  <link rel="stylesheet" href="assets/fonts/gilroy/font-gilroy.css">
  <link rel="stylesheet" href="assets/vendors/magnific-popup/magnific-popup.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">
  <link rel="stylesheet" href="assets/vendors/animated-headline/animated-headline.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.theme.default.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/woocomerce.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <style type="text/css">
    /*====top menu=========*/
      .header-style-2{
        position: absolute;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 9;
      }
    .header-style-2 .navbar-sticky .header-category-menu li a, .header-style-2 .navbar-sticky .header-category-menu li.has-submenu a i,  .header-style-2 .navbar-sticky .primary-menu li .menu-trigger, .header-style-2 .navbar-sticky .site-navbar .primary-menu li a, .header-style-2 .navbar-sticky .header-btn .login{
        color: #ffffff;
    }
    .header-style-2 .navbar-sticky.menu_fixed .header-category-menu li.has-submenu a, .header-style-2 .navbar-sticky.menu_fixed .header-category-menu li.has-submenu a i, .header-style-2 .navbar-sticky.menu_fixed .primary-menu li .menu-trigger, .header-style-2 .navbar-sticky.menu_fixed .site-navbar .primary-menu li a, .header-style-2 .navbar-sticky.menu_fixed .header-btn .login{
        color: #000000;
    }  
    /*.header-style-2 .navbar-sticky .site-logo .chike-logo-white{
         display: block;
    }*/
    .header-style-2 .navbar-sticky .site-logo .chike-logo-black{
        display: none;
    }
    .header-style-2 .navbar-sticky.menu_fixed .chike-logo-black{
        display: block;
    }
    .header-style-2 .navbar-sticky.menu_fixed .site-logo .chike-logo-white{
        display: none;
    }
     /*==========home slider=============*/
    .hero-carousel-header {
        padding: 325px 0px;
        background: #F4F5F8;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
        z-index: 1;
    }
    .owl-carousel .owl-item {
        overflow: hidden;
        padding: 0px;
        margin: 0px;
    }
    .chike-section-heading-title{
        text-align: center;
    }
   /*==course card========*/ 
    .chike-course-card-houre-add-to-card-btn{
        width: 80%;
        max-width: 100%;
    }
    .chike-title-color-blue{
        color:#3479E2;
      }
    .course-wrapper  .price{
        font-size: 25px;
        font-weight: 700;
    }
    .course-wrapper .course-meta, .course-wrapper .author {
        width: 100%;
    }
    .chike-course-like{
        float: right;
        padding: 8px;
        color: #808080;
        font-size: 20px;
        padding: 8px 15px 5px 15px;
        border: 1px solid #eee;
    }
    .chike-explore-more-title{
        font-size: 24px;
    }
   /*====Why Choose Us==========*/
   .chike-why-choose-us .list-item i{
        font-size: 24px
   } 
   .chike-why-choose-us .list-item h5 {
        font-size: 24px;
   }
   @media (max-width: 768px) {
        .chike-why-choose-us .list-item i{
            font-size: 18px
       } 
       .chike-why-choose-us .list-item h5 {
            font-size: 18px;
       }
   }
  </style>

</head>

<body id="top-header" class="bg-grey">

    <header class="header-style-2"> 
        <div class="header-navbar navbar-sticky">
            <div class="container-xxl">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="site-logo">
                        <a href="#">
                            <img src="assets/images/logos/logo-white.png" alt="" class="img-fluid chike-logo-white" />
                            <img src="assets/images/logos/logo.png" alt="" class="img-fluid chike-logo-black" />
                        </a>
                    </div>

                    <div class="offcanvas-icon d-block d-lg-none">
                        <a href="#" class="nav-toggler"><i class="fal fa-bars"></i></a> 
                    </div>

                    <div class="header-category-menu d-none d-xl-block">
                        <ul class="primary-menu">
                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-th me-2"></i>Categories</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="#">Design</a>
                                        <ul class="submenu">
                                            <li><a href="#">Design Tools</a></li>
                                            <li><a href="#">Photoshop mastering</a></li>
                                            <li><a href="#">Adobe Xd Deisgn</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Developemnt</a></li>
                                    <li><a href="#">Marketing</a></li>
                                    <li><a href="#">Freelancing</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
            
                    <nav class="site-navbar ms-auto">
                        <ul class="primary-menu">
                            <li>
                                <a href="#"><i class="fa fa-search"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bell"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-heart"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                            </li>
                        </ul>

                        <a href="#" class="nav-close"><i class="fal fa-times"></i></a>
                    </nav>

                    <div class="header-btn d-none d-xl-block">
                        <a href="#" class="login rounded-pill border btn-sm-2">Login</a>
                        <a href="#" class="btn-sm-2 rounded-pill signup-btn border">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--====== Header End ======-->

    <!-- Banner Section Start -->
    <section class="course-page-headerx page-header-3">
          <div class="owl-carousel owl-theme hero-carousel">
            <div class="hero-carousel-header" style="background-image: url(./assets/images/home-page/top-home-page-banner1.jpg);"></div>
            <div class="hero-carousel-header" style="background-image: url(./assets/images/home-page/top-home-page-banner2.jpg);"></div>
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

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="course-grid bg-shadow tooltip-style">
                        <div class="course-header">
                            <div class="course-thumb">
                                <img src="assets/images/course/course1.png" alt="" class="img-fluid">
                            </div>
                        </div>
        
                        <div class="course-content">
                            <div class="course-footer mb-10 d-flex align-items-center justify-content-between ">
                                <span class="students"><i class="far fa-language me-2"></i> Hindi</span>
                                <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                <span class="duration"><i class="far fa-clock me-2"></i>12 Hourse</span>
                            </div>
                            <h3 class="course-title mb-10"> <a href="#">Data Competitive Strategy law & Organization </a> </h3>
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
                                        <img src="assets/images/course/course-2.jpg" alt="" class="img-fluid">
                                        <a href="#">Hemant K.</a>
                                    </div>
                                    <span class="lesson text-success"><div class="price">Free</div></span>
                                </div>
                            </div>
                        </div>
        
                        <div class="course-hover-content">
                            <h3 class="course-title"> <a href="#">Data Competitive Strategy law & Organization </a> </h3>
                            <div class="course-footer d-flex align-items-center justify-content-between ">
                                <span class="students"><i class="far fa-language me-2"></i> Hindi</span>
                                <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                <span class="duration"><i class="far fa-clock me-2"></i>12 Hourse</span>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span>3.9 (30 reviews)</span>
                            </div>
                            <p class="mb-0"><strong>Description: </strong>The N5 Japanese course is the introductory level of the Japanese Language Proficiency Test (JLPT), and it covers basic Japanese grammar, vocabulary, and kanji. At this level, you will learn how to introduce yourself and talk about your daily routine, famil..<a href="#">Read More</a></p>
                            <div class="price mt-2 mb-2 text-success">Free</div>
                            <a href="#" class="btn btn-primary btn-sm rounded chike-course-card-houre-add-to-card-btn">Add to cart</a>
                            <a href="#" class="text-right chike-course-like"><i class="fa fa-heart"></i></a>
                        </div>
                    </div>
                 </div>
                <!-- COURSE END -->

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="course-grid bg-shadow tooltip-style">
                        <div class="course-header">
                            <div class="course-thumb">
                                <img src="assets/images/course/course2.png" alt="" class="img-fluid">
                            </div>
                        </div>
        
                        <div class="course-content">
                            <div class="course-footer mb-10 d-flex align-items-center justify-content-between ">
                                <span class="students"><i class="far fa-language me-2"></i> Hindi</span>
                                <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                <span class="duration"><i class="far fa-clock me-2"></i>12 Hourse</span>
                            </div>
                            <h3 class="course-title mb-10"> <a href="#">Data Competitive Strategy law & Organization </a> </h3>
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
                                        <img src="assets/images/course/course-2.jpg" alt="" class="img-fluid">
                                        <a href="#">Hemant K.</a>
                                    </div>
                                     <span class="lesson text-primary"><div class="price">₹2499</div></span>
                                </div>
                            </div>
                        </div>
        
                        <div class="course-hover-content">
                            <h3 class="course-title"> <a href="#">Data Competitive Strategy law & Organization </a> </h3>
                            <div class="course-footer d-flex align-items-center justify-content-between ">
                                <span class="students"><i class="far fa-language me-2"></i> Hindi</span>
                                <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                <span class="duration"><i class="far fa-clock me-2"></i>12 Hourse</span>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span>3.9 (30 reviews)</span>
                            </div>
                            <p class="mb-0"><strong>Description: </strong>The N5 Japanese course is the introductory level of the Japanese Language Proficiency Test (JLPT), and it covers basic Japanese grammar, vocabulary, and kanji. At this level, you will learn how to introduce yourself and talk about your daily routine, famil..<a href="#">Read More</a></p>
                            <div class="price mt-2 mb-2 text-primary">₹2499</div>
                            <a href="#" class="btn btn-primary btn-sm rounded chike-course-card-houre-add-to-card-btn">Add to cart</a>
                            <a href="#" class="text-right chike-course-like"><i class="fa fa-heart"></i></a>
                        </div>
                    </div>
                 </div>
                <!-- COURSE END -->

                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="course-grid bg-shadow tooltip-style">
                        <div class="course-header">
                            <div class="course-thumb">
                                <img src="assets/images/course/course3.png" alt="" class="img-fluid">
                            </div>
                        </div>
        
                        <div class="course-content">
                            <div class="course-footer mb-10 d-flex align-items-center justify-content-between ">
                                <span class="students"><i class="far fa-language me-2"></i> Hindi</span>
                                <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                <span class="duration"><i class="far fa-clock me-2"></i>12 Hourse</span>
                            </div>
                            <h3 class="course-title mb-10"> <a href="#">Data Competitive Strategy law & Organization </a> </h3>
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
                                        <img src="assets/images/course/course-2.jpg" alt="" class="img-fluid">
                                        <a href="#">Hemant K.</a>
                                    </div>
                                    <span class="lesson text-primary"><div class="price">₹2499</div></span>
                                </div>
                            </div>
                        </div>
        
                        <div class="course-hover-content">
                            <h3 class="course-title"> <a href="#">Data Competitive Strategy law & Organization </a> </h3>
                            <div class="course-footer d-flex align-items-center justify-content-between ">
                                <span class="students"><i class="far fa-language me-2"></i> Hindi</span>
                                <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                <span class="duration"><i class="far fa-clock me-2"></i>12 Hourse</span>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span>3.9 (30 reviews)</span>
                            </div>
                            <p class="mb-0"><strong>Description: </strong>The N5 Japanese course is the introductory level of the Japanese Language Proficiency Test (JLPT), and it covers basic Japanese grammar, vocabulary, and kanji. At this level, you will learn how to introduce yourself and talk about your daily routine, famil..<a href="#">Read More</a></p>
                            <div class="price mt-2 mb-2 text-primary">₹2499</div>
                            <a href="#" class="btn btn-primary btn-sm rounded chike-course-card-houre-add-to-card-btn">Add to cart</a>
                            <a href="#" class="text-right chike-course-like"><i class="fa fa-heart"></i></a>
                        </div>
                    </div>
                 </div>
                <!-- COURSE END -->

            </div>
            <BR>
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center">
                        <a href="#" class="text-style2 fw-bold chike-explore-more-title">Explore More</a>
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
                <div class="col-xl-6 pe-5">
                    <div class="section-heading">
                        <h2 class="font-lg mb-20 chike-title-color-blue">Why Choose Us</h2>
                        <ul class="list-item mb-40">
                            <li><i class="fa fa-check-circle text-success"></i><h5>Get Lifetime access to the course</h5></li>
                            <li><i class="fa fa-check-circle text-success"></i><h5>7 Days Moneyback Garantee</h5></li>
                            <li><i class="fa fa-check-circle text-success"></i><h5>100 % Return policy</h5></li>
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
                        <p class="mb-20">Share your expertise with the world! Become an instructor on CourseHike and create high-quality <BR>e-learning courses that reach a global audience. Apply today and join our community of educators and creators.</p>                           
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
                            <form action="#" class="form border rounded-pill">
                                <input type="text" class="form-control rounded-pill" placeholder="Enter your email*">
                                <a href="#" class="btn btn-main rounded rounded-pill"> SUBSCRIBE NOW</a>
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
                            
                            <p class="mt-4">Share your expertise with the world! Become an instructor on CourseHike and create high-quality e-learning courses that reach a global audience. Apply today and join our community of educators and creators.</p>

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
                        <p class="mb-0 copyright text-center text-white">© 2023 Coursehike All rights reserved by <a href="#" rel="nofollow">www.coursehike.com</a> </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-btm-top">
            <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
        </div>  
    </section>
    <!-- Footer section end -->

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="assets/vendors/jquery/jquery.js"></script>
    <!-- Bootstrap 5:0 -->
    <script src="assets/vendors/bootstrap/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.js"></script>
    <!-- Counterup -->
    <script src="assets/vendors/counterup/waypoint.js"></script>
    <script src="assets/vendors/counterup/jquery.counterup.min.js"></script>
    <!--  Owl Carousel -->
    <script src="assets/vendors/owl/owl.carousel.min.js"></script>
    <!-- Isotope -->
    <script src="assets/vendors/isotope/jquery.isotope.js"></script>
    <script src="assets/vendors/isotope/imagelaoded.min.js"></script>
    <!-- Animated Headline -->
    <script src="assets/vendors/animated-headline/animated-headline.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>

    <script src="assets/js/script.js"></script>
    <script type="text/javascript">
    </script>

  </body>
  </html>
