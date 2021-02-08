<?php $__env->startSection('title', 'Completed Payouts - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3">  <?php echo e(__('adminstaticword.CompletedPayout')); ?></h3>
        
        
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th>#</th>
                <th><?php echo e(__('adminstaticword.User')); ?></th>
                <th><?php echo e(__('adminstaticword.Payer')); ?></th>
                <th><?php echo e(__('adminstaticword.PayTotal')); ?></th>
                <th><?php echo e(__('adminstaticword.OrderId')); ?></th>
                <th><?php echo e(__('adminstaticword.PayStatus')); ?></th>
                <th><?php echo e(__('adminstaticword.View')); ?></th>
              </tr>
              </thead>

              <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $payout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <?php $i++;?>
                    <td><?php echo $i;?></td>
                    <td><?php echo e($pay->user->fname); ?></td>
                    <td><?php echo e($pay->payer_id); ?></td>
                    <td><i class="fa <?php echo e($pay->currency_icon); ?>"></i> <?php echo e($pay->pay_total); ?></td>
                    <td>
                      <?php $__currentLoopData = $pay->order_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $id= App\Order::find($order);
                        ?>
                        <?php echo e($id['order_id']); ?>,
                        
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td>
                      <?php if($pay->pay_status ==1): ?>
                        <?php echo e(__('adminstaticword.Recieved')); ?>

                      <?php else: ?>
                        <?php echo e(__('adminstaticword.Pending')); ?>

                      <?php endif; ?>
                    </td>

                    <td>
                      <a class="btn btn-primary btn-sm" href="<?php echo e(route('completed.view', $pay->id)); ?>"><?php echo e(__('adminstaticword.View')); ?></a>
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/revenue/completed.blade.php ENDPATH**/ ?>