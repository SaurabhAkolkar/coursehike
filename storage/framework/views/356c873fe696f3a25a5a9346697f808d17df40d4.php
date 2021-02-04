<?php $__env->startSection('title', 'Edit Facts Slider - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
    	<div class="box box-primary">
          <h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.FactsSlider')); ?></h3>
       	
        	<div class="panel-body">
        		<form action="<?php echo e(route('facts.update',$show->id)); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

				
				
                <div class="row">
                  <div class="col-md-6">
                    <label for="icon"> <?php echo e(__('adminstaticword.Icon')); ?><sup class="redstar">*</sup></label>
                    <input value="<?php echo e($show->icon); ?>" autofocus required name="icon" type="text" class="form-control icp-auto icp" placeholder="Enter Facts Icon"/>
                  </div> 
                </div><br/>

                <div class="row">
                  <div class="col-md-6">
                    <label for="heading"> <?php echo e(__('adminstaticword.Heading')); ?><sup class="redstar">*</sup></label>
                    <input value="<?php echo e($show->heading); ?>" autofocus required name="heading" type="text" class="form-control" placeholder="Enter Facts Heading"/>
                  </div>
                </div><br/>

                <div class="row">
                  <div class="col-md-6">
                    <label for="sub_heading"> <?php echo e(__('adminstaticword.SubHeading')); ?><sup class="redstar">*</sup></label>
                    <input value="<?php echo e($show->sub_heading); ?>" autofocus required name="sub_heading" type="text" class="form-control" placeholder="Enter Facts Sub Heading"/>
                  </div>
              	</div>
              	<br><br/>
                
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/slider_facts/edit.blade.php ENDPATH**/ ?>