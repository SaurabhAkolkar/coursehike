<?php $__env->startSection('title', 'Edit Chapter - Admin'); ?>
<?php $__env->startSection('body'); ?>

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
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.EditCourseChapter')); ?></h3>
        
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="<?php echo e(url('coursechapter/'.$cate->id)); ?>"data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>


              <div class="row">
                <div class="col-md-12 mb-4">
                  <label class=""><?php echo e(__('adminstaticword.SelectCourse')); ?>:</label>
                  <select name="course_id" class=" form-control  col-12 display-none">
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cou->id); ?>" <?php echo e($cate->courses->id == $cou->id  ? 'selected' : ''); ?>><?php echo e($cou->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Name')); ?>:<span class="redstar">*</span></label>
                  <input type="" class="form-control" name="chapter_name" id="exampleInputTitle" value="<?php echo e($cate->chapter_name); ?>">
                  <br>
                </div>
              </div>

              <!-- CLASS THUMBNAIL: START -->
              <div class="row">
                <div class="col-12">
                      <div class="la-admin__preview mt-0">
                        <label for="" class="la-admin__preview-label"> Class Thumbnail:<sup class="redstar">*</sup></label>
                        <div class="la-admin__preview-img la-admin__course-imgvid2" >
                              <div class="la-admin__preview-text">
                                  <p class="la-admin__preview-size">Thumbnail | 500x350</p>
                                  <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                            </div>
                            <div class="text-center pr-20 mr-20">
                              <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                <span class="path1"><span class="path2"></span></span>
                              </span>
                            </div>
                            <input type="file" class="form-control la-admin__preview-input preview_img" name="preview_image" />
                            <img src="<?php echo e($cate->thumbnail); ?>" alt="" class="preview-img"/>
                        </div>
                      </div>
                </div>
              </div>
              <!-- CLASS THUMBNAIL: END -->
              <br>

              <div class="row">
                <div class="col-md-12 mb-2">
                  <label>One-Time Purchase Cost:<span class="redstar">*</span> </label>
                  <input type="text" placeholder="Enter Your Class Price" class="form-control " name="price" value="<?php echo e($cate->price); ?>">
                </div>
                <div class="col-md-6"> 
                  
                </div>
              </div>


              
              


                <!--  ADD CLASS STATUS: START -->
                <div class="row mt-3">
                  <div class="col-12">
                    <label class="la-admin__preview-label"> Status:<sup class="redstar">*</sup></label>
                    <div class="la-admin__class-status d-flex justify-content-start">
                      <div class="la-admin__class-active pr-5">
                          <input type="radio" name="status" id="addClass-active" value="2" class="la-admin__cp-input" <?php echo e($cate->status == '2' ? 'checked' : ''); ?> >
                          <label for="addClass-active" > 
                            <div class="la-admin__cp-circle">
                              <span class="la-admin__cp-radio"></span>
                              <span class="la-admin__cp-label">Active</span> 
                            </div>
                          </label>
                      </div>

                      <div class="la-admin__class-hold pr-5">
                        <input type="radio" name="status" id="addClass-hold" value="0" class="la-admin__cp-input" <?php echo e($cate->status == '0' ? 'checked' : ''); ?> >
                        <label for="addClass-hold" > 
                          <div class="la-admin__cp-circle">
                            <span class="la-admin__cp-radio"></span>
                            <span class="la-admin__cp-label">On hold</span> 
                          </div>
                        </label>
                      </div>

                      <div class="la-admin__class-archive pr-5">
                        <input type="radio" name="status" id="addClass-archive" value="1" class="la-admin__cp-input" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> >
                        <label for="addClass-archive" > 
                          <div class="la-admin__cp-circle">
                            <span class="la-admin__cp-radio"></span>
                            <span class="la-admin__cp-label">Archive</span> 
                          </div>
                        </label>
                    </div>
                  </div>
                  </div>
              </div>
              <!-- ADD CLASS STATUS: END -->

              <div class="box-footer mt-10">
                <button type="submit" class="btn btn-md col-md-4 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();    
    reader.onload = function(e) {
      $(input).siblings('.preview-img').attr('src', e.target.result).removeClass('d-none');
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$(".preview_img").change(function() {
  readURL(this);
});

$(document).on("change", ".preview_video", function(evt) {
  var $source = $(this).siblings('.preview-video');
  $source.find("source").attr("src", URL.createObjectURL(this.files[0]));
  $source.load();
  $($source).removeClass('d-none');
});

</script>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/course/coursechapter/edit.blade.php ENDPATH**/ ?>