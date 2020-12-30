@extends('admin/layouts.master')
@section('title', 'Add Creator Payout- Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Course') }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="{{route('addusercourse')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}         
            <input type="hidden" name="user_id" value="{{$user_id}}" />
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Course') }}:<sup class="redstar">*</sup></label>
                  <select name="course_id" id="course_id" class="form-control js-example-basic-single col-md-7 col-12">
                        <option disabled selected>Choose Option</option>
                        @foreach($courses as $c)
                            <option value="{{$c->id}}">{{$c->title}}</option>
                        @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.CourseAmount') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="amount" id="exampleInputTitle" >
                </div>
              </div>
              <br> 

              <div class="row">

                <div class="col-md-6">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.PurchaseType') }}:<sup class="redstar">*</sup></label>
                    <select name="purchase_type" id="purchase_type" class="form-control js-example-basic-single col-md-7 col-12">
                        <option disabled selected>Choose Option</option>
                        <option value="all_classes">All Classes</option>
                        <option value="selected_classes">Selected Classes</option>
                    </select>
                </div>

                <div class="col-md-6" id="class_id_div">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.Classes') }}:<sup class="redstar">*</sup></label>
                    <select name="class_id[]" id="class_id"  class="form-control js-example-basic-single col-md-7 col-12" multiple>
                            <option disabled selected>Please Choose</option>

                    </select>
                </div>               
              </div>
              <br>            
              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-2 btn-primary">+ {{ __('adminstaticword.Save') }}</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col -->
  </div>
</section>
@endsection

@section('script')
<script>
    $('#purchase_type').change(function() {
        if($('#purchase_type').val() == 'all_classes'){
            $('#class_id_div').addClass('d-none');
        }else{
            $('#class_id_div').removeClass('d-none');
        }   
    })

    $('#course_id').change(function() {
        var cat_id = $(this).val();  
        var up = $('#class_id').empty();  
        let urlLike = '{{ url('/get-classes') }}';
        if(cat_id){
          $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"GET",
            url: urlLike,
            data: {course_id: cat_id},
            success:function(data){   
              console.log(data);
              up.append('<option value="0">Please choose</option>');
              $.each(data, function(id, chapter_name) {
                up.append($('<option>', {value:id, text:chapter_name}));
              });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log(XMLHttpRequest);
            }
          });
        }
      });
</script>
@endsection