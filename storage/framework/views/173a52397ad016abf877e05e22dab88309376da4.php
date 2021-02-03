<?php $__env->startSection('title', 'View Message - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-md-12">
    	<div class="box box-primary">
			<h3 class="la-admin__section-title ml-2 mb-10"><?php echo e(__('adminstaticword.Message')); ?></h3>
			   
			<div class="col-8">
				<div class="la-admin__contact-top pb-10">
					<h4 class="la-admin__contact-name text-capitalize mb-2" style="font-family:var(--head-font);color:var(--gray5);font-weight:var(--font-semibold);"><?php echo e($show->fname); ?></h4>
					<div class="d-flex align-items-center mb-1">
						<span class="la-icon la-icon--lg icon-contact-number"></span>
						<span class="pl-2 text-sm"><?php echo e($show->mobile); ?></span>
					</div>
					<div class="d-flex align-items-center mb-1">
						<span class="la-icon la-icon--lg icon-mail-id"></span>
						<span class="pl-2 text-sm"><?php echo e($show->email); ?></span>
					</div>
				</div>

				<div class="la-admin__contact-btm py-8" style="border-top:1px dashed var(--gray4)">
					<h5 class="m-0" style="font-weight:var(--font-semibold);">Message:</h5>
					<p class="text-sm" style="color:var(--gray4)" ><?php echo e(date('jS F Y', strtotime($show->created_at))); ?></p>

					<div class="la-admin__contact-msg"><?php echo e($show->message); ?></div>
				</div>
			</div>
      	</div>
  	</div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/contact/view.blade.php ENDPATH**/ ?>