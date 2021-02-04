<?php $__env->startSection('title', 'Course Publish Requests - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">

  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-2"><?php echo e(__('adminstaticword.Course')); ?> Publish <?php echo e(__('adminstaticword.Request')); ?></h3>
        
       
        <!-- /.box-header -->
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                  
                  <tr>
                    <th>#</th>
                    <th><?php echo e(__('adminstaticword.Image')); ?></th>
                    <th><?php echo e(__('adminstaticword.Title')); ?></th>
                    <th><?php echo e(__('adminstaticword.Instructor')); ?></th>
                    <th><?php echo e(__('adminstaticword.Slug')); ?></th>
                    <th><?php echo e(__('adminstaticword.Featured')); ?></th>
                    <th><?php echo e(__('adminstaticword.Status')); ?></th>
                    <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                  </tr>
                </thead>

                <tbody>
                  <?php $i=0;?>

                    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($r): ?>
                        <?php if($r->course->status != 1): ?>
                          <?php $i++;?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td>
                              <?php if($r->course['preview_image'] !== NULL && $r->course['preview_image'] !== ''): ?>
                                <img src="<?php echo $r->course['preview_image'];  ?>" class="img-fluid" >
                              <?php else: ?>
                                <img src="<?php echo e(Avatar::create($r->course->title)->toBase64()); ?>" class="img-fluid" >
                              <?php endif; ?>
                            </td>
                            <td><?php echo e($r->course->title); ?></td>
                            <td><?php echo e($r->course->user->fname); ?></td>
                            <td><?php echo e($r->course->slug); ?></td>
                            <td>
                              <form action="<?php echo e(route('course.quick',$r->course->id)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <button  type="Submit" class="btn btn-xs <?php echo e($r->course->featured ==1 ? 'btn-success' : 'btn-danger'); ?>">
                                  <?php if($r->course->featured ==1): ?>
                                    <?php echo e(__('adminstaticword.Yes')); ?>

                                  <?php else: ?>
                                    <?php echo e(__('adminstaticword.No')); ?>

                                  <?php endif; ?>
                                </button>
                              </form>
                            </td>
                            
                            <td>
                              <form action="<?php echo e(route('course.quick',$r->course->id)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <button  type="Submit" class="btn btn-xs <?php echo e($r->course->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                                  <?php if($r->course->status ==1): ?>
                                    <?php echo e(__('adminstaticword.Active')); ?>

                                  <?php else: ?>
                                    <?php echo e(__('adminstaticword.Deactive')); ?>

                                  <?php endif; ?>
                                </button>
                              </form>
                            </td>

                            <td>
                              <a class="btn btn-success la-admin__edit-btn" href="<?php echo e(route('course.show',$r->course->id)); ?>">
                              <i class="la-icon la-icon--lg icon-edit"></i></a>
                            </td>
                          </tr>
                        <?php endif; ?>
                      <?php endif; ?>
                 
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
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/course_review/publishRequest.blade.php ENDPATH**/ ?>