<?php if($errors->any()): ?>
<div class="alert alert-danger">
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="text-right">
        <a data-toggle="modal" data-target="#myModaljj" href="#" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.AddWhatLearns')); ?></a>
      </div> <br/>
    
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo e(__('adminstaticword.Course')); ?></th>       
              <th><?php echo e(__('adminstaticword.Detail')); ?></th>
              <th><?php echo e(__('adminstaticword.Status')); ?></th>
              <th><?php echo e(__('adminstaticword.Edit')); ?></th>
              <th><?php echo e(__('adminstaticword.Delete')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0;?>
            <?php $__currentLoopData = $whatlearns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <?php $i++;?>
                  <td><?php echo $i;?></td>
                <td><?php echo e($cat->courses->title); ?></td>
                <td><?php echo e(strip_tags($cat->detail)); ?></td> 
                <td>
                  <form action="<?php echo e(route('what.quick',$cat->id)); ?>" method="POST">
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
                  <a class="btn btn-success btn-sm" href="<?php echo e(url('whatlearns/'.$cat->id)); ?>"><i class="la-icon la-icon--lg icon-edit"></i></a>
                </td> 
                <td>
                  <form  method="post" action="<?php echo e(url('whatlearns/'.$cat->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>


                    <button  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
    </div>
  </div>

  <!--Model start-->
  <div class="modal fade show" id="myModaljj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.WhatLearns')); ?></h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body pt-4">
              <form id="demo-form2" method="post" action="<?php echo e(route('whatlearns.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>


                <select name="course_id" class="form-control display-none">
                  <option class="" name="course_id"  value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
                </select>

                <div class="row">
                  <div class="col-md-12 pt-3">
                    <label  for="exampleInputDetails"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                    <textarea rows="3" name="detail" class="form-control" placeholder="Enter Your Detail"></textarea>
                  </div>
                  <div class="col-md-12 pt-3">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                     <li class="tg-list-item">              
                      <input class="la-admin__toggle-switch" id="status1" type="checkbox" name="status" >
                      <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status1"></label>
                    </li>
                    <input type="hidden"  name="free" value="0" for="status1" id="status1">
                  </div>
                </div>
                <br>
                <div class="box-footer">
                  <button type="submit" class="btn btn-md col-md-6 btn-primary"><?php echo e(__('adminstaticword.Submit')); ?></button>
                </div>
             
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Model close -->    

</section> 
<?php /**PATH E:\lila-laravel\resources\views/admin/course/whatlearns/index.blade.php ENDPATH**/ ?>