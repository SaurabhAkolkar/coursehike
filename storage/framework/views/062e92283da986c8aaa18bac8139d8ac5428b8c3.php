<?php $__env->startSection('title', 'First Section - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
   <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.FirstSection')); ?></h3>
           		
	          	<div class="panel-body">
	          		<form action="<?php echo e(action('FirstSectionController@update')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

		                
		              
                            <div class="row">
                                <div class="col-md-3">
                                <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Heading')); ?>:<sup class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="heading" id="exampleInputTitle" value="<?php echo e($show['heading']); ?>" placeholder="Enter Section Heading">
                                </div>
                            
                                <div class="col-md-3">
                                <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.SubHeading')); ?>:<sup class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="sub_heading" id="exampleInputTitle" value="<?php echo e($show['sub_heading']); ?>" placeholder="Enter Section Sub Heading">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.ImageText')); ?>:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="image_text" id="exampleInputTitle" value="<?php echo e($show['image_text']); ?>" placeholder="Enter Image Text">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mt-5">
                                    <div class="la-admin__preview">
                                        <label><?php echo e(__('adminstaticword.Image')); ?>:<sup class="redstar">*</sup></label><br/>
                                        <div class="la-admin__preview-img la-admin__course-frontimg" >
                                            <div class="la-admin__preview-text" onclick="$('#image').click()">
                                                <p class="la-admin__preview-size">Preview Image</p>
                                                <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                                            </div>
                                            <div class="la-admin__preview-icon text-center mr-10">
                                                <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:140px;">
                                                    <span class="path1"><span class="path2"></span></span>
                                                </span>
                                            </div>
                                                                                   
                                            <input type="file" name="image"  id="image" class="d-none "><?php if($show['image']): ?><img height="200"  src="<?php echo e($show['image']); ?>" /><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                        <!-- VIDEO: START -->
                            <div class="row mt-5">
                            <div class="col-6">
                                    <div class="la-admin__preview">

                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="" class="la-admin__preview-label p-0">Video Upload:<sup class="redstar">*</sup></label>
                                        <a href="/firstsection/remove-video" title="Delete Video" class="mb-3 la-admin__preview-delete text-uppercase ">Remove Video</a>
                                    </div>

                                    <div class="la-admin__preview-img la-admin__course-imgvid" >
                                        <div class="la-admin__preview-text">
                                            <p class="la-admin__preview-size">Video | 100MB</p>
                                            <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                                        </div>
    
                                        <div class="text-center pr-20 mr-20">
                                            <span class="la-icon la-icon--8xl icon-preview-video" style="font-size:150px;">
                                            <span class="path1"><span class="path2"></span></span>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control la-admin__preview-input preview_video" name="preview_video" />
                                        <?php if($show['video_url'] != null): ?>
                                        <video controls  class="preview-video w-100">
                                            <source src="<?php echo e($show['video_url']); ?>">
                                            Your browser does not support HTML5 video.
                                        </video>
                                        <?php endif; ?>
                                    </div>
                                    </div>
                            </div>
                            </div>
                        <!-- VIDEO: END -->
                            <br>
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-lg btn-primary px-14"> <?php echo e(__('adminstaticword.Save')); ?></button>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/firstsection/edit.blade.php ENDPATH**/ ?>