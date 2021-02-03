<?php $__env->startSection('body'); ?>
<?php $__env->startSection('title', 'Add User - Admin'); ?>

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
    <div class="col-md-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"> <?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.User')); ?></h3>
       
        <div class="panel-body pl-3">
          <form action="<?php echo e(route('user.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <div class="row">
              <div class="col-md-4">
                <label for="exampleInputSlug"><?php echo e(__('adminstaticword.Image')); ?>: </label>
                <br>
                  <input type="file" name="user_img" id="user_img" class="inputfile inputfile-1 d-none" />
                  <!-- <label for="user_img"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span><?php echo e(__('adminstaticword.Chooseafile')); ?>&hellip;</span> -->
                  <label class="la-admin__profile-new la-admin__img-upload d-inline-block text-center" for="user_img" >
                    <a class="d-inline-block">CHOOSE A FILE </a> <br/>
                    <span class="la-admin__img-info">Thumbnail | 500x500</span>
                    <img src="" alt="">
                  </label>
              </div>
            </div><br/>

            <div class="row">
              <div class="col-md-4">
                 <label for="fname">
                <?php echo e(__('adminstaticword.FirstName')); ?>:<sup class="redstar">*</sup>
                </label>
                <input value="<?php echo e(old('fname')); ?>" autofocus required name="fname" type="text" class="form-control" placeholder="Enter your first name"/>
              </div>
              <div class="col-md-4">
                <label for="lname">
                  <?php echo e(__('adminstaticword.LastName')); ?>:<sup class="redstar">*</sup>
                </label>
                <input value="<?php echo e(old('lname')); ?>" required name="lname" type="text" class="form-control" placeholder="Enter your last name"/>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-4">
                 <label for="mobile"><?php echo e(__('adminstaticword.Email')); ?>:<sup class="redstar">*</sup></label>
                  <input value="<?php echo e(old('email')); ?>" required type="email" name="email" placeholder="Enter your email" class="form-control">
              </div>
              <div class="col-md-4">
                <label for="mobile"><?php echo e(__('adminstaticword.Mobile')); ?>:<sup class="redstar">*</sup></label>
                <input value="<?php echo e(old('mobile')); ?>" required type="text" name="mobile" placeholder="Enter your mobile number" class="form-control">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-4">
                <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Address')); ?>:</label>
                <textarea name="address" rows="1"  class="form-control" placeholder="Enter your address"></textarea>
              </div>
              <div class="col-md-4">
                <label for="dob"><?php echo e(__('adminstaticword.DateofBirth')); ?>:<sup class="redstar">*</sup></label>
                <div class="input-group date">
                  <div class="input-group-addon border">
                    <i class="la-icon la-icon--md icon-calender-filled m-2"></i>
                  </div>
                  <input type="text" value="<?php echo e(old('dob')); ?>" name="dob" required class="form-control pull-right" id="dob" placeholder="Enter your date of birth">
                </div>

              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-4">
                <label for="gender"><?php echo e(__('adminstaticword.Gender')); ?>:<sup class="redstar">*</sup></label>
                
                <br>
                <input type="radio" name="gender" id="ch1" value="m" required> <span class="mr-3"> <?php echo e(__('adminstaticword.Male')); ?> </span>
                <input type="radio" name="gender" id="ch2" value="f"> <span class="mr-3"><?php echo e(__('adminstaticword.Female')); ?></span>
                <input type="radio" name="gender" id="ch3" value="o"> <span class="mr-3"><?php echo e(__('adminstaticword.Other')); ?></span>
              </div>
              <div class="col-md-4">
                <label for="mobile"><?php echo e(__('adminstaticword.Password')); ?>:<sup class="redstar">*</sup> </label>
                <input required type="password" name="password" placeholder="Enter your password" class="form-control">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-4">
                <label for="city_id"><?php echo e(__('adminstaticword.Country')); ?>: </label>
                <select id="country_id" class="form-control js-example-basic-single" name="country_id">
                  <option value="none" selected disabled hidden> 
                    <?php echo e(__('adminstaticword.SelectanOption')); ?> 
                  </option>
                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($coun->id); ?>" ><?php echo e($coun->nicename); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            
              <div class="col-md-4">
                <label for="state_id"><?php echo e(__('adminstaticword.State')); ?>: </label>
                <select id="upload_id" class="form-control js-example-basic-single" name="state_id">
                 
                </select>
               </div>
            </div><br/>

            <div class="row">
              <div class="col-md-4">
                <label for="city_id"><?php echo e(__('adminstaticword.City')); ?>: </label>
                <select id="grand" class="form-control js-example-basic-single" name="city_id">
                  
                </select>
              </div>
              <div class="col-md-4"> 
                <label for="pin_code"><?php echo e(__('adminstaticword.Pincode')); ?>:</label>
                <input value="<?php echo e(old('pin_code')); ?>" placeholder="Enter your pincode" type="text" name="pin_code" class="form-control">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-4"> 
                <label for="role"><?php echo e(__('adminstaticword.SelectRole')); ?>:<sup class="redstar">*</sup></label>
                <select class="form-control js-example-basic-single" name="role" required>
                  <option value="none" selected disabled hidden> 
                   <?php echo e(__('adminstaticword.SelectanOption')); ?>

                  </option>
                  <option value="user"><?php echo e(__('adminstaticword.User')); ?></option>
                  <option value="admin"><?php echo e(__('adminstaticword.Admin')); ?></option>
                  <option value="instructor"><?php echo e(__('adminstaticword.Instructor')); ?></option>
                </select>
              </div> 

              <div class="col-md-2 display-none">
                <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Verified')); ?>:</label> 
                <li class="tg-list-item">
                  <input class="la-admin__toggle-switch" id="jeet1"   type="checkbox"/>
                  <label class="la-admin__toggle-label" data-tg-off="Off" data-tg-on="On" for="jeet1"></label>
                </li>
                <input type="hidden" name="verified" value="0" id="jeet11"> 
           
              </div>
              <div class="col-md-2">
                <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                <li class="tg-list-item">     
                <input class="la-admin__toggle-switch" id="jeet120"  type="checkbox"/>
                <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="jeet120"></label>
                </li>
                <input type="hidden" name="status" value="0" id="jeet121">
              </div>
             
            </div>
            <br>
            

            <!--<div class="row">
                <div class="col-md-4">
                  <label  for="married_status"><?php echo e(__('adminstaticword.ChooseMarrigeStatus')); ?>: </label>
                  <select class="form-control js-example-basic-single" id="married_status" name="married_status">
                    <option value="none" selected disabled hidden> 
                      <?php echo e(__('adminstaticword.SelectanOption')); ?>

                    </option>
                    <option value="Unmarried"><?php echo e(__('adminstaticword.Unmarried')); ?></option>
                    <option value="Married"><?php echo e(__('adminstaticword.Married')); ?></option>
                    <option value="Divorced"><?php echo e(__('adminstaticword.Divorced')); ?></option>
                    <option value="Widowed"><?php echo e(__('adminstaticword.Widowed')); ?></option>
                  </select>
                  <br> 
              </div>
              <div class="col-md-4 display-none" id="doaboxxx">
                <label for="dob"><?php echo e(__('adminstaticword.DateofAnniversary')); ?>: <sup class="redstar">*</sup></label>
                  <input value="<?php echo e(old('doa')); ?>" name="doa" id="doa" type="text" class="form-control" placeholder="Enter your date of anniversary">
              </div> 
            </div> -->
            <br>

            <div class="row">
              <div class="col-md-8">
                <label for="exampleInputDetails"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                <textarea id="detail" name="detail" rows="3"  class="form-control" placeholder="Enter your detail"></textarea>
              </div>
            </div>
            

            
            <div class="row mt-10">
              <div class="col-12">
                <h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.SocialProfile')); ?></h3>
              </div>

              <div class="col-md-4">
                <label for="fb_url">
                <?php echo e(__('adminstaticword.FacebookUrl')); ?>:
                </label>
                <input autofocus name="fb_url" type="text" class="form-control" placeholder="Facebook.com/"/>
              </div>
              <div class="col-md-4">
                <label for="youtube_url">
                <?php echo e(__('adminstaticword.YoutubeUrl')); ?>:
                </label>
                <input autofocus name="youtube_url" type="text" class="form-control" placeholder="youtube.com/"/>
                <br>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-4">
                <label for="twitter_url">
                <?php echo e(__('adminstaticword.TwitterUrl')); ?>:
                </label>
                <input autofocus name="twitter_url" type="text" class="form-control" placeholder="Twitter.com/"/>
              </div>
              <div class="col-md-4">
                <label for="linkedin_url">
                <?php echo e(__('adminstaticword.LinkedInUrl')); ?>:
                </label>
                <input autofocus name="linkedin_url" type="text" class="form-control" placeholder="Linkedin.com/"/>
              </div>
            </div>
            <br>
            <br>
            

          <div class="row">
            <div class="col-md-8 box-footer">
              <button type="submit" class="btn btn-primary px-14">
                 <?php echo e(__('adminstaticword.AddUser')); ?>

              </button>
            </form>
             <!-- <a href="<?php echo e(route('user.index')); ?>" title="Cancel and go back" class="btn btn-md btn-default btn-flat">
                <i class="fa fa-reply"></i> <?php echo e(__('adminstaticword.Back')); ?>

              </a> -->
            </div>
          </div>
            <br>

          
        </div>
        <!-- /.panel body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
(function($) {
  "use strict";

  $('#married_status').change(function() {
      
    if($(this).val() == 'Married')
    {
      $('#doaboxxx').show();
    }
    else
    {
      $('#doaboxxx').hide();
    }
  });

  $(function() {
    $( "#dob,#doa" ).datepicker({
      changeYear: true,
      yearRange: "-100:+0",
      dateFormat: 'yy/mm/dd',
    });
  });

  tinymce.init({selector:'textarea#detail'});

  $(function() {
    var urlLike = '<?php echo e(url('country/dropdown')); ?>';
    $('#country_id').change(function() {
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
    var urlLike = '<?php echo e(url('country/gcity')); ?>';
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
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/user/adduser.blade.php ENDPATH**/ ?>