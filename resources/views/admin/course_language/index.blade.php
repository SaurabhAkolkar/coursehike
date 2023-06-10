@extends('admin/layouts.master')
@section('title', 'Course Language - Admin')
@section('body')


<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="d-md-flex justify-content-between align-items-center">
          <h3 class="la-admin__section-title ml-2">{{ __('adminstaticword.CourseLanguage') }}</h3>
          <a data-toggle="modal" data-target="#myModaljjh" href="#" class="btn btn-info btn-sm">
            <span class="la-icon la-icon--sm icon-plus"></span> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.CourseLanguage') }}</a>
        </div>

        <div class="box-body">
          
         
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('adminstaticword.Language') }}</th>
                  <th>{{ __('adminstaticword.Status') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                  <th>{{ __('adminstaticword.Delete') }}</th>
                </tr>
                </thead>

                <tbody>
                  <?php $i=0;?>
                  @foreach($language as $cat)
                    <?php $i++;?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td>{{$cat->name}}</td>
                      <td>
                        <form action="{{ route('language.quick',$cat->id) }}" method="POST">
                          {{ csrf_field() }}
                          <button type="Submit" class="m-0 btn btn-xs {{ $cat->status ==1 ? 'btn-success' : 'btn-danger' }}">
                            @if($cat->status ==1)
                            {{ __('adminstaticword.Active') }}
                            @else
                            {{ __('adminstaticword.Deactive') }} 
                            @endif
                          </button>
                        </form>
                      </td>          
                      <td><a class="btn btn-success la-admin__edit-btn" href="{{url('courselang/'.$cat->id.'/edit')}}">
                          <i class="la-icon la-icon--lg icon-edit"></i></a></td>

                      <td><form method="post" action="{{url('courselang/'.$cat->id)}}
                            "data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button  type="submit" class="btn btn-danger m-0"><i class="la-icon la-icon--lg icon-delete"></i></button>
                          </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>

        </div>
        <!--Panel Body end-->
      </div>
      <!--Box Primary end-->

      <!--Model start-->
      <div class="modal fade show" id="myModaljjh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header d-block">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.Language') }}</h4>
            </div>
            <div class="box box-primary">
              <div class="panel panel-sum">
                <div class="modal-body">
                  <form id="demo-form2" method="post" action="{{ route('courselang.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                            
                    <div class="row">
                      <div class="col-md-12">
                        <label>{{ __('adminstaticword.Name') }}:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="name" placeholder="Please Enter Your  Language Name" value="" required>
                          @error('name')
                              <div class="la-btn__alert-danger alert alert-danger">
                                    {{$message}}
                              </div>
                          @enderror
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6 mt-3 mt-md-0">
                        <label for="exampleInputSlug">ISO Code:<sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="iso_code" placeholder="Eg, en, hi, ta, etc,." value="" required> 
                          @error('iso_code')
                              <div class="la-btn__alert-danger alert alert-danger">
                                    {{$message}}
                              </div>
                          @enderror
                      </div>
                      <div class="col-md-6  mt-3 mt-md-0">
                        <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                          <li class="tg-list-item">              
                          <input class="la-admin__toggle-switch" id="welmail" type="checkbox" name="status" >
                          <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="welmail"></label>
                        </li>
                        <input type="hidden"  name="free" value="0" for="status" id="status">
                      </div>
                    </div>
                    <br>
                    <div class="box-footer">
                     <button type="submit" class="btn btn-lg col-md-4 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <!--Model close -->
  </div>
</section> 


@if($errors->all())
  @section('script')
    <script>
      $('#myModaljjh').modal('show');
    </script>
  @endsection
@endif

@endsection
