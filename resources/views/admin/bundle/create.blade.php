@extends('admin/layouts.master')
@section('title', 'Create Course - Admin')
@section('body')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">            
          <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Course') }}</h3>
            
            <!-- <div  class="col-md-2">
                <div><h4 class="admin-form-text"><a href="{{url('course')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons"><button class="btn btn-xs btn-success abc"> << {{ __('adminstaticword.Back') }}</button> </i></a></h4></div>
            </div> -->
      </div>
       
         
        <div class="box-body">
              <form action="{{url('bundle/')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} 
                  <input type="hidden" class="form-control" name="user_id" id="exampleInputTitle" value="{{ Auth::User()->id }}" required>
                  
                  <div class="row">  
                    <div class="col-md-6 col-lg-6  mb-3">
                      <div class="form-group">
                        <label for="exampleInputTit1e">{{ __('adminstaticword.Title') }}: <sup class="redstar">*</sup></label>
                        <input type="title" class="form-control" name="title" id="exampleInputTitle" placeholder="Please Enter Your Title" value="" required>
                      </div>
                    </div>

                    <div class="col-md-6 col-lg-6  mb-3">
                      <div class="form-group">
                        <label>{{ __('adminstaticword.SelectClass') }}: <span class="redstar">*</span></label>
                        <select class="form-control js-example-basic-single" name="course_id[]" multiple="multiple" size="5" row="5" placeholder="Select Courses">


                          @foreach ($courses as $cat)
                            @if($cat->status == 1)
                            <option value="{{ $cat->id }}">{{ $cat->title }}
                            </option>
                            @endif

                          @endforeach

                        </select>
                      </div>
                    </div>
                 
                    <div class="col-lg-6  mb-3">
                      <div class="form-group">
                          <label>{{ __('adminstaticword.level') }}: <span class="redstar">*</span></label>
                          <select name="level" class="form-control js-example-basic-single">
                            <option selected disabled > Select Level</option>
                            <option value="1" > Beginner</option>
                            <option value="2" > Intermediate</option>
                            <option value="3" > Advanced</option>
                          </select> 
                      </div>
                    </div>

                    <div class="col-lg-6  mb-3">
                      <div class="form-group">
                        <label>{{ __('adminstaticword.Category') }}: <span class="redstar">*</span></label>
                        <select class="form-control js-example-basic-single" name="category_id"  placeholder="Select Category">


                          @foreach ($category as $cat)
                            @if($cat->status == 1)
                            <option value="{{ $cat->id }}">{{ $cat->title }}
                            </option>
                            @endif

                          @endforeach

                        </select>
                      </div>
                    </div>

                            
                    <div class="col-md-12 mb-4 mb-md-8">
                      <label for="exampleInputTit1e">{{ __('adminstaticword.Detail') }}: <sup class="redstar">*</sup></label>
                      <textarea id="editor2" name="detail" rows="5"  class="form-control" placeholder="Enter Your Detail" required ></textarea>
                    </div>
                                
                    <div class="col-md-8 col-lg-5  mb-3">
                        <div class="la-admin__preview">
                          <label for="" class="la-admin__preview-label p-0">Thumbnail Image:<sup class="redstar">*</sup></label>
                          <div class="la-admin__preview-img la-admin__course-imgvid la-admin__course-modal-imgvid" >
                               <div class="la-admin__preview-text">
                                    <p class="la-admin__preview-size">Thumbnail | 250x150</p>
                                    <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                              </div>
                              <div class="text-center px-20 mr-20">
                                <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:140px;">
                                  <span class="path1"><span class="path2"></span></span>
                                </span>
                              </div>
                              <input type="file" name="preview_image" id="image" class="form-control la-admin__preview-input inputfile inputfile-1"  />
                              <img src="" alt="" class="d-none preview-img"/>
                          </div>
                        </div>
                    </div>
                  
                    <div class="col-md-4 col-lg-3 mb-3">
                      <label for="exampleInputDetails">{{ __('adminstaticword.Free') }}:</label>                 
                      <li class="tg-list-item">
                        <input name="type" class="la-admin__toggle-switch" id="cb111" type="checkbox"/>
                        <label class="la-admin__toggle-label" data-tg-off="Paid" data-tg-on="Free" for="cb111"></label>
                      </li>
                      
                      <div class="" id="pricebox">
                        <label for="exampleInputSlug">{{ __('adminstaticword.Price') }}: <sup class="redstar">*</sup></label>
                        <input type="text" class="form-control" name="price" id="priceMain" placeholder="Please Your Enter price" value="">
            
                        <label for="exampleInputSlug">{{ __('adminstaticword.DiscountPrice') }}: </label>
                        <input type="text" class="form-control" name="discount_price" id="offerPrice" placeholder="Please Your Enter discount_price" value="">
                      </div>
                    </div>

                    <div class="col-md-6 col-lg-2  mb-3">
                      @if(Auth::User()->role == "admin")
                      <label for="exampleInputDetails">{{ __('adminstaticword.Featured') }}:</label>
                      <li class="tg-list-item">
                    
                        <input class="la-admin__toggle-switch" id="cb1"   type="checkbox"/>
                        <label class="la-admin__toggle-label" data-tg-off="OFF" data-tg-on="ON" for="cb1"></label>
                      </li>
                      <input type="hidden" name="featured" value="0" id="j">
                      @endif
                    </div> 

                    <div class="col-md-6 col-lg-2 mb-3">
                      @if(Auth::User()->role == "admin")
                      <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                      <li class="tg-list-item">  
                        <input class="la-admin__toggle-switch" id="cb3"   type="checkbox"/>
                        <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="cb3"></label>
                      </li>
                      <input type="hidden" name="status" value="0" id="test">
                      @endif
                    </div>
                
                    <div class="col-12 text-right">
                      <button type="submit" class="btn btn-primary px-md-16">{{ __('adminstaticword.Submit') }}</button>
                    </div>

                  </div>
            </form>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
  <!-- /.row -->
</section> 

@endsection

@section('scripts')


<script>
(function($) {
"use strict";

   $(function () {
      CKEDITOR.replace('editor2');
    });

  $(function() {
    $('.js-example-basic-single').select2();
  });

  $(function() {
    $('#cb1').change(function() {
      $('#j').val(+ $(this).prop('checked'))
    })
  })

  $(function() {
    $('#cb3').change(function() {
      $('#test').val(+ $(this).prop('checked'))
    })
  })

  $('#cb111').on('change',function(){

    if($('#cb111').is(':checked')){
      $('#pricebox').hide('fast');

$('#priceMain').removeAttr('required'); 
    }else{
      

      $('#pricebox').show('fast');

$('#priceMain').prop('required','required');

    }

  });

  $('#preview').on('change',function(){

    if($('#preview').is(':checked')){
      $('#document1').show('fast');
      $('#document2').hide('fast');
    }else{
      $('#document2').show('fast');
      $('#document1').hide('fast');
    }

  });

  $("#cb3").on('change', function() {
    if ($(this).is(':checked')) {
      $(this).attr('value', '1');
    }
    else {
      $(this).attr('value', '0');
    }});

  $(function(){

      $('#ms').change(function(){
        if($('#ms').val()=='yes')
        {
            $('#doabox').show();
        }
        else
        {
            $('#doabox').hide();
        }
      });

  });

  $(function(){

      $('#ms').change(function(){
        if($('#ms').val()=='yes')
        {
            $('#doaboxx').show();
        }
        else
        {
            $('#doaboxx').hide();
        }
      });

  });

  $(function(){

      $('#msd').change(function(){
        if($('#msd').val()=='yes')
        {
            $('#doa').show();
        }
        else
        {
            $('#doa').hide();
        }
      });

  });

  $(function() {
    var urlLike = '{{ url('admin/dropdown') }}';
    $('#category_id').change(function() {
      var up = $('#upload_id').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });

  $(function() {
    var urlLike = '{{ url('admin/gcat') }}';
    $('#upload_id').change(function() {
      var up = $('#grand').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });
})(jQuery);
</script>
  
@endsection
