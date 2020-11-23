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
                    @foreach ($playlists as $item)
                      
                        <x-playlist-item
                           
                            :courseName="$item->name"
                            :classesCount="$item->count"
                            :id="$item->id"
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
                            <form action="{{route('create.playlist')}}" method="post" id="create_playlist_form" name="create_playlist_form">
                              @csrf
                              <div class="la-playlist__modal-create">
                                  <label class="la-playlist__modal-name" for="playlist_name">Playlist Name</label><br/>
                                  <input type="text" class="la-playlist__modal-inputtype w-100" name="playlist_name" id="playlist_name" placeholder="Create New Playlist" value ="{{ old('playlist_name') }}"/>
                                  @if(session('playlist_exists'))
                                  <div class="alert alert-danger">{{ session('playlist_exists') }}</div>
                                  @endif
                              </div>
                              
                              <div class="la-playlist__modal-update text-center">
                                <a onclick = "$('#create_playlist_form').submit();" role="button" class="la-playlist__modal-btn">Create Playlist</a>
                              </div>
                            </form>
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


@section('footerScripts')
<script>
 
@if(session('playlist_exists'))
  $('#create_playlist').modal('show');
@endif

  $("form[name='create_playlist_form']").validate({
      
      rules: {

        playlist_name: {
          required: true,
          minlength: 3
        }
      },
      // Specify validation error messages
      messages: {
        playlist_name: {
          required: "Please provide a Playlist Name.",
          minlength: "Playlist Name must be minimum 3 characters."
        }
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
      
    });



  </script>
@endsection
