<?php $__env->startSection('title', 'Add Facts Slider - Admin'); ?>
<?php $__env->startSection('body'); ?>

<?php $__env->startSection("title","Add Sub Category"); ?>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.FactsSlider')); ?></h3>
        
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="<?php echo e(action('SliderfactsController@store')); ?>"vdata-parsley-validate 
              class="form-horizontal form-label-left"enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

                  

              <div class="row">
                <div class="col-md-6">
                  <label for="icon"><?php echo e(__('adminstaticword.Icon')); ?>:<sup class="redstar">*</sup></label>
                  <input class="form-control icp-auto icp" type="text" name="icon" placeholder="Select Icon">
                </div>
              </div><br/>

              <div class="row">
                <div class="col-md-6">
                  <label for="heading"><?php echo e(__('adminstaticword.Heading')); ?>:<sup class="redstar">*</sup></label>
                  <input class="form-control" type="text" name="heading" placeholder="Please Enter Your Heading">
                </div>
              </div><br/>

              <div class="row">
                <div class="col-md-6">
                  <label for="sub_heading"><?php echo e(__('adminstaticword.SubHeading')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="sub_heading" id="sub_heading" placeholder="Please Enter Your Sub Heading">
                </div>
              </div>
              <br>
              
              <div class="row">
                <div class="col-6">
                  <div class="box-footer">
                    <button type="submit" value="Add Slider" class="btn btn-md btn-primary px-14"><?php echo e(__('adminstaticword.Save')); ?></button>
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


<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/slider_facts/create.blade.php ENDPATH**/ ?>