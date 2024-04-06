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
    <section class="page-header">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-lg-12 col-xl-12">
                    <div class="title-block">
                        <h1>Know your Mentor</h1>
                        <ul class="header-bradcrumb justify-content-left">
                            <li><a href="/">Home</a></li>
                            <li class="active" aria-current="page">Know your Mentor</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mentor Section Start -->
    <section class="about-3 section-padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-12 col-lg-12">
                    <!--  Author -->
                    <div class="post-single-author mb-5" style="background-color: #fff;">
                        <div class="author-img text-center">
                            <img src="assets/images/mentor/default-img.jpg" class="img-fluid" alt="...">
                            <button type="button" class="btn btn-sm btn-main-outline rounded mt-5 d-flex text-center"
                                style="margin: 0 auto;">Follow</button>
                        </div>
                        <div class="author-info">
                            <h4>Hemant Kudake</h4>
                            <span>Web Developer</span>
                            <p>Hemant Kudake is a dedicated Japanese teacher known for his passion and expertise in the
                                Japanese language and culture. With a profound understanding of the nuances of the language,
                                he imparts his knowledge with enthusiasm and patience. His teaching style is characterized
                                by a perfect blend of traditional and modern techniques, ensuring that his students grasp
                                the language's complexities with ease. Hemant's warm and approachable demeanor creates a
                                welcoming and encouraging learning environment, fostering strong student-teacher
                                relationships. His commitment to helping his students excel in their Japanese language
                                studies, as well as his deep appreciation for Japanese culture, makes him an invaluable and
                                inspiring educator.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <!-- Featured Courses -->
                    <h3 class="course-title mb-2">Published Courses</h3>
                    <div class="course-top-wrap mb-4">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-9">
                                    <p class="mb-0">Showing 8 results</p>
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
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="course-grid tooltip-style bg-white hover-shadow">
                                <div class="course-header">
                                    <div class="course-thumb">
                                        <img src="assets/images/course/course1.png" alt="" class="img-fluid">
                                        <div class="course-price">$300</div>
                                    </div>
                                </div>
                                <div class="course-content">
                                    <div class="rating mb-10">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>

                                        <span>3.9 (30 reviews)</span>
                                    </div>
                                    <h3 class="course-title mb-20"> <a href="#">SQL-Data Analysis: Crash Course</a>
                                    </h3>
                                    <div class="course-footer mt-20 d-flex align-items-center justify-content-between ">
                                        <span class="duration"><i class="far fa-clock me-2"></i>6.5 hr</span>
                                        <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                    </div>
                                </div>
                                <div class="course-footer text-center border p-3">
                                    <a href="#" class="btn btn-main-outline btn-radius btn-sm">Buy Now <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COURSE END -->
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="course-grid tooltip-style bg-white hover-shadow">
                                <div class="course-header">
                                    <div class="course-thumb">
                                        <img src="assets/images/course/course1.png" alt="" class="img-fluid">
                                        <div class="course-price">$300</div>
                                    </div>
                                </div>
                                <div class="course-content">
                                    <div class="rating mb-10">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>

                                        <span>3.9 (30 reviews)</span>
                                    </div>
                                    <h3 class="course-title mb-20"> <a href="#">SQL-Data Analysis: Crash Course</a>
                                    </h3>
                                    <div class="course-footer mt-20 d-flex align-items-center justify-content-between ">
                                        <span class="duration"><i class="far fa-clock me-2"></i>6.5 hr</span>
                                        <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                    </div>
                                </div>
                                <div class="course-footer text-center border p-3">
                                    <a href="#" class="btn btn-main-outline btn-radius btn-sm">Buy Now <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COURSE END -->
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="course-grid tooltip-style bg-white hover-shadow">
                                <div class="course-header">
                                    <div class="course-thumb">
                                        <img src="assets/images/course/course1.png" alt="" class="img-fluid">
                                        <div class="course-price">$300</div>
                                    </div>
                                </div>
                                <div class="course-content">
                                    <div class="rating mb-10">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>

                                        <span>3.9 (30 reviews)</span>
                                    </div>
                                    <h3 class="course-title mb-20"> <a href="#">SQL-Data Analysis: Crash Course</a>
                                    </h3>
                                    <div class="course-footer mt-20 d-flex align-items-center justify-content-between ">
                                        <span class="duration"><i class="far fa-clock me-2"></i>6.5 hr</span>
                                        <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                    </div>
                                </div>
                                <div class="course-footer text-center border p-3">
                                    <a href="#" class="btn btn-main-outline btn-radius btn-sm">Buy Now <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COURSE END -->
                        <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                            <a href="#" class="btn btn-sm btn-main rounded">Load More</a>
                        </div>
                    </div>
                    <!-- /Featured Courses -->
                </div>
            </div>
        </div>
    </section>
    <!-- Mentor Section END -->
@endsection
