<?php $__env->startSection('seo_content'); ?>
    <title>Learn Anything Artistic Online | Start For Free Today | LILA</title>
    <meta name='description' itemprop='description' content='Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now' />

    <meta property="og:description"content="Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now" />
    <meta property="og:title"content="Learn Anything Artistic Online | Start For Free Today | LILA" />
    <meta property="og:url"content="<?php echo e(Request::url()); ?>" />
    <meta property="og:type"content="website" />
    <meta property="og:site_name"content="LILA Art" />
    <meta property="og:image"content="/images/learners/logo.svg" />
    <meta property="og:image:url"content="/images/learners/logo.svg" />
    <meta property="og:image:size"content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Learn Anything Artistic Online | Start For Free Today | LILA" />
    <meta name="twitter:site"content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Learn Anything Artistic Online | Start For Free Today | LILA"}</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
  <div class="la-btn__alert position-relative">
    <div class="la-btn__alert-success col-lg-4 offset-lg-4  alert alert-success alert-dismissible fade show" role="alert">
        <span class="la-btn__alert-msg"><?php echo e(session('success')); ?></span>
        <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:#56188C">&times;</span>
        </button>
    </div>
  </div>
<?php endif; ?>


<!-- Section: Start-->
<section class="la-section la-section--hero clearfix p-0 position-relative">
    <div class="la-section__inner">
      <div class="jumbotron jumbotron-fluid p-0 m-0">
        <div class="la-hero__top row la-anim__wrap">
          <!-- Column: Start-->
          <div class="col-12 position-relative my-auto">
            <?php if($firstSection->video_url == null): ?>

            <div class="la-hero__img position-relative d-flex align-items-center la-anim__fade-in-right">
              <h2 class="la-section__title la-section__title--big">
                <span class="la-anim__text-move--content"><?php echo e($firstSection->image_text); ?></span>
              </h2>
              <img class="img-fluid la-hero__img-bg" src="<?php echo e($firstSection->image); ?>" alt="<?php echo e($firstSection->image_text); ?>">
            </div> 

            <?php else: ?>

            <!-- Video Section: Start -->
            <div class="la-hero__video-main position-relative la-anim__stagger-item--x">
              <div class="la-hero__video">
                <video autoplay='' playsinline muted='muted' loop='loop' id="home_video">
                  <source src='<?php echo e($firstSection->video_url); ?>'  type='video/mp4' />
                </video>
              </div>
            </div>
            <!-- Video Section: End -->

            <?php endif; ?>

            <!-- Video Content Section: Start -->
            <div class="container-fluid la-hero la-hero__video-content d-flex justify-content-center flex-column align-items-center">
              <div class="la-hero__video-info text-center text-md-left">
                <p class="la-hero__tag mb-2 mb-md-0 la-anim__stagger-item">COURSES & CLASSES BY</p>
                <h1 class="la-hero__title la-anim__stagger-item mb-5">World’s finest <span class="la-hero__subtitle">Creators</span></h1>
                <p class="la-hero__lead la-anim__stagger-item"><?php echo e($firstSection->sub_heading); ?></p>
              
                <div class="d-md-flex align-items-center">
                  <div class="la-hero__actions la-anim__stagger-item mt-10">
                    <?php if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active()): ?>
                    <div class="">
                      <a href="/browse/courses" class="btn btn-primary la-hero__cta la-btn la-btn--primary active text-white">Start Learning</a>
                    </div>

                    <?php else: ?>
                    <div class="">
                        <a href="/learning-plans" class="btn btn-primary la-hero__cta la-btn la-btn--primary active text-white">
                          Subscribe for
                          <span class="la-soffer__bestprice la-home__bestprice" style="color:var(--white)"> 
                            <?php if(getLocation() == 'IN'): ?>
                              <sup>₹</sup>2899/Month
                            <?php else: ?>
                              <sup>$</sup>39/<span class="text-xxs">Month</span>
                            <?php endif; ?>
                        </span>
                        </a>
                    </div>
                    
                    <div class="la-soffer mt-2 d-inline-flex justify-content-center flex-column align-items-md-center">
                        

                        <?php if(getLocation() == 'IN'): ?>
                          <div class="la-soffer__realprice la-home__realprice text-sm" style="color:var(--white)"> <sup>₹</sup> 5999 (INR)</div>
                        <?php else: ?>
                          <div class="la-soffer__realprice la-home__realprice text-sm" style="color:var(--white)"> <sup>$</sup> 99 (USD)</div>
                        <?php endif; ?>
                    </div>
                  <?php endif; ?>
                  </div>
                
                  <div class="la-hero__bottom-trial mt-8 mt-md-2 ml-md-6 la-anim__stagger-item "><?php if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active()): ?>  <?php else: ?><a href="/learning-plans" class="btn btn-primary la-btn la-btn--primary bg-transparent text-white">Start free trial</a> <?php endif; ?> </div>
                </div>
              </div>
               
              <div class="la-hero__btn--scroll-down la-anim__stagger-item">
                <div class="la-hero__bottom-browse la-btn__arrow la-btn__arrow-down text-white text-uppercase text--md font-weight--medium text-spacing d-none d-lg-block">
                  <a href="#home_courses">BROWSE COURSES
                    <span class="la-btn__arrow-icon arrow-down la-icon la-icon--7xl icon-grey-arrow"> </span>
                  </a>
                </div>
              </div>
            </div>
             <!-- Video Content Section: End -->
          </div>
          <!-- Column: End -->
        </div>

          <!-- Column: Start-->
         
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section  la-section--grey la-section--art-categories position-relative"  id="home_courses">
    <div class="la-section__inner la-anim__wrap la-section--courses-inwrap" >
      <div class="container-fluid position-relative px-0">
        <div class="la-courses">
          <h3 class="la-home__course-mtitle text-center la-anim__stagger-item">Learn what you love!</h3>

          <nav class="la-courses__nav d-inline-flex justify-content-start justify-content-md-center position-relative">
              <ul class="nav nav-pills la-courses__nav-tabs mb-4 justify-content-center" id="nav-tab" role="tablist" tabindex="0">
              
                <?php if(!$filtres_applied): ?>
                  
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- <div class="d-none d-md-block la-courses__nav-prev la-anim__fade-in-left"><span class="la-courses__nav-prev--icon la-icon icon-arrow"></span></div> -->
                    <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link <?php if($loop->first): ?> active <?php endif; ?> " id="nav-<?php echo e($category->slug); ?>-tab" data-toggle="tab" href="#nav-<?php echo e($category->slug); ?>" role="tab" aria-controls="nav-<?php echo e($category->slug); ?>" aria-selected="true"> <span class="position-relative text-nowrap"><?php echo e($category->title); ?></span></a></li>
                    <!-- <div class="d-none d-md-block  la-courses__nav-next la-anim__fade-in-right"><span class="la-courses__nav-next--icon la-icon icon-right-arrow2"></span></div> -->
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
              </ul>
          </nav>
          <!-- <nav class="la-courses__nav position-relative d-flex justify-content-between align-items-start">
            
              <ul class="nav nav-pills la-courses__nav-tabs" id="nav-tab" role="tablist" tabindex="0">
              
              <?php if($filtres_applied == null): ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="nav-item la-courses__nav-item la-anim__stagger-item--x">
                    <a class="nav-link la-courses__nav-link <?php if($loop->first): ?> active <?php endif; ?> " id="nav-<?php echo e($category->slug); ?>-tab" data-toggle="tab" href="#nav-<?php echo e($category->slug); ?>" role="tab" aria-controls="nav-<?php echo e($category->slug); ?>" aria-selected="true"> 
                      <span class="position-relative text-nowrap"><?php echo e($category->title); ?></span>
                    </a>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php endif; ?>

                
              </ul>
          </nav> -->

          <nav class="la-courses__nav">
               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.add-to-playlist','data' => ['playlists' => $playlists]]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['playlists' => $playlists]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                
                 <?php if(!$filtres_applied): ?>
                  <div class="tab-content la-courses__content la-anim__wrap" id="nav-tabContent">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="position-relative tab-pane fade show <?php if($loop->first): ?> active <?php endif; ?>" id="nav-<?php echo e($category->slug); ?>" role="tabpanel" aria-labelledby="nav-<?php echo e($category->slug); ?>-tab">
                        <div class="swiper-container la-home__course-container">
                          <div class="swiper-wrapper la-home__course-wrapper py-md-10">
                                                                                          
                                    <?php
                                      $courses = $category->courses;
                                      if($sort_type == 'highest_rated')
                                      {
                                        $courses = $courses->sortByDesc('average_rating');
                                      }                
                                    ?>

                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($course->featured == 0): ?>
                                          <?php continue; ?>
                                      <?php endif; ?>
                                      <div class="swiper-slide col-md-6 col-lg-4 px-0 la-home__course-slide la-anim__stagger-item">
                                       <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => $course->review->avg('rating'),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fname,'creatorUrl' => $course->user->id,'learnerCount' => $course->learnerCount,'price' => $course->price,'bought' => $course->isPurchased()]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706)): ?>
<?php $component = $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706; ?>
<?php unset($__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                  
                                  
                          </div>
                          <div class=" w-100 d-flex justify-content-between align-items-center">
                            <div class="la-slider__navigations la-home__course-navigations d-flex align-items-center">
                              <div class="swiper-button-prev la-slider__navigations-arrow la-home__course-prev"></div>
                              <div class="swiper-pagination la-slider__navigations-dots la-home__course-paginations la-slider__paginations la-slider__paginations--purble la-right"></div>
                              <div class="swiper-button-next la-slider__navigations-arrow la-home__course-next"></div>
                            </div>
                            <div class="la-mccourse__view-more position-relative text-right la-anim__wrap pb-2">
                              <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold mr-8 mr-md-7 la-anim__fade-in-right la-anim--B">
                                <a href="/browse/courses" >explore more <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                              </div>
                            </div>
                          </div>    
                        </div>
              
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                        
                      <?php else: ?>
                            <?php
                            if($sort_type == 'highest_rated')
                            {
                              $courses = $courses->sortByDesc('average_rating');
                            }                
                            ?>
                            <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item la-anim__C">
                              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => $course->review->avg('rating'),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fname,'creatorUrl' => $course->user->id,'learnerCount' => $course->learnerCount,'price' => $course->price,'bought' => $course->isPurchased()]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706)): ?>
<?php $component = $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706; ?>
<?php unset($__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>

                              <?php if(count($courses) == 0): ?>
                                <div class="col-12 la-empty__courses d-md-flex justify-content-between align-items-start la-anim__wrap">
                                    <div class="la-empty__inner">
                                        <h6 class="la-empty__course-title la-anim__stagger-item">No Courses Found.</h6>
                                    </div>
                                    <div class="la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
                                        <a href="<?php echo e(Url('/browse/courses')); ?>" class="la-empty__browse">
                                            Browse Courses
                                            <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow"></span>
                                        </a>
                                    </div>
                                </div>
                              <?php endif; ?>
                      <?php endif; ?>
            </nav>
          </div>

          
        </div>
      </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section--artists position-relative la-anim__wrap">
    <div class="la-section__inner position-relative">
      <span class="la-section__circle"></span>
      <div class="swiper-container gallery-top la-artist__slider container-fluid">
        
        <div class="swiper-wrapper">
          <div class="la-artist__designation la-artist__designation--front position-absolute w-50 pt-10 my-auto d-flex align-items-center justify-content-left la-anim__fade-in-top la-anim__A">
              <h2 class="mb-0 la-section__title la-section__title--big d-flex flex-row justify-content-center align-items-center">
                  <span class="mb-0 la-section__title la-section__title--big d-flex flex-row justify-content-center align-items-center">Lila</span> 
              </h2>
          </div>

          <div class="la-artist__designation position-absolute w-100 pt-10 my-auto d-flex align-items-center justify-content-center la-anim__fade-in-top la-anim__A">
              <h2 class="mb-0 la-section__title la-section__title--big d-flex flex-row justify-content-center align-items-center">
                  <span class="ml-6" style="color: var(--gray);"> Mentors </span>
              </h2>
          </div>
            <?php $__currentLoopData = $featuredMentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if (isset($component)) { $__componentOriginal1d276d7bedbc2354be5995b653f6c253af81623d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Artist::class, ['artistName' => ucfirst($feat->user->fullName),'artistImage' => $feat->user_image,'artistCategory' => $feat->courses->category->title,'artistCampany' => $feat->courses->title,'course' => $feat->courses,'artistId' => $feat->user->id]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal1d276d7bedbc2354be5995b653f6c253af81623d)): ?>
<?php $component = $__componentOriginal1d276d7bedbc2354be5995b653f6c253af81623d; ?>
<?php unset($__componentOriginal1d276d7bedbc2354be5995b653f6c253af81623d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      <div class="swiper-container gallery-thumbs la-artist__thumbnails-wrap la-anim__fade-in-right">
        <div class="swiper-wrapper la-artist__thumbnails">

          <?php $__currentLoopData = $featuredMentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide la-artist__thumbnail"><img src="<?php echo e($feat->user_thumbnail); ?>" alt=""></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </div>
      </div>

    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section  la-section--classes  position-relative la-anim__wrap">
    <div class="la-section__inner">
      <div class="container-fluid">
        <div class="la-anim__fade-in-top la-anim__A">
          <h2 class="la-section--classes-title text-center la-section__title la-section__title--big  position-relative ">Master <span>classes</span></h2>
        </div> 

        <div class="la-mccourses pt-20 pt-md-6">
            <div class="swiper-container la-home__master-container">
              <div class="swiper-wrapper la-home__master-wrapper">

                <?php $__currentLoopData = $master_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($master->courses != null): ?>
                    <div class="swiper-slide col-12 col-md-3 px-0 la-home__master-slide">
                       <?php if (isset($component)) { $__componentOriginal569f4b3c3d50580306a5cb083576611189fd5fee = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MasterClass::class, ['img' => $master->courses->preview_image,'title' => $master->courses->title,'profileImg' => $master->courses->user->user_img,'profileName' => $master->courses->user->fullName,'learners' => $master->courses->learnerCount,'id' => $master->courses->id,'slug' => $master->courses->slug]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['url' => $master->courses->slug]); ?>
<?php if (isset($__componentOriginal569f4b3c3d50580306a5cb083576611189fd5fee)): ?>
<?php $component = $__componentOriginal569f4b3c3d50580306a5cb083576611189fd5fee; ?>
<?php unset($__componentOriginal569f4b3c3d50580306a5cb083576611189fd5fee); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    </div>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
            <div class=" w-100 d-flex justify-content-between align-items-center mt-6 mt-md-12">
              <div class="la-slider__navigations la-home__course-navigations d-flex align-items-center">
                <div class="swiper-button-prev la-slider__navigations-arrow la-home__master-prev"></div>
                <div class="swiper-pagination la-slider__navigations-dots la-home__master-pagination la-slider__paginations la-slider__paginations--purble la-right"></div>
                <div class="swiper-button-next la-slider__navigations-arrow la-home__master-next"></div>
              </div>
              <div class="la-mccourse__view-more position-relative text-right la-anim__stagger-item">
                <div class=" la-btn__arrow text-white text-uppercase text-spacing font-weight--bold mr-5 mr-md-1 la-anim__fade-in-right">
                  <a href="/master-classes" >explore more <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                </div>
              </div>
            </div>

            <!-- <div class="swiper-pagination la-home__master-pagination"></div>
            <div class="swiper-button-next la-home__master-next"></div>
            <div class="swiper-button-prev la-home__master-prev"></div> -->
        </div>

      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start -->
  <div class="la-section  la-home__section-customize la-section--dark position-relative la-anim__wrap">
    <div class="la-section__inner position-relative">
      <span class="la-section__circle la-section__circle--right la-section__circle-learn d-none d-md-block"></span>
        <div class="container-fluid la-home__customize-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="la-home__customize">
                        <h3 class="la-home__customize-title leading-none mb-4 la-anim__stagger-item">Customized Learning with you in mind!</h3>
                        <p class="la-home__customize-para la-anim__stagger-item">A learning platform just for you. An approach that aims to customize learning for each student's strengths, needs, skills, and interests.</p>
                        
                        <div class=" la-btn__arrow text-white text-uppercase text-spacing font-weight--bold pt-md-8 mr-5 mr-md-1 la-anim__stagger-item--x">
                          <a href="" >explore more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                  <div class="la-home__customize-right">
                    <div class="swiper-container la-home__customize-container">
                        <div class="swiper-wrapper la-home__customize-wrapper">
                            <div class="swiper-slide la-home__customize-slide col-md-7 px-0 la-anim__stagger-item">
                                <div class="la-home__customize-info">
                                    <img src="../images/learners/home/mockup1.jpg" alt="Personalised dashboard" class="img-fluid mx-auto d-block la-home__customize-img">
                                    <div class="la-home__customize-infotitle leading-tight mt-8">Personalised dashboard for focused learning</div>
                                    <p class="la-home__customize-infopara">Courses based on your interests, favourite creators, on one easy learning platform</p>
                                </div>
                            </div>

                            <div class="swiper-slide la-home__customize-slide col-md-7 px-0 la-anim__stagger-item">
                                <div class="la-home__customize-info">
                                    <img src="../images/learners/home/mockup2.jpg" alt="Unique tattoo styles" class="img-fluid mx-auto d-block la-home__customize-img">
                                    <div class="la-home__customize-infotitle leading-tight mt-8">Unique tattoo styles from around of the world</div>
                                    <p class="la-home__customize-infopara">Learn unique styles created by incredible artists from across the world</p>
                                </div>
                            </div>

                            <div class="swiper-slide la-home__customize-slide col-md-7 px-0 la-anim__stagger-item">
                                <div class="la-home__customize-info">
                                    <img src="../images/learners/home/mockup3.jpg" alt="Personal Playlist" class="img-fluid mx-auto d-block la-home__customize-img">
                                    <div class="la-home__customize-infotitle leading-tight mt-8">Personal Playlist to help you organise</div>
                                    <p class="la-home__customize-infopara">Create playlist to save all the courses you want to learn in a personal space and learn whenever, wherever yo want!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination la-home__customize-pagination"></div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Section: End -->

  <!-- Section: Start -->
  <div class="la-section  la-home__section-learn position-relative la-anim__wrap">
      <div class="la-section__inner position-relative">
        <span class="la-section__circle la-section__circle-learn d-none d-md-block"></span>
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-2">
                      <div class="la-home__learn position-relative">
                          <h3 class="la-home__learn-title leading-none mb-4 la-anim__stagger-item">How do you learn?</h3>
                         
                          <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-md-8 mr-5 mr-md-1 la-anim__stagger-item--x">
                            <a href="/browse/courses" >Get Started</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-10">
                      <div class="la-home__learn-info position-relative la-anim__stagger-item--x">
                            <img src="./images/learners/home/learn.png" alt="How do you Learn?" class="img-fluid mx-auto d-block la-home__learn-img">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Section: End -->
  
  <!-- Section: Start-->
  <section class="la-section la-section--trail position-relative la-section--grey  la-anim__wrap">
    <div class="la-section__inner">
      <span class="la-section__circle la-section__circle--right"></span>
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-12 col-md-5 la-trail__left  position-relative">
            <div class="la-trail__img-wrap la-anim__fade-in-right la-anim__B">
              <div class="la-trail__img position-relative">
                <img class="w-100" src="./images/learners/home/observe.png" alt="observe">
              </div>
              <!-- <div class="la-trail__title la-trail__title-in la-trail__title--purple la-section__title la-section__title--big position-absolute la-anim__text-move la-anim__text-move--z1">Observe.</div>-->
            </div>
          </div>

          <div class="col-12 col-md-7 pl-md-0 mt-auto position-relative">
            <div class="la-trail__title-main">
              <div class="swiper-container la-trail__title-container ">
                <div class="swiper-wrapper la-trail__title-wrapper">
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--black la-section__title la-section__title--big">Observe.</div>
                  </div>
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--black la-section__title la-section__title--big">Learn.</div>
                  </div>
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--black la-section__title la-section__title--big">Practice.</div>
                  </div>
                  <div class="swiper-slide la-trail__title-slide">
                      <div class="la-trail__title text-left la-trail__title--black la-section__title la-section__title--big">Repeat.</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="la-trail__right position-relative d-flex align-items-end">
              <div class="la-trail__content-wrap la-anim__stagger">
                <div class="la-home__trail-btn la-btn__plain d-flex justify-content-start align-items-start la-anim__fade-in-left">
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold la-anim__fade-in-right" style="transform: translate(0px, 0px); opacity: 1;">
                      <a href="/about">ALIENS WAY OF TEACHING <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                  </div>
                </div>

                <div class="la-trail__para la-anim__stagger-item la-anim__B">We strongly believe observation is integral to honing art. Learn from artists who have created their niche in the world of tattooing with consistent practice, and become the master of your niche!</div>
                <?php if(Auth::check()): ?>
                  <?php if(Auth::user()->subscription() ): ?>
                    <a class="btn btn-primary la-btn  mt-md-10 la-anim__stagger-item" href="/browse/course/">Browse Course</a>
                  <?php else: ?>
                    <a class="btn btn-primary la-btn  mt-md-6 la-anim__stagger-item" href="/login">Start free trial</a>
                  <?php endif; ?>
                <?php else: ?>
                  <a class="btn btn-primary la-btn  mt-md-6 la-anim__stagger-item" href="/login">Start free trial</a>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <!--<div class="la-home__trail-btn la-btn__plain d-flex justify-content-center align-items-start la-anim__fade-in-left">
            <div class="d-none d-md-block la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold mr-5 mr-md-1 la-anim__fade-in-right" style="transform: translate(0px, 0px); opacity: 1;">
                <a href="/about">ALIENS WAY OF TEACHING <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
            </div>
          </div> -->

        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section la-section--price la-section--grey  la-anim__wrap la-anim__wrap-pin">
    <div class="la-section__inner ">
      <div class="container-fluid">
        <div class="la-price__container">
          <h2 class="la-section__title la-section__title--big leading-none la-anim__pin la-price__container-title text-left"> 
            <span style="color: var(--gray2);" class="la-anim__fade-in-top">Learn it </span><br>
            <span class="la-anim__stagger-item">like aliens</span>
          </h2>
          <div class="la-price__slider la-anim__slider">
              <div class="la-price__slide la-anim__slide mb-6 mb-lg-16">
                <div class="la-price__row row ">
                
                  <div class="col-lg-5 la-anim__wrap order-2 order-lg-1">
                    <div class="la-home__subscription__ques--first">
                      <h3 class="la-section__subtitle la-anim__stagger-item">How does subscription works?</h3>
                      <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x ">Learning need not be expensive. At LILA, our subscription model gives you the benefit to choose from any number of courses or individual classes, as you please.</p>
                      <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x ">  All at nominal fees! So, learn away! </p>
                      <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-4 pt-md-8 la-anim__stagger-item--x">
                        <a href="/learning-plans">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                      </div>
                    </div>

                    <div class="la-home__subscription__ques--second la-anim__wrap">
                      <h3 class="la-section__subtitle la-anim__stagger-item">What’s LILA for you ?</h3>
                      <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x">Our mission is to Encourage, Empower and Embrace self-learning among all curious individuals who wish to learn, expand their potential and make a mark in the world.</p>
                      <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x">   Through our Radical team, we strive every day to make knowledge Affordable, Accessible for everyone regardless of who or where they are</p>
                      <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold  pt-4 pt-md-8  la-anim__stagger-item--x">
                        <a href="/about">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                      </div>
                    </div>
                  </div>
        
                  <?php if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active()): ?>
                  
                        <div class="col-md-7 col-lg-5 offset-lg-1  order-1 order-lg-2">
                          <div class="la-price__box-wrap la-anim__wrap-pin2 ">
                            <div class="la-anim__wrap ">
                                <div class="la-price__box la-anim__pin2 ">
                                  <div class="la-price__box-inner la-anim__stagger-item">
                                      <p class="la-price__box-para mb-8 la-anim__stagger-item--x">Discover our wide range of art courses curated by top artists from around the world and explore your creativity! </p>
                                      <a href="/browse/course" class="btn btn-primary la-btn w-100">Start Learning</a>                                   
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>                      

                  <?php else: ?>

                      <div class="col-md-7 col-lg-5 offset-lg-1 order-1 order-lg-2">
                        <div class="la-price__box-wrap">
                          <div class="la-anim__wrap la-anim__wrap-pin2">
                              <div class="la-price__box la-anim__pin2 ">
                                <div class="la-price__box-inner la-anim__stagger-item">
                                    <a href="/learning-plans" class="btn btn-primary la-btn w-100">SUBSCRIBE NOW</a>
                                    <p class="la-price__box-para mt-8 mb-2 la-anim__stagger-item--x">Get <span class="la-color--primary">35% savings </span>on Annual Plan</p>
                                    <div class="la-price__box-soffer la-soffer ml-0">
                                      
                                      <?php if(getLocation() == 'IN'): ?>
                                        <div class="la-soffer__bestprice la-soffer__bestprice--black la-anim__stagger-item--x" style="font-weight:var(--font-bold)"> <sup><small>₹</small></sup>  2899 / Month</div>
                                        <div class="la-soffer__realprice la-soffer__realprice--black la-anim__stagger-item--x"> <sup><small>₹</small></sup>  5999 (INR) </div>
                                      <?php else: ?>
                                        <div class="la-soffer__bestprice la-soffer__bestprice--black la-anim__stagger-item--x" style="font-weight:var(--font-bold)"> <sup><small>$</small></sup>  39 / Month</div>
                                        <div class="la-soffer__realprice la-soffer__realprice--black la-anim__stagger-item--x"> <sup><small>$</small></sup>  99 (USD) </div>
                                      <?php endif; ?>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div> 

                    <?php endif; ?>

                </div>
              </div>

              <!-- <div class="la-price__slide la-anim__slide">
                <div class="la-price__row row mb-16">
                  <div class="col-lg-5 pt-lg-20 la-anim__wrap">
                    <h3 class="la-section__subtitle la-anim__stagger-item">What’s LILA for you ?</h3>
                    <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x">Our mission is to Encourage, Empower and Embrace self-learning among all curious individuals who wish to learn, expand their potential and make a mark in the world.<br/><br/> 
                        Through our Radical team, we strive every day to make knowledge Affordable, Accessible for everyone regardless of who or where they are
                    </p>
                    <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold  pt-4 pt-md-8  la-anim__stagger-item--x">
                      <a href="/about">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                    </div>
                  </div>
                </div>
              </div> -->

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <?php $__env->stopSection(); ?>
  
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/home.blade.php ENDPATH**/ ?>