<li class="la-notification__item">
    <a class="la-notification__link" href= {{ $url }}>
        <div class="la-notification__link-inner d-flex flex-row justify-content-between">
            <div class="la-notification__prfle">
                <img class="d-block" src= {{ $img }} alt= {{ $name }}>
            </div>
            <div class="la-notification__msg">
                <div class="la-notification__title text-sm pr-1"> {{ $name }}
                    <span class="text-sm font-normal pr-1">{{ $comment }}</span>
                </div>
            </div>
        </div>
        <div class="la-notification__timestamp text-right text-xs font-normal"> {{ $timestamp }}</div>
    </a>
</li>

