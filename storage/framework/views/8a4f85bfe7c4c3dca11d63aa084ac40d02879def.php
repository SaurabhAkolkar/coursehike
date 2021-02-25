<?php $__env->startSection('content'); ?>
<div class="la-profile">
    <div class="la-profile__wrap">

      <!-- Side Navbar: Start -->
        <?php echo $__env->make('learners.pages.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Side Navbar: End -->

      <?php  
        $addedToWhishList = true;
      ?>
      
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

      <div class="la-profile__main">
        <div class="container la-anim__wrap">
          
          <!-- Alert Message  -->
          <div id="wishlist_alert_div"></div>
          <!-- Alert Message  -->
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
            
          <div class="la-profile__main-inner ">
            <div class="la-profile__title-wrap la-anim__stagger-item">
              <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-3" href="<?php echo e(URL::previous()); ?>"></a>
              <h1 class="la-profile__title">Wishlist</h1>
              
              <!-- Mobile Version Add Courses Btn -->
              <div class="la-btn__add-icon d-block d-md-none">
                <a class="la-playlist__mobile text-lg text-uppercase" href="/browse/courses"> 
                  <span class="la-icon la-icon--md icon-plus mr-3"></span>Add Courses</a>
              </div>
            </div>

            <section class="la-section la-wishlist__sec pt-0">
              <div class="la-wishlist__inner">
                <div class="row la-wishlist__row">
                    <?php $__currentLoopData = $wishlist_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-6 col-lg-4 px-0  la-anim__stagger-item">
                         <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $courses->course_id,'img' => $courses->courses->preview_image,'course' => $courses->courses->title,'url' => $courses->courses->slug,'rating' => round($courses->courses->average_rating, 2),'creatorImg' => $courses->courses->user->user_img,'creatorName' => $courses->courses->user->FullName,'creatorUrl' => $courses->courses->user->id,'addedToWhishList' => $addedToWhishList,'learnerCount' => $courses->courses->leanerCount,'price' => $courses->courses->price,'bought' => $courses->courses->isPurchased()]); ?>
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
                
                    <div class="col-md-6 col-lg-4 d-none d-md-block  la-anim__stagger-item">
                      <a class="la-btn__add la-playlist__add-wishlist d-flex justify-content-center align-items-center" href="/browse/courses">
                        <span class="la-btn__add-icon">+</span>
                      </a>
                    </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/wishlist.blade.php ENDPATH**/ ?>