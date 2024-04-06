<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="dreambuzz">

  <title>Login | Coursehike</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.css">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="assets/vendors/awesome/css/fontawesome-all.min.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/woocomerce.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <link rel="stylesheet" href="assets/vendors/country-code/intltelInput.min.css">
  <style type="text/css">
    .chike-left-side-box{
      background: linear-gradient(180deg, #C087EC 0%, #87C8EC 100%);
    }
    .chike-left-side-inner-box{
      position: relative;
      text-align: center;
    }
    .chike-left-side-inner-box h1{
      color: #fff;
      font-size: 40px;
      margin-top: 100px;
    }
    .chike-graduation{
      color: #fff;
      font-size: 75px;
    }
    .required{
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
  .chike-login-share ul li a img{
    width: 35px;
    height: 35px;
  }
  .woocommerce-form p {
    margin-bottom: 10px;
  }
  .chike-email-box, .chike-password-box{
    border-bottom: 1px solid #eee;
    padding-bottom: 5px;
  }
  .chike-email-box .input-group-text{
    border: none;
    border-right: 2px solid #eee;
  }
  .chike-password-box .input-group-text{
    border: none;
    border-right: 2px solid #eee;
  }
  .input-group-text{
    border: none;
    background-color: #fff;
  }
  .chike-password-box .input-group-text i{
    color: #A1A1A1;
  }
  .chike-email-box .input-group-text i{
    color: #A1A1A1;
  }
   .woocommerce-form-login .form-control{
      height: 40px !important;
      border: none !important;
  }
  @media (max-width: 768px) {
    .chike-left-side-box{
      display: none;
    }
  }
  </style>
</head>

<body id="top-header">
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
            <div class="header-search-bar ms-4">
              <form action="#">
                <input type="text" class="form-control rounded-pill border" placeholder="Search for Course" >
                <a href="#" class="search-submit"><i class="far fa-search"></i></a>
              </form>
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
            <nav class="chike-top-header-navbar-desktop ms-auto">
              <ul class="primary-menu">
                <li class="position-relative">
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger chike-top-menu-notifications-btn">9</span>
                  <a href="javascript:;" class="chike-top-menu-notifications-btn"><i class="fa fa-bell"></i></a>
                  <div class="chike-top-menu-notifications">
                    <h4 class="chike-menu-notifications-title">Notification</h4>
                    <p class="chike-menu-notifications-title-sub chike-hide">No Notifications.</p>
                    <div class="" id="chike-menu-notifications-both-box">
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-student-tab" data-bs-toggle="pill" data-bs-target="#pills-student" type="button" role="tab" aria-controls="pills-student" aria-selected="true">Student</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-mentor-tab" data-bs-toggle="pill" data-bs-target="#pills-mentor" type="button" role="tab" aria-controls="pills-mentor" aria-selected="false">Mentor</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <!-- Student -->
                        <div class="tab-pane fade show active" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab">
                          <p class="chike-menu-notifications-title-sub">No Notifications.</p>
                        </div>
                        <!-- /Student -->
                        <!-- Mentor -->
                        <div class="tab-pane fade" id="pills-mentor" role="tabpanel" aria-labelledby="pills-mentor-tab">
                          <p class="chike-menu-notifications-title-sub">No Notifications.</p>
                        </div>
                        <!-- /Mentor -->
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </li>
              </ul>
            </nav>
            <div class="header-btn chike-user-profile-box">
              <div class="course-authorx position-relative">
                <a href="#" class="login" id="chike-my-courses-top-menu-btn">My Courses</a>
                <div class="chike-my-courses-top-menu">
                    <div class="card mb-3" style="max-width: 400px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="assets/images/course/key-points.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                            <div class="progress" style="height: 10px;">
                              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-3" style="max-width: 400px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="assets/images/course/key-points.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                            <div class="progress" style="height: 10px;">
                              <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-3" style="max-width: 400px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="assets/images/course/key-points.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                            <div class="progress" style="height: 10px;">
                              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-3" style="max-width: 400px;">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="assets/images/course/key-points.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                            <div class="progress" style="height: 10px;">
                              <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer bg-transparent border-success text-center"><a href="#">Show More</a></div>
                </div>
                <button class="chike-user-profile" id="chike-user-profile-menu-btn">A</button>
                <div class="chike-my-profile-top-menu">
                  <div class="client-info d-flex align-items-center">
                    <div class="client-img">
                      <img src="assets/images/users-profile/default-img.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="testimonial-author">
                      <h4 class="chike-user-profile-menu-name">Ajinkya D</h4>
                      <span class="chike-user-profile-menu-email">ajinkyadabholkar22@gmail.com</span>
                    </div>
                  </div>
                  <div class="list-group list-group-flush">
                      <a href="#" class="list-group-item">My Learning</a>
                      <a href="#" class="list-group-item">Teach on CourseHike</a>
                      <a href="#" class="list-group-item">Messages</a>
                      <a href="#" class="list-group-item">My Profile</a>
                      <a href="#" class="list-group-item">Language</a>
                      <a href="#" class="list-group-item">Help</a>
                      <a href="#" class="list-group-item">Log Out</a>
                  </div>
                </div>
              </div>
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
                            <h2 class="font-weight-bold mb-3">Login</h2>
                        </div>
                        <form class="woocommerce-form woocommerce-form-login login" method="post">
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <div class="input-group flex-nowrap chike-email-box">
                                  <span class="input-group-text" id="addon-wrapping"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                  <input type="text" class="form-control" placeholder="*Enter Email" aria-label="Enter Email" aria-describedby="addon-wrapping">
                                </div>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <div class="input-group chike-password-box">
                                  <span class="input-group-text" id="addon-wrapping" style="font-size: 18px;"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                  <input type="password" class="form-control"  name="password" id="password" autocomplete="Enter Password" placeholder="*Enter Password" aria-describedby="Enter Password">
                                  <a class="input-group-text togglePassword border-0"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </div>
                            </p>
                           
                           <div class="d-flex align-items-center justify-content-between py-2">
                                <p class="form-row">
                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                                    </label>
                                </p>
        
                                <p class="woocommerce-LostPassword lost_password">
                                    <a href="#">Forgot password?</a>
                                </p>
                           </div>
        
                            <p class="woocommerce-FormRow form-row text-center">
                                <button type="submit" class="btn btn-sm btn-main-outline m-2 rounded w-50" name="register" value="LOGIN">LOGIN</button>
                            </p>

                            <div class="text-center">
                              <div class="mb-3">Login with</div>
                              <div class="chike-login-share align-items-center mb-3">
                                  <ul class="social-icon">
                                      <li class="chike-social-icon-box"><a href="#"><img src="assets/images/login/chike-linkedin-icon.svg" class="img-fluid" alt="linkedin" width="20" height="20"></a></li>
                                      <li class="chike-social-icon-box"><a href="#"><img src="assets/images/login/chike-facebook-icon.svg" class="img-fluid" alt="facebook" width="20" height="20"></a></li>
                                      <li class="chiksocial-icon-box"><a href="#"><img src="assets/images/login/chike-google-icon.svg" class="img-fluid" alt="google" width="20" height="20"></a></li>
                                  </ul>
                              </div>
                               <div class="woocommerce-register mb-2">
                                Don't have an account yet? <a href="#" class="text-decoration-underline" style="color:#3479E2;font-weight: 700;">Sign Up</a>
                                </div>
                              <p>Facing an issue? <a href="#" class="ml-1" style="color:#3479E2;font-weight: 700;">Get support</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--shop register end-->


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
    <!-- Country Code -->
    <script src="assets/vendors/country-code/intltelInput.min.js"></script> 
    <script src="assets/js/script.js"></script>
    <script type="text/javascript">
    $(".togglePassword").click(function (e) {
      e.preventDefault();
      var type = $("#password").attr('type');
      if(type == "password"){
          $(this).html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
          $("#password").attr("type","text");
      }else if(type == "text"){
          $(this).html('<i class="fa fa-eye" aria-hidden="true"></i>');
          $("#password").attr("type","password");
      }});
    </script>

  </body>
  </html>
