<li class="la-announcement__item">
    <a class="la-announcement__link" href="/releases/{{ $url }}">
        <div class="la-announcement__link-inner d-flex flex-row align-items-center">
            <div class="la-announcement__eprfle">
                <img class="d-block lazy" src= "{{ $img }}" data-src= "{{ $img }}" alt= "{{ $event }}" />
            </div>
             <div class="la-announcement__event text-sm ml-3 pr-2">{{ strlen($event)>30?substr($event, 0, 30).'....':$event }}</div>
        </div>
        <div class="la-announcement__timestamp text-right text-xs font-normal"> {{ $timestamp }} </div>
    </a>
</li>


