@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
         
<div class="modal fade show" id="myModal7" z-index="1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-block">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.AddSubCategory') }}</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('child.store') }}" method="POST">
          {{ csrf_field() }}

          <label for="exampleInputTit1e">{{ __('adminstaticword.Category') }}</label>
          <div class="row">
            <div class="col-sm-12">
                <select name="categories" class="form-control js-example-basic-single col-md-7 col-12">
                  @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->title}}</option>
                    @endforeach
                </select>
            </div>
            <br>
          </div>
          <br>
                
          <div class="row">
            <div class="col-sm-12">
              <label for="exampleInputTit1e">{{ __('adminstaticword.SubCategory') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Enter Your subcategory" value="">
            </div>
            <br>
          </div>
          <br>

          <div class="row">
            {{-- <div class="col-md-12">
              <label for="exampleInputTit1e">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
              <input type="text" class="form-control icp-auto icp" name="icon" id="exampleInputTitle" placeholder="Enter your icon" value="">
            </div>
            <br> --}}
            <div class="col-md-12 pt-3 form-group">
              <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
              <br>
                <li class="tg-list-item">
                <input class="la-admin__toggle-switch" id="c101"  type="checkbox"/>
                <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c101"></label>
                
                </li>
                <input type="hidden" name="status" value="0" id="t101">
            </div>
          </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ __('adminstaticword.Save') }}</button>
              </div>
             
            </form>
          </div>
          <!-- /.box -->
 
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
</section> 



