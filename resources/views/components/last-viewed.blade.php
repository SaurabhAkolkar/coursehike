<div class="card la-course__tiles w-100 d-flex flex-row ">
    <div class="la-courses__tile-thumbnail card-header d-block p-0 la-anim__fade-in-top">
        <img class="img-fluid d-block " src= {{ $img }} alt= {{ $desc }}>

        <div class="la-course__tile-bars d-block position-relative">
            <div class="la-course__tile-indicator d-block">
                <p class="m-0 px-2 small text-right"> {{ $progress }}%</p>
            </div>
            <div class="la-course__tile-progress progress bg-transparent d-block pt-2">
                <div class="progress-bar bg-success" role="progress-bar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100" style="width:37%;height:4px;border-radius: 0 0 0 10px;"></div>
            </div>
        </div>
    </div>

    <div class="la-course__tile-content d-block px-4 pt-1 la-anim__fade-in-bottom">
        <h6 class="body-font text-md m-0"> {{ $desc }}</h6>
        <p class="body-font text-xs"> {{ $name }} </p>

        <div class="la-course__tile-rating d-flex flex-row pt-3">
            <div class="la-tile__rtng"> {{ $rating  }}</div>
        </div>
    </div>

    <a class="la-course__tile-more d-flex align-items-center la-anim__stagger-item--x" href="">
        <span class="la-icon la-icon--7xl icon-grey-arrow pl-10"></span> 
    </a>
</div>