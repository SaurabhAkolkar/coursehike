@extends('learners.layouts.app')

@section('seo_content')
    <title>About the Team | Learn Tattoo & Graphic Design | LILA </title>
    <meta name='description' itemprop='description' content='We at LILA are in a pursuit of bringing mentors from around the world to teach varied skills in the most simplest ways to everybody who wish to learn.' />

    <meta property="og:description" content="We at LILA are in a pursuit of bringing mentors from around the world to teach varied skills in the most simplest ways to everybody who wish to learn." />
    <meta property="og:title" content="About the Team | Learn Tattoo & Graphic Design | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="About the Team | Learn Tattoo & Graphic Design | LILA" />
    <meta name="twitter:site" content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"About the Team | Learn Tattoo & Graphic Design | LILA"}</script>
@endsection

@section('content')
<section class="la-about__section">
    <div class="la-section__inner">
        <section class="la-about__top la-section__small">
            <div class="container-fluid">
                <div class="row la-anim__wrap">
                    <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-3 mt-n4 mb-5 la-anim__stagger-item--x" href="{{URL::previous()}}"></a>

                    <div class="col-lg-5">
                        <div class="la-about__us la-anim__wrap">
                            <h1 class="la-section__title la-section__title--medium leading-none la-about__title la-anim__stagger-item"> 
                                <span>Learn it </span> <br/>
                                <span style="color:#c0c0c0;">like aliens</span>
                            </h1>
                            <p class="la-about__tag la-anim__stagger-item--x">Embracing Self Learning</p>

                            <div class="la-about__info pt-6 pt-md-10 la-anim__stagger-item">
                                <h5 class="la-about__info-title">About Lila</h5>
                                <p class="la-about__info-desc">Learn It Like Aliens is a brainchild of Sunny Bhanushali, the founder and CEO at LILA. His belief in serving people with knowledge led to the establishment of this comprehensive Online Learning Platform. </p>
                                <p class="la-about__info-desc">LILA, at present is in pursuit of bringing mentors from around the world to teach varied skills in the most simplest ways to everybody who wish to learn.</p>
                            </div>

                            <div class="la-about__info-cta  mt-12 la-anim__stagger-item la-anim__A">
                                <a class="la-btn__app text-uppercase" role="button" href="/browse/courses">Start Learning</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1 my-auto position-relative py-10 py-md-1 px-0 px-lg-3">
                        <div class="la-about__reach position-relative d-flex justify-content-between align-items-center la-anim__wrap">
                            <span class="la-section__circle la-section__circle--right2 la-anim__stagger-item--x la-anim__D"></span>
                            <div class="col">
                                <div class="la-bcreator__stats la-about__stats la-anim__stagger-item--x">
                                    <div class="la-bcreator__stats-item ">
                                        <h4 class="la-bcreator__stats-count m-0">500 +</h4>
                                        <p class="la-bcreator__stats-desc  text-uppercase mb-0">Learners</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="la-bcreator__stats la-about__stats la-anim__stagger-item--x">
                                    <div class="la-bcreator__stats-item ">
                                        <h4 class="la-bcreator__stats-count m-0">60 +</h4>
                                        <p class="la-bcreator__stats-desc  text-uppercase  mb-0">Courses</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="la-bcreator__stats la-about__stats la-anim__stagger-item--x">
                                    <div class="la-bcreator__stats-item ">
                                        <h4 class="la-bcreator__stats-count m-0">15 +</h4>
                                        <p class="la-bcreator__stats-desc  text-uppercase mb-0">Countries</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid la-section">
                <div class="row">
                    <div class="col-12">
                        <div class="la-about__motto position-relative la-anim__wrap">
                            <div class="la-about__motto-sq la-anim__fade-in-top"></div>
                            <div class="la-about__motto-box la-anim__stagger-item ">
                                <div class="la-about__motto-text leading-tight la-anim__stagger-item--x la-anim__B">
                                    <span>"The thing</span>
                                    <span style="color:#fff"> I thought couldn’t be possible a year or two ago,</span>
                                    <span>is actually happening."</span> 
                                </div>
                                <div class="la-about__motto-author text-right mt-8 la-anim__stagger-item--x la-anim__C">
                                    – Allan Gois, artist, student & Lila mentor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="la-about__btm">
            <div class="container-fluid">
                <!-- Our Mission: Start -->
                <div class="row la-section la-about__btm-section">
                    <div class="col-md-7 col-lg-5">
                        <div class="la-about__mvt-lft la-anim__wrap">
                            <div class="la-about__mvt-tag la-anim__fade-in-top">Mission</div>
                            <h2 class="la-about__mvt-title la-anim__stagger-item">The 3E'S</h2>
                            <div class="la-about__mvt-text">
                                <p class="la-about__mvt-desc la-anim__stagger-item--x">
                                    Our mission is to Encourage, Empower and Embrace Self-Learning among all the curious individuals who wish to learn, expand their potential and make a mark in the world irrespective of the circumstances, if you have the desire, you will learn.
                                </p>
                            </div>
                            <!--
                            <a class="btn btn-primary la-btn la-btn--primary text-uppercase la-about__mvt-cta la-anim__stagger-item--x" role="button" href="/login">Start Free Trial</a>
                            -->
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-7 my-md-auto">
                        <div class="la-about__mvt-rgt la-anim__wrap">
                            <img src="../images/learners/about/about-mission.svg" data-src="../images/learners/about/about-mission.svg" alt="Our Mission" class="lazy img-fluid d-block mx-auto la-anim__stagger-item--x" />
                        </div>
                    </div>
                </div>
                <!-- Our Mission: End -->

                <!-- Our Vision: Start -->
                <div class="row la-section la-about__btm-section">
                    <div class="col-md-7 col-lg-5">
                        <div class="la-about__mvt-lft la-anim__wrap">
                            <div class="la-about__mvt-tag la-anim__fade-in-top">Vision</div>
                            <h2 class="la-about__mvt-title la-anim__stagger-item">Future of self-learning</h2>
                            <div class="la-about__mvt-text">
                                <p class="la-about__mvt-desc  la-anim__stagger-item--x">
                                    Through our Radical team, we strive everyday to make knowledge Affordable, Accessible for all the individuals who have limited or no access to the Real knowledge.
                                </p>
                                <p class="la-about__mvt-desc  la-anim__stagger-item--x">
                                    From the ones who seek to express their creativity to the ones who are yet to explore their creativity, we want to build the most comprehensive platform for learning in the world.
                                </p>
                            </div>
                            <!--
                            <a class="btn btn-primary la-btn la-btn--primary text-uppercase la-about__mvt-cta  la-anim__stagger-item--x" role="button" href="/login">Start Free Trial</a>
                            -->
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-7 my-md-auto">
                        <div class="la-about__mvt-rgt la-anim__wrap">
                            <img src="../images/learners/about/about-vision.svg" data-src="../images/learners/about/about-vision.svg" alt="Our Vision" class="lazy img-fluid d-block mx-auto la-anim__stagger-item--x" />
                        </div>
                    </div>
                </div>
                <!-- Our Vision: End -->

                <!-- Our Way of Teaching: Start -->
                <div class="row la-section la-about__btm-section">
                    <div class="col-md-7 col-lg-5">
                        <div class="la-about__mvt-lft la-anim__wrap">
                            <div class="la-about__mvt-tag la-anim__fade-in-top">Alien's</div>
                            <h2 class="la-about__mvt-title la-anim__stagger-item">Way of teaching</h2>
                            <div class="la-about__mvt-text">
                                <p class="la-about__mvt-desc la-anim__stagger-item--x">
                                    We believe that real learning happens with consistency. With consistent observation, learning and practicing a particular skill repetitively makes you a Pro at it. 
                                </p>
                                <p class="la-about__mvt-desc  la-anim__stagger-item--x">
                                    While you learn with us, you don’t just learn a skill, you grow! You grow into a better version of you! Our classes are divided into a couple of short 5-10 minute videos for you. This makes it easy for you learn at your own pace without losing the track missing out on anything. 
                                </p>
                                <p class="la-about__mvt-desc  la-anim__stagger-item--x">
                                    With one hour of one class to learn one skill at a time, you learn it and become a Pro eventually.
                                </p>
                            </div>
                            <!--
                            <a class="btn btn-primary la-btn la-btn--primary text-uppercase la-about__mvt-cta  la-anim__stagger-item--x" role="button" href="/login">Start Free Trial</a>
                            -->
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-7 my-md-auto">
                        <div class="la-about__mvt-rgt la-anim__wrap">
                            <img src="../images/learners/about/about-teaching.svg" data-src="../images/learners/about/about-teaching.svg" alt="Our Way of Teaching" class="lazy img-fluid d-block mx-auto la-anim__stagger-item--x " />
                        </div>
                    </div>
                </div>
                <!-- Our Way of Teaching: End -->
            </div>
        </section>
    </div>
</section>
@endsection