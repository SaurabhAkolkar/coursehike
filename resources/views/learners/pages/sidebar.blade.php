
<!-- Side Navbar: Start -->
<div class="la-anim__wrap">
<div class="la-profile__sidebar position-fixed d-none d-md-flex flex-column justify-content-between align-items-start la-anim__fade-in-bottom">
    <div class="la-profile__sidebar-top">  
      <ul class="la-profile__sidebar-items la-anim__wrap">
        <li id="sidebar_menu_btn" class="la-profile__sidebar-item d-flex align-items-center la-anim__stagger-item ">
          <a href="/profile" class="la-profile__sidebar-link la-profile__sidebar-link--name d-flex align-items-center">
            <span class="la-profile__sidebar-img">
              <img src="https://picsum.photos/24/24" alt="profile image">
            </span>
            <span class="la-profile__sidebar-text la-profile__sidebar-text--name pl-2">Nathan Spark</span>
          </a>
          <div href="" class="la-profile__sidebar-btn active"><span class="la-icon la-icon--xl icon-hamburger-menu"></span></div>
        </li>

        <li class="la-profile__sidebar-item la-anim__stagger-item ">
          <a href="/profile" class="la-profile__sidebar-link d-flex align-items-center @if(Request::segment(1) == 'profile') active @endif ">
            <span class="la-icon la-icon--xl icon-edit-learner-profile"></span>
            <span class="la-profile__sidebar-text pl-2">Edit Profile</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item la-anim__stagger-item ">
          <a href="/wishlist" class="la-profile__sidebar-link d-flex align-items-center @if(Request::segment(1) == 'wishlist') active @endif ">
            <span class="la-icon la-icon--xl icon-wishlist"></span>
            <span class="la-profile__sidebar-text pl-2">Wishlist</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item la-anim__stagger-item ">
          <a href="/cart" class="la-profile__sidebar-link d-flex align-items-center @if(Request::segment(1) == 'cart') active @endif ">
            <span class="la-icon la-icon--2xl icon-cart"></span>
            <span class="la-profile__sidebar-text pl-2">Cart</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item la-anim__stagger-item ">
          <a href="/playlist" class="la-profile__sidebar-link d-flex align-items-center @if(Request::segment(1) == 'playlist') active @endif ">
            <span class="la-icon la-icon--xl icon-playlist"></span>
            <span class="la-profile__sidebar-text pl-2">My Playlist</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item la-anim__stagger-item ">
          <a href="/purchase-history" class="la-profile__sidebar-link d-flex align-items-center @if(Request::segment(1) == 'purchase-history') active @endif ">
            <span class="la-icon la-icon--xl icon-purchase-history"></span>
            <span class="la-profile__sidebar-text pl-2">Purchase History</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item la-anim__stagger-item ">
          <a href="/billing" class="la-profile__sidebar-link d-flex align-items-center @if(Request::segment(1) == 'billing') active @endif ">
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
        <li class="la-profile__sidebar-item la-anim__stagger-item ">
          <a href="/my-interests" class="la-profile__sidebar-link d-flex align-items-center @if(Request::segment(1) == 'my-interests') active @endif ">
            <span class="la-icon la-icon--xl icon-interests"></span>
            <span class="la-profile__sidebar-text pl-2">Interests</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="la-profile__sidebar-bottom">
      <ul class="la-profile__sidebar-items la-anim__wrap">
        <li class="la-profile__sidebar-item la-anim__stagger-item ">
          <a class="la-profile__sidebar-link d-flex align-items-center @if(Request::segment(1) == 'become-creator') active @endif " href="/become-creator">
            <span class="la-icon la-icon--2xl icon-become-creator"></span>
            <span class="la-profile__sidebar-text pl-2">Become a Creator</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item la-anim__stagger-item ">
          <a class="la-profile__sidebar-link d-flex align-items-center @if(Request::segment(1) == 'help') active @endif " href="">
            <span class="la-icon la-icon--xl icon-help-filled"></span>
            <span class="la-profile__sidebar-text pl-2">Help</span>
          </a>
        </li>
        <li class="la-profile__sidebar-item la-anim__stagger-item ">
          <a class="la-profile__sidebar-link d-flex align-items-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="la-icon la-icon--lg icon-logout"></span>
            <span class="la-profile__sidebar-text pl-2">Logout</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
          </a>
        </li>
      </ul>
    </div>
</div>
</div>
<!--  Side Navbar: End -->