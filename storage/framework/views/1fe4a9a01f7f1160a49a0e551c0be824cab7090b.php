<?php $__env->startSection('title', 'Category Slider - Admin'); ?>
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
              	<h3 class="la-admin__section-title mb-10"><?php echo e(__('adminstaticword.CategorySlider')); ?> </h3>
           		
	          	<div class="panel-body">
	          		<form action="<?php echo e(action('CategorySliderController@update')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

					
		                <div class="row">
		                  <div class="col-md-6">
		                  	<div class="form-group">
			                  <label for="heading"><?php echo e(__('adminstaticword.SelectCategory')); ?></label>
			                  <select class="form-control js-example-basic-single" name="category_id[]" multiple="multiple" size="3" required>

		                      <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							 
								<?php if($cat->status == 1): ?>
		                        <option value="<?php echo e($cat->id); ?>" <?php echo e(in_array($cat->id, $category_slider['category_id']) ? "selected": ""); ?>><?php echo e($cat->title); ?>

		                        </option>
		                        <?php endif; ?>

		                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		                    </select>
		                	</div>
		                  </div>
		                  <div class="col-md-6">
		                  	<div class="form-group">
		                      <input value="1" name="category_to_show" type="hidden" class="form-control" />
		                	</div>
		                  </div>
		              	</div>
		              	<br>
						
						<div class="row">
		                  <div class="col-md-6">
							<div class="box-footer">
								<button value="" type="submit"  class="btn btn-md btn-primary px-14"><?php echo e(__('adminstaticword.Save')); ?></button>
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/category_slider/edit.blade.php ENDPATH**/ ?>