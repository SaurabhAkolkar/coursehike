<div class="row ">
    <div class="col p-0 p-md-0">
        <div class="la-vcreator__profile la-anim__stagger-item">
            <img class="img-fluid d-block" src= "<?php echo e($img); ?>" alt= "<?php echo e($name); ?>" />
            <div class="la-vcreator__overlay">
              <div class="la-vcreator__name la-anim__stagger-item--x"> <?php echo e($name); ?> </div>
            </div>
        </div>
    </div>
</div>

<div class="row my-md-6">
    <div class="col-md-6 p-4 p-md-0 la-anim__stagger-item">
        <div class="la-vcreator__desc">
            <p class="la-vcreator__text"> <?php echo $desc; ?> </p>
        </div>

        <div class="la-vcreator__social mt-8">
          <div class="la-vcreator__social-itm mr-5">
            <?php if($facebook): ?>
            <a class="la-vcreator__social-link" href="<?php echo e($facebook); ?>">
              <i class="la-icon la-icon--5xl icon-facebook"></i>
            </a>
            <a class="la-vcreator__social-link" href="<?php echo e($facebook); ?>">
              <i class="la-icon la-icon--5xl icon-insta"></i>
            </a>
            <?php endif; ?>
            <?php if($google): ?>
            <a class="la-vcreator__social-link" href="<?php echo e($google); ?>">
              <i class="la-icon la-icon--5xl icon-youtube"></i>
            </a>
            <?php endif; ?>
            <a class="la-vcreator__social-link" href="mailto:<?php echo e($email); ?>">
              <i class="la-icon la-icon--5xl icon-mail"></i>
            </a>
          </div>
        </div>
    </div>
    <div class="col-md-2 p-md-0"></div>
    <div class="col-md-4 p-4 p-md-0 la-anim__stagger-item">
      <div class="la-vcreator__profession">
        <h4 class="text-uppercase la-vcreator__skill"> <?php echo e($skill); ?> </h4>
        <div class="la-vcreator__location"> <?php echo e($location); ?> </div>
      </div>

      
      <ul class="list-unstyled la-vcreator__info d-flex justify-content-between">
        <li class="la-vcreator__courses ">
            <div class="la-vcreator__stats text-center "> <?php echo e($courses); ?>+ </div> 
            <div class="la-vcreator__category text-uppercase">Courses</div>
        </li>
        <li class="la-vcreator__ratings">
            <div class="la-vcreator__stats text-center"> <?php echo e(round($rating, 2)); ?> </div>
            <div class="la-vcreator__category text-uppercase">Ratings</div>
        </li>
        <li class="la-vcreator__awards">
            <div class="la-vcreator__stats text-center "> <?php echo e($awards); ?> </div>
            <div class="la-vcreator__category text-uppercase">Awards</div>
        </li>
      </ul>
    </div>
</div><?php /**PATH E:\lila-laravel\resources\views/components/creator-profile.blade.php ENDPATH**/ ?>