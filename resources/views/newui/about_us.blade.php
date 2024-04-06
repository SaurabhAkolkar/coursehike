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
    </style>
@endsection
@endsection

@section('body')
<section class="page-header">
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-12 col-xl-12">
                <div class="title-block">
                    <h1>About Us</h1>
                    <ul class="header-bradcrumb text-left">
                        <li><a href="/">Home</a></li>
                        <li class="active" aria-current="page">about us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section Start -->
<section class="about-3 section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-12 col-lg-12">
                <h3 class="chike-about-subtitle">Who we are</h3>
                <p>Welcome to CourseHike! We're a Pune-based company that's as diverse as it gets – a merry band of
                    programmers, designers, engineers, and yes, even a few die-hard gamers! Our journey is a thrilling
                    rollercoaster of creativity, innovation, and endless laughter. We believe that embracing diversity
                    is the key to unlocking the full spectrum of human potential. Whether we're coding lines of
                    brilliance, crafting exquisite designs, engineering the future, or battling monsters in the virtual
                    realm, one thing's for sure: We're all in this together. So, let's join hands, share our passions,
                    and create a brighter, more open-minded future where fun and productivity go hand in hand. </p>
            </div>
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="about-img">
                    <img src="assets/images/about/about-us.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
                <h3 class="chike-about-subtitle">Our Goal</h3>
                <p>At Coursehike, our mission is to empower individuals worldwide by providing access to high-quality,
                    diverse, and accessible learning experiences. We aim to bridge the gap between knowledge seekers and
                    experts in various fields, fostering a vibrant community of learners. Whether you're looking to
                    acquire new skills, expand your knowledge, or pursue your passions, Coursehike offers a
                    comprehensive library of courses, expert instructors, and a user-friendly interface designed to make
                    learning engaging and convenient. Our ultimate goal is to inspire lifelong learning, personal
                    growth, and professional development, making education accessible to all, anywhere, anytime.</p>
            </div>
            <div class="col-xl-12 col-lg-12">
                <h3 class="chike-about-subtitle">What we sell</h3>
                <p>At Coursehike, we offer a wide range of educational opportunities to meet your diverse learning
                    needs. Our platform provides a vast selection of courses spanning various topics, from technology
                    and business to arts and hobbies. You can explore video lectures, interactive assignments, and
                    expert guidance, making it easy to acquire new skills, improve existing ones, or simply indulge your
                    curiosity. Whether you're a professional seeking career advancement, a student aiming to supplement
                    your education, or an individual looking to explore new passions, Coursehike has something for
                    everyone. Our commitment to quality ensures that you receive the best learning experiences, all at
                    your own pace and on your terms. Join us at Coursehike and embark on a journey of personal and
                    professional development that fits your lifestyle.</p>
            </div>
        </div>
    </div>
</section>
<!-- About Section END -->
@endsection
