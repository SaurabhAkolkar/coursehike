<li class="la-news__meet-item la-anim__wrap">
    <h6 class="la-news__meet-title head-font text-lg text-sm-2xl m-0 text-capitalize la-anim__stagger-item--x"> <?php echo e($title); ?> </h6>
    <p class="text-sm la-news__meet-timestamp la-anim__stagger-item--x"> <?php echo e($timestamp); ?></p>

    <div class="la-news__meet-content">
        <p class="text-md la-anim__stagger-item--x"> <?php echo e($about); ?> </p>
        <div class="la-news__meet-banner la-anim__stagger-item">
          <img class="d-block" src= "<?php echo e($img); ?>" alt= <?php echo e($title); ?> />
        </div>
        <p class="text-md my-3 collapse la-anim__stagger-item" id= "event_<?php echo e($eventId); ?>" > <?php echo e($desc); ?> </p>
    </div>
    <p class="la-news__readmore collapsed text-center text-sm-right mt-3 la-anim__stagger-item" role="button" href="#event_<?php echo e($eventId); ?>" data-toggle="collapse" aria-expanded="true">See Event</p>
</li><?php /**PATH E:\lila-laravel\resources\views/components/new-event.blade.php ENDPATH**/ ?>