<?php $__env->startSection('title', 'All Answers - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title ml-2"> Course Answers</h3>
          <a class="btn btn-info btn-sm" href="<?php echo e(url('instructoranswer/create')); ?>">
              <span class="la-icon la-icon--sm icon-plus"></span> Add Answer
          </a>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
        
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th>#</th>
                <th><?php echo e(__('adminstaticword.Answer')); ?></th>
                <th><?php echo e(__('adminstaticword.Question')); ?></th>
                <th><?php echo e(__('adminstaticword.Course')); ?></th>
                <th><?php echo e(__('adminstaticword.Status')); ?></th>
                <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                <th><?php echo e(__('adminstaticword.Delete')); ?></th>
              </tr>
              </thead>
              <tbody>
                    <?php $i=0;?>
                    <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <?php $i++;?>
                      <td><?php echo $i;?></td>
                        <td><?php echo e($ans->answer); ?></td>
                        <td><?php echo e($ans->question->question); ?></td>
                        <td><?php echo e($ans->courses->title); ?></td> 
                      <td>
                          <?php if($ans->status==1): ?>
                          <?php echo e(__('adminstaticword.Active')); ?>

                          <?php else: ?>
                          <?php echo e(__('adminstaticword.Deactive')); ?>

                          <?php endif; ?>                      
                      </td>
                      
                      <td>
                        <a class="btn btn-success la-admin__edit-btn" href="<?php echo e(url('instructoranswer/'.$ans->id)); ?>">
                          <span class="la-icon la-icon--lg icon-edit"></span>
                        </a>
                      </td>

                      <td><form  method="post" action="<?php echo e(url('instructoranswer/'.$ans->id)); ?>

                          "data-parsley-validate class="form-horizontal form-label-left">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                            <button  type="submit" class="btn btn-danger">
                            <span class="la-icon la-icon--lg icon-delete"></span>
                            </button>
                        </form>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
              </tbody>
            </table>
         
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/instructor/answer/index.blade.php ENDPATH**/ ?>