@extends('learners.layouts.app')

@section('content')
<!-- Main Section: Start-->
<section class="la-cbg--main">
    <!-- Section: Start-->
    <section class="la-lp--page">
      <div class="container">
        <div class="row">
          <a class="la-icon--5xl icon-back-arrow d-block d-lg-none my-6 px-3" href="#"></a>
          <!-- Column: Start-->
          <div class="col-12 col-lg-6 my-sm-12 ">
            <div class="la-lp__title"><span class="text-2xl text-sm-3xl">The right plans</span>
              <h2 class="text-6xl">for all your interests.</h2>
              <p class="text-lg text-sm-xl">Whether you want to dabble with new art forms or hone your skills, we have got you covered!</p>
            </div>
          </div>
          <!-- Column: End-->
        </div>

        @php
            $plan1 = new stdClass;
            $plan1->plan = "Monthly";
            $plan1->discount = 20;
            $plan1->oldPrice = 35;
            $plan1->class= "red";
            $plan1->saving = 10;
            $plan1->slug = "monthly-plan";

            $plan2 = new stdClass;
            $plan2->plan = "Quarterly";
            $plan2->discount = 80;
            $plan2->oldPrice = 97;
            $plan2->class= "red";
            $plan2->saving = 25;
            $plan2->slug = "quarterly-plan";

            $plan3 = new stdClass;
            $plan3->plan = "Yearly";
            $plan3->discount = 120;
            $plan3->oldPrice = 180;
            $plan3->class= "green";
            $plan3->saving = 25;
            $plan3->slug = "yearly-plan";

            $plans = array($plan1, $plan2, $plan3)
        @endphp
        <div class="row la-lp__choose-main">
          <!-- Column: Start-->
          <div class="col-12">
            <div class="la-lp__choose-title text-center">
              <h1 class="head-font d-none d-sm-block">CHOOSE PLAN</h1>
              <h1 class="head-font d-block d-sm-none text-left px-5 m-0">CHOOSE<span class="text-left px-5 mx-5">PLAN</span></h1>
            </div>
          </div>
          <div class="col-12 px-0 px-lg-3">
            <div class="la-lp__choose-bg">
              <div class="d-none d-lg-block">
                <div class="row d-flex flex-row ">
                    <!-- Choose Plans: Start -->
                    @foreach ($plans as $plan)
                        <x-chooseplan :plan="$plan->plan" :discount="$plan->discount" :oldPrice="$plan->oldPrice" :class="$plan->class" :saving="$plan->saving" :slug="$plan->slug" />
                    @endforeach
                    <!-- Choose Plans: End -->
                </div>
              </div>

              <!-- Choose Plans Swiper Slide for Mobile Version: Start -->
              <div class="swiper-container h-100 la-choose__slider mt-4 d-block d-lg-none">
                <div class="swiper-wrapper la-choose__wrapper">
                  <div class="swiper-slide la-choose__slide">
                    <x-chooseplan :plan="$plan1->plan" :discount="$plan1->discount" :oldPrice="$plan1->oldPrice"  :class="$plan1->class" :saving="$plan1->saving" :slug="$plan1->slug" />                  
                  </div>
                  <div class="swiper-slide la-choose__slide">
                    <x-chooseplan :plan="$plan2->plan" :discount="$plan2->discount" :oldPrice="$plan2->oldPrice" :class="$plan2->class" :saving="$plan2->saving" :slug="$plan2->slug" />                                     
                  </div>
                  <div class="swiper-slide la-choose__slide">
                    <x-chooseplan :plan="$plan3->plan" :discount="$plan3->discount" :oldPrice="$plan3->oldPrice" :class="$plan3->class" :saving="$plan3->saving" :slug="$plan3->slug" />                                                       
                  </div>
                </div>
              </div>
              <div class="swiper-pagination swiper-pagination-custom la-choose__pagination d-block d-lg-none"></div>
              <!-- Choose Plans Swiper Slide for Mobile Version: End -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Course Benefits Section: Start-->
    <section class="la-lp--include">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="la-lp__benefits">
              <h3 class="mb-7 head-font text-2xl text-sm-4xl">All plans include</h3>
              <div class="la-cbenefits d-flex my-8">
                <div class="row">

                  <div class="col">
                    <div class="la-cbenefits__item bg-white d-flex flex-column align-items-center">
                      <div class="mb-7"><img class="img-fluid" src="./images/learners/course-benefits/video.svg"></div>
                      <h4 class="la-cbenefits__item-title mb-3">Unlimited Learning</h4>
                      <p class="la-cbenefits__item-desc m-0">One plan - All subscribed content</p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="la-cbenefits__item bg-white d-flex flex-column align-items-center">
                      <div class="mb-7"><img class="img-fluid" src="./images/learners/course-benefits/certificate.svg"></div>
                      <h4 class="la-cbenefits__item-title mb-3">Certification</h4>
                      <p class="la-cbenefits__item-desc m-0">Course completion certificate</p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="la-cbenefits__item  bg-white d-flex flex-column align-items-center">
                      <div class="mb-7"><img class="img-fluid" src="./images/learners/course-benefits/online-course.svg"></div>
                      <h4 class="la-cbenefits__item-title mb-3">Assignments &amp; QUiz</h4>
                      <p class="la-cbenefits__item-desc m-0">Test your progress</p>
                    </div>
                  </div>
                                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Course Benefits Section: End-->
    <!-- Section: Start-->
    <section class="la-bgcreator--ad-banner">
      <div class="container">
        <div class="row">
          <!-- Column: Start-->
          <div class="col-sm-12 px-0 px-sm-3">
            <div class="la-bgcreator__ad-content text-center text-white">
              <div class="py-2 px-5">
                <div class="text-2xl font-weight-light pb-5 mb-5">Start learning from the best mentors across the world!</div><a class="ad-btn la-btn la-btn-secondary text-white text-uppercase px-5" role="button" href="#">Get Started</a>
              </div>
            </div>
          </div>
          <!-- Column: End-->
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->
    <section class="la-lp--sub-faq">
      <div class="container">
        <div class="row d-flex justify-content-lg-between">
          <!-- Column: Start-->
          <div class="col-12 col-lg-5">
            <div class="la-lp__lft-content">
              <h4 class=" text-2xl text-sm-5xl head-font mb-3">How does <br>subscription works?</h4>
              <p class="text-md">
                Through our Radical team, we strive everyday to make knowledge Affordable, Accessible for all the individuals
                who have limited or no access to the Real knowledge.
              </p>
              <p class="text-md">
                So, you can subscribe to all the courses and classes.Or rent them to learn whenever you want.</p>
            </div>
          </div>
          <!-- Column: End-->
          <!-- Column: Start-->
          <div class="col-12 col-lg-6">
            <div class="la-lp__rgt-content" id="accordion">
              <h4 class="faq-title  text-2xl text-sm-4xl">FAQ's</h4>
              <div class="panel-group la-lp__faq-group" id="accFreeMain">
                <!-- Free Trial: Start-->
                <div class="panel panel-default la-lp__faq-panel mt-2">
                  <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqFree"><span class="panel-title la-lp__faq-title text-md mx-5"><a class="main-toggle collapsed" href="#faqFT" data-toggle="collapse" aria-expanded="true">FREE TRIAL</a></span></div>
                  <div class="panel-collapse collapse" id="faqFT" aria-labelledby="faqFree" data-parent="#accordion">
                    <div class="panel-group la-lp__sub-group my-2 mx-2 mx-sm-5" id="accFree">
                      <div class="panel panel-default la-lp__faq-panel mt-2">
                        <div class="panel-heading la-lp__faq-sub py-2" id="faqF"><span class="panel-title la-lp__faq-tag mx-3"><a class="accordion-toggle collapsed" href="#faqFa" data-toggle="collapse" aria-expanded="true">How much it cost?</a></span>
                          <div class="panel-collapse collapse" id="faqFa" aria-labelledby="faqF" data-parent="#accFree">
                            <div class="panel-body py-4 px-5">
                              <div class="panel-text">Something</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Free Trial: End-->
              </div>
              <div class="panel-group la-lp__faq-group" id="accSubMain">
                <!-- Subscription: Start-->
                <div class="panel panel-default la-lp__faq-panel mt-2" style="background:#fff;">
                  <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqSub"><span class="panel-title la-lp__faq-title mx-5"><a class="main-toggle collapsed" href="#faqSubs" data-toggle="collapse" aria-expanded="true">SUBSCRIPTION</a></span></div>
                  <div class="panel-collapse collapse show" id="faqSubs" aria-labelledby="faqSub" data-parent="#accordion">
                    <div class="panel-group la-lp__sub-group mx-2 mx-sm-5" id="accSub"> 
                      <div class="panel panel-default la-lp__faq-panel mt-2">
                        <div class="panel-heading la-lp__faq-sub py-2" id="faqS1"><span class="panel-title la-lp__faq-tag mx-3"><a class="accordion-toggle collapsed" href="#faqSa" data-toggle="collapse" aria-expanded="true">Lorem Ipsum dolor sit amet, consectur adispicing elit?</a></span>
                          <div class="panel-collapse collapse" id="faqSa" aria-labelledby="faqS1" data-parent="#accSub">
                            <div class="panel-body py-4 px-5">
                              <div class="panel-text">First Answer</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default la-lp__faq-panel mt-2">
                        <div class="panel-heading la-lp__faq-sub py-2" id="faqS2"><span class="panel-title la-lp__faq-tag mx-3"><a class="accordion-toggle collapsed" href="#faqSb" data-toggle="collapse" aria-expanded="true">Lorem Ipsum dolor sit amet, consectur </a></span>
                          <div class="panel-collapse collapse" id="faqSb" aria-labelledby="faqS2" data-parent="#accSub">
                            <div class="panel-body py-4 px-5">
                              <div class="panel-text">Second Answer</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default la-lp__faq-panel mt-2">
                        <div class="panel-heading la-lp__faq-sub py-2" id="faqS3"><span class="panel-title la-lp__faq-tag mx-3"><a class="accordion-toggle collapsed" href="#faqSc" data-toggle="collapse" aria-expanded="true">Lorem Ipsum dolor sit amet, consectur </a></span>
                          <div class="panel-collapse collapse" id="faqSc" aria-labelledby="faqS3" data-parent="#accSub">
                            <div class="panel-body py-4 px-5">
                              <div class="panel-text">Ut enim ad minim veniam, quis nosted excretion uliamo.</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default la-lp__faq-panel mt-2">
                        <div class="panel-heading la-lp__faq-sub py-2" id="faqS4"><span class="panel-title la-lp__faq-tag mx-3"><a class="accordion-toggle collapsed" href="#faqSd" data-toggle="collapse" aria-expanded="true">Lorem Ipsum dolor sit amet, consectur </a></span>
                          <div class="panel-collapse collapse" id="faqSd" aria-labelledby="faqS4" data-parent="#accSub">
                            <div class="panel-body py-4 px-5">
                              <div class="panel-text">Ut enim ad minim veniam, quis nosted excretion uliamo.</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default la-lp__faq-panel mt-2">
                        <div class="panel-heading la-lp__faq-sub py-2" id="faqS5"><span class="panel-title la-lp__faq-tag mx-3"><a class="accordion-toggle collapsed" href="#faqSe" data-toggle="collapse" aria-expanded="true">Lorem Ipsum dolor sit amet, consectur </a></span>
                          <div class="panel-collapse collapse" id="faqSe" aria-labelledby="faqS5" data-parent="#accSub">
                            <div class="panel-body py-4 px-5">
                              <div class="panel-text">Ut enim ad minim veniam, quis nosted excretion uliamo.</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default la-lp__faq-panel mt-2">
                        <div class="panel-heading la-lp__faq-sub py-2" id="faqS6"><span class="panel-title la-lp__faq-tag mx-3"><a class="accordion-toggle collapsed" href="#faqSf" data-toggle="collapse" aria-expanded="true">Lorem Ipsum dolor sit amet, consectur </a></span>
                          <div class="panel-collapse collapse" id="faqSf" aria-labelledby="faqS6" data-parent="#accSub">
                            <div class="panel-body py-4 px-5">
                              <div class="panel-text">Ut enim ad minim veniam, quis nosted excretion uliamo.</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Subscription: End-->
              </div>
              <div class="panel-group la-lp__faq-group" id="accSPMain">
                <!-- Single Purchase: Start-->
                <div class="panel panel-default la-lp__faq-panel mt-2" style="background:#fff;">
                  <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqSP"><span class="panel-title la-lp__faq-title mx-5"><a class="main-toggle collapsed" href="#faqSing" data-toggle="collapse" aria-expanded="true">SINGLE PURCHASE</a></span></div>
                  <div class="panel-collapse collapse" id="faqSing" aria-labelledby="faqSP"  data-parent="#accordion">
                    <div class="panel-group la-lp__sub-group mx-2 mx-sm-5" id="accSP"> 
                      <div class="panel panel-default la-lp__faq-panel mt-2">
                        <div class="panel-heading la-lp__faq-sub py-2" id="faqSP1"><span class="panel-title la-lp__faq-tag mx-3"><a class="accordion-toggle collapsed" href="#faqSPa" data-toggle="collapse" aria-expanded="true">How much it cost?</a></span>
                          <div class="panel-collapse collapse" id="faqSPa" aria-labelledby="faqSP1 " data-parent="#accSP">
                            <div class="panel-body py-4 px-5">
                              <div class="panel-text">Something</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single Purchase: End-->
              </div>
              <div class="panel-group la-lp__faq-group" id="accPPMain">
                <!-- Premium Purchase: Start-->
                <div class="panel panel-default la-lp__faq-panel mt-2" style="background:#fff;">
                  <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqPP"><span class="panel-title la-lp__faq-title mx-5"><a class="main-toggle collapsed" href="#faqPre" data-toggle="collapse" aria-expanded="true">PREMIUM PURCHASE</a></span></div>
                  <div class="panel-collapse collapse" id="faqPre" aria-labelledby="faqPP"  data-parent="#accordion">
                    <div class="panel-group la-lp__sub-group mx-2 mx-sm-5" id="accPP"> 
                      <div class="panel panel-default la-lp__faq-panel mt-2">
                        <div class="panel-heading la-lp__faq-sub py-2" id="faqPP1"><span class="panel-title la-lp__faq-tag mx-3"><a class="accordion-toggle collapsed" href="#faqPPa" data-toggle="collapse" aria-expanded="true">How much it cost?</a></span>
                          <div class="panel-collapse collapse" id="faqPPa" aria-labelledby="faqPP1 " data-parent="#accPP">
                            <div class="panel-body py-4 px-5">
                              <div class="panel-text">Something</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Premium Purchase: End -->
              </div>
              <div class="faq-see-all text-right pt-4"><a href="#">See all                             </a></div>
            </div>
          </div>
          <!-- Column: End-->
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->
    <section class="la-lp--testimonials">
      <div class="container pb-5">
        <div class="row d-flex justify-content-lg-between">
          <!-- Column: Start-->
          <div class="col-12 col-lg-4">
            <div class="la-lp__test-lft">
              <h4 class=" text-2xl text-sm-5xl head-font mb-3">What people say<br>about us?</h4>
              <p class="text-md body-font pr-5"> LILA has happy clients all over the world. And we're proud to share some of those experiences!</p>
            </div>
          </div>
          <!-- Column: End-->
          <!-- Column: Start-->
          <div class="col-12 col-lg-8 px-0 px-lg-3"> 
            <div class="la-lp__test-rgt">                  
              <div class="la-lp__test-cards d-flex justify-content-end">
                <div class="card la-lp__card-itm" id="testCard1">
                  <div class="la-card__top d-flex justify-content-between">
                    <div class="la-lp__profile d-flex justify-content-start"><img class="img-fluid d-block rounded-circle" src="https://picsum.photos/50/50" alt="Profile">
                      <div class="col">
                        <h5 class="la-lp__name head-font m-0 text-md text-sm-lg">Nathan Spark</h5><span class="la-lp__desg text-sm">Tattoo Artist</span>
                      </div>
                    </div>
                    <div class="la-lp__test-rating d-flex flex-row">
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__urtng"></div>
                    </div>
                  </div>
                  <p class="la-lp__test-review mt-5 body-font text-sm">
                    &#8220; Lorem Ipsum dolor sit amet, consectur sadipscing elit,sed diam nonumy elrmod tempor invidunt ut labore et 
                    dolore magna aliquaqm erat, sed diam voluptna.
                    At vero eos et accusam et justo duo dolories et ea rebum. &#8221;
                  </p>
                </div>
              </div>
              <div class="la-lp__test-cards d-flex justify-content-between">
                <div class="card la-lp__card-itm" id="testCard2">
                  <div class="la-card__top d-flex justify-content-between">
                    <div class="la-lp__profile d-flex justify-content-start"><img class="img-fluid d-block rounded-circle" src="https://picsum.photos/50/50" alt="Profile">
                      <div class="col">
                        <h5 class="la-lp__name head-font m-0 text-md text-sm-lg">Charolette</h5><span class="la-lp__desg text-sm">UI Designer</span>
                      </div>
                    </div>
                    <div class="la-lp__test-rating d-flex flex-row">
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__urtng"></div>
                    </div>
                  </div>
                  <p class="la-lp__test-review body-font mt-5 text-sm">
                    &#8220; Lorem Ipsum dolor sit amet, consectur sadipscing elit,sed diam nonumy elrmod tempor invidunt ut labore et 
                    dolore magna aliquaqm erat, sed diam voluptna. &#8221;
                  </p>
                </div>
                <div class="d-flex align-items-center">
                  <ul class="la-lp__card-list d-none d-sm-block">
                    <li> <a role="button" href="#testCard1"></a></li>
                    <li><a role="button" href="#testCard2"></a></li>
                    <li><a role="button" href="#testCard3"></a></li>
                  </ul>
                </div>
              </div>
              <div class="la-lp__test-cards d-flex justify-content-end">
                <div class="card la-lp__card-itm" id="testCard3">
                  <div class="la-card__top d-flex justify-content-between">
                    <div class="la-lp__profile d-flex justify-content-start"><img class="img-fluid d-block rounded-circle" src="https://picsum.photos/50/50" alt="Profile">
                      <div class="col">
                        <h5 class="la-lp__name head-font m-0 text-md text-sm-lg">Natalia</h5><span class="la-lp__desg text-sm">Photographer</span>
                      </div>
                    </div>
                    <div class="la-lp__test-rating d-flex flex-row">
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__rtng"></div>
                      <div class="la-icon--xl icon-star la-lp__urtng"></div>
                    </div>
                  </div>
                  <p class="la-lp__test-review body-font mt-5 text-sm">
                    &#8220; Lorem Ipsum dolor sit amet, consectur sadipscing elit,sed diam nonumy elrmod tempor invidunt ut labore et 
                    dolore magna aliquaqm erat, sed diam voluptna. &#8221;
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- Column: End                -->
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
@endsection