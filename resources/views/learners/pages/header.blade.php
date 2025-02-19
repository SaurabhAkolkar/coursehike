@php
use Carbon\Carbon;
use App\CourseProgress;
use App\LearnerAnnouncement;
@endphp
@php
$announcements = [];
$new_announcements = [];
$old_anno = [];
$last_annoucement_check = now();
$announcements = LearnerAnnouncement::query()
                                  ->where('status',1)
                                  ->orderBy('updated_at', 'DESC')
                                  ->get();

if(Auth::check()){
  $last_annoucement_check = Auth::user()->last_annoucement_check;

  if($last_annoucement_check==null){
    $last_annoucement_check = Auth::user()->created_at;
  }


  $new_announcements = $announcements->where('updated_at','>=',$last_annoucement_check);
  $old_anno = $announcements->where('updated_at','<',$last_annoucement_check);


}





@endphp
@if (Auth::check())

  <!-- Header: Start-->
  <header class="la-header">
      <div class="la-header__inner  d-flex align-items-center">
        <div class="la-header__lft d-inline-flex align-items-center">
          <a class="la-header__brandwrap" href="/">
            <lottie-player src="https://assets4.lottiefiles.com/private_files/lf30_wiqvp9w0.json" background="transparent" speed="1" style="width: ; height: ;" class="la-header__brand" loop autoplay></lottie-player>
            {{-- <img class="la-header__brand" src="/images/learners/logo.svg" alt="Lila" /> --}}
          </a>
          <!-- <div class="la-header__nav d-none d-md-inline-flex  align-items-center">
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/user-dashboard">Dashboard</a></div>
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/browse/courses">Browse Courses</a></div>
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/my-courses">My Courses</a></div>
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/mentors">Mentors</a></div>
          </div> -->

          <x-login />

        </div>

        <form class="form-inline mb-0 d-none d-xl-block" action="{{ url('/search-course/') }}" method="get">
          <div class="form-group la-header__gsearch"  >
            <input class="la-gsearch__input form-control text-md px-0 la-header__gsearch-input" id="header_search_input" type="text" name="course_name" value="{{isset($search_input)?$search_input:''}}" placeholder="Looking for creative courses by the best artists in the world?" required>
          </div>
        </form>

        <div class="la-header__rht ml-auto">
          <div class="la-header__menu d-inline-flex align-items-center position-relative">

            <!-- Header Buttons: Start -->
          @if(Auth::check())
            @if(!Auth::user()->subscription())

              <div class="la-header__menu-item d-none d-lg-block">
                  <a href="/learning-plans" class="la-header__menu-link d-inline-flex align-items-center la-header__menu-cta btn btn--primary la-btn__header bg-green" role="button">
                      <span class="la-header__menu-cta--text text-sm">Start free trial</span>
                      <!--<span class="la-header__menu-cta--green la-icon icon-profile pl-3"></span> -->
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
              <div class="la-header__menu-item d-none d-lg-block">
                  <a href="/learning-plans" class="la-header__menu-link d-inline-flex align-items-center la-header__menu-cta btn btn--primary la-btn__header border-yellow" role="button">
                      <span class="la-header__menu-cta--text text-sm">Trial Ends {{$difference}}</span>
                     <!-- <span class="la-header__menu-cta la-icon la-icon--lg icon-profile pl-3"></span>-->
                  </a>
              </div>
            @elseif(Auth::user()->subscription() && (Auth::user()->subscription()->ended() || Auth::user()->subscription()->canceled()))

                <div class="la-header__menu-item d-none d-lg-block">
                    <a href="/learning-plans" class="la-header__menu-link d-inline-flex align-items-center la-header__menu-cta btn btn--primary la-btn__header bg-green" role="button">
                        <span class="la-header__menu-cta--text text-sm">Renew Subscription</span>
                        <!--<span class="la-header__menu-cta--green la-icon icon-profile pl-3"></span>-->
                    </a>
                </div>
            @endif
          @endif
<!--
            <div class="la-header__menu-item d-none d-lg-block">
                <a class="la-header__menu-link d-inline-flex align-items-center la-header__menu-cta btn btn--primary la-btn__header border-green" role="button">
                    <span class="la-header__menu-cta--text text-sm pr-3">Annual Subscription</span>
                    <span class="la-header__menu-cta la-icon la-icon--lg icon-profile"></span>
                </a>
            </div> -->
            <!-- Header Buttons: End -->

            <div class="la-header__menu-item d-none d-xl-block">
              <!-- Global Search: Start-->
              <div class="la-gsearch  mb-0" >
                  <button class="la-gsearch__submit btn px-0" type="submit" id="header_search">
                    <i class="la-icon la-icon--lg icon icon-search la-header__gsearch-icon"></i>
                  </button>
              </div>
              <!-- Global Search: End-->
            </div>

            @if(Auth::user()->role == 'mentors' || Auth::user()->role == 'admin')
              <div class="la-header__menu-item d-none d-xl-block @if(Request::segment(1) == 'admins') active @endif">
                  <a class="la-header__menu-link la-header__menu-icon la-icon la-icon--xl icon-admin" role="button" target="_blank" @if(Auth::user()->role == 'admin') href="/admins" @elseif(Auth::user()->role == 'mentors') href="/instructor" @endif></a>
              </div>
            @endif

            <div class="la-header__menu-item d-none d-lg-block @if(Request::segment(1) == 'profile') active @endif">
              <a class="la-header__menu-link la-header__menu-icon la-icon icon-profile" href="/profile"></a>
            </div>

            <div class="la-header__menu-item dropdown"><a class="la-header__menu-link la-header__menu-icon dropdown-toggle la-icon icon-notification " id="notificationPanel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><sup class="la-header__menu-badge badge badge-light" id="notificationBadge">{{count(Auth::user()->unreadNotifications)}}</sup> </a>
              <div class="la-notification__dropdown dropdown-menu dropdown-menu-right bg-transparent" aria-labelledby="notificationPanel" style="border:none !important;">
                  <ul class="card la-notification__card">
                    <!-- Notification Panel: Start -->

                    @foreach (Auth::user()->unreadNotifications as $notification)

                      <x-notification  :img="$notification->data['image']" :name="$notification->data['id']" :comment="$notification->data['data']" :timestamp="Carbon::parse($notification->created_at)->format('d-m-Y')" />

                    @endforeach
                    @if(count(Auth::user()->unreadNotifications) == 0)
                      <div class="d-flex justify-content-center align-items-center my-auto">
                        <div class="text-xl" style="color:var(--gray8);font-weight:var(--font-medium)">No Notifications Found</div>
                      </div>
                    @endif

                    <!-- Notification Panel: End -->
                  </ul>
                <a class="la-notification__clear-all position-fixed" href="#" onclick="clearNotification()">
                  <div class="text-center">CLEAR ALL</div>
                </a>
              </div>
            </div>

            <div class="la-header__menu-item dropdown d-none d-lg-block">

            <a class="la-header__menu-link la-header__menu-icon dropdown-toggle la-icon icon-announcement" onclick="markReleaseRead()" id="announcementPanel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <sup class="la-header__menu-badge badge badge-light" id="notificationBadgeRelease">{{count($new_announcements)}}</sup></a>
              <div class="la-notification__dropdown dropdown-menu dropdown-menu-right bg-transparent" aria-labelledby="announcementPanel" style="border:none;">
                <div class="card la-announcement__card">
                  <div class="la-announcement__name d-flex justify-content-between">
                    <h6 class="text-xl body-font">New Releases</h6>
                    <a class="la-announcement__view-more" href="/releases">
                      <span class="la-announcement__view-icon la-icon la-icon--6xl icon-grey-arrow mt-n3"></span>
                    </a>
                  </div>
                      <!-- Announcements Panel: Start -->

                       @foreach ($new_announcements as $anno)

                              @php

                                  $timestamp = $anno->created_at->diffInDays(Carbon::now());
                                  if($timestamp > 0){
                                    $timestamp = $timestamp.' Days Ago';
                                  }else{
                                    $timestamp = 'Today';
                                  }
                              @endphp

                            <x-announcement :url="$anno->id" :img="$anno->preview_image" :event="$anno->title" :timestamp="$timestamp" />

                      @endforeach

                        @foreach ($old_anno as $anno)

                              @php

                                  $timestamp = $anno->created_at->diffInDays(Carbon::now());
                                  if($timestamp > 0){
                                    $timestamp = $timestamp.' Days Ago';
                                  }else{
                                    $timestamp = 'Today';
                                  }
                              @endphp

                            <x-announcement :url="$anno->id" :img="$anno->preview_image" :event="$anno->title" :timestamp="$timestamp" />

                      @endforeach

                      @if(count($new_announcements) == 0 && count($old_anno) == 0)
                      <div class="d-flex justify-content-center align-items-center my-auto">
                        <div class="text-xl head-font" style="color:var(--gray8);font-weight:var(--font-medium)">No New Releases Found</div>
                      </div>
                      @endif
                      <!-- Announcements Panel: End -->
                </div>
              </div>
            </div>

            <div class="la-header__menu-item ">
              @php
                  $cart = App\Cart::with('cartItems')->where(['user_id' => Auth::User()->id, 'status' => 1])->get();

              @endphp
              <a class="la-header__menu-link la-header__menu-icon la-icon icon-cart position-relative @if(Request::segment(1) == 'cart') active @endif" href="/cart"><sup class="la-header__menu-badge badge badge-light" >{{count($cart)}}</sup></a>
            </div>

            <div class="d-none d-lg-block la-header__menu-item la-header__menu-item--btn ml-5">
              <a class="la-header__menu-link la-header__menu-icon la-icon icon-hamburger-menu font-weight-normal"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
              <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" style="border:none !important;">
                <a class="dropdown-item la-header__dropdown-item text-sm @if(Request::segment(1) == 'learning-plans') active @endif" href="/learning-plans">Learning Plans</a>
                @if(Auth::check() && Auth::user()->role != "mentors")<a class="dropdown-item la-header__dropdown-item text-sm @if(Request::segment(1) == 'become-mentor') active @endif" href="/become-mentor">Become a Mentor</a>@endif
                <a class="dropdown-item la-header__dropdown-item text-sm @if(Request::segment(1) == 'guided-mentor') active @endif" href="/guided-mentor">Guided Mentor</a>
                <a class="dropdown-item la-header__dropdown-item text-sm @if(Request::segment(1) == 'about') active @endif" href="/about">About Us</a>
                <a class="dropdown-item la-header__dropdown-item text-sm @if(Request::segment(1) == 'contact') active @endif" href="/contact">Contact Us</a>

                <a class="dropdown-item la-header__dropdown-item text-sm" role="button" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <span>Logout</span>
                  <form id="logout-form" class="mb-0" action="{{ route('logout') }}" method="POST">
                    @csrf
                  </form>
                </a>
              </div>
            </div>

            <div class="d-lg-none position-relative la-header__menu-item la-header__sidemenu-btn">
                <span class="la-icon la-icon--xl icon-hamburger-menu"></span>
            </div>

          </div>

        </div>
      </div>
  </header>
   <!-- Header: End-->

@else

  <!-- Header: Start-->
  <header class="la-header">
    <div class="la-header__inner px-5 py-3 d-flex align-items-center container">
      <div class="la-header__lft d-inline-flex align-items-center">
        <a class="la-header__brandwrap" href="/">
          <img class="la-header__brand" src="/images/learners/logo.svg" alt="Lila" />
        </a>

        <!-- header nav links -->
        <x-login />

      </div>

      <form class="form-inline mb-0 d-none d-xl-block" action="{{ url('/search-course/') }}" method="get">
        <div class="form-group la-header__gsearch"  >
          <input class="la-gsearch__input form-control text-md px-0 la-header__gsearch-input px-0" id="header_search_input" type="text" name="course_name" value="{{isset($search_input)?$search_input:''}}" placeholder="Looking for creative courses by the best artists in the world?" required>
        </div>
      </form>

      <div class="la-header__rht ml-auto mr-md-5">
        <div class="la-header__menu d-inline-flex align-items-center">

          <div class="la-header__menu-item d-none d-xl-block">
              <!-- Global Search: Start-->
              <div class="la-gsearch mt-1 mb-0" >
                  <button class="la-gsearch__submit btn px-0" type="submit" id="header_search">
                    <i class="la-icon la-icon--lg icon icon-search la-header__gsearch-icon"></i>
                  </button>
              </div>
              <!-- Global Search: End-->
          </div>

          <div class="la-header__menu-item">
            <a class="la-header__nav-link la-header__nav-link--login" href="/login">Login</a>
          </div>

          <div class="la-header__menu-item">
            <a class="la-header__nav-link la-header__nav-link--login" href="/login">Sign Up</a>
          </div>

          {{-- <div class="la-header__menu-item dropdown">
            <a class="la-header__menu-link la-header__menu-icon dropdown-toggle la-icon icon-announcement" id="announcementPanel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
            <div class="la-notification__dropdown  dropdown-menu dropdown-menu-right bg-transparent" aria-labelledby="announcementPanel" style="border:none !important;">
              <div class="card la-announcement__card">
                <div class="la-announcement__name d-flex justify-content-between">
                  <h6 class="text-xl body-font">New Releases</h6>
                  <a class="la-announcement__view-more" href="/releases">
                    <span class="la-announcement__view-icon la-icon la-icon--6xl icon-grey-arrow mt-n3"></span>
                  </a>
                </div>
                    <!-- Announcements Panel: Start -->


                      @foreach ($announcements as $anno)

                      @php

                          $timestamp = $anno->created_at->diffInDays(Carbon::now());
                          if($timestamp > 0){
                            $timestamp = $timestamp.' Days Ago';
                          }else{
                            $timestamp = 'Today';
                          }
                      @endphp

                      <x-announcement :url="$anno->id" :img="$anno->preview_image" :event="$anno->title" :timestamp="$timestamp" />

                      @endforeach

                    @foreach ($old_anno as $anno)

                        @php

                        $timestamp = $anno->created_at->diffInDays(Carbon::now());
                        if($timestamp > 0){
                            $timestamp = $timestamp.' Days Ago';
                        }else{
                            $timestamp = 'Today';
                        }
                    @endphp

                        <x-announcement :url="$anno->id" :img="$anno->preview_image" :event="$anno->title" :timestamp="$timestamp" />

                    @endforeach

                    @if(count($new_announcements) == 0 && count($old_anno) == 0)
                        <div class="d-flex justify-content-center align-items-center my-auto">
                        <div class="text-xl head-font" style="color:var(--gray8);font-weight:var(--font-medium)">No New Releases Found</div>
                        </div>
                    @endif

                    <!-- Announcements Panel: End -->
              </div>
            </div>
          </div>

          <div class="d-none d-md-block position-relative la-header__menu-item">
            <a href="mailto:lila@learnitlikealiens.com" title="lila@learnitlikealiens.com"><span class="la-icon la-icon--xl icon-mail-id"></span></a>
          </div>

          <div class="d-none d-md-block position-relative la-header__menu-item">
            <a href="tel:+91 9833442708" title="+91 9833442708"><span class="la-icon la-icon--lg icon-contact-number"></span></a>
          </div>

          <div class="d-none d-lg-inline-block la-header__menu-item">
            <a class="la-header__menu-link la-header__menu-icon icon-hamburger-menu font-weight-normal" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
            <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" style="border:none;">
              @if(Auth::check() && Auth::user()->role !='mentor')<a class="dropdown-item la-header__dropdown-item text-sm @if(Request::segment(1) == 'become-mentor') active @endif" href="/become-mentor">Become a Mentor</a>@endif
              <a class="dropdown-item la-header__dropdown-item text-sm @if(Request::segment(1) == 'guided-mentor') active @endif" href="/guided-mentor">Guided Mentor</a>
              <a class="dropdown-item la-header__dropdown-item text-sm @if(Request::segment(1) == 'about') active @endif" href="/about">About Us</a>
              <a class="dropdown-item la-header__dropdown-item text-sm @if(Request::segment(1) == 'contact') active @endif" href="/contact">Contact Us</a>
            </div>
          </div> --}}

          <div class="d-lg-none position-relative la-header__menu-item la-header__sidemenu-btn">
            <span class="la-icon la-icon--xl icon-hamburger-menu"></span>
          </div>

        </div>

      </div>

    </div>
  </header>
@endif
  <!-- Header: End-->
