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
            <div class=" la-anim__stagger-item">
              <h6 class="la-lp__tag text-3xl">The right plans</h6>
              <h2 class="la-lp__title text-4xl text-md-6xl la-anim__stagger-item">for all your interests</h2>
              <p class="la-lp__title-para text-lg text-sm-xl py-3 la-anim__stagger-item">Whether you want to dabble with new art forms or hone your skills, we have got you covered!</p>
            </div>
          </div>
          <!-- Column: End-->
        </div>

        <div class="row la-lp__choose-main">
          <!-- Column: Start-->
          <div class="col-12">
            <div class="text-center">
              <h1 class="la-lp__choose-title head-font la-anim__fade-in-top la-anim__A">CHOOSE PLAN</h1>
              <!-- <h1 class="head-font d-block d-sm-none text-left px-5 m-0 la-anim__fade-in-top la-anim__A">CHOOSE<span class="text-left px-5 mx-5">PLAN</span></h1> -->
            </div>
          </div>
          <div class="col-12 px-0 px-lg-3">
            <div class="la-lp__choose-bg">
              <div class="d-block">
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
              <h3 class="la-lp__benefits-title mb-5 mb-md-8 head-font text-center text-md-left text-md-4xl la-anim__fade-in-bottom">All plans include</h3>
             
              <div class="la-cbenefits d-flex my-1 my-md-8">
                <div class="row">
                  <div class="col-md-6 col-lg-4 la-cbenefits__item-col">
                    <div class="la-cbenefits__item bg-white d-flex flex-column align-items-center la-anim__stagger-item--x">
                      <div class="mb-7 "><img class="img-fluid" src="./images/learners/course-benefits/video.svg"></div>
                      <h4 class="la-cbenefits__item-title mb-3">Unlimited Learning</h4>
                      <p class="la-cbenefits__item-desc text-center">Access to numerous courses of varied art skills</p>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4  la-cbenefits__item-col">
                    <div class="la-cbenefits__item bg-white d-flex flex-column align-items-center la-anim__stagger-item--x">
                      <div class="mb-7"><img class="img-fluid" src="./images/learners/course-benefits/certificate.svg"></div>
                      <h4 class="la-cbenefits__item-title mb-3">Certification</h4>
                      <p class="la-cbenefits__item-desc text-center">Certificates as proof of course completion</p>
                    </div>
                  </div>

                  <div class="col-md-12 col-lg-4  la-cbenefits__item-col">
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
      <div class="container-fluid px-0">
        <div class="row  la-anim__wrap">
          <!-- Column: Start-->
          <div class="col-12 la-anim__stagger-item">
            <div class="la-bgcreator__ad-content text-center text-white" style="background:url('../images/learners/creator/plans-cta.jpg') no-repeat top rgba(0, 0, 0, 0.68); background-size:cover;">
              <div class="py-2 px-5 ">
                <div class="la-bgcreator__ad-para pb-8 mb-6 la-anim__stagger-item">Learn real skills from real artists from around the world</div>
                <a class="la-btn la-btn-secondary text-white text-uppercase px-5 la-anim__stagger-item" role="button" href="/browse/courses">Get Started</a>
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
          <div class="col-12 col-md-6 col-lg-5 la-anim__stagger-item">
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
          <div class="col-12 col-md-6 col-lg-6 px-3 la-anim__stagger-item">
            <div class="la-lp__rgt-content" id="accordion">
              <h4 class="faq-title  text-4xl">FAQ's</h4>
                <!-- Free Trial: Start-->

                <div class="panel-group la-lp__faq-group" id="accFree">
                  <div class="panel panel-default la-lp__faq-panel mt-2" style="background:#fff;">
                    <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqFree">
                      <div class="panel-title la-lp__faq-title ">
                        <a class="main-toggle text-uppercase collapsed" href="#faqFreePre" data-toggle="collapse" aria-expanded="true">Free Trial</a>
                      </div>
                    </div>
                    <div class="panel-collapse collapse" id="faqFreePre" aria-labelledby="faqFree"  data-parent="#accordion">
                      <div class="panel-group la-lp__sub-group mx-2"> 
            
                          <?php $__currentLoopData = $faqs->where('type','%','free_trial'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="panel panel-default la-lp__faq-panel">
                            <div class="panel-heading la-lp__faq-sub py-2">
                              <div class="panel-title la-lp__faq-tag px-2">
                                <a class="accordion-toggle main-toggle collapsed" href="#faqFT_<?php echo e($f->id); ?>" data-toggle="collapse" aria-expanded="true"><?php echo e($f->title); ?></a>
                              </div>
                            </div>
                            <div class="panel-collapse collapse" id="faqFT_<?php echo e($f->id); ?>" aria-labelledby="faqFT_<?php echo e($f->id); ?>" data-parent="#accFree">
                              <div class="panel-body pt-2 px-2">
                                <div class="panel-text"><?php echo $f->details; ?></div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </div>
                    </div>
                  </div>
                </div>

                <!-- Free Trial: End-->
       

              <!-- Subscription: Start-->
            <div class="panel-group la-lp__faq-group" id="accSubMain">
                <div class="panel panel-default la-lp__faq-panel mt-2" style="background:#fff;">
                  <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqSub"><span class="panel-title la-lp__faq-title"><a class="main-toggle text-uppercase collapsed" href="#faqSubs" data-toggle="collapse" aria-expanded="true">SUBSCRIPTION</a></span></div>
                  <div class="panel-collapse collapse show" id="faqSubs" aria-labelledby="faqSub" data-parent="#accordion">
                    <div class="panel-group la-lp__sub-group mx-2"> 

                      <?php $__currentLoopData = $faqs->where('type','%','subscription'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="panel panel-default la-lp__faq-panel">
                          <div class="panel-heading la-lp__faq-sub py-2">
                            <div class="panel-title la-lp__faq-tag px-2">
                              <a class="accordion-toggle main-toggle collapsed" href="#faqSa_<?php echo e($f->id); ?>" data-toggle="collapse" aria-expanded="true"><?php echo e($f->title); ?></a>
                            </div>
                          </div>
                          <div class="panel-collapse collapse" id="faqSa_<?php echo e($f->id); ?>" aria-labelledby="faqSa_<?php echo e($f->id); ?>" data-parent="#accSubMain">
                            <div class="panel-body pt-2 px-2">
                              <div class="panel-text"><?php echo $f->details; ?></div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                  </div>
                </div> 
              </div> 
                <!-- Subscription: End-->


              <!-- Single Purchase: Start-->
              <div class="panel-group la-lp__faq-group" id="accSPMain">
                <div class="panel panel-default la-lp__faq-panel mt-2" style="background:#fff;">
                  <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqSP"><span class="panel-title la-lp__faq-title"><a class="main-toggle text-uppercase collapsed" href="#faqSing" data-toggle="collapse" aria-expanded="true">SINGLE PURCHASE</a></span></div>
                  <div class="panel-collapse collapse" id="faqSing" aria-labelledby="faqSP"  data-parent="#accordion">
                    <div class="panel-group la-lp__sub-group mx-2"> 

                      <?php $__currentLoopData = $faqs->where('type','%','single_course'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="panel panel-default la-lp__faq-panel ">
                        <div class="panel-heading la-lp__faq-sub py-2">
                          <div class="panel-title la-lp__faq-tag px-2">
                            <a class="accordion-toggle main-toggle collapsed" href="#faqSPa_<?php echo e($f->id); ?>" data-toggle="collapse" aria-expanded="true"><?php echo e($f->title); ?></a>
                          </div>
                        </div>
                        <div class="panel-collapse collapse" id="faqSPa_<?php echo e($f->id); ?>" aria-labelledby="faqSPa_<?php echo e($f->id); ?>" data-parent="#accSPMain">
                          <div class="panel-body pt-2 px-2">
                            <div class="panel-text"><?php echo $f->details; ?></div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                  </div>
                </div> 
              </div>
               <!-- Single Purchase: End-->

              <!-- Payment Methods: Start-->
              <div class="panel-group la-lp__faq-group" id="accPPMain">
                <div class="panel panel-default la-lp__faq-panel mt-2" style="background:#fff;">
                  <div class="panel-heading la-lp__faq-main py-2 px-3" id="faqPP"><span class="panel-title la-lp__faq-title"><a class="main-toggle text-uppercase collapsed" href="#faqPre" data-toggle="collapse" aria-expanded="true">Payment Methods</a></span></div>
                  <div class="panel-collapse collapse" id="faqPre" aria-labelledby="faqPP"  data-parent="#accordion">
                    <div class="panel-group la-lp__sub-group mx-2"> 
        
                        <?php $__currentLoopData = $faqs->where('type','%','payment_methods'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="panel panel-default la-lp__faq-panel">
                          <div class="panel-heading la-lp__faq-sub py-2">
                            <div class="panel-title la-lp__faq-tag px-2">
                              <a class="accordion-toggle main-toggle collapsed" href="#faqPPa_<?php echo e($f->id); ?>" data-toggle="collapse" aria-expanded="true"><?php echo e($f->title); ?></a>
                            </div>
                          </div>
                          <div class="panel-collapse collapse" id="faqPPa_<?php echo e($f->id); ?>" aria-labelledby="faqPPa_<?php echo e($f->id); ?>" data-parent="#accPPMain">
                            <div class="panel-body pt-2 px-2">
                              <div class="panel-text"><?php echo $f->details; ?></div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                  </div>
                </div>
              </div>
               <!-- Payment Methods: End -->

              <!-- Premium Purchase: Start-->
              
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
          <div class="col-12 col-sm-8 col-lg-4">
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
                        <div class="la-card__top d-md-flex justify-content-between ">
                          <div class="la-lp__profile d-flex justify-content-start align-items-center">
                            <img class="img-fluid d-block rounded-circle" src="<?php echo e(asset('images/testimonial/'.$test->image)); ?>" alt="<?php echo e($test->client_name); ?>">
                            <div class="col">
                              <h5 class="la-lp__name head-font m-0 text-md text-md-lg"><?php echo e($test->client_name); ?></h5>
                              <span class="la-lp__desg text-sm">Learner</span>
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
                        <div class="la-lp__test-review  body-font text-sm"><?php echo $test->details; ?></div>
                      </div>

                        <?php if($loop->index == 1): ?>
                            <div class="d-flex align-items-center justify-content-end ml-auto">
                              <ul class="la-lp__card-list d-none d-md-block">
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

<?php $__env->startSection('footerScripts'); ?>
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    var stripe = Stripe('<?php echo e(config("services.stripe.key")); ?>');
    $(document).ready(function() {
      $( ".plan-subscribe" ).click(function( ) {
          $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: "/subscription-checkout",
            data: {slug: $(this).attr('data-plan')},
            success:function(session){
              if(session.redirect)
                window.location.href = '/manage-billing';
              else
                stripe.redirectToCheckout({ sessionId: session.id });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {              
              if(XMLHttpRequest.status == 401)
                window.location.href = '/login';
            }
          });
      } );
  });


  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/learning-plans.blade.php ENDPATH**/ ?>