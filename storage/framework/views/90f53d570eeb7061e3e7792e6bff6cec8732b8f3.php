<?php $__env->startSection('title', 'Trusted Sliders - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="la-admin__section-title ml-2"><?php echo e(__('adminstaticword.TrustedSlider')); ?></h3>
              <a class="btn btn-info btn-sm" href="<?php echo e(url('trusted/create')); ?>">
                  <i class="la-icon la-icon--sm icon-plus"></i> 
                  <span><?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.TrustedSlider')); ?></span>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  
                 
                  <tr>
                    <th>#</th>
                    <th><?php echo e(__('adminstaticword.Image')); ?></th>
                    <th><?php echo e(__('adminstaticword.URL')); ?></th>
                    <th><?php echo e(__('adminstaticword.Status')); ?></th>
                    <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                    <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $trusted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trusted): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td>
                    <img src="images/trusted/<?php echo $trusted['image'];  ?>">
                  </td>
                  <td><?php echo e($trusted->url); ?></td>
                  <td>
                    <?php if($trusted->status==1): ?>
                      <?php echo e(__('adminstaticword.Active')); ?>

                    <?php else: ?>
                      <?php echo e(__('adminstaticword.Deactive')); ?>

                    <?php endif; ?>
                  </td>
                  <td>              
                    <a class="btn btn-success la-admin__edit-btn" href="<?php echo e(url('trusted/'.$trusted->id)); ?>">
                    <i class="la-icon la-icon--lg icon-edit"></i></a>
                  </td>
                  <td>

                    <form  method="post" action="<?php echo e(url('trusted/'.$trusted->id)); ?>

                        "data-parsley-validate class="form-horizontal form-label-left">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>

                        <button type="submit" class="btn btn-sm btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
                    </form>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tfoot>
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
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/trusted/index.blade.php ENDPATH**/ ?>