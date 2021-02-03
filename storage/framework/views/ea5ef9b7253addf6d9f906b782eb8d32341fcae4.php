<?php $__env->startSection('title','Edit Coupons - Admin'); ?>
<?php $__env->startSection('body'); ?>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3">
              <?php echo e(__('adminstaticword.Edit')); ?> <?php echo e(__('adminstaticword.Coupon')); ?>: <?php echo e($coupan->code); ?>

          </h3>
       
      <div class="box-body">
        <form action="<?php echo e(route('coupon.update',$coupan->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo e(method_field("PUT")); ?>


            <div class="row ">
              <div class="col-md-4">
                <label><?php echo e(__('adminstaticword.CouponCode')); ?>: <span class="redstar">*</span></label>
                <input value="<?php echo e($coupan->code); ?>" type="text" class="form-control" name="code">
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
                <label><?php echo e(__('adminstaticword.DiscountType')); ?>: <span class="redstar">*</span></label>
                  <select required="" name="distype" id="distype" class="form-control js-example-basic-single">
                    <option <?php echo e($coupan->distype == 'fix' ? "selected" : ""); ?> value="fix"><?php echo e(__('adminstaticword.FixAmount')); ?></option>
                    <option <?php echo e($coupan->distype == 'per' ? "selected" : ""); ?> value="per">% <?php echo e(__('adminstaticword.Percentage')); ?></option>  
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

            <div class="row mt-3">
              <div class="col-md-8">
                  <label><?php echo e(__('adminstaticword.Amount')); ?>: <span class="redstar">*</span></label>
                  <input type="text" value="<?php echo e($coupan->amount); ?>"  class="form-control" name="amount">
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
                  <label><?php echo e(__('adminstaticword.MaxUsageLimit')); ?>: <span class="redstar">*</span></label>
                  <input value="<?php echo e($coupan->maxusage); ?>" type="number" min="1" class="form-control" name="maxusage">
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
                  <span class="input-group-addon pt-2 px-2 border"><i class="la-icon la-icon--md icon-calender-filled"></i></span>
                  <input value="<?php echo e(date('Y-m-d',strtotime($coupan->expirydate))); ?>" id="expirydate" type="text" class="form-control" name="expirydate">
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
                <label><?php echo e(__('adminstaticword.Linkedto')); ?>: <span class="redstar">*</span></label>
                
                  <select required="" name="link_by" id="link_by" class="form-control js-example-basic-single">
                    <option <?php echo e($coupan->link_by == 'course' ? "selected" : ""); ?> value="course"><?php echo e(__('adminstaticword.LinktoCourse')); ?></option>
                    <option <?php echo e($coupan->link_by == 'cart' ? "selected" : ""); ?> value="cart"><?php echo e(__('adminstaticword.LinktoCart')); ?></option>
                    <option <?php echo e($coupan->link_by == 'category' ? "selected" : ""); ?> value="category"><?php echo e(__('adminstaticword.LinktoCategory')); ?></option>
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
              </div>

                <div class="col-md-4" style="<?php echo e($coupan->link_by == 'course' ? "" : "display: none"); ?>" id="probox" >
                    <label><?php echo e(__('adminstaticword.SelectCourse')); ?>: <span class="redstar">*</span> </label>
                    <br>
                    <select id="pro_id" name="course_id" class="js-example-basic-single form-control">
                        <option value="none" selected disabled hidden> 
                          <?php echo e(__('adminstaticword.SelectanOption')); ?>

                        </option>
                        <?php $__currentLoopData = App\Course::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($product->type == 1): ?>
                            <option <?php echo e($coupan->course_id == $product->id ? 'selected' : ""); ?> value="<?php echo e($product->id); ?>"><?php echo e($product['title']); ?></option>
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
                       
                  <div class="col-md-4" style="<?php echo e($coupan->link_by == 'category' ? "" : "display: none"); ?>" id="catbox" >
                    <label><?php echo e(__('adminstaticword.SelectCategories')); ?>: <span class="redstar">*</span> </label>
                    <br>
                    <select style="width: 100%" id="cat_id" name="category_id" class="js-example-basic-single form-control">
                        <option value="none" selected disabled hidden> 
                          <?php echo e(__('adminstaticword.SelectanOption')); ?>

                        </option>
                        <?php $__currentLoopData = App\Categories::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option <?php echo e($coupan->category_id == $category->id ? 'selected' : ""); ?> value="<?php echo e($category->id); ?>"><?php echo e($category['title']); ?></option>
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
            

            <div class="row mt-3">         
              <div class="col-md-8" style="<?php echo e($coupan->link_by=='product' ? "display:none" : ""); ?>" id="minAmount" >
                  <label><?php echo e(__('adminstaticword.MinAmount')); ?>: </label>
                  <div class="input-group ">
                    <?php
                        $currency = App\Currency::first();
                    ?> 
                    <span class="input-group-addon pt-1 px-3 border"><i class="<?php echo e($currency->icon); ?>"></i></span>
                    <input value="<?php echo e($coupan->minamount); ?>" type="number" min="0.0" value="0.00" step="0.1" class="form-control" name="minamount">
                  </div>
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

            
          
              <!-- COUPON PACKAGE TYPE: START -->
              
            <!-- COUPON PACKAGE TYPE: END -->

            <!-- COUPON USAGE LIMIT: START -->
            
            <!-- COUPON USAGE LIMIT: END -->

              <!-- ADD CLASS MASTER TOGGLER: START -->
              <div class="row pl-2 mt-3">
                <div class="col-4">
                    <div class="la-admin__master-toggler m-0">
                      <label  class="la-admin__preview-label">Status<sup class="redstar">*</sup></label>
                      <div class="la-admin__master-class">
                            <input type="checkbox" id="edit-couponStatus" name="edit-couponStatus" class="la-admin__toggle-switch" />
                            <label for="edit-couponStatus" class="la-admin__toggle-label"></label> 
                      </div>
                    </div>
                </div>
              </div>
              <!-- ADD CLASS MASTER TOGGLER: END -->

            <div class="row">
              <div class="col-md-8">      
                <div class="box-footer">
                  <button type="submit" class="btn btn-md btn-primary px-16">
                    <?php echo e(__('adminstaticword.Update')); ?>

                  </button>
                </div>
              </div>
            </div>
          </form>
          <!-- <a href="<?php echo e(route('coupon.index')); ?>" title="Cancel and go back" class="btn btn-md btn-default btn-flat"><i class="fa fa-reply"></i> <?php echo e(__('adminstaticword.Back')); ?></a>
          -->
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

      $('#link_by').on('change',function(){
        var opt = $(this).val();
       
        if(opt == 'course'){
          $('#minAmount').hide();
          $('#probox').show();
          $('#catbox').hide();
          $('#pro_id').attr('required','required');
        }else{
          $('#minAmount').show();
          $('#probox').hide();
          $('#catbox').show();
          $('#pro_id').removeAttr('required');
        }
    });

      $('#link_by').on('change',function(){
        var opt = $(this).val();
       
        if(opt == 'category'){
          $('#catbox').show();
          $('#probox').hide();
          $('#cat_id').attr('required','required');
        }else{
          $('#catbox').hide();
          $('#probox').show();
          $('#cat_id').removeAttr('required');
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

<?php echo $__env->make("admin/layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/admin/coupan/edit.blade.php ENDPATH**/ ?>