<?php $__env->startSection('title', 'Sign Up'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<?php $__env->startSection('content'); ?>
<section id="signup" class="la-entry__sec">
    <div class="container-fluid la-entry__sec-inner">
        <div class="row la-entry__row ">
            <div class="col-md-7 la-entry__col la-entry__col-left h-100 d-none d-md-block la-anim__wrap">
                <div class="la-entry__slider-wrap d-flex align-items-center la-anim__fade-in-left">
                   <div class="swiper-container entry-swiper-container h-100 la-entry__slider">
                       <div class="swiper-wrapper">
                           <div class="swiper-slide" style="width: 80vw;height: 80vh;background-image:url(../images/learners/login-register/login-slide1.svg)"></div>
                            <div class="swiper-slide" style="width: 80vw;height: 80vh;background-image:url(../images/learners/login-register/login-slide2.svg)"></div>
                        </div>
                       <div class="swiper-pagination swiper-pagination-black"></div>
                   </div>
               </div> 
           </div>

            <div class="col-md-5  la-entry__col la-entry__col-right h-100">
                

                <div class="la-entry__content-wrap d-flex flex-column justify-content-center la-anim__wrap" >     
                    <div class="d-flex flex-column la-entry__content-top">
                        <form class="la-entry__form " method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="la-form__input-wrap la-entry__input-wrap la-anim__stagger-item">
                                <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-profile"></span></span>
                                <input type="text" class="la-form__input la-entry__input<?php echo e($errors->has('fname') ? ' is-invalid' : ''); ?>" name="fname" value="<?php echo e(old('fname')); ?>" id="fname" placeholder="First Name">
                                <?php if($errors->has('fname')): ?>
                                    <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                        <strong><?php echo e($errors->first('fname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="la-form__input-wrap la-entry__input-wrap la-anim__stagger-item">
                                <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-profile"></span></span>
                                <input type="text" class="la-form__input la-entry__input<?php echo e($errors->has('lname') ? ' is-invalid' : ''); ?>" name="lname" value="<?php echo e(old('lname')); ?>" id="lname" placeholder="Last Name">
                                <?php if($errors->has('lname')): ?>
                                    <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                        <strong><?php echo e($errors->first('lname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            
                            <div class="la-form__input-wrap la-entry__input-wrap la-anim__stagger-item">
                                <!-- <i class="fa fa-phone" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-contact-number"></span></span>
                                <input type="text" class="la-form__input la-entry__input<?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>" name="mobile" value="<?php echo e(old('mobile')); ?>" id="mobile" placeholder="Mobile Number" maxlength="10">
                                <?php if($errors->has('mobile')): ?>
                                    <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                        <strong><?php echo e($errors->first('mobile')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            
                            <div class="la-form__input-wrap la-entry__input-wrap la-anim__stagger-item">
                                <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-mail-id"></span></span>
                                <input type="email" class="la-form__input la-entry__input<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" id="email" placeholder="Email ID">
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="la-form__input-wrap la-entry__input-wrap la-anim__stagger-item">
                                <span class="la-entry__input-icon">
                                    <span class="la-icon la-icon--xl icon-birthday"></span>
                                </span>
                                <input class="la-form__input la-entry__input" type="text" value="" onfocus="(this.type='date')" name="dob" min='1899-01-01' max='<?php echo e(Carbon\Carbon::now()->subYear(18)->format('Y-m-d')); ?>' placeholder="Date of Birth(dd/mm/yyyy)">
                            </div>
                           
                            <div class="la-form__input-wrap la-entry__input-wrap la-anim__stagger-item">
                                <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                                <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-password"></span></span>
                                <input type="password" class="la-form__input la-entry__input<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" id="password" placeholder="Password">
                                <span class="la-entry__input-picon d-none" id="password_hide_icon"><span class="la-icon la-icon--xl icon-hide-Password"></span></span>
                                <span class="la-entry__input-picon" id="password_show_icon"><span class="la-icon la-icon--xl icon-show-password"></span></span>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert" style="margin-left:60px;position:absolute">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
        
                            
                            
                            
                            
                            <button type="submit" title="Sign Up" class="la-btn__app la-btn__secondary w-100 la-anim__stagger-item"><?php echo e(__('frontstaticword.Signup')); ?></button> 
                        </form>
                    </div>

                    <div class="la-entry__content-bottom text-center la-anim__wrap">
                        <span class="la-entry__bottom-title la-anim__fade-in-top">Register with</span>
                        <div class="d-flex justify-content-center align-items-center ">

                                
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
        
                    <!-- <div class="signin-link text-center btm-20">
                        <?php echo e(__('frontstaticword.Bysigningup')); ?> <a href="<?php echo e(url('terms_condition')); ?>" title="Policy"><?php echo e(__('frontstaticword.Terms&Condition')); ?> </a>, <a href="<?php echo e(url('privacy_policy')); ?>" title="Policy"><?php echo e(__('frontstaticword.PrivacyPolicy')); ?>.</a>
                    </div> -->

                    <div class="la-entry__other-option text-center mt-md-10"><?php echo e(__('frontstaticword.Alreadyhaveanaccount')); ?>? 
                        <span class="la-btn__plain text--burple text--md ml-2">
                            <a href="<?php echo e(route('login')); ?>" ><?php echo e(__('frontstaticword.Login')); ?></a>
                        </span>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


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
<?php echo $__env->make('learners.layouts.intro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/auth/register.blade.php ENDPATH**/ ?>