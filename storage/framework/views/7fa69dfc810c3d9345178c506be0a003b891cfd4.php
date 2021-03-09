<div class="col-12" <?php if($addedToWhishList): ?> id="course_<?php echo e($id); ?>" <?php endif; ?>>
    <div class="la-course">
        <div class="la-course__inner">
                <a class="la-course__inner-link" role="button" href= "<?php echo e('/learn/course/'.$id.'/'.$url); ?>" >
                    <div class="la-course__overlay">
                        <div class="la-course__overlay-info d-flex justify-content-between align-items-start">
                            <?php if($price): ?>
                            <?php else: ?>
                                <div class="la-course__free">
                                    <img src="<?php echo e(asset('images/learners/home/free-class.svg')); ?>" class="img-fluid" alt="Free Class">
                                </div>
                            <?php endif; ?>
                            <ul class="la-course__options list-unstyled text-white" id="la-course__nested-links">
                                <li class="la-course__option">
                                    <?php if(Auth::check()): ?>
                                        <?php if($price && $bought == null): ?>
                                            <span class="d-inline-block la-course__addtocart" onclick="addToCart(<?php echo e($id); ?>)">
                                                <i class="la-icon la-icon--2xl icon icon-cart <?php if($checkCart): ?> text-warning <?php endif; ?>"></i>
                                            </span>
                                        <?php else: ?>

                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="d-inline-block la-course__addtocart" data-toggle="modal" data-target="#locked_login_modal">
                                            <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                        </span>
                                    <?php endif; ?>
                                </li>

                                <li class="la-course__option">
                                    <?php if(Auth::check()): ?>
                                        <?php if($price && $bought == null): ?>
                                            <span <?php if($addedToWhishList): ?> onclick="location.href='/remove-from-wishlist/<?php echo e($id); ?>'" <?php else: ?> onclick="addToWishList(<?php echo e($id); ?>)" <?php endif; ?>  >
                                                <span class="d-inline-block la-course__like">
                                                    <i class="la-icon la-icon--2xl icon <?php if($checkWishList): ?> text-warning <?php endif; ?> icon-wishlist <?php if($addedToWhishList): ?> text-warning <?php endif; ?>"></i>
                                                </span>
                                            </span>
                                        <?php else: ?>

                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span data-toggle="modal" data-target="#locked_login_modal">
                                            <span class="d-inline-block la-course__like">
                                                <i class="la-icon la-icon--2xl icon icon-wishlist"></i>
                                            </span>
                                        </span>
                                    <?php endif; ?>
                                </li>

                                <li class="la-course__option">
                                    <?php if(Auth::check()): ?>
                                            <span  <?php if($removeFromPlaylist): ?> onclick="location.href='<?php echo e(url()->current()); ?>/<?php echo e($id); ?>'"  <?php else: ?> onclick="showAddToPlaylist(<?php echo e($id); ?>)" <?php endif; ?>>
                                                <span class="d-inline-block la-course__like">
                                                    <i class="la-icon  la-icon--2xl icon-playlist <?php if($removeFromPlaylist): ?> text-warning  <?php endif; ?>"></i> 
                                                </span>
                                            </span>

                                        <?php else: ?>   

                                            <span data-toggle="modal" data-target="#locked_login_modal">
                                                <span class="d-inline-block la-course__like">
                                                    <i class="la-icon la-icon--2xl icon-playlist"></i> 
                                                </span>
                                            </span>

                                    <?php endif; ?>
                                </li>

                                
                            </ul>
                        </div>

                        <div class="la-course__play position-relative text-center w-100 mt-auto">
                            <a  role="button" href= "<?php echo e('/learn/course/'.$id.'/'.$url); ?>" class="la-course__play-btn">
                                <svg class="la-course__play-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"  x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                    <polygon class='la-course__play-triangle triangle' id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 "/> 
                                    <circle class='la-course__play-circle circle' id="XMLID_17_" fill="none"  stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"/>
                                </svg>
                            </a>
                        </div>

                        <div class="la-course__learners"><strong><?php echo e($learnerCount); ?></strong>  Learners</div>
                    </div>
                </a>
                <div class="la-course__imgwrap">
                    <img class="img-fluid" src= "<?php echo e($img); ?>?width=560&height=460&auto_optimize=true" alt= "<?php echo e($course); ?>" />
                </div>            
        </div>
         
        <div class="la-course__btm">
            <div class="la-course__info d-flex align-items-center mb-1">
                <a class="la-course__creator d-inline-flex align-items-center" href= "/creator/<?php echo e($creatorUrl); ?>" >
                    <div class="la-course__creator-imgwrap">
                        <img class="img-fluid" src="<?php echo e($creatorImg); ?>" alt=<?php echo e($creatorName); ?> />
                        
                    </div>
                    <div class="la-course__creator-name"><?php echo e($creatorName); ?></div>
                </a>
                
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

            <a class="la-course__title" href= <?php echo e('/learn/course/'.$id.'/'.$url); ?>> <?php echo e($course); ?> </a>
            
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/components/course.blade.php ENDPATH**/ ?>