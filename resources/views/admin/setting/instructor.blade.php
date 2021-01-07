@extends('admin.layouts.master')
@section('title', 'Mentors Settings - Admin')
@section('body')
 
<section class="content">
   	@include('admin.message')
  	<div class="row">
        <div class="col-md-6">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title ">{{ __('adminstaticword.InstructorSettings') }}</h3>
           		
	          	<div class="panel-body">
	          		<form action="{{ route('instructor.update') }}" method="POST">
		                {{ csrf_field() }}
		                {{ method_field('POST') }}

		                <div class="row">
							<div class="col-md-12">
								<label for="Revenue">Instructor Revenue:</label>
								<div class="input-group">
					                <input min="1" max="100" class="form-control" name="instructor_revenue" type="number" value="{{ $setting['instructor_revenue'] }}" id="revenue"  placeholder="Enter revenue percentage" class="{{ $errors->has('instructor_revenue') ? ' is-invalid' : '' }} form-control">
					                <span class="input-group-addon px-3 py-1 border font-weight-bold">%</span>
					            </div>
							</div>
						</div>
						<br>

						<div class="row">
							
							<div class="col-md-12">
								<label for="Revenue">Admin Revenue:</label>
								<div class="input-group">
					                <input min="1" max="100" class="form-control" name="admin_revenue" type="number" value="{{ 100 - $setting['instructor_revenue'] }}" id="revenue"  placeholder="Enter revenue percentage" class="{{ $errors->has('admin_revenue') ? ' is-invalid' : '' }} form-control" readonly>
					                <span class="input-group-addon px-3 py-1 border font-weight-bold">%</span>
					             </div>
					            
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-md-6">
								<label for="">{{ __('adminstaticword.PaytmEnable') }}: </label>
								<li class="tg-list-item">              
						            <input class="la-admin__toggle-switch" id="paytm" type="checkbox" name="paytm_enable" {{ $setting['paytm_enable'] == '1' ? 'checked' : '' }} >
						            <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="paytm"></label>
					            </li>
					            <input type="hidden"  name="free" value="0" for="paytm" id="paytm">
							</div>
						
							<div class="col-md-6">
								<label for="">{{ __('adminstaticword.PaypalEnable') }}: </label>
								<li class="tg-list-item">              
						            <input class="la-admin__toggle-switch" id="paypal" type="checkbox" name="paypal_enable" {{ $setting['paypal_enable'] == '1' ? 'checked' : '' }} >
						            <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="paypal"></label>
					            </li>
					            <input type="hidden"  name="free" value="0" for="paypal" id="paypal">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6 mt-2">
								<label for="">{{ __('adminstaticword.BankTransferEnable') }}: </label>
								<li class="tg-list-item">              
						            <input class="la-admin__toggle-switch" id="bank" type="checkbox" name="bank_enable" {{ $setting['bank_enable'] == '1' ? 'checked' : '' }} >
						            <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="bank"></label>
					            </li>
					            <input type="hidden"  name="free" value="0" for="bank" id="bank">
							</div>
						</div>
						<br>
						<br>
						
				
						
						<div class="box-footer">
		              		<button value="" type="submit"  class="btn btn-md col-md-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
		              	</div>

		          	</form>
	          	</div>
	      	</div>
      	</div>
    </div>
</section>
@endsection



@section('script')



</script>

@endsection


