

<div class="col-md-6 col-lg-4 ">
    <div class="la-mentor ">
      <a href="/creator/{{$id}}">
        <div class="la-mentor__profile la-anim__stagger-item">
            <img class="img-fluid" src="{{ $img }}" alt={{ $name }}>
        </div>
      </a>
      <div class="la-mentor__btm d-flex justify-content-between align-items-center la-anim__stagger-item la-anim__B">
        <a href="/creator/{{$id}}">
          <div class="la-mentor__info ">
            <h3 class="la-mentor__name text-capitalize">{{ ucfirst($name) }}</h3>
            <p class="la-mentor__skill">{{ $skill }}</p>
          </div>
        </a>
        <a class="la-mentor__detailview " href="/creator/{{$id}}">
          <span class="la-icon la-icon--6xl icon-grey-arrow mt-n2"></span>
        </a>
      </div>
    </div>
</div>

