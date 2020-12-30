@extends('admin/layouts.master')
@section('title', 'Add Creator Payout- Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.CreatorPayout') }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="{{route('creatorpayout.update')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}         
              {{ method_field('PUT') }}
              <input type="hidden" name="payout_id" value="{{$payout->id}}" />
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Instructor') }}:<sup class="redstar">*</sup></label>
                  <select name="user_id" class="form-control js-example-basic-single col-md-7 col-12">
                        <option disabled selected>Choose Option</option>
                        @foreach($creators as $c)
                            <option value="{{$c->id}}" @if($payout->user_id == $c->id) selected @endif>{{$c->fullName}}</option>
                        @endforeach
                  </select>
                </div>
          
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Month') }}:<sup class="redstar">*</sup></label>
                  <input class="form-control month" name="month" id="exampleInputTitle" readonly value="{{$payout->month}}">
                </div>
              </div>
              <br> 

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.SubscriptionAmount') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="subscription_amount" id="exampleInputTitle" value="{{$payout->subscription_amount}}">
                </div>
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.CourseAmount') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="course_amount" id="exampleInputTitle" value="{{$payout->course_amount}}">
                </div>
              </div>
              <br>    

               <div class="row">
                <div class="col-md-6">
                        <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                            <div class="d-flex">
                                    <input type="radio" name="status" value="pending" {{ $payout->status == 'pending' ? 'checked' : '' }}> <span class="mr-2"> {{ __('adminstaticword.Pending') }} </span>
                                    <input type="radio" name="status" value="paid" {{ $payout->status == 'paid' ? 'checked' : '' }}> <span class="mr-2"> {{ __('Paid') }} </span>
                            </div>
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