<li class="la-notification__item">
    <a class="la-notification__link" >
        <div class="la-notification__link-inner d-flex flex-row align-items-center">
            <div class="la-notification__prfle">
                <img class="d-block lazy" src= "{{ $img }}" data-src= "{{ $img }}" alt= "{{ $name }}" />
            </div>
            <div class="la-notification__msg pr-2">
                <div class="la-notification__title text-sm pr-1"> {{ $name }}
                    <span class="text-sm pr-1">{{ $comment }}</span>
                </div>
            </div>
        </div>
        <div class="la-notification__timestamp text-right text-xs mt-1"> {{ $timestamp }}</div>
    </a>
</li>



