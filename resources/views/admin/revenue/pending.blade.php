@extends('admin/layouts.master')
@section('title', 'Pending Payouts - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title ml-2">  {{ __('adminstaticword.PendingPayout') }}</h3>
        </div>

        <div class="box-header">
          <a type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#bulk_delete"> <i class="fa fa-money"></i> {{ __('adminstaticword.PaySelected') }}</a>
        </div>

        <div id="bulk_delete" class="delete-modal modal fade show" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header d-block">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <div class="delete-icon"></div>
            </div>
            <div class="modal-body text-center">
              <h4 class="modal-heading">{{ __('adminstaticword.AreYouSure') }}</h4>
            </div>
            <div class="modal-footer text-center">

              <form  method="post" action="{{ action('AdminPayoutController@bulk_payout', $id) }}" id="bulk_delete_form" data-parsley-validate class="form-horizontal form-label-left">
              {{ csrf_field() }}

                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
               
                <input type="submit" value="Yes"  class="btn btn-sm btn-danger"/>
              </form>
            </div>
          </div>
        </div>
      </div>
        
        <!-- /.box-header -->
        <div class="box-body">
        
            <table id="example1" class="table table-bordered table-striped">

              <thead>
              
                <br>

                <th>
                  <div class="inline">
                      <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                      <label for="checkboxAll" class="material-checkbox"></label>
                    </div>
                  #
                </th>
                <th>{{ __('adminstaticword.User') }}</th>
                <th>{{ __('adminstaticword.Course') }}</th>
                <th>{{ __('adminstaticword.OrderId') }}</th>
                <th>{{ __('adminstaticword.PayoutDeatil') }}</th>
              </tr>
              </thead>
              <tbody>
                  <?php $i=0;?>
                  @foreach($payout as $pay)
                  <tr>
                    <?php $i++;?>
                    <td>
                        <div class="inline">
                          <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="{{$pay->id}}" id="checkbox{{$pay->id}}">
                          <label for="checkbox{{$pay->id}}" class="material-checkbox"></label>
                        </div>
                        <?php echo $i;?>
                      </td>
                  
                      <td>{{$pay->user->fname}}</td>
                      <td>{{$pay->courses->title}}</td>
                      <td>{{$pay->order->order_id}}</td> 
                      <td>
                        <b>{{ __('adminstaticword.TotalAmount') }}</b>: <i class="fa {{$pay->currency_icon}}"></i>{{$pay->total_amount}}
                        <br>

                        <b>{{ __('adminstaticword.InstructorRevenue') }}</b>: <i class="fa {{$pay->currency_icon}}"></i> {{$pay->instructor_revenue}}
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


@section('scripts')
  <script>
    $(function(){
      $('#checkboxAll').on('change', function(){
        if($(this).prop("checked") == true){
          $('.material-checkbox-input').attr('checked', true);
        }
        else if($(this).prop("checked") == false){
          $('.material-checkbox-input').attr('checked', false);
        }
      });
    });
  </script>

  <script>
    $(function() {
      $('#cb3').change(function() {
        $('#status').val(+ $(this).prop('checked'))
      })
    })
  </script>

  
@endsection
