<?php $__env->startSection('title', 'Dashboard - Creators'); ?>
<?php $__env->startSection('body'); ?>

<?php if(Auth::User()->role == "mentors"): ?>

<section class="content-header">
  <h3 class="la-admin__section-title">
    <?php echo e(__('adminstaticword.Dashboard')); ?>

    <span class="text-sm font-weight-normal"><?php echo e(__('adminstaticword.Instructor')); ?></span>
  </h3>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo e(__('adminstaticword.Home')); ?></a></li>
    <li class="active"><?php echo e(__('adminstaticword.Dashboard')); ?></li>
  </ol> -->
</section>
<section class="content">
	<!-- Main row -->
  <div class="row pr-md-20">
      <div class="col-lg-4 col-6">
        <div class="small-box bg-red">
          <div class="inner">
            <div class="icon">
              <span class="la-icon la-icon--5xl icon-courses"></span>
            </div>
            <p class="m-0"><?php echo e(__('adminstaticword.Course')); ?></p>
            <h3 class="m-0">
            	<?php
            		$course = App\Course::where('user_id', Auth::User()->id)->get();
            		if(count($course)>0){
            			echo count($course);
            		}
            		else{
            			echo "0";
            		}
            	?>
            </h3>
          </div>
         
          <a href="<?php echo e(url('course')); ?>" class="small-box-footer"> 
           <!-- <i class="fa fa-arrow-circle-right"></i> -->
            <span class="la-icon la-icon--5xl icon-black-arrow"></span>
          </a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4 col-6">
        <div class="small-box bg-green">
          <div class="inner">
            <div class="icon">
              <span class="la-icon la-icon--5xl icon-users"></span>
            </div>
            <p class="m-0"> Learners</p>
            <h3 class="m-0">
            	<?php
            		$cat = App\Order::where('instructor_id', Auth::User()->id)->get();
            		if(count($cat)>0){
            			echo count($cat);
            		}
            		else{
            			echo "0";
            		}
            	?>
            </h3>
          </div>
          <a href="<?php echo e(url('userenroll')); ?>" class="small-box-footer"> 
            
            <span class="la-icon la-icon--5xl icon-black-arrow"></span>
          </a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4 col-6">
        <div class="small-box bg-green">
          <div class="inner">
            <div class="icon">
              <span class="la-icon la-icon--5xl icon-revenue"></span>
            </div>
            <p class="m-0"> Revenue</p>
            <h3 class="m-0">
              0
            </h3>
          </div>
          <a href="<?php echo e(route('instructor.revenue')); ?>" class="small-box-footer"> 
            <span class="la-icon la-icon--5xl icon-black-arrow"></span>
          </a>
        </div>
      </div>

      
      <!-- ./col -->

       <!-- small box -->
      
      <!-- ./col -->
  </div>

  <div class="row my-md-10 pr-md-20">
        <!-- RECENT LEARNERS: START -->
      <div class="col-md-5">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recent Learners</h4>
          </div>
              <ul class="la-dash__recent-list">
                  <?php
                    if($course){
                        $courses_id = $course->pluck('id');
                        $users = App\UserPurchasedCourse::with('user')->whereIn('course_id', $courses_id)->groupBy('user_id')->limit(5)->get();
                    }
                  ?>

                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php if (isset($component)) { $__componentOriginal056e49ad3369a0ba833552b2470908888aa23ca6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminRecentSubscription::class, ['userImg' => $user->user->userImg,'userName' => $user->user->fullName,'userTag' => $user->user->role=='mentors'?'Creator':'Learner','userDate' => Carbon\Carbon::parse($user->crated_at)->format('M d, Y')]); ?>
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
                  <a href="" class="la-dash__more-btn">
                    <span class="la-icon la-icon--5xl icon-black-arrow"></span>
                  </a>
              </div>
        </div>
      </div>
       <!-- RECENT LEARNERS: END -->

      <!-- RECENTLY BOUGHT COURSES: START -->
      <div class="col-md-7">
        <div class="la-dash__recent-section">
          <div class="la-dash__recent-head">
            <h4 class="la-dash__recent-htitle">Recently Bought Courses</h4>
          </div>
              <ul class="la-dash__recent-list">
                <?php
                    if($course){
                      $courses_id = $course->pluck('id');
                      $courses = App\UserPurchasedCourse::with('course','course.user')->whereIn('course_id', $courses_id)->groupBy('course_id')->limit(5)->get();
                    }
                ?>

                  <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php if (isset($component)) { $__componentOriginalb94913b97a0e56d1b4f4e68a9f6cea0537d29b12 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminRecentBoughtCourse::class, ['courseImg' => $course->course->preview_image,'courseName' => $course->course->title,'courseTag' => $course->course->user->fullName,'courseDate' => Carbon\Carbon::parse($course->course->created_at)->format('M d, Y'),'coursePrice' => $course->course->price]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalb94913b97a0e56d1b4f4e68a9f6cea0537d29b12)): ?>
<?php $component = $__componentOriginalb94913b97a0e56d1b4f4e68a9f6cea0537d29b12; ?>
<?php unset($__componentOriginalb94913b97a0e56d1b4f4e68a9f6cea0537d29b12); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>

              <div class="la-dash__recent-more text-right">
                  <a href="<?php echo e(route('instructor.revenue')); ?>" class="la-dash__more-btn">
                    <span class="la-icon la-icon--5xl icon-black-arrow"></span>
                  </a>
              </div>
        </div>
      </div>
      <!-- RECENTLY BOUGHT COURSES: END -->

    </div>
  <!-- /.row -->
	
</section>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/instructor/dashboard.blade.php ENDPATH**/ ?>