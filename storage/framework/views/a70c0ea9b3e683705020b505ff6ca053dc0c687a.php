<?php if(Session::has('success')): ?>
<div class="la-btn__alert position-relative">
    <div class="la-btn__alert-success col-lg-4 offset-lg-3 alert alert-success alert-dismissible fade show" role="alert">
        <span class="la-btn__alert-msg"><?php echo e(Session::get('success')); ?></span>
        <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="color:#56188C">&times;</span>
        </button>
    </div>
</div>
<?php endif; ?>

<?php if(Session::has('delete')): ?>
    <div class="la-btn__alert position-relative">
        <div class="la-btn__alert-danger col-lg-4 offset-lg-3 alert alert-danger alert-dismissible fade show" role="alert">
            <span class="la-btn__alert-msg"><?php echo e(Session::get('delete')); ?></span>
        </div>
        <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="color:#56188C">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/admin/message.blade.php ENDPATH**/ ?>