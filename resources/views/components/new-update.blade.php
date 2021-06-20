<div class="la-news__item la-anim__wrap"> 
    <div class="la-news__wrapper d-flex flex-column flex-md-row justify-content-between">
        <div class="la-news__eimg la-anim__stagger-item">
            <img class="d-block lazy" src= "{{ $img }}" data-src= "{{ $img }}" alt= "{{ $title }}" />
        </div>

        <div class="la-news__etitle la-anim__stagger-item--x">
            <h6 class="la-news__title text-lg text-md-xl head-font m-0 "> {{ $title }} </h6>
            <span class="la-news__timestamp text-sm"> {{ $timestamp }} </span>
            <div class="la-news__content text-md text-md-sm mb-3">
                <span> {{ $desc }}  </span>
                <span class="collapse" id= "update_{{ $updateId }}"> {{ $desc }}  </span>
            </div>
            <p class="la-news__readmore collapsed" role="button" href="#update_{{ $updateId }}" data-toggle="collapse" aria-expanded="true"></p>
        
            <div class="text-right mt-6 mt-lg-12 la-anim__stagger-item">
                <a href="" role="button" class="la-btn__arrow la-btn__arrow-right text-uppercase text--burple text--sm font-weight--semibold text-spacing">
                    <span>Explore More</span>
                    <span class="la-btn__arrow-icon arrow-right la-icon la-icon--7xl icon-grey-arrow"> </span>
                </a>
            </div>
        </div>
    </div>  
</div>