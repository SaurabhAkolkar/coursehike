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
        .chike-title {
            color: #3479E2;
            margin-bottom: 14px;
            margin-top: 26px;
            font-size: 35px;
        }

        .chike-subtitle {
            color: #484848;
            margin-bottom: 14px;
            margin-top: 26px;
            font-size: 28px;
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
                    <h1>Privacy Policy</h1>
                    <ul class="header-bradcrumb text-left">
                        <li><a href="/">Home</a></li>
                        <li class="active" aria-current="page">Privacy Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Privacy Policy Section Start -->
<section class="about-3 section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-12 col-lg-12">
                <h3 class="chike-title">Privacy Policy for CourseHike</h3>
                <p>Effective Date: 11/10/2023 </p>
                <p>Thank you for choosing CourseHike, an e-learning platform dedicated to providing quality online
                    courses. This Privacy Policy outlines how we collect, use, disclose, and safeguard your personal
                    information. By using CourseHike, you agree to the terms outlined in this policy.</p>

                <h4 class="chike-subtitle">Information We Collect</h4>
                <h5>1. User Registration Information:</h5>
                <p>When you sign up for an account, we collect your name, email address, and other relevant details to
                    create and manage your account.</p>
                <h5>2. Course Enrollment Information:</h5>
                <p>To facilitate your course enrollment, we collect information about the courses you purchase.</p>
                <h5>3. Payment Information:</h5>
                <p>We collect payment details when you make a purchase on our platform. Please note that we do not store
                    your complete payment information; it is securely handled by our payment processing partners.</p>
                <h5>4. User-generated Content:</h5>
                <p>Any content you create, such as comments, reviews, or discussions, may be collected and displayed on
                    the platform.</p>
                <h5>5. Technical Information:</h5>
                <p>We automatically collect certain technical information, such as IP addresses, browser types, and
                    device information, to improve the user experience and ensure platform security.</p>

                <h4 class="chike-subtitle">How We Use Your Information</h4>
                <h5>1. Account Management:</h5>
                <p>We use your registration information to create and manage your account.</p>
                <h5>2. Course Delivery:</h5>
                <p>Your course enrollment information is used to provide you with access to the purchased courses.</p>
                <h5>3. Communication:</h5>
                <p>We may use your email address to send important updates, announcements, and promotional material
                    related to CourseHike. You can opt-out of promotional emails at any time.</p>
                <h5>4. Improving Our Services:</h5>
                <p>We analyze user data to enhance our website's functionality, content, and user experience.</p>

                <h4 class="chike-subtitle">Information Sharing</h4>
                <h5>Instructors:</h5>
                <p>Your course enrollment information may be shared with instructors to facilitate course delivery.</p>
                <h5>Service Providers:</h5>
                <p>We may share information with trusted third-party service providers who assist us in operating our
                    website, conducting business, or servicing you.</p>
                <h5>Security:</h5>
                <p>We take the security of your information seriously and employ industry-standard measures to protect
                    it. However, no data transmission over the internet is completely secure, and absolute security
                    cannot be guaranteed.</p>
                <h5>Your Choices:</h5>
                <p>You have the right to update or delete your account information. You can manage your communication
                    preferences by adjusting your email settings.</p>
                <h5>Changes to this Privacy Policy:</h5>
                <p>CourseHike reserves the right to update this Privacy Policy. We will notify users of any material
                    changes through email or a prominent notice on the website.</p>
                <h5>Contact Us:</h5>
                <p>If you have any questions or concerns about this Privacy Policy, please contact us at [your contact
                    information].</p>
                <p><strong>Thank you for choosing CourseHike for your e-learning needs.</strong></p>

            </div>
        </div>
    </div>
</section>
<!-- Privacy Policy Section END -->
@endsection
