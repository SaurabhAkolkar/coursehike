<?php $__env->startSection('title', 'Edit Testimonial - Admin'); ?>
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
    <!-- left column -->
    <div class="col-md-12">
     <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"> <?php echo e(__('adminstaticword.Edit')); ?> - <?php echo e($test->client_name); ?> </h3>
       
        <div class="box-body">
          <div class="form-group">              
            <form id="demo-form2" method="post" action="<?php echo e(url('testimonial/'.$test->id)); ?>" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PATCH')); ?>


              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputName"><?php echo e(__('adminstaticword.Name')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="client_name" id="exampleInputTitle"value="<?php echo e($test->client_name); ?>">
                </div>
                <div class="col-md-6">
                  
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                  <textarea name="details" row="5" class="form-control"><?php echo e($test->details); ?></textarea>
                </div>
              </div><br/>

              <div class="row">
                <div class="col-md-6">
                  <div class="la-admin__preview">
                    <label><?php echo e(__('adminstaticword.Image')); ?>:<sup class="redstar">*</sup></label>
                      
                    <div class="la-admin__preview-img la-admin__course-imgvid" >
                        <div class="la-admin__preview-text" onclick="$('#image').click()" >
                          <p class="la-admin__preview-size">Preview Image</p>
                          <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                        </div>
                        <div class="text-center pr-20 mr-10">
                          <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                            <span class="path1"><span class="path2"></span></span>
                          </span>
                        </div> 
                        <input type="file" name="image" id="image" class="d-none"><img src="<?php echo e(url('/images/testimonial/'.$test->image)); ?>" class="img-fluid" />
                    </div>
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Type')); ?>:<sup class="redstar">*</sup></label>
                    <select name="type" class ="form-control js-example-basic-single">
                        <option value="learner" <?php if($test->type=='learner'): ?> selected <?php endif; ?>>Learner</option>
                        <option value="mentor" <?php if($test->type=='mentor'): ?> selected <?php endif; ?>>Mentor</option>
                    </select>
                  <br>
                </div>
              </div>
              <br />


              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                  <li class="tg-list-item">              
                    <input class="la-admin__toggle-switch" id="welmail" type="checkbox" name="status" <?php echo e($test->status == '1' ? 'checked' : ''); ?> >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="welmail"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="welmail" id="welmail">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary px-14"><?php echo e(__('adminstaticword.Submit')); ?></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
(function($) {
  "use strict";
  tinymce.init({selector:'textarea'});
})(jQuery);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/testimonial/testi_edit.blade.php ENDPATH**/ ?>