@extends('admin/layouts.master')
@section('title', 'Add User Subscription- Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Add') }} / {{__('adminstaticword.Update')}} {{ __('adminstaticword.Subscription') }}</h3>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="{{route('store.subscription')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{ csrf_field() }}         
            <input type="hidden" name="user_id" value="{{$user_id}}" />
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.StartDate') }}:<sup class="redstar">*</sup></label>
                  <input name="start_date" type="date" class="form-control" value="{{ old('start_date') }}"/>
                    @error('start_date')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mt-4">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.EndDate') }}:<sup class="redstar">*</sup></label>
                  <input name="end_date" type="date" class="form-control" value="{{ old('end_date') }}"/>
                      @error('end_date')
                          <div class="alert alert-danger">
                              {{$message}}
                          </div>
                      @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mt-4">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.Amount') }}:<sup class="redstar">*</sup></label>
                    <input name="amount" type="text" class="form-control" value="{{ old('amount') }}"/>
                    @error('amount')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>            
              </div>

              <div class="row">
                <div class="col-md-6 mt-4">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.PlanSelection') }}:<sup class="redstar">*</sup></label>
                    <select name = "plan_selection" required class="form-control">
                        <option disabled selected>-- Select Plan Selection--</option>
                        <option value="monthly-global" @if(old('plan_selction') == 'monthly-global') selected @endif>Monthly USD</option>
                        <option value="yearly-global" @if(old('plan_selction') == 'yearly-global') selected @endif>Yearly USD</option>
                        <option value="monthly-india" @if(old('plan_selction') == 'monthly-india') selected @endif>Monthly INR</option>                        
                        <option value="yearly-india" @if(old('plan_selction') == 'yearly-india') selected @endif>Yearly INR</option>
                    </select>
                     
                </div>            
              </div>
              
              <div class="row">
                <div class="col-md-6 mt-8">        
                  <div class="box-footer">
                    <button type="submit" class="btn btn-lg btn-primary px-14"> {{ __('adminstaticword.Save') }}</button>
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
   
</script>
@endsection