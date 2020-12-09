
    <!-- Very little is needed to make a happy life. - Marcus Antoninus -->
    <div class="modal fade la-playlist__modal" id="add_to_playlist_modal">
                    <div class="modal-dialog la-playlist__modal-dialog">
                    <div class="modal-content la-playlist__modal-content">
                        
                        <div class="modal-header la-playlist__modal-header">
                            <h4 class="modal-title la-playlist__modal-title">Add to. </h4>
                            <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                        </div>
                        @if (!Auth::guest())
                        <div class="modal-body la-playlist__modal-body">
                            <div class="d-flex ">
                                <input type="text" class="la-playlist__modal-inputtype la-playlist__modal-addtoinput w-100" id="search_playlist" onkeyup="searchPlaylist()" placeholder="Search By Name"/>
                                <a href="" role="button">
                                    <span class="la-icon icon-search la-icon--xl pt-2 la-playlist__modal-search"></span>
                                </a>
                            </div>
                            <form action="{{route('add.to.playlist')}}" id="add_to_playlist_form" method="post">
                                @csrf
                                <input type="hidden" name="playlist_id" id="playlist_id" value=""/>
                                <input type="hidden" name="course_id" id="course_id" value=""/>
                            </form>
                            <div class="la-playlist__modal-list list-group list-group-flush  playlist_div_height" id="user_playlists" >
                                @if(!empty($playlists))
                                  @foreach($playlists as $p)
                                        <a class = "la-playlist__modal-item list-group-item targets_playlists" href="#" role="button" onclick="submitAddToPlaylist({{$p->id}})">{{$p->name}}</a>   
                                  @endforeach
                                @endif
                            </div>

                            <div class="la-playlist__modal-btm">
                                <h4 class="modal-title la-playlist__modal-title" data-toggle="collapse" href="#addPlaylistCollapes" role="button">
                                    <span class="la-icon icon-plus la-icon--md mr-2"></span>
                                    Create New Playlist
                                </h4>
                            </div>
                            
                            <div class="collapse" id="addPlaylistCollapes">
                                <div class="la-playlist__modal-create mt-2">
                                      <label class="la-playlist__modal-name" for="playlist_name">Playlist Name</label><br/>
                                      <input type="text" class="la-playlist__modal-inputtype w-100" name="playlist_name" id="playlist_name" placeholder="Type Here"/>
                                </div>
                                  <p id="playlist_name_error" class="error mb-0">

                                  </p>
                                  <div class="la-playlist__modal-update text-center">
                                    <a onclick = "addPlaylist()" role="button" class="la-playlist__modal-btn">Create Playlist</a>
                                  </div>
                            </div>

                            @else
                                <h6 class="text-center py-10" style="color: var(--app-indigo-1)">Please Login To Create Playlist</h6>
                            @endif
                        </div>
                    </div>
                </div>
    </div>
