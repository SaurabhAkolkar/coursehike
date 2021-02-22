<div class="la-vcourse__lesson position-relative" data-video-id="<?php echo e($id); ?>">

    <div class="la-vcourse__access-wrap">
        <div class="la-vcourse__access la-vcourse__access--<?php echo e($access ?? ''); ?> d-flex align-items-center justify-content-center">
            <?php if($access == "free"): ?>
                <span class="icon-play la-vcourse__access-icon la-vcourse__access-icon--white"></span>
            <?php elseif($access == "locked"): ?>
                <span class="icon-lock la-vcourse__access-icon la-vcourse__access-icon--danger"  <?php if(Auth::check()): ?> data-target="#locked_subscribe"  <?php else: ?> data-target="#locked_login_modal"  <?php endif; ?>></span>
            <?php else: ?>
                <span class="icon-tick la-vcourse__access-icon la-vcourse__access-icon--green"></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="la-vcourse__lesson-left position-relative">
        <div class="la-vcourse__lesson-thumbnail"  <?php if($access == "locked"): ?> data-toggle="modal" <?php if(Auth::check()): ?> data-target="#locked_subscribe"  <?php else: ?> data-target="#locked_login_modal"  <?php endif; ?> <?php endif; ?>>
            <img class="img-fluid" src= <?php echo e($thumbnail ?? ''); ?> alt= <?php echo e($title ?? ''); ?>>
        </div>
        <div class="la-vcourse__lesson-playbtn">
            <span></span>
        </div>
        <div class="la-vcourse__video-progress position-absolute w-100">
            <div class="la-vcourse__video-time text-right mr-1"> <?php echo e($watchedDuration ?? ''); ?> </div>
            <div class="la-vcourse__video-track position-relative">
                <span style="width: <?php echo e($statusPercentage ?? ''); ?>;" class="la-vcourse__video-bar"></span>
            </div>
        </div>
    </div>
    <div class="la-vcourse__lesson-right d-flex">
        <div class="la-vcourse__lesson-content d-flex flex-wrap flex-column">
            <div class="la-vcourse__lesson-title leading-snug"> <?php echo e($title ?? ''); ?> </div>
            <div class="la-vcourse__lesson-creator pl-md-4"> <?php echo e($author ?? ''); ?> </div>
            <div class="la-vcourse__lesson-learnt mt-auto"> <?php echo e($statusPercentage ?? ''); ?> </div>
            <div class="la-vcourse__lesson-status"></div>
        </div>
        <div class="la-vcourse__lesson-description">
            <p><?php echo e($detail); ?></p>
        </div>
    </div>
</div><?php /**PATH E:\lila-laravel\resources\views/components/class-video.blade.php ENDPATH**/ ?>