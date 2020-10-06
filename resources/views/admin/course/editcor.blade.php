<section class="content">
  {{-- @include('admin.message') --}}
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <!-- general form elements -->
        <div class="box-header with-border">
          <h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Course') }}</h3>
        </div>
        <br>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <form action="{{route('course.update',$cor->id)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}  
              {{ method_field('PUT') }}
             
              <div class="row">
                <div class="col-md-3">
                  <label>{{ __('adminstaticword.Category') }}<span class="redstar">*</span></label>
                  <select name="category_id" id="category_id" class="form-control js-example-basic-single" required>
                    <option value="0">{{ __('adminstaticword.SelectanOption') }}</option>
                    @php
                      $category = App\Categories::all();
                    @endphp 

                    @foreach($category as $caat)
                      <option {{ $cor->category_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->title }}</option>
                    @endforeach 
                  </select>
                </div>
                <div class="col-md-3">
                  <label>{{ __('adminstaticword.SubCategory') }}:<span class="redstar">*</span></label>
                  <select name="subcategory_id" id="upload_id" class="form-control js-example-basic-single">
                    @php
                      $subcategory = App\SubCategory::all();
                    @endphp
                    @foreach($subcategory as $caat)
                      <option {{ $cor->subcategory_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->title }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label>{{ __('adminstaticword.ChildCategory') }}:</label>
                  <select name="childcategory_id" id="grand" class="form-control js-example-basic-single">
                    @php
                      $childcategory = App\ChildCategory::all();
                    @endphp 

                    @foreach($childcategory as $caat)
                      <option {{ $cor->childcategory_id == $caat->id ? 'selected' : "" }} value="{{ $caat->id }}">{{ $caat->title }}</option>
                    @endforeach
                  </select>
                </div>     
                <div class="col-md-3">
                  @php
                    $User = App\User::all();
                  @endphp
                  <label for="exampleInputSlug">{{ __('adminstaticword.Instructor') }}</label>
                  <select name="user" class="form-control js-example-basic-single col-md-7 col-12">
                    <option  value="{{ Auth::user()->id }}">{{ Auth::user()->fname }}</option>
                  </select>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12"> 
                  @php
                      $languages = App\CourseLanguage::all();
                  @endphp
                  <label for="exampleInputSlug">{{ __('adminstaticword.SelectLanguage') }}</label>
                  <select name="language_id" class="form-control js-example-basic-single col-md-7 col-12">
                    @foreach($languages as $cat)
                      <option {{ $cor->language_id == $cat->id ? 'selected' : "" }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                  </select>
                </div>
                
              </div>
              <br>

              <div class="row">

                <div class="col-md-12"> 
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" value="{{ $cor->title }}">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="exampleInputDetails">{{ __('adminstaticword.ShortDetail') }}:<sup class="redstar">*</sup></label>
                  <textarea name="short_detail" rows="3" class="form-control" >{!! $cor->short_detail !!}</textarea>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Requirements') }}:<sup class="redstar">*</sup></label>
                  <textarea name="requirement" rows="3" class="form-control" required >{!! $cor->requirement !!}</textarea>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-12">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
                  <textarea id="detail" name="detail" rows="3" class="form-control">{!! $cor->detail !!}</textarea>
                </div>
              </div>
              <br>
              
              {{-- <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputSlug">Course Expire Duration</label>
                  <p class="inline info"> - Please enter duration in month</p>
                  <input min="1" class="form-control" name="duration" type="number" id="duration" value="{{ $cor->duration }}" placeholder="Enter Duration in months">
                </div>
              </div> --}}

              <!-- COURSE PACKAGE TYPE: START -->
              <div class="row">
                <div class="col-md-12">
                  <div class="la-admin__course-package">
                      <label for="" class="la-admin__cp-title">Course package type<sup class="redstar">*</sup></label><br/>
                      <div class="la-admin__cp-subscription">
                          <input type="radio" name="type" id="subPaid" value="1" class="la-admin__cp-input"> 
                           <label for="subPaid"> 
                             <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Subscription</span> 
                                <small><i class="fa fa-info-circle px-2"></i> (Default)</small>
                             </div>

                              <div class="la-admin__cp-desc">
                                  <p>This course is accessible by all Subscribers & also available for life-time purchase. </p>
                                  <p>Please enter the Course cost for One-Time Purchase</p>
                                  <div class="form-group row  la-admin__subform-group">
                                      <div class="input-group col-sm-6 la-admin__subinput-group">
                                        <div class="input-group-prepend la-admin__subinput-prepend" >
                                            <span class="fa fa-dollar input-group-text la-admin__subinput-text"></span> 
                                        </div>
                                        <input type="text" class="form-control la-admin__subform-input" name="price" style="width:160px"/>
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
                                  <small><i class="fa fa-info-circle pl-1"></i> </small>
                                </div>
                                <div class="la-admin__cp-desc">
                                    <p> This course is accessible only by exclusive purchase </p>
                                </div>
                            </label>
                        </div> <br/> --}}

                        <div class="la-admin__cp-free">
                            <input type="radio" name="type" id="subFree" value="0" class="la-admin__cp-input">
                            <label for="subFree" > 
                              <div class="la-admin__cp-circle">
                                <span class="la-admin__cp-radio"></span>
                                <span class="la-admin__cp-label">Free</span> 
                                <small><i class="fa fa-info-circle pl-1"></i> </small>
                              </div>

                                <div class="la-admin__cp-desc">
                                    <p class="la-admin__cp-desc">  This course is accessible by any learner </p>
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
                      <div class="la-admin__preview-img" >
                            <div class="la-admin__preview-text">
                                <p class="la-admin__preview-size">Preview Image size: 250x150</p>
                                <p class="la-admin__preview-file text-uppercase">Choose a File</p>
                          </div>
                          <input type="file" class="form-control la-admin__preview-input inputfile inputfile-1 preview_img" name="preview_image" id="image" />
                        @if($cor['preview_image'] !== NULL && $cor['preview_image'] !== '')
                            <img src="{{ url('/images/course/'.$cor->preview_image) }}" id="preview-img" />
                        @else
                            <img src="{{ Avatar::create($cor->title)->toBase64() }}" id="preview-img" alt="course" class="img-fluid">
                        @endif
                      </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                      <div class="la-admin__preview">
                        <label for="" class="la-admin__preview-label"> {{ __('adminstaticword.PreviewVideo') }}:</label>
                        <div class="la-admin__preview-video">
                           <div class="la-admin__preview-text">
                                  <p class="la-admin__preview-size">Preview video size: 20MB</p>
                                  <p class="text-uppercase la-admin__preview-file">Choose a File</p>
                            </div>
                            <input type="file" class="form-control la-admin__preview-input preview_video" name="video" value="{{ $cor->video }}"/>
                            {{-- @if($cor->video !="") --}}
                              <video controls class="d-none preview-video w-100">
                                <source src="{{ asset('video/preview/'.$cor->video) }}" id="preview-video-source">
                                  Your browser does not support HTML5 video.
                              </video>
                            {{-- @endif  --}}
                        </div>
                      </div>
                </div>
              </div>
               <!-- PREVIEW IMAGE & VIDEO FILES: END -->
              <br>
              <br> 

              <div class="row">
                <div class="col-md-3 d-none">
                  <label for="exampleInputDetails">{{ __('adminstaticword.MoneyBack') }}:</label>
                  <li class="tg-list-item">
                    <input  class="la-admin__toggle-switch" id="rox" type="checkbox" @if($cor->day !="" && $cor->day !="") checked @endif/>
                    <label class="la-admin__toggle-label" data-tg-off="No" data-tg-on="Yes" for="rox" ></label>
                  </li>
                  <input type="hidden" name="money" value="0" id="roxx">
                  <br>     

                  <div @if($cor->day =="" && $cor->day =="") class="display-none" @endif id="jeet">
                    <label for="exampleInputSlug">{{ __('adminstaticword.Days') }}:<sup class="redstar">*</sup></label>
                    <input type="number" min="1"  class="form-control" name="day" id="exampleInputPassword1" placeholder="Please Your Enter day" value="{{ $cor->day }}">
                  </div>
                </div>          

                <div class="col-md-3"> 
                  @if(Auth::User()->role == "admin")
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Featured') }}:</label>
                  <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="cb1" type="checkbox"{{ $cor->featured==1 ? 'checked' : '' }}>
                    <label class="la-admin__toggle-label" data-tg-off="No" data-tg-on="Yes" for="cb1"></label>
                  </li>
                  <input type="hidden" name="featured" value="{{ $cor->featured }}" id="f">
                  @endif
                </div>
                <div class="col-md-3">
                  @if(Auth::User()->role == "admin")
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                    <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="cb333" type="checkbox" {{ $cor->status==1 ? 'checked' : '' }}>
                    <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="cb333"></label>
                    </li>
                    <input type="hidden" name="status" value="{{ $cor->status }}" id="c33">
                  @endif
                </div> 
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-lg col-md-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
              </div>
         
            </form>
          </div>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section> 


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
    $('#cb1').change(function() {
      $('#f').val(+ $(this).prop('checked'))
    })
  })

  $(function() {
    $('#cb3').change(function() {
      $('#test').val(+ $(this).prop('checked'))
    })
  })

  $(function(){

      $('#murl').change(function(){
        if($('#murl').val()=='yes')
        {
            $('#doab').show();
        }
        else
        {
            $('#doab').hide();
        }
      });

  });

  $(function(){

      $('#murll').change(function(){
        if($('#murll').val()=='yes')
        {
            $('#doabb').show();
        }
        else
        {
            $('#doab').hide();
        }
      });

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
