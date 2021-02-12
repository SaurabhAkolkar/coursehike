<?php $__env->startSection('title', 'Add Faq Instructor - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.FAQ')); ?></h3>
             
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="<?php echo e(url('faqinstructor/')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>


              <div class="row">
                <div class="col-md-8">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" placeholder=" Enter Your Title" id="exampleInputTitle" value="<?php echo e(old('title')); ?>">

                  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger">
                          <?php echo e($message); ?>

                    </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-8">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                  <textarea name="details" class="form-control" rows="5" placeholder="Enter Your Details" ><?php echo e(old('details')); ?></textarea>
                  <?php $__errorArgs = ['details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger">
                          <?php echo e($message); ?>

                    </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-8">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                  <br>
                  <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" value="<?php echo e(old('status')); ?>">
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label> 
                    <input type="hidden"  name="status" value="0" for="status" id="status_input">
                  </li>
                  
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-8">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('adminstaticword.Submit')); ?></button>
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


<?php $__env->startSection('script'); ?>

<script>
(function($) {
"use strict";
  tinymce.init({selector:'textarea'});
})(jQuery);

$(function() {
    $('#status').change(function() {
      $('#status_input').val(+ $(this).prop('checked'))
    })
  })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/faq_instructor/create.blade.php ENDPATH**/ ?>