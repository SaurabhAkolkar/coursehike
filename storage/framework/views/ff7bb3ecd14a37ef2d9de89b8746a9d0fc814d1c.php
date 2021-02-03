<?php $__env->startSection('title', 'All Testimonial - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.Testimonial')); ?></h3>
            <a href="<?php echo e(url('testimonial/create')); ?>" class="btn btn-info btn-sm">
              <span class="la-icon la-icon--sm icon-plus"></span>
              <span><?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Testimonial')); ?></span>
            </a>
          </div>
          <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
          
            <tr>
              <th>#</th>
              <th><?php echo e(__('adminstaticword.Image')); ?></th>
              <th><?php echo e(__('adminstaticword.Name')); ?></th>
              <th><?php echo e(__('adminstaticword.Detail')); ?></th>
              <th><?php echo e(__('adminstaticword.Status')); ?></th>
              <th><?php echo e(__('adminstaticword.Update')); ?></th>
              <th><?php echo e(__('adminstaticword.Delete')); ?></th>
            </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td>
                <img src="images/testimonial/<?php echo $p['image']; ?>">
              </td>
              <td><?php echo e($p->client_name); ?></td>
              <td><?php echo e(strip_tags($p->details)); ?></td>
             
              <td>
                 <form action="<?php echo e(route('testimonial.quick',$p->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button  type="Submit" class="btn btn-xs <?php echo e($p->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                      <?php if($p->status ==1): ?>
                      <?php echo e(__('adminstaticword.Active')); ?>

                      <?php else: ?>
                      <?php echo e(__('adminstaticword.Deactive')); ?>

                      <?php endif; ?>
                    </button>
                  </form>
              </td>           

              <td><a class="btn btn-success la-admin__edit-btn" href="<?php echo e(url('testimonial/'.$p->id.'/edit')); ?>">
                <i class="la-icon la-icon--lg icon-edit"></i></a>
              </td>
              <td><form  method="post" action="<?php echo e(url('testimonial/'.$p->id)); ?>

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
  <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/testimonial/index.blade.php ENDPATH**/ ?>