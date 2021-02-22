<section class="content">
  
  <div class="row">
    <!-- left column -->
    <div class="col-12 px-0">
        <h3 class="la-admin__section-title ml-3"> <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Course')); ?></h3>
        
        
        <!-- /.box-header -->
        <div class="box-body px-0">
          <div class="form-group">
            <form action="<?php echo e(route('course.update',$cor->id)); ?>" method="post" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>  
              <?php echo e(method_field('PUT')); ?>

             
              <div class="row">
                <div class="col-md-4 mt-3 mt-md-0">
                  <label><?php echo e(__('adminstaticword.Category')); ?><span class="redstar">*</span></label>
                  <select name="category_id" id="category_id" class="form-control js-example-basic-single" required>
                    <option value="0"><?php echo e(__('adminstaticword.SelectanOption')); ?></option>
                    <?php
                      $category = App\Categories::all();
                    ?> 

                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($cor->category_id == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </select>
                </div>
                <div class="col-md-4 mt-3 mt-md-0">
                  <label><?php echo e(__('adminstaticword.SubCategory')); ?>:<span class="redstar">*</span></label>
                  <select name="subcategory_id" id="upload_id" class="form-control js-example-basic-single">
                    <?php
                      $subcategory = App\SubCategory::all();
                    ?>
                    <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($cor->subcategory_id == $caat->id ? 'selected' : ""); ?> value="<?php echo e($caat->id); ?>"><?php echo e($caat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                     
                <div class="col-md-4 mt-3 mt-md-0">
                  <?php
                    $User = App\User::all();
                  ?>
                  <label for="exampleInputSlug"><?php echo e(__('adminstaticword.Instructor')); ?></label>
                  <select name="user_id" class="form-control js-example-basic-single ">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option  value="<?php echo e($user->id); ?>" <?php if($user->id == $cor->user_id): ?> selected <?php endif; ?>)><?php echo e($user->fullName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              

              <div class="row">
                <div class="col-md-6 mt-3 mt-md-6"> 
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Title')); ?>:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" value="<?php echo e($cor->title); ?>">
                </div>

                <div class="col-md-6 mt-3 mt-md-6"> 
                  <?php
                      $languages = App\CourseLanguage::where(['status'=>1])->get();
                  ?>
                  <label for="exampleInputSlug"><?php echo e(__('adminstaticword.SelectLanguage')); ?></label>
                  <select name="language_id" class="form-control js-example-basic-single col-12">
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($cor->language_id == $cat->id ? 'selected' : ""); ?> value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                
              </div>
             

              <div class="row">
                <div class="col-md-6 mt-3 mt-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.ShortDetail')); ?>:<sup class="redstar">*</sup></label>
                  <textarea name="short_detail" rows="3" class="form-control" ><?php echo $cor->short_detail; ?></textarea>
                </div>
                <div class="col-md-6 mt-3 mt-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Requirements')); ?>:<sup class="redstar">*</sup></label>
                  <textarea name="requirement" rows="3" class="form-control" required ><?php echo $cor->requirement; ?></textarea>
                </div>
              </div>
              

              <div class="row">
                <div class="col-md-6 mt-3 mt-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.level')); ?>:<sup class="redstar">*</sup></label>
                  <select name="level" class="form-control js-example-basic-single">
                    <option disabled selected > Select Level</option>
                    <option value="1" <?php if($cor->level == 1): ?> selected <?php endif; ?>> Begginer</option>
                    <option value="2" <?php if($cor->level == 2): ?> selected <?php endif; ?> > Intermediate</option>
                    <option value="3" <?php if($cor->level == 3): ?> selected <?php endif; ?>> Advanced</option>
                  </select> 
                </div>

                <div class="col-md-6 mt-3 mt-md-6">
                  <label for="exampleInputSlug">Course Duration(in Hours)</label>
                  <input min="1" class="form-control" name="duration" type="number" id="duration" value="<?php echo e($cor->duration); ?>" placeholder="Enter Duration in hours">
                </div>

              </div>
             

              <div class="row">
                <div class="col-md-12 mt-3 mt-md-6">
                  <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                  <textarea id="detail" name="detail" rows="3" class="form-control"><?php echo $cor->detail; ?></textarea>
                </div>
              </div>
              <br>
            
              <!-- COURSE PACKAGE TYPE: START -->
              <div class="row">
                <div class="col-md-12">
                  <div class="la-admin__course-package">
                      <label for="" class="la-admin__cp-title">Course package type<sup class="redstar">*</sup></label><br/>
                      <div class="la-admin__cp-subscription">
                          <input type="radio" name="package_type" id="subPaid" value="1" class="la-admin__cp-input" <?php echo e($cor->package_type == '1' ? 'checked' : ''); ?> > 
                           <label for="subPaid"> 
                             <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Subscription</span> 
                                <small class=" text-xs mt-1 pl-1">(Default)</small>
                             </div>

                              <div class="la-admin__cp-desc">
                                  <p>This course is accessible by all Subscribers & also available for life-time purchase. </p>
                                  <p>Please enter the Course cost for One-Time Purchase</p>
                                  <div class="form-group row  la-admin__subform-group">
                                      <div class="input-group col-10 col-sm-6 la-admin__subinput-group">
                                        <div class="input-group-prepend la-admin__subinput-prepend" >
                                            <span class="fa fa-dollar input-group-text la-admin__subinput-text"></span> 
                                        </div>
                                        <input type="text" class="form-control la-admin__subform-input" name="price" style="width:160px" value="<?php echo e($cor->price); ?>"/>
                                      </div>
                                  </div>
                              </div>
                          </label>
                      </div>

                        

                        <div class="la-admin__cp-free">
                            <input type="radio" name="package_type" id="subFree" value="0" class="la-admin__cp-input" <?php echo e($cor->package_type == '0' ? 'checked' : ''); ?> >
                            <label for="subFree" > 
                              <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Free</span> 
                              </div>

                                <div class="la-admin__cp-desc">
                                    <p class="la-admin__cp-desc">  This course is accessible by any learner </p>
                                </div>
                            </label>
                        </div>
                  </div>
                </div>
              </div>
               <!-- COURSE PACKAGE TYPE: END -->
              <div class="la-admin__hr-line"></div>
               <!-- PREVIEW IMAGE & VIDEO FILES: START -->
              <div class="row">
                
                <div class="col-md-5">
                    <div class="la-admin__preview">
                      <label for="" class="la-admin__preview-label"><?php echo e(__('adminstaticword.PreviewImage')); ?>:<sup class="redstar">*</sup></label>
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
                          <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="preview_image" id="image" />
                          <?php if($cor['preview_image'] !== NULL && $cor['preview_image'] !== ''): ?>
                              <img src="<?php echo e($cor->preview_image); ?>" class="preview-img" />
                          <?php else: ?>
                              <img src="<?php echo e(Avatar::create($cor->title)->toBase64()); ?>" alt="course" class="preview-img img-fluid">
                          <?php endif; ?>
                      </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                      <div class="la-admin__preview">
                        <label for="" class="la-admin__preview-label"> <?php echo e(__('adminstaticword.PreviewVideo')); ?>:</label>
                        <div class="la-admin__preview-video la-admin__course-imgvid">
                           <div class="la-admin__preview-text">
                                  <p class="la-admin__preview-size">Preview video size: 20MB</p>
                                  <p class="text-uppercase la-admin__preview-file">Choose a File</p>
                            </div>
                            <div class="text-center pr-20 mr-10">
                              <span class="la-icon la-icon--8xl icon-preview-video" style="font-size:160px;">
                                <span class="path1"><span class="path2"></span></span>
                              </span>
                            </div>
                            <input type="file" class="form-control la-admin__preview-input preview_video" name="preview_video" value="<?php echo e($cor->preview_video); ?>"/>
                            
                              <video controls class="preview-video w-100">
                                <source src="<?php echo e($cor->preview_video); ?>" id="preview-video-source">
                                  Your browser does not support HTML5 video.
                              </video>
                            
                        </div>
                      </div>
                </div>
              </div>
               <!-- PREVIEW IMAGE & VIDEO FILES: END -->
              <br>
              <br> 

              <div class="row">    

                <div class="col-6 col-md-2"> 
                  <?php if(Auth::User()->role == "admin"): ?>
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Featured')); ?>:</label>
                  <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="cb1" type="checkbox" name="featured" <?php echo e($cor->featured==1 ? 'checked' : ''); ?>>
                    <label class="la-admin__toggle-label" data-tg-off="No" data-tg-on="Yes" for="cb1"></label>
                  </li>
                  <input type="hidden" name="featured" value="<?php echo e($cor->featured); ?>" id="f">
                  <?php endif; ?>
                </div>

                <div class="col-6 col-md-2">
                  <label for="exampleInputDetails">Master Class:</label>
                  <li class="tg-list-item">              
                    <input class="la-admin__toggle-switch" id="master_class" type="checkbox" name="master_class" <?php if($check_master_class): ?> checked <?php endif; ?> >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="master_class"></label>
                  </li>
                  <input type="hidden"  name="master_class"  for="master_class" id="master_class2" <?php if($check_master_class): ?> value="1" <?php endif; ?>>
                </div>

                <div class="col-md-4">
                  <?php if(Auth::User()->role == "admin"): ?>
                  <label for="exampleInputTit1e"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                      <div class="d-flex align-items-center">
                          <label class="mr-3 font-weight-normal"><input type="radio" name="status" id="ch1" value="1" <?php echo e($cor->status == 1 ? 'checked' : ''); ?>>  <?php echo e(__('adminstaticword.Active')); ?> </label>
                          <label class="mr-3  font-weight-normal"><input type="radio" name="status" id="ch2" value="0" <?php echo e($cor->status == 0 ? 'checked' : ''); ?>>  <?php echo e(__('OnHold')); ?> </label>
                          <label class="mr-3  font-weight-normal"><input type="radio" name="status" id="ch3" value="2" <?php echo e($cor->status == 2 ? 'checked' : ''); ?>>  <?php echo e(__('Archive')); ?> </label>
                      </div>
                   
                  <?php endif; ?>
                </div> 
              </div> 
              <br/>

              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
              </div>
         
            </form>
          </div>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 


<?php $__env->startSection('scripts'); ?>

<script>
(function($) {
  "use strict";
    tinymce.init({selector:'textarea#detail'});
})(jQuery);
</script>

<script>
(function($) {
  "use strict";

  $(function() {
    $('.js-example-basic-single').select2();
  });

  $(function() {
    $('#cb1').change(function() {
      $('#f').val(+ $(this).prop('checked'))
    })
  })

  $(function() {
    $('#master_class').change(function() {
      $('#master_class2').val(+ $(this).prop('checked'))
    })
  })



  $(function() {
    $('#cb3').change(function() {
      $('#test').val(+ $(this).prop('checked'))
    })
  })

  $(function(){

      $('#murl').change(function(){
        if($('#murl').val()=='yes')
        {
            $('#doab').show();
        }
        else
        {
            $('#doab').hide();
        }
      });

  });

  $(function(){

      $('#murll').change(function(){
        if($('#murll').val()=='yes')
        {
            $('#doabb').show();
        }
        else
        {
            $('#doab').hide();
        }
      });

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

  $(function() {
    var urlLike = '<?php echo e(url('admin/gcat')); ?>';
    $('#upload_id').change(function() {
      var up = $('#grand').empty();
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
<?php /**PATH E:\lila-laravel\resources\views/admin/course/editcor.blade.php ENDPATH**/ ?>