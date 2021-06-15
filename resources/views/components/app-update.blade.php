<!-- New App Releases -->

<div class="la-news__app-item la-anim__wrap">
    <div class="la-anim__stagger-item">
        <h6 class="la-news__app-title head-font text-lg text-md-xl text-capitalize m-0"> {{ $title }} </h6>
        <p class="text-sm la-news__app-timestamp"> {{ $timestamp }}</p>
        
        <div class="la-news__app-content"> 
            <span class="text-sm">{{ $desc }}</span>
            <span class="la-news__app-desc collapse text-sm" id="app_{{ $appId }}"> {{ $desc }} </span>
        </div>
        <p class="la-news__readmore collapsed mt-3" role="button" href="#app_{{ $appId }}" data-toggle="collapse" aria-expanded="true"></p>
    </div>

    <div class="text-right mt-6 la-anim__stagger-item">
        <a href="" role="button" class="la-btn__arrow la-btn__arrow-right text-uppercase text--burple text--sm font-weight--semibold text-spacing">
            <span>Explore More</span>
            <span class="la-btn__arrow-icon arrow-right la-icon la-icon--7xl icon-grey-arrow"> </span>
        </a>
    </div>
</div>