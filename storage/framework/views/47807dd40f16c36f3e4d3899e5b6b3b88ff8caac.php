<div class="col-12 la-anim__stagger-item la-anim__B">
    <div class="la-mccourse">
        <div class="la-mccourse__imgwrap">
            <img class="img-fluid  mx-auto d-block" src= "<?php echo e($img); ?>" alt= <?php echo e($title); ?> />
        </div>
      
        <div class="la-mccourse__overlay">
            <a class="la-mccourse__tag">
                <img class="img-fluid" src="./images/learners/home/master-class.svg" alt="Master Class">
            </a>
            <a class="la-mccourse__type" href="/learn/course/<?php echo e($id); ?>/<?php echo e($slug); ?>">
                <span class="la-mccourse__type-icon la-icon la-icon--md icon-play"></span>
            </a>
            <div class="la-mccourse__title leading-tight text-nowrap"><?php echo e($title); ?></div>

            <div class="la-mccourse__btm">
                <div class="la-mccourse__cprofile">
                    <div class="la-mccourse__cprofile-imgwrap">
                        <img class="img-fluid" src= "<?php echo e($profileImg); ?>"   alt= "<?php echo e($profileName); ?>" />
                    </div>
                    <div class="la-mccourse__cprofile-name"><?php echo e($profileName); ?> </div>
                </div>
            </div>
            <div class="la-mccourse__learners mt-4"><?php echo e($learners); ?> Learners</div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/components/master-class.blade.php ENDPATH**/ ?>