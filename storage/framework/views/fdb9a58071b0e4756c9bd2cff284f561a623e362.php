<div class="col-12 col-lg-4 la-choose__plan la-anim__stagger-item px-0">
    <div class="col text-center px-0 ">
      <div class="la-choose__plans">
        <div class="card la-choose__card text-center">
          <div class="la-choose__box mb-4">
            <div class="la-choose__ptitle text-lg text-sm-2xl"><?php echo e($plan); ?></div>
            <div class="la-choose__price mt-2">
                
                <span class="la-choose__discount text-2xl text-sm-5xl mr-1"> <?php echo e($discount); ?></span>
                <!--<span class="la-choose__oldprice text-sm p-1"><?php echo e($oldPrice); ?></span>-->
            </div>
            <div class="la-choose__billing text-sm mt-1">Billed <?php echo e($plan); ?></div>
            <div class="la-choose__savings-bg">
              <div class="la-choose__savings-<?php echo e($class); ?>  text-xs mt-1">You save <?php echo e($saving); ?>%</div>
            </div>
          </div>
          <div class="la-choose__subscribe mt-5 mx-4">
            
              <div class="btn la-btn la-btn-secondary py-3 plan-subscribe" data-plan=<?php echo e($slug); ?>>Try it now</div>
            
            <p class="text-sm pt-2">Get access to all the Courses</p>
            <p class="la-choose__subscribe-trial text-sm mb-1">Get free 7 Days trial</p>
            <p class="text-sm mb-1">You won't be charged until <?php echo e(\Carbon\Carbon::now()->addDays(7)->format('M d, Y')); ?></p>
          </div>
          <hr>
          <div class="la-choose__content mb-3 text-left">
            <i class="la-icon--sm mr-5 icon-tick "></i><span class="text-sm">Global, experienced mentors</span><br>
            <i class="la-icon--sm mr-5 icon-tick"></i><span class="text-sm">Vast array of courses</span><br>
            <i class="la-icon--sm mr-5 icon-tick"></i><span class="text-sm">Flexible modes of learning</span>
          </div>
        </div>
      </div>
    </div>
</div>





<?php /**PATH E:\lila-laravel\resources\views/components/chooseplan.blade.php ENDPATH**/ ?>