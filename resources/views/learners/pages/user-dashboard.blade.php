@extends('learners.layouts.app')

@section('content')
<!-- Main Section: Start-->
<section class="la-cdashboard-main">
    <!-- Section: Start-->
    <section class="la-cdashboard py-5">
      <div class="la-cdashboard__inner pt-5">
        <div class="container pt-0 pt-sm-3">
          <div class="row d-flex flex-row justify-content-between">
            <div class="col-12 col-md-6 col-lg-4 la-anim__wrap">
              <div class="la-cdashboard__page">
                <h1 class="la-cdashboard__user-name text-3xl text-md-4xl text-capitalize">Welcome <span style="color:var(--app-indigo-1);">{{Auth::user()->fname}}!</span></h1>
                <p class="text-md">Share your knowledge, Be the change.<br/> The kind that enables everyone to reach their full potential & more!</p>
              </div>
            </div>
            <div class="col-12 col-md-5 offset-md-1 col-lg-4 offset-lg-4 px-0">
              <!-- <div class="la-cbadges__item pb-5 mb-5">
                <div class="row no-gutters px-2 px-sm-0 py-5 py-sm-2">
                  <div class="col d-flex flex-row justify-content-start justify-content-lg-center">
                    <div class="la-cbadge la-anim__wrap position-relative">
                        <div class="la-cbadge__thumbnail la-anim__stagger-item" data-toggle="popover" data-trigger="hover" data-placement="bottom" title= "EXCLUSIVITY" data-content="A Badge you earn when you finish an exclusive course." > 
                            <span class="la-icon la-icon--6xl icon-badge-purple">
                              <span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span>
                            </span>
                            <sup class="badge la-badge__count py-1 la-anim__fade-in-top la-anim__D">5</sup>
                        </div>
                    </div>
                  </div>
                  <div class="col d-flex flex-row justify-content-start justify-content-lg-center">
                    <div class="la-cbadge la-anim__wrap">
                        <div class="la-cbadge__thumbnail la-anim__stagger-item" data-toggle="popover" data-trigger="hover" data-placement="bottom" title= "SINCERE LEARNER" data-content="A Badge you earn when learn consistently." > 
                          <span class="la-icon la-icon--6xl icon-badge-green">
                            <span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span>
                          </span>   
                          <sup class="badge la-badge__count py-1 la-anim__fade-in-top la-anim__D">3</sup>
                        </div>
                    </div>
                  </div>
                  <div class="col d-flex flex-row justify-content-start justify-content-lg-center">
                    <div class="la-cbadge la-anim__wrap ">
                        <div class="la-cbadge__thumbnail la-anim__stagger-item" data-toggle="popover" data-trigger="hover" data-placement="bottom" title= "FAST LEARNER" data-content="A Badge you earn when learn at a fast pace." > 
                          <span class="la-icon la-icon--6xl icon-badge-yellow">
                            <span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span>
                          </span>
                              <sup class="badge la-badge__count py-1 la-anim__fade-in-top la-anim__D">8</sup>
                        </div>
                    </div>
                  </div>
                  <div class="col d-flex flex-row justify-content-start justify-content-lg-center">
                    <div class="la-cbadge la-anim__wrap ">
                        <div class="la-cbadge__thumbnail la-anim__stagger-item" data-toggle="popover" data-trigger="hover" data-placement="bottom" title= "MENTOR'S FAVOURITE" data-content="A Badge gifted by your mentor when you finish assignments well." > 
                          <span class="la-icon la-icon--6xl icon-badge-red">
                            <span class="path1"><span class="path2"><span class="path3"><span class="path4"><span class="path5"></span></span></span></span></span>
                          </span>   <sup class="badge la-badge__count py-1 la-anim__fade-in-top la-anim__D">1</sup>
                        </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
          
          <div class="row la-lastview-card">
            <div class="col-12 col-md-6 col-lg-4 d-flex flex-column justify-content-end">
              <div class="la-anim__wrap">
                <h5 class="la-course__tile-title text-xl mb-4 la-anim__stagger-item">Last Viewed</h5>
              </div>
              <div class="la-course__tile-card d-block">
                <div class="row no-gutters">
                  <div class="col la-anim__wrap">
                      @php
                          $tile = new stdClass;
                          $tile->img = "./images/learners/dashboard/card-tile.png";
                          $tile->progress = 37;
                          $tile->desc = "At verso eos";
                          $tile->name = "Amy D'souza";
                          $tile->rating= 4;

                          $tiles = array($tile);
                      @endphp
                      
                      @if($lastViewed != null)
                        <x-last-viewed
                            :img="$lastViewed->course->preview_image"
                            :progress="'30'"
                            :desc="$lastViewed->course->title"
                            :name="$lastViewed->course->user->fullName"
                            :rating="$lastViewed->course->average_rating"
                        />
                      @else

                      <div class="la-empty__courses text-center">
                          <div class="la-empty__inner la-anim__stagger-item">
                              <p class="la-empty__course-desc m-0">You don't have any last viewed course.</p>
                          </div>
                      </div>
                      
                      @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col"></div>
            <div class="col-12 col-md-5 col-lg-4">
              <div class="la-course__alien-ad">
                <div class="card la-course__ad-card la-anim__wrap">
                  <div class="card-body la-course__ad-body my-0 position-relative">
                    <p class="la-course__ad-tag text-sm  la-anim__stagger-item">Got something different? <br/> Let’s share it with the world!</p>
                    <h2 class="la-course__ad-title text-4xl la-anim__stagger-item--x">become an <br><span>Alien Mentor, today!</span></h2>
                  
                    <div class="la-course__ad-learnmore text-right mr-md-n4 la-anim__stagger-item--x">
                      <a class="la-course__ad-learn text-uppercase " href="/become-creator">Learn More
                        <span class="la-icon la-icon--5xl icon-black-arrow "></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->
    <section class="la-empty">
      <div class="container">
        <div class="row la-anim__wrap">  
          <div class="col-12 text-center la-anim__stagger-item">
            <h1 class="text-light"  style="width:100%;height:248px;background:#eee;margin:80px 0">1080 x 248   </h1>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->
    <section class="la-pcourses-section">
      <div class="container">
        <div class="row">  
          <div class="col-12 la-anim__wrap">
            <h5 class="la-pcourses__title  text-2xl text-md-3xl la-anim__stagger-item">Pending Courses</h5>
            
            <div class="la-empty__courses d-md-flex justify-content-between align-items-start">
                <div class="la-empty__inner la-anim__stagger-item">
                    <h6 class="la-empty__course-title pb-2">No Courses</h6>
                    <p class="la-empty__course-desc m-0">You currently don't have any pending course, start new course</p>
                </div>
                <div class="la-empty__browse-courses la-anim__stagger-item--x">
                    <a href="/browse/courses" class="la-empty__browse">
                        Browse Courses
                        <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                    </a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->

    <section class="la-hp-section py-md-5 my-md-5">
      <div class="container px-5 px-sm-0">
        <div class="row">
          <div class="col-12 px-2">
            <div class="la-hp__inner la-anim__wrap">
              <h5 class="text-2xl text-md-3xl la-hp__title m-0 pb-4 la-anim__stagger-item">Hand Picked for you! </h5>
              <div class="la-hp__data">
                <div class="row">
                    <!-- Hand Picked: Start -->
                    @foreach ($courses as $c)
                        <x-handpicked :hpImg="$c->preview_image" :hpCourse="$c->title" :hpCname="$c->user->fullName" :hpUrl="'/learn/course/'.$c->id.'/'.$c->slug" />
                    @endforeach
                    <!-- Hand Picked: End -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->

    <!-- Section: Start-->
      @php  
          $users = $courses->groupBy('user_id');
         
     @endphp
    <section class="la-section__small">
      <div class="la-section__inner">
        <div class="container">
            <div class="row ">
              <div class="col-12 la-anim__wrap">
                <h5 class="text-2xl text-md-3xl pb-5 la-anim__stagger-item px-0">Alien Mentors</h5>
              </div>
            </div>
          
            <div class="row">
              <div class="col-12 la-mentors">
                  <div class="row ">
                    @foreach($users as $u)
                      <div class="col-lg-4 la-mentor la-anim__wrap ">
                        <div class="la-mentor__profile la-anim__stagger-item">
                            <img class="img-fluid" src="{{asset('images/user_img/'.$u[0]->user->user_img)}}" alt="{{$u[0]->user->fullName}}">
                        </div>
                        <div class="la-mentor__btm d-flex justify-content-between align-items-center">
                          <div class="la-mentor__info la-anim__stagger-item la-anim__B">
                            <h3 class="la-mentor__name">{{$u[0]->user->fullName}}</h3>
                            <p class="la-mentor__skill">{{$u[0]->category->title}}</p>
                          </div>
                          <a class="la-mentor__detailview la-anim__stagger-item--x la-anim__D" href="/creator/{{1}}">
                            <span class="la-icon la-icon--6xl icon-grey-arrow mt-n2"></span>
                          </a>
                        </div>
                      </div>                
                    @endforeach
                  </div>
              </div> 
          </div>            
        </div>
    </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->
    <section class="la-empty">
      <div class="container">
        <div class="row la-anim__wrap">  
          <div class="col-12 text-center la-anim__stagger-item" style="width:100%;height:132px;background:#eee;margin:80px 0">
            <h1 class="text-light">1080 x 132</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
  @endsection