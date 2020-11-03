@if (Auth::check())
  <!-- Header: Start-->
  <header class="la-header">
      <div class="la-header__inner px-5 py-3 d-flex align-items-center">
        <div class="la-header__lft d-inline-flex align-items-center">
          <a class="la-header__brandwrap" href="/">
            <img class="la-header__brand" src="/images/learners/logo.svg" alt="Lila">
          </a>
          <div class="la-header__nav d-inline-flex  align-items-center">
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/user-dashboard">Dashboard</a></div>
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/browse/courses">Browse Courses</a></div>
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/my-courses">My Courses</a></div>
            <div class="la-header__nav-item"><a class="la-header__nav-link" href="/mentors">Mentors</a></div>
            
          </div>
        </div>
        
        <div class="la-header__rht ml-auto">
          <div class="la-header__menu d-inline-flex align-items-center">
            <div class="la-header__menu-item">
              <!-- Global Search: Start-->
              <div class="la-gsearch  mb-0">
                <form class="form-inline" action="">
                  <div class="form-group">
                    <input class="la-gsearch__input form-control text-md pr-0" type="text" style="width:140px;" placeholder="Search Courses...">
                  </div>
                  <button class="la-gsearch__submit btn pr-0" type="submit"><i class="la-icon la-icon--xl icon icon-search"></i></button>
                </form>
              </div>
              <!-- Global Search: End-->
            </div>
            <div class="la-header__menu-item">
              <a class="la-header__menu-link la-header__menu-icon la-icon icon-profile" href="/profile"></a>
            </div>
            
            <div class="la-header__menu-item dropdown"><a class="la-header__menu-link la-header__menu-icon dropdown-toggle la-icon icon-notification" id="notificationPanel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
              <div class="dropdown-menu dropdown-menu-right bg-transparent" aria-labelledby="notificationPanel" style="border:none !important;">
                <div class="card la-notification__card">
                    <!-- Notification Panel: Start -->
                    @php
                        $msg1 = new stdClass;
                        $msg1->url = "";
                        $msg1->img = "https://picsum.photos/50";
                        $msg1->name = "Lillan";
                        $msg1->comment = "added new Course in Design";
                        $msg1->timestamp = "Just now";

                        $msg2 = new stdClass;
                        $msg2->url = "";
                        $msg2->img = "https://picsum.photos/50";
                        $msg2->name = "Alton";
                        $msg2->comment = "likes your comment";
                        $msg2->timestamp = "2h";

                        $msg3 = new stdClass;
                        $msg3->url = "";
                        $msg3->img = "https://picsum.photos/50";
                        $msg3->name = "Joseph";
                        $msg3->comment = "added new Course in Design";
                        $msg3->timestamp = "3h";

                        $msg4 = new stdClass;
                        $msg4->url = "";
                        $msg4->img = "https://picsum.photos/50";
                        $msg4->name = "Dartin";
                        $msg4->comment = "likes your comment";
                        $msg4->timestamp = "6h";

                        $msgs = array($msg1, $msg2, $msg3, $msg4);
                    @endphp

                    @foreach ($msgs as $msg)
                        <x-notification :url="$msg->url" :img="$msg->img" :name="$msg->name" :comment="$msg->comment" :timestamp="$msg->timestamp" />
                    @endforeach          
                    <!-- Notification Panel: End -->
                </div>
                <a class="la-notification__clear-all position-fixed" href="#">
                  <div class="text-center">CLEAR ALL</div>
                </a>
              </div>
            </div>
            
            <div class="la-header__menu-item dropdown"><a class="la-header__menu-link la-header__menu-icon dropdown-toggle la-icon icon-announcement" id="announcementPanel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
              <div class="dropdown-menu dropdown-menu-right bg-transparent" aria-labelledby="announcementPanel" style="border:none;">
                <div class="card la-announcement__card">
                  <div class="la-announcement__name d-flex justify-content-between">
                    <h6 class="text-xl body-font">New Releases</h6>
                    <a class="la-announcement__view-more" href="/releases">
                      <span class="la-announcement__view-icon la-icon la-icon--6xl icon-grey-arrow mt-n3"></span>
                    </a>
                  </div>
                      <!-- Announcements Panel: Start -->
                      @php
                          $new1 = new stdClass;
                          $new1->url = "";
                          $new1->img = "https://picsum.photos/50";
                          $new1->event = "Four new badges for learners!";
                          $new1->timestamp = "Just now";

                          $new2 = new stdClass;
                          $new2->url = "";
                          $new2->img = "https://picsum.photos/50";
                          $new2->event = "New app released for better learning";
                          $new2->timestamp = "Just now";

                          $new3 = new stdClass;
                          $new3->url = "";
                          $new3->img = "https://picsum.photos/50";
                          $new3->event = "Meet the mentors at this event";
                          $new3->timestamp = "2h";

                          $new4 = new stdClass;
                          $new4->url = "";
                          $new4->img = "https://picsum.photos/50";
                          $new4->event = "Four new badges for learners!";
                          $new4->timestamp = "2h";

                          $new5 = new stdClass;
                          $new5->url = "";
                          $new5->img = "https://picsum.photos/50";
                          $new5->event = "New app released for better learning";
                          $new5->timestamp = "2h";

                          $new6 = new stdClass;
                          $new6->url = "";
                          $new6->img = "https://picsum.photos/50";
                          $new6->event = "Meet the mentors at this event";
                          $new6->timestamp = "Just now";

                          $news = array($new1, $new2, $new3, $new4, $new5, $new6);
                      @endphp

                      @foreach ($news as $new)
                        <x-announcement :url="$new->url" :img="$new->img" :event="$new->event" :timestamp="$new->timestamp" />
                      @endforeach          
                      <!-- Announcements Panel: End -->          
                </div>
              </div>
            </div>

            <div class="la-header__menu-item"><a class="la-header__menu-link la-header__menu-icon la-icon icon-menu" id="moreItems" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
              <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="moreItems"  style="border:none !important;">
                <a class="dropdown-item la-header__dropdown-item text-sm" href="/learning-plans">Learning Plans</a>
                <a class="dropdown-item la-header__dropdown-item text-sm" href="/become-creator">Become a Creator</a>
                <a class="dropdown-item la-header__dropdown-item text-sm" href="/guided-creator">Guided Creator</a>
                <a class="dropdown-item la-header__dropdown-item text-sm" href="/contact">Contact Us</a></div>
            </div>
          </div>
        </div>
      </div>
  </header>
   <!-- Header: End-->

@else 

  <!-- Header: Start-->
  <header class="la-header">
    <div class="la-header__inner px-5 py-3 d-flex align-items-center">
      <div class="la-header__lft d-inline-flex align-items-center">
        <a class="la-header__brandwrap" href="/">
          <img class="la-header__brand" src="/images/learners/logo.svg" alt="Lila">
        </a>
        <div class="la-header__nav d-inline-flex  align-items-center">
          <div class="la-header__nav-item"><a class="la-header__nav-link" href="/courses">Courses</a></div>
          <div class="la-header__nav-item"><a class="la-header__nav-link" href="/mentors">Mentors</a></div>
          <div class="la-header__nav-item"><a class="la-header__nav-link" href="/learning-plans">Learning Plans</a></div>
        </div>
      </div>

      <div class="la-header__rht ml-auto mr-md-5">
        <div class="la-header__menu d-inline-flex align-items-center">
          <div class="la-header__menu-item"><a class="la-header__nav-link text-sm" href="/login">Login</a></div>
          <div class="la-header__menu-item dropdown">
            <a class="la-header__menu-link la-header__menu-icon dropdown-toggle la-icon icon-announcement" id="announcementPanel" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
            <div class="dropdown-menu dropdown-menu-right bg-transparent" aria-labelledby="announcementPanel" style="border:none !important;">
              <div class="card la-announcement__card">
                <div class="la-announcement__name d-flex justify-content-between">
                  <h6 class="text-xl body-font">New Releases</h6>
                  <a class="la-announcement__view-more" href="/releases">
                    <span class="la-announcement__view-icon la-icon la-icon--6xl icon-grey-arrow mt-n3"></span>
                  </a>
                </div>
                    <!-- Announcements Panel: Start -->
                    @php
                      $new1 = new stdClass;
                      $new1->url = "";
                      $new1->img = "https://picsum.photos/50";
                      $new1->event = "Four new badges for learners!";
                      $new1->timestamp = "Just now";

                      $new2 = new stdClass;
                      $new2->url = "";
                      $new2->img = "https://picsum.photos/50";
                      $new2->event = "New app released for better learning";
                      $new2->timestamp = "Just now";

                      $new3 = new stdClass;
                      $new3->url = "";
                      $new3->img = "https://picsum.photos/50";
                      $new3->event = "Meet the mentors at this event";
                      $new3->timestamp = "2h";

                      $new4 = new stdClass;
                      $new4->url = "";
                      $new4->img = "https://picsum.photos/50";
                      $new4->event = "Four new badges for learners!";
                      $new4->timestamp = "2h";

                      $new5 = new stdClass;
                      $new5->url = "";
                      $new5->img = "https://picsum.photos/50";
                      $new5->event = "New app released for better learning";
                      $new5->timestamp = "2h";

                      $new6 = new stdClass;
                      $new6->url = "";
                      $new6->img = "https://picsum.photos/50";
                      $new6->event = "Meet the mentors at this event";
                      $new6->timestamp = "Just now";

                      $news = array($new1, $new2, $new3, $new4, $new5, $new6);
                    @endphp

                    @foreach ($news as $new)
                      <x-announcement :url="$new->url" :img="$new->img" :event="$new->event" :timestamp="$new->timestamp" />
                    @endforeach          
                    <!-- Announcements Panel: End -->          
              </div>
            </div>
          </div> 

          <div class="la-header__menu-item">
            <a class="la-header__menu-link la-header__menu-icon la-icon icon-menu" id="nav_dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
            <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="nav_dropdown" style="border:none;">
              <a class="dropdown-item la-header__dropdown-item text-sm" href="/become-creator">Become a Creator</a>
              <a class="dropdown-item la-header__dropdown-item text-sm" href="/guided-creator">Guided Creator</a>
              <a class="dropdown-item la-header__dropdown-item text-sm" href="/contact">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
@endif
  <!-- Header: End-->
