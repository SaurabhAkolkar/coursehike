<li class="col-3 col-md-2 col-lg-1 pr-0 la-interests__items position-relative la-anim__stagger-item--x" id="interest_card_<?php echo e($id); ?>" <?php if(!$alreadyAdded): ?> onclick="addInterest(<?php echo e($id); ?>)" <?php else: ?> onclick="removeInterest(<?php echo e($id); ?>)" <?php endif; ?> >
    <div class="la-interests__item position-relative ">
        <img class="img-fluid d-block mx-auto la-interests__item-img" src= <?php echo e($img); ?> alt="<?php echo e($name); ?>">
    
        <div class="la-interests__overlay">
            <p class="la-interests__overlay-name m-0 la-anim__stagger-item text-capitalize leading-none"> <?php echo e($name); ?> </p>
           
        </div>
    </div>
    <!-- Delete Icon -->
    <?php if($alreadyAdded): ?> 
    <a class="la-interests__item-remove badge badge-light" role="button">
        <span>x</span>
    </a>
    <?php else: ?>
    <!-- Add Icon -->
    <a class="la-interests__item-add badge badge-light" role="button">
        <span>+</span>
    </a>
    <?php endif; ?>
</li><?php /**PATH E:\lila-laravel\resources\views/components/my-interest.blade.php ENDPATH**/ ?>