@extends('learners.layouts.app')

@section('content')
 <!-- Main Section: Start-->
 <section class="la-cbg--main">
    <!-- Section: Start-->
    <section class="la-new--releases">
      <div class="container la-new__events ">
        <div class="row">
          <div class="col-12">
            <div class="la-announcement__main-title">
                <a class="la-new__back la-icon la-icon--5xl icon-back-arrow  mb-2" href="{{URL::previous()}}"></a>
                <h1 class="head-font text-3xl text-md-4xl">New Releases</h1>
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
            <div class="la-new__announcements">
                @php
                  $app1 = new stdClass;
                  $app1->title = "New app released for better learning";
                  $app1->timestamp = "2h ago";
                  $app1->appId = "1";
                  $app1->desc = "Lorem Ipsum dolor sit amet, consectur sadispicing elitr, sed diam nounumy eirmod tempor";
                
                  $apps = array($app1);
                @endphp          
            
                @foreach ($apps as $app)
                    <x-app-update
                        :title="$app->title"
                        :timestamp="$app->timestamp"
                        :appId="1"
                        :desc="$app->desc"
                    />
                @endforeach                 
            </div>
          </div>


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
          </div>
        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
@endsection