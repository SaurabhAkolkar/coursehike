<!-- New App Releases -->

<li class="la-news__app-item">
    <h6 class="la-news__app-title head-font text-lg text-sm-2xl m-0"> {{ $title }} </h6>
    <p class="text-xs la-news__app-timestamp"> {{ $timestamp }}</p>
    <div class="la-news__app-content text-md text-sm-sm"> {{ $desc }}
        <span> {{ $desc }} </span>
        <span> {{ $desc }} </span>
        <span class="collapse" id={{ $appCollapseId }}> {{ $desc }} </span>
    </div>
    <a class="la-news__readmore text-center text-sm-right mt-3" role="button" href="#{{ $appCollapseId }}" data-toggle="collapse" aria-expanded="true">Explore More</a>
</li>