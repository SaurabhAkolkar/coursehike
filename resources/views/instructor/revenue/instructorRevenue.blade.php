@extends('admin/layouts.master')
@section('title', 'All Pending Payouts - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">  {{ __('adminstaticword.InstructorRevenue') }}</h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="la-admin__revenue-stats">
            <!-- TOTAL WATCH TIME SECTION: START -->
            <div class="row my-md-8">
                  <div class="col-md-3">
                      <div class="la-admin__revenue-title">Subscriber Total Watch Time</div>
                      <div class="la-admin__revenue-info">
                          <span class="la-admin__revenue-total">{{$payout['watch_time']}}</span>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="la-admin__revenue-title">Subscription Estimated Revenue</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-price">${{$payout['total_income']}}</span>
                    </div>
                  </div>
              </div>
              <div class="row my-md-8">
                <div class="col-md-3">
                    <div class="la-admin__revenue-title">No. of Learners</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-total">{{count($payout['learners'])}}</span>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="la-admin__revenue-title">Courses Purchased</div>
                  <div class="la-admin__revenue-info">
                      <span class="la-admin__revenue-total">{{$courses_count}}</span>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="la-admin__revenue-title">Classes Purchased</div>
                  <div class="la-admin__revenue-info">
                      <span class="la-admin__revenue-total">{{$classes}}</span>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="la-admin__revenue-title">Total Amount</div>
                    <div class="la-admin__revenue-info">
                      <span class="la-admin__revenue-price">${{$total_earning}}</span>
                    </div>
                </div>
            </div>
            <!-- TOTAL WATCH TIME SECTION: END -->
          </div>

      
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th>#</th>
                <th>{{ __('adminstaticword.User') }}</th>
                <th>{{ __('adminstaticword.Course') }}</th>
                <th>{{ __('adminstaticword.TransactionId') }}</th>
                <th>{{ __('adminstaticword.TotalAmount') }}</th>
              </tr>
              </thead>
              <tbody>
                    <?php $i=0;?>

                    @foreach($invoiceDetails as $id)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{ $id->fname.' '.$id->lname }}</td>
                            <td>{{json_decode($id->title)->en}}</td>
                            <td>{{ $id->id }}</td>
                            <td>$ {{ $id->sub_total }}</td>
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
