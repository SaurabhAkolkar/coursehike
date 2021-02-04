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
<section class="la-section  la-section--hero clearfix p-0">
    <div class="la-section__inner">
      <div class="container">
        <div class="la-hero__top row align-items-center la-anim__wrap la-anim__wrap--hero ">
          <!-- Column: Start-->
          <div class="col-12 col-lg-5 la-anim__item la-anim__item--left my-auto">
            <div class="la-hero pt-6 pt-lg-2 la-anim__stagger">
              <p class="la-hero__tag mb-2 mb-md-0 la-anim__stagger-item">COURSES & CLASSES BY</p>
              <h1 class="la-hero__title la-anim__stagger-item">World’s best <span class="la-hero__subtitle">Creators</span></h1>
              <p class="la-hero__lead la-anim__stagger-item"><?php echo e($firstSection->sub_heading); ?></p>

              <div class="d-none d-lg-block">
                <div class="la-hero__actions d-md-flex align-items-center la-anim__stagger-item">
                  <div class="col-md-7 px-0">
                      <a href="/learning-plans" class="btn btn-primary la-hero__cta la-btn la-btn--primary">Subscribe Now</a>
                      <p class="m-0 pt-1 pl-1 text-sm text-center text-md-left">Instant access to all courses <!-- at nominal monthly fees --></p>
                  </div>
                  <div class="col-md-5 px-0 la-soffer d-flex d-lg-block justify-content-center  mb-lg-auto">
                    <div class="la-soffer__bestprice"> <sup><small>$</small></sup>  39 / Month</div>
                    <div class="la-soffer__realprice"> <sup><small>$</small></sup>  99 (USD)</div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          <!-- Column: End-->
          
          <!-- Column: Start-->
          <div class="col-12 col-lg-6 offset-lg-1 la-anim__item la-anim__item--right">

            <?php if($firstSection->video_url == null): ?>

            <div class="la-hero__img position-relative d-flex align-items-center la-anim__fade-in-right">
              <h2 class="la-section__title la-section__title--big">
                <span class="la-anim__text-move--content"><?php echo e($firstSection->image_text); ?></span>
              </h2>
              <img class="img-fluid" src="<?php echo e($firstSection->image); ?>" alt="<?php echo e($firstSection->image_text); ?>">
            </div> 

            <?php else: ?>
            <!-- Video Section: Start -->
            <div class="la-hero__video-mainZposition-relative la-anim__stagger-item--x la-anim__C">
              <div class="la-hero__video" style="mask-image:url('../../images/learners/home/home-mask.png'); -webkit-mask-image:url('../../images/learners/home/home-mask.png');">
                  <video autoplay='' playsinline muted='muted' loop='loop' id="home_video">
                      <source src='<?php echo e($firstSection->video_url); ?>'  type='video/mp4' />
                  </video>
              </div>
            </div>
             <!-- Video Section: End -->
            <?php endif; ?>

            <div class="d-block d-lg-none">
              <div class="la-hero__actions pb-8 pb-md-10 d-md-flex align-items-start  la-anim__stagger-item la-anim__C">
                <div class="col-md-6 px-0">
                      <a href="/learning-plans" class="btn btn-primary la-hero__cta la-btn la-btn--primary btn-block">Subscribe Now</a>
                      <p class="m-0 pt-2 pl-1 text-sm text-center text-md-left">Instant access to all courses <!-- at nominal monthly fees --></p>
                </div>
                <div class="col-md-6 px-0 pt-4 la-soffer d-flex justify-content-center mx-0">
                    <div class="la-soffer__bestprice"> <sup><small>$</small></sup>  39 / Month</div>
                    <div class="la-soffer__realprice"> <sup><small>$</small></sup>  99 (USD)</div>
                </div>
              </div>
            </div>
           
          </div>
          <!-- Column: End-->
        </div>

        <!-- Row: Start-->
        <div class="la-anim__wrap">
          <div class="la-hero__bottom d-flex justify-content-center justify-content-lg-between align-items-center pt-4 pb-14 la-anim__fade-in-bottom la-anim__D">
            <div class="la-hero__bottom-trial la-btn__arrow text--green text-uppercase text--md font-weight--medium text-spacing"><a href="/learning-plans">Start free trial<span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a></div>
            <div class="la-hero__bottom-browse la-btn__arrow la-btn__arrow-down text--burple text-uppercase text--md font-weight--medium text-spacing d-none d-lg-block"><a href="#home_courses">BROWSE COURSES</a><span class="la-btn__arrow-icon arrow-down la-icon la-icon--7xl icon-grey-arrow"> </span></div>
          </div>
        </div>
        <!-- Row: End-->
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section  la-section--grey la-section--art-categories position-relative"  id="home_courses">
    <div class="la-section__inner la-anim__wrap" >
      <div class="container position-relative">
        <span class="la-section__cross-line"></span>
        <div class="la-courses">
          <nav class="la-courses__nav d-flex justify-content-between align-items-start">
              <ul class="nav nav-pills la-courses__nav-tabs la-anim__stagger-x" id="nav-tab" role="tablist" tabindex="0">
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
           
            
            <!-- Filters : Start -->
            <div class="la-courses__nav-filters ml-10 mt-2">
              <!-- <div class="la-courses__nav-props">
                <a class="la-icon icon-list-layout la-courses__nav-filter mr-3" id="showLayout" role="button"></a>
              </div> -->
              <div class="la-courses__nav-props">

                  <div class="la-courses__nav-filters d-flex align-items-start ml-6">
                    <!-- <div class="la-courses__nav-props">
                      <a class="la-icon icon-list-layout la-courses__nav-filter  mr-3" id="showLayout" role="button"></a>
                    </div> -->
                    <div class="la-courses__nav-props">
                      <a class="la-icon icon-sort la-courses__nav-filter  mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                      <!-- Sort Courses Dropdown -->
                      <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses"  style="border:none !important;">
                        <div class="la-form__input-wrap px-5">
                            <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                            <div class=" pt-2">
                                <div class="la-form__radio-wrap mr-5">
                                      <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular" <?php if($sort_type =='most_popular'): ?> checked <?php endif; ?>>
                                      <label class="la-form__radio-filterlabel d-flex align-items-center text-sm" for="most_popular"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                                </div>
                                <div class="la-form__radio-wrap mr-5">
                                    <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated" <?php if($sort_type =='highest_rated'): ?> checked <?php endif; ?>>
                                    <label class="la-form__radio-filterlabel d-flex align-items-center text-sm" for="highest_rated"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                                </div>
                                <div class="la-form__radio-wrap mr-5">
                                    <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest" <?php if($sort_type =='latest'): ?> checked <?php endif; ?>>
                                    <label class="la-form__radio-filterlabel d-flex align-items-center text-sm" for="latest"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                      
                    <div class="la-courses__nav-filterprops">
                    <a class="la-icon icon-filter la-courses__nav-filter " id="filteredCourses"  role="button"></a>
                    
                        <!-- Filter Courses Dropdown -->
                        <div class="la-courses__nav-filterdropdown" id="filtered_sidebar">
                            <div class="la-form__input-wrap px-5">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                                  <button class="la-courses__nav-filterclose close text-4xl mt-1" type="button" id="filter_close">&times;</button>
                                </div>
      
                                  <form action="<?php echo e(url()->current()); ?>" method="get" id="filter_form">
                                      <input type="hidden" name="categories" id="filter_categories" value="<?php echo e(implode(',',$selected_categories)); ?>"/>
                                      <input type="hidden" name="languages" id="filter_languages" value="<?php echo e(implode(',',$selected_languages)); ?>"/>
                                      <input type="hidden" name="level" id="filter_level" value="<?php echo e(implode(',',$selected_level)); ?>"/>
                                      <input type="hidden" name="filters" value="applied" />
      
                                      
                                      <div class="form-group pt-2">
                                        <div class="glabel-main mb-1" > Course Duration</div>
                                        <div class="glabel d-flex  align-items-center m-0">
                                            <input class="la-form__radio d-none la-vcourse__purchase-input" <?php if($selected_duration == "lessthan1"): ?> checked <?php endif; ?> type="radio" name="duration" id="lessthan1" value="lessthan1">
                                            <label class="d-flex align-items-center" for="lessthan1">
                                              <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center"></span>
                                              <strong class="pl-2" style="color:var(--gray6);opacity:1;"> Less than an hr</strong>
                                            </label>
                                        </div>
      
                                        <div class="glabel d-flex  align-items-center m-0">
                                            <input class="la-form__radio d-none la-vcourse__purchase-input" <?php if($selected_duration == "lessthan5"): ?> checked <?php endif; ?> type="radio" name="duration" id="lessthan5" value="lessthan5">
                                            <label class="d-flex align-items-center" for="lessthan5">
                                              <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center"></span>
                                              <strong class="pl-2" style="color:var(--gray6);opacity:1;">  1hr - 5hrs</strong>
                                            </label>
                                        </div>
      
                                        <div class="glabel d-flex  align-items-center m-0">
                                            <input class="la-form__radio d-none la-vcourse__purchase-input" <?php if($selected_duration == "morethan5"): ?> checked <?php endif; ?> type="radio" name="duration" id="morethan5" value="morethan5">
                                            <label class="d-flex align-items-center" for="morethan5">
                                              <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex  justify-content-center align-items-center"></span>
                                              <strong class="pl-2" style="color:var(--gray6);opacity:1;"> More than 5hrs</strong>
                                            </label>
                                        </div>
                                    
                                      </div>
      
                                      <div class="form-group pt-2">
                                        <div class="glabel-main mb-2" > Category</div>
                                          <?php $__currentLoopData = $filter_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="glabel d-flex" for="course_<?php echo e($c->id); ?>">
                                              <input class="d-none" type="checkbox" id="course_<?php echo e($c->id); ?>" <?php if(in_array($c->id, $selected_categories)): ?> checked <?php endif; ?> onclick="addToCategory(<?php echo e($c->id); ?>)" value="<?php echo e($c->id); ?>">
                                                <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                                <span class="pl-2 mt-n1 text-capitalize"><?php echo e($c->title); ?></span>
                                            </label>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </div>
      
                                      <div class="form-group pt-2">
                                        <div class="glabel-main mb-2" > Language</div>
                                        <?php $__currentLoopData = $langauges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <label class="glabel d-flex" for="lang_<?php echo e($l->id); ?>">
                                            <input class="d-none" id="lang_<?php echo e($l->id); ?>" <?php if(in_array($l->id, $selected_languages)): ?> checked <?php endif; ?> type="checkbox" onclick="addToLanguage(<?php echo e($l->id); ?>)" value="<?php echo e($l->id); ?>">
                                            <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                            <span class="pl-2 mt-n1 text-capitalize"><?php echo e($l->name); ?></span>
                                          </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                      </div>
      
                                      <div class="form-group pt-2">
                                        <div class="glabel-main mb-2" >Level</div>
                                        <label class="glabel d-flex" for="level_1">
                                          <input class="d-none" id ="level_1" type="checkbox" onclick="addToLevel(1)" <?php if(in_array(1, $selected_level)): ?> checked <?php endif; ?>>
                                          <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                          <span class="pl-2 mt-n1">Beginner</span>
                                        </label>
      
                                        <label class="glabel d-flex" for="level_2">
                                          <input class="d-none" id="level_2"  type="checkbox" onclick="addToLevel(2)" <?php if(in_array(2, $selected_level)): ?> checked <?php endif; ?>>
                                          <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                          <span class="pl-2 mt-n1">Intermediate</span>
                                        </label>
      
                                        <label class="glabel d-flex" for="level_3">
                                          <input class="d-none" id="level_3"  type="checkbox" onclick="addToLevel(3)" <?php if(in_array(3, $selected_level)): ?> checked <?php endif; ?>>
                                          <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                          <span class="pl-2 mt-n1">Advanced</span>
                                        </label>
                                      </div>
              
                                      
                                      <button onclick="$('#filter_form').submit()" class="la-btn la-btn__secondary bg-transparent text-uppercase text-center py-3 mt-6">Apply</button> 
                                      <div class="mt-6">
                                        <a href="/browse/courses" role="button" class="la-btn la-btn__secondary bg-transparent text-uppercase text-center py-3 mt-6">Clear</a> 
                                      </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- Filters : End -->
              </div>  
            </div>   
        </nav> 
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
                            <div class=" tab-pane fade show <?php if($loop->first): ?> active <?php endif; ?>" id="nav-<?php echo e($category->slug); ?>" role="tabpanel" aria-labelledby="nav-<?php echo e($category->slug); ?>-tab">
                              <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item la-anim__C">
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
                                       <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => $course->review->avg('rating'),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fname,'creatorUrl' => $course->user->id,'learnerCount' => $course->learnerCount]); ?>
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
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
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
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => $course->review->avg('rating'),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fname,'creatorUrl' => $course->user->id,'learnerCount' => $course->learnerCount]); ?>
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
  <section class="la-section  la-section--artists position-relative la-anim__wrap">
    <div class="la-section__inner position-relative">
      <span class="la-section__circle"></span>
      <div class="swiper-container gallery-top la-artist__slider container">

        <div class="col-md-12 la-artist__slider-col la-artist__designation position-absolute d-flex align-items-center justify-content-center la-anim__fade-in-top la-anim__A">
            <h2 class="la-section__title la-section__title--big">Alien <span style="color: var(--gray);"> MENTOR </span></h2>
        </div>

        <div class="swiper-wrapper">
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
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-1.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-2.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-3.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-4.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-5.png" alt=""></div>
          <div class="swiper-slide la-artist__thumbnail"><img src="./images/learners/home/artist-thumb/artist-thumb-6.png" alt=""></div>
        </div>
      </div>

    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section  la-section--classes la-section--grey position-relative la-anim__wrap">
    <div class="la-section__inner">
      <div class="container">
        <h2 class="la-section__title la-section__title--big position-relative la-anim__fade-in-top la-anim__A">Master <span>classes</span></h2>
        <div class="la-mccourses pt-20 pt-md-4">
          <div class="row justify-content-center px-lg-5 la-anim__stagger la-anim__A">
           
              <?php $__currentLoopData = $master_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if (isset($component)) { $__componentOriginal569f4b3c3d50580306a5cb083576611189fd5fee = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MasterClass::class, ['img' => $master->courses->preview_image,'title' => $master->courses->title,'profileImg' => $master->courses->user->user_img,'profileName' => $master->courses->user->fullName,'learners' => $master->courses->learnerCount,'id' => $master->courses->id,'slug' => $master->courses->slug]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal569f4b3c3d50580306a5cb083576611189fd5fee)): ?>
<?php $component = $__componentOriginal569f4b3c3d50580306a5cb083576611189fd5fee; ?>
<?php unset($__componentOriginal569f4b3c3d50580306a5cb083576611189fd5fee); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
          </div>
        </div>

        <div class="la-mccourse__view-more position-relative text-right la-anim__wrap">
            <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-md-8 mr-5 mr-md-1 la-anim__fade-in-right">
              <a href="/master-classes" >explore more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
            </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section la-section--trail position-relative la-anim__wrap">
    <div class="la-section__inner">
      <span class="la-section__circle la-section__circle--right"></span>
      <div class="container">
       
        <div class="row">
          <div class="col-12 col-md-5 la-trail__left">
            <div class="la-trail__title la-trail__title-out la-trail__title--black la-section__title la-section__title--big position-absolute la-anim__text-move">Observe.</div>
            <div class="la-trail__img-wrap la-anim__fade-in-right la-anim__B">
              <div class="la-trail__img position-relative">
                <img class="w-100" src="./images/learners/home/observe.png" alt="observe">
              </div>
              <div class="la-trail__title la-trail__title-in la-trail__title--purple la-section__title la-section__title--big position-absolute la-anim__text-move la-anim__text-move--z1">Observe.</div>
            </div>
          </div>

          <div class="col-12 col-md-7 pl-md-0">
            <div class="la-trail__btn la-btn__plain d-flex justify-content-center la-anim__fade-in-left">
              <a href="/about" class="d-none d-md-block">ALIENS WAY OF TEACHING</a>
            </div>
            <div class="la-trail__right d-flex align-items-end ">
              <div class="la-trail__content-wrap pr-md-20 la-anim__stagger">
                <div class="la-trail__para pb-10 pr-md-20 la-anim__stagger-item la-anim__B">We strongly believe observation is integral to honing art. Learn from masters in their respective fields with consistent practice, and become a pro yourself!</div>
                <a class="btn btn-primary la-btn la-btn--primary mt-md-10 la-anim__stagger-item la-anim__B" href="/login">Start free trail</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section la-section--price la-anim__wrap la-anim__wrap-pin">
    <div class="la-section__inner ">
      <div class="container ">
        <div class="la-price__container">
          <h2 class="la-section__title la-section__title--big leading-none la-anim__pin"> <span style="color: var(--gray);" class="la-anim__fade-in-top">Learn it </span><br><span class="la-anim__stagger-item">like aliens</span></h2>
          <div class="la-price__slider la-anim__slider">
              <div class="la-price__slide la-anim__slide">
                <div class="la-price__row row mb-16">
                
                  <div class="col-lg-5 pt-20 la-anim__wrap">
                    <h3 class="la-section__subtitle la-anim__stagger-item">How does subscription works?</h3>
                    <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x ">Learning need not be expensive. At LILA, our subscription model gives you the benefit to choose from any number of courses or individual classes, as you please.<br/><br/> All at nominal fees! So, learn away! </p>
                    <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-4 pt-md-8 la-anim__stagger-item--x">
                      <a href="/learning-plans">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                    </div>
                  </div>

                  <div class="col-lg-5  offset-lg-1 pt-12 pt-md-20 ">
                    <div class="la-anim__wrap la-anim__wrap-pin2">
                        <div class="la-price__box la-anim__pin2 ">
                          <div class="la-price__box-inner la-anim__stagger-item">
                            <a href="/learning-plans" class="btn btn-primary la-btn la-btn--primary w-100">SUBSCRIBE NOW</a>
                            <p class="la-price__box-para mt-8 mb-2 la-anim__stagger-item--x">Get <span class="la-color--primary">35% savings </span>on Annual Plan</p>
                            <div class="la-price__box-soffer la-soffer ml-0">
                              <div class="la-soffer__bestprice la-soffer__bestprice--black la-anim__stagger-item--x"> <sup><small>$</small></sup>  39 / Month</div>
                              <div class="la-soffer__realprice la-anim__stagger-item--x"> <sup><small>$</small></sup>  99 (USD) </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div> 
                </div>
              </div>

              <div class="la-price__slide la-anim__slide">
                <div class="la-price__row row mb-16">
                  <div class="col-lg-5 pt-md-20 la-anim__wrap">
                    <h3 class="la-section__subtitle la-anim__stagger-item la-anim__B">What’s LILA for you ?</h3>
                    <p class="la-section__text text-lg text-md-xl la-anim__stagger-item--x la-anim__B">Our mission is to Encourage, Empower and Embrace self-learning among all curious individuals who wish to learn, expand their potential and make a mark in the world.<br/><br/> 
                        Through our Radical team, we strive every day to make knowledge Affordable, Accessible for everyone regardless of who or where they are
                    </p>
                    <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold  pt-4 pt-md-8  la-anim__stagger-item--x la-anim__B">
                      <a href="/about">learn more<span class="la-icon la-icon--7xl icon-grey-arrow la-btn__arrow-icon"></span></a>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <?php $__env->stopSection(); ?>
  
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/home.blade.php ENDPATH**/ ?>