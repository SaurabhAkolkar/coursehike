@extends('learners.layouts.app')

@section('seo_content')
    <title> New Releases </title>
@endsection

@section('content')
 <!-- Main Section: Start-->
 <section class="la-section__small la-cbg--main">
    <!-- Section: Start-->
    <section class="la-new--releases">
      <div class="container la-new__events ">
        <div class="row la-anim__wrap">
          <div class="col-12">
            <div class="la-announcement__main-title d-md-flex ">
                <a class="la-new__back la-icon la-icon--5xl icon-back-arrow ml-n2 ml-md-n5 mt-n1 pr-md-3 la-anim__stagger-item--x" href="{{URL::previous()}}"></a>
                <h1 class="text-3xl text-md-4xl mb-4 la-anim__stagger-item">New Releases</h1>
            </div>
          </div>

          <div class="col-12">
            <div class="la-new__announcements">
                @php
                    $update1 = new stdClass;
                    $update1->img = "https://picsum.photos/350/300";
                    $update1->title = "Four new badges for learners!";
                    $update1->timestamp = "Just now";
                    $update1->updateId = "1";
                    $update1->desc = "Lorem Ipsum dolor sit amet, consectur sadispicing elitr,";
        
                    $updates = array($update1);

                @endphp          
                
                @foreach ($allReleases as $ar)
                  @if($ar->layout == 1)
                        <x-new-update
                              :img="asset('images/announcement/'.$ar->preview_image)"
                              :title="$ar->title"
                              :timestamp="$ar->created_at"
                              :updateId="1"
                              :desc="$ar->short_description.' '.$ar->long_description"
                          />
                  @elseif($ar->layout == 2)
                          <x-app-update
                                :title="$ar->title"
                                :timestamp="$ar->created_at"
                                :appId="1"
                                :desc="$ar->short_description.' '.$ar->long_description"
                            />

                  @else
                        <x-new-event
                            :title="$ar->title"
                            :timestamp="$ar->created_at"
                            :about="$ar->short_description"
                            :img="asset('images/announcement/'.$ar->preview_image)"
                            :eventId="1"
                            :desc="$ar->long_description"
                          />
                  @endif
                    
                @endforeach
            </div>
          </div>


          <div class="col-12">
            
            <div class="col-12 px-0 my-auto la-anim__wrap">
              <div class="la-empty__inner py-10">
                <h6 class="la-empty__course-title text-center text-2xl text-md-3xl la-anim__stagger-item" style="color:var(--gray8);">
                    No new Releases yet.
                </h6>
              </div>
            </div>

           
          </div>
<!-- 

          <div class="col-12">
            <div class="la-new__meet-events">
                 @php
                    $event1 = new stdClass;
                    $event1->title = "Meet the mentors";
                    $event1->timestamp = "4h ago";
                    $event1->about = "Lorem Ipsum dolor sit amet, conseturur sadispicing elitr, sed diam nounmy erimod tempor";
                    $event1->img = "https://picsum.photos/850/250";
                    $event1->eventId = "1";
                    $event1->desc = "Lorem Ipsum dolor sit amet, conseturur sadispicing elitr, sed diam nounmy erimod tempor";
    
                    $events = array($event1);
                 @endphp                   

                 @foreach ($events as $event)
                    <x-new-event
                      :title="$event->title"
                      :timestamp="$event->timestamp"
                      :about="$event->about"
                      :img="$event->img"
                      :eventId="$event->eventId"
                      :desc="$event->desc"
                    />
                 @endforeach
            </div>
          </div> -->
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
@endsection