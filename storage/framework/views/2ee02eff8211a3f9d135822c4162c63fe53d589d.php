<?php $__env->startSection('content'); ?>
<!-- Main Section: Start-->
<section class="la-cbg--main la-lp__section">
    <!-- Section: Start-->
    <section class="la-lp--page">
      <div class="container la-anim__wrap">
        <div class="row ">
          <a class="la-icon--5xl icon-back-arrow d-block d-lg-none my-6 px-3" href="<?php echo e(URL::previous()); ?>"></a>
          <!-- Column: Start-->
          <div class="col-12 col-lg-6">
            <div class="la-lp__title la-anim__stagger-item"><span class="text-2xl text-md-3xl">The right plans</span>
              <h2 class="text-4xl text-md-6xl la-anim__stagger-item">for all your interests.</h2>
              <p class="text-lg text-sm-xl py-3 la-anim__stagger-item">Whether you want to dabble with new art forms or hone your skills, we have got you covered!</p>
            </div>
          </div>
          <!-- Column: End-->
        </div>

        <?php
            $plan1 = new stdClass;
            $plan1->plan = "Monthly";
            $plan1->discount = 39;
            $plan1->oldPrice = 49;
            $plan1->class= "red";
            $plan1->saving = 10;
            $plan1->slug = "monthly-plan";

            // $plan2 = new stdClass;
            // $plan2->plan = "Quarterly";
            // $plan2->discount = 80;
            // $plan2->oldPrice = 97;
            // $plan2->class= "red";
            // $plan2->saving = 25;
            // $plan2->slug = "quarterly-plan";

            $plan3 = new stdClass;
            $plan3->plan = "Yearly";
            $plan3->discount = 309;
            $plan3->oldPrice = 324;
            $plan3->class= "green";
            $plan3->saving = 25;
            $plan3->slug = "yearly-plan";

            $plans = array($plan1, $plan3);
        ?>
        <div class="row la-lp__choose-main">
          <!-- Column: Start-->
          <div class="col-12">
            <div class="la-lp__choose-title text-center">
              <h1 class="head-font d-none d-sm-block la-anim__fade-in-top la-anim__A">CHOOSE PLAN</h1>
              <h1 class="head-font d-block d-sm-none text-left px-5 m-0 la-anim__fade-in-top la-anim__A">CHOOSE<span class="text-left px-5 mx-5">PLAN</span></h1>
            </div>
          </div>
          <div class="col-12 px-0 px-lg-3">
            <div class="la-lp__choose-bg">
              <div class="d-none d-lg-block">
                <div class="row d-flex flex-row justify-content-center">
                    <!-- Choose Plans: Start -->
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if (isset($component)) { $__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Chooseplan::class, ['plan' => $plan->plan,'discount' => $plan->discount,'oldPrice' => $plan->oldPrice,'class' => $plan->class,'saving' => $plan->saving,'slug' => $plan->slug]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44)): ?>
<?php $component = $__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44; ?>
<?php unset($__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Choose Plans: End -->
                </div>
              </div>

              <!-- Choose Plans Swiper Slide for Mobile Version: Start -->
              <div class="swiper-container h-100 la-choose__slider mt-4 d-block d-lg-none">
                <div class="swiper-wrapper la-choose__wrapper la-anim__stagger-item">
                  <div class="swiper-slide la-choose__slide">
                     <?php if (isset($component)) { $__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Chooseplan::class, ['plan' => $plan1->plan,'discount' => $plan1->discount,'oldPrice' => $plan1->oldPrice,'class' => $plan1->class,'saving' => $plan1->saving,'slug' => $plan1->slug]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44)): ?>
<?php $component = $__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44; ?>
<?php unset($__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>                  
                  </div>
                  
                  <div class="swiper-slide la-choose__slide">
                     <?php if (isset($component)) { $__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Chooseplan::class, ['plan' => $plan3->plan,'discount' => $plan3->discount,'oldPrice' => $plan3->oldPrice,'class' => $plan3->class,'saving' => $plan3->saving,'slug' => $plan3->slug]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44)): ?>
<?php $component = $__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44; ?>
<?php unset($__componentOriginalc704f8bbb3c0f90bdc8efbfb2705c0274b993d44); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>                                                       
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
    <section class="la-lp--include la-section__small">
      <div class="container ">
        <div class="row">
          <div class="col">
            <div class="la-lp__benefits la-anim__wrap">
              <h3 class="mb-7 head-font text-md-4xl la-anim__fade-in-bottom">All plans include</h3>
             
              <div class="la-cbenefits d-flex my-8">
                <div class="row">
                  <div class="col-md-4">
                    <div class="la-cbenefits__item bg-white d-flex flex-column align-items-center la-anim__stagger-item--x">
                      <div class="mb-7 "><img class="img-fluid" src="./images/learners/course-benefits/video.svg"></div>
                      <h4 class="la-cbenefits__item-title mb-3">Unlimited Learning</h4>
                      <p class="la-cbenefits__item-desc text-center">Access to numerous courses of varied art skills</p>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="la-cbenefits__item bg-white d-flex flex-column align-items-center la-anim__stagger-item--x">
                      <div class="mb-7"><img class="img-fluid" src="./images/learners/course-benefits/certificate.svg"></div>
                      <h4 class="la-cbenefits__item-title mb-3">Certification</h4>
                      <p class="la-cbenefits__item-desc text-center">Certificates as proof of course completion</p>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="la-cbenefits__item  bg-white d-flex flex-column align-items-center la-anim__stagger-item--x">
                      <div class="mb-7"><img class="img-fluid" src="./images/learners/course-benefits/online-course.svg"></div>
                      <h4 class="la-cbenefits__item-title mb-3">Resources</h4>
                      <p class="la-cbenefits__item-desc text-center">Extra resources to practice and hone your skills</p>
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
      <div class="container ">
        <div class="row">
          <!-- Column: Start-->
          <div class="col-sm-12 px-0 px-sm-3 la-anim__wrap">
            <div class="la-bgcreator__ad-content text-center text-white la-anim__stagger-item">
              <div class="py-2 px-5 ">
                <div class="text-2xl font-weight-light pb-5 mb-5 la-anim__stagger-item">Learn real skills from real artists from around the world</div>
                <a class="la-btn la-btn-secondary text-white text-uppercase px-5 la-anim__stagger-item" role="button" href="#">Get Started</a>
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
      <div class="container la-anim__wrap">
        <div class="row d-flex justify-content-lg-between">
          <!-- Column: Start-->
          <div class="col-12 col-lg-5 la-anim__stagger-item">
            <div class="la-lp__lft-content">
              <h4 class="la-lp__lft-title text-4xl text-md-5xl head-font mb-3">Manual Payment <br/> Option</h4>
              <p class="la-lp__lft-desc">If you have trouble making payment through all the available options, you can choose to do the manual payment to get started with LILA.</p>
              <p class="la-lp__lft-desc">Please write to us at
                    <a class="la-lp__lft-link" href="mailto:lila@learnitlikealiens.com"> lila@learnitlikealiens.com</a>
              </p>

              <div class="pt-8">
                  <p  class="la-lp__lft-desc">Learn it like Aliens is not responsible or liable for any refunds for Membership, workshops, Webinars or other purchases on the Service. Please read the
                    <a class="la-lp__lft-link" href="/cancellations-refund">Cancellations & refunds</a> policy carefully.
                  </p>
              </div>
                
              <div class="pt-4">
                <a  class="la-lp__lft-link"  href="mailto:lila@learnitlikealiens.com" class="mt-4">Have more queries?</a>
              </div>
            </div>
          </div>
          <!-- Column: End-->

          <!-- Column: Start-->
          <div class="col-12 col-lg-6 px-3 la-anim__stagger-item">
            <div class="la-lp__rgt-content" id="accordion">
              <h4 class="faq-title  text-4xl">FAQ's</h4>
              <div class="panel-group la-lp__faq-group" id="accFreeMain">
                <!-- Free Trial: Start-->
                <!-- <div class="panel panel-default la-lp__faq-panel mt-2">
                  <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqFree"><span class="panel-title la-lp__faq-title text-md mx-5"><a class="main-toggle collapsed text-uppercase" href="#faqFT" data-toggle="collapse" aria-expanded="true">Payment</a></span></div>
                  <div class="panel-collapse collapse show" id="faqFT" aria-labelledby="faqFree" data-parent="#accordion"> -->
                    
                  <div class="panel-group la-lp__sub-group my-2 " id="accFree">

                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="panel panel-default la-lp__faq-panel mt-2">
                          <div class="panel-heading la-lp__faq-sub py-2" id="faqF"><span class="panel-title la-lp__faq-tag mx-3"><a class="accordion-toggle collapsed" href="#faqFa_<?php echo e($f->id); ?>" data-toggle="collapse" aria-expanded="true"><?php echo e($f->title); ?></a></span>
                            <div class="panel-collapse collapse" id="faqFa_<?php echo e($f->id); ?>" aria-labelledby="faqF" data-parent="#accFree">
                              <div class="panel-body py-4 px-5">
                                <div class="panel-text">
                                    <?php echo $f->details; ?>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  <!-- </div>
                </div> -->
                <!-- Free Trial: End-->
              </div>

              <!-- Subscription: Start-->
              <!--<div class="panel-group la-lp__faq-group" id="accSubMain">
                <div class="panel panel-default la-lp__faq-panel mt-2" style="background:#fff;">
                  <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqSub"><span class="panel-title la-lp__faq-title mx-5"><a class="main-toggle collapsed" href="#faqSubs" data-toggle="collapse" aria-expanded="true">SUBSCRIPTION</a></span></div>
                  <div class="panel-collapse collapse" id="faqSubs" aria-labelledby="faqSub" data-parent="#accordion">
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
              </div> -->
                <!-- Subscription: End-->


              <!-- Single Purchase: Start-->
              <!-- <div class="panel-group la-lp__faq-group" id="accSPMain">
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
              </div> -->
               <!-- Single Purchase: End-->

              <!-- Premium Purchase: Start-->
              <!--<div class="panel-group la-lp__faq-group" id="accPPMain">
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
              </div> -->
               <!-- Premium Purchase: End -->

              <!-- Premium Purchase: Start-->
              <!-- <div class="collapse" id="lp_faq_collapse">
                <div class="panel-group la-lp__faq-group" id="accPPMain2">  
                  <div class="panel panel-default la-lp__faq-panel mt-2" style="background:#fff;">
                    <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqPP2">
                      <span class="panel-title la-lp__faq-title mx-5">
                        <a class="main-toggle collapsed" href="#faqPre2" data-toggle="collapse" aria-expanded="true">PURCHASE</a>
                      </span>
                    </div>
                    <div class="panel-collapse collapse" id="faqPre2" aria-labelledby="faqPP2"  data-parent="#accPPMain2">
                      <div class="panel-group la-lp__sub-group mx-2 mx-sm-5" id="accPP2"> 
                        <div class="panel panel-default la-lp__faq-panel mt-2">
                          <div class="panel-heading la-lp__faq-sub py-2" id="faqPP12"><span class="panel-title la-lp__faq-tag mx-3">
                            <a class="accordion-toggle collapsed" href="#faqPPa2" data-toggle="collapse" aria-expanded="true">How much it cost?</a></span>
                            <div class="panel-collapse collapse" id="faqPPa2" aria-labelledby="faqPP12" data-parent="#accPP2">
                              <div class="panel-body py-4 px-5">
                                <div class="panel-text">Something</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
               <!-- Premium Purchase: End -->

              <!-- <div class="faq-see-all text-right pt-4">
                <a class="collapsed" role="button" data-toggle="collapse" href="#lp_faq_collapse"></a>
              </div> -->
            </div>
          </div>
          <!-- Column: End-->
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->
    <section class="la-lp--testimonials">
      <div class="container pb-5 la-anim__wrap">
        <div class="row d-flex justify-content-lg-between">
          <!-- Column: Start-->
          <div class="col-12 col-lg-4">
            <div class="la-lp__test-lft la-anim__stagger-item--x">
              <h4 class=" text-4xl text-md-5xl head-font mb-3">What people say<br>about us?</h4>
              <p class="text-md body-font pr-md-5"> LILA has happy clients all over the world. And we're proud to share some of those experiences!</p>
            </div>
          </div>
          <!-- Column: End-->
          <!-- Column: Start-->
          <div class="col-12 col-lg-8 px-0 px-lg-3"> 
            <div class="la-lp__test-rgt ">      
                <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
                    <div class="la-lp__test-cards d-flex <?php if($loop->index == 1): ?> justify-content <?php else: ?> justify-content-end <?php endif; ?> la-anim__stagger-item--x" id="testCard_<?php echo e($loop->index); ?>">
                      <div class="card la-lp__card-itm" >
                        <div class="la-card__top d-flex justify-content-between">
                          <div class="la-lp__profile d-flex justify-content-start">
                            <img class="img-fluid d-block rounded-circle" src="<?php echo e(asset('images/testimonial/'.$test->image)); ?>" alt="<?php echo e($test->client_name); ?>">
                            <div class="col">
                              <h5 class="la-lp__name head-font m-0 text-md text-sm-lg"><?php echo e($test->client_name); ?></h5>
                              <span class="la-lp__desg text-sm"></span>
                            </div>
                          </div>
                          <div class="la-lp__test-rating d-flex flex-row">
                              <?php if($test->rating == 5): ?>

                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>

                              <?php elseif($test->rating >= 4): ?>

                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                              <?php elseif($test->rating >= 3): ?>

                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                              <?php elseif($test->rating >= 2): ?>

                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                              <?php elseif($test->rating >= 1): ?>

                                  <div class="la-icon--lg icon-star la-rtng__fill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                              <?php else: ?>

                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                                  <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                              <?php endif; ?>
                          </div>
                        </div>
                        <p class="la-lp__test-review mt-5 body-font text-sm"><?php echo $test->details; ?>

                        </p>
                      </div>

                        <?php if($loop->index == 1): ?>
                            <div class="d-flex align-items-center justify-content-end">
                              <ul class="la-lp__card-list d-none d-sm-block">
                                <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li> <a role="button" href="#testCard_<?php echo e($loop->index); ?>"></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
            </div>
          </div>
          <!-- Column: End                -->
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/learning-plans.blade.php ENDPATH**/ ?>