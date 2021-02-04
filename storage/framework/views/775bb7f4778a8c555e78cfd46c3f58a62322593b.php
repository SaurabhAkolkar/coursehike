<div class="card la-course__tiles w-100 d-flex flex-row ">
    <div class="col-4 la-courses__tile-thumbnail card-header d-block p-0 la-anim__fade-in-top">
        <img class="img-fluid d-block " src= <?php echo e($img); ?> alt= <?php echo e($desc); ?>>

        <div class="la-course__tile-bars d-block position-relative">
            <div class="la-course__tile-indicator d-block">
                <p class="m-0 px-2 small text-right"> <?php echo e($progress); ?>%</p>
            </div>
            <div class="la-course__tile-progress progress bg-transparent d-block pt-2">
                <div class="progress-bar bg-success" role="progress-bar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100" style="width:37%;height:4px;border-radius: 0 0 0 10px;"></div>
            </div>
        </div>
    </div>

    <div class="col-5 h-100 la-course__tile-content d-block px-2 pt-2 la-anim__fade-in-bottom">
        <h6 class="la-course__tile-subtitle text-md m-0"> <?php echo e($desc); ?></h6>
        <p class="text-xs"> <?php echo e($name); ?> </p>

        <div class="la-course__tile-rating pt-2">
            <div class="la-tile__rtng">
                <div class="la-course__rating ml-auto">
                    <div class="la-rtng__pg-rtng d-inline-flex pl-3">
                        <?php if($rating == 5): ?>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                        <?php elseif($rating >= 4): ?>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <?php elseif($rating >= 3): ?>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                        <?php elseif($rating >= 2): ?>
                        
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <?php elseif($rating >= 1): ?>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <?php else: ?>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="col-3 la-course__tile-more d-flex align-items-center la-anim__stagger-item--x" href="/learn/course/<?php echo e($id); ?>/<?php echo e($slug); ?>">
        <span class="la-icon la-icon--7xl icon-grey-arrow "></span> 
    </a>
</div><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/components/last-viewed.blade.php ENDPATH**/ ?>