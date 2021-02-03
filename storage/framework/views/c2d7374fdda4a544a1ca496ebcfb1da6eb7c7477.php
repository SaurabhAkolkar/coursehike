<?php $__env->startSection('title', 'Edit Child Category - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.ChildCategory')); ?></h3>
          
          <!-- /.box-header -->
          <!-- form start -->
       
          <div class="box-body">
            <div class="form-group">
            <form id="demo-form" method="post" action="<?php echo e(url('childcategory/'.$cate->id)); ?>" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>


              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputSlug"><?php echo e(__('adminstaticword.SelectCategory')); ?></label>
                  <select name="category_id" id="category_id" class="form-control js-example-basic-single">
                    <?php
                      $category = App\Categories::all();
                    ?>  
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($cate->category_id == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </select>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputSlug"><?php echo e(__('adminstaticword.SelectSubCategory')); ?></label>
                  <select name="subcategory_id" id="upload_id" class="form-control js-example-basic-single">
                    <?php
                      $subcategory = App\SubCategory::all();
                    ?>  
                    <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($cate->subcategory_id == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </select>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label for="title"><?php echo e(__('adminstaticword.Title')); ?>:<span class="redstar">*</span></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($cate->title); ?>">
                </div>
              </div>
              <br>

              
              
              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                    <li class="tg-list-item">              
                      <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> >
                      <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                    </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div>
              <br>

              <div class="box-footer">
              <button type="submit" class="btn btn-lg col-md-4 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
              </div>
              </div>
            </form>
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
(function($) {
  "use strict";
  
  $(function() {
    var urlLike = '<?php echo e(url('admin/dropdown')); ?>';
    $('#category_id').change(function() {
      var up = $('#upload_id').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
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
  });

})(jQuery);
</script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/category/childcategory/edit.blade.php ENDPATH**/ ?>