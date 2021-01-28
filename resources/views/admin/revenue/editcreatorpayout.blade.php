@extends('admin/layouts.master')
@section('title', 'Add Creator Payout- Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.CreatorPayout') }}</h3>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="{{route('creatorpayout.update')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}         
              {{ method_field('PUT') }}
              <input type="hidden" name="payout_id" value="{{$payout->id}}" />
              <div class="row">

                <div class="col-md-4">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Instructor') }}:<sup class="redstar">*</sup></label>
                  <select name="user_id" class="form-control js-example-basic-single col-md-7 col-12">
                        <option disabled selected>Choose Option</option>
                        @foreach($creators as $c)
                            <option value="{{$c->id}}" @if($payout->user_id == $c->id) selected @endif>{{$c->fullName}}</option>
                        @endforeach
                  </select>

                  @error('user_id')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                    @enderror
                </div>
          
                <div class="col-md-4">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Month') }}:<sup class="redstar">*</sup></label>
                  <input class="form-control month" name="month" id="exampleInputTitle" readonly value="{{$payout->month}}">

                  @error('month')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                    @enderror
                </div>
              </div>
              <br> 

              <div class="row">
                <div class="col-md-4">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.SubscriptionAmount') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="subscription_amount" id="exampleInputTitle" value="{{$payout->subscription_amount}}">
                  @error('subscription_amount')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.CourseAmount') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="course_amount" id="exampleInputTitle" value="{{$payout->course_amount}}">
                  @error('course_amount')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <br>    

               <div class="row">
                  <div class="col-md-4">
                      <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                      <div class="d-flex align-items-center">
                            <input class="la-admin__cp-input" id="c_pending" type="radio" name="status" value="pending" {{ $payout->status == 'pending' ? 'checked' : '' }}> 
                            <label class="mr-3 " for="c_pending">
                              <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label"> {{ __('adminstaticword.Pending') }} </span>
                              </div>
                            </label>


                            <input class="la-admin__cp-input"  type="radio" name="status" id="c_paid" value="paid" {{ $payout->status == 'paid' ? 'checked' : '' }}> 
                            <label class="mr-3" for="c_paid">
                                <div class="la-admin__cp-circle">
                                  <span class="la-admin__cp-radio"></span>
                                  <span class="la-admin__cp-label">  {{ __('Paid') }}</span>
                                </div>
                            </label>
                      </div>
                  </div>
              </div>
              <br>    

              <div class="row">
                  <div class="col-md-8">
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary px-20"> {{ __('adminstaticword.Save') }}</button>
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