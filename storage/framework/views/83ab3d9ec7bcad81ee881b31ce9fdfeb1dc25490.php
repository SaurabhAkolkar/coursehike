<?php $__env->startSection('title', 'Completed Payouts - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3">  <?php echo e(__('adminstaticword.CreatorPayoutAnalytics')); ?></h3>
        
        
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th><small>Creator ID</small></th>
                <th><small>Creator Name</small></th>
                <th><small>Email</small></th>
                <th><small>No. of Learners</small></th>
                <th><small>Total watch time</small></th>
                <th><small>Subscribers Total Revenue</small></th>
                <th><small>Courses & Classes Purchased</small></th>
                <th><small>Purchase Revenue</small></th>
                <th><small>Month</small></th>
                <th><small>Year</small></th>
                
              
              </tr>
              </thead>

              <tbody>
                <?php $__currentLoopData = $creators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $creator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  
                  <td><?php echo e($creator['id']); ?></td>
                  <td><?php echo e($creator['name']); ?></td>
                  <td><?php echo e($creator['email']); ?></td>
                  <td><?php echo e(count($creator['payout']['learners'])); ?></td>
                  <td><?php echo e($creator['payout']['watch_time']); ?></td>
                  <td>$<?php echo e($creator['payout']['subscribers_total_income']); ?></td>
                  <td><?php echo e($creator['payout']['course_sale']['count']); ?></td>
                  <td>$<?php echo e($creator['payout']['course_sale']['total_income']); ?></td>
                  <td><?php echo e($creator['month']); ?></td>
                  <td><?php echo e($creator['year']); ?></td>

                  
                    
                  

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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/revenue/revenue_analytics.blade.php ENDPATH**/ ?>