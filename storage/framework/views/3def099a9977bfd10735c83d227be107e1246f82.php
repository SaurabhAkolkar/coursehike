<?php $__env->startSection('title', 'Edit Answer - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"> <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Answer')); ?></h3>
        
        <div class="box-body">
            <form action="<?php echo e(url('instructoranswer/'.$answer->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>


                  <div class="row">
                    <div class="col-md-6">
                      <label class="display-none" for="exampleInputSlug"><?php echo e(__('adminstaticword.SelectCourse')); ?></label>
                      <input value="<?php echo e($answer->course_id); ?>" autofocus name="course_id" type="text" class="form-control display-none" >
                    </div>
                  </div><br>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="exampleInput"> <?php echo e(__('adminstaticword.Answer')); ?>:<sup class="redstar">*</sup></label>
                        <textarea name="answer" rows="4" class="form-control" placeholder="Please Enter Your Answer"><?php echo e($answer->answer); ?></textarea>
                      </div>
                    </div>
                    <br>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                        <li class="tg-list-item">
                        <input class="la-admin__toggle-switch" id="cb10111" type="checkbox" <?php echo e($answer->status==1 ? 'checked' : ''); ?>>
                        <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="cb10111"></label>
                        </li>
                        <input type="hidden" name="status" value="<?php echo e($answer->status); ?>" id="jjjj">
                      </div>
                    </div>
                    </div>
                    <br>
                   
                    <div class="row">
                      <div class="col-6">
                        <div class="box-footer">
                          <button value="" type="submit"  class="btn btn-md btn-primary px-md-20"><?php echo e(__('adminstaticword.Save')); ?></button>
                        </div>
                      </div>
                    </div>
                  
            </form>
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/instructor/answer/edit.blade.php ENDPATH**/ ?>