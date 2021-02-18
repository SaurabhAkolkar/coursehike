<?php $__env->startSection('content'); ?>
 <!-- Main Section: Start-->
 <?php if(session('success')): ?>
  <div class="la-btn__alert position-relative">
    <div class="la-btn__alert-success col-lg-4 offset-lg-4  alert alert-success alert-dismissible" role="alert">
        <span class="la-btn__alert-msg"><?php echo e(session('success')); ?></span>
        <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:#56188C">&times;</span>
        </button>
    </div>
  </div>
  <?php endif; ?>
 <section class="la-cbg--main">
    <!-- Section: Strat-->
    <section class="la-contact--page">
      <div class="container">
        <div class="row la-anim__wrap">
          <!-- Column: Start-->
          <div class="col-12 mt-5 mt-lg-10 la-anim__stagger-item--x">
            <a class="la-back__page" href="<?php echo e(URL::previous()); ?>"> 
              <span class="la-icon la-icon--5xl icon-back-arrow"></span>
            </a>
          </div>
          <!-- Column: End-->
          <!-- Column: Start-->
          <div class="col-12 d-none d-sm-block ">
            <div class="la-contact__title text-center pt-5">
              <h1 class="la-anim__fade-in-top la-anim__A">CONTACT US</h1>
            </div>
          </div>
          <!-- Column: End-->
        </div>
        <div class="row la-contact--info d-flex flex-row justify-content-between la-anim__wrap">
          <!-- Column: Start-->
          <div class="col-12  col-md-7 col-lg-5 order-1 ">
            <div class="la-contact__lft">
              <div class="la-contact__connect order-first">
                <h6 class="m-0 text-xl text-md-2xl la-anim__stagger-item">Feel free to reach us</h6>
                <h2 class="text-5xl text-md-6xl la-anim__stagger-item">Let's Connect </h2>
                <p class="text-sm pt-2 la-anim__stagger-item">Your search for world-class mentors, loyal student base, ends with LILA. Holler at us! Let’s get talking!</p>
              </div>
              <div class="la-contact__btm d-none d-sm-block">
                <div class="la-contact__details la-anim__stagger-item"><span class="la-icon--xl icon-contact-number mr-3"></span><a  href="tel:+91 9999999999">+91 9999999999</a></div>
                <div class="la-contact__details d-flex align-items-center la-anim__stagger-item"><span class="la-icon--xl icon-mail-id mr-3"></span><a  href="mailto:ask@learnitlikealiens.com">ask@learnitlikealiens.com</a></div>
                <div class="la-contact__smedia mt-6">
                  <a class="la-anim__stagger-item" href="https://www.facebook.com/learnitlikealiens" target="_blank"><span class="la-icon la-icon--6xl icon-facebook"></a>
                  <a class="la-anim__stagger-item" href="https://www.instagram.com/learnitlikealiens/" target="_blank"><span class="la-icon la-icon--6xl icon-insta"></a>
                  <a class="la-anim__stagger-item" href="https://www.youtube.com/channel/UC1LRPWR4rltOLKiR7e-pWEg" target="_blank"><span class="la-icon la-icon--6xl icon-youtube"></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Column: End-->

          <!-- Mobile Column: Start-->
          <div class="col order-3 order-sm-none my-5 py-5 px-5 mx-4 d-block d-sm-none"> 
            <div class="la-contact__btm-mobile py-5 my-5">
              <div class="la-contact__details la-anim__stagger-item"><span class="la-icon--lg icon-contact-number mr-3"></span><a class="text-md" href="tel:">+91 9999999999</a></div>
              <div class="la-contact__details d-flex align-items-center la-anim__stagger-item"><span class="la-icon--lg icon-mail-id mr-3"></span><a class="text-md" href="mailto:ask@learnitlikealiens.com">ask@learnitlikealiens.com</a></div>
              <div class="la-contact__smedia la-anim__stagger-item mt-8">
                <a class="mr-1" href="https://www.facebook.com/learnitlikealiens" target="_blank"><span class="la-icon la-icon--5xl icon-facebook"></span></a>
                <a class="mr-1" href="https://www.instagram.com/learnitlikealiens/" target="_blank"><span class="la-icon la-icon--5xl icon-insta"></span></a>
                <a class="mr-1" href="https://www.youtube.com/channel/UC1LRPWR4rltOLKiR7e-pWEg" target="_blank"><span class="la-icon la-icon--5xl icon-youtube"></span></a>
              </div>
            </div>
          </div>
          <!-- Mobile Column: End-->

          <!-- Column: Start-->
          <div class="col-12 col-md-5 col-lg-4 order-2 order-sm-3 px-0 px-md-3">
            <div class="la-contact__title text-center pt-5 d-block d-sm-none">
              <h1 class="la-anim__fade-in-top la-anim__A">CONTACT</h1>
            </div>
            <div class="la-contact__rgt">
              <form class="la-contact__form" action="/contact" method="post"  id="contactForm">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-5 la-anim__stagger-item--x">
                  <label class="text-sm m-0" for="contName">Full Name <span style="color:var(--danger)">*</span></label>
                  <input class="form-control p-0" id="contName" type="text" name="fname" placeholder="Enter your name" required >
                </div>
                <div class="form-group mb-5 la-anim__stagger-item--x">
                  <label class="text-sm m-0" for="contEmail">Email <span style="color:var(--danger)">*</span></label>
                  <input class="form-control p-0" id="contEmail" type="email" name="email" placeholder="Enter your email id" required>
                </div>
                <div class="form-group mb-5 la-anim__stagger-item--x">
                  <label class="text-sm m-0" for="contPhone">Contact Number <span style="color:var(--danger)">*</span></label>
                  <input class="form-control p-0" id="contPhone" type="tel" name="mobile" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group mb-5 la-anim__stagger-item--x">
                  <label class="text-sm" for="contMsg">Message <span style="color:var(--danger)">*</span></label>
                  <textarea class="form-control text-msg p-2" id="contMsg" rows="5" cols="50" name="message" placeholder="Type here" required></textarea>
                </div>
                <div class="la-contact__btn text-right d-none d-sm-block la-anim__stagger-item--x">
                  <button class="btn btn-desktop text-lg text-center" type="submit" >SEND</button>
                </div>
                <!-- Mobile Button: Start-->
                <div class="la-contact__btn text-center pt-5 d-block d-sm-none la-anim__stagger-item">
                  <button class="btn btn-mobile btn-block text-lg text-center" type="submit">SEND</button>
                </div>
                <!-- Mobile Button: End-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/contact.blade.php ENDPATH**/ ?>