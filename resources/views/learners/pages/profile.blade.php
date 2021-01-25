@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">
      
      <!-- Side Navbar: Start -->
      @include ('learners.pages.sidebar')
      <!-- Side Navbar: End -->  
      <div class="la-profile__main">
        <div class="container la-anim__wrap">
          <div class="la-profile__main-inner">
            <div class="la-profile__title-wrap la-anim__stagger-item">
              <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="{{URL::previous()}}"></a>
              <h1 class="la-profile__title m-0">Edit Profile</h1><span class="la-profile__para la-profile__para--light">Feel free to edit you personal details.</span>
            </div>
            @if(session('message'))
              <div class="alert alert-danger">{{ session('message') }}</div>
            @endif
            <section class="la-profile__form">
              <div class="la-profile__form-inner">
                <form class="la-form" action="" name="profile_name" method="post" enctype="multipart/form-data" id="profile_form">
                  @csrf
                  <div class="row ">
                    <div class="col-12">
                      <div class="la-form__input-wrap">
                        <div class="la-form__lable la-form__lable--medium mb-2 la-anim__stagger-item">Profile Photo</div>
                        <div class="row">
                          <div class="col-6 la-anim__stagger-item--x">
                            <div class="la-form__img-wrap">
                              <div class="la-form__img-title">Current</div>
                              <div class="la-form__img d-inline-block d-flex justify-content-center content-fit"><img src="{{Auth::user()->user_img}}" id="user_image" alt="" class="mw-100 mh-100"></div>
                            </div>
                          </div>
                          <div class="col-6 la-anim__stagger-item--x">
                            <div class="la-form__img-wrap">
                              <div class="la-form__img-title">Upload new</div>
                              <input class="d-none" id="file-upload" type="file" name="user_img">
                              <label class="la-form__img la-form__img-upload d-inline-block text-center" for="file-upload"><a class="d-inline-block" href="#" onclick="$('#file-upload').click()">CHOOSE A FILE </a> <br/><span class="la-form__img-info">Thumbnail | 500x500</span><img src="" alt=""></label>
                              @error('user_img')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">First Name</div>
                                      <input class="la-form__input" type="text" value="{{Auth::user()->fname}}" name="first_name" placeholder="Jhon">
                                      @error('first_name')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                    </div>
                    <div class="col-md-6 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Last Name</div>
                                      <input class="la-form__input" type="text" value="{{Auth::user()->lname}}" name="last_name" placeholder="Spark">
                                      @error('last_name')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                    </div>
                    <div class="col-md-6 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Email</div>
                                      <input class="la-form__input" type="email" value="{{Auth::user()->email}}" name="email" placeholder="nathanspark@gmail.com">
                                      @error('email')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                    </div>
                    <div class="col-md-6 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Contact Number</div>
                                      <input class="la-form__input" type="tel" value="{{Auth::user()->mobile}}" name="mobile" placeholder="9999999999">
                                      @error('mobile')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                    </div>
                    <div class="col-md-6 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Date of Birth</div>
                                    <input class="la-form__input" type="date" value="{{Auth::user()->dob}}" name="dob" placeholder="July 16, 1996" min='1899-01-01' max='2000-01-01'>
                                      @error('dob')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                    </div>
                    <div class="col-md-6 la-anim__stagger-item--x">
                      <div class="la-form__input-wrap">
                        <div class="la-form__lable la-form__lable--medium mb-2">Gender</div>
                        <div class="d-flex pt-2">
                                        <div class="la-form__radio-wrap mr-5">
                                          <input class="la-form__radio d-none" type="radio" value="male" name="gender" id="male" @if(Auth::user()->gender == "male")checked @endif>
                                          <label class="d-flex align-items-center" for="male"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Male</span></label>
                                        </div>
                                        <div class="la-form__radio-wrap mr-5">
                                          <input class="la-form__radio d-none" type="radio" value="female" name="gender" id="female" @if(Auth::user()->gender == "female")checked @endif>
                                          <label class="d-flex align-items-center" for="female"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Female</span></label>
                                        </div>
                                        <div class="la-form__radio-wrap mr-5">
                                          <input class="la-form__radio d-none" type="radio" value="Other" name="gender" id="Other" @if(Auth::user()->gender == "Other")checked @endif>
                                          <label class="d-flex align-items-center" for="Other"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Other</span></label>
                                        </div>
                        </div>
                        @error('gender')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Residential Address</div>
                                      <input class="la-form__input" type="text" value="{{Auth::user()->address}}" name="address" placeholder="F/64, Apmc Market-i, Phase Ii, Turbhe, Vashi">
                                      @error('address')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                    </div>
                    <div class="col-md-6 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Country</div>
                                      <!-- <input class="la-form__input" type="text" value="{{Auth::user()->country_id}}" name="country" placeholder="India"> -->
                                      <select class="la-form__input" name="country" id="country_id">
                                        <option disabled selected>Select Country</option>
                                        @foreach($countries as $key=>$value)
                                            <option value="{{$key}}" @if(Auth::user()->country_id == $key) selected @endif>
                                                {{$value}}
                                            </option>
                                        @endforeach
                                      <select>
                                      @error('country')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                    </div>
                    <div class="col-md-6 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">State</div>
                                      <!-- <input class="la-form__input" type="text" value="{{Auth::user()->state_id}}" name="state" placeholder="India"> -->
                                      <select class="la-form__input" name="state" id="state_id">
                                        <option disabled selected>Select State</option>
                                          @foreach($states as $key=>$value)
                                              <option value="{{$key}}" @if(Auth::user()->state_id == $key) selected @endif>
                                                  {{$value}}
                                              </option>
                                          @endforeach
                                      <select>
                                      @error('state')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                    </div>
                    <div class="col-md-6 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">City</div>
                                      <!-- <input class="la-form__input" type="text" value="{{Auth::user()->city_id}}" name="city" placeholder="India"> -->
                                      <select class="la-form__input" name="city" id="city_id">
                                        <option disabled selected>Select City</option>
                                        @foreach($cities as $key=>$value)
                                            <option value="{{$key}}"  @if(Auth::user()->city_id == $key) selected @endif>
                                                {{$value}}
                                            </option>
                                        @endforeach                                       
                                      <select>
                                      @error('city')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                    </div>
                    <div class="col-md-6 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Zip Code</div>
                                      <input class="la-form__input" type="number" value="{{Auth::user()->pin_code}}" name="zipcode" placeholder="400703">
                                      @error('zipcode')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                    </div>
                    <div class="col-md-12 la-anim__stagger-item--x">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Short Bio</div>
                                      <textarea class="la-form__textarea" name="short_bio" cols="30" rows="10" placeholder="Type here" >{{Auth::user()->detail}}</textarea>
                                    </div>
                    </div>
                  </div>

                  <div class="la-hero__actions d-flex align-items-center justify-content-end la-anim__stagger-item--x">
                    <button type="submit" class="w-25 la-btn__app py-3  text--black" type="button" href="">Save</button>
                  </div>
                </form>
              </div>
            </section>

            <section class="la-section la-profile__update-passwrod la-profile__form la-anim__wrap">
              <div class="la-profile__form-inner ">
                <div class="la-password__update-option mb-8 d-flex la-anim__stagger-item--x">
                  <div class="la-password__update-toggler text text-uppercase mr-3 collapsed " id="password-toggler" data-toggle="collapse" data-target="#passwordCollapse" aria-expanded="false" aria-controls="passwordCollapse">Update Password</div>
                </div>
                <div class="collapse " id="passwordCollapse">
                  <form class="la-password__update-content" id="change_password_form" method="Post" action="{{route('update.password')}}" name = "change_password_form">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="la-form__input-wrap">
                          <div class="la-form__lable la-form__lable--medium mb-2">Current Password</div>
                          <input class="la-form__input" type="password"  name="current_password" placeholder="">
                          @error('current_password')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="la-form__input-wrap">
                          <div class="la-form__lable la-form__lable--medium mb-2">New Password</div>
                          <input class="la-form__input" type="password"  name="new_password" placeholder="">
                          @error('new_password')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="la-password__update-actions d-flex">
                      <div class="la-btn__plain text--burple text-right mr-5"> 
                        <button onclick = "$('#change_password_form').submit();" type="submit" class="text-uppercase la-btn__plain text--burple text-right mr-5"> Change Password</button>
                      </div>
                      <button class="la-btn__plain text--danger text-right"><a class="text-uppercase"> Cancel</a></button>
                    </div>
                  </form>
                </div>
                
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('footerScripts')
<script>
    
    
      $('#state_id').change(function() {
        var cat_id = $(this).val();  
        var up = $('#city_id').empty();  
        let urlLike = '{{ url('country/gcity') }}';
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
              up.append('<option value="0">Select City</option>');
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

      $('#country_id').change(function() {
        var cat_id = $(this).val();  
        var up = $('#state_id').empty();  
        let urlLike = '{{ url('country/gstate') }}';
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
              up.append('<option value="0">Select State</option>');
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

    

    $("form[name='profile_name']").validate({
      
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      first_name: "required",
      last_name: "required",
      mobile: {
        required: true,
        minlength: 10
      },
      dob: "required",
      zipcode: "required",
      city: "required",
      gender: "required",
      state: "required",
      country: "required",
      address : "required",
      email: {
        required: true,
        email: true
      },
      user_img: {
            required: false,
            extension: "jpg|jpeg|png"
      }
    },
    // Specify validation error messages
    messages: {
      first_name: "Please enter your First Name.",
      last_name: "Please enter your Last Name.",
      mobile: {
        required: "Please provide a Contact Number.",
        minlength: "Your Contact Number must be at least 10 digits long."
      },
      email: {
        required: "Please provide an Email.",
        email: "Please provide a correct Email."
      },
      dob : "Date Of Birth is required.",
      zipcode : "Zipcode is required.",
      gender : "Gender is required.",
      city : "Please select a City",
      state : "Please select a State",
      country : "Plesae select a Country",
      user_img: "Please upload image with following formats .jpg, .jpeg and .png."
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
    
  });

  $("form[name='change_password_form']").validate({
      
      rules: {

        new_password: {
          required: true,
          minlength: 6
        }, 
        current_password: {
          required: true,
          minlength: 6
        }
      },
      // Specify validation error messages
      messages: {
        new_password: {
          required: "Please provide a New Password.",
          minlength: "Password must be minimum 6 characters."
        },
        current_password: {
          required: "Please provide a Current Password.",
          minlength: "Password must be minimum 6 characters."
        }
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
      
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#user_image').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#file-upload").change(function() {
      readURL(this);
    });

  </script>
@endsection