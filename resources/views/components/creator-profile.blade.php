<div class="row">
    <div class="col offset-2">
        <div class="la-vcreator__profile mb-14">
            <img class="img-fluid" src= {{ $img }} alt= {{ $name }} />
            <div class="la-vcreator__name text-6xl"> {{ $name }} </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="la-vcreator__desc">
            <p class="la-vcreator__text"> {{ $desc }} </p>
        </div>

      <div class="la-vcreator__social mt-8">
        <div class="la-vcreator__social-itm mr-5">
          <a class="la-vcreator__social-link">
            <i class="la-icon la-icon--xl icon icon-#{icon}"></i>
          </a>
        </div>
      </div>
    </div>
    
    <div class="col">
      <div class="la-vcreator__profession pb-8">
        <h4 class="text-uppercase"> {{ $skill }} </h4>
        <div class="la-vcreator__location"> {{ $location }} </div>
      </div>

      
      <ul class="list-unstyled la-vcreator__info d-flex">
        <li class="la-vcreator__courses mr-20">
            <div class="text-center text-4xl"> {{ $courses }}+ </div> 
            <div class="text-uppercase">Courses</div>
        </li>
        <li class="la-vcreator__ratings mr-20">
            <div class="text-center  text-4xl"> {{ $rating }} </div>
            <div class="text-uppercase">Ratings</div>
        </li>
        <li class="la-vcreator__awards">
            <div class="text-center  text-4xl"> {{ $awards }} </div>
            <div class="text-uppercase">Awards</div>
        </li>
      </ul>
    </div>
</div>