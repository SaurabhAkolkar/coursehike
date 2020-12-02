@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">

       <!-- Side Navbar: Start -->
       @include ('learners.pages.sidebar')
       <!-- Side Navbar: End -->

      
      <div class="la-profile__main">
        <div class="container">
        @if(session('message'))
              <div class="la-btn__alert-success col-md-4 offset-md-8  alert alert-success alert-dismissible fade show" role="alert">
                  <h6 class="la-btn__alert-msg">{{session('message')}}</h6>
                  <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
              </div>
          @endif
          <div class="la-profile__main-inner">
            <div class="la-profile__title-wrap">
              <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-6" href="#"></a>
              <h1 class="la-profile__title">My Playlist</h1>
              <!-- Mobile Version Button to Add Playlist -->
              <a class="d-block d-md-none"  data-toggle="modal" data-target="#create_playlist" >
                <div class="la-btn__add-icon ">
                  <span class="la-playlist__mobile text-lg text-uppercase"> 
                    <span class="la-icon la-icon--md icon-plus mr-3"></span>Create Playlist</span>
                </div>
              </a>
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
                    <div class="col-md-3 d-none d-md-block">
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

                  <!-- Edit Playlist Popup: Start -->
                  <div class="modal fade la-playlist__modal" id="edit_playlist">
                    <div class="modal-dialog la-playlist__modal-dialog">
                      <div class="modal-content la-playlist__modal-content">
                      
                        <div class="modal-header la-playlist__modal-header">
                          <h4 class="modal-title la-playlist__modal-title">Edit Playlist</h4>
                          <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                        </div>
                       
                        <div class="modal-body la-playlist__modal-body">
                            <div class="la-playlist__modal-create">
                                <label class="la-playlist__modal-name" for="edit_playlist_name">Playlist Name</label><br/>
                                <input type="text" class="la-playlist__modal-inputtype w-100" name="edit_playlist_name" id="edit_playlist_name" placeholder="Edit Playlist Name" value =""/>
                            </div>
                            
                            <div class="la-playlist__modal-update text-center">
                              <a  role="button" class="la-playlist__modal-btn">Save</a>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>


                <!-- Edit Playlist Popup: End -->
                <!-- Share Playlist Pop UP -->
                    <div class="modal fade la-playlist__modal" id="share_playlist">
                        <div class="modal-dialog la-playlist__modal-dialog">
                          <div class="modal-content la-playlist__modal-content">
                          
                            <div class="modal-header la-playlist__modal-header">
                              <h4 class="modal-title la-playlist__modal-title">Share Playlist</h4>
                              <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                            </div>
                          
                            <div class="modal-body la-playlist__modal-body">
                                  <p>
                                                                    
                                  <a role="button" id="share_playlist_on_facebook" target="_facebook" ><img src="../../images/learners/icons/facebook_1.svg" alt="share_facebook" height="40px" ></a>
                                  <a role="button" id="share_playlist_on_twitter" target="_twitter" class="ml-1"><img src="../../images/learners/icons/twitter.svg" alt="share_twitter" height="40px" ></a>
                                  <a role="button" id="share_playlist_on_whatsapp" target="_whatsapp" class="ml-1"><img src="../../images/learners/icons/whatsapp.svg" alt="share_whatsapp" height="35px" ></a>
                                  <a role="button" id="share_playlist_on_pinterest" target="_pinterest" class="ml-1"><img src="../../images/learners/icons/pinterest.svg" alt="share_pinterest" height="35px" ></a>  
                                </p>
                                  <p><input class="border-0 w-75" id="playlist_url_copy"><span role="button" class="float-right" onclick="copyPlaylistUrl()"><img src="../../images/learners/icons/copy.svg" alt="copy" height="25px"></span></p>
                            </div>
                          </div>
                        </div>
                    </div>
                <!-- Share Playlist POP UP :END -->
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

    function sharePlaylistPopup(id){
      let URL = "{{Request::url()}}/"+id;
      let facebookURL = encodeURI(`http://www.facebook.com/sharer/sharer.php?u=${URL}`);
      let pinterestURL = encodeURI(`https://pinterest.com/pin/create/bookmarklet/?&url=${URL}description=this is a playlist from lila`);
      let twitterURL = encodeURI(`https://twitter.com/share?url=${URL}`);
      let whatsappURL = encodeURI(`https://wa.me/?text=${URL}`);
      $('#share_playlist_on_facebook').attr('href',facebookURL);
      $('#share_playlist_on_twitter').attr('href',twitterURL);
      $('#share_playlist_on_whatsapp').attr('href',whatsappURL);
      $('#share_playlist_on_pinterest').attr('href',pinterestURL);
      $('#playlist_url_copy').val(URL);
      $('#share_playlist').modal('show');
    }

    function copyPlaylistUrl() {
      /* Get the text field */
      var copyText = document.getElementById("playlist_url_copy");

      /* Select the text field */
      copyText.select();
      // copyText.setSelectionRange(0, 99999); /*For mobile devices*/

      /* Copy the text inside the text field */
      document.execCommand("copy");
    }

  </script>
@endsection
