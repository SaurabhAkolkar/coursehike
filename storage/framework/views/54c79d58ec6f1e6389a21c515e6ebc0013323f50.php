
<!-- Side Navbar: Start -->
<div class="la-anim__wrap">
<div class="la-profile__sidebar position-fixed d-none d-md-flex flex-column justify-content-between align-items-start la-anim__fade-in-left">
    <div class="la-profile__sidebar-top ">  
      <ul class="la-profile__sidebar-items la-anim__stagger-item--x ">
        <li id="sidebar_menu_btn" class="la-profile__sidebar-item d-flex align-items-center ">
          <a href="/profile" class="la-profile__sidebar-link la-profile__sidebar-link--name d-flex align-items-center">
            <span class="la-profile__sidebar-img">
              <img src="<?php echo e(Auth::user()->user_img); ?>" class="img-fluid" alt="<?php echo e(Auth::user()->fullName); ?>">
            </span>
            <span class="la-profile__sidebar-text la-profile__sidebar-text--name pl-2"><?php echo e(Auth::user()->fullName); ?></span>
          </a>
          <div href="" class="la-profile__sidebar-btn active"><span class="la-icon la-icon--xl icon-hamburger-menu"></span></div>
        </li>

        <li class="la-profile__sidebar-item">
          <a href="/profile" class="la-profile__sidebar-link d-flex align-items-center <?php if(Request::segment(1) == 'profile'): ?> active <?php endif; ?> ">
            <span class="la-icon la-icon--xl icon-edit-learner-profile"></span>
            <span class="la-profile__sidebar-text pl-2">Edit Profile</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item ">
          <a href="/wishlist" class="la-profile__sidebar-link d-flex align-items-center <?php if(Request::segment(1) == 'wishlist'): ?> active <?php endif; ?> ">
            <span class="la-icon la-icon--xl icon-wishlist"></span>
            <span class="la-profile__sidebar-text pl-2">Wishlist</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item ">
          <a href="/cart" class="la-profile__sidebar-link d-flex align-items-center <?php if(Request::segment(1) == 'cart'): ?> active <?php endif; ?> ">
            <span class="la-icon la-icon--2xl icon-cart"></span>
            <span class="la-profile__sidebar-text pl-2">Cart</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item ">
          <a href="/playlist" class="la-profile__sidebar-link d-flex align-items-center <?php if(Request::segment(1) == 'playlist'): ?> active <?php endif; ?> ">
            <span class="la-icon la-icon--xl icon-playlist"></span>
            <span class="la-profile__sidebar-text pl-2">My Playlist</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item">
          <a href="/purchase-history" class="la-profile__sidebar-link d-flex align-items-center <?php if(Request::segment(1) == 'purchase-history'): ?> active <?php endif; ?> ">
            <span class="la-icon la-icon--xl icon-purchase-history"></span>
            <span class="la-profile__sidebar-text pl-2">Purchase History</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item">
          <a href="/manage-billing" target="_blank" class="la-profile__sidebar-link d-flex align-items-center <?php if(Request::segment(1) == 'billing'): ?> active <?php endif; ?> ">
            <span class="la-icon la-icon--xl icon-card-filled"></span>
            <span class="la-profile__sidebar-text pl-2">Billing</span>
          </a>
        </li>
        <!-- <li class="la-profile__sidebar-item">
          <a href="/billing-address" class="la-profile__sidebar-link d-flex align-items-center">
            <span class="la-icon la-icon--xl icon-address"></span>
            <span class="la-profile__sidebar-text pl-2">Billing Address</span>
          </a>
        </li> -->
        <li class="la-profile__sidebar-item">
          <a href="/my-interests" class="la-profile__sidebar-link d-flex align-items-center <?php if(Request::segment(1) == 'my-interests'): ?> active <?php endif; ?> ">
            <span class="la-icon la-icon--xl icon-interests"></span>
            <span class="la-profile__sidebar-text pl-2">Interests</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="la-profile__sidebar-bottom la-anim__wrap">
      <ul class="la-profile__sidebar-items la-anim__stagger-item--x">
        <li class="la-profile__sidebar-item ">
          <a class="la-profile__sidebar-link d-flex align-items-center <?php if(Request::segment(1) == 'become-creator'): ?> active <?php endif; ?> " href="/become-creator">
            <span class="la-icon la-icon--2xl icon-become-creator"></span>
            <span class="la-profile__sidebar-text pl-2">Become a Creator</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item  ">
          <a class="la-profile__sidebar-link d-flex align-items-center <?php if(Request::segment(1) == 'contact'): ?> active <?php endif; ?> " href="/contact">
            <span class="la-icon la-icon--xl icon-contact-number"></span>
            <span class="la-profile__sidebar-text pl-2">Contact Us</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item ">
          <a class="la-profile__sidebar-link d-flex align-items-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="la-icon la-icon--lg icon-logout"></span>
            <span class="la-profile__sidebar-text pl-2">Logout</span>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
              <?php echo csrf_field(); ?>
            </form>
          </a>
        </li>
      </ul>
    </div>
</div>
</div>
<!--  Side Navbar: End --><?php /**PATH E:\lila-laravel\resources\views/learners/pages/sidebar.blade.php ENDPATH**/ ?>