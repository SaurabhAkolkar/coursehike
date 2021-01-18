
<li class="la-dash__recent-item">
    <div class="col-8 la-dash__recent-info">
        <div class="la-dash__recent-img">
            <img src= {{ $courseImg }} class="d-block" alt= {{ $courseName }}>
        </div>
        
        <div class="la-dash__recent-desc">
            <div class="la-dash__recent-title"> {{ $courseName }} </div>
            <div class="la-dash__recent-tag"> {{ $courseTag }}</div>
        </div>
    </div>

    <div class="col-2 la-dash__recent-date">
        <span class="la-dash__recent-subdate"> {{ $courseDate }}</span>
    </div>

    <div class="col-2 text-right la-dash__recent-price">
        <span class="la-dash__recent-pricetag"> $ {{ $coursePrice }}</span>
    </div>
</li>


