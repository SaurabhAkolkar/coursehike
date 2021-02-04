<?php if(Session::has('success')): ?>
    <div class="la-btn__alert-success col-md-6 offset-md-3 animated fadeInDown alert alert-success" role="alert">
        <h6 class="la-btn__alert-msg"><?php echo e(Session::get('success')); ?></h6>
    </div>
<?php endif; ?>

<?php if(Session::has('delete')): ?>
    <div class="la-btn__alert-danger col-md-6 offset-md-3 animated fadeInDown alert alert-danger" role="alert">
        <h6 class="la-btn__alert-msg"><?php echo e(Session::get('delete')); ?></h6>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/admin/message.blade.php ENDPATH**/ ?>