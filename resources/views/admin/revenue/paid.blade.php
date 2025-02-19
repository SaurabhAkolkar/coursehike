@extends('admin/layouts.master')
@section('title', 'All paid Payout - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title ml-2">  {{ __('adminstaticword.PaidPayout') }}</h3>
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
