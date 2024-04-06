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

        h5 {
            margin-bottom: 5px;
            margin-bottom: 15px;
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
                    <h1>Terms & Conditions</h1>
                    <ul class="header-bradcrumb text-left">
                        <li><a href="/">Home</a></li>
                        <li class="active" aria-current="page">Terms & Conditions</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Terms & Conditions Section Start -->
<section class="about-3 section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-12 col-lg-12">
                <h3 class="chike-title">For Students:</h3>
                <p>Welcome to CourseHike! Before you start using our platform and purchasing our prerecorded courses,
                    please take a moment to read and understand the following terms and conditions. By accessing our
                    website and making a purchase, you agree to abide by these terms.</p>

                <h5>Course Purchase:</h5>
                <p>1.1 When you purchase a course, you gain lifetime access to the pre recorded content, as long as our
                    website is operational.</p>
                <p>1.2 Courses are available for individual purchase and are intended for personal use. Sharing,
                    distributing, or selling course materials without authorization is strictly prohibited.</p>

                <h5>Refund Policy:</h5>
                <p>2.1 We offer a 7-day refund policy for all course purchases.</p>
                <p>2.2 To be eligible for a refund, you must request it within 7 days of your initial purchase.</p>
                <p>2.3 If you have completed less than 50% of the course content, you are eligible for a full refund
                    within the 7-day period.</p>
                <p>2.4 If you have completed 50% or more of the course content, you are not eligible for a refund.</p>
                <p>2.5 Refund requests should be submitted through our designated channels, such as customer support or
                    the refund request form.</p>

                <h5>Access to Course Content:</h5>
                <p>.1 Your access to course content is provided for the lifetime of our website's operation.</p>
                <p>3.2 We reserve the right to update, modify, or remove course content at our discretion.</p>
                <p>3.3 You may not download, record, or share course videos without explicit permission.</p>

                <h5>User Conduct:</h5>
                <p>4.1 You agree to use our platform and access course content in a lawful and ethical manner.</p>
                <p>4.2 You will not engage in any activity that may disrupt or compromise the functionality of our
                    website.</p>

                <h5>Intellectual Property:</h5>
                <p>5.1 All course materials, including videos, documents, and resources, are protected by copyright and
                    intellectual property laws.</p>
                <p>5.2 You may not reproduce, distribute, or modify course materials without written consent.</p>

                <h5>Privacy Policy:</h5>
                <p>6.1 Your privacy is important to us. Please review our Privacy Policy to understand how we collect,
                    use, and protect your personal information.</p>

                <h5>Disclaimers:</h5>
                <p>7.1 Our courses are provided "as is" and we make no guarantees regarding their outcomes.</p>
                <p>7.2 We are not responsible for technical issues or interruptions that may affect your access to
                    course content.</p>

                <h5>Termination:</h5>
                </p>8.1 We reserve the right to suspend or terminate your access to courses if you violate these terms
                and conditions.</p>

                <h5>Governing Law:</h5>
                <p>9.1 These terms and conditions are governed by the laws of India. Any disputes shall be resolved in
                    the courts of India.</p>

                <p>By using our platform and purchasing our courses, you acknowledge that you have read, understood, and
                    agreed to these terms and conditions.</p>

                <h5 class="chike-title">For Mentors:</h5>
                Thank you for your interest in becoming a mentor on CourseHike. These terms and conditions outline the
                expectations and guidelines for mentors who submit courses on our platform. By submitting a course, you
                agree to adhere to these terms.

                <h5>Course Submission:</h5>
                <p>1.1 As a mentor, you can submit courses on topics that you are knowledgeable about and have expertise
                    in.</p>
                <p>1.2 Courses should be well-structured, informative, and engaging to provide value to our students.
                </p>

                <h5>Copyright and Ownership:</h5>
                <p>CourseHike takes copyright and ownership matters seriously. We are committed to upholding the highest
                    standards of intellectual property rights and protecting the rights of creators, mentors, and
                    students. Please carefully review the following terms regarding copyright and ownership before </p>

                <h5>submitting a course to our platform:</h5>
                <p>2.1 You must have the legal right to submit and offer the course content. This includes text, images,
                    videos, audio, graphics, and any other materials used in your course. Plagiarism, unauthorized use
                    of copyrighted materials, and any violation of intellectual property rights are strictly prohibited.
                </p>

                <p>2.2 By submitting a course, you grant CourseHike a non-exclusive license to use, reproduce,
                    distribute, and display the course content on our platform. This license allows us to promote,
                    market, and make the course available to students who purchase it.</p>

                <h5>2.3 Images and Media Usage:</h5>
                -You are prohibited from using copyrighted images, videos, music, or other media without proper
                authorization.
                - Any images, videos, or other media used in your course should either be original creations, sourced
                from copyright-free platforms, or used with proper licenses.
                - Ensure that you have the right to use all images and media in your course, either through ownership,
                public domain status, Creative Commons licenses, or purchased licenses.

                <h5>2.4 Brands, Logos, and Affiliation:</h5>
                <p>- You must not include any logos, brand names, or trademarks in your course content that you do not
                    have the legal right to use.
                    - Do not mislead students by implying a partnership or affiliation with other brands without proper
                    authorization.<BR>
                    - Do not use any kind of logo or branding to promote products or brands.<BR>
                    - Avoid showing competitors or related brands in your course content.<BR>
                    - Promoting products, brands, or affiliate links for products is strictly prohibited. This may lead
                    to    account suspension or permanent removal.</p>

                <h5>2.5 Publication Material:</h5>
                <p>- Do not use any materials from published works, academic sources, or other third-party sources
                    without proper authorization.<br>
                    - If you have obtained permission to use any third-party content, clearly mention the source and
                    permission in your course content.<br>
                    - You may be required to provide proof of permission to CourseHike upon request.</p>

                <h5>2.6 Music Usage:</h5>
                <p>- Do not use copyrighted music from the internet without proper authorization.<BR>
                    - Use only music that you have the legal right to use, which includes copyright-free music, music
                    under Creative Commons licenses, or music for which you have purchased licenses.</p>

                <h5>2.7 Attribution and Documentation:</h5>
                <p>- Properly attribute any third-party content you use, including images, media, music, and written
                    materials, as per the terms of the permission or license.<BR>
                    - Maintain documentation of all permissions and licenses related to third-party content used in your
                    course.</p>

                <h5>2.8 Fair Use and Educational Use:</h5>
                <p>While some materials may be used under the principles of fair use or educational use, ensure your use
                    complies with legal and ethical boundaries.</p>
                <p>
                    2.9 Liability:
                    You are solely liable for any copyright infringement or violation of intellectual property rights
                    arising from your course content.</p>

                <p>CourseHike disclaims any liability for the misuse of copyrighted materials by mentors.
                    By submitting a course to CourseHike, you acknowledge that you have read, understood, and agreed to
                    these detailed copyright and ownership terms. Non-compliance with these terms may lead to the
                    removal of your course from our platform, and your account may also be subject to banning or
                    removal, as well as other necessary actions as determined by CourseHike.
                    <p />

                <h5>Course Quality:</h5>
                <p>3.1 Course videos should have clear video and audio quality. Use proper lighting and ensure
                    high-quality audio for the best learning experience.<BR>
                    3.2 Courses should meet professional standards and provide accurate, up-to-date information.<BR>
                    3.3 Avoid making false promises or exaggerated claims about the outcomes of the course.</p>

                <h5>Content Quality:</h5>
                <p>4.1 Course materials, including videos, documents, quizzes, and assignments, should be original,
                    well-organized, and free from errors.<BR>
                    4.2 Avoid including offensive, discriminatory, or inappropriate content in your courses.</p>

                <h5>Revenue Sharing and Payment:</h5>
                <p>5.1 We operate on a 60-40 revenue sharing model. You will receive 60% of the course's revenue, and we
                    will retain 40%.<BR>
                    5.2 The total revenue earned will first have applicable taxes deducted, and then the remaining
                    amount will be divided between you (60%) and CourseHike (40%).<BR>
                    5.3 Earnings will be credited to your wallet as a "locked amount" for 7 days following the end of
                    the refund policy period. After this period, the locked amount will become "withdrawable."<BR>
                    5.4 To request a withdrawal, your withdrawable amount must exceed Rs.5000 currency units (e.g.,
                    dollars, euros, etc.).<BR>
                    5.5 Withdrawal requests will be processed according to our payment schedule and available payment
                    methods at that time.</p>

                <h5>Course Updates:</h5>
                <p>6.1 You are responsible for keeping your course content up to date and relevant.<BR>
                    6.2 We reserve the right to request updates or revisions to course content to maintain quality
                    standards.</p>

                <h5>Promotion and Marketing:</h5>
                <p>7.1 We will promote and market your course on our platform to maximize its reach.</p>
                <p>7.2 You may also promote your course through your own channels, as long as it complies with our
                    guidelines.</p>

                <h5>Termination:</h5>
                <p>8.1 CourseHike reserves the right to remove or suspend your course if it violates our terms or
                    quality standards.<BR>
                    8.2 In the event of a course removal, any earnings related to that course may be withheld or
                    adjusted.</p>

                <h5>Governing Law:</h5>
                <p>9.1 These terms and conditions are governed by the laws of India. Any disputes shall be resolved in
                    the courts of India.</p>

                <p>By submitting a course to CourseHike, you acknowledge that you have read, understood, and agreed to
                    these terms and conditions.</p>

            </div>
        </div>
    </div>
</section>
<!-- Terms & Conditions Section END -->
@endsection
