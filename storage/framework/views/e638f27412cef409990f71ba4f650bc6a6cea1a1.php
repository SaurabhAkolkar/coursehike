<?php $__env->startSection('title', 'View User - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
          <h3 class="la-admin__section-title mb-0"><?php echo e(__('adminstaticword.Users')); ?></h3>
          <a class="btn btn-info btn-sm" href="<?php echo e(route('user.add')); ?>"><span class="la-icon la-icon--sm icon-plus"></span> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.User')); ?></a>
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">
            <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
              <!-- <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a> -->
            </div>
            
              <table id="example1" class="table table-bordered table-striped text-center display nowrap">
                <thead>
                  <th>#</th>
                  <th><?php echo e(__('adminstaticword.Image')); ?></th>
                  <th><?php echo e(__('adminstaticword.FirstName')); ?></th>
                  <th><?php echo e(__('adminstaticword.Email')); ?></th>
                  <th><?php echo e(__('adminstaticword.Role')); ?></th>
                  <th><?php echo e(__('adminstaticword.Mobile')); ?></th>
                  <th><?php echo e(__('adminstaticword.Country')); ?></th>
                  <th><?php echo e(__('adminstaticword.Subscription')); ?></th>
                  <th><?php echo e(__('adminstaticword.Status')); ?></th>
                  <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                  <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                </thead> 

                <tbody>
                  <?php $i=0;?>

                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($user->id != Auth::User()->id): ?>
                        <?php $i++;?>

                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          <?php if($user->user_img != null || $user->user_img !=''): ?>
                            <img src="<?php echo e($user->user_img); ?>" class="img-fluid">
                          <?php else: ?>
                            <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-fluid" alt="User Image">
                          <?php endif; ?>
                        </td>
                        <td><?php echo e($user['fname']); ?></td>
                        <td><?php echo e($user['email']); ?></td>
                        <td><?php echo e($user['role']); ?></td>
                        <td>
                          <?php echo e($user->mobile); ?>

                        </td>
                        <td>
                          <?php if($user->country_id): ?>
                          <?php echo e($user->country['nicename']); ?>

                          <?php endif; ?>
                        </td>
                        <td class="text-center">
                          <a class="btn btn-info text-capitalize font-weight-normal" href="<?php echo e(route('user.subscriptions',$user->id)); ?>">View</a>
                        </td>
                        <td>
                          <form action="<?php echo e(route('user.quick',$user->id)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <button  type="Submit" class="btn btn-xs <?php echo e($user->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                              <?php if($user->status ==1): ?>
                              <?php echo e(__('adminstaticword.Active')); ?>

                              <?php else: ?>
                              <?php echo e(__('adminstaticword.Deactive')); ?>

                              <?php endif; ?>
                            </button>
                          </form>
                        </td>
                       
                        <td>
                          <a class="btn btn-success btn-sm" href="<?php echo e(route('user.update',$user->id)); ?>">
                            <i class="la-icon la-icon--lg icon-edit"></i></a>
                        </td>
                              
                        <td><form  method="post" action="<?php echo e(route('user.delete',$user->id)); ?>

                            "data-parsley-validate class="form-horizontal form-label-left">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                             
                              <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn btn-danger btn-sm"><i class="la-icon la-icon--lg icon-delete"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endif; ?>
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



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/admin/user/index.blade.php ENDPATH**/ ?>