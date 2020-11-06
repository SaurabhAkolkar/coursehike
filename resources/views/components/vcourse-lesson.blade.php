<div class="la-vcourse__lesson position-relative">
    <div class="la-vcourse__access-wrap">
        <div class="la-vcourse__access la-vcourse__access--{{ $access ?? '' }} d-flex align-items-center justify-content-center">
            @if ($access == "free")
                <span class="icon-play la-vcourse__access-icon la-vcourse__access-icon--white"></span>
            @elseif ($access == "locked")
                <span class="icon-lock la-vcourse__access-icon la-vcourse__access-icon--danger"></span>
            @else
                <span class="icon-tick la-vcourse__access-icon la-vcourse__access-icon--green"></span>
            @endif
        </div>
    </div>
    <div class="la-vcourse__lesson-left position-relative">
        <div class="la-vcourse__lesson-thumbnail">
            <img class="img-fluid" src= {{ $thumbnail ?? '' }} alt= {{ $title ?? '' }}>
        </div>
        <div class="la-vcourse__lesson-playbtn">
            <span></span>
        </div>
        <div class="la-vcourse__video-progress position-absolute w-100">
            <div class="la-vcourse__video-time text-right mr-1"> {{ $watchedDuration ?? '' }} </div>
            <div class="la-vcourse__video-track position-relative">
                <span style="width: {{ $statusPercentage ?? '' }};" class="la-vcourse__video-bar"></span>
            </div>
        </div>
    </div>
    <div class="la-vcourse__lesson-right d-flex">
        <div class="la-vcourse__lesson-content d-flex flex-wrap flex-column">
            <div class="la-vcourse__lesson-title"> {{ $vcourseTitle ?? '' }} </div>
            <div class="la-vcourse__lesson-creator pl-4"> {{ $author ?? '' }} </div>
            <div class="la-vcourse__lesson-learnt mt-auto"> {{ $statusPercentage ?? '' }} </div>
            <div class="la-vcourse__lesson-status"></div>
        </div>
        <div class="la-vcourse__lesson-description">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in pulvinar ligula. In 
                rutrum congue blandit. Sed rutrum ante ultrices nisi sodales tristique. 
                Vivamus euismod vitae nibh quis rutrum.</p>
        </div>
    </div>
</div>