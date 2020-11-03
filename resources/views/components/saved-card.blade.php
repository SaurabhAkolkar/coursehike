<div class="la-form__radio-wrap d-flex justify-content-between mr-5 my-8">
    <div class="la-form__radio-wrap">
        <input class="la-form__radio d-none" 
            type= {{ $inputType }} 
            value= {{ $inputValue }}
            name= {{ $inputName }}
            id = {{ $inputId }}
         />

        <label class="d-flex align-items-start" for="{{ $inputId }}">
            <span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span>
            <span class="la-form__radio-label text-md mt-n1"> {{ $title }} <br>
                <h6 class="la-form__radio-card text-sm body-font"> {{ $desc }}</h6>
            </span>
        </label>
    </div>

    <div class="la-form__radio-icons d-flex">   
        <a class="la-form__radio-edit mr-5" href="#" data-toggle="modal" data-target="#update_card">
            <span class="la-icon la-icon--xl icon-edit" style="color:#000"></span>
        </a>
        <a class="la-form__radio-delete" href="" role="button">
            <span class="la-icon la-icon--xl icon-delete" style="color:rgb(255, 62, 62)"></span>
        </a>
    </div>
</div>



<!-- EDIT CARD DETAILS MODAL: START -->
<div class="modal fade la-cart__edit-modal" id="update_card">
    <div class="modal-dialog la-cart__edit-dialog">
      <div class="modal-content la-cart__edit-content">
      
        <div class="modal-header la-cart__edit-header">
          <h4 class="modal-title la-cart__edit-title" style="font-weight: var(--font-semibold);">Edit Card</h4>
          <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
        </div>
        
        <div class="modal-body la-cart__edit-body">
            <form class="la-payment__form" action="" name="edit_card">
                <div class="form-row la-payment__form-row">
                    @php
                            $payment1 = new stdClass;
                            $payment1->inputLabel = "Card Number";
                            $payment1->inputType = "tel";
                            $payment1->inputValue = "xxxx-xxxx-xxx-3614";
                            $payment1->inputName = "card-number";
                            $payment1->inputId = "card-number";

                            $payment2 = new stdClass;
                            $payment2->inputLabel = "Expiry Date";
                            $payment2->inputType = "text";
                            $payment2->inputValue = "02/96";
                            $payment2->inputName = "card-expiry";
                            $payment2->inputId = "card-expiry";

                            $payment3 = new stdClass;
                            $payment3->inputLabel = "Card Holder's Name";
                            $payment3->inputType = "text";
                            $payment3->inputValue = "Nathan";
                            $payment3->inputName = "card-owner";
                            $payment3->inputId = "card-owner";

                            $payment4 = new stdClass;
                            $payment4->inputLabel = "CVV";
                            $payment4->inputType = "number";
                            $payment4->inputValue = "365";
                            $payment4->inputName = "card-cvv";
                            $payment4->inputId = "card-cvv";

                            $payments = array($payment1, $payment2, $payment3, $payment4);
                        @endphp

                        @foreach ($payments as $payment)
                            <div class="col-12 col-md-6 py-3">
                                <x-payment 
                                    :inputLabel="$payment->inputLabel"
                                    :inputType="$payment->inputType"
                                    :inputValue="$payment->inputValue"
                                    :inputName="$payment->inputName"
                                    :inputId="$payment->inputId"
                                />
                            </div>
                        @endforeach
                </div>

                <div class=" d-flex justify-content-end mt-md-8 mb-2">
                    <button class="la-btn__app col-md-4 py-3">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
<!-- EDIT CARD DETAILS MODAL: END -->

