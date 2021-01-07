@extends('admin/layouts.master')
@section('title', 'All Mentors - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-2 mb-0">{{ __('adminstaticword.AllInstructor') }}</h3>
        
        <!-- /.box-header -->
        <div class="box-body">
            <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
              <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a>
            </div>
            
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                	<th>{{ __('adminstaticword.Image') }}</th>
                  <th>{{ __('adminstaticword.Name') }}</th>
                  <th>{{ __('adminstaticword.Email') }}</th>
                  <th>{{ __('adminstaticword.Detail') }}</th>
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.View') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                  <th>{{ __('adminstaticword.Delete') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items as $item)
                <tr>
                	<td><img src="{{ asset('images/instructor/'.$item->image)}}" class="img-fluid"></td> 
                  <td>{{$item->fname}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{ str_limit($item->detail, $limit= 50, $end = '...')}}</td>
                  <td>
                    @if($item->status==1)
                      {{ __('adminstaticword.Approved') }}
                    @else
                      {{ __('adminstaticword.Pending') }}
                    @endif
                  </td>
                  <td><a class="btn btn-success btn-sm" href="{{route('requestinstructor.edit',$item->id)}}">{{ __('adminstaticword.View') }}</a></td>
                  <td>
                      <a class="text-dark la-admin__edit-btn" href="/user/edit/{{$item->id}}">
                          <i class="la-icon la-icon--lg icon-edit"></i>
                      </a>
                  </td>
                  <td><form  method="post" action="{{url('requestinstructor/'.$item->id)}}
                        "data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                         <button  type="submit" class="btn btn-danger">
                           <i class="la-icon la-icon--lg icon-delete"></i>
                          </button>
                      </form>
                  </td>

                  @endforeach
               
                </tr>
              </tfoot>
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