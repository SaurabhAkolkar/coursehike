    
        <div class="la-mccourse d-block la-anim__stagger-item" role="button" onclick="window.location='/learn/course/<?php echo e($id); ?>/<?php echo e($slug); ?>';">
            <div class="la-mccourse__imgwrap">
                <img class="img-fluid  mx-auto d-block" src= "<?php echo e($img); ?>" alt= <?php echo e($title); ?> />
            </div>
        
            <div class="la-mccourse__overlay">
                <!-- <a class="la-mccourse__tag">
                    <img class="img-fluid" src="./images/learners/home/master-class.svg" alt="Master Class">
                </a>
                <a class="la-mccourse__type" href="/learn/course/<?php echo e($id); ?>/<?php echo e($slug); ?>">
                    <span class="la-mccourse__type-icon la-icon la-icon--md icon-play"></span>
                </a> -->
                <div class="la-mccourse__play position-relative text-center w-100 mt-auto">
                    <a  role="button" href="/learn/course/<?php echo e($id); ?>/<?php echo e($slug); ?>" class="la-mccourse__play-btn">
                        <svg class="la-mccourse__play-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"  x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                            <polygon class='la-mccourse__play-triangle triangle' id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 "/> 
                            <circle class='la-mccourse__play-circle circle' id="XMLID_17_" fill="none"  stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"/>
                        </svg>
                    </a>
                </div>

                <div class="la-mccourse__title leading-none"><?php echo e($title); ?></div>

                <div class="la-mccourse__btm">
                    <div class="la-mccourse__cprofile">
                        <div class="la-mccourse__cprofile-imgwrap">
                            <img class="img-fluid" src= "<?php echo e($profileImg); ?>"   alt= "<?php echo e($profileName); ?>" />
                        </div>
                        <div class="la-mccourse__cprofile-name"><?php echo e($profileName); ?> </div>
                    </div>
                </div>
                <div class="la-mccourse__learners mt-4"><?php echo e($learners); ?> Learners</div>
            </div>
        </div>
        
<?php /**PATH E:\lila-laravel\resources\views/components/master-class.blade.php ENDPATH**/ ?>