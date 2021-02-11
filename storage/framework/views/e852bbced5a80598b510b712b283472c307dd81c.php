
    <div class="la-payment__card la-anim__stagger-item--x">
        <label class="la-payment__card-label text-sm"> <?php echo e($inputLabel); ?>: <span style="color:var(--danger);">*</span></label>
            <input class="form-control la-payment__card-input" 
                type= <?php echo e($inputType); ?> 
                value="<?php echo e(old($inputName)); ?>"
                name= <?php echo e($inputName); ?>

                id = <?php echo e($inputId); ?>

                placeholder="Enter <?php echo e($inputLabel); ?>"
            />
    </div>
<?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/components/payment.blade.php ENDPATH**/ ?>