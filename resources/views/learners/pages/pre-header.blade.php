
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
      <div class="la-header__rht ml-auto">
        <div class="la-header__menu d-inline-flex align-items-center">

         {{-- @php
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
                    @foreach ($news as $new)
                      <x-announcement :url="$new->url" :img="$new->img" :event="$new->event" :timestamp="$new->timestamp" />
                    @endforeach          
                    <!-- Announcements Panel: End -->          
              </div>
            </div>
          </div> --}}

          <div class="la-header__menu-item"><a class="la-header__menu-link la-header__menu-icon la-icon icon-menu" id="moreItems" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
            <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="moreItems" style="border:none;">
              <a class="dropdown-item la-header__dropdown-item text-sm" href="/become-creator">Become a Creator</a>
              <a class="dropdown-item la-header__dropdown-item text-sm" href="/guided-creator">Guided Creator</a>
              <a class="dropdown-item la-header__dropdown-item text-sm" href="/contact">Contact Us</a></div>
          </div>
        </div>
      </div>
      </div>
  </header>
  <!-- Header: End-->
