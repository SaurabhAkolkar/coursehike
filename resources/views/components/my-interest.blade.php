<div class="col-4 col-md-2 col-lg-1 pr-0 la-interests__items position-relative" id="interest_card_{{$id}}" @if(!$alreadyAdded) onclick="addInterest({{$id}})" @else onclick="removeInterest({{$id}})" @endif >
    <div class="la-interests__item position-relative ">
        <img class="img-fluid d-block mx-auto la-interests__item-img lazy" src="{{ $img }}" data-src="{{ $img }}" alt="{{ $name }}" />
    </div>
    <p class="la-interests__overlay-name m-0  text-capitalize leading-none"> {{ $name }} </p>
    
    <!-- Delete Icon -->
    @if($alreadyAdded) 
    <a class="la-interests__item-remove badge badge-light" role="button">
        <span>x</span>
    </a>
    @else
    <!-- Add Icon -->
    <a class="la-interests__item-add badge badge-light" role="button">
        <span>+</span>
    </a>
    @endif
</div>