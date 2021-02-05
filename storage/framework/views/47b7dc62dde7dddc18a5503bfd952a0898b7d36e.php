<div class="la-header__nav d-flex flex-column justify-content-between">
    <?php if(Auth::check()): ?>

        <div class="la-header__nav-top d-lg-inline-flex  align-items-center">
            <div class="la-header__nav-item d-flex align-items-center d-lg-none ">
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'login'): ?> active <?php endif; ?> la-header__nav-link--collapsed collapsed" href="/login" data-toggle="collapse" data-target="#profileItems">
                    <div class="la-header__profile-img">
                        <img class="img-fluid" src="<?php echo e(Auth::user()->user_img); ?>" alt="<?php echo e(Auth::user()->fullName); ?>">
                    </div>
                    <span class="la-header__nav-name ml-4 mt-0 "><?php echo e(Auth::user()->fullName); ?></span>
                </a>
            </div>

            <div id="profileItems" class="collapse la-header__collapse-wrap">
                <div class="la-header__nav-item">
                    <a class="la-header__nav-link <?php if(Request::segment(1) == 'profile'): ?> active <?php endif; ?>" href="/profile">
                        <div class="la-header__nav-icon">
                            <span class="la-icon la-icon--md icon-edit-learner-profile"></span>
                        </div>
                        <span class="la-header__nav-name">Edit Profile</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link <?php if(Request::segment(1) == 'wishlist'): ?> active <?php endif; ?>" href="/wishlist">
                        <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--md icon-wishlist"></span>
                        </div>
                        <span class="la-header__nav-name">Wishlist</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link <?php if(Request::segment(1) == 'cart'): ?> active <?php endif; ?>" href="/cart">
                        <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--lg icon-cart"></span>
                        </div>
                        <span class="la-header__nav-name">Cart</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link <?php if(Request::segment(1) == 'playlist'): ?> active <?php endif; ?>" href="/playlist">
                        <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--md icon-playlist"></span>
                        </div>
                        <span class="la-header__nav-name">My Playlist</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link <?php if(Request::segment(1) == 'purchase-history'): ?> active <?php endif; ?>" href="/purchase-history">
                        <div class="la-header__nav-icon">
                            <span class="la-icon la-icon--md icon-purchase-history"></span>
                        </div>
                        <span class="la-header__nav-name">Purchase History</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link <?php if(Request::segment(1) == 'billing'): ?> active <?php endif; ?>" href="/billing">
                        <div class="la-header__nav-icon">
                            <span class="la-icon la-icon--md icon-card-filled"></span>
                        </div>
                        <span class="la-header__nav-name">Billing</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link <?php if(Request::segment(1) == 'my-interests'): ?> active <?php endif; ?>" href="/my-interests">
                        <div class="la-header__nav-icon">
                            <span class="la-icon la-icon--md icon-interests"></span>
                        </div>
                        <span class="la-header__nav-name">Interests</span>
                    </a>
                </div>

            </div>

            <div class="la-header__nav-item ">
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'user-dashboard'): ?> active <?php endif; ?>" href="/user-dashboard">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-dashboard"></span>
                    </div>
                    <span class="la-header__nav-name ">Dashboard</span>
                </a>
            </div>

            <div class="la-header__nav-item">
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'browse'): ?> active <?php endif; ?>"  href="/browse/courses">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-courses"></span>
                    </div>
                    <span class="la-header__nav-name">Browse Courses</span>
                </a>
            </div>

            <div class="la-header__nav-item"> 
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'my-courses'): ?> active <?php endif; ?>" href="/my-courses">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--xl icon-my-courses"></span>
                    </div> 
                    <span class="la-header__nav-name">My Courses</span>
                </a>
            </div>

            <div class="la-header__nav-item">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'mentors'): ?> active <?php endif; ?>" href="/mentors">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--xl icon-all-mentors"></span>
                    </div>
                    <span class="la-header__nav-name">Mentors</span>
                </a>
            </div>

            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'learning-plans'): ?> active <?php endif; ?>" href="/learning-plans">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--xl icon-learning-plans"></span>
                    </div>
                    <span class="la-header__nav-name">Learning Plans</span>
                </a>
            </div>

            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'about'): ?> active <?php endif; ?>" href="/about">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--xl icon-about"></span>
                    </div>
                    <span class="la-header__nav-name">About LILA</span>
                </a>
            </div>
            
            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'contact'): ?> active <?php endif; ?>" href="/contact">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-contact"></span>
                    </div>
                    <span class="la-header__nav-name">Contact Us</span>
                </a>
            </div>
        </div>

        <div class="la-header__nav-bottom d-lg-none">
            <div class="la-header__nav-item">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'become-creator'): ?> active <?php endif; ?>" href="/become-creator">
                    <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--xl icon-become-creator"></span>
                    </div>
                    <span class="la-header__nav-name">Become a Creator</span>
                </a>
            </div>
            <div class="la-header__nav-item">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'guided-creator'): ?> active <?php endif; ?>" href="/guided-creator">
                    <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--xl icon-guided-creator"></span>
                    </div>
                    <span class="la-header__nav-name">Guided Creator</span>
                </a>
            </div>
            <!--<div class="la-header__nav-item">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'help'): ?> active <?php endif; ?>" href="/">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-help-filled"></span>
                    </div>
                    <span class="la-header__nav-name">Help</span>
                </a>
            </div>-->
            <div class="la-header__nav-item">   
                <a class="la-header__nav-link" role="button" href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--xl icon-logout"></span>
                    </div>
                    <span class="la-header__nav-name">Logout</span>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                    </form>
                </a>
            </div>
        </div>

    <?php else: ?> 
        <div class="la-header__nav-top d-md-inline-flex  align-items-center">
            <div class="la-header__nav-item d-lg-none ">
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'login'): ?> active <?php endif; ?>" href="/login">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-profile"></span>
                    </div>
                    <span class="la-header__nav-name">Login</span>
                </a>
            </div>

            <div class="la-header__nav-item">
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'browse'): ?> active <?php endif; ?>" href="/browse/courses">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-courses"></span>
                    </div>
                    <span class="la-header__nav-name">Browse Courses</span>
                </a>
            </div>

            <div class="la-header__nav-item"> 
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'mentors'): ?> active <?php endif; ?> "  href="/mentors">
                    <div class="la-header__nav-icon">
                    <span class="la-icon--lg icon-all-mentors"></span>
                    </div> 
                    <span class="la-header__nav-name">Mentors</span>
                </a>
            </div>

            <div class="la-header__nav-item">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'learning-plans'): ?> active <?php endif; ?> " href="/learning-plans">
                    <div class="la-header__nav-icon">
                    <span class="la-icon--lg icon-learning-plans"></span>
                    </div>
                    <span class="la-header__nav-name">Learning Plans</span>
                </a>
            </div>

            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'about'): ?> active <?php endif; ?>" href="/about">
                    <div class="la-header__nav-icon">
                    <span class="la-icon--lg icon-about"></span>
                    </div>
                    <span class="la-header__nav-name">About LILA</span>
                </a>
            </div>
            
            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'contact'): ?> active <?php endif; ?> " href="/contact">
                    <div class="la-header__nav-icon">
                    <span class="la-icon--lg icon-contact"></span>
                    </div>
                    <span class="la-header__nav-name">Contact Us</span>
                </a>
            </div>
        </div>

        <!-- <div class="la-header__nav-bottom d-lg-none">
            <div class="la-header__nav-item">   
                <a class="la-header__nav-link <?php if(Request::segment(1) == 'help'): ?> active <?php endif; ?>" href="/help">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--md icon-help-filled"></span>
                    </div>
                    <span class="la-header__nav-name">Help</span>
                </a>
            </div>
        </div> -->
    <?php endif; ?>
    

</div><?php /**PATH C:\xampp\htdocs\lila-laravel\resources\views/components/login.blade.php ENDPATH**/ ?>