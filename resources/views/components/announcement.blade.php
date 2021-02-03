<li class="la-announcement__item">
    <a class="la-announcement__link" href="/releases/{{ $url }}">
        <div class="la-announcement__link-inner d-flex flex-row align-items-start">
            <div class="la-announcement__eprfle">
                <img class="d-block" src= "{{ $img }}" alt= {{ $event }} />
            </div>
             <div class="la-announcement__event text-sm">{{ strlen($event)>20?substr($event, 0, 20).'....':$event }}</div>
        </div>
        <div class="la-announcement__timestamp text-right text-xs font-normal"> {{ $timestamp }} </div>
    </a>
</li>


