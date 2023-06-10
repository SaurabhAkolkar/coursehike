@extends('admin/layouts.master')
@section('title', 'Pending Payout - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-2">  {{ __('adminstaticword.PendingPayout') }}</h3>
        
        <div class="box-body">
          <div class="la-admin__revenue-stats">
            <!-- TOTAL WATCH TIME SECTION: START -->
            {{-- <div class="row my-4">
                <div class="col-md-3">
                    <div class="la-admin__revenue-title">Total Watch Time</div>
                    <div class="la-admin__revenue-info">
                        <span class="la-admin__revenue-total">15h:25m:00s</span>
                    </div>
                </div>
                
                <div class="col-md-3">
                  <div class="la-admin__revenue-title">Total Earnings</div>
                  <div class="la-admin__revenue-info">
                      <span class="la-admin__revenue-price">$9.8k</span>
                      <span class="la-admin__revenue-per">( Last Month )</span>
                  </div>
                </div>
            </div> --}}
            <!-- TOTAL WATCH TIME SECTION: END -->
          </div>

      
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <th>#</th>
                <th>{{ __('adminstaticword.User') }}</th>
                <th>{{ __('adminstaticword.Course') }}</th>
                <th>{{ __('adminstaticword.TransactionId') }}</th>
                <th>{{ __('adminstaticword.TotalAmount') }}</th>
                <th>{{ __('adminstaticword.Delete') }}</th>
              </tr>
              </thead>
              <tbody>
                    <?php $i=0;?>
                    @foreach($payout as $pay)
                    <tr>
                      <?php $i++;?>
                      <td><?php echo $i;?></td>
                        <td>{{$pay->user->fname}}</td>
                        <td>{{$pay->courses->title}}</td>
                        <td>{{$pay->order->order_id}}</td>
                        <td><i class="fa {{$pay->currency_icon}}"></i>{{$pay->instructor_revenue}}</td> 
                      

                      <td><form  method="post" action="{{url('instructoranswer/'.$pay->id)}}
                          "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
                        </form>
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
