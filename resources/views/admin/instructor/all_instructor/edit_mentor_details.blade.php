@extends('admin.layouts.master')
@section('title', 'Edit Mentor Details - Admin')
@section('body')

<section class="content">
   @include('admin.message')
	<div class="row">
        <div class="col-md-12">
        	<div class="box box-primary">
              	<h3 class="la-admin__section-title">{{ __('adminstaticword.EditMentorDetail') }}</h3>
           	
	          	<div class="panel-body">
	          		<form action="{{ route('instructor.update.details') }}" method="POST" enctype="multipart/form-data">
		                {{ csrf_field() }}
                        <input type="hidden"  name="user_id" value="{{ $user_id }}" />
                        <div class="row">
                            <div class="col-md-3">
                            <label for="exampleInputTit1e">{{ __('adminstaticword.SubscriptionCommission') }}:<sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" name="subscription_commission" value="{{ $mentor_detail['subscription_commission'] }}" placeholder="Subscription Commision">
                            </div>
                        
                            <div class="col-md-3">
                            <label for="exampleInputTit1e">{{ __('adminstaticword.PurchaseCommission') }}:<sup class="redstar">*</sup></label>
                            <input type="text" class="form-control" name="purchase_commission" value="{{ $mentor_detail['purchase_commission'] }}" placeholder="Purchase Commission">
                            </div>
                        </div>
                        
                        <br>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-lg btn-primary px-14"> {{ __('adminstaticword.Save') }}</button>
                                </div>
                            </div>
                        </div>
		          	</form>
	          	</div>
	      	</div>
      	</div>
  	</div>
</section>
@endsection
