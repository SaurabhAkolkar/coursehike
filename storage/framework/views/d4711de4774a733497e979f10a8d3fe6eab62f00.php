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
                    <div class="la-admin__preview">
                      <label for="" class="la-admin__preview-label"><?php echo e(__('adminstaticword.Image')); ?>:</label>
                      <div class="la-admin__preview-img la-admin__course-imgvid" >
                           <div class="la-admin__preview-text">
                                <p class="la-admin__preview-size">Preview Image size: 250x150</p>
                                <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                          </div>
                          <div class="text-center pr-20 mr-10">
                            <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                              <span class="path1"><span class="path2"></span></span>
                            </span>
                          </div>
                          <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="image" id="image" />
                          <img src="<?php echo e(asset('images/testimonial/'.$test->image)); ?>" alt="" class="preview-img" required/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br/>



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
                  <div class="la-rtng__review-stars">
                    <div class="starRatingContainer">
                        <label for="exampleInputDetails">Rating:<sup class="redstar">*</sup></label>
                        <div class="rate2"></div>
                        <input id="input2" type="hidden" name="rating" value="<?php echo e($test->rating); ?>"></div>
                  </div>
                </div>
              </div>



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
<script src="<?php echo e(asset('/js/rater.min.js')); ?>" charset="utf-8"></script>
<script>
(function($) {
  "use strict";
  tinymce.init({selector:'textarea'});
})(jQuery);

var options = {
                max_value: 5,
                step_size: 1,
                url: '/',
                initial_value: <?php echo e($test->rating?$test->rating:0); ?>,
                update_input_field_name: $("#input2"),
            };

$(".rate2").rate(options);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/testimonial/testi_edit.blade.php ENDPATH**/ ?>