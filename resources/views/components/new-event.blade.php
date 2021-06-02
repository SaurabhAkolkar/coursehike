<li class="la-news__meet-item la-anim__wrap">
    <h6 class="la-news__meet-title head-font text-lg text-md-xl m-0 text-capitalize la-anim__stagger-item"> {{ $title }} </h6>
    <p class="text-sm la-news__meet-timestamp la-anim__stagger-item"> {{ $timestamp }}</p>

    <div class="la-news__meet-content la-anim__stagger-item">
        <p class="text-md"> {{ $about }} </p>
        <div class="la-news__meet-banner ">
          <img class="d-block lazy" src= "{{ $img }}" data-src= "{{ $img }}" alt="{{ $title }}" />
        </div>
        <p class="text-md my-3 collapse" id= "event_{{ $eventId }}" > 
          <span>{{ $desc }}</span> <br/>
          {{-- <a role="button" href="" class="btn btn-primary la-btn__app py-3  mt-8 mt-md-5">Explore</a> --}}
        </p>
    </div>
    <p class="la-news__readmore collapsed text-center text-sm-right mt-3 la-anim__stagger-item" role="button" href="#event_{{ $eventId }}" data-toggle="collapse" aria-expanded="true">Read More</p>
</li>