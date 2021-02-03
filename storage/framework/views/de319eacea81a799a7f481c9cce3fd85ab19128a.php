<!-- Playlist Alert Message-->
<?php if(session('message')): ?>
<div class="la-btn__alert position-relative">
  <div class="la-btn__alert-success col-lg-4 offset-lg-4  alert alert-success alert-dismissible fade show" role="alert">
      <span class="la-btn__alert-msg"><?php echo e(session('message')); ?></span>
      <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:#56188C">&times;</span>
      </button>
  </div>
</div>
<?php endif; ?>

<!-- Wishlist Alert Message-->
<div id="wishlist_alert_div"></div> 
<?php $__env->startSection('content'); ?>

<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-2" href="<?php echo e(URL::previous()); ?>"></a>
        <div class="d-flex justify-content-between la-anim__wrap">  
          <h1 class="la-page__title mb-16 mb-md-8 la-anim__stagger-item">Master Classes</h1>
          <a class="la-icon--2xl icon-filter d-none d-lg-none" id="filterCourses" role="button"></a>
        </div>  

            <section class="la-section la-section--classes la-section--grey position-relative la-anim__wrap">
                <div class="la-section__inner">
                <div class="container px-0">
                    <div class="la-mccourses py-4">
                      <div class="row justify-content-center px-0 la-anim__stagger la-anim__A">

                      <?php if(count($master_classes) == 0): ?>
                      <div class="la-empty__courses w-100 d-md-flex justify-content-between align-items-center mx-5 mt-0 mt-md-6">
                          <div class="la-empty__inner">
                              <h6 class="col la-empty__course-title text-xl la-anim__stagger-item">No master classes uploaded yet! </h6>
                          </div>
                          <div class="col text-md-right la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
                              <a href="/browse/courses" class="la-empty__browse">
                                  Browse Courses
                                  <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                              </a>
                          </div>
                      </div>  

                      <?php else: ?>
                      
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

                      <?php endif; ?>
                          
                      </div>
                    </div>
                </div>
                </div>
            </section>
        </div>
      </div>
    </div>
  </section>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('footerScripts'); ?>
      <script>
          $('input[type=radio][name=sort_by]').change(function() {
             window.location.href= '<?php echo e(url()->current()); ?>?sort_by='+this.value;

          });
      </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/master_classes.blade.php ENDPATH**/ ?>