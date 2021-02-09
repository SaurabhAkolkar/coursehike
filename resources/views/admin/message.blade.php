@if (Session::has('success'))
<div class="la-btn__alert position-relative">
    <div class="la-btn__alert-success col-lg-4 offset-lg-3 alert alert-success alert-dismissible fade show" role="alert">
        <span class="la-btn__alert-msg">{{Session::get('success')}}</span>
        <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="color:#56188C">&times;</span>
        </button>
    </div>
</div>
@endif

@if (Session::has('delete'))
    <div class="la-btn__alert position-relative">
        <div class="la-btn__alert-danger col-lg-4 offset-lg-3 alert alert-danger alert-dismissible fade show" role="alert">
            <span class="la-btn__alert-msg">{{Session::get('delete')}}</span>
        </div>
        <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="color:#56188C">&times;</span>
        </button>
    </div>
@endif
