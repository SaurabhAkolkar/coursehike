<li class="la-notification__item">
    <a class="la-notification__link" href= <?php echo e($url); ?>>
        <div class="la-notification__link-inner d-flex flex-row align-items-start">
            <div class="la-notification__prfle">
                <img class="d-block" src= <?php echo e($img); ?> alt= <?php echo e($name); ?>>
            </div>
            <div class="la-notification__msg">
                <div class="la-notification__title text-sm pr-1"> <?php echo e($name); ?>

                    <span class="text-sm font-normal pr-1"><?php echo e($comment); ?></span>
                </div>
            </div>
        </div>
        <div class="la-notification__timestamp text-right text-xs font-normal"> <?php echo e($timestamp); ?></div>
    </a>
</li>

<?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/components/notification.blade.php ENDPATH**/ ?>