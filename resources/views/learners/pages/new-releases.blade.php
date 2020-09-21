@extends('learners.layouts.app')

@section('content')
 <!-- Main Section: Start-->
 <section class="la-cbg--main">
    <!-- Section: Start-->
    <section class="la-new--releases">
      <div class="container la-new__events p-0">
        <div class="row">
          <div class="col-12">
            <div class="la-new__announcements">
                <a class="la-new__back text-4xl font-normal" href="#"></a>
                <h1 class="head-font text-2xl text-sm-4xl">New Releases</h1>
            </div>
          </div>

          <div class="col-12">
            <div class="la-new__announcements">
                @php
                    $update1 = new stdClass;
                    $update1->img = "https://picsum.photos/350/300";
                    $update1->title = "Four new badges for learners!";
                    $update1->timestamp = "Just now";
                    $update1->desc = "Lorem Ipsum dolor sit amet, consectur sadispicing elitr,";
                    $update1->collapseId = 1;

                    $updates = array($update1);
                @endphp          
                
                @foreach ($updates as $update)
                    <x-new-update
                        :img="$update->img"
                        :title="$update->title"
                        :timestamp="$update->timestamp"
                        :desc="$update->desc"
                        :collapseId="$update->collapseId"
                    />
                @endforeach
            </div>
          </div>


          <div class="col-12">
            <div class="la-new__announcements">
                @php
                  $app1 = new stdClass;
                  $app1->title = "New app released for better learning";
                  $app1->timestamp = "2h ago";
                  $app1->desc = "Lorem Ipsum dolor sit amet, consectur sadispicing elitr, sed diam nounumy eirmod tempor";
                  $app1->appCollapseId = 2;

                  $apps = array($app1);
                @endphp          
            
                @foreach ($apps as $app)
                    <x-app-update
                        :title="$app->title"
                        :timestamp="$app->timestamp"
                        :desc="$app->desc"
                        :appCollapseId="$app->appCollapseId"
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
                    $event1->desc = "Lorem Ipsum dolor sit amet, conseturur sadispicing elitr, sed diam nounmy erimod tempor";
                    $event1->eventCollapseId = 3;

                    $events = array($event1);
                 @endphp                   

                 @foreach ($events as $event)
                    <x-new-event
                      :title="$event->title"
                      :timestamp="$event->timestamp"
                      :about="$event->about"
                      :img="$event->img"
                      :desc="$event->desc"
                      :eventCollapseId="$event->eventCollapseId"
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