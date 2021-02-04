<?php $__env->startSection('title', 'Featured Mentors - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.FeaturedMentors')); ?></h3>
            <a class="btn btn-info btn-sm" href="<?php echo e(url('featuredMentors/create')); ?>">
              <i class="la-icon la-icon--sm icon-plus"></i> 
              <span><?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.FeaturedMentors')); ?></span>
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
           
              <tr>
                <th>#</th>
                <th><?php echo e(__('adminstaticword.Name')); ?></th>
                <th><?php echo e(__('adminstaticword.Course')); ?></th>
                <th><?php echo e(__('adminstaticword.Thumbnail')); ?></th>
                <th><?php echo e(__('adminstaticword.Status')); ?></th>
                <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                <th><?php echo e(__('adminstaticword.Delete')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0;?>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $i++;?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo e($d->user->fullName); ?></td>
                <td><?php echo e($d->courses->title); ?></td>
                <td> <img src="<?php echo e($d->user_thumbnail); ?>" class="img-fluid"></td>
                <td><?php echo e($d->status == 1 ? 'Active' : 'Inactive'); ?></td>
                <td>
                  <a class="btn btn-success la-admin__edit-btn" href="<?php echo e(route('featuredmentor.edit',$d->id)); ?>">
                  <i class="la-icon la-icon--lg icon-edit"></i></a>
                </td>

                <td><form  method="post" action="<?php echo e(url('featuredMentors/'.$d->id)); ?>

                      "data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                       <button  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
                  </form>
                </td>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/admin/featured_mentors/index.blade.php ENDPATH**/ ?>