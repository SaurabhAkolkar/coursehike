@extends('admin/layouts.master')
@section('title', 'FAQ Learners - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title ml-2">{{ __('adminstaticword.FAQStudent') }}s</h3>
          <a href="{{url('faq/create')}}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.Add') }} {{ __('adminstaticword.FAQStudent') }}</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
             
              <tr>
                <th>#</th>
                <th>{{ __('adminstaticword.Question') }}</th>
                <th>{{ __('adminstaticword.Answer') }}</th>
                <th>{{ __('adminstaticword.Type') }}</th>
                <th>{{ __('adminstaticword.Status') }}</th>
                <th>{{ __('adminstaticword.Edit') }}</th>
                <th>{{ __('adminstaticword.Delete') }}</th>
              </tr>
            </thead>
            <tbody>
            @foreach($faq as $key=>$p)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$p->title}}</td>                 
                <td>{!! str_limit(strip_tags($p->details), $limit = 60, $end = '...') !!}</td>
                <td>{{ ucfirst(str_replace('_',' ',$p->type)) }}</td>
                <td>
                  <form action="{{ route('faq.quick',$p->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="Submit" class="btn btn-xs {{ $p->status ==1 ? 'btn-success' : 'btn-danger' }}">
                      @if($p->status ==1)
                      {{ __('adminstaticword.Active') }}
                      @else
                      {{ __('adminstaticword.Deactive') }}
                      @endif
                    </button>
                  </form>
                </td>
                <td>
                  <a class="btn btn-success la-admin__edit-btn" role="button" href="{{url('faq/'.$p->id.'/edit')}}">
                    <i class="la-icon la-icon--lg icon-edit"></i>
                  </a>
                </td>
                <td>
                  <form  method="post" action="{{url('faq/'.$p->id)}}"
                      data-parsley-validate class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">
                      <span class="la-icon la-icon--lg icon-delete"></span>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach 
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
