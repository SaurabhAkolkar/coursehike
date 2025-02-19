@extends('admin/layouts.master')
@section('title', 'Course - Admin')
@section('body')

<section class="content">

	@include('admin.message')
<div class="row">
  <div class="col-12">
    <div class="box box-primary">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="la-admin__section-title ml-2">{{ __('adminstaticword.Course') }}</h3>
        <a class="btn btn-info btn-sm" href="{{url('bundle/create')}}">
          <span >+</span> {{ __('adminstaticword.Add') }} Course
        </a>
      </div>
      <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminstaticword.Image') }}</th>
                  <th>{{ __('adminstaticword.Title') }}</th>
                  <th>{{ __('adminstaticword.Category') }}</th>
                  @if(Auth::user()->role == 'admins')
                  <th>{{ __('adminstaticword.Instructor') }}</th>
                  @endif
                  <th>{{ __('adminstaticword.Slug') }}</th>
                  <th>{{ __('adminstaticword.Featured') }}</th>
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                  <th>{{ __('adminstaticword.Delete') }}</th>
                </tr>
              </thead>

              <tbody>
                <?php $i=0;?>
                  @if(true)
                    @foreach($course as $cat)
                      <?php $i++;?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          @if($cat['preview_image'] !== NULL && $cat['preview_image'] !== '')
                              <img src="{{ $cat['preview_image']}}" class="img-fluid" >
                          @else
                              <img src="{{ Avatar::create($cat->title)->toBase64() }}" class="img-fluid" >
                          @endif
                        </td>
                        <td>{{$cat->title}}</td>
                        <td>{{$cat->category->title}}</td>
                        @if(Auth::user()->role == 'admins')
                        <td>{{ $cat->user['fname'] }}</td>
                        @endif
                        <td>{{$cat->slug}}</td>
                        <td>
                         
                              @if($cat->featured ==1)
                              {{ __('adminstaticword.Yes') }}
                              @else
                              {{ __('adminstaticword.No') }}
                              @endif
                           
                        </td>
                         
                        <td>
                          
                              @if($cat->status ==1)
                                {{ __('adminstaticword.Active') }}
                              @else
                                {{ __('adminstaticword.Deactive') }}
                              @endif
                           
                        </td>

                        <td>
                          <a class="btn btn-success btn-sm" href="{{ route('bundle.show',$cat->id) }}">
                          <i class="la-icon la-icon--lg icon-edit"></i></a>
                        </td>

                        <td>
                          <form  method="post" action="{{url('bundle/'.$cat->id)}}
                            "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn btn-danger btn-sm"><i class="la-icon la-icon--lg icon-delete"></i></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  @else
                  
                    @php
                      $cors = App\Course::where('user_id', Auth::User()->id)->get();
                    @endphp
                    @foreach($cors as $cor)
                      <?php $i++;?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          @if($cor['preview_image'] !== NULL && $cor['preview_image'] !== '')
                              <img src="images/course/<?php echo $cor['preview_image'];  ?>" class="img-fluid">
                          @else
                              <img src="{{ Avatar::create($cor->title)->toBase64() }}" class="img-fluid" >
                          @endif
                        </td>
                        <td>{{$cor->title}}</td>
                        <td>{{ $cor->user['fname'] }}</td>
                        <td>{{$cor->slug}}</td>
                        <td>
                         
                          @if($cor->featured ==1)
                            {{ __('adminstaticword.Yes') }}
                          @else
                            {{ __('adminstaticword.No') }}
                          @endif
                          
                        </td>
                         
                        <td>
                          
                          @if($cor->status ==1)
                            {{ __('adminstaticword.Active') }}
                          @else
                            {{ __('adminstaticword.Deactive') }}
                          @endif
                            
                        </td>

                        <td>
                          <a class="btn btn-primary btn-sm" href="{{ route('bundle.show',$cor->id) }}">
                          <i class="la-icon la-icon--lg icon-edit"></i></a>
                        </td>

                        <td>
                          <form  method="post" action="{{url('bundle/'.$cor->id)}}
                            "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn btn-danger"><i class="la-icon la-icon--lg icon-delete"></i></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  @endif
              </tbody>
          </table>
        </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

      	
</section>

@endsection
  