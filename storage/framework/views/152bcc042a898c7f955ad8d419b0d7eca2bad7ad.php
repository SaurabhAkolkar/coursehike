<section class="content">
 
<div class="row">
  <div class="col-md-12">
    <div class="text-right">
      <a data-toggle="modal" data-target="#myModalJ" href="#" class="btn btn-info btn-sm text-right">+ <?php echo e(__('adminstaticword.AddCourseInclude')); ?></a>
    </div><br/>
   
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
          <?php $__currentLoopData = $courseinclude; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <?php $i++;?>
              <td><?php echo $i;?></td>
              <td><?php echo e($cat->courses->title); ?></td>
              <td><?php echo e(strip_tags($cat->detail)); ?></td> 
              <td>
                <?php if($cat->status==1): ?>
                  <?php echo e(__('adminstaticword.Active')); ?>

                <?php else: ?>
                  <?php echo e(__('adminstaticword.Deactive')); ?>

                <?php endif; ?>
                
              </td>
              <td>
                  <a class="btn btn-success btn-sm" href="<?php echo e(url('courseinclude/'.$cat->id)); ?>">
                    <i class="la-icon la-icon--lg icon-edit"></i></a>
              </td>              

              <td>
                <form  method="post" action="<?php echo e(url('courseinclude/'.$cat->id)); ?>

                     "data-parsley-validate class="form-horizontal form-label-left">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <button  type="submit"  class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
                </form>
              </td>

            </tr>
                   
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                
        </tbody>
      </table>
  </div>
</div>

<!--Model start-->
<div class="modal fade show" id="myModalJ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-block">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title " id="myModalLabel"><?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.CourseInclude')); ?></h4>
      </div>
       <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="<?php echo e(route('courseinclude.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>

     
                <select class="display-none" name="course_id" class="form-control">
                  <option value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
                </select>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                    <textarea rows="2" name="detail" class="form-control" placeholder="Enter Your Detail"></textarea>
                  </div>
                </div>
                <br>

                <div class="col-md-12">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                  <li class="tg-list-item">              
                    <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
                <br>
                <div class="box-footer">
                  <button type="submit" class="btn btn-lg col-md-6 btn-primary"><?php echo e(__('adminstaticword.Submit')); ?></button>
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


<?php /**PATH E:\lila-laravel\resources\views/admin/course/courseinclude/index.blade.php ENDPATH**/ ?>