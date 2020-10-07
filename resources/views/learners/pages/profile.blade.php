@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">
      
      <!-- Side Navbar: Start -->
      @include ('learners.pages.sidebar')
      <!-- Side Navbar: End -->  

      <div class="la-profile__main">
        <div class="container">
          <div class="la-profile__main-inner">
            <div class="la-profile__title-wrap">
              <h1 class="la-profile__title">Edit Profile</h1><span class="la-profile__para la-profile__para--light">Feel free to edit you personal details.</span>
            </div>
            <section class="la-profile__form">
              <div class="la-profile__form-inner">
                <form class="la-form" action="">
                  <div class="row">
                    <div class="col-12">
                      <div class="la-form__input-wrap">
                        <div class="la-form__lable la-form__lable--medium mb-2">Profile Photo</div>
                        <div class="row">
                          <div class="col-6">
                            <div class="la-form__img-wrap">
                              <div class="la-form__img-title">Current</div>
                              <div class="la-form__img d-inline-block"><img src="" alt=""></div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="la-form__img-wrap">
                              <div class="la-form__img-title">Upload new</div>
                              <input class="d-none" id="file-upload" type="file">
                              <label class="la-form__img la-form__img-upload d-inline-block text-center" for="file-upload"><a class="d-inline-block" href="">CHOOSE A FILE </a><span class="la-form__img-info">Thumbnail | 500x500</span><img src="" alt=""></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">First Name</div>
                                      <input class="la-form__input" type="text" value="Nathan" name="first-name" placeholder="Jhon">
                                    </div>
                    </div>
                    <div class="col-md-6">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Last Name</div>
                                      <input class="la-form__input" type="text" value="Spark" name="last-name" placeholder="Spark">
                                    </div>
                    </div>
                    <div class="col-md-6">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Email</div>
                                      <input class="la-form__input" type="email" value="nathanspark@gmail.com" name="email" placeholder="nathanspark@gmail.com">
                                    </div>
                    </div>
                    <div class="col-md-6">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Contact Number</div>
                                      <input class="la-form__input" type="tel" value="9999999999" name="contact-number" placeholder="9999999999">
                                    </div>
                    </div>
                    <div class="col-md-6">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Date of Birth</div>
                                      <input class="la-form__input" type="date" value="July 16, 1996" name="contact-number" placeholder="July 16, 1996">
                                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="la-form__input-wrap">
                        <div class="la-form__lable la-form__lable--medium mb-2">Gender</div>
                        <div class="d-flex">
                                        <div class="la-form__radio-wrap mr-5">
                                          <input class="la-form__radio d-none" type="radio" value="male" name="gender" id="male">
                                          <label class="d-flex align-items-center" for="male"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Male</span></label>
                                        </div>
                                        <div class="la-form__radio-wrap mr-5">
                                          <input class="la-form__radio d-none" type="radio" value="female" name="gender" id="female">
                                          <label class="d-flex align-items-center" for="female"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Female</span></label>
                                        </div>
                                        <div class="la-form__radio-wrap mr-5">
                                          <input class="la-form__radio d-none" type="radio" value="Other" name="gender" id="Other">
                                          <label class="d-flex align-items-center" for="Other"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Other</span></label>
                                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Residential Address</div>
                                      <input class="la-form__input" type="text" value="" name="residential-address" placeholder="F/64, Apmc Market-i, Phase Ii, Turbhe, Vashi">
                                    </div>
                    </div>
                    <div class="col-md-6">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Country</div>
                                      <input class="la-form__input" type="text" value="India" name="country" placeholder="India">
                                    </div>
                    </div>
                    <div class="col-md-6">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">State</div>
                                      <input class="la-form__input" type="text" value="India" name="state" placeholder="India">
                                    </div>
                    </div>
                    <div class="col-md-6">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">City</div>
                                      <input class="la-form__input" type="text" value="India" name="city" placeholder="India">
                                    </div>
                    </div>
                    <div class="col-md-6">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Zip Code</div>
                                      <input class="la-form__input" type="number" value="400703" name="zipcode" placeholder="400703">
                                    </div>
                    </div>
                    <div class="col-md-12">
                                    <div class="la-form__input-wrap">
                                      <div class="la-form__lable la-form__lable--medium mb-2">Short Bio</div>
                                      <textarea class="la-form__textarea" name="" cols="30" rows="10" placeholder="Type here"></textarea>
                                    </div>
                    </div>
                  </div>
                  <div class="la-hero__actions d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn la-btn la-btn--secondary text--black" type="button" href="">Save</button>
                  </div>
                </form>
              </div>
            </section>
            <section class="la-section la-profile__update-passwrod la-profile__form">
              <div class="la-profile__form-inner">
                <div class="la-password__update-option mb-8 d-flex">
                  <div class="text text-uppercase mr-3" data-toggle="collapse" data-target="#passwordCollapse" aria-expanded="false" aria-controls="passwordCollapse">Update Password</div><span class="icon icon-arrow d-inline-block"></span>
                </div>
                <div class="collapse" id="passwordCollapse">
                  <form class="la-password__update-content" action="">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="la-form__input-wrap">
                          <div class="la-form__lable la-form__lable--medium mb-2">Current Password</div>
                          <input class="la-form__input" type="password" value="India" name="current-password" placeholder="****">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="la-form__input-wrap">
                          <div class="la-form__lable la-form__lable--medium mb-2">New Password</div>
                          <input class="la-form__input" type="password" value="India" name="new-password" placeholder="****">
                        </div>
                      </div>
                    </div>
                    <div class="la-password__update-actions d-flex">
                      <div class="la-btn__plain text--burple text-right mr-5"> 
                        <button type="submit" class="text-uppercase"> Change Password</button>
                      </div>
                      <div class="la-btn__plain text--danger text-right"><a class="text-uppercase"> Cancel</a></div>
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