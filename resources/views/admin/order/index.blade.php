@extends('admin/layouts.master')
@section('title', 'Revenue - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">

        <div class="row">
          <div class="col-md-6 mt-3">
              <label for="exampleInputTit1e">Choose a Month:<sup class="redstar">*</sup></label>
              <select name="revenue_month" id="revenue_month" class="form-control js-example-basic-single col-12">
                
                  @for ($i = 0; $i < 5; $i++)
                    <option value="{{$i}}" @if( app('request')->input('month') == $i) selected @endif>{{ \Carbon\Carbon::now()->subMonth($i)->format('F Y') }}</option>
                  @endfor                  
              </select>
          </div>
        </div>

        <div class="ml-2 mt-2">
          <h3 class="la-admin__section-title"> {{ __('adminstaticword.Order') }}  - ({{ \Carbon\Carbon::now()->subMonth(app('request')->input('month') ?? 0)->format('F') }})</h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
            <div class="la-admin__revenue-stats">
                <!-- SUBSCRIPTION SECTION: START -->
                {{-- <div class="row">
                    <div class="col-6 col-md-3 mt-4">
                      <div class="la-admin__revenue-title">Total Active Trial Subscriptions</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-total">{{$total_trial_subscriptions}}</span>
                      </div>
                    </div>
                    <div class="col-6 col-md-3 mt-4">
                        <div class="la-admin__revenue-title">Total Active Monthly Subscriptions</div>
                        <div class="la-admin__revenue-info">
                            <span class="la-admin__revenue-total">{{$total_active_monthly_subscriptions}}</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mt-4">
                      <div class="la-admin__revenue-title">Total Active Yearly Subscriptions</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-total">{{$total_active_yearly_subscriptions}}</span>
                      </div>
                    </div>
                </div> --}}
                <!-- SUBSCRIPTION SECTION: END -->


                <!-- SUBSCRIPTION SECTION: START -->
                <div class="row">
                  <div class="col-6 col-md-3 mt-4">
                      <div class="la-admin__revenue-title">Monthly Subscriptions</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-total">{{$current_monthly_subscriptions}}</span>
                          <span class="la-admin__revenue-per">@ $39 / INR 2999 each</span>
                      </div>
                  </div>
                  <div class="col-6 col-md-3 mt-4">
                    <div class="la-admin__revenue-title">Yearly Subscriptions</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-total">{{$current_yearly_subscriptions}}</span>
                        <span class="la-admin__revenue-per">@ $309 / INR 24999 each</span>
                    </div>
                  </div>
                  <div class="col-6 col-md-2 mt-4">
                    <div class="la-admin__revenue-title">Total Subscription Revenue</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-price">${{ $current_month_susbcription_income }}</span>
                    </div>
                  </div>
              </div>
              <!-- SUBSCRIPTION SECTION: END -->

                <!-- ONE TIME SUBSCRIPTION SECTION: START -->
                <div class="row ">
                  {{-- <div class="col-md-3 mt-4 mt-md-6">
                      <div class="la-admin__revenue-title">No. of Learners</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-total">{{$learners}}</span>
                      </div>
                  </div> --}}
                  <div class="col-6 col-md-3 mt-4 mt-md-6">
                    <div class="la-admin__revenue-title">Courses Purchased</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-total">{{$courses_count}}</span>
                    </div>
                  </div>
                  <div class="col-6 col-md-3 mt-4 mt-md-6">
                    <div class="la-admin__revenue-title">Classes Purchased</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-total">{{$classes_count}}</span>
                    </div>
                  </div>
                  <div class="col-6 col-md-2 mt-4 mt-md-6">
                    <div class="la-admin__revenue-title">Total Amount</div>
                      <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-price">${{$current_month_purchase_income}}</span>
                      </div>
                  </div>

              </div>
              <!-- ONE TIME SUBSCRIPTION SECTION: END -->
            </div>

            <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
              <a href="/revenue-excel" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a>
            </div>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>{{ __('adminstaticword.TransactionId') }}</th>
                  <th>{{ __('adminstaticword.User') }}</th>
                  {{-- <th>{{ __('adminstaticword.Course') }}</th> --}}
                  {{-- <th>{{ __('adminstaticword.PaymentMethod') }}</th> --}}
                  <th>{{ __('adminstaticword.TotalAmount') }}</th>
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.Date') }}</th>
                  <th>{{ __('adminstaticword.View') }}</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0;?>
                @foreach($total_purchase->reverse() as $invoice)
                    <tr>
                      <td>{{$invoice->invoice_id}}</td>
                      {{-- <td><?php echo ++$i;?></td> --}}
                      <td>{{$invoice->user->fname.' '.$invoice->user->lname}}</td>
                    
                      <td> {{ $invoice->currency }} {{ $invoice->total }}</td>  
                      <td>{{ $invoice->status }}</td>   
                      <td>{{ $invoice->created_at }}</td>            

                      <td><a class="btn btn-info text-capitalize font-weight-normal px-4 px-md-2" href="{{route('view.order',$invoice->id)}}">{{ __('adminstaticword.View') }}</a>
                      </td>
                    
                    </tr>
                @endforeach
            {{--
              @foreach($orders as $order)
                <?php $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td>{{$order->user['fname']}}</td>                 
                  <td>
                    
                    @if($order->course_id != NULL)
                      {{ $order->courses['title'] }}
                    @else
                      {{ $order->bundle['title'] }}
                    @endif
                  </td>
                  <td>{{$order->transaction_id}}</td>
                  <td>{{$order->payment_method}}</td>
                 

                  @if($order->coupon_discount == !NULL)
                    <td><i class="{{ $order->currency_icon }}"></i>{{ $order->total_amount - $order->coupon_discount }}</td>
                  @else
                    <td><i class="fa {{ $order->currency_icon }}"></i>{{ $order->total_amount }}</td>
                  @endif

                  <td>
                    <form action="{{ route('order.quick',$order->id) }}" method="POST">
                      {{ csrf_field() }}
                      <button  type="Submit" class="btn btn-xs {{ $order->status ==1 ? 'btn-success' : 'btn-danger' }}">
                        @if($order->status ==1)
                          {{ __('adminstaticword.Active') }}
                        @else
                          {{ __('adminstaticword.Deactive') }}
                        @endif
                      </button>
                    </form>
                  </td>

                  <td><a class="text-dark btn btn-success la-admin__edit-btn" href="{{route('view.order',$order->id)}}">{{ __('adminstaticword.View') }}</a>
                  </td>
                  
                  <td>
                    <form  method="post" action="{{url('order/'.$order->id)}}"
                        data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-sm">
                            <i class="la-icon la-icon--lg icon-delete"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach 
              --}}
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection

@section('scripts')
<script>
    $('#revenue_month').change(function() {
      console.log(this.value)
      window.location.href = '/order?month='+this.value;
    });

</script>
@endsection