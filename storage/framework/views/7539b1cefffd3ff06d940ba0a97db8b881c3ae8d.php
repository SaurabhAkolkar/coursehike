<?php if(Session::has('success')): ?>
    <div class="la-btn__alert-success col-md-6 offset-md-3 animated fadeInDown alert alert-success" role="alert">
        <span class="la-btn__alert-msg"><?php echo e(Session::get('success')); ?></span>
    </div>
<?php endif; ?>

<?php if(Session::has('delete')): ?>
    <div class="la-btn__alert-danger col-md-6 offset-md-3 animated fadeInDown alert alert-danger" role="alert">
        <span class="la-btn__alert-msg"><?php echo e(Session::get('delete')); ?></span>
    </div>
<?php endif; ?>
<?php /**PATH E:\lila-laravel\resources\views/admin/message.blade.php ENDPATH**/ ?>