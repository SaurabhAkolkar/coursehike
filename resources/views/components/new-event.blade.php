<div class="la-news__meet-item la-anim__wrap">
  <div class="la-anim__stagger-item">
    <h6 class="la-news__meet-title head-font text-lg text-md-xl m-0 text-capitalize"> {{ $title }} </h6>
    <p class="text-sm la-news__meet-timestamp"> {{ $timestamp }}</p>

    <div class="la-news__meet-content">
        <p class="text-sm"> {{ $about }} </p>
        <div class="la-news__meet-banner">
          <img class="d-block lazy" src= "{{ $img }}" data-src= "{{ $img }}" alt="{{ $title }}" />
        </div>
        <p class="text-sm my-3 collapse" id= "event_{{ $eventId }}" > {{ $desc }} </p>
    </div>
    <p class="la-news__readmore collapsed mt-3" role="button" href="#event_{{ $eventId }}" data-toggle="collapse" aria-expanded="true"></p>
  </div>

  <div class="text-right mt-6 la-anim__stagger-item">
    <a href="" role="button" class="la-btn__arrow la-btn__arrow-right text-uppercase text--burple text--sm font-weight--semibold text-spacing">
        <span>Explore More</span>
        <span class="la-btn__arrow-icon arrow-right la-icon la-icon--7xl icon-grey-arrow"> </span>
    </a>
  </div>
</div>