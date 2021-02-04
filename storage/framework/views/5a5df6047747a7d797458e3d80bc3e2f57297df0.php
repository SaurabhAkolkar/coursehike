<?php $__env->startSection('content'); ?>
<div class="la-profile">
    <div class="la-profile__wrap">

       <!-- Side Navbar: Start -->
       <?php echo $__env->make('learners.pages.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <!-- Side Navbar: End -->

      
      <div class="la-profile__main">
        <div class="container la-anim__wrap">
        <?php if(session('message')): ?>
            <div class="la-btn__alert position-relative">
              <div class="la-btn__alert-success col-lg-4 offset-lg-2 alert alert-success alert-dismissible fade show" role="alert">
                  <span class="la-btn__alert-msg"><?php echo e(session('message')); ?></span>
                  <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="color:#56188C">&times;</span>
                  </button>
              </div>
            </div>
          <?php endif; ?>
          <div class="la-profile__main-inner">
            <div class="la-profile__title-wrap">
                <h1 class="la-profile__title la-profile__title-crumbs la-anim__stagger-item">
                    <a href="/playlist" role="button" style="color:var(--app-indigo-1)">My Playlist</a> / 
                    <span class="text-capitalize"><?php echo e($playlist->name); ?></span>
                </h1>
            </div>
            
            <section class="la-section la-playlist__sec pt-0">
              <div class="la-playlist__wrap">
                
                    <?php  
                    $removeFromPlaylist = true;
                    ?>


                        <div class="row la-playlist__items">

                            <?php if(count($courses) > 0): ?>                              
                              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                $course = $c->courses;
                              ?>
                              <div class="col-md-4 px-0">
                                 <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => round($course->average_rating, 2),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fullName,'creatorUrl' => $course->user->id,'removeFromPlaylist' => $removeFromPlaylist,'learnerCount' => $course->learnerCount]); ?>
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
                            <?php else: ?>
                            <div class="col-12 ">
                            <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__stagger-item">
                              <div class="col la-empty__inner">
                                  <h6 class="la-empty__course-title text-lg text-md-2xl m-0 la-anim__stagger-item">No courses added to this playlist yet! </h6>
                              </div>
                              <div class="col text-md-right la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
                                  <a href="/browse/courses" class="la-empty__browse ">
                                      Browse Courses
                                      <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                                  </a>
                              </div>
                            </div>  
                            <?php endif; ?>

                        </div>
                   
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/playlist-courses.blade.php ENDPATH**/ ?>