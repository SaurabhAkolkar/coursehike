<div class="card la-course__tiles position-relative w-100 d-flex flex-row ">
    <div class="col-4 la-courses__tile-thumbnail card-header d-block p-0 la-anim__fade-in-top">
        <img class="img-fluid d-block " src= {{ $img }} alt= {{ $desc }}>

        <div class="la-course__tile-bars position-relative ">
            <div class="la-course__tile-progress progress bg-transparent d-block pt-2">
                <div class="la-course__title-progress--bar progress-bar " role="progress-bar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100" style="width:37%;height:4px;border-radius: 0 0 0 10px;"></div>
            </div>
        </div>
    </div>

    <div class="col-5 h-100 la-course__tile-content d-block px-3 pt-2 la-anim__fade-in-bottom">
        <h6 class="la-course__tile-subtitle text-md m-0"> {{ $desc }}</h6>
        <p class="la-course__tile-creator text-xs m-0"> {{ $name }} </p>

        <div class="la-course__tile-rating pt-3">
            <div class="la-course__tile-indicator text-xs"> {{ $progress }}% <span>Completed</span></div>
            <div class="la-tile__rtng">
                <div class="la-course__rating ml-n1">
                    <div class="la-rtng__pg-rtng d-inline-flex">
                        @if($rating == 5)
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                        @elseif($rating >= 4)
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        @elseif($rating >= 3)
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                        @elseif($rating >= 2)
                        
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        @elseif($rating >= 1)
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        @else
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="col-3 la-course__tile-more d-flex align-items-center la-anim__stagger-item--x" href="/learn/course/{{ $id }}/{{ $slug }}">
        <span class="la-icon la-icon--7xl icon-grey-arrow "></span> 
    </a>
</div>