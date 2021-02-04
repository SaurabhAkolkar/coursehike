<!-- New App Releases -->

<li class="la-news__app-item la-anim__wrap">
    <h6 class="la-news__app-title head-font text-lg text-sm-2xl text-capitalize m-0 la-anim__stagger-item"> <?php echo e($title); ?> </h6>
    <p class="text-sm la-news__app-timestamp la-anim__stagger-item"> <?php echo e($timestamp); ?></p>
    <div class="la-news__app-content text-md  la-anim__stagger-item"> <?php echo e($desc); ?>

        <span class="la-news__app-desc collapse" id="app_<?php echo e($appId); ?>"> <?php echo e($desc); ?> </span>
    </div>
    <p class="la-news__readmore collapsed text-center text-sm-right mt-3 la-anim__stagger-item" role="button" href="#app_<?php echo e($appId); ?>" data-toggle="collapse" aria-expanded="true">Explore More</p>
</li><?php /**PATH E:\lila-laravel\resources\views/components/app-update.blade.php ENDPATH**/ ?>