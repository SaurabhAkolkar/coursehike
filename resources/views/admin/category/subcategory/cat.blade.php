@if ($errors->any())
<div class="alert alert-danger la-btn__alert-danger col-12 animated fadeInDown" role="alert">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="modal fade show" id="myModal9" z-index="1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-block">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.AddCategory') }}</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('cat.store') }}" method="POST">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-12">
              <label for="category">{{ __('adminstaticword.Name') }}:<sup class="redstar">*</sup></label>
              <input required placeholder="Enter Category name" type="text" class="form-control" name="category">
            </div>
            {{-- <div class="col-md-12 pt-3">
              <label for="icon">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control icp-auto icp" name="icon" required placeholder="Choose Icon">
            </div> --}}


          </div>
         
          <br>

          <div class="row">

          <div class="col-md-6">
                   
            <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
            <br>
            <li class="tg-list-item">
              <input class="la-admin__toggle-switch" id="c1001"  type="checkbox"/>
              <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c1001"></label>
            </li>
            <input type="hidden" name="status" value="0" id="t1001">


          </div>

          <div class="col-md-6">
            <label for="exampleInputDetails">{{ __('adminstaticword.Featured') }}:</label>
              <li class="tg-list-item">              
              <input class="la-admin__toggle-switch" id="featured" type="checkbox" name="featured" >
              <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="featured"></label>
            </li>
            <input type="hidden"  name="free" value="0" for="featured" id="featured">
          </div>

        </div>
          <br>

          <input type="submit" value="Save" class="btn btn-md btn-primary">

        </form>
      </div>

    </div>
  </div>
</div>