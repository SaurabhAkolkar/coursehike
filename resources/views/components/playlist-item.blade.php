
<div class="col-md-6 col-lg-4 mb-6 mb-md-10 la-playlist__item la-anim__stagger-item" >
    <div class="la-playlist__item-top position-relative mb-4 d-block">
        <div class="la-playlist__option-more la-playlist__option-more--white position-absolute">
            <a class="dropdown-toggle d-inline-block la-course__menubtn p-2" id="playlist_menu" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="la-icon la-icon--2xl icon icon-menu"></i>
            </a>
            <div class="la-cmenu dropdown-menu py-0">
                <a class="dropdown-item la-cmenu__item d-inline-flex" onclick="editPlaylistPopup({{$id}}, '{{$courseName}}')"><i class="icon icon-edit la-icon la-icon--lg mr-4"></i>Edit Playlist</a>
                <a class="dropdown-item la-cmenu__item d-inline-flex" href="/playlist-delete/{{$id}}"><i class="icon icon-delete la-icon la-icon--lg mr-4"></i>Delete Playlist</a>
                <a class="dropdown-item la-cmenu__item d-inline-flex" href="/playlist/{{$id}}"><i class="icon icon-courses la-icon la-icon--lg mr-4"></i>See Courses</a>
            </div>
        </div>
        @php
            $courses = App\PlaylistCourse::has('courses')->where(['playlist_id'=>$id])->get();

        @endphp

        <a class="la-playlist__thumbnails la-playlist__thumbnails--three d-flex flex-wrap"  role="button" href="/playlist/{{$id}}">
            @if(count($courses) == 0)
                <div class="la-playlist__thumbnail">
                    <img class="img-fluid lazy" src="{{ asset('/images/default-images/playlist default_new.png') }}" data-src="{{ asset('/images/default-images/playlist default_new.png') }}" alt="thumbnail" />
                </div>

            @elseif(count($courses) == 1)
                <div class="la-playlist__thumbnail">
                    <img class="img-fluid" @if($courses[0]->courses != null ) src="{{ $courses[0]->courses->preview_image  }}" @else src="{{ $courses[0]->bundle->preview_image  }}" @endif alt="thumbnail" />
                </div>
            @elseif(count($courses) == 2)
                <div class="la-playlist__thumbnail">
                    <img class="img-fluid" @if($courses[0]->courses != null ) src="{{ $courses[0]->courses->preview_image }}" @else src="{{ $courses[0]->bundle->preview_image  }}" @endif alt="thumbnail" />
                </div>
                <div class="la-playlist__thumbnail">
                    <img class="img-fluid" @if($courses[1]->courses != null ) src="{{ $courses[1]->courses->preview_image }}" @else src="{{ $courses[0]->bundle->preview_image  }}" @endif alt="thumbnail" width="100%" />
                </div>
            @else
                <div class="la-playlist__thumbnail">
                    <img class="img-fluid" @if($courses[0]->courses != null ) src="{{ $courses[0]->courses->preview_image }}" @else src="{{ $courses[0]->bundle->preview_image  }}" @endif alt="thumbnail" />
                </div>
                <div class="la-playlist__thumbnail">
                    <img class="img-fluid" @if($courses[1]->courses != null ) src="{{ $courses[1]->courses->preview_image }}" @else src="{{ $courses[0]->bundle->preview_image  }}" @endif alt="thumbnail" />
                </div>
                <div class="la-playlist__thumbnail">
                    <img class="img-fluid" @if($courses[2]->courses != null ) src="{{ $courses[2]->courses->preview_image }}" @else src="{{ $courses[0]->bundle->preview_image  }}" @endif alt="thumbnail" />
                </div>
            @endif
        </a>
    </div>

    <div class="la-playlist__item-bottom d-flex justify-content-between">
        <div class="la-playlist__category">
            <div class="la-playlist__course-name">{{ $courseName }}</div>
            <div class="la-playlist__course-count">
                <span class="la-playlist__course-count">{{ $classesCount }}</span> Courses
            </div>
        </div>
        <div class="la-playlist__item-share">
            <span role="button" onclick="sharePlaylistPopup({{$id}})"><span class="la-icon la-icon--2xl icon-share"></span>
        </div>
    </div>

</div>
