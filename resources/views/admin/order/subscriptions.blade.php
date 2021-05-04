@extends('admin/layouts.master')
@section('title', 'Revenue - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center ml-2">
          <h3 class="la-admin__section-title"> {{ __('adminstaticword.Order') }}</h3>
          {{-- @if(Auth::User()->role == "admin")
            <a class="btn btn-info btn-md" href="{{route('order.create')}}">+ Enroll&nbsp; {{ __('adminstaticword.User') }}</a>
          @endif --}}
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">


            <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
              <a href="/revenue-excel" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a>
            </div>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminstaticword.TransactionId') }}</th>
                  <th>{{ __('adminstaticword.User') }}</th>
                  {{-- <th>{{ __('adminstaticword.Course') }}</th> --}}
                  {{-- <th>{{ __('adminstaticword.PaymentMethod') }}</th> --}}
                  <th>{{ __('adminstaticword.Currency') }}</th>
                  <th>{{ __('adminstaticword.TotalAmount') }}</th>
                  <th>{{ __('adminstaticword.Coupon') }}</th>
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.Date') }}</th>
                  <th>{{ __('adminstaticword.View') }}</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0;?>
                @foreach($subscriptions as $invoice)
                    <tr>
                      <td><?php echo ++$i;?></td>
                      <td>{{$invoice->invoice_id}}</td>
                      <td>{{$invoice->user->fname.' '.$invoice->user->lname}}</td>
                    
                      <td>{{ $invoice->currency?$invoice->currency:'USD' }}</td>  
                      <td> {{ $invoice->total }}</td>  
                      <td>{{ $invoice->coupon?$invoice->coupon->code:'No Coupon' }}</td>  
                      <td>{{ ucfirst($invoice->status) }}</td>   
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
