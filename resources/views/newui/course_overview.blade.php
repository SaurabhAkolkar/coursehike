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
@endsection

@section('body')
    <section class="course-page-header page-header-2 chike-course-page-header-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-7">
                    <div class="course-header-wrapper mb-0 bg-transparent">
                        <p class="chike-cat-title">Category: {{ $course->category->title }}</p>
                        <h1 class="chike-header-course-title">{{ $course->title }}</h1>
                        <p>{!! $course->short_detail !!}</p>
                        <div class="course-header-meta mb-4 mt-4">
                            <ul class="inline-list list-info">
                                <li>
                                    <i class="far fa-language me-2"></i> {{ $course->language->name }}
                                </li>
                                <li>
                                    <i class="far fa-play-circle me-2"></i> {{ $course->courseclass->count() }}
                                    {{ $course->courseclass->count() > 1 ? 'Lessons' : 'Lesson' }}
                                </li>
                                <li>
                                    <i class="far fa-clock me-2"></i> {{ $course->duration }}
                                    {{ $course->duration > 1 ? 'Hourse' : 'Hour' }}
                                </li>
                                <li>
                                    <i class="far fa-sliders-h me-2"></i> Level:
                                    @if ($course->level == 1)
                                        Begginer
                                    @elseif($course->level == 2)
                                        Intermediate
                                    @elseif($course->level == 3)
                                        Advanced
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="course-header-meta">
                            <ul class="inline-list list-info">
                                <li>
                                    <div class="course-author">
                                        <button
                                            class="chike-mentor-profile">{{ $course->user->fname[0] }}</button>{{ $course->user->fname }}
                                    </div>
                                </li>
                                <li><i class="fa fa-user me-2"></i>Last Updated:
                                    {{ date('d/m/Y', strtotime($course->updated_at)) }}</li>
                                <li>
                                    <div class="list-rating">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span class="rating-count">(19)</span>
                                    </div>
                                </li>
                                {{-- <li>
                                    <a href="#" class="text-white"><i class="far fa-share me-2"></i> Share</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-xl-5">
                    <div class="course-thumb-wrap chike-top-course-video-box">
                        <div class="course-thumbnail mb-0">
                            <img src="{{ $course->VideoPreviewImg }}" alt="" class="img-fluid w-100">
                        </div>

                        <a class="popup-video video_icon" href="{{ $course->preview_video }}"><i
                                class="fal fa-play"></i></a>
                    </div>
                    <p class="chike-preview-course-title">Preview Course</p>
                </div>
            </div>
        </div>
    </section>

    <section class="tutori-course-single tutori-course-layout-3 page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    @include('newui.layouts.course_overview_tabs')
                </div>
                <!-- leftside course price box  -->
                <div class="col-xl-4 col-lg-5">
                    <!-- Course Sidebar start -->
                    <div class="course-sidebar course-sidebar-5 mt-5 mt-xl-0 chike-leftside-pricebox-sticky">
                        <div class="course-widget course-details-info">
                            <div class="price-header d-block text-center mb-2">
                                <h2 class="course-price"> ₹ {{ $course->price }} {{-- <span>$150</span> --}} </h2>
                                {{-- <span class="course-price-badge onsale">39% off</span> --}}
                            </div>
                            <div class="price-header d-block text-center mb-1">
                                @guest
                                    <a onclick="alert('login popup')" class="btn btn-sm btn-main-outline m-2 rounded">
                                        <i class="fa fa-shopping-cart me-2"></i>
                                        Buy this Course
                                    </a>
                                @endguest

                                @auth
                                    <a href="{{ route("buynow",$course->id) }}"
                                        class="btn btn-sm btn-main-outline m-2 rounded">
                                        <i class="fa fa-shopping-cart me-2"></i>
                                        Buy this Course
                                    </a>
                                @endauth
                                {{-- <a href="#" class="text-right chike-course-like"><i class="fa fa-heart"></i></a> --}}
                            </div>
                            <div class="price-header d-block text-center">
                                <p class="mb-0">7 Days return policy*</p>
                                <p class="mb-0">Lifetime Access*</p>
                            </div>
                            <hr>
                            <p class="chike-apply-coupon-title">Apply Coupon</p>
                            <div class="banner-form">
                                <form action="" class="form">
                                    <input type="text" class="form-control rounded-0" >
                                    <button type="button" class="btn rounded-0 bg-dark text-white chike-apply-coupon-btn"
                                        name="apply_coupon" value="Apply coupon">Apply</button>
                                </form>
                            </div>
                            <div class="course-meterial mt-4">
                                <h4 class="text-center mt-2 mb-2">You will Get</h4>
                                <ul class="course-meterial-list chike-you-will-get">
                                    <li><i class="fa fa-certificate he-2"></i></i>Certificate on complision</li>
                                    <li><i class="fa fa-braille he-2"></i></i>Get lifetime Access</li>
                                    <li><i class="fa fa-comment he-2"></i>Ask Qustions to mentor</li>
                                    <li><i class="fa fa-comments-dollar he-2"></i>7 day refund policy</li>
                                </ul>
                            </div>
                            <div class="text-center mt-2">
                                {{-- <a href="#">Share this course <i class="far fa-share"></i></a> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Course Sidebar end -->
                </div>
                <!-- /leftside course price box  -->
            </div>
        </div>
    </section>

    @include('newui.models.leave_review')
@section('scripts')
    <script>
        function getCertificate() {
            alert("complete course to get certificate.");
        }
    </script>
@endsection
@endsection
