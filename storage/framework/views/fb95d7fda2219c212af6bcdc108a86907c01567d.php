<?php
use Carbon\Carbon;
use App\CourseProgress;
use App\Announcement;
?>
<?php if(Auth::check()): ?>

  <!-- Header: Start-->
  <header class="la-header">
      <div class="la-header__inner px-5 py-3 d-flex align-items-center">
        <div class="la-header__lft d-inline-flex align-items-center">
          <a class="la-header__brandwrap" href="/">
            <img class="la-header__brand" src="/images/learners/logo.svg" alt="Lila">
          </a>
          <!-- <div class="la-header__nav d-none d-md-inline-flex  align-items-center">
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/user-dashboard">Dashboard</a></div>
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/browse/courses">Browse Courses</a></div>
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/my-courses">My Courses</a></div>
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/mentors">Mentors</a></div>
          </div> -->

           <?php if (isset($component)) { $__componentOriginal57193885944b7086cf66c1ef89b640387cd0ba3d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Login::class, []); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal57193885944b7086cf66c1ef89b640387cd0ba3d)): ?>
<?php $component = $__componentOriginal57193885944b7086cf66c1ef89b640387cd0ba3d; ?>
<?php unset($__componentOriginal57193885944b7086cf66c1ef89b640387cd0ba3d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

        </div>
        
        <form class="form-inline mb-0 d-none d-md-block" action="<?php echo e(url('/search-course/')); ?>" method="get">
          <div class="form-group la-header__gsearch"  >
            <input class="la-gsearch__input form-control text-md px-0 la-header__gsearch-input pl-4" id="header_search_input" type="text" name="course_name" value="<?php echo e(isset($search_input)?$search_input:''); ?>" placeholder="Looking for creative courses by the best artists in the world?" required>
          </div>
        </form>

        <div class="la-header__rht ml-auto">
          <div class="la-header__menu d-inline-flex align-items-center position-relative">
            
            <div class="la-header__menu-item d-none d-md-block">
              <!-- Global Search: Start-->
              <div class="la-gsearch  mb-0" > 
                  <button class="la-gsearch__submit btn px-0" type="submit" id="header_search">
                    <i class="la-icon la-icon--xl icon icon-search la-header__gsearch-icon"></i>
                  </button>
              </div>
              <!-- Global Search: End-->
            </div>

            <?php if(Auth::user()->role == 'mentors' || Auth::user()->role == 'admin'): ?>
              <div class="la-header__menu-item d-none d-lg-block <?php if(Request::segment(1) == 'admins'): ?> active <?php endif; ?>">
                  <a class="la-header__menu-link la-header__menu-icon la-icon la-icon--xl icon-admin" role="button" target="_blank" href="/admins"></a>
              </div>
            <?php endif; ?>

            <div class="la-header__menu-item d-none d-lg-block <?php if(Request::segment(1) == 'profile'): ?> active <?php endif; ?>">
              <a class="la-header__menu-link la-header__menu-icon la-icon icon-profile" href="/profile"></a>
            </div>
            
            <div class="la-header__menu-item dropdown"><a class="la-header__menu-link la-header__menu-icon dropdown-toggle la-icon icon-notification " id="notificationPanel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><sup class="la-header__menu-badge badge badge-light" id="notificationBadge"><?php echo e(count(Auth::user()->unreadNotifications)); ?></sup> </a>
              <div class="dropdown-menu dropdown-menu-right bg-transparent" aria-labelledby="notificationPanel" style="border:none !important;">
                  <ul class="card la-notification__card">
                    <!-- Notification Panel: Start -->

                    <?php $__currentLoopData = Auth::user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     
                       <?php if (isset($component)) { $__componentOriginalc38fa723bbde1cde1a8279f40704f35cdf16b365 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Notification::class, ['img' => $notification->data['image'],'name' => $notification->data['id'],'comment' => $notification->data['data'],'timestamp' => Carbon::parse($notification->created_at)->format('d-m-Y')]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc38fa723bbde1cde1a8279f40704f35cdf16b365)): ?>
<?php $component = $__componentOriginalc38fa723bbde1cde1a8279f40704f35cdf16b365; ?>
<?php unset($__componentOriginalc38fa723bbde1cde1a8279f40704f35cdf16b365); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <?php if(count(Auth::user()->unreadNotifications) == 0): ?>
                      <div class="d-flex justify-content-center align-items-center my-auto">
                        <div class="text-xl head-font" style="color:var(--gray8);font-weight:var(--font-semibold)">No Notifications Found</div>
                      </div>                                                   
                    <?php endif; ?>

                    <!-- Notification Panel: End -->
                  </ul>
                <a class="la-notification__clear-all position-fixed" href="#" onclick="clearNotification()">
                  <div class="text-center">CLEAR ALL</div>
                </a>
              </div>
            </div>
            
            <div class="la-header__menu-item dropdown">
              <?php
                  $announcements = [];
                  $old_announcements = [];
                  if(Auth::User()->subscription('main') && Auth::User()->subscription('main')->active())
                  {
                      $courses_id = CourseProgress::where('user_id', Auth::User()->id)->pluck('course_id');
                      $last_annoucement_check = Auth::user()->last_annoucement_check;
                    
                    if($last_annoucement_check==null){
                      $last_annoucement_check = Auth::user()->created_at;
                    }
                      $announcements = Announcement::where('updated_at','>=', $last_annoucement_check)
                                                      ->whereIn('course_id', $courses_id)
                                                      ->where('status',1)
                                                      ->orderBy('updated_at', 'DESC')
                                                      ->get();
                      
                      $old_announcements = Announcement::where('updated_at','<', $last_annoucement_check)
                                                      ->whereIn('course_id', $courses_id)
                                                      ->where('status',1)
                                                      ->orderBy('updated_at', 'DESC')
                                                      ->get();
                      
                      
                  }
                  
              ?>
            <a class="la-header__menu-link la-header__menu-icon dropdown-toggle la-icon icon-announcement" onclick="markNotificationRead()" id="announcementPanel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <sup class="la-header__menu-badge badge badge-light" id="releaseNotificationBadge"><?php echo e(count($announcements)); ?></sup></a>
              <div class="dropdown-menu dropdown-menu-right bg-transparent" aria-labelledby="announcementPanel" style="border:none;">
                <div class="card la-announcement__card">
                  <div class="la-announcement__name d-flex justify-content-between">
                    <h6 class="text-xl body-font">New Releases</h6>
                    <a class="la-announcement__view-more" href="/releases">
                      <span class="la-announcement__view-icon la-icon la-icon--6xl icon-grey-arrow mt-n3"></span>
                    </a>
                  </div>
                      <!-- Announcements Panel: Start -->
                      
                       <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         
                              <?php
                                
                                  if($anno->preview_image == "")
                                  {
                                    $anno->preview_image = "https://picsum.photos/50";
                                  }else{
                                    $anno->preview_image = asset('/images/announcement/'.$anno->preview_image);
                                  }
                                 
                                  $timestamp = $anno->created_at->diffInDays(Carbon::now());
                                  if($timestamp > 0){
                                    $timestamp = $timestamp.' Days Ago';
                                  }else{
                                    $timestamp = 'Today';
                                  }                      
                              ?>
                            
                             <?php if (isset($component)) { $__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Announcement::class, ['url' => $anno->id,'img' => $anno->preview_image,'event' => $anno->title,'timestamp' => $timestamp]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963)): ?>
<?php $component = $__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963; ?>
<?php unset($__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                        <?php $__currentLoopData = $old_announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         
                              <?php
                                
                                  if($anno->preview_image == "")
                                  {
                                    $anno->preview_image = "https://picsum.photos/50";
                                  }else{
                                    $anno->preview_image = asset('/images/announcement/'.$anno->preview_image);
                                  }
                                 
                                  $timestamp = $anno->created_at->diffInDays(Carbon::now());
                                  if($timestamp > 0){
                                    $timestamp = $timestamp.' Days Ago';
                                  }else{
                                    $timestamp = 'Today';
                                  }                      
                              ?>
                            
                             <?php if (isset($component)) { $__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Announcement::class, ['url' => $anno->id,'img' => $anno->preview_image,'event' => $anno->title,'timestamp' => $timestamp]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963)): ?>
<?php $component = $__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963; ?>
<?php unset($__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                      <!-- Announcements Panel: End -->          
                </div>
              </div>
            </div>

            <div class="la-header__menu-item d-none d-lg-block">
              <?php
                  $cart = App\Cart::with('cartItems')->where(['user_id' => Auth::User()->id, 'status' => 1])->get();
                                
              ?>
              <a class="la-header__menu-link la-header__menu-icon la-icon icon-cart position-relative <?php if(Request::segment(1) == 'cart'): ?> active <?php endif; ?>" href="/cart"><sup class="la-header__menu-badge badge badge-light" ><?php echo e(count($cart)); ?></sup></a>
            </div>

            <div class="d-none d-lg-block la-header__menu-item la-header__menu-item--btn ml-5">
              <a class="la-header__menu-link la-header__menu-icon la-icon icon-hamburger-menu font-weight-normal"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
              <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" style="border:none !important;">
                <a class="dropdown-item la-header__dropdown-item text-sm <?php if(Request::segment(1) == 'learning-plans'): ?> active <?php endif; ?>" href="/learning-plans">Learning Plans</a>
                <a class="dropdown-item la-header__dropdown-item text-sm <?php if(Request::segment(1) == 'become-creator'): ?> active <?php endif; ?>" href="/become-creator">Become a Creator</a>
                <a class="dropdown-item la-header__dropdown-item text-sm <?php if(Request::segment(1) == 'guided-creator'): ?> active <?php endif; ?>" href="/guided-creator">Guided Creator</a>
                <a class="dropdown-item la-header__dropdown-item text-sm <?php if(Request::segment(1) == 'about'): ?> active <?php endif; ?>" href="/about">About Us</a>
                <a class="dropdown-item la-header__dropdown-item text-sm <?php if(Request::segment(1) == 'contact'): ?> active <?php endif; ?>" href="/contact">Contact Us</a>

                <a class="dropdown-item la-header__dropdown-item text-sm" role="button" href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <span>Logout</span>
                  <form id="logout-form" class="mb-0" action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                  </form>
                </a>
              </div>
            </div>

            <div class="d-lg-none position-relative la-header__menu-item la-header__sidemenu-btn">
                <span class="la-icon la-icon--xl icon-hamburger-menu"></span>
            </div>

          </div>

        </div>
      </div>
  </header>
   <!-- Header: End-->

<?php else: ?> 

  <!-- Header: Start-->
  <header class="la-header">
    <div class="la-header__inner px-5 py-3 d-flex align-items-center">
      <div class="la-header__lft d-inline-flex align-items-center">
        <a class="la-header__brandwrap" href="/">
          <img class="la-header__brand" src="/images/learners/logo.svg" alt="Lila">
        </a>
        
        <!-- header nav links -->
         <?php if (isset($component)) { $__componentOriginal57193885944b7086cf66c1ef89b640387cd0ba3d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Login::class, []); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal57193885944b7086cf66c1ef89b640387cd0ba3d)): ?>
<?php $component = $__componentOriginal57193885944b7086cf66c1ef89b640387cd0ba3d; ?>
<?php unset($__componentOriginal57193885944b7086cf66c1ef89b640387cd0ba3d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

      </div>

      <form class="form-inline mb-0 d-none d-md-block" action="<?php echo e(url('/search-course/')); ?>" method="get">
        <div class="form-group la-header__gsearch"  >
          <input class="la-gsearch__input form-control text-md px-0 la-header__gsearch-input pl-4" id="header_search_input" type="text" name="course_name" value="<?php echo e(isset($search_input)?$search_input:''); ?>" placeholder="Looking for creative courses by the best artists in the world?" required>
        </div>
      </form>

      <div class="la-header__rht ml-auto mr-md-5">
        <div class="la-header__menu d-inline-flex align-items-center">

          <div class="la-header__menu-item d-none d-md-block">
              <!-- Global Search: Start-->
              <div class="la-gsearch  mb-0" > 
                  <button class="la-gsearch__submit btn px-0" type="submit" id="header_search">
                    <i class="la-icon la-icon--xl icon icon-search la-header__gsearch-icon"></i>
                  </button>
              </div>
              <!-- Global Search: End-->
          </div>
          
          <div class="la-header__menu-item">
            <a class="la-header__nav-link " href="/login">Login</a>
          </div>
          
          <div class="la-header__menu-item dropdown">
            <a class="la-header__menu-link la-header__menu-icon dropdown-toggle la-icon icon-announcement" id="announcementPanel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
            <div class="dropdown-menu dropdown-menu-right bg-transparent" aria-labelledby="announcementPanel" style="border:none !important;">
              <div class="card la-announcement__card">
                <div class="la-announcement__name d-flex justify-content-between">
                  <h6 class="text-xl body-font">New Releases</h6>
                  <a class="la-announcement__view-more" href="/releases">
                    <span class="la-announcement__view-icon la-icon la-icon--6xl icon-grey-arrow mt-n3"></span>
                  </a>
                </div>
                    <!-- Announcements Panel: Start -->
                    <?php
                      $new1 = new stdClass;
                      $new1->url = "";
                      $new1->img = "https://picsum.photos/50";
                      $new1->event = "Four new badges for learners!";
                      $new1->timestamp = "Just now";

                      $new2 = new stdClass;
                      $new2->url = "";
                      $new2->img = "https://picsum.photos/50";
                      $new2->event = "New app released for better learning";
                      $new2->timestamp = "Just now";

                      $new3 = new stdClass;
                      $new3->url = "";
                      $new3->img = "https://picsum.photos/50";
                      $new3->event = "Meet the mentors at this event";
                      $new3->timestamp = "2h";

                      $new4 = new stdClass;
                      $new4->url = "";
                      $new4->img = "https://picsum.photos/50";
                      $new4->event = "Four new badges for learners!";
                      $new4->timestamp = "2h";

                      $new5 = new stdClass;
                      $new5->url = "";
                      $new5->img = "https://picsum.photos/50";
                      $new5->event = "New app released for better learning";
                      $new5->timestamp = "2h";

                      $new6 = new stdClass;
                      $new6->url = "";
                      $new6->img = "https://picsum.photos/50";
                      $new6->event = "Meet the mentors at this event";
                      $new6->timestamp = "Just now";

                      $news = array($new1, $new2, $new3, $new4, $new5, $new6);
                    ?>

                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php if (isset($component)) { $__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Announcement::class, ['url' => $new->url,'img' => $new->img,'event' => $new->event,'timestamp' => $new->timestamp]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963)): ?>
<?php $component = $__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963; ?>
<?php unset($__componentOriginal4aba3cbb39d4a7d1f3abcd50003653760261e963); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
                    <!-- Announcements Panel: End -->          
              </div>
            </div>
          </div> 

          <div class="d-none d-lg-inline-block la-header__menu-item">
            <a class="la-header__menu-link la-header__menu-icon icon-hamburger-menu font-weight-normal" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
            <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" style="border:none;">
              <a class="dropdown-item la-header__dropdown-item text-sm <?php if(Request::segment(1) == 'become-creator'): ?> active <?php endif; ?>" href="/become-creator">Become a Creator</a>
              <a class="dropdown-item la-header__dropdown-item text-sm <?php if(Request::segment(1) == 'guided-creator'): ?> active <?php endif; ?>" href="/guided-creator">Guided Creator</a>
              <a class="dropdown-item la-header__dropdown-item text-sm <?php if(Request::segment(1) == 'about'): ?> active <?php endif; ?>" href="/about">About Us</a>
              <a class="dropdown-item la-header__dropdown-item text-sm <?php if(Request::segment(1) == 'contact'): ?> active <?php endif; ?>" href="/contact">Contact Us</a>
            </div>
          </div>

          <div class="d-lg-none position-relative la-header__menu-item la-header__sidemenu-btn">
            <span class="la-icon la-icon--xl icon-hamburger-menu"></span>
          </div>

        </div>
        
      </div>
    </div>
  </header>
<?php endif; ?>
  <!-- Header: End--><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/learners/pages/header.blade.php ENDPATH**/ ?>