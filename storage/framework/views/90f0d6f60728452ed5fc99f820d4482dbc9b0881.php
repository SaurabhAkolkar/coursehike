  <?php if(Auth::user()->id == $user->id): ?>
    <?php $__env->startSection('title', 'Profile - Admin'); ?>
  <?php else: ?>
    <?php $__env->startSection('title', 'Edit User - Admin'); ?>
  <?php endif; ?>

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
  <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="ml-3">
            <?php if(Auth::user()->id == $user->id): ?>
                <h3 class="la-admin__section-title"> <?php echo e(__('adminstaticword.Profile')); ?></h3>
            <?php else: ?>
                <h3 class="la-admin__section-title"> <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Users')); ?></h3>
            <?php endif; ?>
        </div>
        <br>

        <div class="panel-body">
          <form action="<?php echo e(route('user.update',$user->id)); ?>" method="POST" class="pl-md-4" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


            <div class="row">
              <div class="col-md-4">
                <div class="la-admin__profile-label pb-2">Current:</div>
                <?php if($user->user_img != null || $user->user_img !=''): ?>
                  <div class="edit-user-img la-admin__profile">
                    <img src="<?php echo e($user->user_img); ?>" class="img-fluid la-admin__profile-img" alt="User Image" class="img-fluid">
                  </div>
                <?php else: ?>
                  <div class="edit-user-img la-admin__profile">
                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-fluid la-admin__profile-img" alt="User Image" class="img-fluid">
                  </div>
                <?php endif; ?>
              </div>
              <div class="col-md-4">
                <!-- <label><?php echo e(__('adminstaticword.Image')); ?>:<sup class="redstar">*</sup></label> -->
                <div class="la-admin__profile-label pb-2">Upload New:</div>
                <input type="file" name="user_img"  id="user_img" class="form-control d-none" role="button">
                <label class="la-admin__profile-new la-admin__img-upload d-inline-block text-center" role="button" for="user_img" >
                  <a class="d-inline-block" role="button">CHOOSE A FILE </a> <br/>
                  <span class="la-admin__img-info">Thumbnail | 500x500</span>
                  <img src="" alt="">
                </label>
              </div>
            </div> <br>

            <div class="row">
              <div class="col-md-4">
                <label for="fname">
                  <?php echo e(__('adminstaticword.FirstName')); ?>:
                  <sup class="redstar">*</sup>
                </label>
                <input value="<?php echo e($user->fname); ?>" autofocus required name="fname" type="text" class="form-control" placeholder="Enter first name"/>
              </div>

              <div class="col-md-4">
                <label for="lname">
                  <?php echo e(__('adminstaticword.LastName')); ?>:
                  <sup class="redstar">*</sup>
                </label>
                <input value="<?php echo e($user->lname); ?>" required name="lname" type="text" class="form-control" placeholder="Enter last name"/>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-4">
                <label for="mobile"> <?php echo e(__('adminstaticword.Mobile')); ?>:<sup class="redstar">*</sup></label>
                <input value="<?php echo e($user->mobile); ?>" required type="type" name="mobile" placeholder="Enter mobile no" class="form-control" maxlength="10">
               </div>
               <div class="col-md-4">
                <label for="mobile"><?php echo e(__('adminstaticword.Email')); ?>:<sup class="redstar">*</sup> </label>
                <input value="<?php echo e($user->email); ?>" required type="email" name="email" placeholder="Enter email" class="form-control">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-8">
                  <label for="address"><?php echo e(__('adminstaticword.Address')); ?>:<sup class="redstar">*</sup> </label>
                  <textarea name="address" class="form-control" rows="1" required  placeholder="Enter adderss" value=""><?php echo e($user->address); ?></textarea>
              </div>
            </div><br/>

            <div class="row">
              <div class="col-md-4">
                <label for="dob"><?php echo e(__('adminstaticword.DateofBirth')); ?>: </label>
                <div class="input-group date">
                  <!-- <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div> -->
                  
                  <input type="date" id="date" name="dob" class="form-control" placeholder="" value="<?php echo e($user->dob); ?>" max="<?php echo e(Carbon\Carbon::now()->subYears(18)->format('Y-m-d')); ?>" >
                </div>
              </div>
           
              <div class="col-md-4">
               <label for="gender"><?php echo e(__('adminstaticword.Gender')); ?>:</label>
                <br>
                <label class="mr-2 font-weight-normal"><input type="radio" name="gender" id="ch1" value="m" <?php echo e($user->gender == 'm' ? 'checked' : ''); ?>>  <?php echo e(__('adminstaticword.Male')); ?> </label>
                <label class="mr-2 font-weight-normal"><input type="radio" name="gender" id="ch2" value="f" <?php echo e($user->gender == 'f' ? 'checked' : ''); ?>>  <?php echo e(__('adminstaticword.Female')); ?> </label>
                <label class="mr-2 font-weight-normal"><input type="radio" name="gender" id="ch3" value="o" <?php echo e($user->gender == 'o' ? 'checked' : ''); ?>>  <?php echo e(__('adminstaticword.Other')); ?> </label>
              </div>
            </div>
            
            <?php if(Auth::User()->role=="admin"): ?>
            <div class="row mt-6">
              <div class="col-md-8">
                <label for="role"><?php echo e(__('adminstaticword.SelectRole')); ?>:</label>
                  <select class="form-control js-example-basic-single" name="role"   <?php if(Auth::user()->id == $user->id): ?> disabled <?php endif; ?> >
                    <option <?php echo e($user->role == 'user' ? 'selected' : ''); ?> value="user"><?php echo e(__('adminstaticword.User')); ?></option>
                    <option <?php echo e($user->role == 'admin' ? 'selected' : ''); ?> value="admin"><?php echo e(__('adminstaticword.Admin')); ?></option>
                    <option <?php echo e($user->role == 'mentors' ? 'selected' : ''); ?> value="mentors"><?php echo e(__('adminstaticword.Instructor')); ?></option>
                  </select>
                 
                  <?php if(Auth::User()->role=="mentors"): ?>
                  <select class="form-control js-example-basic-single" name="role">
                    <option <?php echo e($user->role == 'user' ? 'selected' : ''); ?> value="user"><?php echo e(__('adminstaticword.User')); ?></option>
                    <option <?php echo e($user->role == 'mentors' ? 'selected' : ''); ?> value="instructor"><?php echo e(__('adminstaticword.Instructor')); ?></option>
                  </select>
                  <?php endif; ?>
                  <?php if(Auth::User()->role=="user"): ?>
                  <select class="form-control js-example-basic-single" name="role">
                    <option <?php echo e($user->role == 'user' ? 'selected' : ''); ?> value="user"><?php echo e(__('adminstaticword.User')); ?></option>
                  </select>
                  <?php endif; ?>
              </div>
            </div>
            <br>
            <?php endif; ?>

            <div class="row">
              <div class="col-md-4">
                <label for="city_id"><?php echo e(__('adminstaticword.Country')); ?>:</label>
                <select id="country_id" class="form-control js-example-basic-single" name="country_id">
                  <option value="none" selected disabled hidden> 
                      <?php echo e(__('adminstaticword.SelectanOption')); ?>

                    </option>
                  
                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($coun->id); ?>" <?php echo e($user->country_id == $coun->id ? 'selected' : ''); ?>><?php echo e($coun->nicename); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="col-md-4">
                <label for="city_id"><?php echo e(__('adminstaticword.State')); ?>:</label>
                <select id="upload_id" class="form-control js-example-basic-single" name="state_id">
                  <option value="none" selected disabled hidden> 
                    <?php echo e(__('adminstaticword.SelectanOption')); ?>

                  </option>
                  <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($s->state_id); ?>" <?php echo e($user->state_id==$s->state_id ? 'selected' : ''); ?>><?php echo e($s->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-4">
                <label for="city_id"><?php echo e(__('adminstaticword.City')); ?>:</label>
                <select id="grand" class="form-control js-example-basic-single" name="city_id">
                  <option value="none" selected disabled hidden> 
                     <?php echo e(__('adminstaticword.SelectanOption')); ?>

                  </option>
                  <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($c->id); ?>" <?php echo e($user->city_id == $c->id ? 'selected' : ''); ?>><?php echo e($c->name); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
          
              <div class="col-md-4">
                <label for="pin_code"><?php echo e(__('adminstaticword.Pincode')); ?>:</label>
                <input value="<?php echo e($user->pin_code); ?>" placeholder="Enter Pincode" type="text" name="pin_code" class="form-control">
              </div>
            </div>
            <br>

            <!--<div class="row">
              <div class="col-md-3">
                  <label  for="married_status"><?php echo e(__('adminstaticword.ChooseMarrigeStatus')); ?>: </label>
                  <select class="form-control js-example-basic-single" id="married_status" name="married_status">
                    <option value="none" selected disabled hidden> 
                       <?php echo e(__('adminstaticword.SelectanOption')); ?>

                    </option> 
                    <option id="Unmarried" <?php echo e($user->married_status == 'Unmarried' ? 'selected' : ''); ?> value="Unmarried"><?php echo e(__('adminstaticword.Unmarried')); ?></option>
                    <option id="Married" <?php echo e($user->married_status == 'Married' ? 'selected' : ''); ?> value="Married"><?php echo e(__('adminstaticword.Married')); ?></option>
                    <option id="Divorced" <?php echo e($user->married_status == 'Divorced' ? 'selected' : ''); ?> value="Divorced"><?php echo e(__('adminstaticword.Divorced')); ?></option>
                    <option id="Widowed" <?php echo e($user->married_status == 'Widowed' ? 'selected' : ''); ?> value="Widowed"><?php echo e(__('adminstaticword.Widowed')); ?></option>
                  </select>
                  <br> 
              </div>


              <div class="col-md-3 display-none" id="doaboxxx">
                <label for="dob"><?php echo e(__('adminstaticword.DateofAnniversary')); ?>: </label>
                <input value="<?php echo e($user->doa); ?>" name="doa" id="doa" type="text" class="form-control" placeholder="Enter Date of anniversary">
              </div>
            </div> 
            <br>  -->         

        
            <div class="row">
              <div class="col-md-8">
                <label for="detail"><?php echo e(__('adminstaticword.Detail')); ?>:<sup class="redstar">*</sup></label>
                <textarea id="detail" name="detail" class="form-control" rows="5" placeholder="Enter your details" value=""><?php echo e($user->detail); ?></textarea>
              </div>
            </div>
            <br><br/>

            <div class="row">
              <div class="col-md-4">
                <div class="update-password d-flex align-items-center">
                  <label for="box1"> <?php echo e(__('adminstaticword.UpdatePassword')); ?>:</label>
                  <input type="checkbox" class="ml-2 " id="myCheck" name="update_pass" onclick="myFunction()">
                </div>

                <div class="row display-none" id="update-password">
                  <div class="col-md-12">
                    <label><?php echo e(__('adminstaticword.Password')); ?></label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                  </div>
                  <div class="col-md-12">
                    <label><?php echo e(__('adminstaticword.ConfirmPassword')); ?></label>
                    <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm password">
                  </div>
                </div>
              </div>
                <?php if(Auth::user()->id == $user->id): ?>

                <?php else: ?>
                  <div class="col-md-2">
                    <div class="d-flex align-items-center">
                      <label for="exampleInputTit1e" class="mb-3 mr-2"><?php echo e(__('adminstaticword.Verified')); ?>:</label>
                      <li class="tg-list-item">
                        <input class="la-admin__toggle-switch" id="c033"   type="checkbox"  <?php echo e($user->email_verified_at != NULL ? 'checked' : ''); ?>>
                        <label class="la-admin__toggle-label" data-tg-off="No" data-tg-on="Yes" for="c033"></label>
                      </li>
                      <input type="hidden" name="verified" value="<?php echo e($user->varified); ?>" id="tt">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="d-flex align-items-center">
                      <label for="exampleInputTit1e" class="mb-4 mr-2"><?php echo e(__('adminstaticword.Status')); ?>:</label>
                      <li class="tg-list-item">              
                        <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" <?php echo e($user->status == '1' ? 'checked' : ''); ?> >
                        <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                      </li>
                      <input type="hidden"  name="free" value="0" for="status" id="status">
                    </div>
                  </div>
                <?php endif; ?>
            </div>
              

            <div class="row mt-10">
              <div class="col-12">
                <h3 class="la-admin__section-title"><?php echo e(__('adminstaticword.SocialProfile')); ?></h3>
              </div>

              <div class="col-md-4">
                <label for="fb_url">
                <?php echo e(__('adminstaticword.FacebookUrl')); ?>:
                </label>
                <input autofocus name="fb_url" value="<?php echo e($user->fb_url); ?>" type="text" class="form-control" placeholder="Facebook.com/"/>
              </div>
              <div class="col-md-4">
                <label for="youtube_url">
                <?php echo e(__('adminstaticword.YoutubeUrl')); ?>:
                </label>
                <input autofocus name="youtube_url" value="<?php echo e($user->youtube_url); ?>" type="text" class="form-control" placeholder="youtube.com/"/>
                <br>
              </div>
            </div>

            <div class="row">            
              <div class="col-md-4">
                <label for="twitter_url">
                <?php echo e(__('adminstaticword.TwitterUrl')); ?>:
                </label>
                <input autofocus name="twitter_url" value="<?php echo e($user->twitter_url); ?>" type="text" class="form-control" placeholder="Twitter.com/"/>
              </div>
              <div class="col-md-4">
                <label for="linkedin_url">
                <?php echo e(__('adminstaticword.LinkedInUrl')); ?>:
                </label>
                <input autofocus name="linkedin_url" value="<?php echo e($user->linkedin_url); ?>" type="text" class="form-control" placeholder="Linkedin.com/"/>
              </div>
            </div>
            <br>
            <br>
            

            <div class="row">
              <div class="col-md-8 box-footer">
                <button type="submit" class="btn btn-primary px-18">
                   <?php echo e(__('adminstaticword.Save')); ?>

                </button>
              </div>
            </div>
          </form>
              <!--<a href="<?php echo e(route('user.index')); ?>" title="Cancel and go back" class="btn btn-md btn-default btn-flat">
                <i class="fa fa-reply"></i> <?php echo e(__('adminstaticword.Back')); ?>

              </a> -->
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

  $( function() {
    $( "#dob,#doa" ).datepicker({
      changeYear: true,
      yearRange: "-100:+0",
      dateFormat: 'yy/mm/dd',
    });
  });
  

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

<script>
  function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("update-password");
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
       text.style.display = "none";
    }
  }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>