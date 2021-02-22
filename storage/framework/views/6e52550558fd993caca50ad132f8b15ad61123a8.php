<?php $__env->startSection('title', 'Course Language - Admin'); ?>
<?php $__env->startSection('body'); ?>


<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="d-md-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title ml-2"><?php echo e(__('adminstaticword.CourseLanguage')); ?></h3>
          <a data-toggle="modal" data-target="#myModaljjh" href="#" class="btn btn-info btn-sm">
            <span class="la-icon la-icon--sm icon-plus"></span> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.CourseLanguage')); ?></a>
        </div>

        <div class="box-body">
          
         
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo e(__('adminstaticword.Language')); ?></th>
                  <th><?php echo e(__('adminstaticword.Status')); ?></th>
                  <th><?php echo e(__('adminstaticword.Edit')); ?></th>
                  <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                </tr>
                </thead>

                <tbody>
                  <?php $i=0;?>
                  <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $i++;?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo e($cat->name); ?></td>
                      <td>
                        <form action="<?php echo e(route('language.quick',$cat->id)); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <button type="Submit" class="m-0 btn btn-xs <?php echo e($cat->status ==1 ? 'btn-success' : 'btn-danger'); ?>">
                            <?php if($cat->status ==1): ?>
                            <?php echo e(__('adminstaticword.Active')); ?>

                            <?php else: ?>
                            <?php echo e(__('adminstaticword.Deactive')); ?> 
                            <?php endif; ?>
                          </button>
                        </form>
                      </td>          
                      <td><a class="btn btn-success la-admin__edit-btn" href="<?php echo e(url('courselang/'.$cat->id.'/edit')); ?>">
                          <i class="la-icon la-icon--lg icon-edit"></i></a></td>

                      <td><form method="post" action="<?php echo e(url('courselang/'.$cat->id)); ?>

                            "data-parsley-validate class="form-horizontal form-label-left">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                            <button  type="submit" class="btn btn-danger m-0"><i class="la-icon la-icon--lg icon-delete"></i></button>
                          </form>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
        <!--Panel Body end-->
      </div>
      <!--Box Primary end-->

      <!--Model start-->
      <div class="modal fade show" id="myModaljjh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header d-block">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel"><?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Language')); ?></h4>
            </div>
            <div class="box box-primary">
              <div class="panel panel-sum">
                <div class="modal-body">
                  <form id="demo-form2" method="post" action="<?php echo e(route('courselang.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <?php echo e(csrf_field()); ?>

                            
                    <div class="row">
                      <div class="col-md-12">
                        <label><?php echo e(__('adminstaticword.Name')); ?>:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="name" placeholder="Please Enter Your  Language Name" value="" required>
                          <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <div class="la-btn__alert-danger alert alert-danger">
                                    <?php echo e($message); ?>

                              </div>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6 mt-3 mt-md-0">
                        <label for="exampleInputSlug">ISO Code:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="iso_code" placeholder="Eg, en, hi, ta, etc,." value="" required> 
                          <?php $__errorArgs = ['iso_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <div class="la-btn__alert-danger alert alert-danger">
                                    <?php echo e($message); ?>

                              </div>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-md-6  mt-3 mt-md-0">
                        <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                          <li class="tg-list-item">              
                          <input class="la-admin__toggle-switch" id="welmail" type="checkbox" name="status" >
                          <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="welmail"></label>
                        </li>
                        <input type="hidden"  name="free" value="0" for="status" id="status">
                      </div>
                    </div>
                    <br>
                    <div class="box-footer">
                     <button type="submit" class="btn btn-lg col-md-4 btn-primary"><?php echo e(__('adminstaticword.Submit')); ?></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <!--Model close -->
  </div>
</section> 


<?php if($errors->all()): ?>
  <?php $__env->startSection('script'); ?>
    <script>
      $('#myModaljjh').modal('show');
    </script>
  <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/course_language/index.blade.php ENDPATH**/ ?>