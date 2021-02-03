<?php $__env->startSection('title', 'Mentor Payouts - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title ml-2">  <?php echo e(__('adminstaticword.CreatorPayout')); ?></h3>
          <a class="btn btn-info btn-sm" href="<?php echo e(url('admin/addpayout')); ?>">
          + <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.CreatorPayout')); ?>

        </a>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <th>#</th>
                <th><?php echo e(__('adminstaticword.Instructor')); ?></th>
                <th><?php echo e(__('adminstaticword.Month')); ?></th>
                <th><?php echo e(__('adminstaticword.SubscriptionAmount')); ?></th>
                <th><?php echo e(__('adminstaticword.CourseAmount')); ?></th>
                <th><?php echo e(__('adminstaticword.Total')); ?></th>
                <th><?php echo e(__('adminstaticword.Status')); ?></th>
                <th><?php echo e(__('adminstaticword.Edit')); ?></th>
              </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $payouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                <tr>
                  <?php $i++;?>
                    <td><?php echo $i;?></td>
                    <td><?php echo e($payout->user->fullName); ?></td>
                    <td><?php echo e(Carbon\Carbon::parse($payout->start_date)->format('M Y')); ?></td>
                    <td>$ <?php echo e($payout->subscription_amount); ?></td>
                    <td>$ <?php echo e($payout->course_amount); ?></td>
                    <td>$ <?php echo e($payout->subscription_amount+$payout->course_amount); ?></td>
                    <td><?php echo e(ucfirst($payout->status)); ?></td>
                    <td>
                        <a class="la-admin__edit-btn" role="button" href="<?php echo e(route('creatorpayout.edit',$payout->id)); ?>"><i class="la-icon la-icon--lg icon-edit"></i></a>
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/revenue/creatorpayouts.blade.php ENDPATH**/ ?>