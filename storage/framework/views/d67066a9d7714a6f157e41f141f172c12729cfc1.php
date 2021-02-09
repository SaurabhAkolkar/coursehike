<?php $__env->startSection('title', 'Requests - Instructor'); ?>
<?php $__env->startSection('body'); ?>

<div class="box">
  <div class="box-header ml-7 ">
    <h3 class=" la-admin__section-title">Requests</h3>
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
          <div class="nav-tabs-custom" >
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="nav-tab" role="tablist" style="overflow-x:hidden !important;">
              <li role="presentation" class=""><a class="active" href="#pending" aria-controls="home" role="tab" data-toggle="tab">Pending</a></li>
              <li  class=""  role="presentation"><a href="#resolved" aria-controls="settings" role="tab" data-toggle="tab">Resolved</a></li>           
            </ul>

            <!-- Tab panes -->
            <div class="tab-content py-md-8" >

            <!-- PENDING REQUEST TAB: START -->
            <div role="tabpanel" class="tab-pane fadein active" id="pending">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Image</th>
                            <th>Course Name</th>
                            <th>Request Type</th>
                            <th>Request Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                        ?>
                        <?php $__currentLoopData = $publishRequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td><?php echo e(++$i); ?></td>
                              <td>
                                  <img src="<?php echo e($pr->course->preview_image); ?>" alt="" />
                              </td>
                              <td><?php echo e($pr->course->title); ?></td>
                              <td><?php if($pr->request_type == 'publish'): ?> Publish Request <?php else: ?> Unpublish Request <?php endif; ?></td>
                              <td><?php echo e(Carbon\Carbon::parse($pr->created_at)->format('d-m-Y')); ?></td>

                              <td>
                                  <a class="btn btn-success la-admin__edit-btn" href="/course/create/<?php echo e($pr->course_id); ?>" role="button">
                                      <span class="la-icon la-icon--lg icon-edit" style="color:#000"></span>
                                  </a>
                              </td>

                              <td>
                                  <form  method="post" action="/delete-course-request" data-parsley-validate  class="form-horizontal form-label-left">
                                      <?php echo csrf_field(); ?>
                                      <input type="hidden" name="request_id" value = "<?php echo e($pr->id); ?>" />
                                      <button  type="submit" class="btn btn-danger mt-1"><span class="la-icon la-icon--lg icon-delete"></span></button>
                                  </form>
                              </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- PENDING REQUEST TAB: END -->



            <!-- RESOLVED REQUEST TAB: START -->
            <div role="tabpanel" class="tab-pane fadein" id="resolved">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Image</th>
                            <th>Course Name</th>
                            <th>Request Type</th>
                            <th>Request Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                        ?>
                        <?php $__currentLoopData = $publishRequestResolved; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td><?php echo e(++$i); ?></td>
                              <td>
                                  <img src="<?php echo e($pr->course->preview_image); ?>" alt="" />
                              </td>
                              <td><?php echo e($pr->course->title); ?></td>
                              <td><?php if($pr->request_type == 'publish'): ?> Publish Request <?php else: ?> Unpublish Request <?php endif; ?></td>
                              <td><?php echo e(Carbon\Carbon::parse($pr->created_at)->format('d-m-Y')); ?></td>
                              <td>Resolved</td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
              </div>
            </div>
            <!-- PENDING REQUEST TAB: END -->

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
  
<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/instructor/requests/index.blade.php ENDPATH**/ ?>