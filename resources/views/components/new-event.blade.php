<li class="la-news__meet-item la-anim__wrap">
    <h6 class="la-news__meet-title head-font text-lg text-sm-2xl m-0 text-capitalize la-anim__stagger-item--x"> {{ $title }} </h6>
    <p class="text-sm la-news__meet-timestamp la-anim__stagger-item--x"> {{ $timestamp }}</p>

    <div class="la-news__meet-content">
        <p class="text-md la-anim__stagger-item--x"> {{ $about }} </p>
        <div class="la-news__meet-banner la-anim__stagger-item">
          <img class="d-block lazy" src= "{{ $img }}" data-src= "{{ $img }}" alt="{{ $title }}" />
        </div>
        <p class="text-md my-3 collapse la-anim__stagger-item" id= "event_{{ $eventId }}" > {{ $desc }} </p>
    </div>
    <p class="la-news__readmore collapsed text-center text-sm-right mt-3 la-anim__stagger-item" role="button" href="#event_{{ $eventId }}" data-toggle="collapse" aria-expanded="true">Read More</p>
</li>