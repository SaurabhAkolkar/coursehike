<li class="col-1 px-0 la-interests__item la-anim__stagger-item--x" id="interest_card_{{$id}}" @if(!$alreadyAdded) onclick="addInterest({{$id}})" @else onclick="removeInterest({{$id}})" @endif >
    <img class="img-fluid d-block mx-auto la-interests__item-img" src= {{ $img }} alt="{{ $name }}">
    <div class="la-interests__overlay">
        <p class="la-interests__overlay-name m-0 la-anim__stagger-item"> {{ $name }} </p>
    </div>
</li>