<?php $__env->startSection('content'); ?>
<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
      <div class="container-fluid">
        <div class="la-anim__wrap d-md-flex justify-content-between align-items-center">
          <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-2 la-anim__stagger-item--x" href="<?php echo e(URL::previous()); ?>"></a>
          <h1 class="la-page__title mb-4 mb-md-8 la-anim__stagger-item">Alien Mentors</h1>

          <!-- Global Search: Start-->
          <div class="la-gsearch la-anim__stagger-item--x">
            <form class="form-inline" action="/search-mentor" method="post">
              <?php echo csrf_field(); ?>
              <div class="form-group d-flex align-items-center">
                <input class="la-gsearch__input w-100 form-control la-gsearch__input-browsecourses" name="name" type="text" style="background:transparent" placeholder="Looking for your favourite Alien mentor?">
              </div>
              <button class="la-gsearch__submit btn" type="submit"><i class="la-icon icon-search la-gsearch__input-icon"></i></button>
            </form>
          </div>
          <!-- Global Search: End-->
        </div>
        <?php  
          $mentor1 = new stdClass;$mentor1->name="Alton Crew";$mentor1->img="https://picsum.photos/400";$mentor1->skill="Photography";
          $mentor2 = new stdClass; $mentor2->name="Alton"; $mentor2->img="https://picsum.photos/400"; $mentor2->skill="Design";
          $mentor3 = new stdClass;$mentor3->name="Amy D'souza";$mentor3->img="https://picsum.photos/400";$mentor3->skill="Tattoo";
          $mentor4 = new stdClass;$mentor4->name="Amy D'souza";$mentor4->img="https://picsum.photos/400";$mentor4->skill="Tattoo";
          $mentor5 = new stdClass;$mentor5->name="Amy D'souza";$mentor5->img="https://picsum.photos/400";$mentor5->skill="Tattoo";
          $mentor6 = new stdClass; $mentor6->name="Amy D'souza";$mentor6->img="https://picsum.photos/400";$mentor6->skill="Tattoo";
          $mentor7 = new stdClass; $mentor7->name="Amy D'souza";$mentor7->img="https://picsum.photos/400";$mentor7->skill="Tattoo";
          $mentor8 = new stdClass; $mentor8->name="Amy D'souza";$mentor8->img="https://picsum.photos/400";$mentor8->skill="Tattoo";
          $mentor9 = new stdClass; $mentor9->name="Amy D'souza";$mentor9->img="https://picsum.photos/400";$mentor9->skill="Tattoo";


          //$mentors = array($mentor1, $mentor2, $mentor3, $mentor4, $mentor5, $mentor6, $mentor7, $mentor8, $mentor9);
        ?>

        <div class="la-mentors ">
          <div class="row la-anim__wrap pt-4 pt-lg-10">
              
                <?php $__currentLoopData = $mentors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mentor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/mentors.blade.php ENDPATH**/ ?>