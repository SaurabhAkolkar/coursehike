<?php $__env->startSection('title', 'Edit Featured Mentor - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.FeaturedMentors')); ?></h3>
       
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="<?php echo e(action('FeaturedMentorController@update')); ?>"vdata-parsley-validate 
              class="form-horizontal form-label-left"enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

                  
            <input type="hidden" value="<?php echo e($data->id); ?>" name="featured_id" />
              <div class="row">
                    <div class="col-md-4">
                        <label for="Mentor"><?php echo e(__('adminstaticword.Mentor')); ?>:<sup class="redstar">*</sup></label>
                        <select name="mentor" id="mentor" class="form-control js-example-basic-single" disabled>
                            <option selected disabled >Select Mentor</option>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($u->id); ?>" <?php if($u->id == $data->user_id): ?> selected <?php endif; ?> ><?php echo e($u->fullName); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="Course"><?php echo e(__('adminstaticword.Course')); ?>:<sup class="redstar">*</sup></label>
                        <select name="course" id="courses" class="form-control js-example-basic-single">
                            <option selected disabled>Select User First</option>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($c->id); ?>" <?php if($c->id == $data->course_id): ?> selected <?php endif; ?>><?php echo e($c->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
              </div>
            <br>

              <div class="row">
                    <div class="col-md-4">
                        <div class="la-admin__preview">
                            <label><?php echo e(__('adminstaticword.UserImage')); ?>:<sup class="redstar">*</sup></label>
                            <br>
                            <div class="la-admin__preview-img la-admin__course-imgvid la-admin__course-modal-imgvid" >
                              <div class="la-admin__preview-text" onclick="$('#user_image').click()">
                                <p class="la-admin__preview-size">Preview Image</p>
                                <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                              </div>
                              <div class="text-center pr-20 mr-10">
                                <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                                <input type="file" name="user_image"  id="user_image" class="d-none">
                                <?php if($data['user_thumbnail']): ?><img height="200" src="<?php echo e($data['user_image']); ?>"/><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="la-admin__preview">
                            <label><?php echo e(__('adminstaticword.ImageThumbnail')); ?>:<sup class="redstar">*</sup></label>
                            <br>
                            <div class="la-admin__preview-img la-admin__course-imgvid la-admin__course-modal-imgvid" >
                              <div class="la-admin__preview-text" onclick="$('#image_thumbnail').click()">
                                <p class="la-admin__preview-size">Preview Image</p>
                                <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                              </div>
                              <div class="text-center pr-20 mr-10">
                                <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                                <input type="file" name="image_thumbnail"  id="image_thumbnail" class="d-none">
                                <?php if($data['user_thumbnail']): ?><img height="200" src="<?php echo e($data['user_thumbnail']); ?>"/><?php endif; ?>
                            </div>
                        </div>
                    </div>                  
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                
                            <label><?php echo e(__('adminstaticword.Status')); ?>:</label>
                            <li class="tg-list-item">
                              <input class="la-admin__toggle-switch" id="cb1" type="checkbox" name="status" <?php if($data->status == 1): ?> checked <?php endif; ?> value="1" >
                              <label class="la-admin__toggle-label" data-tg-off="No" data-tg-on="Yes" for="cb1"></label>
                            </li>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8">
              
                  <div class="box-footer">
                    <button type="submit" value="Add Slider" class="btn btn-md btn-primary px-14"> <?php echo e(__('adminstaticword.Save')); ?></button>
                  </div>
                </div>
              </div>
         
            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script>

    var urlLike = '<?php echo e(url('featuredMentors/getcourses')); ?>';
    $('#mentor').change(function() {
      var up = $('#courses').empty();
      var user_id = $(this).val();    
      if(user_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {user_id: user_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0" disabled selected>Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });

    $(function() {
      $('#cb1').change(function() {
        $('#f').val(+ $(this).prop('checked'))
      })
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/featured_mentors/edit.blade.php ENDPATH**/ ?>