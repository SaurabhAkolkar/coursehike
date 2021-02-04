<?php $__env->startSection('content'); ?>

<div class="la-profile">
    <div class="la-profile__wrap">
      
       <!-- Side Navbar: Start -->
       <?php echo $__env->make('learners.pages.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <!-- Side Navbar: End --> 

        <div class="la-profile__main pb-md-20">
            <div class="container la-anim__wrap">
                <div class="la-profile__main-inner ">
                    <h1 class="la-profile__title text-2xl text-lg-4xl  la-anim__stagger-item">
                        <a href="/billing" role="button" style="color: var(--app-indigo-1)">Billing</a>/
                            Payment History
                    </h1>
                    <div class="row">
                        <div class="col-12 py-6 py-md-12">
                            <div class="la-payment__history-tablelayout">
                                <table class="table text-center table-hover la-payment__history-table la-anim__stagger-item--x">
                                    <thead>
                                        <tr>
                                            <th class="la-anim__stagger-item--x" scope="col">#</th>
                                            <th class="la-anim__stagger-item--x" scope="col">ID</th>
                                            <th class="la-anim__stagger-item--x" scope="col">Date</th>
                                            
                                            <th class="la-anim__stagger-item--x" scope="col">Amount</th>
                                            <th class="la-anim__stagger-item--x" scope="col">Invoice</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php if($payment->status == 'paid'): ?>
                                                    <td class="la-anim__stagger-item--x"><span class="la-icon icon-tick la-payment__history-success"></span></td>
                                                <?php else: ?>
                                                    <td class="la-anim__stagger-item--x"><span class="la-icon icon-cancel la-payment__history-danger"></span></td>
                                                <?php endif; ?>
                                                
                                                <td class="la-anim__stagger-item--x"><div><?php echo e($payment->stripe_invoice_id); ?></div></td>
                                                <td class="la-anim__stagger-item--x"><div><?php echo e(\Carbon\Carbon::parse($payment->created_at)->format('d M Y')); ?></div></td>
                                                
                                                <td class="la-anim__stagger-item--x"><div>$<?php echo e($payment->invoice_paid); ?></div></td>
                                                <td class="la-anim__stagger-item--x">
                                                    <div class="text-center">
                                                        <a href="" role="button">
                                                            <span class="la-icon la-icon--lg icon-download la-payment__history-invoice"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/payment-history.blade.php ENDPATH**/ ?>