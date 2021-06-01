
<div class="col-4 col-md-3 la-entry__interest la-entry__interest--dashboard position-relative" >
    <a  role="button" onclick="" id="interest_span_{{$id}}">
        <div class="la-entry__interest-inner position-relative ">
            <div class="la-entry__interest-thumbnail la-entry__interest-thumbnail--img z-0">
                <img class="lazy" src="{{ $img }}" data-src="{{ $img }}" alt="{{ $name }}" />
            </div>

            <div class="la-entry__interest-name--overlay">
                <div class="la-entry__interest-name la-entry__interest-name--title text-white text-left text-xs text-capitalize">{{$name}}</div>
            </div>
        </div>
    </a>
</div>