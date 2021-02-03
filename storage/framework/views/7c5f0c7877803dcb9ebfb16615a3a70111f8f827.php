<?php $__env->startSection('content'); ?>
<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
     
      <div class="container">
      <div class="row">
          <div class="col-12 ">
            <div class="d-md-flex justify-content-between align-items-center">
              <a class="la-icon la-icon--5xl icon-back-arrow ml-n1 mt-n2 mb-5 d-block d-md-none" href="<?php echo e(URL::previous()); ?>"></a> 
              <a href="<?php echo e(URL::previous()); ?>" class="la-vcreator__back d-none d-md-block" style="margin-top:-28px;"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
              <h1 class="la-page__title mb-8">Alien Mentors</h1>
              <!-- Global Search: Start-->
              <div class="la-gsearch">
                <form class="form-inline" action="/search-mentor" method="post">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                    <input class="la-gsearch__input w-100 form-control" value="<?php echo e($inputValue); ?>" name="name" type="text" style="background:transparent" placeholder="Search Alien Mentor" required>
                  </div>
                  <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
                </form>
              </div>
              <!-- Global Search: End-->
            </div>
            
            <div class="la-mentors">
              <div class="row no-gutters">
                  <?php if(count($mentors)): ?>
                  <?php $__currentLoopData = $mentors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mentor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php 
                            if($mentor->user_img == ""){
                                $mentor->user_img = "https://picsum.photos/400";
                            }else{
                                $mentor->user_img = asset('/images/user_img/'.$mentor->user_img);
                            }
                          
                      ?>

                       <?php if (isset($component)) { $__componentOriginal002e1005d7efb18a57460cdde7b338f8c4c0068d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Mentor::class, ['img' => $mentor->user_img,'id' => $mentor->id,'name' => $mentor->fname.' '.$mentor->lname,'skill' => $mentor->skill]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal002e1005d7efb18a57460cdde7b338f8c4c0068d)): ?>
<?php $component = $__componentOriginal002e1005d7efb18a57460cdde7b338f8c4c0068d; ?>
<?php unset($__componentOriginal002e1005d7efb18a57460cdde7b338f8c4c0068d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                    <div class="col-12 ">
                      <div class="text-center bg-transparent py-10 py-md-20">
                          <h4 class=" m-0" style="color:var(--gray4)">No Mentors found.</h4>
                      </div>
                    </div>  
                <?php endif; ?>
            </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/search_mentor.blade.php ENDPATH**/ ?>