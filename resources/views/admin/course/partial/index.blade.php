@include('admin.message')
<div class="row">
  <div class="col-12">
    <div class="box box-primary">
      <div class="d-flex justify-content-between align-items-center ml-2">
        <h3 class="la-admin__section-title">{{ __('adminstaticword.Classes') }}</h3>
        <a class="btn btn-info btn-sm" href="{{url('course/create')}}">
          <span class="la-icon la-icon--sm icon-plus"></span> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Class') }}
        </a>
      </div>
     
      <!-- /.box-header -->
        <div class="box-body">
            <div class="la-admin__filter-icons text-right" style="position:relative; top:50px;z-index:0;">
                <a href="#" role="button"><span class="la-icon la-icon--3xl icon-sort mr-2" style="color:#000;"></span></a>
                <!-- <a href="#" role="button"><span class="la-icon la-icon--3xl icon-excel mr-2" style="color:#1D6F42"></span></a> -->
            </div>
          
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminstaticword.Image') }}</th>
                  <th>{{ __('adminstaticword.Title') }}</th>
                  <th>{{ __('adminstaticword.Category') }}</th>
                  @if(Auth::User()->role == "admin")<th>{{ __('adminstaticword.Instructor') }}</th>@endif
                  @if(Auth::User()->role == "admin")<th>{{ __('adminstaticword.Slug') }}</th>@endif
                  <th>{{ __('adminstaticword.Featured') }}</th>
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                  <th>{{ __('adminstaticword.Delete') }}</th>
                </tr>
              </thead>

              <tbody>
                <?php $i=0;?>
                  @if(Auth::User()->role == "admin")
                    @foreach($course as $cat)
                      <?php $i++;?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          @if($cat['preview_image'] !== NULL && $cat['preview_image'] !== '')
                              <img src="{{$cat['preview_image']}}" class="img-fluid" >
                          @else
                              <img src="{{ Avatar::create($cat->title)->toBase64() }}" class="img-fluid" >
                          @endif
                        </td>
                        <td>{{$cat->title}}</td>
                        <td>{{$cat->category->title}}</td>
                        <td>{{ $cat->user['fname'] }}</td>
                        <td>{{$cat->slug}}</td>
                        <td>
                          <form action="{{ route('course.featured',$cat->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button  type="Submit" class="btn btn-xs {{ $cat->featured ==1 ? 'btn-success' : 'btn-danger' }}">
                              @if($cat->featured ==1)
                              {{ __('adminstaticword.Yes') }}
                              @else
                              {{ __('adminstaticword.No') }}
                              @endif
                            </button>
                          </form>
                        </td>
                         
                        <td>
                          <form action="{{ route('course.quick',$cat->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button  type="Submit" class="btn btn-xs {{ $cat->status ==1 ? 'btn-success' : 'btn-danger' }}">
                              @if($cat->status ==1)
                                {{ __('adminstaticword.Active') }}
                              @else
                                {{ __('adminstaticword.Deactive') }}
                              @endif
                            </button>
                          </form>
                        </td>

                        <td>
                          <a class="btn btn-success btn-sm" href="{{ route('course.show',$cat->id) }}">
                          <i class="la-icon la-icon--lg icon-edit"></i></a>
                        </td>

                        <td>
                          <form  method="post" action="{{url('course/'.$cat->id)}}
                            "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn btn-danger btn-sm">
                              <i class="la-icon la-icon--lg icon-delete"></i>
                            </button>
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
                              <img src="{{$cor['preview_image']}}" class="img-fluid">
                          @else
                              <img src="{{ Avatar::create($cor->title)->toBase64() }}" class="img-fluid" >
                          @endif
                        </td>
                        <td>{{$cor->title}}</td>
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
                          <a class="text-dark la-admin__edit-btn" href="{{ route('course.show',$cor->id) }}">
                          <i class="la-icon la-icon--lg icon-edit"></i></a>
                        </td>

                        <td>
                          <form method="post" action="{{url('course/'.$cor->id)}}
                            "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button onclick="return confirm('Are you sure you want to delete?')"  type="submit" class="btn btn-danger la-admin__delete-btn"><i class="la-icon la-icon--lg icon-delete"></i></button>
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
