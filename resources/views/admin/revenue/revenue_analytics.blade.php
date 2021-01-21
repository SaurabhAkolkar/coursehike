@extends('admin/layouts.master')
@section('title', 'Completed Payouts - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3">  {{ __('adminstaticword.CreatorPayoutAnalytics') }}</h3>
        
        
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th>#</th>
                <th>{{ __('adminstaticword.User') }}</th>
                <th>{{ __('adminstaticword.Payer') }}</th>
                <th>{{ __('adminstaticword.PayTotal') }}</th>
                <th>{{ __('adminstaticword.OrderId') }}</th>
                <th>{{ __('adminstaticword.PayStatus') }}</th>
                <th>{{ __('adminstaticword.View') }}</th>
              </tr>
              </thead>

              <tbody>
                <?php $i=0;?>
                @foreach($payout as $pay)
                <tr>
                  <?php $i++;?>
                    <td><?php echo $i;?></td>
                    <td>{{$pay->user->fname}}</td>
                    <td>{{$pay->payer_id}}</td>
                    <td><i class="fa {{$pay->currency_icon}}"></i> {{$pay->pay_total}}</td>
                    <td>
                      @foreach($pay->order_id as $order)
                        @php
                            $id= App\Order::find($order);
                        @endphp
                        {{ $id['order_id'] }},
                        
                      @endforeach
                    <td>
                      @if($pay->pay_status ==1)
                        {{ __('adminstaticword.Recieved') }}
                      @else
                        {{ __('adminstaticword.Pending') }}
                      @endif
                    </td>

                    <td>
                      <a class="btn btn-primary btn-sm" href="{{ route('completed.view', $pay->id) }}">{{ __('adminstaticword.View') }}</a>
                    </td>
                    
                  

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
