<li class="la-interests__item" id="interest_card_{{$id}}" @if(!$alreadyAdded) onclick="addInterest({{$id}})" @else onclick="removeInterest({{$id}})" @endif >
    <img class="img-fluid d-block mx-auto la-interests__item-img" src= {{ $img }} alt="">
    <div class="la-interests__overlay">
        <p class="la-interests__overlay-name m-0"> {{ $name }} </p>
    </div>
</li>