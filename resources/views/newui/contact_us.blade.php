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
        .contact__form .form-control {
            border: 2px solid #eee;
            background: #fff;
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
                    <h1>Contact Us</h1>
                    <ul class="header-bradcrumb justify-content-left">
                        <li><a href="/">Home</a></li>
                        <li class="active" aria-current="page">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact section start -->
<section class="contact section-padding">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-4 col-lg-5">
                <div class="contact-info-wrapper mb-5 mb-lg-0">
                    <h3>Get in touch</h3>
                    <p>Have questions, suggestions, or just want to say hello? We'd love to hear from you! Feel free to
                        reach out to our friendly team at Coursehike. Your feedback is important to us, and we're here
                        to assist you with any inquiries or concerns.</p>

                    <div class="contact-item">
                        <i class="fa fa-envelope"></i>
                        <h5>contactcoursehike@coursehike.com</h5>
                    </div>

                    <div class="contact-item">
                        <i class="fa fa-phone-alt"></i>
                        <h5>+91 8999159014</h5>
                    </div>

                    <div class="contact-item">
                        <i class="fa fa-map-marker"></i>
                        <h5>CourseHike, Mauli Nagar, Magarpatta, Hadapsar,Pune</h5>
                    </div>
                </div>
            </div>

            <div class="col-xl-7 col-lg-6">
                <form class="contact__form form-row " method="post" action="mail.php" id="contactForm">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" role="alert">
                                Your message was sent successfully.
                            </div>
                            <div class="alert alert-danger contact__msg" role="alert">
                                Your Error message.
                            </div>
                        </div>
                        <div class="col-12">
                            <h2>Drop a message</h2>
                            <p>Please fill this form. We usually reply back within same day</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="*Your Name">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="*Email Address">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control"
                                    placeholder="*Subject">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea id="message" name="message" cols="30" rows="6" class="form-control" placeholder="*Your Message"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-center">
                            <button class="btn btn-main w-100 rounded" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact section End -->

<!-- Map section start -->
<section class="map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15136.10728993724!2d73.9370318!3d18.4824442!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2e97907b3749b%3A0xaee5489517d4d9ee!2sHome%20Counter%20LLP!5e0!3m2!1sen!2sin!4v1701375562143!5m2!1sen!2sin"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<!-- Map section End -->
@endsection
