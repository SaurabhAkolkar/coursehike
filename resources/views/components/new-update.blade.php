<li class="la-news__item"> 
    <div class="la-news__wrapper d-flex flex-column flex-lg-row justify-content-between">
        <div class="la-news__eimg">
            <img class="d-block" src= "{{ $img }}" alt= {{ $title }} />
        </div>

        <div class="la-news__etitle">
            <h6 class="text-lg text-sm-2xl head-font m-0"> {{ $title }} </h6>
            <span class="la-news__timestamp text-xs"> {{ $timestamp }} </span>
            <p class="la-news__content text-md text-sm-sm">
            <br>
            <br>

            <span> {{ $desc }}  </span>
            <span class="collapse" id= "collapseId"> {{ $desc }}  </span>
            </p>
            <p class="la-news__readmore collapsed text-center  text-sm-right" role="button" href="#collapseId" data-toggle="collapse" aria-expanded="true">Read More</p>
        </div>
    </div>
</li>