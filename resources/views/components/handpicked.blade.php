<div class="col-6 col-lg-3 p-1 p-sm-1 p-md-3">
    <a class="la-hp__card position-relative" href= {{ $hpUrl }} >
        <div class="la-hp__item position-relative la-anim__stagger-item--x la-anim__B">
            <div class="la-hp__thumbnail w-100" >
                <img class="img-fluid d-block la-hp__thumbnail-img" src={{ $hpImg }} alt={{ $hpCourse }}>
            </div>

            <div class="la-hp__overlay">
                <div class="la-hp__btm px-3 position-absolute">
                    <strong class="text-lg  text-capitalize">{{ $hpCourse }}</strong>
                    <p class="text-sm text-capitalize">{{ $hpCname }}</p>
                </div>
            </div>
        </div>
    </a>
</div>

