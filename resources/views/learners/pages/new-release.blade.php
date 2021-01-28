@extends('learners.layouts.app')

@section('content')
 <!-- Main Section: Start-->
 <section class="la-cbg--main">
    <!-- Section: Start-->
    <section class="la-new--releases">
      <div class="container la-new__events ">
        <div class="row">
          <div class="col-12">
            <div class="la-announcement__main-title  la-anim__wrap">
                <a class="la-new__back la-icon la-icon--5xl icon-back-arrow  la-anim__stagger-item" href="{{URL::previous()}}"></a>
                <h1 class="head-font text-3xl text-md-4xl la-anim__fade-in-top">New Releases</h1>
            </div>
          </div>

          <div class="col-12">
            <div class="la-new__announcements">       
                
                  @if($release->layout == 1)
                        <x-new-update
                              :img="asset('images/announcement/'.$release->preview_image)"
                              :title="$release->title"
                              :timestamp="$release->created_at"
                              :desc="$release->short_description.' '.$release->long_description"
                          />
                  @elseif($release->layout == 2)
                          <x-app-update
                                :title="$release->title"
                                :timestamp="$release->created_at"
                                :desc="$release->short_description.' '.$release->long_description"
                            />

                  @else
                        <x-new-event
                            :title="$release->title"
                            :timestamp="$release->created_at"
                            :about="$release->short_description"
                            :img="asset('images/announcement/'.$release->preview_image)"
                            :desc="$release->long_description"
                          />
                  @endif
                    
            </div>
          </div>


        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
@endsection