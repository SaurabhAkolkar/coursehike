<?php $__env->startSection('title', 'Edit Faq Instructor - Admin'); ?>
<?php $__env->startSection('body'); ?>


<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"> <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.FAQ')); ?> - <?php echo $find->title; ?>  </h3>
        
        <div class="box-body">
          <div class="form-group">              
            <form id="demo-form2" method="post" action="<?php echo e(url('faqinstructor/'.$find->id)); ?>" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PATCH')); ?>



              <div class="row">
                <div class="col-md-8">
                  <label for="exampleInputName"><?php echo e(__('adminstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle"value="<?php echo e($find->title); ?>">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="la-btn__alert-danger alert alert-danger">
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
                  <textarea class="form-control" name="details"> <?php echo e($find->details); ?></textarea>
                          <?php $__errorArgs = ['details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="la-btn__alert-danger alert alert-danger">
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
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                  <li class="tg-list-item">              
                      <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" <?php echo e($find->status == '1' ? 'checked' : ''); ?> >
                      <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-8">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
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
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/faq_instructor/update.blade.php ENDPATH**/ ?>