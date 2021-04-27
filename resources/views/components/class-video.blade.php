<div class="la-vcourse__lesson position-relative" data-video-id="{{$id}}">

    <div class="la-vcourse__access-wrap">
        <div class="la-vcourse__access la-vcourse__access--{{ $access ?? '' }} d-flex align-items-center justify-content-center">
            @if ($access == "free")
                <span class="icon-play la-vcourse__access-icon la-vcourse__access-icon--white"></span>
            @elseif ($access == "locked")
                <span class="icon-lock la-vcourse__access-icon la-vcourse__access-icon--danger"  @if(Auth::check()) data-target="#locked_subscribe"  @else data-target="#locked_login_modal"  @endif></span>
            @else
                <span class="icon-tick la-vcourse__access-icon la-vcourse__access-icon--green"></span>
            @endif
        </div>
    </div>
    <div class="la-vcourse__lesson-left position-relative">
        <div class="la-vcourse__lesson-thumbnail"  @if($access == "locked") data-toggle="modal" @if(Auth::check()) data-target="#locked_subscribe"  @else data-target="#locked_login_modal"  @endif @endif>
            <img class="img-fluid lazy" src= "{{ $thumbnail ?? '' }}" data-src= "{{ $thumbnail ?? '' }}" alt= "{{ $title ?? '' }}" />
        </div>
        <div class="la-vcourse__lesson-playbtn">
            <span></span>
        </div>
        <div class="la-vcourse__video-progress position-absolute w-100">
            <div class="la-vcourse__video-time text-right mr-1"> {{ $watchduration ?? '' }} </div>
            <div class="la-vcourse__video-track position-relative">
                <span style="width: {{ $statuspercentage ?? '' }}%;" class="la-vcourse__video-bar"></span>
            </div>
        </div>
    </div>
    <div class="la-vcourse__lesson-right d-flex">
        <div class="la-vcourse__lesson-content d-flex flex-wrap flex-column">
            <div class="la-vcourse__lesson-title leading-snug"> {{ $title ?? '' }} </div>
            <div class="la-vcourse__lesson-creator"> {{ $author ?? '' }} </div>
            <div class="la-vcourse__lesson-status"></div>
        </div>
        <div class="la-vcourse__lesson-description">
            <p>{{ $detail}}</p>
        </div>
    </div>
</div>