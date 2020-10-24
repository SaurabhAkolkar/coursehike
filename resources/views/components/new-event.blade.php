<li class="la-news__meet-item">
    <h6 class="la-news__meet-title head-font text-lg text-sm-2xl m-0"> {{ $title }} </h6>
    <p class="text-xs la-news__meet-timestamp"> {{ $timestamp }}</p>

    <div class="la-news__meet-content">
        <p class="text-md text-sm-sm"> {{ $about }} </p>
        <div class="la-news__meet-banner">
          <img class="d-block" src= {{ $img }} alt= {{ $title }} />
        </div>
        <p class="text-md text-sm-sm my-3 collapse" id= "seeEvent" > {{ $desc }} </p>
    </div>
    <p class="la-news__readmore collapsed text-center text-sm-right mt-3" role="button" href="#seeEvent" data-toggle="collapse" aria-expanded="true">See Event</p>
</li>