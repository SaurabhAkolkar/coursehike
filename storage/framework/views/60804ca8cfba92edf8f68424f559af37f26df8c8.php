<?php $__env->startSection('title', 'All Mentors - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-2 mb-0"><?php echo e(__('adminstaticword.AllInstructor')); ?></h3>
        
        <!-- /.box-header -->
        <div class="box-body">
            <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
              <!-- <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a> -->
            </div>
            
            <table id="example1" class="table table-bordered table-striped pt-8">
              <thead>
                <tr>
                  <th>#</th>
                	<th><?php echo e(__('adminstaticword.Image')); ?></th>
                  <th><?php echo e(__('adminstaticword.Name')); ?></th>
                  <th><?php echo e(__('adminstaticword.Email')); ?></th>
                  <th ><?php echo e(__('adminstaticword.Detail')); ?></th>
                  <th><?php echo e(__('adminstaticword.Status')); ?></th>
                  <th><?php echo e(__('adminstaticword.Additional')); ?></th>
                  <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                </tr>
              </thead>

              <tbody>
                <?php
                    $count = 0;
                ?>

                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e(++$count); ?></td>
                	<td><img src="<?php echo e($item->userimg); ?>" class="img-fluid"></td> 
                  <td><?php echo e($item->fname); ?></td>
                  <td><?php echo e($item->email); ?></td>

                  <td>
                    <span><?php echo str_limit(strip_tags($item->detail), 50); ?></span>
                  </td>

                  <td>
                      <?php if($item->status==1): ?>
                        <?php echo e(__('adminstaticword.Active')); ?>

                      <?php else: ?>
                        <?php echo e(__('adminstaticword.Inactive')); ?>

                      <?php endif; ?>
                  </td>
                  <td>
                    <a class="text-dark la-admin__edit-btn" href="/instructor/edit-addition-details/<?php echo e($item->id); ?>">
                        <i class="la-icon la-icon--lg icon-edit"></i>
                    </a>
                  </td>

                  <td>
                      <a class="text-dark la-admin__edit-btn" href="/user/edit/<?php echo e($item->id); ?>">
                          <i class="la-icon la-icon--lg icon-edit"></i>
                      </a>
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
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/instructor/all_instructor/index.blade.php ENDPATH**/ ?>