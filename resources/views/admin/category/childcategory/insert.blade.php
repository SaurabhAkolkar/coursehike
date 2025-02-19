@extends('admin/layouts.master')
@section('title', 'Add Child Category - Admin')
@section('body')
@include('admin.category.childcategory.child')
<section class="content">
  @include('admin.message')
  
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.AddChildCategory') }}</h3>
        
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{url('childcategory/')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}
                
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Category') }}</label>
                  <select name="category_id" id="category_id" class="form-control js-example-basic-single col-md-7 col-12">
                    <option value="0">{{ __('adminstaticword.PleaseSelect') }}</option>
                      @foreach($category as $cat)
                        <option value="{{$cat->id}}" @if(old('category_id') == $cat->id) selected @endif>{{$cat->title}}</option>
                      @endforeach
                  </select>
                </div>
              </div><br>

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.SubCategory') }}</label>
                  <select name="subcategories" id="upload_id" class="form-control js-example-basic-single col-md-7 col-xs-12">
                  </select>
                </div>
              </div><br>

              <div class="row  d-none" >
                <div class="col-md-2">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.SubCategory') }}</label>
                  <br>
                  <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal7" title="AddCategory" class="btn btn-md btn-primary">{{ __('adminstaticword.Add') }}</button>

                </div>
              </div>
                  
                     
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Enter your childcategory" value="{{ old('title') }}">
                </div>
              </div><br>
              
              {{-- <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control icp-auto icp" name="icon" id="exampleInputTitle" placeholder="Enter your icon" value="">
                </div>
              </div>
              <br> --}}

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                  <br>
                  <li class="tg-list-item">              
                    <input class="la-admin__toggle-switch" id="status" type="checkbox" name="status" @if(old('status')) checked @endif>
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="status"></label>
                  </li>
                  <input type="hidden"  name="free" value="0" for="status" id="status">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-lg col-md-4 btn-primary">{{ __('adminstaticword.Save') }}</button>
                  </div>
                </div>
              </div>
         
            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->

</section>



@endsection



@section('scripts')

<script>
(function($) {
  "use strict";

  $(function() {
    var urlLike = '{{ url('admin/dropdown') }}';
    $('#category_id').change(function() {
      var up = $('#upload_id').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });

})(jQuery);
</script> 
  
@endsection