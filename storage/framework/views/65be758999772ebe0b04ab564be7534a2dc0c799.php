<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
          <img src="<?php echo e(Auth::User()->user_img); ?>" class="img-circle img-fluid d-block rounded-circle" alt="User Image">

          <?php else: ?>
          <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle img-fluid d-block rounded-circle" alt="User Image">

          <?php endif; ?>
        </div>

        <div class="pull-left info">
          <p class="mb-1"><?php echo e(Auth::User()->fname); ?></p>
          <a href="#" style="font-size:10px;"><i class="fa fa-circle text-success"></i> <?php echo e(__('adminstaticword.Instructor')); ?></a>
        </div>
      </div>
 

      <?php if(Auth::User()->role == "mentors"): ?>
        <ul class="sidebar-menu" data-widget="tree">
          <!-- <li class="header"><?php echo e(__('adminstaticword.Navigation')); ?> </li> -->

          <li class="<?php echo e(Nav::isRoute('instructor.index')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('instructor.index')); ?>">
              <!-- <i class="flaticon-web-browser" aria-hidden="true"></i> -->
              <i class="la-icon la-icon--md icon-dashboard mr-6"></i>
              <span><?php echo e(__('adminstaticword.Dashboard')); ?></span>
            </a>
          </li>
          
          <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('course')); ?> <?php echo e(Nav::isResource('courselang')); ?> treeview">
              <a class="d-flex align-items-center" href="#">
                  <i class="la-icon la-icon--md icon-courses mr-6"></i><?php echo e(__('adminstaticword.Course')); ?>

                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>

              <ul class="treeview-menu">
                <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('course')); ?> <?php echo e(Nav::isResource('courselang')); ?> treeview">
                 
                  

                  <li  class="<?php if(Request::segment(1) == 'course'): ?> active <?php endif; ?>"><a class="d-flex align-items-center" href="<?php echo e(url('course')); ?>"> <i class="la-icon la-icon--lg icon-courses mr-4"></i><span><?php echo e(__('adminstaticword.Course')); ?></span></a></li>

                  <li class="<?php echo e(Nav::isResource('courselang')); ?>"><a class="d-flex align-items-center" href="<?php echo e(url('courselang')); ?>">  <i class="la-icon la-icon--lg icon-course-language mr-4"></i><span> <?php echo e(__('adminstaticword.Course')); ?> <?php echo e(__('adminstaticword.Language')); ?></span></a></li>
                  
                  
                 
                </li>
              </ul>
          </li>

          <!-- <li class="<?php echo e(Nav::isResource('userenroll')); ?>"><a href="<?php echo e(url('userenroll')); ?>"> <span class="la-icon la-icon--lg icon-users mr-4"></span><span> <?php echo e(__('adminstaticword.Users')); ?></span></a></li> -->

          

          <li class="<?php echo e(Nav::isResource('requests')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(url('requests')); ?>">
              <i class="la-icon la-icon--md icon-request mr-6"></i>
              <span>Requests</span>
            </a>
          </li>

          <!-- <li class="<?php echo e(Nav::isResource('blog')); ?>"><a href="<?php echo e(url('blog')); ?>"><i class="flaticon-personal-information"></i><?php echo e(__('adminstaticword.Blog')); ?></a></li> -->
          
          

          

          


          <li class="<?php echo e(Nav::isRoute('pending.payout')); ?> <?php echo e(Nav::isRoute('instructor.revenue')); ?> <?php echo e(Nav::isRoute('admin.completed')); ?> treeview">
            <a class="d-flex align-items-center" href="#">
              <i class="la-icon la-icon--lg icon-my-revenue mr-5"></i> <?php echo e(__('adminstaticword.MyRevenue')); ?>

              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>                            

            <ul class="treeview-menu">
              
              <li class="<?php echo e(Nav::isRoute('instructor.revenue')); ?>"><a class="d-flex align-items-center" href="<?php echo e(route('instructor.revenue')); ?>"><i class="la-icon la-icon--lg icon-revenue mr-4"></i><?php echo e(__('adminstaticword.Revenue')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('pending.payout')); ?>"><a class="d-flex align-items-center" href="<?php echo e(route('pending.payout')); ?>"><i class="la-icon la-icon--lg icon-pending-payout mr-4" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.PendingPayout')); ?></span></a></li>

              <li class="<?php echo e(Nav::isRoute('admin.completed')); ?>"><a class="d-flex align-items-center" href="<?php echo e(route('admin.completed')); ?>"><i class="la-icon la-icon--lg icon-completed-payout mr-4"></i><?php echo e(__('adminstaticword.CompletedPayout')); ?></a></li>
            </ul>
          </li>

          <?php if(isset($isetting)): ?>

          <li class="<?php echo e(Nav::isResource('instructor.pay')); ?>"><a  class="d-flex align-items-center" href="<?php echo e(route('instructor.pay')); ?>"><i class="la-icon la-icon--lg icon-revenue mr-4"></i> <span><?php echo e(__('adminstaticword.PayoutSettings')); ?></span></a></li>

          <?php endif; ?>
          
          <li class="<?php echo e(Nav::isResource('instructorquestion')); ?> <?php echo e(Nav::isResource('instructoranswer')); ?> treeview">
            <a class="d-flex align-items-center" href="#">
              <i class="la-icon la-icon--lg icon-faq mr-5"></i> <?php echo e(__('adminstaticword.Faq')); ?> 
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>                            

            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('instructorquestion')); ?>">
                <a class="d-flex align-items-center" href="<?php echo e(url('instructorquestion')); ?>">
                  <i class="la-icon la-icon--md icon-help-filled mr-4 "></i>
                  <span><?php echo e(__('adminstaticword.Question')); ?></span>
                </a>
              </li>
              <li class="<?php echo e(Nav::isResource('instructoranswer')); ?>">
                <a class="d-flex align-items-center" href="<?php echo e(url('instructoranswer')); ?>">
                  <i class="la-icon la-icon--lg icon-faq mr-4 mt-1"></i>
                  <span><?php echo e(__('adminstaticword.Answer')); ?></span>
                </a>
              </li>
            </ul>
          </li>

          <li class="mt-md-20 pt-md-20">
            <a href="/contact" class="d-flex align-items-center">
              <i class="la-icon la-icon--md icon-contact-number mr-4"></i>
              <span class="mt-1">Contact Us</span>
            </a>
          </li>

          <li class="">
            <a role="button" href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-flex align-items-center">
              <i class="la-icon la-icon--md icon-logout mr-5"></i>
              <span><?php echo e(__('adminstaticword.Logout')); ?></span>
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
              <?php echo csrf_field(); ?>
            </form>
          </li>
        <ul>
      <?php endif; ?>


    </section>
    <!-- /.sidebar -->
</aside><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/instructor/layouts/sidebar.blade.php ENDPATH**/ ?>