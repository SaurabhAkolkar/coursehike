<div class="row">
    <div class="col p-md-0">
        <div class="la-vcreator__profile">
            <img class="img-fluid d-block" src= "{{ $img }}" alt= "{{ $name }}" />
            <div class="la-vcreator__overlay">
              <div class="la-vcreator__name"> {{ $name }} </div>
            </div>
        </div>
    </div>
</div>

<div class="row my-md-14">
    <div class="col-md-6 p-md-0">
        <div class="la-vcreator__desc">
            <p class="la-vcreator__text"> {!! $desc !!} </p>
        </div>

        <div class="la-vcreator__social mt-8">
          <div class="la-vcreator__social-itm mr-5">
            @if($facebook)
            <a class="la-vcreator__social-link" href="{{$facebook}}">
              <i class="la-icon la-icon--5xl icon-facebook"></i>
            </a>
            <a class="la-vcreator__social-link" href="{{$facebook}}">
              <i class="la-icon la-icon--5xl icon-insta"></i>
            </a>
            @endif
            @if($google)
            <a class="la-vcreator__social-link" href="{{$google}}">
              <i class="la-icon la-icon--5xl icon-youtube"></i>
            </a>
            @endif
            <a class="la-vcreator__social-link" href="{{$email}}">
              <i class="la-icon la-icon--5xl icon-mail"></i>
            </a>
          </div>
        </div>
    </div>
    <div class="col-md-2 p-md-0"></div>
    <div class="col-md-4 p-md-0">
      <div class="la-vcreator__profession">
        <h4 class="text-uppercase la-vcreator__skill"> {{ $skill }} </h4>
        <div class="la-vcreator__location"> {{ $location }} </div>
      </div>

      
      <ul class="list-unstyled la-vcreator__info d-flex justify-content-between">
        <li class="la-vcreator__courses ">
            <div class="la-vcreator__stats text-center "> {{ $courses }}+ </div> 
            <div class="la-vcreator__category text-uppercase">Courses</div>
        </li>
        <li class="la-vcreator__ratings">
            <div class="la-vcreator__stats text-center"> {{ round($rating, 2) }} </div>
            <div class="la-vcreator__category text-uppercase">Ratings</div>
        </li>
        <li class="la-vcreator__awards">
            <div class="la-vcreator__stats text-center "> {{ $awards }} </div>
            <div class="la-vcreator__category text-uppercase">Awards</div>
        </li>
      </ul>
    </div>
</div>