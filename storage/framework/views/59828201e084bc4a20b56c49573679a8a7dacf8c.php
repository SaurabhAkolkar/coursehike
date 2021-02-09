<?php $__env->startSection('title', 'Forgot Password'); ?>


<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- top-nav bar start-->

<!-- top-nav bar end-->

<?php $__env->startSection('content'); ?>
<section id="signup" class="signup-block-main-block py-14 py-md-20" style="background:var(--gray)">
    <?php if(session('status')): ?>
        <div class="la-btn__alert position-relative">
            <div class="la-btn__alert-success col-md-4 offset-md-4 alert alert-success alert-dismissible fade show" role="alert">
                <span class="la-btn__alert-msg"><?php echo e(session('status')); ?></span>
                <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="color:#56188C">&times;</span>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 ">
                <div class="la-reset__password text-center la-anim__wrap">
                    <h1 class="la-reset__password-title text-2xl text-md-4xl la-anim__fade-in-top">Forgot Password</h1>
                    <p class="la-reset__password-tag la-anim__stagger-item" style="color: var(--gray6)">Provide email id to receive password reset link</p>

                    <div class="la-reset__password-info">
                        <?php if(session('status')): ?>
                            <div class="la-btn__alert position-relative">
                                <div class="la-btn__alert-success col-md-4 offset-md-4 alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="la-btn__alert-msg"><?php echo e(session('status')); ?></span>
                                    <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="color:#56188C">&times;</span>
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="/reset-passoword-mail">
                            <?php echo csrf_field(); ?>
                            <div class="form-group py-8 py-md-12">
                                <div class="col-md-3 offset-md-2 text-left la-anim__stagger-item">
                                    <label for="email" class="la-form__lable" style="color: var(--gray6);font-weight:var(--font-medium);">Email ID</label><br/>
                                </div>

                                <div class="col-md-8 offset-md-2 text-center la-anim__stagger-item">
                                    <input id="email" type="email" class="la-form__input <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your Email ID" required>

                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback text-right" role="alert" >
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row la-anim__stagger-item">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="la-btn__app w-50">Send Link</button>
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




<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>