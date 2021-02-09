
<li class="la-dash__recent-item">
    <div class="col-8 la-dash__recent-info">
        <div class="la-dash__recent-img">
            <img src= <?php echo e($courseImg); ?> class="d-block" alt= <?php echo e($courseName); ?>>
        </div>
        
        <div class="la-dash__recent-desc">
            <div class="la-dash__recent-title"> <?php echo e($courseName); ?> </div>
            <div class="la-dash__recent-tag"> <?php echo e($courseTag); ?></div>
        </div>
    </div>

    <div class="col-2 la-dash__recent-date">
        <span class="la-dash__recent-subdate"> <?php echo e($courseDate); ?></span>
    </div>

    <div class="col-2 text-right la-dash__recent-price">
        <span class="la-dash__recent-pricetag"> $ <?php echo e($coursePrice); ?></span>
    </div>
</li>


<?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/components/admin-recent-bought-course.blade.php ENDPATH**/ ?>