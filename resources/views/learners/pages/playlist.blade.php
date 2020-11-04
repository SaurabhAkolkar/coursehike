@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">

       <!-- Side Navbar: Start -->
       @include ('learners.pages.sidebar')
       <!-- Side Navbar: End -->

      
      <div class="la-profile__main">
        <div class="container">
          <div class="la-profile__main-inner">
            <div class="la-profile__title-wrap">
              <h1 class="la-profile__title">My Playlist</h1>
            </div>
            <section class="la-section la-playlist__sec pt-0">
              <div class="la-playlist__wrap">

              @php
                      $playlistItem1 = new stdClass;
                      $playlistItem1->courseName = "Photography";
                      $playlistItem1->classesCount = "2";
                      

                      $playlistItem2 = new stdClass;
                      $playlistItem2->courseName = "Dance";
                      $playlistItem2->classesCount = "5";
                     

                      $playlist = array($playlistItem1, $playlistItem2);
                  @endphp

                <div class="row la-playlist__items">
                    @foreach ($playlist as $item)
                        <x-playlist-item
                            :courseName="$item->courseName"
                            :classesCount="$item->classesCount"
                        />
                    @endforeach
                    <div class="col-md-3">
                        <a class="la-btn__add d-flex justify-content-center align-items-center" href="/courses">
                        <span class="la-btn__add-icon">+</span>
                        </a>
                    </div>
                    
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection