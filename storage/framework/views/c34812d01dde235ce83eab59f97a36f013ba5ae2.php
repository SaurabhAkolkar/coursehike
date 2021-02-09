<?php $__env->startSection('title', 'Login'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- top-nav bar start-->

<!-- top-nav bar end-->

<!-- Signup start-->
<?php $__env->startSection('content'); ?>

    <section id="signup" class="la-entry__sec">
        <div class="container-fluid la-entry__sec-inner ">
            <div class="row la-entry__row h-100">
                <div class="col-md-7 la-entry__col la-entry__col-left h-100 d-none d-md-block la-anim__wrap">
                    <div class="la-entry__slider-wrap d-flex align-items-center la-anim__fade-in-left">
                        <div class="swiper-container entry-swiper-container h-100 la-entry__slider ">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide " style="width: 80vw;height: 80vh;background-image:url(../images/learners/login-register/login-slide1.svg)"></div>
                                <div class="swiper-slide" style="width: 80vw;height: 80vh;background-image:url(../images/learners/login-register/login-slide2.svg)"></div>
                            </div>
                            <div class="swiper-pagination swiper-pagination-black"></div>
                        </div>
                    </div> 
                </div>

                <div class="col-md-5 la-entry__col la-entry__col-right h-100">
                    

                    <div class="la-entry__content-wrap d-flex flex-column justify-content-center">  
                        <div class="d-flex flex-column la-entry__content-top mt-md-5 la-anim__wrap">
                                <form method="POST" class="signup-form la-entry__form" action="<?php echo e(route('login')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="la-form__input-wrap la-entry__input-wrap mb-md-10 la-anim__stagger-item">
                                        <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                                        <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-mail-id"></span></span>
                                        <input id="email" type="email" class="la-form__input la-entry__input<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Enter Your E-Mail"   name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                
                                        <?php if($errors->has('email')): ?>
                                            <span class="invalid-feedback" role="alert"  style="margin-left:60px;position:absolute">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                
                                    <div class="la-form__input-wrap la-entry__input-wrap  mb-md-6 la-anim__stagger-item">
                                        <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                                        <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-password"></span></span>
                                        <input id="password" type="password" class="la-form__input la-entry__input<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Enter Your Password" name="password" required>
                                        <span class="la-entry__input-picon d-none" id="password_hide_icon"><span class="la-icon la-icon--xl icon-hide-Password "></span></span>
                                        <span class="la-entry__input-picon" id="password_show_icon"><span class="la-icon la-icon--xl icon-show-password "></span></span>

                                        <?php if($errors->has('password')): ?>
                                            <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <!-- <div class="form-group">                       
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    
                                                <label class="form-check-label text-sm" for="remember">
                                                    <?php echo e(__('Remember Me')); ?>

                                                </label>
                                            </div>
                                        </div> -->
                                        <div class="form-group ml-auto la-anim__stagger-item">
                                            <div class="forgot-password la-btn__plain text--burple text-right mb-md-8">
                                                <a class="text-sm" href="<?php echo e('password/reset'); ?>" title="sign-up"><?php echo e(__('frontstaticword.ForgotPassword')); ?> ?</a>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="form-group la-anim__stagger-item">
                                        <button type="submit"  class="la-btn__app la-btn__secondary py-md-4 text-sm w-100">
                                            <?php echo e(__('frontstaticword.Login')); ?>

                                        </button>   
                                    </div>
                
                                    
                                </form>
                        </div>
                            
                        <div class="la-entry__content-bottom text-center pt-md-14 la-anim__wrap">
                            <span class="la-entry__bottom-title la-anim__fade-in-top">Login with</span>
                            <div class="d-flex justify-content-center align-items-center">
                                    
                                    
                                        <div class="la-entry__social-lnk la-anim__stagger-item">
                                            <a href="<?php echo e(url('/auth/facebook')); ?>" target="_blank" title="facebook" class="" title="Facebook">
                                                <span class="la-icon la-icon--6xl icon-facebook-colored"></span>
                                                
                                            </a>
                                        </div>
                                    

                                    
                                    <div class="la-entry__social-lnk la-anim__stagger-item">
                                        <a href="<?php echo e(url('/auth/linkedin')); ?>" target="_blank" title="linkedin" class="" title="Linkedin">
                                            <span class="la-icon la-icon--6xl icon-linkedin-colored"></span>
                                            
                                        </a>
                                    </div>
                                    

                                    
                                        <div class="la-entry__social-lnk la-anim__stagger-item">
                                            <a href="<?php echo e(url('/auth/google')); ?>" target="_blank" title="google" class="" title="google">
                                                <span class="la-icon la-icon--6xl icon-google-colored"><span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span></span>
                                                
                                            </a>
                                        </div>
                                    
                                    
                                    
                
                                
                                    
                
                                    
                            </div>
                        </div>
                        
                        <div class="la-anim__wrap">
                            <div class="text-center la-entry__other-option mt-md-8 la-anim__fade-in-left"><?php echo e(__('frontstaticword.Donothaveanaccount')); ?>?
                                <span class="la-btn__plain text--burple text--md ml-2 la-anim__stagger-item--x">
                                    <a href="<?php echo e(route('register')); ?>" title="sign-up">  <?php echo e(__('frontstaticword.Signup')); ?></a>
                                </span>
                            </div>  
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<!--  Signup end-->

<!-- jquery -->

<!-- end jquery -->
<?php $__env->startSection('footerScripts'); ?>
<script>
    $('#password_show_icon').click(function(){
        $(this).addClass('d-none');
        $('#password_hide_icon').removeClass('d-none');
        $('#password').prop('type', 'text');
    });

    $('#password_hide_icon').click(function(){
        $(this).addClass('d-none');
        $('#password_show_icon').removeClass('d-none');
        $('#password').prop('type', 'password');
    });
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('learners.layouts.intro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/auth/login.blade.php ENDPATH**/ ?>