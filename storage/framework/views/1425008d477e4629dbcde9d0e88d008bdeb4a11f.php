<?php $__env->startSection('title', 'Course Text - Admin'); ?>
<?php $__env->startSection('body'); ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
 
<section class="content">
   <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.CourseText')); ?></h3>
           	
	          	<div class="panel-body">
	          		<form action="<?php echo e(action('CoursetextController@update')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

		                
		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="heading"><?php echo e(__('adminstaticword.Heading')); ?><sup class="redstar">*</sup></label>
		                    <input value="<?php echo e($show?$show['heading']: ''); ?>" autofocus required name="heading" type="text" class="form-control" placeholder="Enter Course Text Heading"/>
						  </div>
						</div><br/>
						  
						<div class="row">
		                  <div class="col-md-6">
		                    <label for="sub_heading"><?php echo e(__('adminstaticword.SubHeading')); ?><sup class="redstar">*</sup></label>
		                    <input value="<?php echo e($show?$show['sub_heading']: ''); ?>" autofocus required name="sub_heading" type="text" class="form-control" placeholder="Enter Course Text Sub Heading"/>
		                  </div>
		              	</div><br>
						  

						<div class="row">
		                  <div class="col-md-6">
							<div class="box-footer">
								<button value="" type="submit" class="btn btn-md btn-primary px-14"><?php echo e(__('adminstaticword.Save')); ?></button>
							</div>
						</div>
						</div>
		          	</form>
	          	</div>
	      	</div>
      	</div>
  	</div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/course_text/edit.blade.php ENDPATH**/ ?>