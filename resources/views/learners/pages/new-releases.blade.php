@extends('learners.layouts.app')

@section('content')
 <!-- Main Section: Start-->
 <section class="la-cbg--main">
    <!-- Section: Start-->
    <section class="la-new--releases">
      <div class="container la-new__events p-0">
        <div class="row">
          <div class="col-12">
            <div class="la-new__announcements"><a class="la-new__back text-4xl font-normal" href="#"></a>
              <h1 class="head-font text-2xl text-sm-4xl">New Releases</h1>
                                    <li class="la-news__item"> 
                                      <div class="la-news__wrapper d-flex flex-column flex-lg-row justify-content-between">
                                        <div class="la-news__eimg"><img class="d-block" src="../images/creator/banner.jpg" alt="Four new badges for learners!"></div>
                                        <div class="la-news__etitle">
                                          <h6 class="text-lg text-sm-2xl head-font m-0">Four new badges for learners!</h6><span class="la-news__timestamp text-xs">Just now</span>
                                          <p class="la-news__content text-md text-sm-sm">Lorem Ipsum dolor sit amet, consectur sadispicing elitr, <span>Lorem Ipsum dolor sit amet, consectur sadispicing elitr, </span><span>Lorem Ipsum dolor sit amet, consectur sadispicing elitr, </span><span>Lorem Ipsum dolor sit amet, consectur sadispicing elitr, </span><span>Lorem Ipsum dolor sit amet, consectur sadispicing elitr, </span><br><br><span>Lorem Ipsum dolor sit amet, consectur sadispicing elitr, </span><span>Lorem Ipsum dolor sit amet, consectur sadispicing elitr, </span><span class="collapse" id="moreContent">Lorem Ipsum dolor sit amet, consectur sadispicing elitr, </span></p><a class="la-news__readmore text-center text-sm-right" role="button" href="#moreContent" data-toggle="collapse" aria-expanded="true">Read More</a>
                                        </div>
                                      </div>
                                    </li>
            </div>
          </div>
          <div class="col-12">
            <div class="la-new__announcements">
                                    <li class="la-news__app-item">
                                      <h6 class="la-news__app-title head-font text-lg text-sm-2xl m-0">New app released for better learning</h6>
                                      <p class="text-xs la-news__app-timestamp">2h ago</p>
                                      <div class="la-news__app-content text-md text-sm-sm">Lorem Ipsum dolor sit amet, consecuring sadispicing elitr, sed diam nounumy eirmod tempor <span>Lorem Ipsum dolor sit amet, consecuring sadispicing elitr, sed diam nounumy eirmod tempor </span><span>Lorem Ipsum dolor sit amet, consecuring sadispicing elitr, sed diam nounumy eirmod tempor </span><span class="collapse" id="exploreMore">Lorem Ipsum dolor sit amet, consecuring sadispicing elitr, sed diam nounumy eirmod tempor </span></div><a class="la-news__readmore text-center text-sm-right mt-3" role="button" href="#exploreMore" data-toggle="collapse" aria-expanded="true">Explore More</a>
                                    </li>
            </div>
          </div>
          <div class="col-12">
            <div class="la-new__meet-events">
                                    <li class="la-news__meet-item">
                                      <h6 class="la-news__meet-title head-font text-lg text-sm-2xl m-0">Meet the mentors</h6>
                                      <p class="text-xs la-news__meet-timestamp">4h ago</p>
                                      <div class="la-news__meet-content">
                                        <p class="text-md text-sm-sm">Lorem Ipsum dolor sit amet, conseturur sadispicing elitr, sed diam nounmy erimod tempor </p>
                                        <div class="la-news__meet-banner"><img class="d-block" src="./images/creator/banner.jpg" alt="Meet the mentors"></div>
                                        <p class="text-md text-sm-sm my-3 collapse" id="seeEvent">Lorem Ipsum dolor sit amet, conseturur sadispicing elitr, sed diam nounmy erimod tempor </p>
                                      </div><a class="la-news__readmore text-center text-sm-right mt-3" role="button" href="#seeEvent" data-toggle="collapse" aria-expanded="true">See Event</a>
                                    </li>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
@endsection