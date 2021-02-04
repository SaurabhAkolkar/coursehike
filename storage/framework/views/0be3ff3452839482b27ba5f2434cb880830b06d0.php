<?php $__env->startSection('title', 'Edit Category - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.EditCategory')); ?></h3>
        
       
        <div class="panel-body pl-3">

          <form id="demo-form" method="post" action="<?php echo e(url('category/'.$cate->id)); ?>

              "data-parsley-validate class="form-horizontal form-label-left" autocomplete="off" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>


            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Category')); ?>:<sup class="redstar">*</sup></label>
                <input type="text" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($cate->title); ?>">
                <?php $__errorArgs = ['title'];
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
            </div><br/>


            <div class="row">
              <div class="col-md-6">
                <div class="la-admin__preview">
                  <label for="" class="la-admin__preview-label"><?php echo e(__('adminstaticword.Image')); ?>:</label>
                  <div class="la-admin__preview-img la-admin__course-imgvid" >
                       <div class="la-admin__preview-text">
                            <p class="la-admin__preview-size">Preview Image size: 250x150</p>
                            <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                      </div>
                      <div class="text-center pr-20 mr-10">
                        <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                          <span class="path1"><span class="path2"></span></span>
                        </span>
                      </div>
                      <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="image" id="image" />
                      <img src="" alt="" class="d-none preview-img" required/>
                  </div>
                </div>
              </div>
            </div>
            <br>

            

            <div class="row">
              <div class="col-md-2">
                <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Featured')); ?>:</label>
                <li class="tg-list-item">              
                  <input class="la-admin__toggle-switch" id="featured" type="checkbox" name="featured" <?php echo e($cate->featured == '1' ? 'checked' : ''); ?> >
                  <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="featured"></label>
                </li>
                <input type="hidden"  name="free" value="0" for="featured" id="featured">
              </div>

              <div class="col-md-2">
                <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
               
                <li class="tg-list-item">              
                  <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> >
                  <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                </li>
                <input type="hidden"  name="free" value="0" for="status" id="status">
              </div>
            </div>
            <br>
            
            <div class="row">
              <div class="col-md-6 text-right">
                <div class=" box-footer">
                  <button type="submit" class="btn btn-md btn-primary px-14"><?php echo e(__('adminstaticword.Save')); ?></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
      
        $(document).on("change", ".preview_video", function(evt) {
          var $source = $(this).siblings('.preview-video');
          $source.find("source").attr("src", URL.createObjectURL(this.files[0]));
          $source.load();
          $($source).removeClass('d-none');
        });

        
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
        

        $('#preview').on('change',function(){

        if($('#preview').is(':checked')){
          $('#document1').show('fast');
          $('#document2').hide('fast');
        }else{
          $('#document2').show('fast');
          $('#document1').hide('fast');
        }

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/category/update.blade.php ENDPATH**/ ?>