@if (Session::has('success'))
    <div class="la-btn__alert-success col-md-6 offset-md-3 animated fadeInDown alert alert-success" role="alert">
        <span class="la-btn__alert-msg">{{Session::get('success')}}</span>
    </div>
@endif

@if (Session::has('delete'))
    <div class="la-btn__alert-danger col-md-6 offset-md-3 animated fadeInDown alert alert-danger" role="alert">
        <span class="la-btn__alert-msg">{{Session::get('delete')}}</span>
    </div>
@endif
