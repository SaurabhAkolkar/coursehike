<?php $__env->startSection('title', 'Dashboard - Admin'); ?>
<?php $__env->startSection('body'); ?>

<?php if(Auth::User()->role == "admin"): ?>

<section class="content-header">
  <h3 class="la-admin__section-title mb-0">
    <?php echo e(__('adminstaticword.Dashboard')); ?>

    <span class="text-xs">LILA</span>
  </h3>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i><?php echo e(__('adminstaticword.Home')); ?></a></li>
    <li class="active"><?php echo e(__('adminstaticword.Dashboard')); ?></li>
  </ol> -->
</section>
<section class="content">
	<!-- Main row -->
    <div class="row pr-md-20">
        <div class="col-lg-4">
          <!-- small box -->
          <div class="small-box"> 
            <div class="inner">
              <div class="icon">
                <span class="la-icon la-icon--5xl icon-users"></span>
              </div>
              <p class="m-0"><?php echo e(__('adminstaticword.Users')); ?></p>
              <h3 class="m-0">
                  <?php
                   
                    if($users>0){

                      echo $users;
                    }
                    else{

                      echo "0";
                    }
                  ?>
              </h3>
          </div>

            <a href="<?php echo e(route('user.index')); ?>" class="small-box-footer"><!-- <?php echo e(__('adminstaticword.Moreinfo')); ?> --> 
              <!-- <i class="fa fa-arrow-circle-right"></i> -->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
            <div class="icon py-2">
             <!--  <i class="flaticon-layout"></i> -->
             <span class="la-icon la-icon--3xl icon-categories"></span>
            
            </div>
            <p><?php echo e(__('adminstaticword.Categories')); ?></p>
              <h3  class="m-0">
              	<?php
              	
              		if($categories != null){

              			echo $categories;
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>
            </div>
            <a href="<?php echo e(url('category')); ?>" class="small-box-footer"><!--<?php echo e(__('adminstaticword.Moreinfo')); ?>-->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <div class="icon py-1">
                <span class="la-icon la-icon--4xl icon-courses"></span>
              </div>
              <p><?php echo e(__('adminstaticword.Courses')); ?></p>
              <h3  class="m-0">
              	<?php
              		$course = App\Course::all();
              		if(count($course)>0){

              			echo count($course);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>       
            </div>  
            <a href="<?php echo e(url('course')); ?>" class="small-box-footer"><!-- <?php echo e(__('adminstaticword.Moreinfo')); ?> --> 
              <!--  <i class="fa fa-arrow-circle-right"></i> -->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
        </div>
    </div>

    <div class="row pr-md-20">
        <!-- ./col -->
        <div class="col-lg-4 pt-8">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <div class="icon">
                <!-- <i class="flaticon-shopping-cart-1"></i> -->
                <span class="la-icon la-icon--5xl icon-revenue"></span>
              </div>
              <p><?php echo e(__('adminstaticword.Orders')); ?></p>
              <h3  class="m-0">
              	<?php
              	
              		if($total != null){
                    echo ' $ '.$total;
              		}
              		else{
                    echo '0';
              		}
              	?>
              </h3>
            </div>
            <a href="<?php echo e(url('order')); ?>" class="small-box-footer"><!--<?php echo e(__('adminstaticword.Moreinfo')); ?> --> 
              <!--<i class="fa fa-arrow-circle-right"></i>-->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
        </div>
        <!-- ./col -->
           <!-- small box -->
        <!-- <div class="col-lg-3 col-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <div class="icon">
                <i class="flaticon-faq"></i>
              </div>
              <p><?php echo e(__('adminstaticword.Faqs')); ?></p>
              <h3  class="m-0">
              	<?php
              		$faq = App\FaqStudent::all();
              		if(count($faq)>0){

              			echo count($faq);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>        
            </div>
            <a href="<?php echo e(url('faq')); ?>" class="small-box-footer"><?php echo e(__('adminstaticword.Moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->

        <!-- ./col -->
         <!-- small box -->
        <!-- <div class="col-lg-3 col-6">
          <div class="small-box bg-orange">
            <div class="inner">
              <div class="icon">
                 <i class="flaticon-report"></i>
              </div>
               <p><?php echo e(__('adminstaticword.Pages')); ?></p>
              <h3  class="m-0"><?php
              		$review = App\Page::all();
              		if(count($review)>0){

              			echo count($review);
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>       
            </div>
            <a href="<?php echo e(url('page')); ?>" class="small-box-footer"> <?php echo e(__('adminstaticword.Moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <!-- ./col -->
        <div class="col-lg-4 pt-8">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <div class="icon">
              <!-- <i class="flaticon-teacher"></i>-->
              <span class="la-icon la-icon--5xl icon-all-mentors"></span>
              
              </div>
              <p><?php echo e(__('adminstaticword.Instructors')); ?></p>
              <h3  class="m-0">
                <?php
              	
              		if($mentor != null ){

              			echo $mentor;
              		}
              		else{

              			echo "0";
              		}
              	?>
              </h3>
            </div>
            <a href="<?php echo e(route('all.instructor')); ?>" class="small-box-footer"><!-- <?php echo e(__('adminstaticword.Moreinfo')); ?> --> 
              <!-- <i class="fa fa-arrow-circle-right"></i> -->
              <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
        </div>
        <!-- ./col -->
         <!-- small box -->
        
        <!-- ./col -->
    </div>
    <!-- /.row -->

	<!-- Main row -->
	<div class="row mr-md-20">
		<!-- Left col -->
    <div class="col-md-5">
      <!-- RECENTLY ADDED USERS LIST -->
      <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h3 class="la-dash__recent-htitle"><?php echo e(__('adminstaticword.LatestUsers')); ?></h3>
          </div>
           
          <ul class="la-dash__recent-list">
            <?php
              $users = App\User::limit(5)->orderBy('id', 'DESC')->get();
            ?>
            <!-- <div class="row users-list"> -->
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- <div class="col-md-8 px-0"> -->
                <li class="la-dash__recent-item ">
                  <div class="la-dash__recent-info">
                    <div class="la-dash__recent-img">
                      <?php if($user['user_img'] != null || $user['user_img'] !=''): ?>
                        <img src="<?php echo e($user['user_img']); ?>" class="img-fluid d-block" alt="<?php echo e($user['fname']); ?>">
                      <?php else: ?>
                        <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-fluid d-block" alt="<?php echo e($user['fname']); ?>">
                      <?php endif; ?>
                    </div>
                  
                    <div class="users-info la-dash__recent-desc ml-3 ">
                      <div class="users-list-name m-0 la-dash__recent-title" ><?php echo e($user['fname']); ?> <?php echo e($user['lname']); ?></div>
                      <div class="users-list-desc la-dash__recent-tag"><?php if($user->role == 'user'): ?> <?php echo e(ucfirst($user->role)); ?> <?php else: ?> Creator <?php endif; ?></div>
                    </div>
                  </div>
                  <!-- </div> -->
                  <div class="la-dash__recent-date">
                    <span class="users-list-date la-dash__recent-subdate"><?php echo e(date('F Y', strtotime($user['created_at']))); ?></span>
                  </div>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- </div> -->
            <!-- /.users-list -->
          </ul>
          <!-- /.box-body -->
          <div class="la-dash__recent-more text-right">
            <a href="<?php echo e(route('user.index')); ?>" class="la-dash__more-btn">
                <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
          <!-- /.box-footer -->
      </div>
      <!--/.box -->
    </div>

    <!-- RECENTLY ADDED COURSES LIST -->
    <div class="col-md-7">
      <div class="la-dash__recent-section">
        <div class="la-dash__recent-head">
          <h3 class="la-dash__recent-htitle"><?php echo e(__('adminstaticword.RecentCourses')); ?></h3>
        </div>
        <?php
          $courses = App\Course::limit(5)->orderBy('id', 'DESC')->get()
        ?>
        <?php if(!$courses->isEmpty()): ?>
            
              <!-- /.box-header -->
          <ul class="la-dash__recent-list">
            <!-- <ul class="products-list product-list-in-box"> -->
              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class=" la-dash__recent-item">
                <div class="la-dash__recent-info">
                  <div class="la-dash__recent-img">
                    <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                      <img class="img-fluid d-block" src="<?php echo $course['preview_image'];  ?>" alt="Course Image">
                    <?php else: ?>
                      <img class="img-fluid d-block" src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" alt="Course Image">
                    <?php endif; ?>
                  </div>

                  <div class="la-dash__recent-desc">
                    <div class=" la-dash__recent-title "><?php echo e(str_limit($course['title'], $limit = 25, $end = '...')); ?></div>
                    <div class="product-description la-dash__recent-tag">
                        <?php echo e(str_limit($course->short_detail, $limit = 40, $end = '...')); ?>

                    </div>
                  </div>
                </div>

                <div class="la-dash__recent-date d-flex justify-content-between align-items-center">
                  <div class="users-list-date la-dash__recent-subdate"><?php echo e(date('F Y', strtotime($user['created_at']))); ?></div>
                  <div class="label label-warning ml-20 ">
                      <?php if( $course->type == 1): ?>
                        <?php
                            $currency2 = App\Currency::first();
                        ?>
                        <?php if($course->discount_price == !NULL): ?>
                        <span class="la-dash__recent-price"><i class="<?php echo e($currency2['icon']); ?>"></i><?php echo e($course['discount_price']); ?></span>
                        <?php else: ?>
                        <span class="la-dash__recent-price"><i class="<?php echo e($currency2['icon']); ?>"></i><?php echo e($course['price']); ?></span>
                        <?php endif; ?>
                      <?php else: ?>
                        <span class="la-dash__recent-price"><?php echo e(__('adminstaticword.Free')); ?></span>
                      <?php endif; ?>
                  </div>
                </div>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- </ul> -->
          </ul>
          <!-- /.box-body -->
          <div class="la-dash__recent-more text-right">
            <a href="<?php echo e(url('course')); ?>" class="la-dash__more-btn">
                <span class="la-icon la-icon--5xl icon-black-arrow"></span>
            </a>
          </div>
          <!-- /.box-footer -->
      <?php endif; ?>
    </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <!-- RECENT SUBSCRIPTIONS: START -->
    <div class="col-md-5">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recent Subscriptions</h4>
          </div>
              <ul class="la-dash__recent-list">
                
                  <?php $__currentLoopData = $recent_subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php if (isset($component)) { $__componentOriginal056e49ad3369a0ba833552b2470908888aa23ca6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminRecentSubscription::class, ['userImg' => $recent->user->user_img,'userName' => $recent->user->fullName,'userTag' => $recent->user->role=='admin'||$recent->user->role=='mentors'?'Creator':'Learner','userDate' => Carbon\Carbon::parse($recent->created_at)->format('M d Y')]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal056e49ad3369a0ba833552b2470908888aa23ca6)): ?>
<?php $component = $__componentOriginal056e49ad3369a0ba833552b2470908888aa23ca6; ?>
<?php unset($__componentOriginal056e49ad3369a0ba833552b2470908888aa23ca6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>

              <div class="la-dash__recent-more text-right">
                  <a href="<?php echo e(url('order')); ?>" class="la-dash__more-btn">
                    <span class="la-icon la-icon--5xl icon-black-arrow"></span>
                  </a>
              </div>
        </div>
    </div>
    <!-- RECENT SUBSCRIPTIONS: END -->

     <!-- RECENTLY BOUGHT COURSES: START -->
    <div class="col-md-7">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recently Bought Courses</h4>
          </div>
              <ul class="la-dash__recent-list">
                  <?php $__currentLoopData = $recent_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($rc->course): ?>
                         <?php if (isset($component)) { $__componentOriginalb94913b97a0e56d1b4f4e68a9f6cea0537d29b12 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminRecentBoughtCourse::class, ['courseImg' => $rc->course->preview_image,'courseName' => $rc->course->title,'courseTag' => $rc->course->category_id,'courseDate' => Carbon\Carbon::parse($rc->course->created_at)->format('M d Y'),'coursePrice' => $rc->price]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalb94913b97a0e56d1b4f4e68a9f6cea0537d29b12)): ?>
<?php $component = $__componentOriginalb94913b97a0e56d1b4f4e68a9f6cea0537d29b12; ?>
<?php unset($__componentOriginalb94913b97a0e56d1b4f4e68a9f6cea0537d29b12); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>

              <div class="la-dash__recent-more text-right">
                  <a href="<?php echo e(url('order')); ?>" class="la-dash__more-btn">
                    <span class="la-icon la-icon--5xl icon-black-arrow"></span>
                  </a>
              </div>
        </div>
    </div>
    <!-- RECENTLY BOUGHT COURSES: END -->

  
   <!-- PENDING CREATOR REQUESTS: START -->
    <div class="col-md-12">
        <div class="la-dash__recent-section">
            <div class="la-dash__recent-head">
              <h4 class="la-dash__recent-htitle pb-4">Pending Creator Requests</h4>
            </div>
      
            <div class="la-dash__pending-section px-10">
                <div class="row no-gutters d-flex justify-content-between  la-dash__pending-head">
                    <div class="col-1 la-dash__pending-title">#</div>
                    <div class="col-3 la-dash__pending-title">Creator Name</div>
                    <!-- <div class="col la-dash__pending-title">Crourse ID</div> -->
                    <div class="col-4 la-dash__pending-title">Course Name</div>
                    <div class="col-2 la-dash__pending-title">On</div>
                    <div class="col-2 la-dash__pending-title">Request Type</div>
                </div>

                <div class="la-dash__pending-body">
                  <ul class="la-dash__pending-list">
                      <?php
                          $requests = App\PublishRequest::with('user','course')->where(['status'=>1])->limit(5)->get();
                          $i = 0;
                      ?>

                      <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($r->course): ?>
                           <?php if (isset($component)) { $__componentOriginalb6e61f772882ce87110ef3ffc75696af4fc7b9f1 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminPendingRequest::class, ['sr' => ++$i,'creatorName' => $r->user->fullName,'courseName' => $r->course->title,'dateOn' => Carbon\Carbon::parse($r->created_at)->format('M d Y'),'requestType' => $r->request_type=='publish'?'Publish':'Unpublish']); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalb6e61f772882ce87110ef3ffc75696af4fc7b9f1)): ?>
<?php $component = $__componentOriginalb6e61f772882ce87110ef3ffc75696af4fc7b9f1; ?>
<?php unset($__componentOriginalb6e61f772882ce87110ef3ffc75696af4fc7b9f1); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      <?php if(count($requests) == 0): ?>
                        <div class="text-center py-12">
                            <h4 style="color:var(--gray8)">No Requests Found</h4>
                        </div>
                      <?php endif; ?>
                  </ul>
                </div>
            </div>

            <div class="la-dash__recent-more text-right">
              <a href="<?php echo e(url('publishrequest')); ?>" class="la-dash__more-btn">
                <span class="la-icon la-icon--5xl icon-black-arrow"></span>
              </a>
            </div>
        </div>
    </div>
    <!-- PENDING CREATOR REQUEST: END -->


    <!-- TABLE: LATEST ORDERS -->
		
	</div>
</section>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>