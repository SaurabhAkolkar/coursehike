<div class="col-6 col-lg-3 px-2 px-md-4 py-md-2">
    <a class="la-hp__card position-relative" href= {{ $hpUrl }} >
        <div class="la-hp__card-item position-relative la-anim__stagger-item--x la-anim__B">
            <div class="la-hp__card-thumbnail w-100" >
                <img class="img-fluid d-block la-hp__card-thumbnail--img lazy" src="{{ $hpImg }}"  data-src="{{ $hpImg }}" alt="{{ $hpCourse }}" />
            </div>

            <div class="la-hp__card-overlay">
                <div class="la-hp__card-btm px-3 position-absolute">
                    <h6 class="la-hp__card-title text-lg  text-capitalize">{{ $hpCourse }}</h6>
                    <p class="la-hp__card-author text-sm text-capitalize mb-2">{{ $hpCname }}</p>
                </div>
            </div>
        </div>
    </a>
</div>

