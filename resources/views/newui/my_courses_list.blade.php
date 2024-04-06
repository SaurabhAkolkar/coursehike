@extends('newui.layouts.master')
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
        .cart-collaterals .cart_totals {
            background-color: transparent;
        }

        .topbar-search .form-control {
            background-color: #fff;
            border-color: #fff;
        }

        .course-popular li {
            background-color: transparent;
        }

        .widget-post-thumb {
            width: 150px;
        }

        .course-header-meta .list-info li {
            margin-right: -23px;
            color: #7c7c7c;
            margin-bottom: 0px;
            padding: 0px 30px 0px 0px;
            font-size: 12px;
        }

        .course-latest .widget-post-body h6 {
            margin-bottom: 0px;
        }

        .chike-mentor-title {
            line-height: 25px;
            font-size: 14px;
        }

        .chike-course-price-title {
            color: #3479E2;
            font-weight: 700;
            font-size: 20px;
        }

        .chike-my-course-left-side-menu-icon {
            position: absolute;
            top: 0px;
            right: 15px;
        }
    </style>
@endsection
@endsection

@section('body')
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
                    <a href="#" class="btn btn-sm btn-main-outline rounded w-100"><i
                            class="fa fa-times me-2"></i> Clear All Filters</a>
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
                                            <a href="#"><img src="assets/images/course/key-points.png"
                                                    alt="" class="img-fluid"></a>
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
                                <div class="btn-group chike-my-course-left-side-menu-icon" role="group"
                                    aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown"
                                            aria-expanded="false" style="padding: 5px 15px;">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-share me-3"
                                                        aria-hidden="true"></i> Share</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-heart me-3"
                                                        aria-hidden="true"></i> Fevourite</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-repeat me-3"
                                                        aria-hidden="true"></i> Request Refund</a></li>
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
                                            <a href="#"><img src="assets/images/course/key-points.png"
                                                    alt="" class="img-fluid"></a>
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
                                <div class="btn-group chike-my-course-left-side-menu-icon" role="group"
                                    aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown"
                                            aria-expanded="false" style="padding: 5px 15px;">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-share me-3"
                                                        aria-hidden="true"></i> Share</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-heart me-3"
                                                        aria-hidden="true"></i> Fevourite</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-repeat me-3"
                                                        aria-hidden="true"></i> Request Refund</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /item -->
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                        <a href="#" class="btn btn-sm btn-main rounded mt-5"><i class="fa fa-repeat me-2"
                                aria-hidden="true"></i> Load More</a>
                    </div>
                </div>
                <!-- /all Courses -->
            </div>

        </div>
    </div>
</section>
<!--shop category end-->
@endsection
