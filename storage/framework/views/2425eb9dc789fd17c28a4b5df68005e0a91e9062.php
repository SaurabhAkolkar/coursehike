<?php $__env->startSection('title', 'User Subscripion - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
          <h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.Subscription')); ?></h3>
          <a class="btn btn-info btn-sm" href="<?php echo e(route('create.subscription', $user_id)); ?>"><span class="la-icon la-icon--sm icon-plus"></span> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Subscription')); ?></a>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">
            <!-- <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a>
            </div> -->
            
              <table id="example1" class="table table-bordered table-striped text-center display nowrap">
                <thead>
                  <th>#</th>
                  <th><?php echo e(__('adminstaticword.StartDate')); ?></th>
                  <th><?php echo e(__('adminstaticword.EndDate')); ?></th>
                  <th><?php echo e(__('adminstaticword.Amount')); ?></th>
                </thead> 

                <tbody>
                  <?php $i=0;?>

                    <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <?php $i++;?>

                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo e($s->subscriptionDetails->start_date); ?></td>                 
                        <td><?php echo e($s->subscriptionDetails->end_date); ?></td>                 
                        <td>$ <?php echo e($s->subscriptionDetails->invoice_paid); ?></td>                 
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
              </table>
          </div>
        <!-- /.box-body -->
      </div>
    </div>


    <div class="col-md-12 mt-20">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
          <h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.Courses')); ?></h3>
          <a class="btn btn-info btn-sm" href="/user/subscriptions/add-course/<?php echo e($user_id); ?>"><span class="la-icon la-icon--sm icon-plus"></span> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Courses')); ?></a>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">            
              <table id="example2" class="table table-bordered table-striped text-center display nowrap">
                <thead>
                  <th>#</th>
                  <th><?php echo e(__('adminstaticword.Title')); ?></th>
                  <th><?php echo e(__('adminstaticword.Classes')); ?></th>
                  <th><?php echo e(__('adminstaticword.PurchaseType')); ?></th>
                  <th><?php echo e(__('adminstaticword.PurchaseDate')); ?></th>
                </thead> 

                <tbody>
                  <?php $i=0;?>

                    <?php $__currentLoopData = $courses_purchased; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <?php $i++;?>

                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo e($cp->course->title); ?></td>                 
                        <td><?php echo e(count(json_decode($cp->class_id))); ?></td>                 
                        <td><?php echo e($cp->purchase_type=='all_classes'?'All Classes':'Selected Classes'); ?></td>                 
                        <td><?php echo e(Carbon\Carbon::parse($cp->created_at)->format('d-M-Y')); ?></td>                 
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
              </table>
          </div>
        <!-- /.box-body -->
      </div>
    </div>

    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/user/subscriptions.blade.php ENDPATH**/ ?>