<?php $__env->startSection('content'); ?>
 <!-- Main Section: Start-->
 <section class="la-cbg--main">
    <!-- Section: Start-->
    <section class="la-new--releases">
      <div class="container la-new__events ">
        <div class="row">
          <div class="col-12">
            <div class="la-announcement__main-title">
                <a class="la-new__back la-icon la-icon--5xl icon-back-arrow  mb-2" href="<?php echo e(URL::previous()); ?>"></a>
                <h1 class="head-font text-3xl text-md-4xl">New Releases</h1>
            </div>
          </div>

          <div class="col-12">
            <div class="la-new__announcements">
                <?php
                    $update1 = new stdClass;
                    $update1->img = "https://picsum.photos/350/300";
                    $update1->title = "Four new badges for learners!";
                    $update1->timestamp = "Just now";
                    $update1->updateId = "1";
                    $update1->desc = "Lorem Ipsum dolor sit amet, consectur sadispicing elitr,";
        
                    $updates = array($update1);

                ?>          
                
                <?php $__currentLoopData = $allReleases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($ar->layout == 1): ?>
                         <?php if (isset($component)) { $__componentOriginal20c6455f62a55bcfc1fadd9ef0de0ecd98c3dbfb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\NewUpdate::class, ['img' => asset('images/announcement/'.$ar->preview_image),'title' => $ar->title,'timestamp' => $ar->created_at,'updateId' => 1,'desc' => $ar->short_description.' '.$ar->long_description]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal20c6455f62a55bcfc1fadd9ef0de0ecd98c3dbfb)): ?>
<?php $component = $__componentOriginal20c6455f62a55bcfc1fadd9ef0de0ecd98c3dbfb; ?>
<?php unset($__componentOriginal20c6455f62a55bcfc1fadd9ef0de0ecd98c3dbfb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                  <?php elseif($ar->layout == 2): ?>
                           <?php if (isset($component)) { $__componentOriginalc4753755a26b11f53150fee85fb3b22fc23b1947 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppUpdate::class, ['title' => $ar->title,'timestamp' => $ar->created_at,'appId' => 1,'desc' => $ar->short_description.' '.$ar->long_description]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc4753755a26b11f53150fee85fb3b22fc23b1947)): ?>
<?php $component = $__componentOriginalc4753755a26b11f53150fee85fb3b22fc23b1947; ?>
<?php unset($__componentOriginalc4753755a26b11f53150fee85fb3b22fc23b1947); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                  <?php else: ?>
                         <?php if (isset($component)) { $__componentOriginalcaf0e9f9e9b18582167a1baa5fef0c1b121025cc = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\NewEvent::class, ['title' => $ar->title,'timestamp' => $ar->created_at,'about' => $ar->short_description,'img' => asset('images/announcement/'.$ar->preview_image),'eventId' => 1,'desc' => $ar->long_description]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalcaf0e9f9e9b18582167a1baa5fef0c1b121025cc)): ?>
<?php $component = $__componentOriginalcaf0e9f9e9b18582167a1baa5fef0c1b121025cc; ?>
<?php unset($__componentOriginalcaf0e9f9e9b18582167a1baa5fef0c1b121025cc); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                  <?php endif; ?>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
            </div>
          </div>


          <div class="col-12">
            <div class="la-new__announcements">
                <?php
                  $app1 = new stdClass;
                  $app1->title = "New app released for better learning";
                  $app1->timestamp = "2h ago";
                  $app1->appId = "1";
                  $app1->desc = "Lorem Ipsum dolor sit amet, consectur sadispicing elitr, sed diam nounumy eirmod tempor";
                
                  $apps = array($app1);
                ?>          
            
                <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if (isset($component)) { $__componentOriginalc4753755a26b11f53150fee85fb3b22fc23b1947 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppUpdate::class, ['title' => $app->title,'timestamp' => $app->timestamp,'appId' => 1,'desc' => $app->desc]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc4753755a26b11f53150fee85fb3b22fc23b1947)): ?>
<?php $component = $__componentOriginalc4753755a26b11f53150fee85fb3b22fc23b1947; ?>
<?php unset($__componentOriginalc4753755a26b11f53150fee85fb3b22fc23b1947); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 
            </div>
          </div>


          <div class="col-12">
            <div class="la-new__meet-events">
                 <?php
                    $event1 = new stdClass;
                    $event1->title = "Meet the mentors";
                    $event1->timestamp = "4h ago";
                    $event1->about = "Lorem Ipsum dolor sit amet, conseturur sadispicing elitr, sed diam nounmy erimod tempor";
                    $event1->img = "https://picsum.photos/850/250";
                    $event1->eventId = "1";
                    $event1->desc = "Lorem Ipsum dolor sit amet, conseturur sadispicing elitr, sed diam nounmy erimod tempor";
    
                    $events = array($event1);
                 ?>                   

                 <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if (isset($component)) { $__componentOriginalcaf0e9f9e9b18582167a1baa5fef0c1b121025cc = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\NewEvent::class, ['title' => $event->title,'timestamp' => $event->timestamp,'about' => $event->about,'img' => $event->img,'eventId' => $event->eventId,'desc' => $event->desc]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalcaf0e9f9e9b18582167a1baa5fef0c1b121025cc)): ?>
<?php $component = $__componentOriginalcaf0e9f9e9b18582167a1baa5fef0c1b121025cc; ?>
<?php unset($__componentOriginalcaf0e9f9e9b18582167a1baa5fef0c1b121025cc); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/new-releases.blade.php ENDPATH**/ ?>