<li class="la-admin__invoice-items d-flex justify-content-between align-items-center">
    <div class="la-admin__item-info d-flex justify-content-between align-items-center"> 
        <div class="la-admin__item-img mr-5">
            <img src= <?php echo e($img); ?> alt= <?php echo e($course); ?> class="img-fluid" />
        </div>

        <div class="la-admin__item-desc">
            <strong><?php echo e($course); ?></strong> <br/>
            <span>by <?php echo e($profile); ?> </span>
        </div>
    </div>

    <div class="la-admin__item-price">$ <span><?php echo e($price); ?></span></div>
</li><?php /**PATH E:\lila-laravel\resources\views/components/admin-invoice.blade.php ENDPATH**/ ?>