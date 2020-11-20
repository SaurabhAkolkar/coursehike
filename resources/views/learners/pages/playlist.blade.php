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
                        <a class="la-btn__add d-flex justify-content-center align-items-center"  data-toggle="modal" data-target="#create_playlist" >
                          <span class="la-btn__add-icon">+</span>
                        </a>
                    </div>

                    <!-- Create Playlist Popup: Start -->
                    <div class="modal fade la-playlist__modal" id="create_playlist">
                      <div class="modal-dialog la-playlist__modal-dialog">
                        <div class="modal-content la-playlist__modal-content">
                        
                          <div class="modal-header la-playlist__modal-header">
                            <h4 class="modal-title la-playlist__modal-title">Create New Playlist</h4>
                            <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                          </div>
                          
                          <div class="modal-body la-playlist__modal-body">
                              <div class="la-playlist__modal-create">
                                  <label class="la-playlist__modal-name" for="playlist_name">Playlist Name</label><br/>
                                  <input type="text" class="la-playlist__modal-inputtype w-100" name="playlist_name" id="playlist_name" placeholder="Create New Playlist" />
                              </div>

                              <div class="la-playlist__modal-update text-center">
                                <a href="" role="button" class="la-playlist__modal-btn">Create Playlist</a>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <!-- Create Playlist Popup: End -->
                    
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection