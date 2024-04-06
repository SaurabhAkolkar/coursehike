<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="dreambuzz">

  <title>My Courses List | Coursehike</title>

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
  <style type="text/css">
  .cart-collaterals .cart_totals{
    background-color: transparent;
  }
  .topbar-search .form-control{
    background-color: #fff;
    border-color: #fff;
  }
  .course-popular li{
      background-color: transparent;
    }
    .widget-post-thumb{
      width: 150px;
    }
    .course-header-meta .list-info li{
      margin-right: -23px;
      color: #7c7c7c;
      margin-bottom: 0px;
      padding: 0px 30px 0px 0px;
      font-size: 12px;
    }
    .course-latest .widget-post-body h6{
      margin-bottom: 0px;
    }
    .chike-mentor-title{
      line-height: 25px;
      font-size: 14px;
    }
    .chike-course-price-title{
      color: #3479E2;
      font-weight: 700;
      font-size: 20px;
    }
    .chike-my-course-left-side-menu-icon{
      position: absolute;
      top:0px;
      right: 15px;
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

    <!--shop category start-->
    <section class="single page-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-xl-12">
            <h3>My Courses</h3>
            <hr>
          </div>
          <div class="col-lg-3 col-xl-3">
              <div class="cart-collaterals mb-3">
                  <div class="topbar-search">
                      <form method="get" action="#">
                          <input type="text" placeholder="Search our courses" class="form-control">
                          <label><i class="fa fa-search"></i></label>
                      </form>
                  </div>
              </div>

              <!-- Levels -->
              <div class="cart-collaterals mt-4">
                  <div class="cart_totals">
                      <h2>Levels</h2>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="alllevels">
                        <label class="form-check-label" for="alllevels">
                         All Levels
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="beginner">
                        <label class="form-check-label" for="beginner">
                         Beginner
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="intermediate">
                        <label class="form-check-label" for="intermediate">
                          Intermediate
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="expert">
                        <label class="form-check-label" for="expert">
                          Expert
                        </label>
                      </div>
                  </div>
              </div>
              <!-- /Levels -->

              <!-- Prices -->
              <div class="cart-collaterals mt-4">
                  <div class="cart_totals">
                      <h2>Prices</h2>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="free">
                        <label class="form-check-label" for="free">
                         Free
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="paid">
                        <label class="form-check-label" for="paid">
                         Paid
                        </label>
                      </div>
                  </div>
              </div>
              <!-- /Prices -->

              <!-- Prices -->
              <div class="cart-collaterals mt-4">
                  <div class="cart_totals">
                      <h2>Category</h2>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="allcategory">
                        <label class="form-check-label" for="allcategory">
                         All Category
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="languages">
                        <label class="form-check-label" for="languages">
                         Languages
                        </label>
                      </div>
                  </div>
              </div>
              <!-- /Prices -->

              <div class="text-center mt-4">
                <a href="#" class="btn btn-sm btn-main-outline rounded w-100"><i class="fa fa-times me-2"></i> Clear All Filters</a>
              </div>

          </div>
          <div class="col-lg-9 col-xl-9">
            <!-- all Courses -->
            <div class="course-top-wrap mb-3">
                <div class="fuild-container">
                    <div class="row align-items-center">
                        <div class="col-lg-9">
                            <p class="chike-showing-results-title">Showing 3 results</p>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-select" aria-label="Default select example">
                                <option value="">Select Sort by</option>
                                <option value="Popularity">Popularity</option>
                                <option value="Price -- Low to High">Price -- Low to High</option>
                                <option value="Price -- High to Low">Price -- High to Low</option>
                                <option value="Newest First</option>">Newest First</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-lg-center">
              <div class="col-xl-12 col-lg-12 col-md-12">
                <!-- item -->
                <div class="row mt-4 mb-4 position-relative">
                  <div class="col-lg-10 col-xl-10">
                    <div class="course-latest mt-0">
                        <div class="recent-posts course-popular">
                          <div class="widget-post-thumb chike-my-course-img-thumb">
                              <a href="#"><img src="assets/images/course/key-points.png" alt="" class="img-fluid"></a>
                          </div>
                          <div class="widget-post-body">
                              <h6> <a href="#">Japanese N5 Course for Beginners</a></h6>
                              <div class="course-header-meta">
                                  <ul class="inline-list list-info">
                                      <li>
                                          <i class="far fa-language me-2"></i> Hindi
                                      </li>
                                      <li>
                                          <i class="far fa-play-circle me-2"></i> 12 lessons
                                      </li>
                                      <li>
                                          <i class="far fa-clock me-2"></i> 252 Hourse
                                      </li>
                                      <li>
                                          <i class="far fa-sliders-h me-2"></i> Level: Beginner
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <p class="chike-mentor-title mb-0">By Hemant K.</p>
                          <div class="course-header-meta">
                            <div class="course-header-meta">
                                <ul class="inline-list list-info">
                                    <li>
                                        <a href="#">Completed 45% </a> 
                                    </li>
                                </ul>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-xl-2">
                    <div class="btn-group chike-my-course-left-side-menu-icon" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button  type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 5px 15px;">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-share me-3" aria-hidden="true"></i> Share</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-heart me-3" aria-hidden="true"></i> Fevourite</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-repeat me-3" aria-hidden="true"></i> Request Refund</a></li>
                          </ul>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /item -->
                <!-- item -->
                <div class="row mt-4 mb-4 position-relative">
                  <div class="col-lg-10 col-xl-10">
                    <div class="course-latest mt-0">
                        <div class="recent-posts course-popular">
                          <div class="widget-post-thumb chike-my-course-img-thumb">
                              <a href="#"><img src="assets/images/course/key-points.png" alt="" class="img-fluid"></a>
                          </div>
                          <div class="widget-post-body">
                              <h6> <a href="#">Japanese N5 Course for Beginners</a></h6>
                              <div class="course-header-meta">
                                  <ul class="inline-list list-info">
                                      <li>
                                          <i class="far fa-language me-2"></i> Hindi
                                      </li>
                                      <li>
                                          <i class="far fa-play-circle me-2"></i> 12 lessons
                                      </li>
                                      <li>
                                          <i class="far fa-clock me-2"></i> 252 Hourse
                                      </li>
                                      <li>
                                          <i class="far fa-sliders-h me-2"></i> Level: Beginner
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <p class="chike-mentor-title mb-0">By Hemant K.</p>
                          <div class="course-header-meta">
                            <div class="course-header-meta">
                                <ul class="inline-list list-info">
                                    <li>
                                        <a href="#" class="text-success">Completed 100% </a> 
                                    </li>
                                </ul>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-xl-2">
                    <div class="btn-group chike-my-course-left-side-menu-icon" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button  type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 5px 15px;">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-share me-3" aria-hidden="true"></i> Share</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-heart me-3" aria-hidden="true"></i> Fevourite</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-repeat me-3" aria-hidden="true"></i> Request Refund</a></li>
                          </ul>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /item -->
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                <a href="#" class="btn btn-sm btn-main rounded mt-5"><i class="fa fa-repeat me-2" aria-hidden="true"></i> Load More</a>
              </div>
            </div>
            <!-- /all Courses -->
          </div>

        </div>
      </div>
    </section>
    <!--shop category end-->

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
    <script src="assets/js/script.js"></script>
  </body>
  </html>
