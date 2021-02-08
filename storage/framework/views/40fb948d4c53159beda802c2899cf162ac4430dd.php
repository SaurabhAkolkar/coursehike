<section class="content">
 
  <div class="row">
    <div class="col-md-12">
      
      <br>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo e(__('adminstaticword.User')); ?></th>
              <th><?php echo e(__('adminstaticword.Course')); ?></th>
              <th><?php echo e(__('adminstaticword.Instructor')); ?></th>
              <th><?php echo e(__('adminstaticword.Title')); ?></th>
              <th><?php echo e(__('adminstaticword.Accepted')); ?></th>
              <th><?php echo e(__('adminstaticword.View')); ?></th>
              <th><?php echo e(__('adminstaticword.Delete')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0;?>
            <?php $__currentLoopData = $appointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <?php $i++;?>
                <td><?php echo $i;?></td>
                <td><?php echo e($appoint->user->fname); ?></td>
                <td><?php echo e($appoint->courses->title); ?></td>
                <td><?php echo e($appoint->instructor->fname); ?></td>
                <td><?php echo e($appoint->title); ?></td>
                <td>
                  <?php if($appoint->accept==1): ?>
                   <?php echo e(__('adminstaticword.Yes')); ?>

                  <?php else: ?>
                   <?php echo e(__('adminstaticword.No')); ?>

                  <?php endif; ?>
                </td>
                <td>
                  <a class="btn btn-success btn-sm" href="<?php echo e(url('appointment/'.$appoint->id)); ?>"><?php echo e(__('adminstaticword.View')); ?></a>
                </td> 

                <td>
                  <form  method="post" action="<?php echo e(url('appointment/'.$appoint->id)); ?>" ata-parsley-validate class="form-horizontal form-label-left">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>


                    <button  type="submit" class="btn btn-danger btn-sm"><i class="la-icon la-icon--lg icon-delete"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
    </div>
  </div>

  

</section> 
<?php /**PATH E:\lila-laravel\resources\views/admin/course/appointment/index.blade.php ENDPATH**/ ?>