<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
          <img src="<?php echo e(Auth::User()->user_img); ?>"  class="rounded-circle img-fluid d-block" alt="User Image">

          <?php else: ?>
          <img src="<?php echo e(asset('images/default/user.jpg')); ?>"  class="rounded-circle img-fluid d-block" alt="User Image">

          <?php endif; ?>
        </div>

        <div class="pull-left info">
            <p class="mb-1"><?php echo e(Auth::User()->fname); ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(__('adminstaticword.Admin')); ?></a>
        </div>
      </div>

      <?php if(Auth::User()->role == "admin"): ?>
        <ul class="sidebar-menu" data-widget="tree">
          <!-- <li class="header"><?php echo e(__('adminstaticword.Navigation')); ?></li> -->
        
          <li class="<?php echo e(Nav::isRoute('admin.index')); ?>"><a href="<?php echo e(route('admin.index')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-dashboard mr-5" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Dashboard')); ?></span></a></li>

          <li class="<?php echo e(Nav::isRoute('user.index')); ?> <?php echo e(Nav::isRoute('create.subscription')); ?> <?php echo e(Nav::isRoute('store.user.course')); ?> <?php echo e(Nav::isRoute('user.add')); ?> <?php echo e(Nav::isRoute('user.edit')); ?>"><a href="<?php echo e(route('user.index')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-users  mr-4" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Users')); ?></span></a></li>

          <?php if(isset($zoom_enable) && $zoom_enable == 1): ?>
          <li class="<?php echo e(Nav::isRoute('meeting.create')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('zoom.setting')); ?> <?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('meeting.show')); ?> treeview">
            <a href="#">
              <i class="flaticon-live-1" aria-hidden="true"></i> <span><?php echo e(__('Zoom Live Meetings')); ?></span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('zoom.setting')); ?>"><a href="<?php echo e(route('zoom.setting')); ?>"><i class="flaticon-settings-1"></i><?php echo e(__('Zoom Settings')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('meeting.create')); ?>"><a href="<?php echo e(route('zoom.index')); ?>"><i class="fa fa-file-text-o"></i><?php echo e(__('Zoom Dashboard')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('meeting.show')); ?>"><a href="<?php echo e(route('meeting.show')); ?>"><i class="flaticon-online-education"></i><?php echo e(__('adminstaticword.AllMeetings')); ?></a></li>
            </ul>
          </li>
          <?php endif; ?>

          <?php if(isset($global_settings) && $global_settings->bbl_enable == 1): ?>
              <li class="<?php echo e(Nav::isRoute('bbl.setting')); ?> <?php echo e(Nav::isRoute('bbl.all.meeting')); ?> <?php echo e(Nav::isRoute('download.meeting')); ?> treeview">
                <a href="#">
                  <i class="flaticon-honesty" aria-hidden="true"></i> <span><?php echo e(__('Big Blue Meetings')); ?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo e(Nav::isRoute('bbl.setting')); ?>"><a href="<?php echo e(route('bbl.setting')); ?>"><i class="flaticon-settings"></i><?php echo e(__('Big Blue Button Settings')); ?></a></li>
                  <li class="<?php echo e(Nav::isRoute('bbl.all.meeting')); ?>"><a href="<?php echo e(route('bbl.all.meeting')); ?>"><i class="flaticon-terms-and-conditions"></i><?php echo e(__('List Meetings')); ?></a></li>
                </ul>
              </li>
          <?php endif; ?>

          <!-- <li class="<?php echo e(Nav::isResource('admin/country')); ?> <?php echo e(Nav::isResource('admin/state')); ?> <?php echo e(Nav::isResource('admin/city')); ?> treeview">
            <a href="#">
              <i class="flaticon-location" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Location')); ?></span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('admin/country')); ?>"><a href="<?php echo e(url('admin/country')); ?>"><i class="flaticon-flag"></i><?php echo e(__('adminstaticword.Country')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('admin/state')); ?>"><a href="<?php echo e(url('admin/state')); ?>"><i class="flaticon-placeholder"></i><?php echo e(__('adminstaticword.State')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('admin/city')); ?>"><a href="<?php echo e(url('admin/city')); ?>"><i class="flaticon-home"></i><?php echo e(__('adminstaticword.City')); ?></a></li>
            </ul>
          </li> -->

          <!--
          <li class="<?php echo e(Nav::isResource('currency')); ?>"><a href="<?php echo e(url('currency')); ?>"> <i class="flaticon-wallet"></i><span><?php echo e(__('adminstaticword.Currency')); ?></span></a></li>
          -->

          <li class="<?php if(Request::segment(1) == 'category' || Request::segment(1) == 'subcategory' || Request::segment(1) == 'course' ): ?> active menu-open <?php endif; ?> <?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('publishrequest')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('bundle')); ?> <?php echo e(Nav::isResource('courselang')); ?>  <?php echo e(Nav::isResource('coursereviewunpublish')); ?> treeview">
            <a href="#" class="d-flex align-items-center">
                <i class="la-icon la-icon--lg icon-courses mr-4"></i><?php echo e(__('adminstaticword.Course')); ?>

                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>                            

            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('category')); ?>  <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?>  treeview">
                  <a href="#" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-categories mr-4"></i><?php echo e(__('adminstaticword.Category')); ?><i class="fa fa-angle-left pull-right"></i></a>
                  
                  <ul class="treeview-menu">
                    <li class="<?php if(Request::segment(1) == 'category'): ?> active <?php endif; ?>"><a href="<?php echo e(url('category')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--sm icon-categories mr-4"></i><?php echo e(__('adminstaticword.Category')); ?></a></li>
                    <li class="<?php if(Request::segment(1) == 'subcategory'): ?> active <?php endif; ?>"><a href="<?php echo e(url('subcategory')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--sm icon-sub-category mr-4"></i><?php echo e(__('adminstaticword.SubCategory')); ?></a></li>
                    
                  </ul>

                  <li class="<?php if(Request::segment(1) == 'course'): ?> active <?php endif; ?>"><a href="<?php echo e(url('course')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-courses mr-4"></i><span><?php echo e(__('adminstaticword.Courses')); ?></span></a></li>

                  <!-- <li class="<?php echo e(Nav::isResource('bundle')); ?>"><a href="<?php echo e(url('bundle')); ?>"><i class="flaticon-interface" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.BundleCourse')); ?></span></a></li> -->

                  <li class="<?php echo e(Nav::isResource('courselang')); ?>"><a href="<?php echo e(url('courselang')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-course-language mr-4" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.CourseLanguage')); ?></span></a></li>
                  
                  <li class="<?php echo e(Nav::isResource('publishrequest')); ?>"><a href="<?php echo e(url('publishrequest')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-published-course mr-3" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.PublishRequest')); ?></span></a></li>
                  
                  <li class="<?php echo e(Nav::isResource('coursereviewunpublish')); ?>"><a href="<?php echo e(url('coursereviewunpublish')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-unpublished-course mr-3" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.UnpublishRequest')); ?></span></a></li>

                  
                  
              </li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('coupon')); ?>"><a href="<?php echo e(url('coupon')); ?>" class="d-flex align-items-center"><i class="la-icon  la-icon--lg icon-coupon mr-4" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Coupon')); ?></span></a></li>

          <li class="<?php echo e(Nav::isRoute('all.instructor')); ?> <?php echo e(Nav::isResource('requestinstructor')); ?> treeview">
           <a href="#" class="d-flex align-items-center">
             <i class="la-icon la-icon--xl icon-all-mentors mr-3" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Instructor')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('all.instructor')); ?>"><a href="<?php echo e(route('all.instructor')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-all-mentors mr-3"></i><?php echo e(__('adminstaticword.AllInstructor')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('requestinstructor')); ?>"><a href="<?php echo e(url('requestinstructor')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-request mr-4"></i><?php echo e(__('adminstaticword.InstructorRequest')); ?></a></li>
            </ul>
          </li> 
          

          <li class="<?php echo e(Nav::isResource('order')); ?>"><a href="<?php echo e(url('order')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-revenue mr-4" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Order')); ?></span></a></li>
         
         <!-- <li class="<?php echo e(Nav::isResource('page')); ?>"><a href="<?php echo e(url('page')); ?>"><i class="la-icon la-icon--lg icon-pages mr-4" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Pages')); ?></span></a></li> -->
          
          <li class="<?php echo e(Nav::isResource('faq')); ?> <?php echo e(Nav::isResource('faqinstructor')); ?>  treeview">
            <a href="#" class="d-flex align-items-center">
             <i class="la-icon la-icon--lg icon-faq mr-4" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Faq')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php if(Request::segment(1) == 'faq'): ?> active <?php endif; ?>"><a href="<?php echo e(url('faq')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-learner-faq mr-3"></i> <span><?php echo e(__('adminstaticword.FaqStudent')); ?></span></a></li>
              <li class="<?php echo e(Nav::isResource('faqinstructor')); ?>"><a href="<?php echo e(url('faqinstructor')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-mentor-faq mr-3"></i><span><?php echo e(__('adminstaticword.FaqInstructor')); ?></span></a></li>
            </ul>
          </li> 

         <li class="<?php echo e(Nav::isRoute('instructor.settings')); ?> <?php echo e(Nav::isRoute('admin.instructor')); ?> <?php echo e(Nav::isRoute('admin.completed')); ?>  treeview">
           <a href="#" class="d-flex align-items-center">
             <i class="la-icon la-icon--xl icon-mentor-payout mr-3" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.InstructorPayout')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              
              
              <li class="<?php echo e(Nav::isRoute('admin.creatorpayoutanalytics')); ?>"><a href="<?php echo e(route('admin.creatorpayoutanalytics')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-mentor-payout mr-3"></i>Payout Analytics</a></li>
              <li class="<?php echo e(Nav::isRoute('admin.creatorpayout')); ?>"><a href="<?php echo e(route('admin.creatorpayout')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-mentor-payout mr-3"></i><?php echo e(__('adminstaticword.CreatorPayout')); ?></a></li>
            
            </ul>
          </li> 

          <!-- <li class="<?php echo e(Nav::isResource('user/course/report')); ?>  treeview">
           <a href="#">
             <i class="flaticon-flag" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Report')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('user/course/report')); ?>"><a href="<?php echo e(url('user/course/report')); ?>"><i class="flaticon-error"></i><span><?php echo e(__('adminstaticword.Report')); ?> Course</span></a></li>
              <li class="<?php echo e(Nav::isResource('user/question/report')); ?>"><a href="<?php echo e(url('user/question/report')); ?>"><i class="flaticon-question-mark"></i><span><?php echo e(__('adminstaticword.Report')); ?> Question</span></a></li>
            </ul>
          </li> -->

          <li class="<?php echo e(Nav::isResource('slider')); ?> <?php echo e(Nav::isResource('settings')); ?> <?php echo e(Nav::isResource('facts')); ?> <?php echo e(Nav::isRoute('category.slider')); ?> <?php echo e(Nav::isResource('firstsection')); ?> <?php echo e(Nav::isResource('featuredMentors')); ?> <?php echo e(Nav::isResource('coursetext')); ?> <?php echo e(Nav::isResource('getstarted')); ?> <?php echo e(Nav::isResource('trusted')); ?> <?php echo e(Nav::isRoute('widget.setting')); ?> <?php echo e(Nav::isRoute('terms')); ?> <?php echo e(Nav::isResource('testimonial')); ?> treeview">
           <a href="#" class="d-flex align-items-center">
             <i class="la-icon la-icon--xl icon-front-Settings mr-3" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Setting')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php if(Request::segment(1) == 'settings'): ?> active <?php endif; ?>" ><a href="<?php echo e(url('settings')); ?>"  class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-settings mr-4" aria-hidden="true"></i><span>General <?php echo e(__('adminstaticword.Setting')); ?></span></a></li>
              <!-- <li class="<?php if(Request::segment(1) == 'slider'): ?> active <?php endif; ?>"><a href="<?php echo e(url('slider')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--xl icon-sliders mr-3"></i><span><?php echo e(__('adminstaticword.Slider')); ?></span></a></li>
              <li class="<?php if(Request::segment(1) == 'facts'): ?> active <?php endif; ?>"><a href="<?php echo e(url('facts')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-fact-sliders mr-4"></i><span><?php echo e(__('adminstaticword.FactsSlider')); ?></span></a></li>
              <li class="<?php if(Request::segment(1) == 'frontslider'): ?> active <?php endif; ?>"><a href="<?php echo e(route('category.slider')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--xl icon-category-sliders mr-3"></i><span><?php echo e(__('adminstaticword.CategorySlider')); ?></span></a></li>
              <li class="<?php if(Request::segment(1) == 'coursetext'): ?> active <?php endif; ?>"><a href="<?php echo e(url('coursetext')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--xl icon-course-text mr-3"></i> <?php echo e(__('adminstaticword.CourseText')); ?></a></li>
              <li class="<?php if(Request::segment(1) == 'getstarted'): ?> active <?php endif; ?>"><a href="<?php echo e(url('getstarted')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-get-started mr-4"></i><?php echo e(__('adminstaticword.GetStarted')); ?></a></li>
              <li class="<?php if(Request::segment(1) == 'trusted'): ?> active <?php endif; ?>"><a href="<?php echo e(url('trusted')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--md icon-trusted-sliders mr-5"></i><span><?php echo e(__('adminstaticword.TrustedSlider')); ?></span></a></li>
              <li class="<?php if(Request::segment(1) == 'widget'): ?> active <?php endif; ?>"><a href="<?php echo e(route('widget.setting')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-widget-settings mr-4"></i><?php echo e(__('adminstaticword.WidgetSetting')); ?></a></li>-->
              <li class="<?php if(Request::segment(1) == 'testimonial'): ?> active <?php endif; ?>"><a href="<?php echo e(url('testimonial')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-testimonials mr-4"></i><?php echo e(__('adminstaticword.Testimonial')); ?></a></li>
              <li class="<?php if(Request::segment(1) == 'firstsection'): ?> active <?php endif; ?>"><a href="<?php echo e(url('firstsection')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-first-section mr-4"></i><?php echo e(__('adminstaticword.FirstSection')); ?></a></li>
              <li class="<?php if(Request::segment(1) == 'featuredMentors'): ?> active <?php endif; ?>"><a href="<?php echo e(url('featuredMentors')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-featured-mentor mr-4"></i><?php echo e(__('adminstaticword.FeaturedMentors')); ?></a></li>
            </ul>
          </li>
          
           <!--<li class="<?php echo e(Nav::isRoute('gen.set')); ?> <?php echo e(Nav::isRoute('api.setApiView')); ?> <?php echo e(Nav::isResource('blog')); ?> <?php echo e(Nav::isRoute('about.page')); ?> <?php echo e(Nav::isRoute('careers.page')); ?> <?php echo e(Nav::isRoute('comingsoon.page')); ?> <?php echo e(Nav::isRoute('termscondition')); ?> <?php echo e(Nav::isRoute('policy')); ?> <?php echo e(Nav::isRoute('bank.transfer')); ?> <?php echo e(Nav::isRoute('show.pwa')); ?> <?php echo e(Nav::isRoute('adsense')); ?> treeview">
           <a href="#">
             <i class="flaticon-tools" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.SiteSetting')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('gen.set')); ?>"><a href="<?php echo e(route('gen.set')); ?>"><i class="flaticon-admin"></i><span><?php echo e(__('adminstaticword.Setting')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('api.setApiView')); ?>"><a href="<?php echo e(route('api.setApiView')); ?>"><i class="flaticon-report"></i><?php echo e(__('adminstaticword.APISetting')); ?></a></li>
              
              <li class="<?php echo e(Nav::isResource('blog')); ?>"><a href="<?php echo e(url('blog')); ?>"><i class="flaticon-real-state"></i><?php echo e(__('adminstaticword.Blog')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('about.page')); ?>"><a href="<?php echo e(route('about.page')); ?>"><i class="flaticon-book"></i><?php echo e(__('adminstaticword.About')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('careers.page')); ?>"><a href="<?php echo e(route('careers.page')); ?>"><i class="flaticon-mobile-marketing"></i><?php echo e(__('adminstaticword.Career')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('comingsoon.page')); ?>"><a href="<?php echo e(route('comingsoon.page')); ?>"><i class="flaticon-fast-time"></i><?php echo e(__('adminstaticword.ComingSoon')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('termscondition')); ?>"><a href="<?php echo e(route('termscondition')); ?>"><i class="flaticon-terms-and-conditions"></i><?php echo e(__('adminstaticword.Terms&Condition')); ?> </a></li>
              <li class="<?php echo e(Nav::isRoute('policy')); ?>"><a href="<?php echo e(route('policy')); ?>"><i class="flaticon-smartphone"></i> <?php echo e(__('adminstaticword.PrivacyPolicy')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('bank.transfer')); ?>"><a href="<?php echo e(route('bank.transfer')); ?>"><i class="flaticon-bank"></i> <?php echo e(__('adminstaticword.BankDetails')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('show.pwa')); ?>"><a href="<?php echo e(route('show.pwa')); ?>"><i class="flaticon-mobile-marketing" aria-hidden="true"></i><span> <?php echo e(__('adminstaticword.PWASetting')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('adsense')); ?>"><a href="<?php echo e(url('/admin/adsensesetting')); ?>" title="Page Setting"><span><i class="flaticon-settings-3"></i> &nbsp;&nbsp;<?php echo e(__('adminstaticword.AdsenseSetting')); ?></span></a></li>
              
              <?php if(isset($global_settings) && $global_settings->ipblock_enable == 1): ?>
              <li class="<?php echo e(Nav::isRoute('ipblock.view')); ?>"><a href="<?php echo e(url('admin/ipblock')); ?>" title="Page Setting"><span><i class="flaticon-error"></i> &nbsp;&nbsp;<?php echo e(__('adminstaticword.IPBlockSettings')); ?></span></a></li>
              <?php endif; ?>

            </ul>
          </li> -->

          <!-- <li class="<?php echo e(Nav::isRoute('player.set')); ?> <?php echo e(Nav::isRoute('ads')); ?> <?php echo e(Nav::isRoute('ad.setting')); ?> treeview">
           <a href="#">
             <i class="flaticon-video" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.PlayerSettings')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="<?php echo e(Nav::isRoute('player.set')); ?>"><a href="<?php echo e(route('player.set')); ?>"><i class="flaticon-digital-marketing"></i> <?php echo e(__('adminstaticword.PlayerCustomization')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('ads')); ?>"><a href="<?php echo e(url('admin/ads')); ?>" title="Create ad"><i class="flaticon-video-advertising"></i><?php echo e(__('adminstaticword.Advertise')); ?></a></li>
              <?php $ads = App\Ads::all(); ?>
              <?php if($ads->count()>0): ?>
              <li class="<?php echo e(Nav::isRoute('ad.setting')); ?>"><a href="<?php echo e(url('admin/ads/setting')); ?>" title="Ad Settings"><i class="flaticon-project-management"></i><?php echo e(__('adminstaticword.AdvertiseSettings')); ?></a></li>
              <?php endif; ?>

            </ul>
          </li> -->

         <!-- <li class="<?php echo e(Nav::isRoute('show.lang')); ?>"><a href="<?php echo e(route('show.lang')); ?>"><i class="flaticon-translation" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Language')); ?></span></a></li> -->

          <li class="<?php echo e(Nav::isResource('usermessage')); ?>"><a href="<?php echo e(url('usermessage')); ?>" class="d-flex align-items-center"><i class="la-icon la-icon--lg icon-messages mr-4" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.AllMessages')); ?></span></a></li>
        

         <!-- <li class="mt-md-20 pt-md-10">
          <a href="" class="d-flex align-items-center">
            <i class="la-icon la-icon--lg icon-help-filled mr-4"></i>
            <span>Help</span>
          </a>
        </li> -->

        <li class="">
          <a role="button" href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-flex align-items-center">
            <i class="la-icon la-icon--lg icon-logout mr-4"></i>
            <span><?php echo e(__('adminstaticword.Logout')); ?></span>
          </a>
          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
          </form>
        </li>

        </ul>
      <?php endif; ?>


    </section>
    <!-- /.sidebar -->
</aside><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>