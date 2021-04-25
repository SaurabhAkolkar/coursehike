@extends('admin/layouts.master')
@section('title', 'Completed Payouts - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3">  {{ __('adminstaticword.CreatorPayoutAnalytics') }} - Last Month ({{ \Carbon\Carbon::now()->subMonth()->format('F') }})</h3>
        
        
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th><small>Creator ID</small></th>
                <th><small>Creator Name</small></th>
                <th><small>Email</small></th>
                <th><small>No. of Learners</small></th>
                <th><small>Total watch time</small></th>
                <th><small>Subscribers Total Revenue</small></th>
                <th><small>Courses & Classes Purchased</small></th>
                <th><small>Purchase Revenue</small></th>
                <th><small>Month</small></th>
                <th><small>Year</small></th>
                {{-- <th>Actions</th> --}}
              
              </tr>
              </thead>

              <tbody>
                @foreach($creators as $creator)
                <tr>
                  {{-- {{dd($creator)}} --}}
                  <td>{{$creator['id']}}</td>
                  <td>{{$creator['name']}}</td>
                  <td>{{$creator['email']}}</td>
                  <td>{{count($creator['payout']['learners'])}}</td>
                  <td>{{$creator['payout']['watch_time']}}</td>
                  <td>${{$creator['payout']['subscribers_total_income']}}</td>
                  <td>{{$creator['payout']['course_sale']['count']}}</td>
                  <td>${{$creator['payout']['course_sale']['total_income']}}</td>
                  <td>{{$creator['month']}}</td>
                  <td>{{$creator['year']}}</td>

                  {{-- <td>
                    <a class="btn btn-primary btn-sm" href="">{{ __('adminstaticword.View') }}</a>
                  </td> --}}
                    
                  

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
