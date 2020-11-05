<div class="col-md-3 la-playlist__item">
    <div class="la-playlist__item-top position-relative mb-4">
        <div class="la-playlist__option-more la-playlist__option-more--white position-absolute">
            <span class="d-inline-block p-2"><i class="la-icon la-icon--2xl icon icon-menu"></i></span>
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
</div>