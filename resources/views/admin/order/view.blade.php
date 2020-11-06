@extends('admin.layouts.master')
@section('title', 'View Order - Admin')
@section('body')
 
<section class="content">
   @include('admin.message')
    <!-- INVOICE PAGE: START -->
    <div class="row px-5">
      <div class="col-12">
          <div class="la-admin__invoice d-flex justify-content-between">
              <div class="la-admin__invoice-logo">
                  <img src="{{ asset('images/logo/'.$setting->logo) }}" alt="logo"  class="img-fluid" />
              </div>

              <div class="la-admin__invoice-address text-right">
                  <p>K2, Old Sonal Industrial Est, Kanchpada, <br/> Malad Link Road, Malad West, Mumbai <br/> 400064. MH, India </p> 
                  <a  href="tel: +91 9999999999"><span class="la-icon--lg icon-contact-number"></span> +91 9999999999</a> <br/>
                  <a href="mailto: ask@learnitlikealiens.com"><span class="la-icon--lg icon-mail-id"></span> ask@learnitlikealiens.com</a>
              </div>
          </div>
      </div>
     
      <div class="col-12">
          <div class="la-admin__invoice-details d-flex justify-content-between py-5">
              <div class="la-admin__cust-info">
                  <h6>SOLD TO</h6> 
                  <div class="la-admin__cust-name"> {{ $show->courses->user['fname'] }} </div>
                  <div class="la-admin__cust-address">Address: {{ $show->courses->user['address'] }}<br>
                    @if($show->courses->user['state_id'] == !NULL)
                    {{ $show->courses->user->state['name'] }},
                    @endif
                    @if($show->courses->user['country_id'] == !NULL)
                      {{ $show->courses->user->country['name'] }}
                    @endif
                  </div>
                  <a class="la-admin__cust-mobile" href="tel: {{ $show->courses->user['mobile'] }}"><span class="la-icon--lg icon-contact-number"></span> +{{ $show->courses->user['mobile'] }}</a> <br/>
                  <a class="la-admin__cust-mail" href="mailto: {{ $show->courses->user['email'] }}"><span class="la-icon--lg icon-mail-id"></span> {{ $show->courses->user['email'] }}</a>
              </div>

              <div class="la-admin__cust-invoice text-right">
                <div>
                  <span class="la-admin__invoice-date">DATE</span> <br/>
                  <span class="la-admin__date-format">{{ __('adminstaticword.Date') }}:&nbsp;{{ date('jS F Y', strtotime($show['created_at'])) }} </span>
                </div>
                  
                <div>
                  <span class="la-admin__invoice-order">ORDER ID </span><br/>
                  <span class="la-admin__invoice-id">{{ $show['order_id'] }}</span>
                </div>
              </div>
          </div>
      </div>

      <div class="col-12">
          <div class="la-admin__invoice-solditems">
              <h6>Items</h6>
              <ul class="la-admin__invoice-list">
                  <x-admin-invoice
                    :img="$show->courses['preview_image']"
                    :course="$show->courses['title']"
                    :profile="$show->courses->user['fname']"
                    :price="$show['total_amount']"
                    />
              </ul>

              @if($show->bundle_id != NULL)
                <ul class="la-admin__invoice-list">


                  @foreach($show->bundle_course_id as $bundle_course)
                      @php
                        $coursess = App\Course::where('id', $bundle_course)->first();
                      @endphp

                        <x-admin-invoice
                          :img="$coursess->preview_image"
                          :course="$coursess->title"
                          :profile="$item->profile"
                          :price="$item->price"
                          />

                      {{-- <div class="purchase-table table-responsive">
                        <table class="table">

                          <tbody>
                            <tr>
                              <td>
                                <div class="purchase-history-course-img d-inline-flex">
                                
                                    @if($coursess['preview_image'] !== NULL && $coursess['preview_image'] !== '')
                                        <img src="{{ asset('images/course/'. $coursess->preview_image) }}" class="img-fluid" alt="course">
                                      @else
                                        <img src="{{ Avatar::create($coursess->title)->toBase64() }}" class="img-fluid" alt="course">
                                      @endif

                                </div>
                                <div class="purchase-history-course-title d-inline-flex" style="vertical-align: top;">
                                  {{ $coursess->title }}
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div> --}}
                  @endforeach
                </ul>
              @endif

              <div class="la-admin__invoice-total d-flex justify-content-end">
                  <p class="la-admin__total-title mr-5"> Total </p>
                  <p class="la-admin__total-price" > $ <span>{{$show['total_amount']}}</span> </p>
              </div>
          </div>
      </div>
   
      <div class="col-md-5">
          <div class="la-admin__invoice-payment">
              <div class="la-admin__payment-title">PAYMENT DETAILS</div>
              <div class="la-admin__payment-status d-flex flex-row no-gutters">
                  <span class="col mr-auto">Payment Status</span>
                  <span class="col">Successful</span>
              </div>

              <div class="la-admin__payment-method d-flex flex-row no-gutters">
                <span class="col mr-auto">Payment Method</span>
                <span class="col">PayTM</span>
              </div>

              <div class="la-admin__payment-id  d-flex flex-row no-gutters">
                <span class="col mr-auto">Transaction Id</span>
                <span class="col">dssxjshaldjkdhuhf</span>
              </div>
          </div>
      </div>
    </div>
    <!-- INVOICE PAGE: END -->


    {{-- <div class="row">
      <div class="col-md-12">
      	<div class="box box-primary">
           	<div class="box-header with-border">
            	<h3 class="box-title">{{ __('adminstaticword.Invoice') }}</h3>
         		</div>
          	<div class="panel-body">
				
  					<div id="printableArea">
  						<!-- title row -->
  						<div class="row">
  						    <div class="col-12">
  						      <h2 class="page-header">
  						        @if($setting->logo_type == 'L')
                        <div class="logo-invoice">
                          <img src="{{ asset('images/logo/'.$setting->logo) }}">
                        </div>
                      @else()
                          <a href="{{ url('/') }}"><b><div class="logotext" >{{ $setting->project_title }}</div></b></a>
                      @endif
  						        <small>{{ __('adminstaticword.Date') }}:&nbsp;{{ date('jS F Y', strtotime($show['created_at'])) }}</small>
  						      </h2>
  						    </div>
  						    <!-- /.col -->
  						</div>
  						<!-- info row -->
              <div class="view-order">
    						<div class="row invoice-info">
    						    <div class="col-sm-4 invoice-col">
    						      {{ __('adminstaticword.From') }}:
                      @if($show->course_id != NULL)
      						      <address>
      						        <strong>{{ $show->courses->user['fname'] }}</strong><br>
      						        Address: {{ $show->courses->user['address'] }}<br>
                          @if($show->courses->user['state_id'] == !NULL)
                          {{ $show->courses->user->state['name'] }},
                          @endif
                          @if($show->courses->user['country_id'] == !NULL)
                            {{ $show->courses->user->country['name'] }}
                          @endif
                          <br>
      						        {{ __('adminstaticword.Phone') }}:&nbsp;{{ $show->courses->user['mobile'] }}<br>
      						        {{ __('adminstaticword.Email') }}:&nbsp;{{ $show->courses->user['email'] }}
      						      </address>
                      @else
                        <address>
                          <strong>{{ $show->bundle->user['fname'] }}</strong><br>
                          
                         
                          {{ __('frontstaticword.address') }}: {{ $show->bundle->user['address'] }}<br>
                            @if($show->bundle->user->state_id == !NULL)
                              {{ $show->bundle->user->state['name'] }},
                            @endif
                            @if($show->bundle->user->state_id == !NULL)
                              {{ $show->bundle->user->country['name'] }}
                            @endif
                            <br>

                          {{ __('frontstaticword.Phone') }}: {{ $show->bundle->user['mobile'] }}<br>
                          {{ __('frontstaticword.Email') }}: {{ $show->bundle->user['email'] }}
                        </address>
                      @endif
    						    </div>
    						    <!-- /.col -->
    						    <div class="col-sm-4 invoice-col">
    						      {{ __('adminstaticword.To') }}:
    						      <address>
    						        <strong>{{ $show->user['fname'] }}</strong><br>
                          {{ __('adminstaticword.Address') }}: {{ $show->user['address'] }}<br>
                        @if($show->user['state_id'] == !NULL)
                          {{ $show->user->state['name'] }},
                        @endif
                        @if($show->user['country_id'] == !NULL)
                          {{ $show->user->country['name'] }}<br>
                        @endif
    						          {{ __('adminstaticword.Phone') }}:&nbsp;{{ $show->user['mobile'] }}<br>
    						          {{ __('adminstaticword.Email') }}:&nbsp;{{ $show->user['email'] }}
    						      </address>
    						    </div>
    						    <!-- /.col -->
    						    <div class="col-sm-4 invoice-col">
    						      <br>
                      <b>{{ __('adminstaticword.OrderID') }}:</b> {{ $show['order_id'] }}<br>
    						      <b>{{ __('adminstaticword.TransactionId') }}:</b>&nbsp;{{ $show['transaction_id'] }}<br>
    						      <b>{{ __('adminstaticword.PaymentMethod') }}:</b>&nbsp;{{ $show['payment_method'] }}<br>
    						      <b>{{ __('adminstaticword.Currency') }}:</b>&nbsp;{{ $show['currency'] }}
                      <b>{{ __('frontstaticword.PaymentStatus') }}:</b> 
                      @if($show->status ==1)
                        {{ __('adminstaticword.Recieved') }}
                      @else 
                        {{ __('adminstaticword.Pending') }}
                      @endif
                      </br>
                      <b>{{ __('adminstaticword.Enrollon') }}:</b> {{ date('jS F Y', strtotime($show['created_at'])) }}</br>
                      <b>
                        @if($show->enroll_expire != NULL)
                          {{ __('adminstaticword.EnrollEnd') }}:</b> {{ date('jS F Y', strtotime($show['enroll_expire'])) }}</br>
                        @endif
                        <br>

                        @if($show->proof != NULL)
                           <a href="{{ asset('images/order/'.$show->proof) }}" download="{{$show->proof}}" title="Course">Download Proof <i class="fa fa-download"></i></a></br>
                        @endif
                        <br>
                        
    						    </div>
    						    <!-- /.col -->
    						</div>
              </div>
  						<!-- /.row -->
  		          		
          		<div class="order-table">
          			<table class="table table-striped">
  							  <thead>
  							    <tr>
  							      <th>{{ __('adminstaticword.Course') }}</th>
  							      <th>{{ __('adminstaticword.Instructor') }}</th>
                      <th>{{ __('adminstaticword.Currency') }}</th>
                      @if($show->coupon_discount != 0)
                      <th>{{ __('adminstaticword.CouponDiscount') }}</th>
                      @endif
  							      <th>{{ __('adminstaticword.Total') }}</th>
  							    </tr>
  							  </thead>
  							  <tbody>
  							    <tr>
  							      <td>
                        @if($show->course_id != NULL)
                          {{ $show->courses['title'] }}
                        @else
                          {{ $show->bundle['title'] }}
                        @endif
                      </td>
  							      <td>
                        @if($show->course_id != NULL)
                          {{ $show->courses->user['email'] }}
                        @else
                          {{ $show->bundle->user['email'] }}
                        @endif
                      </td>
                      <td>{{ $show['currency'] }}</td>

                      @if($show->coupon_discount != 0)
                      <td>
                        (-)&nbsp;<i class="{{ $show['currency_icon'] }}"></i>{{ $show['coupon_discount'] }}
                      </td>
                      @endif

  							      <td>
                        @if($show->coupon_discount == !NULL)
                          <i class="fa {{ $show['currency_icon'] }}"></i>{{ $show['total_amount'] - $show['coupon_discount'] }}
                        @else
                          <i class="fa {{ $show['currency_icon'] }}"></i>{{ $show['total_amount'] }}
                        @endif
                      </td>
  							    </tr>
  							  </tbody>
  							</table>
          		</div>

              @if($show->bundle_id != NULL)

                @foreach($show->bundle_course_id as $bundle_course)
                    @php
                      $coursess = App\Course::where('id', $bundle_course)->first();
                    @endphp

                    <div class="purchase-table table-responsive">
                      <table class="table">

                        <tbody>
                          <tr>
                            <td>
                              <div class="purchase-history-course-img d-inline-flex">
                              
                                  @if($coursess['preview_image'] !== NULL && $coursess['preview_image'] !== '')
                                      <img src="{{ asset('images/course/'. $coursess->preview_image) }}" class="img-fluid" alt="course">
                                    @else
                                      <img src="{{ Avatar::create($coursess->title)->toBase64() }}" class="img-fluid" alt="course">
                                    @endif

                              </div>
                              <div class="purchase-history-course-title d-inline-flex" style="vertical-align: top;">
                                {{ $coursess->title }}
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                @endforeach

              @endif

            </div>
  					
  					<input type="button" class="btn btn-primary"  onclick="printDiv('printableArea')" value="Print Invoice" />

          	</div>
      	</div>
    	</div>
    </div> --}}
</section>

@endsection


@section('scripts')

<script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
  	});
</script>

<script lang='javascript'>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	}
</script>
@endsection


