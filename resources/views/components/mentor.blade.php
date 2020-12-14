

<div class="col-lg-4 d-inline-flex justify-content-center la-anim__stagger-item--x">
    <div class="la-mentor">
      <div class="la-mentor__profile">
          <img class="img-fluid" src="{{ $img }}" alt={{ $name }}>
      </div>
      <div class="la-mentor__btm d-flex justify-content-between align-items-center">
        <div class="la-mentor__info">
          <h3 class="la-mentor__name">{{ ucfirst($name) }}</h3>
          <p class="la-mentor__skill">{{ $skill }}</p>
        </div>
        <a class="la-mentor__detailview" href="/creator/{{$id}}">
          <span class="la-icon la-icon--6xl icon-grey-arrow mt-n2"></span>
        </a>
      </div>
    </div>
</div>

