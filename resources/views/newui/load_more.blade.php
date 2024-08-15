@foreach ($chapters as $key => $chapter)
    <div class="accordion-item mb-3">
        <h2 class="accordion-header border chike-video-info-box-accordion-header"
            id="panelsStayOpen-headingOne_{{ $chapter->id }}">
            <div class="accordion-button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne_{{ $chapter->id }}" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne_{{$chapter->id }}">
                Chapter {{ $chapter->id }}.{!! $chapter->chapter_name !!}
            </div>
        </h2>
        <div id="panelsStayOpen-collapseOne_{{ $chapter->id }}" class="accordion-collapse collapse "
            aria-labelledby="panelsStayOpen-headingOne_{{ $chapter->id }}">
            <div class="accordion-body p-0">
                <div class="tutori-course-curriculum">
                    <div class="curriculum-scrollable">
                        <ul class="curriculum-sections">
                            <li class="section">
                                <ul class="section-content">
                                    @foreach ($chapter->courseclass as $class)
                                        <li class="course-item has-status course-item-lp_lesson">
                                            <a class="section-item-link" href="#">
                                                <span class="item-name">{{ $class->title }}</span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta duration">{{ $class->duration }} min</span>
                                                    <span class="item-meta"><i class="fa fa-lock m-0"></i></span>
                                                </div>
                                            </a>
                                            <div class="progress" style="margin:0px 40px;">
                                                <div class="progress-bar w-25" role="progressbar" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- section end -->

                        </ul>
                        <!-- Main ul end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
