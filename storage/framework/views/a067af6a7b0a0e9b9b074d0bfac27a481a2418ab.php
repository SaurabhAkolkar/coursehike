<?php $__env->startSection('title', 'Edit Sub Category - Admin'); ?>
<?php $__env->startSection('body'); ?>
  
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.SubCategory')); ?></h3>
        
        <!-- /.box-header -->
        <!-- form start -->
          <div class="box-body">
            <div class="form-group">
              <form id="demo-form" method="post" action="<?php echo e(url('subcategory/'.$cate->id)); ?>

                    " data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>


                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputSlug"><?php echo e(__('adminstaticword.SelectCategory')); ?></label>
                    <select name="category_id" class="form-control js-example-basic-single col-md-7 col-12">
          
                      <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($cou->id); ?>" <?php echo e($cate->category_id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.SubCategory')); ?>:<span class="redstar">*</span></label>
                    <input type="title" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($cate->title); ?>">
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
                  <div class="col-md-6">
                    <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                   
                    <li class="tg-list-item">              
                      <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> >
                      <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                    </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                  </div>
                </div><br>

                <div class="row">
                  <div class="col-md-6">
                    <div class="box-footer">
                      <button type="submit" class="btn btn-md col-md-4 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/category/subcategory/update.blade.php ENDPATH**/ ?>