@if (Session::has('success'))
    <div class="la-btn__alert-success col-md-4 offset-md-8 animated fadeInDown alert alert-success" role="alert">
        <h6 class="la-btn__alert-msg">{{Session::get('success')}}</h6>
    </div>
@endif

@if (Session::has('delete'))
    <div class="la-btn__alert-danger col-md-4 offset-md-8 animated fadeInDown alert alert-danger" role="alert">
        <h6 class="la-btn__alert-msg">{{Session::get('delete')}}</h6>
    </div>
@endif
