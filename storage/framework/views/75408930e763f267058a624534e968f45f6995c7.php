<?php $__env->startSection('title', 'Edit Course - Admin'); ?>
<?php $__env->startSection('body'); ?>

<div class="box">
  <div class="pl-8 pt-8">
      <h3 class="la-admin__section-titl ml-1"><?php echo e($cor->title); ?></h3>
  </div>
  <?php if($errors->any()): ?>
  <div class="box-body">
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  </div>   
  <?php endif; ?> 
</div>

<section class="content">
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-body">
          <div class="nav-tabs-custom">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="nav-tab" role="tablist">
              <li role="presentation" ><a href="#a" aria-controls="home" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.CourseDetail')); ?></a></li>
              
              
              <li  class=""  role="presentation"><a href="#d" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.CourseChapter')); ?></a></li>
              <li  class=""  role="presentation"><a href="#e" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.CourseClass')); ?></a></li>
              <li  class=""  role="presentation"><a href="#resource" aria-controls="settings" role="tab" data-toggle="tab">Course Resource</a></li>
              
              
              <?php if(Auth::user()->id == $cor->user_id): ?> <li class="" role="presentation"><a href="#publish" aria-controls="settings" role="tab" data-toggle="tab"><?php echo e(__('adminstaticword.Publish')); ?></a></li><?php endif; ?>
              
              

              
             
           
            </ul>
            

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fadein active" id="a">
                <?php echo $__env->make('admin.course.editcor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="tab-pane fadein" id="b">
                <?php echo $__env->make('admin.course.courseinclude.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fadein tab-pane" id="c">
                <?php echo $__env->make('admin.course.whatlearns.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fadein tab-pane" id="d">
                <?php echo $__env->make('admin.course.coursechapter.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fadein tab-pane" id="e">
                <?php echo $__env->make('admin.course.courseclass.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fadein tab-pane" id="resource">
                <?php echo $__env->make('admin.course.courseresource.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fadein tab-pane" id="market">
                <?php echo $__env->make('admin.course.relatedcourse.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fadein tab-pane" id="copy">
                <?php echo $__env->make('admin.course.questionanswer.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fadein tab-pane" id="ans">
                <?php echo $__env->make('admin.course.answer.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <div role="tabpanel" class="fadein tab-pane" id="jj">
                <?php echo $__env->make('admin.course.reviewrating.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              
              <?php if(Auth::user()->id == $cor->user_id): ?>

                <div role="tabpanel" class="fadein tab-pane" id="publish">
                  <?php echo $__env->make('admin.course.publish.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

              <?php endif; ?>
              
              <div role="tabpanel" class="fadein tab-pane" id="topic">
                <?php echo $__env->make('admin.course.quiztopic.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
             
              <div role="tabpanel" class="fadein tab-pane" id="appoint">
                <?php echo $__env->make('admin.course.appointment.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
             
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<script>
(function($) {
"use strict";
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#nav-tab a[href="' + activeTab + '"]').tab('show');
    }
  });
})(jQuery);
</script>

<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/course/show.blade.php ENDPATH**/ ?>