<?php $__env->startSection('title', 'Reset Password'); ?>


<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- top-nav bar start-->

<!-- top-nav bar end-->

<?php $__env->startSection('content'); ?>
<section id="signup" class="signup-block-main-block py-14 py-md-20" style="background:var(--gray)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="la-reset__password text-center">
                    <h1 class="la-reset__password-title text-2xl text-md-4xl">Reset Password</h1>
                    <p class="la-reset__password-tag mb-0" style="color: var(--gray6)">Get yourself a more secured Password!</p>

                    <div class="la-reset__password-info py-10 py-md-16">
                        <form method="POST" action="<?php echo e(route('password.update')); ?>">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="token" value="<?php echo e($token); ?>">

                            <div class="form-group">
                                <div class="col-md-3 offset-md-2 text-left">
                                    <label for="email" class="la-form__lable" style="color: var(--gray6);font-weight:var(--font-medium);"><?php echo e(__('frontstaticword.E-MailAddress')); ?></label><br/>
                                </div>

                                <div class="col-md-8 offset-md-2 text-center">
                                    <input id="email" type="email" placeholder="Enter your Email ID" class="la-form__input<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" required autofocus>

                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 offset-md-2 text-left">
                                    <label for="email" class="la-form__lable" style="color: var(--gray6);font-weight:var(--font-medium);"><?php echo e(__('frontstaticword.Password')); ?></label><br/>
                                </div>
                                
                                <div class="col-md-8 offset-md-2 text-center">
                                    <input id="password" type="password" placeholder="Enter New Password" class="la-form__input<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 offset-md-2 text-left">
                                    <label for="email" class="la-form__lable" style="color: var(--gray6);font-weight:var(--font-medium);"><?php echo e(__('frontstaticword.ConfirmPassword')); ?></label><br/>
                                </div>
                                
                                <div class="col-md-8 offset-md-2 text-center">
                                    <input id="password-confirm" type="password" placeholder="Confirm New Password" class="la-form__input" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row py-10">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="la-btn__app ">
                                        <?php echo e(__('frontstaticword.ResetPassword')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>