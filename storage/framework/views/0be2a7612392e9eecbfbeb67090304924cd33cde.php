<div class="la-puchaseh__items d-none d-lg-block">
    <div class="la-purchaseh__item row align-items-center pb-8 la-anim__stagger-item">           
        
        <div class="col-lg-4">
            <div class="la-purchaseh__item-date text-md"><?php echo e($invoice); ?></div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1 text-center">
            <div class="la-purchaseh__item-date text-md"><?php echo e($date); ?></div>
        </div>

        <div class="col-lg-1"></div>

        

        <div class="col-lg-1 px-0 text-center">
            <div class="la-purchaseh__item-total">$ <?php echo e($total); ?></div>
        </div>

        <div class="col-lg-1 text-center">
            <div class="la-purchaseh__item-paystatus"><?php echo e($paystatus); ?></div>
        </div>

        <div class="col-lg-1 p-0 text-right">
            <a class="la-purchaseh__item-invoice" role="button" target="_blank" href= <?php echo e($invoiceUrl); ?>>Invoice
                <span class="la-icon icon-download la-purchaseh__item-download" ></span>
            </a>
        </div>
    </div>
  </div><?php /**PATH E:\lila-laravel\resources\views/components/purchase.blade.php ENDPATH**/ ?>