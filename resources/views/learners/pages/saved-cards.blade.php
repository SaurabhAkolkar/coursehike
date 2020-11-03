@extends('learners.layouts.app')

@section('content')

<div class="la-profile">
    <div class="la-profile__wrap">
      
       <!-- Side Navbar: Start -->
       @include ('learners.pages.sidebar')
       <!-- Side Navbar: End -->  

        <div class="la-profile__main pb-md-20">
            <div class="container">
                <div class="la-profile__main-inner pb-md-20">
                    <h1 class="la-profile__title text-4xl pb-8">Saved Cards</h1>
                    <div class="row">
                      <div class="col-7">
                        <div class="la-form" name="saved-cards">
                          <div class="la-form__input-wrap">
                            <div class="la-form__lable la-form__lable--medium mb-2"> 
                                 @php
                                     $card1 = new stdClass;
                                     $card1->inputType = "radio";
                                     $card1->inputValue = "card1";
                                     $card1->inputName = "saved-card";
                                     $card1->inputId = "card1";
                                     $card1->title = "Nathan Spark";
                                     $card1->desc = "xxxx-xxxx-xxxx-3614";

                                     $card2 = new stdClass;
                                     $card2->inputType = "radio";
                                     $card2->inputValue = "card2";
                                     $card2->inputName = "saved-card";
                                     $card2->inputId = "card2";
                                     $card2->title = "Natalia";
                                     $card2->desc = "xxxx-xxxx-xxxx-0414";

                                     $card3 = new stdClass;
                                     $card3->inputType = "radio";
                                     $card3->inputValue = "card3";
                                     $card3->inputName = "saved-card";
                                     $card3->inputId = "card3";
                                     $card3->title = "Amy D'souza";
                                     $card3->desc = "xxxx-xxxx-xxxx-3014";

                                     $cards = array($card1, $card2, $card3);
                                 @endphp     
                                 
                                 @foreach ($cards as $card)
                                     <x-saved-card
                                        :inputType="$card->inputType"
                                        :inputValue="$card->inputValue"
                                        :inputName="$card->inputName"
                                        :inputId="$card->inputId"
                                        :title="$card->title"
                                        :desc="$card->desc"
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