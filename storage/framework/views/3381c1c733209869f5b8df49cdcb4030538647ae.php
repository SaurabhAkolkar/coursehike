<?php $__env->startSection('title', 'Add Answer - Instructor'); ?>
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
    <div class="col-12"> 
      <!-- general form elements -->
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Answer')); ?></h3>
        
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="<?php echo e(url('instructoranswer/')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>

                

                <input type="hidden" name="instructor_id" value="<?php echo e(Auth::user()->id); ?>" />
                <input type="hidden" name="ans_user_id" value="<?php echo e(Auth::user()->id); ?>" />
           
                <div class="row">
                  <div class="col-md-6">
                    <label  for="exampleInputTit1e"> <?php echo e(__('adminstaticword.Select')); ?> <?php echo e(__('adminstaticword.Question')); ?>:<sup class="redstar">*</sup></label>
                    <br>
                    <select name="question_id" required class="form-control  js-example-basic-single">
                      <option value="none" selected disabled hidden> 
                         <?php echo e(__('adminstaticword.SelectanOption')); ?>

                      </option>
                      <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($ques->id); ?>"><?php echo e($ques->question); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <input type="hidden" name="ques_user_id"  value="<?php echo e($ques->user_id); ?>" />
                  <input type="hidden" name="course_id"  value="<?php echo e($ques->course_id); ?>" />
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInput"><?php echo e(__('adminstaticword.Answer')); ?>:<sup class="redstar">*</sup></label>
                    <textarea name="answer" rows="4" class="form-control" placeholder="Please Enter Your Answer"></textarea>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                    <li class="tg-list-item">   
                      <input class="la-admin__toggle-switch" id="c12"  type="checkbox"/>
                      <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c12"></label>
                    </li>
                    <input type="hidden" name="status" value="1" id="t12">
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <div class="box-footer">
                      <button type="submit" value="Add Answer" class="btn btn-md px-10 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
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
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/instructor/answer/add.blade.php ENDPATH**/ ?>