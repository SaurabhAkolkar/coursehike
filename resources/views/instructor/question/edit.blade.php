@extends('admin/layouts.master')
@section('title', 'Edit Question - Instructor')
@section('body')

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3">Edit Question</h3>
        
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form" method="post" action="{{url('instructorquestion/'.$que->id)}}" data-parsley-validate class="form-horizontal form-label-left">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

              <div class="row">
                <div class="col-6">
                  <input type="hidden" name="instructor_id" class="form-control" value="{{ Auth::User()->id }}"  />
                      
                  <select name="course_id" class="form-control js-example-basic-single col-12 display-none">
                  @foreach($courses as $cou)
                  <option class="display-none" value="{{ $cou->id }}" {{$que->courses->id == $cou->id  ? 'selected' : ''}}>{{ $cou->title}}</option>
                  @endforeach
                  </select> 

                  @error('course_id')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                    @enderror

                </div>
              </div>
              <br/>

              <div class="row">
                <div class="col-6">
                  <select name="user_id" class="form-control js-example-basic-single col-12 display-none">
                    @foreach($user as $cu)
                      <option class="display-none" value="{{ $cu->id }}" {{$que->courses->id == $cu->id  ? 'selected' : ''}}>{{ $cu->fname}}</option>
                    @endforeach
                  </select>
                  @error('user_id')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                    @enderror

                </div>
              </div> <br/>
                   
              <div class="row">
                <div class="col-md-5">
                  <label for="exampleInputTit1e">Question:<span class="redstar">*</span></label>
                  <textarea name="question" rows="3" class="form-control" placeholder="Enter Your quetion">{{$que->question}}</textarea>
                  @error('question')
                    <div class="alert alert-danger">  
                        {{$message}}
                    </div>
                    @enderror

                </div>
              
                <div class="col-md-1">
                  <label for="exampleInputTit1e">Status:</label>
                  <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="cb77" type="checkbox" {{ $que->status==1 ? 'checked' : '' }}>
                    <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="cb77"></label>
                  </li>
                  <input type="hidden" name="status" value="{{ $que->status }}" id="jp">
                </div>
              </div> 
              <br>

              <div class="row">
                <div class="col-md-6">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-md px-14 btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 

@endsection
