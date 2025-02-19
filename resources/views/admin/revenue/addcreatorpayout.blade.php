@extends('admin/layouts.master')
@section('title', 'Add Creator Payout- Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.CreatorPayout') }}</h3>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="{{route('creatorpayout.store')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}         

              <div class="row">
                <div class="col-md-4 mt-3">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Instructor') }}:<sup class="redstar">*</sup></label>
                  <select name="user_id" class="form-control js-example-basic-single ">
                        <option disabled selected>Choose Option</option>
                        @foreach($creators as $c)
                            <option value="{{$c->id}}">{{$c->fullName}}</option>
                        @endforeach
                  </select>

                  @error('user_id')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                    @enderror
                </div>
          
                <div class="col-md-4 mt-3">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Month') }}:<sup class="redstar">*</sup></label>
                  <input class="form-control month" name="month" id="exampleInputTitle" readonly>
                  @error('month')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                    @enderror
                </div>
              </div>
             

              <div class="row">
                <div class="col-md-4 mt-3 mt-md-8">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.SubscriptionAmount') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="subscription_amount" id="exampleInputTitle" >
                  @error('subscription_amount')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mt-3 mt-md-8">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.CourseAmount') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="course_amount" id="exampleInputTitle" >
                  @error('course_amount')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <br> 
                
              <div class="row mt-6">
                <div class="col-md-8 text-right">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary px-20">{{ __('adminstaticword.Save') }}</button>
                  </div>
                </div>
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
    $('.month').datepicker( {
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    onClose: function(dateText, inst) { 
        $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }
    });
</script>
@endsection