<?php $__env->startSection('title','Coupons - Admin'); ?>

<?php $__env->startSection('body'); ?>
<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title ml-2"><?php echo e(__('adminstaticword.Coupon')); ?></h3>
          <a title="Create new Coupon" href="<?php echo e(route('coupon.create')); ?>" class="btn btn-sm btn-info">+ <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Coupon')); ?></a>
        </div>

        <div class="box-body">
          <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
            <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
            <!-- <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a> -->
          </div>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <th><?php echo e(__('adminstaticword.ID')); ?></th>
                <th></th>
                <th><?php echo e(__('adminstaticword.CODE')); ?></th>
                <th>Discount Type</th>
                <th>Discount</th>
                <th><?php echo e(__('adminstaticword.Amount')); ?></th>
                <th><!-- <?php echo e(__('adminstaticword.Detail')); ?> --> Linked to</th>
                <th>Expiry Date</th>
                <th><?php echo e(__('adminstaticword.MaxUsage')); ?></th>
                <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                <th><?php echo e(__('adminstaticword.Delete')); ?></th>
              </thead>

              <tbody>
                <?php $__currentLoopData = $coupans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $cpn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td>
                        <span class="la-icon la-icon--8xl icon-fixed-coupon" style="color:#FFDD75;"></span>
                    </td>
                    <td><?php echo e($cpn->code); ?></td>
                    <?php
                        $currency = App\Currency::first();
                    ?> 
                    <td>
                      <span><?php echo e($cpn->distype == 'per' ? "Percentage" : "Fixed Amount"); ?></span>
                    </td>
                    <td>50%</td>
                    <td><?php if($cpn->distype == 'fix'): ?> <i class="fa <?php echo e($currency->icon); ?>"></i> <?php endif; ?> <?php echo e($cpn->amount); ?><?php if($cpn->distype == 'per'): ?>% <?php endif; ?> </td>
                    <td>
                      <span><?php echo e(ucfirst($cpn->link_by)); ?></span>
                    </td>
                    <td>
                     <span><?php echo e(date('d-M-Y',strtotime($cpn->expirydate))); ?></span>
                    </td>
                    <td><?php echo e($cpn->maxusage); ?></td>
                    
                    <td>
                      <a title="Edit coupon" href="<?php echo e(route('coupon.edit',$cpn->id)); ?>" class="btn btn-success la-admin__edit-btn">
                        <i class="la-icon la-icon--lg icon-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a title="Delete coupon" data-toggle="modal" data-target="#coupon<?php echo e($cpn->id); ?>" class="btn btn-danger">
                        <i class="la-icon la-icon--lg icon-delete"></i>
                      </a>
                    </td>

                    <div id="coupon<?php echo e($cpn->id); ?>" class="delete-modal modal fade show" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header d-block">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <div class="delete-icon"></div>
                            </div>
                            <div class="modal-body text-center">
                              <h4 class="modal-heading" style="color:var(--app-indigo-1)">Are You Sure ?</h4>
                              <p class="pt-6">Do you really want to delete this Coupon ? <br/> This process cannot be undone.</p>
                            </div>
                            <div class="modal-footer text-center" >
                                 <form method="post" action="<?php echo e(route('coupon.destroy',$cpn->id)); ?>" >
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field("DELETE")); ?>

                                          
                                <button type="reset" class="btn la-btn--danger translate-y-3" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>

            </table>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/coupan/index.blade.php ENDPATH**/ ?>