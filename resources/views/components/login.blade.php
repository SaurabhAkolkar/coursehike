<div class="la-header__nav d-flex flex-column justify-content-between">
    @if (Auth::check())

        <div class="la-header__nav-top d-lg-inline-flex  align-items-center">
            <div class="la-header__nav-item d-flex align-items-center d-lg-none ">
                <a class="la-header__nav-link @if(Request::segment(1) == 'login') active @endif la-header__nav-link--collapsed collapsed" href="/login" data-toggle="collapse" data-target="#profileItems">
                    <div class="la-header__profile-img">
                        <img class="img-fluid lazy" src="{{ Auth::user()->user_img }}" data-src="{{ Auth::user()->user_img }}"  alt="{{Auth::user()->fullName}}" />
                    </div>
                    <span class="la-header__nav-name ml-4 mt-0 ">{{Auth::user()->fullName}}</span>
                </a>
            </div>

            <div id="profileItems" class="collapse la-header__collapse-wrap">
                <div class="la-header__nav-item">
                    <a class="la-header__nav-link @if(Request::segment(1) == 'profile') active @endif" href="/profile">
                        <div class="la-header__nav-icon">
                            <span class="la-icon la-icon--md icon-edit-learner-profile"></span>
                        </div>
                        <span class="la-header__nav-name">Edit Profile</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link @if(Request::segment(1) == 'wishlist') active @endif" href="/wishlist">
                        <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--md icon-wishlist"></span>
                        </div>
                        <span class="la-header__nav-name">Wishlist</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link @if(Request::segment(1) == 'cart') active @endif" href="/cart">
                        <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--lg icon-cart"></span>
                        </div>
                        <span class="la-header__nav-name">Cart</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link @if(Request::segment(1) == 'playlist') active @endif" href="/playlist">
                        <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--md icon-playlist"></span>
                        </div>
                        <span class="la-header__nav-name">My Playlist</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link @if(Request::segment(1) == 'purchase-history') active @endif" href="/purchase-history">
                        <div class="la-header__nav-icon">
                            <span class="la-icon la-icon--md icon-purchase-history"></span>
                        </div>
                        <span class="la-header__nav-name">Purchase History</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link @if(Request::segment(1) == 'billing') active @endif" href="/manage-billing">
                        <div class="la-header__nav-icon">
                            <span class="la-icon la-icon--md icon-card-filled"></span>
                        </div>
                        <span class="la-header__nav-name">Billing</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link @if(Request::segment(1) == 'my-interests') active @endif" href="/my-interests">
                        <div class="la-header__nav-icon">
                            <span class="la-icon la-icon--md icon-interests"></span>
                        </div>
                        <span class="la-header__nav-name">Interests</span>
                    </a>
                </div>

                <div class="la-header__nav-item">
                    <a class="la-header__nav-link @if(Request::segment(1) == 'releases') active @endif" href="/releases">
                        <div class="la-header__nav-icon">
                            <span class="la-icon la-icon--md icon-announcement"></span>
                        </div>
                        <span class="la-header__nav-name">New Releases</span>
                    </a>
                </div>

            </div>

            <!-- Header Buttons: Start -->
        @if(Auth::check())
            @if(!Auth::user()->subscription())
            <div class="la-header__menu-item la-header__menu-item--cta text-center d-block d-lg-none">
                <a href="/learning-plans" class="la-header__menu-link  la-header__menu-cta btn btn--primary la-btn__header bg-yellow" role="button">
                    <span class="la-header__menu-cta--text text-sm">Start free trial</span>
                </a>
            </div>
            @elseif(Auth::user()->subscription() && Auth::user()->subscription()->onTrial())
                @php
                    $user_subscription = Auth::user()->subscription();
                    $created = \Carbon\Carbon::parse($user_subscription->trial_ends_at);
                    $now = \Carbon\Carbon::now();
                    $difference = ($created->diff($now)->days < 1)
                        ? 'today'
                        : 'in '.$now->diffInDays($created, false).' days';            
                @endphp
                <div class="la-header__menu-item la-header__menu-item--cta text-center d-block d-lg-none">
                    <a href="/learning-plans" class="la-header__menu-link la-header__menu-cta btn btn--primary la-btn__header border-yellow" role="button">
                        <span class="la-header__menu-cta--text text-sm">Trial Ends {{$difference}}</span>
                    </a>
                </div>
            @elseif(Auth::user()->subscription() && (Auth::user()->subscription()->ended() || Auth::user()->subscription()->canceled()))
            <div class="la-header__menu-item la-header__menu-item--cta d-block d-lg-none">
                <a href="/learning-plans" class="la-header__menu-link la-header__menu-cta btn btn--primary la-btn__header bg-green" role="button">
                    <span class="la-header__menu-cta--text text-sm">Renew Subscription</span>
                </a>
            </div>
            @endif
        @endif
         
            <!-- Header Buttons: End -->

            <div class="la-header__nav-item ">
                <a class="la-header__nav-link @if(Request::segment(1) == 'user-dashboard') active @endif" href="/user-dashboard">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-dashboard"></span>
                    </div>
                    <span class="la-header__nav-name ">Dashboard</span>
                </a>
            </div>

            <div class="la-header__nav-item">
                <a class="la-header__nav-link @if(Request::segment(1) == 'browse' && Request::segment(2) == 'classes' ) active @endif"  href="/browse/classes">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-class"></span>
                    </div>
                    <span class="la-header__nav-name">Browse Classes</span>
                </a>
            </div>

            <div class="la-header__nav-item">
                <a class="la-header__nav-link @if(Request::segment(1) == 'browse' && Request::segment(2) == 'courses') active @endif"  href="/browse/courses">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-courses"></span>
                    </div>
                    <span class="la-header__nav-name">Browse Courses</span>
                </a>
            </div>

            <div class="la-header__nav-item"> 
                <a class="la-header__nav-link @if(Request::segment(1) == 'my-courses') active @endif" href="/my-courses">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--xl icon-my-courses"></span>
                    </div> 
                    <span class="la-header__nav-name">My Courses</span>
                </a>
            </div>

            <div class="la-header__nav-item">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'mentors') active @endif" href="/mentors">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--xl icon-all-mentors"></span>
                    </div>
                    <span class="la-header__nav-name">Mentors</span>
                </a>
            </div>
            @if(Auth::check() && Auth::User()->subscription() && Auth::User()->subscription()->active())

            @else

                <div class="la-header__nav-item d-none d-lg-block">   
                    <a class="la-header__nav-link @if(Request::segment(1) == 'learning-plans') active @endif" href="/learning-plans">
                        <div class="la-header__nav-icon">
                            <span class="la-icon--xl icon-learning-plans"></span>
                        </div>
                        <span class="la-header__nav-name">Learning Plans</span>
                    </a>
                </div>

            @endif

            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'learning-plans') active @endif" href="/learning-plans">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--xl icon-learning-plans"></span>
                    </div>
                    <span class="la-header__nav-name">Learning Plans</span>
                </a>
            </div>

            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'about') active @endif" href="/about">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--xl icon-about"></span>
                    </div>
                    <span class="la-header__nav-name">About LILA</span>
                </a>
            </div>
            
            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'contact') active @endif" href="/contact">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-contact"></span>
                    </div>
                    <span class="la-header__nav-name">Contact Us</span>
                </a>
            </div>
        
            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'become-mentor') active @endif" href="/become-mentor">
                    <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--xl icon-become-creator"></span>
                    </div>
                    <span class="la-header__nav-name" style="text-transform:none">Become a Mentor</span>
                </a>
            </div>
            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'guided-mentor') active @endif" href="/guided-mentor">
                    <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--xl icon-guided-creator"></span>
                    </div>
                    <span class="la-header__nav-name">Guided Mentor</span>
                </a>
            </div>
            <!--<div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'help') active @endif" href="/">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-help-filled"></span>
                    </div>
                    <span class="la-header__nav-name">Help</span>
                </a>
            </div>-->
            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link" role="button" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="la-header__nav-icon">
                        <span class="la-icon la-icon--xl icon-logout"></span>
                    </div>
                    <span class="la-header__nav-name">Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </a>
            </div>
        </div>

        <div class="la-header__nav-bottom d-lg-none"></div>

    @else 

        <div class="la-header__nav-top d-lg-inline-flex  align-items-center">
            <div class="la-header__nav-item d-lg-none ">
                <a class="la-header__nav-link  @if(Request::segment(1) == 'login') active @endif" href="/login">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-profile"></span>
                    </div>
                    <span class="la-header__nav-name">Login</span>
                </a>
            </div>

            <div class="la-header__nav-item">
                <a class="la-header__nav-link @if(Request::segment(1) == 'browse' && Request::segment(2) == 'courses') active @endif" href="/browse/courses">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-courses"></span>
                    </div>
                    <span class="la-header__nav-name">Category</span>
                </a>
            </div>

            {{-- <div class="la-header__nav-item">
                <a class="la-header__nav-link @if(Request::segment(1) == 'browse' && Request::segment(2) == 'classes' ) active @endif"  href="/browse/classes">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--lg icon-class"></span>
                    </div>
                    <span class="la-header__nav-name">Browse Classes</span>
                </a>
            </div>

            <div class="la-header__nav-item"> 
                <a class="la-header__nav-link @if(Request::segment(1) == 'mentors') active @endif "  href="/mentors">
                    <div class="la-header__nav-icon">
                    <span class="la-icon--lg icon-all-mentors"></span>
                    </div> 
                    <span class="la-header__nav-name">Mentors</span>
                </a>
            </div> 

            <div class="la-header__nav-item">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'learning-plans') active @endif " href="/learning-plans">
                    <div class="la-header__nav-icon">
                    <span class="la-icon--lg icon-learning-plans"></span>
                    </div>
                    <span class="la-header__nav-name">Learning Plans</span>
                </a>
            </div> --}}

            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'become-mentor') active @endif" href="/become-mentor">
                    <div class="la-header__nav-icon">
                    <span class="la-icon--lg icon-become-creator"></span>
                    </div>
                    <span class="la-header__nav-name" style="text-transform:none">Become a Mentor</span>
                </a>
            </div>

            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'guided-mentor') active @endif" href="/guided-mentor">
                    <div class="la-header__nav-icon">
                    <span class="la-icon--lg icon-guided-creator"></span>
                    </div>
                    <span class="la-header__nav-name">Guided Mentor</span>
                </a>
            </div>

            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'about') active @endif" href="/about">
                    <div class="la-header__nav-icon">
                    <span class="la-icon--lg icon-about"></span>
                    </div>
                    <span class="la-header__nav-name">About LILA</span>
                </a>
            </div>
            
            <div class="la-header__nav-item d-lg-none">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'contact') active @endif " href="/contact">
                    <div class="la-header__nav-icon">
                    <span class="la-icon--lg icon-contact"></span>
                    </div>
                    <span class="la-header__nav-name">Contact Us</span>
                </a>
            </div>
        </div>

        <div class="la-header__nav-bottom d-lg-none">
            <div class="la-header__nav-item">   
                <a class="la-header__nav-link @if(Request::segment(1) == 'help') active @endif" href="/help">
                    <div class="la-header__nav-icon">
                        <span class="la-icon--md icon-help-filled"></span>
                    </div>
                    <span class="la-header__nav-name">Help</span>
                </a>
            </div>
        </div> 

        <div class="la-header__nav-bottom d-lg-none"></div>
    @endif
    

</div>