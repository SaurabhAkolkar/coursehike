<?php $__env->startSection('title', 'All Pending Payouts - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-2 mb-0">  <?php echo e(__('adminstaticword.InstructorRevenue')); ?></h3>
        
        <div class="box-body">
          <div class="la-admin__revenue-stats">
            <!-- TOTAL WATCH TIME SECTION: START -->
            <div class="row ">
                  <div class="col-6 col-md-3 mt-3 mt-md-6">
                      <div class="la-admin__revenue-title">Subscriber Total Watch Time</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-total"><?php echo e($payout['watch_time']); ?></span>
                      </div>
                  </div>
                  <div class="col-6 col-md-3 mt-3 mt-md-6">
                    <div class="la-admin__revenue-title">Subscription Estimated Revenue</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-price">$<?php echo e($payout['total_income']); ?></span>
                    </div>
                  </div>
              </div>
              <div class="row mb-md-6">
                <div class="col-6 col-md-3 mt-3 mt-md-6">
                    <div class="la-admin__revenue-title">No. of Learners</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-total"><?php echo e(count($payout['learners'])); ?></span>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 mt-md-6">
                  <div class="la-admin__revenue-title">Courses Purchased</div>
                  <div class="la-admin__revenue-info">
                      <span class="la-admin__revenue-total"><?php echo e($courses_count); ?></span>
                  </div>
                </div>
                <div class="col-6 col-md-3 mt-3 mt-md-6">
                  <div class="la-admin__revenue-title">Classes Purchased</div>
                  <div class="la-admin__revenue-info">
                      <span class="la-admin__revenue-total"><?php echo e($classes); ?></span>
                  </div>
                </div>
                <div class="col-6 col-md-2 mt-3 mt-md-6">
                  <div class="la-admin__revenue-title">Total Amount</div>
                    <div class="la-admin__revenue-info">
                      <span class="la-admin__revenue-price">$<?php echo e($total_earning); ?></span>
                    </div>
                </div>
            </div>
            <!-- TOTAL WATCH TIME SECTION: END -->
          </div>

      
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th>#</th>
                <th><?php echo e(__('adminstaticword.User')); ?></th>
                <th><?php echo e(__('adminstaticword.Course')); ?></th>
                <th><?php echo e(__('adminstaticword.TransactionId')); ?></th>
                <th><?php echo e(__('adminstaticword.TotalAmount')); ?></th>
              </tr>
              </thead>
              <tbody>
                    <?php $i=0;?>

                    <?php $__currentLoopData = $invoiceDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$i); ?></td>
                            <td><?php echo e($id->fname.' '.$id->lname); ?></td>
                            <td><?php echo e(json_decode($id->title)->en); ?></td>
                            <td><?php echo e($id->id); ?></td>
                            <td>$ <?php echo e($id->sub_total); ?></td>
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/instructor/revenue/instructorRevenue.blade.php ENDPATH**/ ?>