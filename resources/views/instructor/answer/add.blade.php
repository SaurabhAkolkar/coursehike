@extends('admin/layouts.master')
@section('title', 'Add Answer - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <!-- left column -->
    <div class="col-12"> 
      <!-- general form elements -->
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Answer') }}</h3>
        
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{url('instructoranswer/')}}" data-parsley-validate class="form-horizontal form-label-left">
                {{ csrf_field() }}
                

                <input type="hidden" name="instructor_id" value="{{Auth::user()->id}}" />
                <input type="hidden" name="ans_user_id" value="{{Auth::user()->id}}" />
           
                <div class="row">
                  <div class="col-md-6">
                    <label  for="exampleInputTit1e"> {{ __('adminstaticword.Select') }} {{ __('adminstaticword.Question') }}:<sup class="redstar">*</sup></label>
                    <br>
                    <select name="question_id" required class="form-control  js-example-basic-single">
                      <option value="none" selected disabled hidden> 
                         {{ __('adminstaticword.SelectanOption') }}
                      </option>
                      @foreach($questions as $ques)
                        <option value="{{ $ques->id }}" @if(old('question_id') == $ques->id) selected @endif>{{ $ques->question}}</option>
                      @endforeach
                    </select>

                    @error('question_id')
                      <div class="alert alert-danger">  
                          {{$message}}
                      </div>
                      @enderror

                  </div>
                  @foreach($questions as $ques)
                  <input type="hidden" name="ques_user_id"  value="{{$ques->user_id}}" />
                  <input type="hidden" name="course_id"  value="{{$ques->course_id}}" />
                  @endforeach
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInput">{{ __('adminstaticword.Answer') }}:<sup class="redstar">*</sup></label>
                    <textarea name="answer" rows="4" class="form-control" placeholder="Please Enter Your Answer">{{ old('answer') }}</textarea>
                    @error('answer')
                      <div class="alert alert-danger">  
                          {{$message}}
                      </div>
                      @enderror
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                    <li class="tg-list-item">   
                      <input class="la-admin__toggle-switch" id="c12"  type="checkbox"/>
                      <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="c12"></label>
                    </li>
                    <input type="hidden" name="status" value="1" id="t12">
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-6">
                    <div class="box-footer">
                      <button type="submit" value="Add Answer" class="btn btn-md px-10 btn-primary">{{ __('adminstaticword.Save') }}</button>
                    </div>
                  </div>
                </div>

              </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 
@endsection