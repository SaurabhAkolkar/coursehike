<div class="swiper-slide la-artist__slider">
    <div class="row la-artist__slider-row">
        <div class="col-md-4 offset-md-1 px-0 la-artist__slider-col la-artist__slide-img">
            <div class="la-artist__img text-center">
                <img class="img-fluid d-block lazy"  src="{{$artistImage}}" data-src="{{$artistImage}}" alt="M" />
            </div>
        </div>
        <div class="col-md-7 la-artist__slider-col la-artist__slide-content d-flex flex-column justify-content-around align-items-end">
            <div class="la-artist__content-top d-flex flex-column align-items-end">
                <div class="la-artist__name leading-none"> {{ $artistName }} </div>
                <div class="la-artist__about la-btn__arrow text--burple text-uppercase text-spacing font-weight--medium">
                    <a href="/mentor/{{$artistId}}">read about
                        <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
                    </a>
                </div>
            </div>
            <div class="la-artist__content-bottom d-flex flex-column align-items-end ">
                <!-- <div class="la-artist__specialist text-uppercase"> {{ $artistCategory }} </div> -->
                <div class="la-artist__company-name"> {{ $artistCampany }} </div>
                <div class="la-artist__about la-btn__arrow text--burple text-uppercase text-spacing font-weight--medium">
                    <a href="learn/course/{{$course->id}}/{{$course->slug}}">learn more
                    <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>