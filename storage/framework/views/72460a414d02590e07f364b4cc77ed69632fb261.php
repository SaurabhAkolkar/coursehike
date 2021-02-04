<?php $__env->startSection('title', 'Get Started - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
   <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.GetStarted')); ?></h3>
           		
	          	<div class="panel-body">
	          		<form action="<?php echo e(action('GetstartedController@update')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

		                
		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="heading"><?php echo e(__('adminstaticword.Heading')); ?></label>
		                    <input value="<?php echo e($show?$show['heading']:''); ?>" autofocus name="heading" type="text" class="form-control" placeholder="Enter Heading"/>
						  </div>
						</div><br/>

						<div class="row">
		                  <div class="col-md-6">
		                    <label for="sub_heading"><?php echo e(__('adminstaticword.SubHeading')); ?></label>
		                    <input value="<?php echo e($show?$show['sub_heading']: ''); ?>" autofocus name="sub_heading" type="text" class="form-control" placeholder="Enter Sub Heading"/>
		                  </div>
		              	</div>	<br/>
		              

		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="button_txt"><?php echo e(__('adminstaticword.ButtonText')); ?></label>
		                    <input value="<?php echo e($show?$show['button_txt']: ''); ?>" autofocus name="button_txt" type="text" class="form-control" placeholder="Enter Button Text"/>
		                  </div>
						</div><br/>

						<div class="row">
		                  <div class="col-md-6">
						  	<div class="la-admin__preview">
								<label for="image"><?php echo e(__('adminstaticword.BackgroundImage')); ?>:<sup class="redstar">*</sup></label>
								<br>
								<div class="la-admin__preview-img la-admin__course-imgvid" >
									<div class="la-admin__preview-text" onclick="$('#image').click()">
										<p class="la-admin__preview-size">Preview Image</p>
										<p class="la-admin__preview-file text-uppercase">Choose a File</p>
									</div>
									<div class="text-center pr-20 mr-10">
										<span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
											<span class="path1"><span class="path2"></span></span>
										</span>
									</div>
									<input type="file" name="image" id="image" class="d-none">
									<?php if($show): ?>
									<img src="<?php echo e(url('/images/getstarted/'.$show['image'])); ?>" class="img-fluid" style="margin-left:200px;"/>
									<?php endif; ?>
								</div>
							</div>
		                  </div>
		              	</div><br/>
						  
						 
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



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/get_started/edit.blade.php ENDPATH**/ ?>