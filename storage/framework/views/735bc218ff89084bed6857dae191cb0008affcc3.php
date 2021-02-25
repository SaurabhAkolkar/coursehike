

<div class="col-md-6 col-lg-4 ">
    <div class="la-mentor ">
      <div class="la-mentor__profile la-anim__stagger-item">
          <img class="img-fluid" src="<?php echo e($img); ?>" alt=<?php echo e($name); ?>>
      </div>
      <div class="la-mentor__btm d-flex justify-content-between align-items-center la-anim__stagger-item la-anim__B">
        <div class="la-mentor__info ">
          <h3 class="la-mentor__name text-capitalize"><?php echo e(ucfirst($name)); ?></h3>
          <p class="la-mentor__skill"><?php echo e($skill); ?></p>
        </div>
        <a class="la-mentor__detailview " href="/creator/<?php echo e($id); ?>">
          <span class="la-icon la-icon--6xl icon-grey-arrow mt-n2"></span>
        </a>
      </div>
    </div>
</div>

<?php /**PATH E:\lila-laravel\resources\views/components/mentor.blade.php ENDPATH**/ ?>