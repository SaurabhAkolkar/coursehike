<?php $__env->startSection('title', 'Edit Question - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3">Edit Question</h3>
        
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="<?php echo e(url('instructorquestion/'.$que->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>


              <div class="row">
                <div class="col-6">
                  <input type="hidden" name="instructor_id" class="form-control" value="<?php echo e(Auth::User()->id); ?>"  />
                      
                  <select name="course_id" class="form-control js-example-basic-single col-12 display-none">
                  <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option class="display-none" value="<?php echo e($cou->id); ?>" <?php echo e($que->courses->id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select> 
                </div>
              </div>
              <br/>

              <div class="row">
                <div class="col-6">
                  <select name="user_id" class="form-control js-example-basic-single col-12 display-none">
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option class="display-none" value="<?php echo e($cu->id); ?>" <?php echo e($que->courses->id == $cu->id  ? 'selected' : ''); ?>><?php echo e($cu->fname); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div> <br/>
                   
              <div class="row">
                <div class="col-md-5">
                  <label for="exampleInputTit1e">Question:<span class="redstar">*</span></label>
                  <textarea name="question" rows="3" class="form-control" placeholder="Enter Your quetion"><?php echo e($que->question); ?></textarea>
                </div>
              
                <div class="col-md-1">
                  <label for="exampleInputTit1e">Status:</label>
                  <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="cb77" type="checkbox" <?php echo e($que->status==1 ? 'checked' : ''); ?>>
                    <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="cb77"></label>
                  </li>
                  <input type="hidden" name="status" value="<?php echo e($que->status); ?>" id="jp">
                </div>
              </div> 
              <br>

              <div class="row">
                <div class="col-md-6">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-md px-14 btn-primary">Save</button>
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/instructor/question/edit.blade.php ENDPATH**/ ?>