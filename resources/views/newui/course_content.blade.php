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
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset("assets/vendors/animate-css/animate.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/animated-headline/animated-headline.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/owl/assets/owl.carousel.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/owl/assets/owl.theme.default.min.css") }}">

    <style type="text/css">
        /*------quiz-box--------*/
        #chike-quiz-box-1,
        #chike-quiz-box-2,
        #chike-quiz-box-3 {
            background-color: #ffffff;
            height: 500px;
            max-height: 100%;
            padding: 150px 0px;
        }

        #chike-quiz-box-3,
        #chike-quiz-box-4 {
            background-color: #ffffff;
            height: 500px;
            max-height: 100%;
            padding: 50px 100px;
        }

        .chike-quiz-box-2-btn-group {
            position: absolute;
            bottom: 20px;
            right: 10px;
        }

        /* Idle State of the stars */
        #chikeLeaveaReviewModal .rating-stars ul>li.star>i.fa {
            font-size: 2.5em;
            /* Change the size of the stars */
            color: #ccc;
            /* Color on idle state */
            cursor: pointer;
        }

        /* Hover state of the stars */
        #chikeLeaveaReviewModal .rating-stars ul>li.star.hover>i.fa {
            color: #FFCC36;
        }

        /* Selected state of the stars */

        .chike-course-content-header {
            background-color: #fff !important;
        }

        .chike-course-content-header::after {
            background: none;
        }

        .chike-course-content-header span {
            position: absolute;
            right: 0px;
        }

        #chike-video-accordion-session-right-box {
            position: relative;
        }

        #chike-video-accordion-session-box {
            position: absolute;
            width: 100%;
        }

        #chike-video-left-box {
            position: relative;
            transition: all .24s ease-in;
        }

        #chike-video-accordion-session-menu-show-right-btn {
            position: absolute;
            right: 0;
            top: 0;
            border-radius: 50px 0px 0px 50px;
            padding: 10px 10px;
            display: none;
        }

        #chike-video-accordion-session-menu-show-right-btn i {
            margin-left: 7px;
        }

        #chike-video-accordion-session-box .list-group-item {
            padding: 1rem;
        }

        #chike-video-accordion-session-box .list-group-item.chike-active {
            color: #3479E2;
        }

        #chike-video-accordion-session-box .list-group-item.chike-active>span i,
        .list-group-item.chike-active>.chike-video-timer-view {
            color: #3479E2;
        }

        #chike-video-accordion-session-box .list-group-item i {
            color: #A8A5A5;
        }

        #chike-video-accordion-session-box .chike-video-timer-view {
            font-size: 10px;
            position: absolute;
            top: 20px;
            right: 15px;
            color: #A8A5A5;
        }

        #chike-video-accordion-session-box .chike-video-timer-view-active {
            color: #008000 !important;
            font-weight: 700;
        }

        .chike-video-accordion-session-check {
            float: right;
        }

        .chike-video-accordion-session-check-active {
            color: #008000 !important;
            position: absolute;
            right: 20px;
            top: 10px;
        }

        .chike-edit-video-icon {
            width: 15px;
            height: 15px;
            margin-bottom: 2px;
        }

        .accordion-button:focus {
            border-color: #ffffff;
            box-shadow: none;
        }

        @media (max-width: 991px) {
            #chike-video-accordion-session-menu-show-right-btn {
                position: relative;
                float: right;
            }
        }

        @media (max-width: 768px) {
            .chike-featured-courses-box .chike-course-like {
                float: right;
            }

            #chike-video-accordion-session-box {
                position: relative !important;
            }

            .chike-all-questions-title {
                margin-top: 25px;
            }

            #chike-featured-courses-box .chike-course-like {
                float: right;
            }

            .tutori-course-single {
                padding: 0px;
            }

            .course-top-wrap select {
                margin-top: 15px;
            }

            #chikeLeaveaReviewModalBtn {
                width: 100%;
            }

            .chike-preview-course-title {
                margin-top: 50px;
                margin-bottom: 0px;
            }

            .chike-description-show_hide {
                float: right;
                font-weight: 600;
            }

            .single-course-details p {
                margin-bottom: 0px;
            }

            .course-single-review .user-image {
                margin-right: 10px;
            }

            .chike-comment-answered-status {
                right: 15px;
                top: 5px;
                font-size: 12px;
            }

            .user-review-content .user-name {
                font-size: 16px;
                margin-top: 10px;
            }

            .chike-comment-time {
                font-size: 10px;
            }

            .course-meta span {
                font-size: 12px;
            }

            .chike-comment-replay-box {
                padding: 15px 0px 15px 0px;
            }

            .comments .course-single-review {
                padding: 15px;
            }

            .chike-comment-box {
                text-align: center;
            }

            .course-single-review .user-review-content {
                padding: 0px;
            }

            .chike-ask-question-submit-btn {
                margin: 20px 0px 0px 0px;
                width: 50%;
            }

            .chike-comment-answered-status {
                right: 15px;
                top: 5px;
                font-size: 12px;
            }

            .user-review-content .user-name {
                font-size: 16px;
                margin-top: 10px;
            }

            .chike-comment-time {
                font-size: 10px;
            }

            .course-meta span {
                font-size: 12px;
            }

            .chike-comment-replay-box {
                padding: 15px 0px 15px 0px;
            }

            .comments .course-single-review {
                padding: 15px;
            }

            .chike-comment-box {
                text-align: center;
            }

            .course-single-review .user-review-content {
                padding: 0px;
            }

            .chike-ask-question-submit-btn {
                margin: 20px 0px 0px 0px;
                width: 50%;
            }

            .chike-menu-title {
                display: none;
            }

            .chike-menu-icon {
                display: block;
                width: 30px;
                height: 30px;
                color: #BDBCBC;
            }

            .tutori-course-content .learn-press-nav-tabs .course-nav a {
                padding: 15px 15px 10px 15px;
                margin: -1px auto;
            }

            .course-single-tabs .nav {
                display: flex !important;
            }

            .nav .nav-link svg {
                fill: #BDBCBC;
            }

            .nav .nav-link.active svg {
                fill: #3479E2 !important;
            }
        }
    </style>
     <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet">
@endsection

@endsection

@section('body')
<section class="tutori-course-single tutori-course-layout-3 page-wrapper" style="padding: 0px 0px 50px 0px;">
    <div class="container-xxl">
        <div class="row justify-content-start">
            <div class="col-xl-8 col-lg-8 order-1 p-0" id="chike-video-left-box">
                <!-- top video header -->
                <div class="course-thumb-wrap">
                    <div class="course-thumbnail border-0 mb-0">
                        <!-- image box-->
                        <img src="{{ asset("assets/images/course-overview/course-overview-2.png") }}" alt=""
                            class="img-fluid w-100 rounded-0 chike-hide">
                        <!-- /image box -->
                        
                        <!-- iframe box -->
                        {{-- <iframe width="100%" height="500"
                            src="http://127.0.0.1:8000/stream-video"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe> --}}


                            <video id="my-video" class="video-js" controls preload="auto" width="830" height="500" poster="poster.jpg" data-setup="{}">
                                <source src="http://127.0.0.1:8000/stream-video" type="video/mp4">
                                <!-- Add additional video sources here -->
                            </video>

                        <!-- /iframe box -->

                        <!-- chike-quiz-box-1 -->
                        {{-- <div id="chike-quiz-box-1" class="chike-hide">
                            <div class="row align-items-center justify-content-lg-center">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="section-heading mt-4 mt-lg-0 text-center">
                                        <h2 class="font-md mb-20">Chapter 1 Quiz</h2>
                                        <p class="mb-20">Quiz 1 | 3 Qustions</p>
                                        <a href="#" class="btn btn-sm btn-main m-2 rounded">Start Quiz</a>
                                        <a href="#" class="btn btn-sm btn-main-outline rounded">Skip Quiz</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- /chike-quiz-box-1 -->
                        <!-- chike-quiz-box-2 -->
                        {{-- <div id="chike-quiz-box-2" class="chike-hide">
                            <div class="row align-items-center justify-content-lg-center">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="section-heading mt-4 mt-lg-0 text-center">
                                        <h2 class="font-md mb-20">Chapter 1 Quiz Completed</h2>
                                        <p class="mb-20">You got 1 out of 3 correct.</p>
                                        <p class="mb-20">1 Question skipped.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="chike-quiz-box-2-btn-group">
                                <a href="#" class="btn btn-sm btn-main m-2 rounded">Continue</a>
                                <a href="#" class="btn btn-sm btn-main-outline m-2 rounded">Retry Quiz</a>
                            </div>
                        </div> --}}
                        <!-- /chike-quiz-box-2 -->
                        <!-- chike-quiz-box-3 -->
                        {{-- <div id="chike-quiz-box-3" class="chike-hide">
                            <div class="row align-items-center justify-content-lg-center">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="section-heading mt-4 mt-lg-0 text-left">
                                        <h2 class="font-md mb-20">Q1. Identify correct kanji for school.</h2>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="text-left">
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="Q11">
                                            <label class="form-check-label" for="Q11">
                                                食
                                            </label>
                                        </div>
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="Q12" checked>
                                            <label class="form-check-label" for="Q12">
                                                学生
                                            </label>
                                        </div>
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="Q13" checked>
                                            <label class="form-check-label" for="Q13">
                                                先生
                                            </label>
                                        </div>
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="Q14" checked>
                                            <label class="form-check-label" for="Q14">
                                                今日
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="alert alert-danger  d-flex align-items-center" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor"
                                            class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
                                            viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                            <path
                                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </svg>
                                        <div>
                                            An example alert with an icon
                                        </div>
                                    </div>
                                    <h6>Correct answer is 2nd option</h6>
                                </div>
                            </div>
                            <div class="chike-quiz-box-2-btn-group">
                                <a href="#" class="btn btn-sm btn-main-outline m-2 rounded">Skip Qustion</a>
                                <a href="#" class="btn btn-sm btn-main m-2 rounded">Check Answer</a>
                            </div>
                        </div> --}}
                        <!-- /chike-quiz-box-3 -->
                        <!-- chike-quiz-box-4 -->
                        {{-- <div id="chike-quiz-box-4" class="chike-hide">
                            <div class="row align-items-center justify-content-lg-center">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="section-heading mt-4 mt-lg-0 text-left">
                                        <h2 class="font-md mb-20">Q2. Identify correct kanji for school.</h2>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="text-left">
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="Q11">
                                            <label class="form-check-label" for="Q11">
                                                学生
                                            </label>
                                        </div>
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="Q12" checked>
                                            <label class="form-check-label" for="Q12">
                                                先生
                                            </label>
                                        </div>
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="Q13" checked>
                                            <label class="form-check-label" for="Q13">
                                                今日
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </symbol>
                                    </svg>
                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24"
                                            role="img" aria-label="Success:">
                                            <use xlink:href="#check-circle-fill" />
                                        </svg>
                                        <div>
                                            An example alert with an icon
                                        </div>
                                    </div>
                                    <h6>Correct answer is 2nd option</h6>
                                </div>
                            </div>
                            <div class="chike-quiz-box-2-btn-group">
                                <a href="#" class="btn btn-sm btn-main-outline m-2 rounded">Skip Qustion</a>
                                <a href="#" class="btn btn-sm btn-main m-2 rounded">Check Answer</a>
                            </div>
                        </div> --}}
                        <!-- /chike-quiz-box-4 -->

                    </div>
                </div>
                <!-- /top video header -->
                <button class="btn btn-main btn-md" id="chike-video-accordion-session-menu-show-right-btn"><i
                        class="fa fa-bars" aria-hidden="true" title="View Menu"></i></button>
            </div>
            <div class="col-xl-8 col-lg-8 m-0 p-0 order-3">
                <div class="container-xxl">
                    @include('newui.layouts.course_overview_tabs')
                </div>
            </div>
            <!-- leftside course session box-->
            <div class="col-xl-4 col-lg-4 m-0 p-0 order-2" id="chike-video-accordion-session-right-box">
                <div class="accordion" id="chike-video-accordion-session-box">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button rounded-0 chike-course-content-header collapsed"
                                type="button">
                                Course Content <span class="chike-leftside-video-session-menu-close-btn btn btn-sm"><i
                                        class="fa fa-times" aria-hidden="true"></i></span>
                            </button>
                        </h2>
                    </div>

                    {{-- @foreach ($collection as $item)
                        
                    @endforeach --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOneScripts">
                            <button class="accordion-button rounded-0" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOneScripts" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOneScripts">
                                Chapter 1: Scripts available in Japanese
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOneScripts" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOneScripts">
                            <div class="accordion-body p-0">
                                <div class="list-group list-group-flush">
                                    <label class="list-group-item chike-active" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span> 1. What is script?
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view chike-video-timer-view-active">05.20</span>
                                        2. What is Hiragana, Katakana and Kanji...
                                        <i class="fa fa-check chike-video-accordion-session-check chike-video-accordion-session-check-active"
                                            aria-hidden="true"></i>
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view">05.20</span> 3. Learn with example?
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwoChapter">
                            <button class="accordion-button collapsed rounded-0" type="button"
                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwoChapter"
                                aria-expanded="false" aria-controls="panelsStayOpen-collapseTwoChapter">
                                Chapter 2: Scripts available in Japanese
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwoChapter" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingTwoChapter">
                            <div class="accordion-body p-0">
                                <div class="list-group list-group-flush">
                                    <label class="list-group-item chike-active" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view">05.20</span> 1. What is script?
                                        <i class="fa fa-check chike-video-accordion-session-check chike-video-accordion-session-check-active"
                                            aria-hidden="true"></i>
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view">05.20</span> 2. What is Hiragana, Katakana
                                        and Kanji...
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view">05.20</span> 3. Learn with example?
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-4"><img
                                                src="{{ asset("/assets/images/course-overview/chike-edit-video-icon.svg") }}"
                                                width="20" height="20" class="chike-edit-video-icon"></span>
                                        4. Quiz
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThreeChapter">
                            <button class="accordion-button collapsed rounded-0" type="button"
                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThreeChapter"
                                aria-expanded="false" aria-controls="panelsStayOpen-collapseThreeChapter">
                                Chapter 3: Scripts available in Japanese
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThreeChapter" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingThreeChapter">
                            <div class="accordion-body p-0">
                                <div class="list-group list-group-flush">
                                    <label class="list-group-item chike-active" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view">05.20</span> 1. What is script?
                                        <i class="fa fa-check chike-video-accordion-session-check chike-video-accordion-session-check-active"
                                            aria-hidden="true"></i>
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view">05.20</span> 2. What is Hiragana, Katakana
                                        and Kanji...
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view">05.20</span> 3. Learn with example?
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-4"><img
                                                src="{{ asset("/assets/images/course-overview/chike-edit-video-icon.svg") }}"
                                                width="20" height="20" class="chike-edit-video-icon"></span>
                                        4. Quiz
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFourChapter">
                            <button class="accordion-button collapsed rounded-0" type="button"
                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFourChapter"
                                aria-expanded="false" aria-controls="panelsStayOpen-collapseFourChapter">
                                Chapter 4: Scripts available in Japanese
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFourChapter" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingFourChapter">
                            <div class="accordion-body p-0">
                                <div class="list-group list-group-flush">
                                    <label class="list-group-item chike-active" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view">05.20</span> 1. What is script?
                                        <i class="fa fa-check chike-video-accordion-session-check chike-video-accordion-session-check-active"
                                            aria-hidden="true"></i>
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view">05.20</span> 2. What is Hiragana, Katakana
                                        and Kanji...
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-2"><i class="fas fa-play-circle"
                                                aria-hidden="true"></i></span><span
                                            class="chike-video-timer-view">05.20</span> 3. Learn with example?
                                    </label>
                                    <label class="list-group-item" style="width:100%">
                                        <span class="mr-4"><img
                                                src="{{ asset("/assets/images/course-overview/chike-edit-video-icon.svg") }}"
                                                width="20" height="20" class="chike-edit-video-icon"></span>
                                        4. Quiz
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                </div>
            </div>
            <!-- leftside course session box  -->
        </div>
    </div>
</section>
@include('newui.models.leave_review')

@section('scripts')
<script src="https://vjs.zencdn.net/7.8.4/video.min.js"></script>
<script>
    var player = videojs('my-video');
    player.on('contextmenu', function(e) {
            e.preventDefault();
        });
</script>
    <!--  Owl Carousel -->
    <script src="{{ asset("assets/vendors/owl/owl.carousel.min.js") }}"></script>
    <!-- Animated Headline -->
    <script src="{{ asset("assets/vendors/animated-headline/animated-headline.js") }}"></script>

    <script type="text/javascript">
        $('.chike-leftside-video-session-menu-close-btn').click(function() {
            $('#chike-video-left-box').addClass('col-xl-12 col-lg-12');
            $('#chike-video-accordion-session-menu-show-right-btn').show();
            $('#chike-video-accordion-session-right-box').hide();
        });
        $('#chike-video-accordion-session-menu-show-right-btn').click(function() {
            $('#chike-video-left-box').removeClass('col-xl-12 col-lg-12');
            $('#chike-video-left-box').addClass('col-xl-8 col-lg-8 col-12');
            //$("#chike-video-accordion-session-box").toggle("slide");
            $('#chike-video-accordion-session-menu-show-right-btn').hide();
            $('#chike-video-accordion-session-right-box').show();
        });
    </script>
@endsection
@endsection
