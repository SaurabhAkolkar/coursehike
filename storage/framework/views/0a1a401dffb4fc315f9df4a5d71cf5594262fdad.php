<?php $__env->startSection('title', 'Mentors Settings - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
   	<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  	<div class="row">
        <div class="col-md-6">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title "><?php echo e(__('adminstaticword.InstructorSettings')); ?></h3>
           		
	          	<div class="panel-body">
	          		<form action="<?php echo e(route('instructor.update')); ?>" method="POST">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('POST')); ?>


		                <div class="row">
							<div class="col-md-12">
								<label for="Revenue">Instructor Revenue:</label>
								<div class="input-group">
					                <input min="1" max="100" class="form-control" name="instructor_revenue" type="number" value="<?php echo e($setting['instructor_revenue']); ?>" id="revenue"  placeholder="Enter revenue percentage" class="<?php echo e($errors->has('instructor_revenue') ? ' is-invalid' : ''); ?> form-control">
					                <span class="input-group-addon px-3 py-1 border font-weight-bold">%</span>
					            </div>
							</div>
						</div>
						<br>

						<div class="row">
							
							<div class="col-md-12">
								<label for="Revenue">Admin Revenue:</label>
								<div class="input-group">
					                <input min="1" max="100" class="form-control" name="admin_revenue" type="number" value="<?php echo e(100 - $setting['instructor_revenue']); ?>" id="revenue"  placeholder="Enter revenue percentage" class="<?php echo e($errors->has('admin_revenue') ? ' is-invalid' : ''); ?> form-control" readonly>
					                <span class="input-group-addon px-3 py-1 border font-weight-bold">%</span>
					             </div>
					            
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-md-6">
								<label for=""><?php echo e(__('adminstaticword.PaytmEnable')); ?>: </label>
								<li class="tg-list-item">              
						            <input class="la-admin__toggle-switch" id="paytm" type="checkbox" name="paytm_enable" <?php echo e($setting['paytm_enable'] == '1' ? 'checked' : ''); ?> >
						            <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="paytm"></label>
					            </li>
					            <input type="hidden"  name="free" value="0" for="paytm" id="paytm">
							</div>
						
							<div class="col-md-6">
								<label for=""><?php echo e(__('adminstaticword.PaypalEnable')); ?>: </label>
								<li class="tg-list-item">              
						            <input class="la-admin__toggle-switch" id="paypal" type="checkbox" name="paypal_enable" <?php echo e($setting['paypal_enable'] == '1' ? 'checked' : ''); ?> >
						            <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="paypal"></label>
					            </li>
					            <input type="hidden"  name="free" value="0" for="paypal" id="paypal">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6 mt-2">
								<label for=""><?php echo e(__('adminstaticword.BankTransferEnable')); ?>: </label>
								<li class="tg-list-item">              
						            <input class="la-admin__toggle-switch" id="bank" type="checkbox" name="bank_enable" <?php echo e($setting['bank_enable'] == '1' ? 'checked' : ''); ?> >
						            <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="bank"></label>
					            </li>
					            <input type="hidden"  name="free" value="0" for="bank" id="bank">
							</div>
						</div>
						<br>
						<br>
						
				
						
						<div class="box-footer">
		              		<button value="" type="submit"  class="btn btn-md col-md-3 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
		              	</div>

		          	</form>
	          	</div>
	      	</div>
      	</div>
    </div>
</section>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>



</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/setting/instructor.blade.php ENDPATH**/ ?>