<div class="col-12 la-anim__stagger-item la-anim__B">
    <div class="la-mccourse">
        <div class="la-mccourse__imgwrap">
            <img class="img-fluid  mx-auto d-block" src= "{{ $img }}" alt= {{ $title }} />
        </div>
      
        <div class="la-mccourse__overlay">
            <a class="la-mccourse__tag">
                <img class="img-fluid" src="./images/learners/home/master-class.svg" alt="Master Class">
            </a>
            <a class="la-mccourse__type" href="/learn/course/{{$id}}/{{$slug}}">
                <span class="la-mccourse__type-icon la-icon la-icon--md icon-play"></span>
            </a>
            <div class="la-mccourse__title leading-tight text-nowrap">{{ $title }}</div>

            <div class="la-mccourse__btm">
                <div class="la-mccourse__cprofile">
                    <div class="la-mccourse__cprofile-imgwrap">
                        <img class="img-fluid" src= "{{ $profileImg }}"   alt= "{{ $profileName }}" />
                    </div>
                    <div class="la-mccourse__cprofile-name">{{ $profileName }} </div>
                </div>
            </div>
            <div class="la-mccourse__learners mt-4">{{ $learners }} Learners</div>
        </div>
    </div>
</div>