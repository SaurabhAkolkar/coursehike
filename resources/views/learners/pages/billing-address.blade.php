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
                    <h1 class="la-profile__title text-4xl pb-8">Billing Addresses</h1>
                    <div class="row">
                      <div class="col-7">
                        <div class="la-form" name="saved-addresss">
                            <div class="la-form__input-wrap">
                              <div class="la-form__lable la-form__lable--medium mb-2"> 
                                   @php
                                       $address1 = new stdClass;
                                       $address1->inputType = "radio";
                                       $address1->inputValue = "address1";
                                       $address1->inputName = "saved-address";
                                       $address1->inputId = "address1";
                                       $address1->title = "Address1";
                                       $address1->desc = "7/52, Nehru Nagar, Worli, Mumbai, India - 500532";
  
                                       $address2 = new stdClass;
                                       $address2->inputType = "radio";
                                       $address2->inputValue = "address2";
                                       $address2->inputName = "saved-address";
                                       $address2->inputId = "address2";
                                       $address2->title = "Address2";
                                       $address2->desc = "7/52, Nehru Nagar, Worli, Mumbai, India - 500532";
  
                                       $address3 = new stdClass;
                                       $address3->inputType = "radio";
                                       $address3->inputValue = "address3";
                                       $address3->inputName = "saved-address";
                                       $address3->inputId = "address3";
                                       $address3->title = "Address3";
                                       $address3->desc = "7/52, Nehru Nagar, Worli, Mumbai, India - 500532";
  
                                       $addresss = array($address1, $address2, $address3);
                                   @endphp     
                                   
                                   @foreach ($addresss as $address)
                                       <x-saved-card
                                          :inputType="$address->inputType"
                                          :inputValue="$address->inputValue"
                                          :inputName="$address->inputName"
                                          :inputId="$address->inputId"
                                          :title="$address->title"
                                          :desc="$address->desc"
                                       />
                                   @endforeach
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection