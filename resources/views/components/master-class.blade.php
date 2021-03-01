
<div class="col-12 col-md-6 la-anim__stagger-item la-anim__B">
    <a href="/learn/course/{{$id}}/{{$slug}}">
        <div class="la-mccourse">
            <div class="la-mccourse__imgwrap">
                <img class="img-fluid" src= "{{ $img }}" alt= {{ $title }} />
            </div>
        
            <div class="la-mccourse__overlay">
                <a class="la-mccourse__tag">
                    <img class="img-fluid" src="./images/learners/home/master-class.svg" alt="Master Class">
                </a>
                <a class="la-mccourse__type">
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
                    <div class="la-mccourse__learners">{{ $learners }} Learners</div>
                </div>
            </div>
        </div>
    </a>
</div>