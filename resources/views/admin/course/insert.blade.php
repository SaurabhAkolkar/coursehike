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
          <div class="row">
            <div class="col-md-12">
              <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Course') }}</h3>
            </div>
            <div  class="col-md-2">
                <!--<div><h4 class="admin-form-text"><a href="{{url('course')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons"><button class="btn btn-xs btn-success abc"> << {{ __('adminstaticword.Back') }}</button> </i></a></h4></div> -->
            </div>
          </div>
       
         
        <div class="box-body">
          <div class="form-group">
            <form action="{{url('course/')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }} 
  
              <div class="row">
                <div class="col-md-3">
                  <label>{{ __('adminstaticword.Category') }}:<span class="redstar">*</span></label>
                  <select name="category_id" id="category_id" class="form-control js-example-basic-single">
                    <option value="0">{{ __('adminstaticword.SelectanOption') }}</option>
                    @foreach($category as $cate)
                      <option value="{{$cate->id}}">{{$cate->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label>{{ __('adminstaticword.SubCategory') }}:<span class="redstar">*</span></label>
                    <select name="subcategory_id" id="upload_id" class="form-control js-example-basic-single">
                    </select>
                </div>
                <div class="col-md-3">
                  <label>{{ __('adminstaticword.ChildCategory') }}:</label>
                  <select name="childcategory_id" id="grand" class="form-control js-example-basic-single"></select>
                </div>
                @if(Auth::user()->role == 'admin')
                  <div class="col-md-3">
                    <label for="exampleInputTit1e">{{ __('adminstaticword.Instructor') }}</label>
                      <select name="user_id" class="form-control js-example-basic-single ">
                      @foreach($user as $u)
                          <option value="{{$u->id}}">{{$u->fullName}}</option>
                      @endforeach
                      </select>
                  </div>
                @endif
                @if(Auth::user()->role == 'mentors')
                <div class="col-md-3">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Instructor') }}</label>
                    <select name="user_id" class="form-control js-example-basic-single ">
                        <option value="{{Auth::user()->id}}">{{Auth::user()->fname}}</option>
                    </select>
                </div>
                @endif

              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Title') }}: <sup class="redstar">*</sup></label>
                  <input type="title" class="form-control" name="title" id="exampleInputTitle" placeholder="Please Enter Your Title" value="" required>
                </div>
                <div class="col-md-6"> 
                  <label>{{ __('adminstaticword.Language') }}: <span class="redstar">*</span></label>
                  <select name="language_id" class="form-control js-example-basic-single">
                    @php
                    $languages = App\CourseLanguage::where(['status'=>1])->get();
                    @endphp  
                    @foreach($languages as $caat)
                      <option {{ $caat->language_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->name }}</option>
                    @endforeach
                  </select> 
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6"> 
                  <label>{{ __('adminstaticword.level') }}: <span class="redstar">*</span></label>
                  <select name="level" class="form-control js-example-basic-single">
                    <option selected disabled > Select Level</option>
                    <option value="1" > Beginner</option>
                    <option value="2" > Intermediate</option>
                    <option value="3" > Advanced</option>
                  </select> 
                </div>

                <div class="col-md-6">
                      <label for="exampleInputSlug">Course Duration(in Hours)</label>
                      <input min="1" class="form-control" name="duration" type="number" id="duration"  placeholder="Enter Duration in hours">
                </div>
              </div>

              <br>

              <div class="row">
                {{-- <div class="col-md-6">
                  <label for="exampleInputSlug">{{ __('adminstaticword.Slug') }}: <sup class="redstar">*</sup></label>
                  <input pattern="[/^\S*$/]+"  type="text" class="form-control" name="slug" id="exampleInputPassword1" placeholder="Please Enter Your Slug" required>
                </div> --}}
              </div>
              <br>
                 
              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.ShortDetail') }}: <sup class="redstar">*</sup></label>
                  <textarea name="short_detail" rows="3"  class="form-control" placeholder="Enter Your Detail" required ></textarea>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Requirements') }}: <sup class="redstar">*</sup></label>
                  <textarea name="requirement" rows="3"  class="form-control" placeholder="Enter Requirements" required ></textarea>
                </div>
              </div>           
              <br> 

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Detail') }}: <sup class="redstar">*</sup></label>
                  <textarea id="detail" name="detail" rows="3" class="form-control"></textarea>
                </div>
              </div>
              <br>

              <div class="row">
                {{-- <div class="col-md-3">
          
                    <label for="exampleInputSlug">{{ __('adminstaticword.Days') }}: <sup class="redstar">*</sup></label>
                    <input type="number" min="1" class="form-control" name="day" id="exampleInputPassword1" placeholder="Please Your Enter day" value="">
               
                </div>  --}}

                {{-- <div class="col-md-3">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Free') }}:</label>                 
                  <li class="tg-list-item">
                    <input name="type" class="la-admin__toggle-switch" id="cb111" type="checkbox"/>
                    <label class="la-admin__toggle-label" data-tg-off="Free" data-tg-on="Paid" for="cb111"></label>
                  </li>
                  <br>
                  <div class="display-none" id="pricebox">
                    <label for="exampleInputSlug">{{ __('adminstaticword.Price') }}: <sup class="redstar">*</sup></label>
                    <input type="text" class="form-control" name="price" id="priceMain" placeholder="Please Your Enter price" value="">
        
                    <label for="exampleInputSlug">{{ __('adminstaticword.DiscountPrice') }}: </label>
                    <input type="text" class="form-control" name="discount_price" id="offerPrice" placeholder="Please Your Enter discount_price" value="">
                  </div>
                </div> 
                <div class="col-md-3">
                  @if(Auth::User()->role == "admin")
                  <label for="exampleInputDetails">{{ __('adminstaticword.Featured') }}:</label>
                  <li class="tg-list-item">
                
                    <input class="la-admin__toggle-switch" id="cb1"   type="checkbox"/>
                    <label class="la-admin__toggle-label" data-tg-off="OFF" data-tg-on="ON" for="cb1"></label>
                  </li>
                  <input type="hidden" name="featured" value="0" id="j">
                  @endif
                </div> 

                <div class="col-md-3">
                  @if(Auth::User()->role == "admin")
                  <label for="exampleInputDetails">{{ __('adminstaticword.Status') }}:</label>
                  <li class="tg-list-item">  
                    <input class="la-admin__toggle-switch" id="cb3"   type="checkbox"/>
                    <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="cb3"></label>
                  </li>
                  <input type="hidden" name="status" value="0" id="test">
                  @endif
                </div>--}}
                </div>
                <br> 

              {{-- <div class="row">
                 
              </div>
              <br/> --}}

              <!-- COURSE PACKAGE TYPE: START -->
              <div class="row">
                <div class="col-md-12">
                  <div class="la-admin__course-package">
                      <label for="" class="la-admin__cp-title">Course package type<sup class="redstar">*</sup></label><br/>
                      <div class="la-admin__cp-subscription">
                          <input type="radio" id="subPaid" name="package_type" value="1" class="la-admin__cp-input"> 
                           <label for="subPaid"> 
                             <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Subscription</span>
                                <small class=" text-xs mt-1 pl-1">(Default)</small>
                             </div>

                              <div class="la-admin__cp-desc">
                                  <p>This course is accessible by all Subscribers & also available for life-time purchase. </p>
                                  <p>Please enter the Course cost for One-Time Purchase</p>
                                  <div class="form-group row  la-admin__subform-group">
                                      <div class="input-group col-sm-6 la-admin__subinput-group">
                                        <div class="input-group-prepend la-admin__subinput-prepend" >
                                            <span class="fa fa-dollar input-group-text la-admin__subinput-text"></span> 
                                        </div>
                                        <input type="number" class="form-control la-admin__subform-input" name="price" style="width:160px"/>
                                      </div>
                                  </div>
                              </div>
                          </label>
                      </div>

                        {{-- <div class="la-admin__cp-premium ">
                          <input type="radio" name="subscription" id="subPremium" value="Premium" class="la-admin__cp-input"> 
                              <label for="subPremium" > 
                                <div class="la-admin__cp-circle">
                                  <span class="la-admin__cp-radio"></span>
                                  <span class="la-admin__cp-label">Premium </span>
                                  <div class="mx-1 mt-1" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="There are many variations of passages of Lorem Ipsum available">
                                    <span class="la-icon la-icon--md icon-details"> 
                                  </div>
                                </div>
                                <div class="la-admin__cp-desc">
                                    <p> This course is accessible only by exclusive purchase </p>
                                </div>
                            </label>
                        </div> <br/> --}}

                        <div class="la-admin__cp-free">
                            <input type="radio" id="subFree" name="package_type" value="0" class="la-admin__cp-input">
                            <label for="subFree" > 
                              <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Free</span> 
                              </div>

                                <div class="la-admin__cp-desc">
                                    <p class="">  This course is accessible by any learner </p>
                                </div>
                            </label>
                        </div>
                  </div>
                </div>
              </div>
               <!-- COURSE PACKAGE TYPE: END -->
              <div class="la-admin__hr-line"></div>
               <!-- PREVIEW IMAGE & VIDEO FILES: START -->
              <div class="row">
                <div class="col-md-5">
                      <div class="la-admin__preview">
                        <label for="" class="la-admin__preview-label">{{ __('adminstaticword.PreviewImage') }}:<sup class="redstar">*</sup></label>
                        <div class="la-admin__preview-img la-admin__course-imgvid" >
                             <div class="la-admin__preview-text">
                                  <p class="la-admin__preview-size">Preview Image size: 250x150</p>
                                  <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                            </div>
                            <div class="text-center pr-20 mr-10">
                              <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:160px;">
                                <span class="path1"><span class="path2"></span></span>
                              </span>
                            </div>
                            <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="preview_image" id="image" />
                            <img src="" alt="" class="d-none preview-img"/>
                        </div>
                      </div>
                </div>

                <div class="col-md-2"></div>
                <div class="col-md-5">
                      <div class="la-admin__preview">
                        <label for="" class="la-admin__preview-label"> {{ __('adminstaticword.PreviewVideo') }}:</label>
                        <div class="la-admin__preview-video la-admin__course-imgvid">
                           <div class="la-admin__preview-text">
                                  <p class="la-admin__preview-size">Preview video size: 20MB</p>
                                  <p class="text-uppercase la-admin__preview-file">Choose a File</p>
                            </div>
                            <div class="text-center pr-20 mr-10">
                              <span class="la-icon la-icon--8xl icon-preview-video" style="font-size:160px;">
                                <span class="path1"><span class="path2"></span></span>
                              </span>
                            </div>
                            <input type="file" class="form-control la-admin__preview-input preview_video" name="preview_video" />
                            <video controls class="d-none preview-video w-100">
                              <source src="">
                                Your browser does not support HTML5 video.
                            </video>

                        </div>
                      </div>
                </div>
              </div>
               <!-- PREVIEW IMAGE & VIDEO FILES: END -->
              <br/>
              <div class="row">
                <div class="col-md-2">
                  <label for="exampleInputDetails">Master Class:</label>
                  <li class="tg-list-item">              
                    <input class="la-admin__toggle-switch" id="master_class" type="checkbox" name="master_class" >
                    <label class="la-admin__toggle-label" data-tg-off="Disable" data-tg-on="Enable" for="master_class"></label>
                  </li>
                  <input type="hidden"  name="master_class" value="0" for="master_class" id="master_class">
                </div>
              </div>
              <br/>
              <br/>

              <div class="box-footer">
                <button type="submit" class="btn btn-lg btn-primary col-md-3 ">{{ __('adminstaticword.Submit') }}</button>
              </div>

            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->
</section> 

@endsection

@section('scripts')
<script>
(function($) {
  "use strict";
    tinymce.init({selector:'textarea#detail'});
})(jQuery);
</script>


<script>
(function($) {
"use strict";

  $(function() {
    $('.js-example-basic-single').select2();
  });

  $(function() {
    $('#cb1').on('change', function() {
      $('#j').val(+ $(this).prop('checked'))
    })
  })

  $(function() {
    $('#cb3').on('change', function() {
      $('#test').val(+ $(this).prop('checked'))
    })
  })

  $('#cb111').on('change',function(){

    if($('#cb111').is(':checked')){
      $('#pricebox').show('fast');

      $('#priceMain').prop('required','required');

    }else{
      $('#pricebox').hide('fast');

      $('#priceMain').removeAttr('required');
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

      $('#ms').on('change', function(){
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

      $('#ms').on('change', function(){
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

      $('#msd').on('change', function(){
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
    $('#category_id').on('change', function() {
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
    $('#upload_id').on('change', function() {
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

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();    
    reader.onload = function(e) {
      $(input).siblings('.preview-img').attr('src', e.target.result).removeClass('d-none');
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$(".preview_img").change(function() {
  readURL(this);
});

$(document).on("change", ".preview_video", function(evt) {
  var $source = $(this).siblings('.preview-video');
  $source.find("source").attr("src", URL.createObjectURL(this.files[0]));
  $source.load();
  $($source).removeClass('d-none');
});

</script>

@endsection
