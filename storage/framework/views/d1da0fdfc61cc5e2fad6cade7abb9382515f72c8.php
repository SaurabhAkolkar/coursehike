<?php $__env->startSection('title', 'Edit Video - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.CourseClass')); ?></h3>
        
        <div class="box-body">
          <div class="form-group">
            <form enctype="multipart/form-data" id="demo-form" method="post" action="<?php echo e(url('courseclass/'.$cate->id)); ?>"data-parsley-validate class="form-horizontal form-label-left">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

                        
              <select class="display-none" name="coursechapter" class="form-control col-md-7 col-12">
                <?php
                 $coursechapters = App\CourseChapter::all();
                ?>  
                <?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($cate->coursechapter_id == $cat->id ? 'selected' : ""); ?> value="<?php echo e($cat->id); ?>"><?php echo e($cat->chapter_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>


              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control " name="title" id="exampleInputTitle"  value="<?php echo e($cate->title); ?>" required>                  
                </div>
              </div>
              <br>


              <div class="row">
                <div class="col-md-12">
                  <label for="type"><?php echo e(__('adminstaticword.CourseChapter')); ?>:</label>

                  <select name="coursechapter_id" id="chapters" class=" form-control">
                    <?php $__currentLoopData = $coursechapt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($chapters->id); ?>" <?php echo e($cate->coursechapter_id==$chapters->id ? 'selected' : ''); ?>><?php echo e($chapters->chapter_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Detail')); ?>:</label>
                  <textarea name="detail" rows="5"  class="form-control" placeholder="Enter Your Details"><?php echo e($cate->detail); ?></textarea>
                </div>
              </div>
              <br>
              
                
              <div class="row">
                <div class="col-md-12">
                  <div id="videoUpload" <?php if($cate->url !=NULL || $cate->iframe_url !=NULL || $cate->aws_upload !=NULL): ?> class="display-none" <?php endif; ?> >
                    <label for=""><?php echo e(__('adminstaticword.UploadVideo')); ?>: </label>
                    <input type="file" name="video_upld" class="form-control">
                    <?php if($cate->video !=""): ?>
                      <video src="<?php echo e($cate->video); ?>" controls>
                      </video>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div  class="col-md-12 mt-4" id="duration">
                  <label for=""><?php echo e(__('adminstaticword.Duration')); ?> :</label>
                  <input type="text" name="duration" value="<?php echo e($cate->duration); ?>" class="form-control" placeholder="Enter class duration in (mins) Eg:160">
                </div>
              </div>
              <br>
             
              <div class="row">
                <div class="col-md-6">    
                  <label ><?php echo e(__('adminstaticword.Is_preview_video')); ?>:</label>
                  <li class="tg-list-item">   
               
                    <input class="la-admin__toggle-switch" id="c11" name="is_preview" type="checkbox" <?php echo e($cate->is_preview == '1' ? 'checked' : ''); ?> />
                    <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c11"></label>
                  </li>
                </div> 
                       
                <div class="col-md-4"> 
                  <label><?php echo e(__('adminstaticword.Featured')); ?>:</label>
                  <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="featured" type="checkbox" name="featured" <?php echo e($cate->featured == '1' ? 'checked' : ''); ?> >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="featured"></label>
                  </li>
                  <input type="hidden" name="free" value="0" id="featured">
                  <br>
                </div>
              </div>

                <!-- CLASS THUMBNAIL: START -->
              <div class="row">
                <div class="col-12">
                  <div class="la-admin__preview">
                      <label for="" class="la-admin__preview-label"> Class Thumbnail:<sup class="redstar">*</sup></label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="la-admin__preview">
                      <h6 class="la-admin__editing-title mb-2" > Current: </h6>
                      <div class="la-admin__preview-img la-admin__preview-img2 la-admin__editclass-preview" >
                          <img src="<?php echo e($cate->image); ?>" alt="">
                      </div>
                  </div>
                </div>

                <div class="col-6">
                      <div class="la-admin__preview">
                          <h6 class="la-admin__editing-title  mb-2" > Update New: </h6>
                          <div class="la-admin__preview-img la-admin__preview-img2 la-admin__course-imgvid" >
                               <div class="la-admin__preview-text d-block">
                                  <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase text-center">Choose a File</p>
                                  <p class="la-admin__preview-size text-center">Thumbnail | 500x350</p>
                              </div>
                              <div class="text-center mr-10">
                                <span class="la-icon la-icon--5xl icon-preview-image" style="font-size:100px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                              <input type="file" class="form-control la-admin__preview-input" name="preview_image" id="edit-upload" />
                          </div>
                      </div>
                </div>
              </div> <br/>
                <!-- CLASS THUMBNAIL: END -->

              <!--  ADD CLASS STATUS: START -->
              <div class="row">
                <div class="col-12">
                  <label for="" class="la-admin__preview-label"> Status:<sup class="redstar">*</sup></label>
                  <div class="la-admin__class-status d-flex justify-content-start align-items-center">
                    <div class="la-admin__class-active pr-5">
                        <input type="radio" name="editClass-status" id="editClass-active" value="active" class="la-admin__cp-input" <?php echo e($cate->status == '2' ? 'checked' : ''); ?> >
                        <label for="editClass-active" > 
                          <div class="la-admin__cp-circle d-flex align-items-center">
                            <span class="la-admin__cp-radio"></span>
                            <span class="la-admin__cp-label">Active</span> 
                          </div>
                        </label>
                    </div>

                    <div class="la-admin__class-hold pr-5">
                      <input type="radio" name="editClass-status" id="editClass-hold" value="hold" class="la-admin__cp-input" <?php echo e($cate->status == '0' ? 'checked' : ''); ?> >
                      <label for="editClass-hold" > 
                        <div class="la-admin__cp-circle d-flex align-items-center">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">On hold</span> 
                        </div>
                      </label>
                    </div>

                    <div class="la-admin__class-archive pr-5">
                      <input type="radio" name="editClass-status" id="editClass-archive" value="archive" class="la-admin__cp-input" <?php echo e($cate->status == '1' ? 'checked' : ''); ?> >
                      <label for="editClass-archive" > 
                        <div class="la-admin__cp-circle d-flex align-items-center">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">Archive</span> 
                        </div>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            <!-- ADD CLASS STATUS: END --> 

            <!-- ADD CLASS MASTER TOGGLER: START -->
            
            <!-- ADD CLASS MASTER TOGGLER: END -->

              <div class="box-footer mt-12">
                <button type="submit" class="btn btn-lg col-md-4 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
              </div>
            </form>
          </div>
      </div>
      </div>
    </div>

    <div class="col-md-5 offset-md-1">
        <!-- SUBTITLE SECTION: START -->

        <div class="row pr-10">
          <div class="box box-primary">
            <div class="box-header d-flex align-items-center">
              <h3 class="box-title"> <?php echo e(__('adminstaticword.Subtitle')); ?></h3>
              <a data-toggle="modal" data-target="#myModalSubtitle" href="#" class="btn btn-info btn-sm ml-auto">+  <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Subtitle')); ?></a>
            </div>
            <div class="box-body p-0">
              <!--Model start-->
              <div class="modal fade" id="myModalSubtitle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Subtitle')); ?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="box box-primary">
                      <div class="panel panel-sum">
                        <div  class="modal-body">
                          <form enctype="multipart/form-data" id="demo-form2" method="post" action="<?php echo e(route('add.subtitle',$cate->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                            <?php echo e(csrf_field()); ?>

        
                            <div id="subtitle">
        
                              <label><?php echo e(__('adminstaticword.Subtitle')); ?>:</label>
                              <table class="table table-bordered" id="dynamic_field">  
                                <tr> 
                                    <td>
                                        <div class="<?php echo e($errors->has('sub_t') ? ' has-error' : ''); ?> input-file-block">
                                        <input type="file" name="sub_t[]"/>
                                        <p class="info">Choose subtitle file only in vtt format</p>
                                        <small class="text-danger"><?php echo e($errors->first('sub_t')); ?></small>
                                      </div>
                                    </td>
        
                                    <td>
                                      
                                      <select name="sub_lang[]" class="">
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($language->iso_code); ?>"><?php echo e($language->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                      </select>
                                    </td>  
                                    
                                </tr>  
                              </table>
                              
                            </div>
                            <div class="box-footer">
                              <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('adminstaticword.Submit')); ?></button>
                            </div>
        
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <br>
                  <tr>
                    <th>#</th>
                    <th><?php echo e(__('adminstaticword.SubtitleLanguage')); ?> </th>
                    <th><?php echo e(__('adminstaticword.Delete')); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;?>
                  
                  <?php $__currentLoopData = $subtitles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtitle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $i++;?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo e($subtitle->sub_lang); ?></td>
                      <td>
                        <form  method="post" action="<?php echo e(route('del.subtitle',$subtitle->id)); ?>"
                              data-parsley-validate class="form-horizontal form-label-left">
                          <?php echo e(csrf_field()); ?>

      
                          <button type="submit" class="btn btn-danger d-inline">
                            <i class="la-icon la-icon--lg icon-delete"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </tbody> 
              </table>
            </div>
          </div>
        </div>
        <!-- SUBTITLE SECTION: END -->

        <!-- AUDIO TRACKS SECTION: START -->

        
        <!-- AUDIO TRACKS SECTION: END -->
        
    </div>
   
  </div>
</section> 

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<script>
(function($) {
  "use strict";
    tinymce.init({selector:'textarea'});
})(jQuery);
</script>

<script>
   $('#previewvide').on('change',function(){

    if($('#previewvide').is(':checked')){
      $('#document11').show('fast');
      $('#document22').hide('fast');
    }else{
      $('#document22').show('fast');
      $('#document11').hide('fast');
    }

  });
</script>

 <?php if($cate->type =="video"): ?>
  <script>
    (function($) {
    "use strict";
   
     $('#ch1').click(function(){
       $('#videoURL').show();
       $('#videoUpload').hide();
       $('#iframeURLBox').hide();
       $('#liveURLBox').hide();
       $('#awsUpload').hide();
     });
    
    $('#ch2').click(function(){
       $('#videoURL').hide();
       $('#videoUpload').show();
       $('#iframeURLBox').hide();
       $('#liveURLBox').hide();
       $('#awsUpload').hide();
     });

    $('#ch9').click(function(){
       $('#iframeURLBox').show();
       $('#videoURL').hide();
       $('#videoUpload').hide();
       $('#liveURLBox').hide();
       $('#awsUpload').hide();
     });

    $('#ch10').click(function(){
       $('#iframeURLBox').hide();
       $('#videoURL').show();
       $('#videoUpload').hide();
       $('#liveURLBox').show();
       $('#awsUpload').hide();
     });


    //aws checkbox
    $('#ch13').click(function(){
       $('#awsUpload').show();
       $('#iframeURLBox').hide();
       $('#videoURL').hide();
       $('#videoUpload').hide();
       $('#liveURLBox').hide();
     });

    })(jQuery);
   
  </script>
 <?php endif; ?>

 <?php if($cate->type =="audio"): ?>
  <script>
    (function($) {
    "use strict";
   
     $('#ch11').click(function(){
       $('#audioURL').show();
       $('#audioUpload').hide();
     });
    
    $('#ch12').click(function(){
       $('#audioURL').hide();
       $('#audioUpload').show();

     });

  })(jQuery);
  </script>
 <?php endif; ?>

 <?php if($cate->type =="image"): ?>
  <script>
    (function($) {
    "use strict";
   
     $('#ch3').click(function(){
       $('#imageURL').show();
       $('#imageUpload').hide();
     });
    
    $('#ch4').click(function(){
       $('#imageURL').hide();
       $('#imageUpload').show();

     });

  })(jQuery);
  </script>
 <?php endif; ?>

 <?php if($cate->type =="zip"): ?>
  <script>
    (function($) {
    "use strict";
   
     $('#ch5').click(function(){
       $('#zipURL').show();
       $('#zipUpload').hide();
     });
    
    $('#ch6').click(function(){
       $('#zipURL').hide();
       $('#zipUpload').show();
     });

  })(jQuery);
   
  </script>

  

  
 <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/course/courseclass/edit.blade.php ENDPATH**/ ?>