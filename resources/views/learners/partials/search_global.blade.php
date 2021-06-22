@if ($results)
@foreach ($results as $result)
    <div class="col-12 la-global__search-col">
        <div class="la-global__search-list">
            <div class="d-md-flex align-items-start">
                <div class="la-global__search-list--img">
                    <img src={{$result['img']}} alt="Search List" class="d-block mx-0" />
                </div>

                <div class="la-global__search-list--info">
                    <div class="la-global__searc-list--inner d-lg-flex align-items-start justify-content-between">
                        <div class="la-global__search-list--lft">
                            <div class="la-global__search-list--tag text-xs text-capitalize">{{$result['tag']}}</div>
                            <h6 class="la-global__search-list--title mb-1">{{$result['title']}}</h6>
                        </div>
                        <div class="la-global__search-list--rgt leading-none">
                            <span class="la-global__search-list--seq text-xs pr-1">{{$result['mentor_name']}}</span>
                            <span class="la-global__search-list--seq text-xs pr-1">{{$result['video_count']}} Video</span>
                            <span class="la-global__search-list--seq text-xs pr-1">{{$result['duration']}}</span>
                        </div>
                    </div>

                    <div class="la-global__search-list--desc text-xs mt-2">
                        {{strip_tags($result['desc'])}}
                    </div>

                    <div class="la-global__search-list--grid leading-none">
                        <span class="la-global__search-list--seq text-xs pr-1">{{$result['mentor_name']}}</span>
                        <span class="la-global__search-list--seq text-xs pr-1">{{$result['video_count']}}</span>
                        <span class="la-global__search-list--seq text-xs pr-1">{{$result['duration']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@else
    <div class="col-12 la-anim__wrap">
        <div class="la-empty__courses text-center la-anim__stagger-item">
            <div class="la-empty__inner mb-0">
                <h6 class="la-empty__course-title mb-0">No Classes/Courses Found.</h6>
            </div>
        </div>
    </div>
@endif