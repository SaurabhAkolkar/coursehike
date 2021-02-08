<section class="content">
  <div class="row">
    <div class="col-12">
        <div class="text-right">
           <a data-toggle="modal" data-target="#myModalanswer" href="#" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.AddAnswer')); ?></a>
        </div><br/>
       
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <th>#</th>
            <th><?php echo e(__('adminstaticword.Question')); ?></th>
            <th><?php echo e(__('adminstaticword.Answer')); ?></th>
            <th><?php echo e(__('adminstaticword.Status')); ?></th>
            <th><?php echo e(__('adminstaticword.Edit')); ?></th>
            <th><?php echo e(__('adminstaticword.Delete')); ?></th>
          </tr>
          </thead>
          <tbody>
          <?php $i=0;?>
          <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
          	<?php $i++;?>
          	<td><?php echo $i;?></td>
            	<td><?php echo e($ans->question->question); ?></td>
            	<td><?php echo e($ans->answer); ?></td> 
            <td>
                <?php if($ans->status==1): ?>
                  <?php echo e(__('adminstaticword.Active')); ?>

                <?php else: ?>
                  <?php echo e(__('adminstaticword.Deactive')); ?>

                <?php endif; ?>	                    
            </td>
            
            <td>
              <a class="px-0 text-dark btn btn-success la-admin__edit-btn" href="<?php echo e(route('courseanswer.edit',$ans->id)); ?>"><i class="la-icon la-icon--lg icon-edit"></i></a>
            </td>

            <td><form  method="post" action="<?php echo e(url('courseanswer/'.$ans->id)); ?>

                "data-parsley-validate class="form-horizontal form-label-left">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>

                  <button  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
              </form>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          </tfoot>
        </table>
    
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!--Model start-->
  <div class="modal fade show" id="myModalanswer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Answer')); ?></h4>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form id="demo-form2" method="post" action="<?php echo e(url('courseanswer/')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>

               
                <input type="hidden" name="instructor_id" class="form-control" value="<?php echo e(Auth::User()->id); ?>"  />
                <input type="hidden" name="ans_user_id" value="<?php echo e(Auth::user()->id); ?>" />
           
                <div class="row">
                  <div class="col-md-12">
                    <label  for="exampleInputTit1e"><?php echo e(__('adminstaticword.SelectQuestion')); ?>:<sup class="redstar">*</sup></label>
                    <br>
                    <select style="width: 100%" name="question_id" required class="form-control col-md-7 col-12 js-example-basic-single">
                      <option value="none" selected disabled hidden> 
                       <?php echo e(__('adminstaticword.SelectanOption')); ?>

                      </option>
                      <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($ques->id); ?>"><?php echo e($ques->question); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <input type="hidden" name="ques_user_id"  value="<?php echo e($ques->user_id); ?>" />
                  <input type="hidden" name="course_id"  value="<?php echo e($ques->course_id); ?>" />
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <label for="exampleInput"><?php echo e(__('adminstaticword.Answer')); ?>:<sup class="redstar">*</sup></label>
                    <textarea name="answer" rows="4" class="form-control" placeholder="Please Enter Your Answer"></textarea>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                    <li class="tg-list-item">   
                      <input class="la-admin__toggle-switch" id="c12"  type="checkbox"/>
                      <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c12"></label>
                    </li>
                    <input type="hidden" name="status" value="1" id="t12">
                  </div>
                </div>
                <br>
        
                <div class="box-footer">
                  <button type="submit" value="Add Answer" class="btn btn-md btn-primary col-md-4 ">  <?php echo e(__('adminstaticword.Save')); ?></button>
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
<?php /**PATH E:\lila-laravel\resources\views/admin/course/answer/index.blade.php ENDPATH**/ ?>