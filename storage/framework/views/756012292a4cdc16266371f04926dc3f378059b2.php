<?php $__env->startSection('title', 'View Revenue - Admin'); ?>
<?php $__env->startSection('body'); ?>
 


<section class="content">
   <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- INVOICE PAGE: START -->
    <div class="row px-5">
      <div class="col-12">
          <div class="la-admin__invoice d-flex justify-content-between">
              <div class="la-admin__invoice-logo position-relative">
                  <img src="<?php echo e(asset('images/logo/'.$setting->logo)); ?>" alt="logo"  class="img-fluid d-block " />
              </div>

              <div class="la-admin__invoice-address text-right">
                  <p>K2, Old Sonal Industrial Est, Kanchpada, <br/> Malad Link Road, Malad West, Mumbai <br/> 400064. MH, India </p> 
                  <a  href="tel: +91 9999999999" class="d-flex justify-content-end align-items-center"><span class="la-icon--xl icon-contact-number"></span> <span class="pl-2">+91 9999999999 </span></a>
                  <a href="mailto: ask@learnitlikealiens.com" class="d-flex justify-content-end align-items-center"><span class="la-icon--xl icon-mail-id"></span> <span class="pl-2">ask@learnitlikealiens.com </span></a>
              </div>
          </div>
      </div>
     
      <div class="col-12">
          <div class="la-admin__invoice-details d-flex justify-content-between py-5">
              <div class="la-admin__cust-info">
                  <h6>SOLD TO</h6> 
                  <div class="la-admin__cust-name"> <?php echo e($show->user->fullName); ?> </div>
                  <div class="la-admin__cust-address">Address: <?php echo e($show->user->address); ?><br>
                    <?php if($show->user->state_id == !NULL): ?>
                    <?php echo e($show->user->state->name); ?>,
                    <?php endif; ?>
                    <?php if($show->user->country_id == !NULL): ?>
                      <?php echo e($show->user->country->name); ?>

                    <?php endif; ?>
                  </div>
                  <a class="la-admin__cust-mobile d-flex align-items-center" href="tel: <?php echo e($show->user->mobile); ?>"><span class="la-icon--xl icon-contact-number"></span> <span class="pl-2"> +<?php echo e($show->user->mobile); ?> </span></a> 
                  <a class="la-admin__cust-mail d-flex align-items-center" href="mailto: <?php echo e($show->user->email); ?>"><span class="la-icon--xl icon-mail-id"></span> <span class="pl-2"> <?php echo e($show->user->email); ?> </span></a>
              </div>

              <div class="la-admin__cust-invoice text-right">
                <div>
                  <span class="la-admin__invoice-date">DATE</span> <br/>
                  <span class="la-admin__date-format"><?php echo e(__('adminstaticword.Date')); ?>:&nbsp;<?php echo e(date('jS F Y', strtotime($show->created_at))); ?> </span>
                </div>
                  
                <div>
                  <span class="la-admin__invoice-order">ORDER ID </span><br/>
                  <span class="la-admin__invoice-id"><?php echo e($show->invoice_id); ?></span>
                </div>
              </div>
          </div>
      </div>

      <div class="col-12">
          <div class="la-admin__invoice-solditems">
              <h6>Items</h6>
       
              <?php if(count($show->details) > 0): ?>
               
                <ul class="la-admin__invoice-list">
                     <?php if (isset($component)) { $__componentOriginal3963dbe08b28fe98d639a0d105e12b6d9f7ac150 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminInvoice::class, ['img' => $show->details[0]->course->preview_image,'course' => $show->details[0]->course->title,'profile' => $show->details[0]->course->user->fullName,'price' => $show->details[0]->course->total_amount]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal3963dbe08b28fe98d639a0d105e12b6d9f7ac150)): ?>
<?php $component = $__componentOriginal3963dbe08b28fe98d639a0d105e12b6d9f7ac150; ?>
<?php unset($__componentOriginal3963dbe08b28fe98d639a0d105e12b6d9f7ac150); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                </ul>
              <?php else: ?>
                    <h1>No Items Found</h1>
              <?php endif; ?>

            

              <div class="la-admin__invoice-total d-flex justify-content-end">
                  <p class="la-admin__total-title mr-5"> Total </p>
                  <p class="la-admin__total-price" > $ <span><?php echo e($show->total); ?></span> </p>
              </div>
          </div>
      </div>
   
      <div class="col-md-5">
          <div class="la-admin__invoice-payment">
              <div class="la-admin__payment-title">PAYMENT DETAILS</div>
              <div class="la-admin__payment-status d-flex flex-row no-gutters">
                  <span class="col mr-auto">Payment Status</span>
                  <span class="col">Successful</span>
              </div>

              <div class="la-admin__payment-method d-flex flex-row no-gutters">
                <span class="col mr-auto">Payment Method</span>
                <span class="col">PayTM</span>
              </div>

              <div class="la-admin__payment-id  d-flex flex-row no-gutters">
                <span class="col mr-auto">Transaction Id</span>
                <span class="col"><?php echo e($show->invoice_id); ?></span>
              </div>
          </div>
      </div>
    </div>
    <!-- INVOICE PAGE: END -->


    
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
  	});
</script>

<script lang='javascript'>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	}
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/admin/order/view.blade.php ENDPATH**/ ?>