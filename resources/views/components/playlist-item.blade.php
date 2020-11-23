
<div class="col-md-3 la-playlist__item mb-3 mb-md-10">
<a href="playlist/{{$id}}">
    <div class="la-playlist__item-top position-relative mb-4">
        <div class="la-playlist__option-more la-playlist__option-more--white position-absolute">
            <a class="dropdown-toggle d-inline-block la-course__menubtn p-2" id="playlist_menu" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="la-icon la-icon--2xl icon icon-menu"></i>
            </a>
            <div class="la-cmenu dropdown-menu py-0">
                <a class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#edit_playlist" ><i class="icon icon-edit la-icon la-icon--lg mr-4"></i>Edit Playlist</a>
                <a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-delete la-icon la-icon--lg mr-4"></i>Delete Playlist</a>
                <a class="dropdown-item la-cmenu__item d-inline-flex" href="/browse/courses"><i class="icon icon-courses la-icon la-icon--lg mr-4"></i>Browse Courses</a>
            </div>
        </div>
        <div class="la-playlist__thumbnails  la-playlist__thumbnails--three d-flex flex-wrap">
            <div class="la-playlist__thumbnail">
                <img class="img-fluid" src="https://picsum.photos/600/500" alt="thumbnail">
            </div>
            <div class="la-playlist__thumbnail">
                <img class="img-fluid" src="https://picsum.photos/600/500" alt="thumbnail">
            </div>
            <div class="la-playlist__thumbnail">
                <img class="img-fluid" src="https://picsum.photos/600/500" alt="thumbnail">
            </div>
        </div>
    </div>
    <div class="la-playlist__item-bottom d-flex justify-content-between">
        <div class="la-playlist__category">
            <div class="la-playlist__course-name">{{ $courseName }}</div>
            <div class="la-playlist__course-count">
                <span class="la-playlist__course-count">{{ $classesCount }}</span> Courses
            </div>
        </div>
        <div class="la-playlist__download">
            <span class=""><img src="../../images/learners/icons/download.svg" alt="download"></span>
        </div>
    </div> 
    </a>
</div>
