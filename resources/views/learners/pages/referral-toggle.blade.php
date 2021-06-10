 <!-- Alert Box for Referrals : Start -->
 
 <div class="la-btn__alert-refer col-12 d-flex align-items-center justify-content-between alert alert-warning alert-dismissible fade show" role="alert">
    <div class="d-flex flex-wrap align-items-center">
        <div class="la-btn__alert-refer--msg">Refer a friend and get 1 month free access to all the classes.</div>
        
        @if(Auth::check())
            <a data-toggle="modal" data-target="#referal_share_link"  role="button" class="la-btn__alert-refer--link mx-md-3">Refer a friend</a>
        @else 
            <a data-toggle="modal" data-target="#refer_a_friend"  role="button" class="la-btn__alert-refer--link mx-md-3">Refer a friend</a>
        @endif

        <a href="" role="button" class="la-btn__alert-refer--link mx-3">Know more</a>
    </div>

    <button type="button" class="la-btn__alert-refer--close close py-2" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<!-- Alert Box for Referrals : End -->