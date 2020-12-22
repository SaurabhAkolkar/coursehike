<div class="swiper-slide la-artist__slider">
    <div class="row la-artist__slider-row la-anim__stagger">
        <div class="col-md-6 la-artist__slider-col la-artist__slide-img la-anim__B la-anim__stagger-item--x">
            <div class="la-artist__img text-center"><img class="img-fluid" src="{{$artistImage}}" alt=""></div>
            </div>
        <div class="col-md-6 la-artist__slider-col la-artist__slide-content d-flex flex-column justify-content-around align-items-end la-anim__B la-anim__stagger-item--x">
            <div class="la-artist__content-top d-flex flex-column align-items-end pb-6 pb-md-0">
                <div class="la-artist__name"> {{ $artistName }} </div>
                <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold"><a href="/creator">read about</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></div>
            </div>
            <div class="la-artist__content-bottom d-flex flex-column align-items-end pb-6 pb-md-0">
                <div class="la-artist__specialist text-uppercase"> {{ $artistCategory }} </div>
                <div class="la-artist__company-name"> {{ $artistCampany }} </div>
                <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold">
                    <a href="learn/course/{{$course->id}}/{{$course->slug}}">learn more</a>
                    <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
                </div>
            </div>
        </div>
    </div>
</div>