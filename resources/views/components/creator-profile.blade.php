<div class="row flex-column-reverse flex-xl-row la-anim__wrap">
    <div class="col-xl-6">
      <div class="la-vcreator__overlay-wrap position-relative">
        <div class="la-vcreator__overlay--back position-relative d-none d-xl-block mb-xl-8">
          <div class="la-vcreator__name la-anim__text-move la-title--circle"> <span class="position-relative">{{ $name }}</span> </div>
        </div>
        <div class="la-vcreator__profile-content la-anim__fade-in-left la-anim__B">
          <div class="la-vcreator__desc">
            {!! $desc !!}
          </div>
          <div class="la-vcreator__social mt-8">
            <div class="la-vcreator__social-itm mr-2 mr-md-5">
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
              <a class="la-vcreator__social-link" href="mailto:{{$email}}">
                <i class="la-icon la-icon--5xl icon-mail"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 mb-4 mb-md-0">
      <div class="la-vcreator__profile la-anim__stagger-item">
          <div class="la-vcreator__profile--img position-relative">
            <img class="img-fluid d-block" src= "{{ $img }}" alt= "{{ $name }}" />
          </div>
          <div class="la-vcreator__overlay mb-xl-8 ">
            <div class="la-vcreator__name la-anim__text-move la-title--circle"> <span class="position-relative">{{ $name }}</span> </div>
          </div>
          <!-- <div class="la-vcreator__overlay--back">
            <div class="la-vcreator__name la-anim__text-move"> {{ $name }} </div>
          </div> -->
      </div>
      <div class="la-vcreator__achivements-wrap la-anim__stagger-item ml-xl-auto">
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
</div>

<div class="row my-md-6 la-anim__wrap">
    <div class="col-md-6 la-anim__stagger-item">
        <!-- <div class="la-vcreator__desc">
            <p class="la-vcreator__text"> {!! $desc !!} </p>
        </div> -->

        <!-- <div class="la-vcreator__social mt-8">
          <div class="la-vcreator__social-itm mr-2 mr-md-5">
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
            <a class="la-vcreator__social-link" href="mailto:{{$email}}">
              <i class="la-icon la-icon--5xl icon-mail"></i>
            </a>
          </div>
        </div> -->
    </div>
  
    <!-- <div class="col-md-6 col-lg-3 offset-lg-2 la-anim__stagger-item ml-auto">
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
    </div> -->
</div>