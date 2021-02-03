@extends('admin/layouts.master')
@section('title', 'All Testimonial - Admin')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-12">
      <div class="box box-primary">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.Testimonial') }}</h3>
            <a href="{{url('testimonial/create')}}" class="btn btn-info btn-sm">
              <span class="la-icon la-icon--sm icon-plus"></span>
              <span>{{ __('adminstaticword.Add') }} {{ __('adminstaticword.Testimonial') }}</span>
            </a>
          </div>
          <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
          
            <tr>
              <th>#</th>
              <th>{{ __('adminstaticword.Image') }}</th>
              <th>{{ __('adminstaticword.Type') }}</th>
              <th>{{ __('adminstaticword.Name') }}</th>
              <th>{{ __('adminstaticword.Rating') }}</th>
              <th>{{ __('adminstaticword.Detail') }}</th>
              <th>{{ __('adminstaticword.Status') }}</th>
              <th>{{ __('adminstaticword.Update') }}</th>
              <th>{{ __('adminstaticword.Delete') }}</th>
            </tr>
            </thead>
            <tbody>
              @foreach($test as $key=>$p)
            <tr>
              <td>{{$key+1}}</td>
              <td>
                <img src="images/testimonial/<?php echo $p['image']; ?>">
              </td>
              <td>{{ucfirst($p->type)}}</td>
              <td>{{$p->client_name}}</td>
              <td> <div class="la-course__rating ml-auto">
                <div class="la-rtng__pg-rtng d-inline-flex pl-3">
                    @if($p->rating == 5)
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow "></div>
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow "></div>
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                    @elseif($p->rating >= 4)
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                    @elseif($p->rating >= 3)
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                    @elseif($p->rating >= 2)
                    
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                    @elseif($p->rating >= 1)
                        <div class="la-icon--lg icon-star la-rtng__fill text-yellow"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                    @else
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                    @endif
                </div>
            </div></td>
              <td>{{ strip_tags($p->details) }}</td>
             
              <td>
                 <form action="{{ route('testimonial.quick',$p->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button  type="Submit" class="btn btn-xs {{ $p->status ==1 ? 'btn-success' : 'btn-danger' }}">
                      @if($p->status ==1)
                      {{ __('adminstaticword.Active') }}
                      @else
                      {{ __('adminstaticword.Deactive') }}
                      @endif
                    </button>
                  </form>
              </td>           

              <td><a class="btn btn-success la-admin__edit-btn" href="{{url('testimonial/'.$p->id.'/edit')}}">
                <i class="la-icon la-icon--lg icon-edit"></i></a>
              </td>
              <td><form  method="post" action="{{url('testimonial/'.$p->id)}}
               "data-parsley-validate class="form-horizontal form-label-left">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
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
