 <!--====== Header start ======-->
 <header class="header-style-2">
     <div class="header-navbar navbar-sticky">
         <div class="container-xxl">
             <div class="d-flex align-items-center justify-content-between">
                 <div class="site-logo">
                     <a href="/">
                         <img src="{{ asset("assets/images/logos/logo.png") }}" alt="" class="img-fluid chike-logo-black" />
                     </a>
                 </div>
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
                 <div class="header-search-bar ms-4">
                     <form action="#">
                         <input type="text" class="form-control rounded-pill border" placeholder="Search for Course">
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
                         <li class="position-relative">
                             <a href="/wishlist" class="mt-2"><i class="fa fa-heart"></i></a>
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
                             <a href="/carts"><i class="fa fa-shopping-cart"></i></a>
                         </li>
                     </ul>
                 </nav>
                 <div class="header-btn chike-user-profile-box">
                     <div class="course-authorx position-relative">
                         <!-- My Courses -->
                         <span id="chike-my-courses-top-menu-btn">
                             <span class="chike-my-courses-title login">My Courses</span>
                             <div class="chike-my-courses-top-menu">
                                 <div class="card mb-3" style="max-width: 400px;">
                                     <div class="row g-0">
                                         <div class="col-md-4">
                                             <img src="{{ asset("assets/images/course/key-points.png") }}" class="img-fluid"
                                                 alt="...">
                                         </div>
                                         <div class="col-md-8">
                                             <div class="card-body">
                                                 <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                                                 <div class="progress" style="height: 10px;">
                                                     <div class="progress-bar" role="progressbar" style="width: 25%"
                                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card mb-3" style="max-width: 400px;">
                                     <div class="row g-0">
                                         <div class="col-md-4">
                                             <img src="{{ asset("assets/images/course/key-points.png") }}" class="img-fluid"
                                                 alt="...">
                                         </div>
                                         <div class="col-md-8">
                                             <div class="card-body">
                                                 <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                                                 <div class="progress" style="height: 10px;">
                                                     <div class="progress-bar" role="progressbar" style="width: 50%"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card mb-3" style="max-width: 400px;">
                                     <div class="row g-0">
                                         <div class="col-md-4">
                                             <img src="{{ asset("assets/images/course/key-points.png") }}" class="img-fluid"
                                                 alt="...">
                                         </div>
                                         <div class="col-md-8">
                                             <div class="card-body">
                                                 <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                                                 <div class="progress" style="height: 10px;">
                                                     <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card mb-3" style="max-width: 400px;">
                                     <div class="row g-0">
                                         <div class="col-md-4">
                                             <img src="{{ asset("assets/images/course/key-points.png") }}" class="img-fluid"
                                                 alt="...">
                                         </div>
                                         <div class="col-md-8">
                                             <div class="card-body">
                                                 <h5 class="card-title">Japanese N4 Course for Beginners</h5>
                                                 <div class="progress" style="height: 10px;">
                                                     <div class="progress-bar" role="progressbar" style="width: 75%"
                                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card-footer bg-transparent border-success text-center"><a
                                         href="#">Show More</a></div>
                             </div>
                         </span>
                         <!-- /My Courses -->
                         <!-- Profile -->
                         <span id="chike-user-profile-menu-btn">
                             <button class="chike-user-profile">A</button>
                             <div class="chike-my-profile-top-menu">
                                 <div class="client-info d-flex align-items-center">
                                     <div class="client-img">
                                         @if (Auth::check() && (Auth::User()->user_img != null || Auth::User()->user_img != ''))
                                         @else
                                             <img src="{{ asset("assets/images/users-profile/default-img.jpg") }}" alt=""
                                                 class="img-fluid">
                                         @endif
                                     </div>
                                     <div class="testimonial-author">
                                         <h4 class="chike-user-profile-menu-name">Hi !
                                             {{ Auth::check() ? explode(' ', Auth::User()->fname)[0] : 'Friend' }}</h4>

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
                         <!-- /Profile -->
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!--====== Header End ======-->
