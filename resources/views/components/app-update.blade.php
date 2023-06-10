<!-- New App Releases -->

<li class="la-news__app-item la-anim__wrap">
    <h6 class="la-news__app-title head-font text-lg text-md-xl text-capitalize m-0 la-anim__stagger-item"> {{ $title }} </h6>
    <p class="text-sm la-news__app-timestamp la-anim__stagger-item"> {{ $timestamp }}</p>
    <div class="la-news__app-content text-md  la-anim__stagger-item"> 
        <span>{{ $desc }}</span>
        <span class="la-news__app-desc collapse" id="app_{{ $appId }}"> 
            <span>{{ $desc }} </span> <br/>
            {{-- <a role="button" href="" class="btn btn-primary la-btn__app py-3  mt-8 mt-md-5">Explore</a> --}}
        </span>
    </div>
    <p class="la-news__readmore collapsed text-center text-sm-right mt-3 la-anim__stagger-item" role="button" href="#app_{{ $appId }}" data-toggle="collapse" aria-expanded="true">Read More</p>
</li>