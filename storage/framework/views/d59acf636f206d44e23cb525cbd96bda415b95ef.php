<?php $__env->startSection('title', 'Add Creator Payout- Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Course')); ?></h3>
       
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="<?php echo e(route('addusercourse')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>         
            <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>" />
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Course')); ?>:<sup class="redstar">*</sup></label>
                  <select name="course_id" id="course_id" class="form-control js-example-basic-single col-md-7 col-12">
                        <option disabled selected>Choose Option</option>
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['course_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="alert alert-danger">  
                              <?php echo e($message); ?>

                          </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mt-4">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.CourseAmount')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="amount" id="exampleInputTitle" >
                    <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="alert alert-danger">  
                              <?php echo e($message); ?>

                          </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
            
              <div class="row">
                <div class="col-md-6 mt-3">
                    <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.PurchaseType')); ?>:<sup class="redstar">*</sup></label>
                    <select name="purchase_type" id="purchase_type" class="form-control js-example-basic-single col-12">
                        <option disabled selected>Choose Option</option>
                        <option value="all_classes">All Classes</option>
                        <option value="selected_classes">Selected Classes</option>
                    </select>
                    <?php $__errorArgs = ['purchase_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="alert alert-danger">  
                              <?php echo e($message); ?>

                          </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mt-4" id="class_id_div">
                    <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Classes')); ?>:<sup class="redstar">*</sup></label>
                    <select name="class_id[]" id="class_id"  class="form-control js-example-basic-single  col-12" multiple>
                            <option disabled selected>Please Choose</option>
                    </select>
                    <?php $__errorArgs = ['class_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="alert alert-danger">  
                              <?php echo e($message); ?>

                          </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>               
              </div>
              <br> <br>      

              <div class="row">
                  <div class="col-md-6">      
                    <div class="box-footer">
                      <button type="submit" class="btn btn-lg btn-primary px-14"> <?php echo e(__('adminstaticword.Save')); ?></button>
                    </div>
                  </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col -->
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $('#purchase_type').change(function() {
        if($('#purchase_type').val() == 'all_classes'){
            $('#class_id_div').addClass('d-none');
        }else{
            $('#class_id_div').removeClass('d-none');
        }   
    })

    $('#course_id').change(function() {
        var cat_id = $(this).val();  
        var up = $('#class_id').empty();  
        let urlLike = '<?php echo e(url('/get-classes')); ?>';
        if(cat_id){
          $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"GET",
            url: urlLike,
            data: {course_id: cat_id},
            success:function(data){   
              console.log(data);
              up.append('<option value="0">Please choose</option>');
              $.each(data, function(id, chapter_name) {
                up.append($('<option>', {value:id, text:chapter_name}));
              });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/user/addcourse.blade.php ENDPATH**/ ?>