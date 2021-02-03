<?php $__env->startSection('title', 'View Instructor - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-md-12">
    	<div class="box box-primary">
          	<h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.InstructorRequest')); ?></h3>
			   
			<div class="row py-10">
				<div class="col-3 h-100 px-0">
					<div class="la-admin__mentor-lft">
						<img src="<?php echo e(asset('images/user_img/'.$show->image)); ?>" alt="<?php echo e($show->fname); ?> <?php echo e($show['lname']); ?>" class="img-fluid mx-auto d-block la-admin__mentor-img" />
						<div class="la-admin__mentor-profile text-center pt-4">
							<h1 class="la-admin__mentor-name text-uppercase text-2xl mb-3"><?php echo e($show->fname); ?> <?php echo e($show['lname']); ?></h1>
							<div class="la-admin__mentor-contact  mb-1 d-flex align-items-center justify-content-center">
								<span class="la-icon la-icon--lg icon-contact-number" style="color:#000;"></span>
								<span class="ml-2"><?php echo e($show->mobile); ?> </span>
							</div>
							<div class="la-admin__mentor-contact mb-1 d-flex align-items-center justify-content-center">
								<span class="la-icon la-icon--xl icon-mail-id" style="color:#000;"></span>
								<span class="ml-2"><?php echo e($show->email); ?></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-1 text-center">
					<div class="la-admin__mentor-vline h-100"></div>
				</div>

				<div class="col-5 offset-1 h-100 px-0">
					<div class="la-admin__mentor-rgt">
						<div class="la-admin__mentor-list">
							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info"><?php echo e(__('adminstaticword.Role')); ?>:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc"><?php echo e($show->role); ?></span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info"><?php echo e(__('adminstaticword.DateofBirth')); ?>:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc"><?php echo e($show->dob); ?></span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info"><?php echo e(__('adminstaticword.Gender')); ?>:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc"><?php echo e($show->gender); ?></span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info"><?php echo e(__('Awards')); ?>:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc">
									<?php foreach(json_decode($show->awards) as $a)
										{
											echo $a;
										}
									?>
								</span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info"><?php echo e(__('Portfolio')); ?>:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc">
									<?php foreach(json_decode($show->portfolio_links) as $a)
										{
											echo $a.',';
										}
									?>
								</span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info"><?php echo e(__('adminstaticword.Detail')); ?>:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc"><?php echo e($show->detail); ?></span>
							</div>

							<div class="la-admin__mentor-item d-flex align-items-start">
								<span class="col-4 la-admin__mentor-info"><?php echo e(__('adminstaticword.Resume')); ?>:</span>
								<span class="col-8 text-capitalize la-admin__mentor-desc">
									<a class="la-admin__mentor-resume" href="<?php echo e(asset('files/instructor/'.$show->file)); ?>" download="<?php echo e($show->file); ?>"><?php echo e(__('adminstaticword.Download')); ?> <i class="la-icon icon-download"></i></a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-10">
					<form action="<?php echo e(route('requestinstructor.update',$show->id)); ?>" method="POST" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

						<?php echo e(method_field('PUT')); ?>


						<input type="hidden" value="<?php echo e($show->user_id); ?>" name="user_id" class="form-control">
								<input type="hidden" value="mentors" name="role" class="form-control">
						<input type="hidden" value="<?php echo e($show->mobile); ?>" name="mobile" class="form-control">
						<input type="hidden" value="<?php echo e($show->detail); ?>" name="detail" class="form-control">
						<input type="hidden" value="<?php echo e($show->gender); ?>" name="gender" class="form-control">
						<input type="hidden" value="<?php echo e($show->dob); ?>" name="dob" class="form-control">
						<input type="hidden" value="<?php echo e($show->image); ?>" name="image" class="form-control">

						<div class="row">
							<div class="col-md-2 pt-2 text-center">
								<label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
								<br>
								<li class="tg-list-item">
								<input class="la-admin__toggle-switch" id="cb333" type="checkbox" <?php echo e($show->status==1 ? 'checked' : ''); ?>>
								<label class="la-admin__toggle-label" data-tg-off="Pending" data-tg-on="Approved" for="cb333"></label>
								</li>
								<input type="hidden" name="status" value="<?php echo e($show->status); ?>" id="c33">
							</div>
						
						</div>
						<br>
						
						<div class="row">
							<div class="col-12 text-right mb-6">
								<button value="" type="submit"  class="btn btn-lg btn-primary px-20"><?php echo e(__('adminstaticword.Save')); ?></button>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/instructor/instructor_request/view.blade.php ENDPATH**/ ?>