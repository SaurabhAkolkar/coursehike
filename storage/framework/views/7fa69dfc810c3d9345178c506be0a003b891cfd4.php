<div class="col-12 grid-view " <?php if($addedToWhishList): ?> id="course_<?php echo e($id); ?>" <?php endif; ?>>
    <div class="la-course">
            <div class="la-course__inner">
                <a class="la-course__inner-link" role="button" href= "<?php echo e('/learn/course/'.$id.'/'.$url); ?>" >
                    <div class="la-course__overlay">
                        <ul class="la-course__options list-unstyled text-white" id="la-course__nested-links">
                            <li class="la-course__option">
                                <?php if(Auth::check()): ?>
                                    <span class="d-inline-block la-course__addtocart" onclick="addToCart(<?php echo e($id); ?>)">
                                        <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                    </span>
                                <?php else: ?>
                                    <span class="d-inline-block la-course__addtocart" data-toggle="modal" data-target="#locked_login_modal">
                                        <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                    </span>
                                <?php endif; ?>
                            </li>

                            <li class="la-course__option">
                                <?php if(Auth::check()): ?>
                                    <span <?php if($addedToWhishList): ?> onclick="location.href='/remove-from-wishlist/<?php echo e($id); ?>'" <?php else: ?> onclick="addToWishList(<?php echo e($id); ?>)" <?php endif; ?>  >
                                        <span class="d-inline-block la-course__like">
                                            <i class="la-icon la-icon--2xl icon icon-wishlist <?php if($addedToWhishList): ?> text-warning <?php endif; ?>"></i>
                                        </span>
                                    </span>
                                <?php else: ?>
                                    <span data-toggle="modal" data-target="#locked_login_modal">
                                        <span class="d-inline-block la-course__like">
                                            <i class="la-icon la-icon--2xl icon icon-wishlist"></i>
                                        </span>
                                    </span>
                                <?php endif; ?>
                            </li>

                            <li class="la-course__option">
                                    <div class="dropdown">
                                        <div class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);">
                                            <i class="la-icon la-icon--2xl icon icon-menu"></i>
                                        </div>
                                        <div class="la-cmenu dropdown-menu py-0">
                                            <?php if(Auth::check()): ?>
                                                <span class="dropdown-item la-cmenu__item d-inline-flex" <?php if($removeFromPlaylist): ?> onclick="location.href='<?php echo e(url()->current()); ?>/<?php echo e($id); ?>'"  <?php else: ?> onclick="showAddToPlaylist(<?php echo e($id); ?>)" <?php endif; ?>><i class="icon icon-playlist la-icon la-cmenu__item-icon mr-2"></i> <?php if($removeFromPlaylist): ?> Remove from Playlist  <?php else: ?> Add to Playlist <?php endif; ?></span>
                                                <span class="dropdown-item la-cmenu__item d-inline-flex" <?php if($addedToWhishList): ?> onclick="location.href='/remove-from-wishlist/<?php echo e($id); ?>'" <?php else: ?> onclick="addToWishList(<?php echo e($id); ?>)" <?php endif; ?>><i class="icon icon-wishlist la-icon la-cmenu__item-icon mr-2"></i> <?php if($addedToWhishList): ?> Remove from Wishlist <?php else: ?> Add to Wishlist <?php endif; ?> </span>
                                                <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="addToCart(<?php echo e($id); ?>)"><i class="icon icon-cart la-icon la-cmenu__item-icon mr-2"></i>  Add to Cart</span>
                                            <?php else: ?>   

                                                <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-playlist la-icon la-cmenu__item-icon mr-2"></i>  Add to Playlist</span>
                                                <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-wishlist la-icon la-cmenu__item-icon mr-2"></i> Add to Wishlist </span>
                                                <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-cart la-icon la-cmenu__item-icon mr-2"></i>  Add to Cart</span>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                            </li>
                        </ul>

                        <div class="la-course__learners"><strong><?php echo e($learnerCount); ?></strong>  Learners</div>
                    </div>
                </a>
                <div class="la-course__imgwrap">
                    <img class="img-fluid" src= "<?php echo e($img); ?>" alt= "<?php echo e($course); ?>" />
                </div>            
        </div>
         
        <div class="la-course__btm">
            <div class="la-course__info d-flex align-items-center mb-1">
                <a class="la-course__title" href= <?php echo e('/learn/course/'.$id.'/'.$url); ?>> <?php echo e(strlen($course)>25?substr($course,0,25).'...':$course); ?> </a>
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
            
            <a class="la-course__creator d-inline-flex align-items-center" href= "/creator/<?php echo e($creatorUrl); ?>" >
                <div class="la-course__creator-imgwrap">
                    <img class="img-fluid" src="<?php echo e($creatorImg); ?>" alt=<?php echo e($creatorName); ?> />
                    
                </div>
                <div class="la-course__creator-name"><?php echo e($creatorName); ?></div>
            </a>
        </div>
    </div>
</div>



<!-- Course Card List View: Start -->
<div class="col-12 list-view d-none">
    <div class="la-course__list d-flex justify-content-between align-items-center">
        <div class="la-course__list-clft d-md-flex align-items-center">
            <div class="la-course__list-cimgtop">
                <a href="<?php echo e('/learn/course/'.$id.'/'.$url); ?>"  class="la-course__list-cimg">
                    <img src="<?php echo e($img); ?>" alt="<?php echo e($course); ?>" class="img-fluid d-block" />
                </a>
            </div>
            
            <div class="la-course__list-cinfo ml-md-5">
                <h4 class="la-course__list-cname text-md text-md-2xl"><?php echo e(strlen($course)>25?substr($course,0,25).'...':$course); ?> </h4>
                <a href="/creator/<?php echo e($creatorUrl); ?>" class="la-course__list-cauthor text-capitalize text-sm text-md-lg"><?php echo e($creatorName); ?></a>
            </div>
        </div>

        <div class="la-course__list-crht d-flex align-items-center">
            <div class="la-course__list-clearners ml-2"><?php echo e($learnerCount); ?> <span class="la-course__list-clearners--text">Learners</span></div>
            <div class="la-course__list-cratings ml-2 ml-md-20">  
                 <div class="la-rtng__pg-rtng d-inline-flex px-3">
                    <div class="icon-star la-rtng__fill"></div>
                    <div class="icon-star la-rtng__fill"></div>
                    <div class="icon-star la-rtng__fill"></div>
                    <div class="icon-star la-rtng__unfill"></div>
                    <div class="icon-star la-rtng__unfill"></div>
                </div>
            </div>

            <li class="la-course__option ml-2 ml-md-20">
                <div class="dropdown">
                    <div class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);">
                        <i class="la-icon la-icon--2xl icon icon-menu"></i>
                    </div>
                    <div class="la-cmenu dropdown-menu py-0">
                        <?php if(Auth::check()): ?>
                            <span class="dropdown-item la-cmenu__item d-inline-flex" <?php if($removeFromPlaylist): ?> onclick="location.href='<?php echo e(url()->current()); ?>/<?php echo e($id); ?>'"  <?php else: ?> onclick="showAddToPlaylist(<?php echo e($id); ?>)" <?php endif; ?>><i class="icon icon-playlist la-icon la-cmenu__item-icon mr-2"></i> <?php if($removeFromPlaylist): ?> Remove from Playlist  <?php else: ?> Add to Playlist <?php endif; ?></span>
                            <span class="dropdown-item la-cmenu__item d-inline-flex" <?php if($addedToWhishList): ?> onclick="location.href='/remove-from-wishlist/<?php echo e($id); ?>'" <?php else: ?> onclick="addToWishList(<?php echo e($id); ?>)" <?php endif; ?>><i class="icon icon-wishlist la-icon la-cmenu__item-icon mr-2"></i> <?php if($addedToWhishList): ?> Remove from Wishlist <?php else: ?> Add to Wishlist <?php endif; ?> </span>
                            <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="addToCart(<?php echo e($id); ?>)"><i class="icon icon-cart la-icon la-cmenu__item-icon mr-2"></i>  Add to Cart</span>
                        <?php else: ?>   
                            <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-playlist la-icon la-cmenu__item-icon mr-2"></i>  Add to Playlist</span>
                            <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-wishlist la-icon la-cmenu__item-icon mr-2"></i> Add to Wishlist </span>
                            <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-cart la-icon la-cmenu__item-icon mr-2"></i>  Add to Cart</span>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        </div>
    </div>
</div>
<!-- Course Card List View: End -->
<?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/components/course.blade.php ENDPATH**/ ?>