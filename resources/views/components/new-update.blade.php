<li class="la-news__item la-anim__wrap"> 
    <div class="la-news__wrapper d-flex flex-column flex-lg-row justify-content-between">
        <div class="la-news__eimg la-anim__stagger-item">
            <img class="d-block lazy" src= "{{ $img }}" data-src= "{{ $img }}" alt= "{{ $title }}" />
        </div>

        <div class="la-news__etitle">
            <h6 class="la-news__title text-lg text-md-xl head-font m-0 la-anim__stagger-item--x"> {{ $title }} </h6>
            <span class="la-news__timestamp text-sm la-anim__stagger-item--x"> {{ $timestamp }} </span>
            <div class="la-news__content text-md text-sm-sm mb-3">
                <span class="la-anim__stagger-item--x"> {{ $desc }}  </span>
                <span class="collapse" id= "update_{{ $updateId }}"> 
                    <span>{{ $desc }}  </span> <br/>
                    {{-- <a role="button" href="" class="btn btn-primary la-btn__app py-3 mt-8 mt-md-5">Explore</a> --}}
                </span>
            </div>
            <p class="la-news__readmore collapsed text-center text-sm-right la-anim__stagger-item--x" role="button" href="#update_{{ $updateId }}" data-toggle="collapse" aria-expanded="true">Read More</p>
        
           
        </div>
    </div>
</li>