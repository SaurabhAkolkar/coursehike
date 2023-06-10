

<div class="col-md-6 col-lg-4">
    <div class="la-mentor la-anim__stagger-item">
      <a href="/mentor/{{$id}}">
        <div class="la-mentor__profile">
            <img class="img-fluid lazy" src="{{ $img }}"  data-src="{{ $img }}" alt= "{{ $name }}"  width="400" height="400" />
        </div>
      </a>
      <div class="la-mentor__btm d-flex justify-content-between align-items-center">
        <a class="la-mentor__info" href="/mentor/{{$id}}">
          <h3 class="la-mentor__name text-capitalize">{{ ucfirst($name) }}</h3>
          <p class="la-mentor__skill">{{ $skill }}</p>
        </a>
        <a class="la-mentor__detailview " href="/mentor/{{$id}}">
          <span class="la-icon la-icon--6xl icon-grey-arrow mt-n2"></span>
        </a>
      </div>
    </div>
</div>

