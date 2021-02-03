<li class="la-dash__recent-item">
    <div class="la-dash__recent-info">
        <div class="la-dash__recent-img">
            <img src= "<?php echo e($userImg); ?>" class="img-fluid d-block" alt= <?php echo e($userName); ?>>
        </div>
        
        <div class="la-dash__recent-desc">
            <div class="la-dash__recent-title"> <?php echo e($userName); ?> </div>
            <div class="la-dash__recent-tag"> <?php echo e($userTag); ?></div>
        </div>
    </div>

    <div class="la-dash__recent-date">
        <span class="la-dash__recent-subdate"> <?php echo e($userDate); ?></span>
    </div>
</li>
<?php /**PATH E:\lila-laravel\resources\views/components/admin-recent-subscription.blade.php ENDPATH**/ ?>