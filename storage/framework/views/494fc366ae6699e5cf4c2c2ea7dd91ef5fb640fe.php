<?php $__env->startSection('title', 'Widget Setting - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
   <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.WidgetSetting')); ?></h3>
           		
	          	<div class="panel-body">
	          		<form action="<?php echo e(action('WidgetController@update')); ?>" method="POST">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

		                
		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="heading"><?php echo e(__('adminstaticword.WidgetOne')); ?><sup class="redstar">*</sup></label>
		                    <input value="<?php echo e($show?$show['widget_one']:''); ?>" autofocus name="widget_one" type="text" class="form-control" placeholder="Enter widget" required/>
						  </div>
						</div> <br/>

						<div class="row">
	                      <div class="col-md-6">
	                        <label for="heading"><?php echo e(__('adminstaticword.WidgetTwo')); ?><sup class="redstar">*</sup></label>
	                        <input value="<?php echo e($show?$show['widget_two']:''); ?>" autofocus name="widget_two" type="text" class="form-control" placeholder="Enter widget" required/>
						  </div>
						</div><br/>

						<div class="row">
	                      <div class="col-md-6">
	                        <label for="heading"><?php echo e(__('adminstaticword.WidgetThree')); ?><sup class="redstar">*</sup></label>
	                        <input value="<?php echo e($show?$show['widget_three']:''); ?>" autofocus name="widget_three" type="text" class="form-control" placeholder="Enter widget" required/>
	                      </div>
			            </div>
			            <br/>
						
						<div class="row">
							<div class="col-6">
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/widget/edit.blade.php ENDPATH**/ ?>