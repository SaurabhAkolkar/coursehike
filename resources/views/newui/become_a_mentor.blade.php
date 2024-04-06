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
        .chike-about-subtitle {
            color: #3479E2;
            margin-bottom: 14px;
            margin-top: 26px;
            font-size: 35px;
        }

        .chike-why-subtitle {
            margin-bottom: 10px;
        }

        .chike-why-icon i {
            color: #484848;
            font-size: 34px;
        }

        .mfp-image-holder .mfp-close,
        .mfp-iframe-holder .mfp-close {
            color: #FFF;
            right: 0px;
            text-align: right;
            padding-right: 10px;
            width: auto;
            padding-left: 10px;
        }
    </style>
@endsection
@endsection

@section('body')
<section class="page-header">
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-12 col-xl-12">
                <div class="title-block">
                    <h1>Become a Mentor at CourseHike</h1>
                    <ul class="header-bradcrumb text-left">
                        <li><a href="/">Home</a></li>
                        <li class="active" aria-current="page">about for mentor</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section Start -->
<section class="about-2 section-padding">
    <div class="container text-center">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-12 col-lg-12">
                <h3 class="chike-about-subtitle">How to Start?</h3>
            </div>
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="about-img">
                    <img src="assets/images/mentor/teach1.png" alt="" class="img-fluid">
                </div>
                <BR>
            </div>
            <div class="col-xl-12 col-lg-12">
                <h3 class="chike-about-subtitle">1.Plan Your Course</h3>
                <p>Start by outlining your course content. Identify key topics, learning objectives, and a logical
                    progression. Consider the needs and interests of your target audience. A well-thought-out course
                    plan lays the foundation for an engaging and effective learning experience.</p>
            </div>
            <div class="col-xl-12 col-lg-12">
                <h3 class="chike-about-subtitle">2.Record video</h3>
                <p>ring your course to life by recording engaging video content. Set up a quiet and well-lit space,
                    ensuring your delivery is clear and enthusiastic. Break down your content into digestible sections,
                    keeping each video concise and focused. A well-produced video enhances the overall learning
                    experience for your students.</p>
            </div>
            <div class="col-xl-12 col-lg-12">
                <h3 class="chike-about-subtitle">3. Upload on CourseHike</h3>
                <p>Ready to share your knowledge? Upload your course on CourseHike with ease. Follow our user-friendly
                    interface to input your course details, set pricing, and upload your video content. Once uploaded,
                    your course will be accessible to our global community of learners, providing you with an
                    opportunity to impact and inspire a diverse audience.</p>
                <p>Join CourseHike as a mentor and take these three simple steps to turn your expertise into a valuable
                    online learning experience.</p>
            </div>
            <div class="col-xl-12 col-lg-12 text-center">
                <BR>
                <div class="about-img">
                    <a class="popup-video video_icon" href="https://www.youtube.com/watch?v=cRXm1p-CNyk"><img
                            src="assets/images/mentor/video-image-1.png" alt="" class="img-fluid"></a>
                </div>
                <BR>
            </div>
            <div class="col-xl-12 col-lg-12">
                <h3 class="chike-about-subtitle mb-5">Why CourseHike?</h3>
            </div>
            <div class="col-xl-12 col-lg-12">
                <p class="chike-why-icon"><i class="fa fa-tree" aria-hidden="true"></i></p>
                <h3 class="chike-why-subtitle">Early Adopter Advantage</h3>
                <p>Being an early adopter on CourseHike provides instructors with a unique advantage. As the platform
                    grows, instructors who join early have the opportunity to establish themselves as pioneers and
                    thought leaders in their subject areas. Early adopters often benefit from increased visibility, as
                    the platform actively promotes and highlights new courses, helping instructors build a dedicated
                    audience right from the start.</p>
                <BR>
            </div>
            <div class="col-xl-12 col-lg-12">
                <p class="chike-why-icon"><i class="fa fa-braille" aria-hidden="true"></i></p>
                <h3 class="chike-why-subtitle">Monetization Opportunity</h3>
                <p>CourseHike believes in rewarding the expertise of its instructors. When you join as a mentor, you
                    receive 60% of the revenue generated from your courses, with CourseHike retaining 40%. This fair and
                    transparent monetization model ensures that instructors are duly compensated for their valuable
                    contributions to the platform.</p>
                <BR>
            </div>
            <div class="col-xl-12 col-lg-12">
                <p class="chike-why-icon"><i class="fa fa-align-center" aria-hidden="true"></i></p>
                <h3 class="chike-why-subtitle">Collaborative Growth</h3>
                <p>CourseHike is invested in the success of its instructors. New instructors can contribute to shaping
                    the platform's direction and features. There's potential for collaboration between CourseHike and
                    early instructors to provide feedback, implement improvements, and tailor the platform to better
                    meet the needs of both educators and learners. This collaborative relationship can be mutually
                    beneficial and contribute to the long-term success of both the platform and its early contributors.
                </p>
                <BR>
            </div>
            <div class="col-xl-12 col-lg-12">
                <p class="chike-why-icon"><i class="fa fa-headphones" aria-hidden="true"></i></p>
                <h3 class="chike-why-subtitle">Marketing Support</h3>
                <p>To help new courses gain traction, CourseHike offers marketing support for instructors. This includes
                    featuring new courses prominently, leveraging social media promotion, and implementing targeted
                    advertising campaigns. By aligning with CourseHike, instructors benefit from the platform's efforts
                    to drive traffic and attract learners, giving their courses a boost in visibility during the
                    critical early stages.</p>
                <BR>
            </div>
            <div class="col-xl-12 col-lg-12">
                <p>In essence, CourseHike not only provides a platform for early instructors to thrive but also offers a
                    substantial monetary incentive, making it a rewarding journey for educators looking to share their
                    knowledge with a global audience.</p>
            </div>
        </div>
    </div>
</section>
<!-- About Section END -->

@section('scripts')
    <script type="text/javascript">
        $('.popup-video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    </script>
@endsection
@endsection
