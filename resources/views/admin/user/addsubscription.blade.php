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
            <form id="demo-form" method="post" action="{{route('store.subscription')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}         
            <input type="hidden" name="user_id" value="{{$user_id}}" />
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.StartDate') }}:<sup class="redstar">*</sup></label>
                  <input name="start_date" type="date" class="form-control"/>
                </div>

                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.EndDate') }}:<sup class="redstar">*</sup></label>
                  <input name="end_date" type="date" class="form-control"/>
                </div>
              </div>
              <br> 

              <div class="row">

                <div class="col-md-6">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.Amount') }}:<sup class="redstar">*</sup></label>
                    <input name="amount" type="text" class="form-control"/>
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
   
</script>
@endsection