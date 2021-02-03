<?php $__env->startSection('title', 'Edit Course Language - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Language')); ?></h3>
        
        <!-- /.box-header -->
        <!-- form start -->
     
          <div class="box-body">
            <div class="form-group">
            <form id="demo-form" method="post" action="<?php echo e(url('courselang/'.$language->id)); ?>

                  "data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>


            <div class="row">
              <div class="col-md-6">
                <label ><?php echo e(__('adminstaticword.Name')); ?>: <sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="name" value="<?php echo e($language->name); ?>" placeholder="Please Enter Your  Language Name">
                <?php $__errorArgs = ['name'];
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
            </div><br/>

            <div class="row">
              <div class="col-md-3">
                <label >ISO Code: <sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="iso_code" value="<?php echo e($language->iso_code); ?>" placeholder="Please Enter Your  Language Name">
                <?php $__errorArgs = ['iso_code'];
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
              <div class="col-md-3">
                <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                <li class="tg-list-item">
                <input class="la-admin__toggle-switch" id="xyz" type="checkbox" <?php echo e($language->status==1 ? 'checked' : ''); ?>>
                <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="xyz"></label>
                </li>
                <input type="hidden" name="status" value="<?php echo e($language->status); ?>" id="xyzz">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="box-footer">
                  <button type="submit" class="btn btn-md btn-primary"><?php echo e(__('adminstaticword.Submit')); ?></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          
        </form>
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/course_language/edit.blade.php ENDPATH**/ ?>