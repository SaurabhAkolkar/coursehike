<?php $__env->startSection('content'); ?>
<div class="la-profile">
    <div class="la-profile__wrap">

      <!-- Side Navbar: Start -->
      <?php echo $__env->make('learners.pages.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Side Navbar: End -->
      <div class="la-profile__main">
        <div class="container la-anim__wrap">
          <div class="la-profile__main-inner pb-6 pb-md-20">
            <!-- SECTION PURCHASED: START -->
            <section class="la-purchase--history">
                <div class="container px-0 la-anim__stagger-item">
                  <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="<?php echo e(URL::previous()); ?>"></a>
                  <div class="la-purchaseh__main-title text-3xl head-font pb-5 pb-lg-10">Purchase History</div>
                </div>
                  <!-- Purchased Desktop Version: Start -->

                <?php if(count($invoice) != 0 ): ?>
                <div class="container px-0 d-none d-lg-block"> 
                      <div class="la-purchaseh__item row mb-5">          
                        <div class="col-lg-4 la-anim__stagger-item--x">
                          <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-2xl head-font">Invoice ID                            </div>
                        </div>
                        <div class="col-lg-1 "></div>
                        <div class="col-lg-1 text-center la-anim__stagger-item--x">
                          <div class="la-purchaseh__item-label text-sm">On  </div>
                        </div>
                        <div class="col-lg-1"></div>
                        
                        <div class="col-lg-1 px-0 text-center la-anim__stagger-item--x">
                          <div class="la-purchaseh__item-label text-sm">Total Price </div>
                        </div>
                        <div class="col-lg-1 text-center la-anim__stagger-item--x">
                          <div class="la-purchaseh__item-label text-sm">Payment Status </div>
                        </div>
                        <div class="col-lg-1 p-0 text-center la-anim__stagger-item--x">
                          <div class="la-purchaseh__item-label text-sm">Invoice </div>
                        </div>
                      </div>

                      <?php $__currentLoopData = $invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          
                               <?php if (isset($component)) { $__componentOriginal5c9c923cdd5f4520f9495bebfe4f5727a9d7eae1 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Purchase::class, ['date' => Carbon\Carbon::parse($i->created_at)->format('d.M.Y'),'total' => $i->total,'paystatus' => $i->status,'invoice' => $i->invoice_id,'invoiceUrl' => '/download-invoice/'.$i->id]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['paymode' => 'PayTM']); ?>
<?php if (isset($__componentOriginal5c9c923cdd5f4520f9495bebfe4f5727a9d7eae1)): ?>
<?php $component = $__componentOriginal5c9c923cdd5f4520f9495bebfe4f5727a9d7eae1; ?>
<?php unset($__componentOriginal5c9c923cdd5f4520f9495bebfe4f5727a9d7eae1); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                          
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                  <div class="d-none d-lg-block la-anim__wrap">
                    <div class=" d-md-flex justify-content-center align-items-start la-anim__stagger-item">
                          <div class="la-empty__inner py-10">
                              <h6 class="la-empty__course-title  text-3xl la-anim__stagger-item" style="color:var(--gray8);">No Purchase History.</h6>
                          </div>
                      </div>
                    </div>

                <?php endif; ?>
                  <!-- Purchased Desktop Version: End -->

                  <!-- Purchased Mobile Version: Start -->
                <?php if(count($invoice) != 0 ): ?>
                <div class="container ">
                  <div class="la-ph__mobile d-block d-lg-none la-anim__stagger-item">
                    <div class="la-ph__mobile-inner d-flex justify-content-between my-5">
                      <div class="la-ph__course text-md ">Course</div>
                      <div class="la-ph__status text-md">Status</div>
                    </div>
                    <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-xl head-font pb-3">Purchased</div>
                  </div>
                  
                    <?php $__currentLoopData = $invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $__currentLoopData = $i->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if (isset($component)) { $__componentOriginal2b4fa1f1be12051bf0aa15b0f0f98b56199c9ba0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PurchaseMobile::class, ['id' => $detail->id,'img' => 'https://picsum.photos/200/100','course' => $detail->course->title,'creator' => $detail->course->user->fullname,'date' => Carbon\Carbon::parse($detail->created_at)->isoFormat('D/M/YY'),'paymode' => 'PayTM','total' => $detail->price,'paystatus' => $i->status,'invoice' => 'Invoice','invoiceUrl' => '/download-invoice/'.$i->id]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal2b4fa1f1be12051bf0aa15b0f0f98b56199c9ba0)): ?>
<?php $component = $__componentOriginal2b4fa1f1be12051bf0aa15b0f0f98b56199c9ba0; ?>
<?php unset($__componentOriginal2b4fa1f1be12051bf0aa15b0f0f98b56199c9ba0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                </div>
                <?php else: ?>
                    <div class="d-block d-lg-none la-anim__wrap">
                      <div class="d-md-flex justify-content-between align-items-start  la-anim__stagger-item" >
                          <div class="text-center py-6 la-empty__inner">
                          <h6 class="la-empty__course-title text-xl la-anim__stagger-item" style="color:var(--gray8);">No Purchase History.</h6>
                          </div>
                      </div>
                    </div>
                <?php endif; ?>
                <!-- Purchased Mobile Version: End -->
            </section>
            <!-- SECTION PURCHASED: END -->

            
          
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/purchase-history.blade.php ENDPATH**/ ?>