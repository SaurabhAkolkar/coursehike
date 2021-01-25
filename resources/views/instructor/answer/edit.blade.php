@extends('admin/layouts.master')
@section('title', 'Edit Answer - Instructor')
@section('body')

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
      <div class="box box-primary">
          <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Answer') }}</h3>
        
        <div class="box-body">
          <div class="form-group">
            <form action="{{url('instructoranswer/'.$answer->id)}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

               
                  <div class="row">
                    <div class="col-md-12">
                      <label  for="exampleInputTit1e"> {{ __('adminstaticword.Select') }} {{ __('adminstaticword.Question') }}:<sup class="redstar">*</sup></label>
                      <br>
                      <select name="question_id" required class="form-control  js-example-basic-single">
                        @foreach($questions as $ques)
                          <option value="{{ $ques->id }}" @if($answer->question_id == $ques->id) selected @endif >{{ $ques->question}}</option>
                        @endforeach
                      </select>
                      @error('question_id')
                      <div class="alert alert-danger">  
                          {{$message}}
                      </div>
                      @enderror
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label for="exampleInput"> {{ __('adminstaticword.Answer') }}:<sup class="redstar">*</sup></label>
                      <textarea name="answer" rows="4" class="form-control" placeholder="Please Enter Your Answer">{{ $answer->answer }}</textarea>
                      @error('answer')
                      <div class="alert alert-danger">  
                          {{$message}}
                      </div>
                      @enderror
                    </div>
                  </div>
                
                  <br><br>


                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                    <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="cb10111" type="checkbox" {{ $answer->status==1 ? 'checked' : '' }}>
                    <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="cb10111"></label>
                    </li>
                    <input type="hidden" name="status" value="{{ $answer->status }}" id="jjjj">
                </div>
                </div>
                <br>
                <br>
                <br>
                
                <div class="row">
                  <div class="col-12">
                    <div class="box-footer">
                      <button value="" type="submit"  class="btn btn-md btn-primary">{{ __('adminstaticword.Save') }}</button>
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
