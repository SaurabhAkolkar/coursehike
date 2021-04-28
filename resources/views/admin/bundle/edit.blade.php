@extends('admin.layouts.master')
@section('title', 'Category Slider - Admin')
@section('body')




<section class="content">
  @include('admin.message')
  <div class="row">
    <!-- left column -->
    <div class="col-12">
      <div class="box box-primary">       
        <h3 class="la-admin__section-title ml-3"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Course') }}</h3>
      
        <!-- /.box-header -->
        <div class="box-body">
         
            <form action="{{route('bundle.update',$cor->id)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}  
              {{ method_field('PUT') }}
             
              
              <div class="row">
                <div class="col-md-6 col-lg-6  mb-3"> 
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="title" id="exampleInputTitle" value="{{ $cor->title }}">
                </div>
              
              
                <div class="col-md-6 col-lg-6  mb-3"> 
                  <div class="form-group">
                    <label>{{ __('adminstaticword.SelectClass') }}: <span class="redstar">*</span></label>
                    <select class="form-control js-example-basic-single" name="course_id[]" multiple="multiple" size="5" row="5" placeholder="Select Courses">
                      @foreach ($courses as $cat)
                        @if($cat->status == 1)
                        <option value="{{ $cat->id }}" {{in_array($cat->id, $cor['course_id'] ?: []) ? "selected": ""}}>{{ $cat->title }}
                        </option>
                        @endif

                      @endforeach

                    </select>
                  </div>
                </div>

                <div class="col-lg-6  mb-3"> 
                  <div class="form-group">
                    <label>{{ __('adminstaticword.Category') }}: <span class="redstar">*</span></label>
                    <select class="form-control js-example-basic-single" name="category_id"  placeholder="Select Category">
                      @foreach ($category as $cat)
                        @if($cat->status == 1)
                        <option value="{{ $cat->id }}" @if($cat->id == $cor->category_id) selected @endif>{{ $cat->title }}
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
                         
                
                <div class="col-12 mb-4 mb-md-8">
                    <label for="exampleInputDetails">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
                    <textarea id="detail" name="detail" rows="3" class="form-control" required >{!! $cor->detail !!}</textarea>
                </div>
            
                <div class="col-md-8 col-lg-5  mb-3">
                  <div class="la-admin__preview">
                    <label for="" class="la-admin__preview-label p-0">Thumbnail Image:<sup class="redstar">*</sup></label>
                    <div class="la-admin__preview-img la-admin__course-imgvid la-admin__course-modal-imgvid" >
                        <div class="la-admin__preview-text">
                          <p class="la-admin__preview-size">Thumbnail | 720 x 540</p>
                          <p class="la-admin__preview-file la-admin__preview-filebg text-uppercase">Choose a File</p>
                        </div>
                        <div class="text-center px-20 mr-20">
                          <span class="la-icon la-icon--8xl icon-preview-image" style="font-size:140px;">
                            <span class="path1"><span class="path2"></span></span>
                          </span>
                        </div>
                        <input type="file" name="image" id="image" class="form-control la-admin__preview-input inputfile inputfile-1"  />
                        <img src="{{ $cor->preview_image }}" alt="" class="preview-img"/>
                    </div>
                  </div>

                      {{-- <img src="{{ $cor->preview_image }}" height="100px;" width="100px;" class="mx-auto img-fluid d-block"/> --}}
                  
                </div>

                <div class="col-md-4 col-lg-3 mb-3">
                  <label for="exampleInputDetails">{{ __('adminstaticword.Free') }}:</label>  
                  <li class="tg-list-item"> 
                    <input  class="la-admin__toggle-switch" id="cb112" name="type" type="checkbox" {{ $cor->price == null ? 'checked' : '' }}/>
                    <label class="la-admin__toggle-label" data-tg-off="Free" data-tg-on="Paid" for="cb112" ></label>
                  </li>
                  <input type="hidden" name="free" value="0" id="j111">
                  <br>     
                  <div id="pricebox">
                      <div @if($cor->price =="" && $cor->price =="") class="display-none" @endif id="doabox">
                        <label for="exampleInputSlug">{{ __('adminstaticword.Price') }}: <sup class="redstar">*</sup></label>
                        <input type="number" min="1"   class="form-control" name="price" id="exampleInputPassword1" placeholder="Please Your Enter paid" value="{{ $cor->price }}">
                      </div>

                      <div @if($cor->price =="" && $cor->discount_price =="") class="display-none" @endif id="doaboxx">
                      <br>
                        <label for="exampleInputSlug">{{ __('adminstaticword.DiscountPrice') }}: <sup class="redstar">*</sup></label>
                        <input type="number" min="1"  class="form-control" name="discount_price" id="exampleInputPassword1" placeholder="Please Your Enter paid" value="{{ $cor->discount_price }}">
                      </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-2  mb-3"> 
                  @if(Auth::User()->role == "admin")
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Featured') }}:</label>
                  <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="cb1" type="checkbox"{{ $cor->featured==1 ? 'checked' : '' }}>
                    <label class="la-admin__toggle-label" data-tg-off="No" data-tg-on="Yes" for="cb1"></label>
                  </li>
                  <input type="hidden" name="featured" value="{{ $cor->featured }}" id="f">
                  @endif
                </div>

                <div class="col-md-6 col-lg-2 mb-3">
                  @if(Auth::User()->role == "admin")
                  <label for="exampleInputTit1e">{{ __('adminstaticword.Status') }}:</label>
                    <li class="tg-list-item">
                    <input class="la-admin__toggle-switch" id="cb333" type="checkbox" {{ $cor->status==1 ? 'checked' : '' }}>
                    <label class="la-admin__toggle-label" data-tg-off="Deactive" data-tg-on="Active" for="cb333"></label>
                    </li>
                    <input type="hidden" name="status" value="{{ $cor->status }}" id="c33">
                  @endif
                </div>

               
                <div class="col-12 text-right">
                  <button type="submit" class="btn btn-primary px-md-16">{{ __('adminstaticword.Save') }}</button>
                </div>
              </div>
         
            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
    </div>
</section> 

@endsection




@section('scripts')

<script>
(function($) {
  "use strict";

     tinymce.init({selector:'textarea#detail'});

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

  $('#cb112').on('change',function(){

    if($('#cb112').is(':checked')){
      $('#pricebox').hide('fast');

    $('#priceMain').removeAttr('required'); 
    }else{     

      $('#pricebox').show('fast');
      $('#priceMain').prop('required','required');
    }

});

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

    
  $(".inputfile").change(function() {
  readURL(this);
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();    
    reader.onload = function(e) {
      $(input).siblings('.preview-img').attr('src', e.target.result).removeClass('d-none');
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

})(jQuery);

</script>
  
@endsection
