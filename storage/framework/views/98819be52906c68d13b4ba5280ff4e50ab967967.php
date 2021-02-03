<?php $__env->startSection('title', 'Sub Category - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">

        <div class="d-flex justify-content-between align-items-center ml-2">
            <h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.SubCategory')); ?></h3>
            <a class="btn btn-info btn-sm" href="<?php echo e(url('subcategory/create')); ?>">
              <span class="la-icon la-icon--sm icon-plus"></span> <?php echo e(__('adminstaticword.AddSubCategory')); ?>

            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  <th>#</th>
                  <th><?php echo e(__('adminstaticword.Category')); ?></th>
                  <th><?php echo e(__('adminstaticword.SubCategory')); ?></th>
                  
                  <th><?php echo e(__('adminstaticword.Slug')); ?></th>
                  <th><?php echo e(__('adminstaticword.Status')); ?></th>
                  <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                  <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo e($cat->categories['title']); ?></td>
                  <td><?php echo e($cat->title); ?></td>
                  
                  <td><?php echo e($cat->slug); ?></td>
                  <td>
                      <form action="<?php echo e(route('subcategory.quick',$cat->id)); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <button type="Submit" class="btn btn-xs <?php echo e($cat->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                          <?php if($cat->status ==1): ?>
                          <?php echo e(__('adminstaticword.Active')); ?>

                          <?php else: ?>
                          <?php echo e(__('adminstaticword.Deactive')); ?>

                          <?php endif; ?>
                        </button>
                      </form>
                  </td>
                  <td>
                    <a class="btn btn-success btn-sm" href="<?php echo e(url('subcategory/'.$cat->id)); ?>">
                    <i class="la-icon la-icon--lg icon-edit"></i></a>
                  </td>
                  <td>
                    <form  method="post" action="<?php echo e(url('subcategory/'.$cat->id)); ?>

                      "data-parsley-validate class="form-horizontal form-label-left">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>

                      <button  type="submit" class="btn btn-danger btn-sm"><i class="la-icon la-icon--lg icon-delete"></i></button>
                    </form>
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
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/category/subcategory/index.blade.php ENDPATH**/ ?>