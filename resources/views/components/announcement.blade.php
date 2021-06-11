<div class="la-announcement__item">
    <a class="la-announcement__link d-md-flex align-items-center justify-content-between" href="/releases/{{ $url }}">
        <div class="col-md-10 px-0 la-announcement__link-inner d-flex flex-row align-items-center">
            <div class="la-announcement__eprfle">
                <img class="d-block lazy" src= "{{ $img }}" data-src= "{{ $img }}" alt= "{{ $event }}" />
            </div>
             <div class="la-announcement__info ml-3 pr-2">
                 <div class="la-announcement__info-tag">Bundle Course</div>
                 <p class="la-announcement__info-event leading-tight mb-1">{{ strlen($event)>30?substr($event, 0, 30).'....':$event }}</p>
                 <p class="la-announcement__info-name mb-1">Sunny Bhanushali</p>
                 <div class="la-announcement__info-duration">2h 15m</div>
            </div>
        </div>
        <div class="col-md-2 px-0 la-announcement__timestamp text-right"> {{ $timestamp }} </div>
    </a>
</div>


