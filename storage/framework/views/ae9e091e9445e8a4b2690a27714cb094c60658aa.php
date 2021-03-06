<?php $__env->startSection('seo_content'); ?>
    <title>Dashboard | Learn Anything Artistic Online | Start For Free Today | LILA</title>
    <meta name='description' itemprop='description' content='Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now' />

    <meta property="og:description"content="Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now" />
    <meta property="og:title"content="Dashboard | Learn Anything Artistic Online | Start For Free Today | LILA" />
    <meta property="og:url"content="<?php echo e(Request::url()); ?>" />
    <meta property="og:type"content="website" />
    <meta property="og:site_name"content="LILA Art" />
    <meta property="og:image"content="/images/learners/logo.svg" />
    <meta property="og:image:url"content="/images/learners/logo.svg" />
    <meta property="og:image:size"content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Dashboard | Learn Anything Artistic Online | Start For Free Today | LILA" />
    <meta name="twitter:site"content="@lilaaliens" />
    
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Dashboard | Learn Anything Artistic Online | Start For Free Today | LILA"}</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Main Section: Start-->
<section class="la-cdashboard-main">
    <!-- Section: Start-->
    <section class="la-cdashboard py-md-5">
      <div class="la-cdashboard__inner pt-5">
        <div class="container-fluid pt-0 pt-sm-3">
          <div class="row d-flex flex-row justify-content-between">
            <div class="col-12 col-md-6 col-lg-4  la-anim__wrap">
              <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-2 la-anim__stagger-item" href="<?php echo e(URL::previous()); ?>"></a>
              <div class="la-cdashboard__page ">
                <h1 class="la-cdashboard__user-name mb-2 text-3xl text-md-4xl text-capitalize la-anim__fade-in-top">Welcome <span style="color:var(--app-indigo-1);"><?php echo e(Auth::user()->fname); ?>!</span></h1>
                <p class="text-md  la-anim__stagger-item--x">Share your knowledge, Be the change.<br/> The kind that enables everyone to reach their full potential & more!</p>
              </div>

              <div class="la-course__last-view la-lastview-card d-flex flex-column justify-content-end">
                <div class="la-anim__wrap">
                  <h5 class="la-course__tile-title text-xl mb-4 la-anim__stagger-item">Last Viewed</h5>
                </div>
                <div class="la-course__tile-card d-block">
                  <div class="row no-gutters la-anim__wrap">
                    <div class="col la-anim__stagger-item">
                      
                        
                        <?php if($lastViewed != null): ?>
                      
                           <?php if (isset($component)) { $__componentOriginala14dc0162d0c6a6ad5d543909e2cf66e6b75bff9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\LastViewed::class, ['img' => $lastViewed->course->preview_image,'progress' => $recentWatchedCourseCompletion,'desc' => $lastViewed->course->title,'name' => $lastViewed->course->user->fullName,'rating' => $lastViewed->course->average_rating,'id' => $lastViewed->course->id,'slug' => $lastViewed->course->slug]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginala14dc0162d0c6a6ad5d543909e2cf66e6b75bff9)): ?>
<?php $component = $__componentOriginala14dc0162d0c6a6ad5d543909e2cf66e6b75bff9; ?>
<?php unset($__componentOriginala14dc0162d0c6a6ad5d543909e2cf66e6b75bff9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php else: ?>

                        <div class="la-empty__courses text-center mt-0 mb-10 mb-md-1 py-6 py-lg-9 px-10 px-lg-12">
                            <div class="la-empty__inner la-anim__stagger-item">
                                <p class="la-empty__course-desc leading-snug m-0">You don't have any last viewed course.</p>
                            </div>
                        </div>
                        
                        <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-12 col-md-6 col-lg-4 la-anim__wrap">
              <div class="la-course__alien-ad">
                <div class="card la-course__ad-card la-anim__stagger-item--x">
                  <div class="card-body la-course__ad-body my-0 position-relative">
                    <p class="la-course__ad-tag leading-snug text-sm pt-4 la-anim__stagger-item">Got something different? <br/> Let’s share it with the world!</p>
                    <h2 class="la-course__ad-title text-3xl text-md-4xl la-anim__stagger-item--x">become an <br><span>Alien Mentor, today!</span></h2>
                  
                    <div class="la-course__ad-learnmore text-right mr-md-n4 la-anim__stagger-item--x">
                      <a class="la-course__ad-learn text-uppercase " href="/become-creator">Learn More
                        <span class="la-icon la-icon--5xl icon-black-arrow "></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Dashboard Badges : Start -->
            <!-- <div class="col-12 col-md-5 offset-md-1 col-lg-4 offset-lg-4 px-0">
              <div class="la-cbadges__item pb-5 mb-5">
                <div class="row no-gutters px-2 px-sm-0 py-5 py-sm-2">
                  <div class="col d-flex flex-row justify-content-start justify-content-lg-center">
                    <div class="la-cbadge la-anim__wrap position-relative">
                        <div class="la-cbadge__thumbnail la-anim__stagger-item" data-toggle="popover" data-trigger="hover" data-placement="bottom" title= "EXCLUSIVITY" data-content="A Badge you earn when you finish an exclusive course." > 
                            <span class="la-icon la-icon--6xl icon-badge-purple">
                              <span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span>
                            </span>
                            <sup class="badge la-badge__count py-1 la-anim__fade-in-top la-anim__D">5</sup>
                        </div>
                    </div>
                  </div>
                  <div class="col d-flex flex-row justify-content-start justify-content-lg-center">
                    <div class="la-cbadge la-anim__wrap">
                        <div class="la-cbadge__thumbnail la-anim__stagger-item" data-toggle="popover" data-trigger="hover" data-placement="bottom" title= "SINCERE LEARNER" data-content="A Badge you earn when learn consistently." > 
                          <span class="la-icon la-icon--6xl icon-badge-green">
                            <span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span>
                          </span>   
                          <sup class="badge la-badge__count py-1 la-anim__fade-in-top la-anim__D">3</sup>
                        </div>
                    </div>
                  </div>
                  <div class="col d-flex flex-row justify-content-start justify-content-lg-center">
                    <div class="la-cbadge la-anim__wrap ">
                        <div class="la-cbadge__thumbnail la-anim__stagger-item" data-toggle="popover" data-trigger="hover" data-placement="bottom" title= "FAST LEARNER" data-content="A Badge you earn when learn at a fast pace." > 
                          <span class="la-icon la-icon--6xl icon-badge-yellow">
                            <span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span>
                          </span>
                              <sup class="badge la-badge__count py-1 la-anim__fade-in-top la-anim__D">8</sup>
                        </div>
                    </div>
                  </div>
                  <div class="col d-flex flex-row justify-content-start justify-content-lg-center">
                    <div class="la-cbadge la-anim__wrap ">
                        <div class="la-cbadge__thumbnail la-anim__stagger-item" data-toggle="popover" data-trigger="hover" data-placement="bottom" title= "MENTOR'S FAVOURITE" data-content="A Badge gifted by your mentor when you finish assignments well." > 
                          <span class="la-icon la-icon--6xl icon-badge-red">
                            <span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span>
                          </span>   <sup class="badge la-badge__count py-1 la-anim__fade-in-top la-anim__D">1</sup>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- Dashboard Badges : End -->
          </div>
          
          <!-- <div class="row la-lastview-card">
            <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-end">
              <div class="la-anim__wrap">
                <h5 class="la-course__tile-title text-xl mb-4 la-anim__stagger-item">Last Viewed</h5>
              </div>
              <div class="la-course__tile-card d-block">
                <div class="row no-gutters">
                  <div class="col la-anim__wrap">
                   
                      
                    

                    
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-12 col-md-5 col-lg-4">
              <div class="la-course__alien-ad mb-1">
                <div class="card la-course__ad-card la-anim__wrap">
                  <div class="card-body la-course__ad-body my-0 position-relative">
                    <p class="la-course__ad-tag text-sm  la-anim__stagger-item">Got something different? <br/> Let’s share it with the world!</p>
                    <h2 class="la-course__ad-title text-4xl la-anim__stagger-item--x">become an <br><span>Alien Mentor, today!</span></h2>
                  
                    <div class="la-course__ad-learnmore text-right mr-md-n4 la-anim__stagger-item--x">
                      <a class="la-course__ad-learn text-uppercase " href="/become-creator">Learn More
                        <span class="la-icon la-icon--5xl icon-black-arrow "></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div> -->
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->
    
    <!-- Section: End-->
    <!-- Section: Start-->
    <section class="la-pcourses-section mt-14">
      <div class="container-fluid">
        <div class="row">  
          <div class="col-12 la-anim__wrap">
            <h5 class="la-pcourses__title  text-2xl text-md-3xl la-anim__stagger-item">Pending Courses</h5>
            
            <div class="la-empty__courses  d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                <div class="col la-empty__inner la-anim__stagger-item">
                    <h6 class="la-empty__course-title">No Courses</h6>
                    <p class="la-empty__course-desc leading-snug m-0">You currently don't have any pending course, start new course</p>
                </div>
                <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                    <a href="/browse/courses" class="la-empty__browse">
                        Browse Courses
                      <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                    </a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->

    <section class="la-hp-section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="la-hp__inner la-anim__wrap">
              <h5 class="text-2xl text-md-3xl la-hp__title mb-8 la-anim__stagger-item">Hand Picked for you! </h5>
              <div class="la-hp__data">
                <div class="row">
                    <!-- Hand Picked: Start -->
                    <?php if(count($courses) > 0): ?>
                    <?php $__currentLoopData = $courses->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if (isset($component)) { $__componentOriginal6140f5124f377f6c9739ee318dd31a7e77329c20 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Handpicked::class, ['hpImg' => $c->preview_image,'hpCourse' => $c->title,'hpCname' => $c->user->fullName,'hpUrl' => '/learn/course/'.$c->id.'/'.$c->slug]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal6140f5124f377f6c9739ee318dd31a7e77329c20)): ?>
<?php $component = $__componentOriginal6140f5124f377f6c9739ee318dd31a7e77329c20; ?>
<?php unset($__componentOriginal6140f5124f377f6c9739ee318dd31a7e77329c20); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <div class="la-empty__courses  d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                        <div class="col la-empty__inner la-anim__stagger-item">
                            <h6 class="la-empty__course-title">No Courses Found</h6>
                            <p class="la-empty__course-desc leading-snug m-0">Add Interests To Get Course Suggestion</p>
                        </div>
                        <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                            <a href="/my-interests" class="la-empty__browse">
                                Add Interests
                              <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                            </a>
                        </div>
                      </div>
                    <?php endif; ?>
                    <!-- Hand Picked: End -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->

    <!-- Section: Start-->
      <?php  
          $users = $courses->take(3)->groupBy('user_id');
         
     ?>
    <section class="la-section__small">
      <div class="la-section__inner">
        <div class="container-fluid">
            <div class="row ">
              <div class="col-12 la-anim__wrap">
                <h5 class="text-2xl text-md-3xl mb-8 px-0 la-anim__stagger-item ">Alien Mentors</h5>
              </div>
            </div>
          
            <div class="la-mentors">
              <div class="row la-anim__wrap">
                <?php if(count($users) > 0): ?>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 ">
                      <div class="la-mentor">
                        <div class="la-mentor__profile  la-anim__stagger-item">
                            <img class="img-fluid" src="<?php echo e($u[0]->user->user_img); ?>" alt="<?php echo e($u[0]->user->fullName); ?>">
                        </div>
                        <div class="la-mentor__btm d-flex justify-content-between align-items-center la-anim__stagger-item la-anim__B">
                          <div class="la-mentor__info ">
                            <h3 class="la-mentor__name"><?php echo e($u[0]->user->fullName); ?></h3>
                            <p class="la-mentor__skill"><?php echo e($u[0]->category->title); ?></p>
                          </div>
                          <a class="la-mentor__detailview " href="/creator/<?php echo e(1); ?>">
                            <span class="la-icon la-icon--6xl icon-grey-arrow mt-n2"></span>
                          </a>
                        </div>
                      </div>
                    </div>                
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>

                      <div class="la-empty__courses  d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                        <div class="col la-empty__inner la-anim__stagger-item">
                            <h6 class="la-empty__course-title">No Mentors Found</h6>
                            <p class="la-empty__course-desc leading-snug m-0">Add Interests To Get Mentor Suggestion</p>
                        </div>
                        <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                            <a href="/my-interests" class="la-empty__browse">
                                Add Interests
                              <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                            </a>
                        </div>
                      </div>
                    
                <?php endif; ?>
              </div>
          </div>            
        </div>
    </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->
    
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/user-dashboard.blade.php ENDPATH**/ ?>