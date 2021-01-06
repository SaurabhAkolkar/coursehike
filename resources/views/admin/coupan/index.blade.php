@extends("admin/layouts.master")
@section('title','Coupons - Admin')

@section('body')
<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.Coupon') }}</h3>
          <a title="Create new Coupon" href="{{ route('coupon.create') }}" class="btn btn-sm btn-info">+ {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Coupon') }}</a>
        </div>

        <div class="box-body">
          <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
            <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
            <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a>
          </div>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <th>{{ __('adminstaticword.ID') }}</th>
                <th></th>
                <th>{{ __('adminstaticword.CODE') }}</th>
                <th>Discount Type</th>
                <th>Discount</th>
                <th>{{ __('adminstaticword.Amount') }}</th>
                <th><!-- {{ __('adminstaticword.Detail') }} --> Linked to</th>
                <th>Expiry Date</th>
                <th>{{ __('adminstaticword.MaxUsage') }}</th>
                <th>{{ __('adminstaticword.Edit') }}</th>
                <th>{{ __('adminstaticword.Delete') }}</th>
              </thead>

              <tbody>
                @foreach($coupans as $key=> $cpn)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <span class="la-icon la-icon--8xl icon-fixed-coupon" style="color:#FFDD75;"></span>
                    </td>
                    <td>{{ $cpn->code }}</td>
                    @php
                        $currency = App\Currency::first();
                    @endphp 
                    <td>
                      <span>{{ $cpn->distype == 'per' ? "Percentage" : "Fixed Amount" }}</span>
                    </td>
                    <td>50%</td>
                    <td>@if($cpn->distype == 'fix') <i class="fa {{ $currency->icon }}"></i> @endif {{ $cpn->amount }}@if($cpn->distype == 'per')% @endif </td>
                    <td>
                      <span>{{ ucfirst($cpn->link_by) }}</span>
                    </td>
                    <td>
                     <span>{{ date('d-M-Y',strtotime($cpn->expirydate)) }}</span>
                    </td>
                    <td>{{ $cpn->maxusage }}</td>
                    
                    <td>
                      <a title="Edit coupon" href="{{ route('coupon.edit',$cpn->id) }}" class="btn btn-success btn-sm">
                        <i class="la-icon la-icon--lg icon-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a title="Delete coupon" data-toggle="modal" data-target="#coupon{{ $cpn->id }}" class="btn btn-danger">
                        <i class="la-icon la-icon--lg icon-delete"></i>
                      </a>
                    </td>

                    <div id="coupon{{ $cpn->id }}" class="delete-modal modal fade show" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header d-block">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <div class="delete-icon"></div>
                            </div>
                            <div class="modal-body text-center">
                              <h4 class="modal-heading">Are You Sure ?</h4>
                              <p>Do you really want to delete this Coupon ? This process cannot be undone.</p>
                            </div>
                            <div class="modal-footer">
                                 <form method="post" action="{{route('coupon.destroy',$cpn->id)}}" class="pull-right">
                                    {{csrf_field()}}
                                    {{method_field("DELETE")}}
                                          
                                 <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                  </tr>
                @endforeach
              </tbody>

            </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
