@extends('learners.layouts.app')

@section('content')
<!-- Main Section: Start-->
<section class="la-cdashboard-main">
    <!-- Section: Start-->
    <section class="la-cdashboard py-5">
      <div class="la-cdashboard__inner pt-5">
        <div class="container pt-0 pt-sm-3">
          <div class="row d-flex flex-row justify-content-between">
            <div class="col-12 col-md-6">
              <div class="la-cdashboard__page">
                <h1 class="text-3xl">Welcome <span>Nathan!</span></h1>
                <p class="text-sm">Let's explore something extraordinary <br>and learn it like aliens.</p>
              </div>
            </div>
            <div class="col"></div>

            @php
                $badge1= new stdClass;
                $badge1->title = "EXCLUSIVITY";
                $badge1->desc = "A Badge you earn when you finish an exclusive course.";
                $badge1->badgeImg = "https://picsum.photos/40";
                $badge1->count = 5;

                $badge2= new stdClass;
                $badge2->title = "SINCERE LEARNER";
                $badge2->desc = "A Badge you earn when learn consistently.";
                $badge2->badgeImg = "https://picsum.photos/40";
                $badge2->count = 3;
                

                $badge3= new stdClass;
                $badge3->title = "FAST LEARNER";
                $badge3->desc = "A Badge you earn when learn at a fast pace.";
                $badge3->badgeImg = "https://picsum.photos/40";
                $badge3->count = 8;

                $badge4= new stdClass;
                $badge4->title = "MENTOR'S FAVOURITE";
                $badge4->desc = "A Badge gifted by your mentor when you finish assignments well.";
                $badge4->badgeImg = "https://picsum.photos/40";
                $badge4->count = 1;

                $badges = array($badge1, $badge2, $badge3, $badge4);
            @endphp

            <div class="col-12 col-md-5 col-lg-4 px-0">
              <div class="la-cbadges__item pb-5 mb-5">
                <div class="row no-gutters px-2 px-sm-0 py-5 py-sm-2">
                   
                    <!-- User Badges: Start -->
                    @foreach($badges as $badge)
                      <x-badge :title="$badge->title" :desc="$badge->desc" :badgeImg="$badge->badgeImg" :count="$badge->count" />
                    @endforeach
                    <!-- User Badges: End -->

                </div>
              </div>
            </div>
          </div>
          
          <div class="row la-lastview-card">
            <div class="col-12 col-md-6 col-lg-4 d-flex flex-column justify-content-end">
              <div class="la-course__tile-title">
                <h5 class="text-xl font-weight-bold mb-4">Last Viewed</h5>
              </div>
              <div class="la-course__tile-card d-block">
                <div class="row no-gutters">
                  <div class="col">
                      @php
                          $tile = new stdClass;
                          $tile->img = "https://picsum.photos/100";
                          $tile->progress = 37;
                          $tile->desc = "At verso eos";
                          $tile->name = "Amy D'souza";
                          $tile->rating= 4;

                          $tiles = array($tile);
                      @endphp

                      <x-last-viewed
                          :img="$tile->img"
                          :progress="$tile->progress"
                          :desc="$tile->desc"
                          :name="$tile->name"
                          :rating="$tile->rating"
                      />
                  </div>
                </div>
              </div>
            </div>
            <div class="col"></div>
            <div class="col-12 col-md-5 col-lg-4">
              <div class="la-course__alien-ad">
                <div class="card la-course__ad-card p-2">
                  <div class="card-body la-course__ad-card_body position-relative">
                    <p class="text-sm text-white">Got something different then<br>share it with the world.</p>
                    <h2 class="text-3xl text-white">become an <br><span>Alien mentor</span></h2>
                  </div>
                  <div class="la-course__ad-learn-more pt-8 pb-4 d-flex justify-content-end"><a class="text-uppercase" href="#">Learn More<span><img class="img-fluid" src="./images/icons/long-arrow-dark.svg" alt="Learn More"></span></a></div>
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
        <div class="row" style="width:100%;height:248px;background:#eee;margin:80px 0">  
          <div class="col-12 text-center">
            <h1 class="text-light">1080 x 248   </h1>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->
    <section class="la-pcourses-section">
      <div class="container">
        <div class="row">  
          <div class="col-12">
            <div class="la-cpcourses__inner">
              <h5 class="text-xl">Pending Courses</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
    <!-- Section: Start-->

    @php
        $hp1 = new stdClass;
        $hp1->hpImg = "https://picsum.photos/400";
        $hp1->hpCourse = "Digital Art";
        $hp1->hpCname = "Lillan";
        $hp1->hpUrl = "";

        $hp2 = new stdClass;
        $hp2->hpImg = "https://picsum.photos/400";
        $hp2->hpCourse = "UI Design";
        $hp2->hpCname = "Dartin";
        $hp2->hpUrl = "";

        $hp3 = new stdClass;
        $hp3->hpImg = "https://picsum.photos/400";
        $hp3->hpCourse = "Line Art";
        $hp3->hpCname = "Nathan Frank";
        $hp3->hpUrl = "";

        $hp4 = new stdClass;
        $hp4->hpImg = "https://picsum.photos/400";
        $hp4->hpCourse = "Digital Art";
        $hp4->hpCname = "Lillan";
        $hp4->hpUrl = "";

        $hps = array($hp1, $hp2, $hp3, $hp4);
    @endphp

    <section class="la-hp-section py-5 my-5">
      <div class="container px-5 px-sm-0">
        <div class="row">
          <div class="col-12 px-2">
            <div class="la-hp__inner">
              <h5 class="text-xl la-hp__title m-0 pb-2">Hand Picked for you! </h5>
              <div class="la-hp__data">
                <div class="row">
                    <!-- Hand Picked: Start -->
                    @foreach ($hps as $hp)
                        <x-handpicked :hpImg="$hp->hpImg" :hpCourse="$hp->hpCourse" :hpCname="$hp->hpCname" :hpUrl="$hp->hpUrl" />
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
        $mentor1 = new stdClass;$mentor1->name="Alton Crew";$mentor1->img="https://picsum.photos/400";$mentor1->skill="Photography";
        $mentor2 = new stdClass; $mentor2->name="Alton"; $mentor2->img="https://picsum.photos/400"; $mentor2->skill="Design";
        $mentor3 = new stdClass;$mentor3->name="Amy D'souza";$mentor3->img="https://picsum.photos/400";$mentor3->skill="Tattoo";
      
        $mentors = array($mentor1, $mentor2, $mentor3);
     @endphp
    <section class="la-section">
      <div class="la-section__inner">
        <div class="container">
            <div class="row no-gutters">
              <div class="col-12">
                <h5 class="text-xl pb-5">Alien Mentors</h5>
              </div>
          
              <div class="la-mentors">
                <div class="row">

                    @foreach($mentors as $mentor)
                        <x-mentor :img="$mentor->img" :name="$mentor->name" :skill="$mentor->skill" />
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
        <div class="row">  
          <div class="col-12 text-center" style="width:100%;height:132px;background:#eee;margin:80px 0">
            <h1 class="text-light">1080 x 132</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
  @endsection