<li class="la-announcement__item">
    <a class="la-announcement__link" href="/releases/<?php echo e($url); ?>">
        <div class="la-announcement__link-inner d-flex flex-row align-items-start">
            <div class="la-announcement__eprfle">
                <img class="d-block" src= "<?php echo e($img); ?>" alt= <?php echo e($event); ?> />
            </div>
             <div class="la-announcement__event text-sm"><?php echo e(strlen($event)>20?substr($event, 0, 20).'....':$event); ?></div>
        </div>
        <div class="la-announcement__timestamp text-right text-xs font-normal"> <?php echo e($timestamp); ?> </div>
    </a>
</li>


<?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/components/announcement.blade.php ENDPATH**/ ?>