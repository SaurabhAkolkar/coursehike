<?php $__env->startSection('title','Add New Coupon'); ?>

<?php $__env->startSection('body'); ?>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"><?php echo e(__('adminstaticword.Add')); ?> <?php echo e(__('adminstaticword.Coupon')); ?></h3>
    
      
        <div class="box-body">
          <form action="<?php echo e(route('coupon.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
      
          <div class="row">
            <div class="col-md-4">
              <label><?php echo e(__('adminstaticword.CouponCode')); ?>:<span class="redstar">*</span></label>
              <input required="" type="text" class="form-control" name="code">
              <?php $__errorArgs = ['code'];
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

            <div class="col-md-4">
              <label><?php echo e(__('adminstaticword.DiscountType')); ?>:<span class="redstar">*</span></label>
                <select required="" name="distype" id="distype" class="form-control js-example-basic-single">
                  <option value="fix"><?php echo e(__('adminstaticword.FixAmount')); ?></option>
                  <option value="per">% <?php echo e(__('adminstaticword.Percentage')); ?></option>
                </select>
                <?php $__errorArgs = ['distype'];
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
          </div>

          <div class="row  mt-3">
            <div class="col-md-8">
                <label><?php echo e(__('adminstaticword.Amount')); ?>:<span class="redstar">*</span></label>
                <input required="" type="text"  class="form-control" name="amount">
                <?php $__errorArgs = ['amount'];
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
          </div>
          
          <div class="row mt-3">
              <div class="col-md-4">
                <label><?php echo e(__('adminstaticword.MaxUsageLimit')); ?>:<span class="redstar">*</span></label>
                <input required="" type="number" min="1" class="form-control" name="maxusage">
                <?php $__errorArgs = ['maxusage'];
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

              <div class="col-md-4">
                <label><?php echo e(__('adminstaticword.ExpiryDate')); ?>: </label>
                <div class="input-group">
                  <span class="input-group-addon pt-1 px-3 border"><i class="la-icon la-icon--md icon-calender-filled"></i></span>
                  <input required="" id="expirydate" type="text" class="form-control" name="expirydate">
                    <?php $__errorArgs = ['expirydate'];
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
              </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-4">
              <label><?php echo e(__('adminstaticword.Linkedto')); ?>:<span class="redstar">*</span></label>
              
                <select required="" name="link_by" id="link_by" class="form-control js-example-basic-single">
                  <option value="none" selected disabled hidden> 
                    <?php echo e(__('adminstaticword.SelectanOption')); ?>

                  </option>
                  <option value="course"><?php echo e(__('adminstaticword.LinktoCourse')); ?></option>
                  <option value="cart"><?php echo e(__('adminstaticword.LinktoCart')); ?></option>
                  <option value="category"><?php echo e(__('adminstaticword.LinktoCategory')); ?></option>
                </select>
                <?php $__errorArgs = ['link_by'];
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

                <div id="probox" class="col-md-12 px-0 mt-4 display-none">
                  <label><?php echo e(__('adminstaticword.SelectCourse')); ?>:<span class="redstar">*</span> </label>
                  <br>
                  <select style="width: 100%" id="pro_id" name="course_id" class="js-example-basic-single form-control">
                      <option value="none" selected disabled hidden> 
                        <?php echo e(__('adminstaticword.SelectanOption')); ?>

                      </option>
                      <?php $__currentLoopData = App\Course::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($product->type == 1): ?>
                          <option value="<?php echo e($product->id); ?>"><?php echo e($product['title']); ?></option>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['course_id'];
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
            
                <div id="catbox" class="col-md-12  px-0 mt-4 display-none">
                  <label><?php echo e(__('adminstaticword.SelectCategories')); ?>:<span class="required redstar">*</span> </label>
                  <br>
                  <select style="width: 100%" id="cat_id" name="category_id" class="js-example-basic-single form-control">
                      <option value="none" selected disabled hidden> 
                        <?php echo e(__('adminstaticword.SelectanOption')); ?>

                      </option>
                      <?php $__currentLoopData = App\Categories::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category['title']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['category_id'];
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
            </div>

            <div class="col-md-4" id="minAmount" >
                <label><?php echo e(__('adminstaticword.MinAmount')); ?>: </label>
                <div class="input-group">
                  <?php 
                    $currency = App\Currency::first();
                  ?>
                  <span class="input-group-addon pt-1 px-4 border"><i class="<?php echo e($currency->icon); ?>"></i></span>
                  <input type="number" min="0.0" value="0.00" step="0.1" class="form-control" name="minamount">
                  <?php $__errorArgs = ['minamount'];
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
              </div>
          </div><br/>

          <div class="row">
            <!-- ADD CLASS  TOGGLER: START -->
            <div class="col-md-4">
                <div class="la-admin__master-toggler m-0">
                  <label  class="la-admin__preview-label pl-2">Status:</label>
                  <div class="la-admin__master-class pl-2">
                        <input type="checkbox" id="coupon-status" name="coupon-status" class="la-admin__toggle-switch" />
                        <label for="coupon-status" class="la-admin__toggle-label"></label> 
                  </div>
                </div>
            </div>
            <!-- ADD CLASS  TOGGLER: END -->
        </div>

        <!-- COUPON PACKAGE TYPE: START -->
        
      <!-- COUPON PACKAGE TYPE: END -->

      <!-- COUPON USAGE LIMIT: START -->
      
      <!-- COUPON USAGE LIMIT: END -->

      <div class="row">
        <div class="col-md-8 mt-8">
          <div class="box-footer">
            <button type="submit" class="btn btn-primary px-18"> <?php echo e(__('adminstaticword.Save')); ?></button>
          </div>
        </div>
      </div>
    </form>
     <!--  <a href="<?php echo e(route('coupon.index')); ?>" title="Cancel and go back" class="btn btn-md btn-default btn-flat">
        <i class="fa fa-reply"></i> <?php echo e(__('adminstaticword.Back')); ?>

      </a> -->
    </div>
    </div>       
  </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  (function($) {
  "use strict";
    
      $('#link_by').change(function(){
        var opt = $(this).val();
       
        if(opt == 'course'){
          $('#minAmount').hide();
          $('#probox').show();
          $('#minAmount').hide();
          $('#pro_id').attr('required','required');
        }else{
          $('#minAmount').show();
          $('#probox').hide();
          $('#pro_id').removeAttr('required');
        }
    });

      $('#link_by').change(function(){
        var opt = $(this).val();
       
        if(opt == 'category'){
          $('#catbox').show();
          $('#pro_id').attr('required','required');
        }else{
          $('#catbox').hide();
          $('#pro_id').removeAttr('required');
        }
    });

      $( function() {
        $( "#expirydate" ).datepicker({
          dateFormat : 'yy-m-d'
        });
      });

  })(jQuery);
    
</script>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/coupan/add.blade.php ENDPATH**/ ?>