<?php $__env->startSection('title', 'Revenue - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
          <h3 class="la-admin__section-title"> <?php echo e(__('adminstaticword.Order')); ?></h3>
          
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
            <div class="la-admin__revenue-stats">
                <!-- SUBSCRIPTION SECTION: START -->
                <div class="row">
                    <div class="col-6 col-md-3 mt-4">
                      <div class="la-admin__revenue-title">Active Trial Subscriptions</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-total"><?php echo e($trial_subscriptions); ?></span>
                          
                      </div>
                    </div>
                    <div class="col-6 col-md-3 mt-4">
                        <div class="la-admin__revenue-title">Monthly Subscriptions</div>
                        <div class="la-admin__revenue-info">
                            <span class="la-admin__revenue-total"><?php echo e($monthly_subscriptions); ?></span>
                            <span class="la-admin__revenue-per">@ $39 each</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mt-4">
                      <div class="la-admin__revenue-title">Yearly Subscriptions</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-total"><?php echo e($yearly_subscriptions); ?></span>
                          <span class="la-admin__revenue-per">@ $309 each</span>
                      </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4">
                      <div class="la-admin__revenue-title">Total Amount</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-price">$<?php echo e(($monthly_subscriptions * 39) + ($yearly_subscriptions * 309)); ?></span>
                      </div>
                    </div>
                </div>
                <!-- SUBSCRIPTION SECTION: END -->

                <!-- ONE TIME SUBSCRIPTION SECTION: START -->
                <div class="row ">
                  
                  <div class="col-6 col-md-3 mt-4 mt-md-6">
                    <div class="la-admin__revenue-title">Courses Purchased</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-total"><?php echo e($courses_count); ?></span>
                    </div>
                  </div>
                  <div class="col-6 col-md-3 mt-4 mt-md-6">
                    <div class="la-admin__revenue-title">Classes Purchased</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-total"><?php echo e($classes_count); ?></span>
                    </div>
                  </div>
                  <div class="col-6 col-md-2 mt-4 mt-md-6">
                    <div class="la-admin__revenue-title">Total Amount</div>
                      <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-price">$<?php echo e($total_earning); ?></span>
                      </div>
                  </div>

              </div>
              <!-- ONE TIME SUBSCRIPTION SECTION: END -->
            </div>

            <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
              <a href="/revenue-excel" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a>
            </div>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><?php echo e(__('adminstaticword.TransactionId')); ?></th>
                  <th><?php echo e(__('adminstaticword.User')); ?></th>
                  
                  
                  <th><?php echo e(__('adminstaticword.TotalAmount')); ?></th>
                  <th><?php echo e(__('adminstaticword.Status')); ?></th>
                  <th><?php echo e(__('adminstaticword.Date')); ?></th>
                  <th><?php echo e(__('adminstaticword.View')); ?></th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0;?>
                <?php $__currentLoopData = $total_purchase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($invoice->invoice_id); ?></td>
                      
                      <td><?php echo e($invoice->user->fname.' '.$invoice->user->lname); ?></td>
                    
                      <td>$ <?php echo e($invoice->total); ?></td>  
                      <td><?php echo e($invoice->status); ?></td>   
                      <td><?php echo e($invoice->created_at); ?></td>            

                      <td><a class="btn btn-info text-capitalize font-weight-normal px-4 px-md-2" href="<?php echo e(route('view.order',$invoice->id)); ?>"><?php echo e(__('adminstaticword.View')); ?></a>
                      </td>
                    
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
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

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/order/index.blade.php ENDPATH**/ ?>