<li class="la-announcement__item">
    <a class="la-announcement__link" href={{ $url }}>
        <div class="la-announcement__link-inner d-flex flex-row justify-content-between">
            <div class="la-announcement__eprfle">
                <img class="d-block" src= {{ $img }} alt= {{ $event }} />
            </div>
             <div class="la-announcement__event text-sm">{{ $event }}</div>
        </div>
        <div class="la-announcement__timestamp text-right text-xs font-normal"> {{ $timestamp }} </div>
    </a>
</li>
<div class="la-announcement__hline"></div>


