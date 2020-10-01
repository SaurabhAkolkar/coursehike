<li class="la-dash__recent-item">
    <div class="la-dash__recent-info">
        <div class="la-dash__recent-img">
            <img src= {{ $userImg }} class="d-block" alt= {{ $userName }}>
        </div>
        
        <div class="la-dash__recent-desc">
            <div class="la-dash__recent-title"> {{ $userName }} </div>
            <div class="la-dash__recent-tag"> {{ $userTag }}</div>
        </div>
    </div>

    <div class="la-dash__recent-date">
        <span class="la-dash__recent-subdate"> {{ $userDate }}</span>
    </div>
</li>
