<section class="content">
 
  <div class="row">
    <div class="col-md-12">
      <div class="text-right">
          <a data-toggle="modal" data-target="#myModalab" href="#" class="btn btn-info btn-sm">+ <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.CourseClass')); ?></a>
      </div><br/>

        <table id="example1" class="table table-bordered table-striped db">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo e(__('adminstaticword.CourseChapter')); ?></th>
              <th><?php echo e(__('adminstaticword.Title')); ?></th>
              <th><?php echo e(__('adminstaticword.Status')); ?></th>
              <th><?php echo e(__('adminstaticword.Featured')); ?></th>
              <th><?php echo e(__('adminstaticword.Edit')); ?></th>
              <th><?php echo e(__('adminstaticword.Delete')); ?></th>
            </tr>
          </thead>
          <tbody id="sortable">
            <?php $i=0;?>
            <?php $__currentLoopData = $courseclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="sortable row1" data-id="<?php echo e($cat->id); ?>">
                <?php $i++;?>
                <td><?php echo $i;?></td>
                <?php
                $chname = App\CourseChapter::where('id','=',$cat->coursechapter_id)->get();
                ?>
                <td>
                  <?php $__currentLoopData = $chname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php echo e($cc->chapter_name); ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td><?php echo e($cat->title); ?></td>
                <td>
                  <?php if($cat->status==1): ?>
                   <?php echo e(__('adminstaticword.Active')); ?>

                  <?php else: ?>
                   <?php echo e(__('adminstaticword.Deactive')); ?>

                  <?php endif; ?>
                </td>
                <td>
                  <?php if($cat->featured==1): ?>
                    <?php echo e(__('adminstaticword.Yes')); ?>

                  <?php else: ?>
                    <?php echo e(__('adminstaticword.No')); ?>

                  <?php endif; ?>
                </td>
                <td>
                  <a class="btn btn-success btn-sm" href="<?php echo e(url('courseclass/'.$cat->id)); ?>"><i class="la-icon la-icon--lg icon-edit"></i></a>
                </td> 
                <td>
                  <form  method="post" action="<?php echo e(url('courseclass/'.$cat->id)); ?>"data-parsley-validate class="form-horizontal form-label-left">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>


                    <button  type="submit" class="btn btn-danger btn-sm"><i class="la-icon la-icon--lg icon-delete"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
    </div>
  </div>

  <!--Model start-->
  <div class="modal fade show" id="myModalab" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="myModalLabel"><?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.CourseClass')); ?></h3>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <form enctype="multipart/form-data" id="demo-form2" method="post" action="<?php echo e(route('courseclass.store')); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo e(csrf_field()); ?>

                          
                <div class="row">
                  <div class="col-md-12">
                    <select class="display-none" name="course_id" class="form-control">
                      <option value="<?php echo e($cor->id); ?>"><?php echo e($cor->title); ?></option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <label ><?php echo e(__('adminstaticword.ClassName')); ?>:<sup class="redstar">*</sup></label>
                    <select name="course_chapters" class="form-control  col-12 js-example-basic-single" required>
                      <?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($c->id); ?>"><?php echo e($c->chapter_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-12">
                    <label ><?php echo e(__('adminstaticword.CourseClass')); ?> <?php echo e(__('adminstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control " name="title" id="exampleInputTitle"   placeholder="Enter Your Title"value="" required>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-12">
                    <label><?php echo e(__('adminstaticword.Detail')); ?>:</label><br>
                    <textarea name="detail" rows="3" class="form-control"></textarea>
                  </div>
                </div>
                
                <!-- CLASS THUMBNAIL: START -->
                <div class="row mt-3">
                  <div class="col-12">
                        <div class="la-admin__preview">
                          <label for="" class="la-admin__preview-label p-0">Thumbnail Image:<sup class="redstar">*</sup></label>
                          <div class="la-admin__preview-img la-admin__course-imgvid la-admin__course-modal-imgvid" >
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
                              <img src="" alt="" class="d-none preview-img"/>
                          </div>
                        </div>
                  </div>
                </div>
                <!-- CLASS THUMBNAIL: END -->
                
                <!-- CLASS VIDEO: START -->
                <div class="row mt-3">
                  <div class="col-12">
                        <div class="la-admin__preview">
                          <label for="" class="la-admin__preview-label p-0">Video Upload:<sup class="redstar">*</sup></label>
                          <div class="la-admin__preview-img la-admin__course-imgvid" >
                               <div class="la-admin__preview-text">
                                    <p class="la-admin__preview-size">Video | 2G</p>
                                    <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                              </div>
                              <div class="text-center pr-20 mr-20">
                                <span class="la-icon la-icon--8xl icon-preview-video" style="font-size:150px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                              <input type="file" class="form-control la-admin__preview-input preview_video" name="video_upld" />
                              <video controls  class="d-none preview-video w-100">
                                <source src="">
                                  Your browser does not support HTML5 video.
                              </video>
                          </div>
                        </div>
                  </div>
                </div>
                <!-- CLASS VIDEO: END -->


                <div class="row mt-3">  
                  <div class="col-md-6">    
                    <label ><?php echo e(__('adminstaticword.Is_preview_video')); ?>:</label>
                    <li class="tg-list-item">   
                      <input class="la-admin__toggle-switch" id="c11" name="is_preview"  type="checkbox"/>
                      <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c11"></label>
                    </li>
                    
                  </div>
                  <div class="col-md-6">
                    <label ><?php echo e(__('adminstaticword.Featured')); ?>:</label>    
                    <li class="tg-list-item">
                      <input class="la-admin__toggle-switch" id="cb100" name="featured" type="checkbox"/>
                      <label class="la-admin__toggle-label" data-tg-off="NO" data-tg-on="YES" for="cb100"></label>
                    </li>
                  </div>
                </div> 
                <br>
               
                

                

              <!--  ADD CLASS STATUS: START -->
              <div class="row">
                <div class="col-12">
                  <label class="la-admin__preview-label"> Status:<sup class="redstar">*</sup></label>
                  <div class="la-admin__class-status d-flex justify-content-start">
                    <div class="la-admin__class-active pr-5">
                        <input type="radio" name="status" id="addVideo-active" value="2" class="la-admin__cp-input" >
                        <label for="addVideo-active" > 
                          <div class="la-admin__cp-circle">
                            <span class="la-admin__cp-radio"></span>
                            <span class="la-admin__cp-label">Active</span> 
                          </div>
                        </label>
                    </div>

                    <div class="la-admin__class-hold pr-5">
                      <input type="radio" name="status" id="addVideo-hold" value="0" class="la-admin__cp-input" >
                      <label for="addVideo-hold" > 
                        <div class="la-admin__cp-circle">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">On hold</span> 
                        </div>
                      </label>
                    </div>

                    <div class="la-admin__class-archive pr-5">
                      <input type="radio" name="status" id="addVideo-archive" value="1" class="la-admin__cp-input" >
                      <label for="addVideo-archive" > 
                        <div class="la-admin__cp-circle">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">Archive</span> 
                        </div>
                      </label>
                  </div>
                </div>
                </div>
            </div> <br/>
            <!-- ADD CLASS STATUS: END -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-lg btn-primary col-md-4"><?php echo e(__('adminstaticword.Submit')); ?></button>
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

 

<?php $__env->startSection('script'); ?>
<!--courseclass.js is included -->

<script>
(function($) {
  "use strict";
    tinymce.init({selector:'textarea#abcd'});
})(jQuery);
</script>

<script type="text/javascript">
 $('#previewvid').on('change',function(){

  if($('#previewvid').is(':checked')){
    $('#document11').show('fast');
    $('#document22').hide('fast');
  }else{
    $('#document22').show('fast');
    $('#document11').hide('fast');
  }

});

</script>

<script>
    
    $( "#sortable" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
          sendOrderToServer();
      }
    });

    function sendOrderToServer() {

      var order = [];
      var token = $('meta[name="csrf-token"]').attr('content');
      $('tr.row1').each(function(index,element) {
        order.push({
          id: $(this).attr('data-id'),
          position: index+1
        });
      });

      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: "<?php echo e(route('class-sort')); ?>",
        data: {
           order: order,
          _token: "<?php echo e(csrf_token()); ?>",
        },
        success: function(response) {
            if (response.status == "success") {
              console.log(response);
            } else {
              console.log(response);
            }
        }
      });
    }
</script>

<?php $__env->stopSection(); ?>
<?php /**PATH E:\lila-laravel\resources\views/admin/course/courseclass/index.blade.php ENDPATH**/ ?>