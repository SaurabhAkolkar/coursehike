<?php $__env->startSection('content'); ?>
<section class="la-cbg--main">
    <!-- Section Ongoing: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <!-- Alert Message-->
        <div id="wishlist_alert_div" class="container"></div> 

        <div class="container">
          <div class="col-12 la-anim__wrap d-md-flex justify-content-between align-items-center px-0 pb-md-12">
            <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-2 la-anim__stagger-item" href="<?php echo e(URL::previous()); ?>"></a>
            <h1 class="la-mycourses__title text-4xl mb-4 mb-md-8 la-anim__stagger-item">My Courses</h1>

            <!-- Global Search: Start-->
            <div class="la-gsearch la-anim__stagger-item--x">
              <form class="form-inline" action="<?php echo e(url('/search-course/')); ?>">
                <div class="form-group d-flex align-items-center">
                  <input class="la-gsearch__input form-control w-75 la-gsearch__input-browsecourses" style="background:transparent" type="text" name="course_name" placeholder="Search your Courses and Classes">
                </div>
                <button class="la-gsearch__submit btn" type="submit"><i class="la-icon  icon icon-search la-gsearch__input-icon"></i></button>
              </form>
            </div>
            <!-- Global Search: End-->
          </div>

          <div class="mb-8 la-anim__wrap ">
              <div class="la-mycourses__subtitle text-2xl mb-6 head-font la-anim__stagger-item--x">Ongoing</div> 
                    
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

              <div class="col-12 px-0 la-anim__wrap">
                  <?php if(count($on_going_courses) != 0): ?>
                    <div class="row row-cols-md-2 row-cols-lg-3 ">
                      <?php $__currentLoopData = $on_going_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                       <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->course->id,'img' => $course->course->preview_image,'course' => $course->course->title,'url' => $course->course->slug,'rating' => $course->course->review->avg('rating'),'creatorImg' => $course->course->user->user_img,'creatorName' => $course->course->user->fullName,'creatorUrl' => $course->course->user->id,'price' => $course->course->price,'learnerCount' => $course->course->learnerCount,'bought' => $course->course->isPurchased()]); ?>
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

                    <?php else: ?>

                      <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                          <div class="col la-empty__inner">
                              <h6 class="la-empty__course-title la-anim__stagger-item">No Courses</h6>
                              <p class="la-empty__course-desc leading-snug m-0 la-anim__stagger-item">You have not started any course yet</p>
                          </div>
                          <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                              <a href="/browse/courses" class="la-empty__browse">
                                  Browse Courses
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
    <!-- Section Ongoing: End-->
    <!-- Section Yet to Start: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <div class="container la-anim__wrap">
          <div class="row">
            <div class="col-12">
                <div class="la-mycourses__subtitle text-2xl mb-6 head-font  la-anim__stagger-item--x">Yet to Start</div>
                <?php if(count($yet_to_start_courses) != 0): ?>
                <div class="row row-cols-lg-3 ">
                  <?php $__currentLoopData = $yet_to_start_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                   <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => $course->review->avg('rating'),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fullName,'creatorUrl' => $course->user->id,'price' => $course->price,'learnerCount' => $course->learnerCount,'bought' => $course->isPurchased()]); ?>
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

                <?php else: ?>

                  <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                      <div class="col la-empty__inner">
                          <h6 class="la-empty__course-title la-anim__stagger-item">No Courses</h6>
                          <p class="la-empty__course-desc leading-snug m-0 la-anim__stagger-item">You haven't bought or subscribed to any course yet</p>
                      </div>
                      <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                          <a href="/browse/courses" class="la-empty__browse ">
                              Browse Courses
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
  <!-- Section Yet to Start: End-->

  <!-- Section Completed: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <div class="container la-anim__wrap">
          <div class="row">
            <div class="col-12 mb-6 ">
              <div class="la-mycourses__subtitle text-2xl mb-6 head-font la-anim__stagger-item--x">Completed</div>
            
                <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                  <div class="col la-empty__inner">
                      <h6 class="la-empty__course-title  la-anim__stagger-item">No Courses</h6>
                      <p class="la-empty__course-desc leading-snug m-0 la-anim__stagger-item">You have not finished any course yet.</p>
                  </div>
                  <div class="col text-md-right la-empty__browse-courses mt-n2 la-anim__stagger-item--x">
                      <a href="/browse/courses" class="la-empty__browse ">
                          Browse Courses
                          <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                      </a>
                  </div>
                </div>

              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Completed: End-->
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/my-courses.blade.php ENDPATH**/ ?>