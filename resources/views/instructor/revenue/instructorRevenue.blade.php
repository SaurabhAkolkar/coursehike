@extends('admin/layouts.master')
@section('title', 'All Pending Payouts - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        
        <div class="row">
          <div class="col-md-6 mt-3">
              <label for="exampleInputTit1e">Choose a Month:<sup class="redstar">*</sup></label>
              {{-- @dd(app('request')->input('month')) --}}
              <select name="revenue_month" id="revenue_month" class="form-control js-example-basic-single col-12">
                
                  @for ($i = 0; $i < 5; $i++)
                    <option value="{{$i}}" @if( app('request')->input('month') == $i) selected @endif>{{ \Carbon\Carbon::now()->subMonth($i)->format('F Y') }}</option>
                  @endfor
                  <option value="all" @if( app('request')->input('month') == 'all') selected @endif>All time Revenue</option>
              </select>
          </div>
        </div>

        <h3 class="la-admin__section-title ml-2 mb-0">  {{ __('adminstaticword.InstructorRevenue') }} - ({{ app('request')->input('month') == "all" ? "All time" : \Carbon\Carbon::now()->subMonth(app('request')->input('month') ?? 0)->format('F') }})</h3>
        
        <div class="box-body">
          <div class="la-admin__revenue-stats">
            <!-- TOTAL WATCH TIME SECTION: START -->
            <div class="row ">
                  <div class="col-6 col-md-3 mt-3 mt-md-6">
                      <div class="la-admin__revenue-title">No. of Learners</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-total">{{count($payout['learners'])}}</span>
                      </div>
                  </div>
                  <div class="col-6 col-md-3 mt-3 mt-md-6">
                      <div class="la-admin__revenue-title">Subscriber Total Watch Time</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-total">{{$payout['watch_time']}}</span>
                      </div>
                  </div>
                  <div class="col-6 col-md-3 mt-3 mt-md-6">
                    <div class="la-admin__revenue-title">Subscription Estimated Revenue</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-price">${{round($payout['total_income'], 2)}}</span>
                    </div>
                  </div>
              </div>
              <div class="row mb-md-6">
                <div class="col-6 col-md-3 mt-3 mt-md-6">
                  <div class="la-admin__revenue-title">Courses & Classes Purchased</div>
                  <div class="la-admin__revenue-info">
                      <span class="la-admin__revenue-total">{{$total_earning['count']}}</span>
                  </div>
                </div>
                {{-- <div class="col-6 col-md-3 mt-3 mt-md-6">
                  <div class="la-admin__revenue-title">Classes Purchased</div>
                  <div class="la-admin__revenue-info">
                      <span class="la-admin__revenue-total">{{$classes}}</span>
                  </div>
                </div> --}}
                {{-- @dd($total_earning) --}}
                <div class="col-6 col-md-2 mt-3 mt-md-6">
                  <div class="la-admin__revenue-title">Total Amount</div>
                    <div class="la-admin__revenue-info">
                      <span class="la-admin__revenue-price">${{$total_earning['total_income']}}</span>
                    </div>
                </div>
            </div>
            <!-- TOTAL WATCH TIME SECTION: END -->
          </div>

      
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th>#</th>
                <th>{{ __('adminstaticword.Date') }}</th>
                <th>{{ __('adminstaticword.User') }}</th>
                <th>{{ __('adminstaticword.Course') }}</th>
                <th>{{ __('adminstaticword.TransactionId') }}</th>
                <th>{{ __('adminstaticword.SoldAmount') }}</th>
                <th>{{ __('adminstaticword.PurchaseCommission') }}</th>
                <th>{{ __('adminstaticword.ReceivableAmount') }}</th>
              </tr>
              </thead>
              <tbody>
                    <?php $i=0;?>
                    @foreach( array_reverse($total_earning['purchase_logs']) as $purchase_invoice)
                    
                      @php 
                      $invoice_details = $purchase_invoice->user_invoice_details;
                      if($invoice_details->currency == "INR" || $invoice_details->currency == null)
                        $price = $invoice_details->total / 75;
                      else
                        $price = $invoice_details->total;
                      @endphp
					<tr>
						<td>{{++$i}}</td>
						<td>{{ $purchase_invoice->created_at }}</td>
						<td>{{ $purchase_invoice->user->fname.' '.$purchase_invoice->user->lname }}</td>

						@if($purchase_invoice->bundle_id != null)
							<td>{{$purchase_invoice->bundle->title}}</td>
							<td>{{ $invoice_details->invoice_id }}</td>
						@else
							<td>{{$purchase_invoice->course->title}}</td>
							<td>{{ $invoice_details->invoice_id }}</td>
						@endif

						<td>$ {{ round($price, 2) }}</td>
						<td style="color:#d44141">- $ {{ round($price * ( (100 - $mentor_commission) / 100), 2) }}</td>
						<td style="color:#1EC812">$ {{ round($price * ($mentor_commission / 100), 2) }}</td>
					</tr>
                    @endforeach
              </tbody>
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
      window.location.href = '/pending/revenue?month='+this.value;
    });

</script>
@endsection