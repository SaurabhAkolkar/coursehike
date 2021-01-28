<div class="la-form__radio-wrap d-flex justify-content-between mr-5 my-10">
    <div class="la-form__radio-wrap">
        <input class="la-form__radio d-none" 
            type= {{ $inputType }} 
            value= {{ $inputValue }}
            name= {{ $inputName }}
            id = {{ $inputId }}
         />

        <label class="d-flex align-items-start" for="{{ $inputId }}">
            <span class="la-form__radio-circle position-absolute d-flex justify-content-center align-items-center mr-2"></span>
            <span class="la-form__radio-label text-md ml-8 mt-n1"> {{ $title }} <br>
                <h6 class="la-form__radio-card text-sm body-font "> {{ $desc }}</h6>
            </span>
        </label>
    </div>

    <div class="la-form__radio-icons d-flex">   
        <a class="la-form__radio-edit mr-5" href="#" data-toggle="modal" data-target="#update_address">
            <span class="la-icon la-icon--xl icon-edit" style="color:#000"></span>
        </a>
        <a class="la-form__radio-delete" href="" role="button">
            <span class="la-icon la-icon--xl icon-delete" style="color:rgb(255, 62, 62)"></span>
        </a>
    </div>
</div>



<!-- EDIT CARD DETAILS MODAL: START -->
<div class="modal fade la-cart__edit-modal" id="update_address">
    <div class="modal-dialog la-cart__edit-dialog">
      <div class="modal-content la-cart__edit-content">
      
        <div class="modal-header la-cart__edit-header">
          <h4 class="modal-title la-cart__edit-title" style="font-weight: var(--font-semibold);">Edit Address</h4>
          <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
        </div>
        
        <div class="modal-body la-cart__edit-body">
            <form class="la-payment__form" action="" name="edit_address">
                <div class="form-row la-payment__form-row">
                    @php
                            $address1 = new stdClass;
                            $address1->inputLabel = "House No./Street/Area";
                            $address1->inputType = "text";
                            $address1->inputValue = "H.No:7/52,BDD,Worli,Mumbai";
                            $address1->inputName = "edit_address";
                            $address1->inputId = "edit_address";

                            $address2 = new stdClass;
                            $address2->inputLabel = "Country";
                            $address2->inputType = "text";
                            $address2->inputValue = "India";
                            $address2->inputName = "edit_country";
                            $address2->inputId = "edit_country";

                            $address3 = new stdClass;
                            $address3->inputLabel = "State";
                            $address3->inputType = "text";
                            $address3->inputValue = "Maharastra";
                            $address3->inputName = "edit_state";
                            $address3->inputId = "edit_state";

                            $address4 = new stdClass;
                            $address4->inputLabel = "City";
                            $address4->inputType = "text";
                            $address4->inputValue = "Mumbai";
                            $address4->inputName = "edit_city";
                            $address4->inputId = "edit_city";

                            $address5 = new stdClass;
                            $address5->inputLabel = "Zip Code";
                            $address5->inputType = "number";
                            $address5->inputValue = "505111";
                            $address5->inputName = "edit_zip";
                            $address5->inputId = "edit_zip";

                            $addresses = array($address1, $address2, $address3, $address4, $address5);
                        @endphp

                        @foreach ($addresses as $address)
                            <div class="col-12 col-md-6 py-2">
                                <x-payment 
                                    :inputLabel="$address->inputLabel"
                                    :inputType="$address->inputType"
                                    :inputValue="$address->inputValue"
                                    :inputName="$address->inputName"
                                    :inputId="$address->inputId"
                                />
                            </div>
                        @endforeach
                </div>

                <div class=" d-flex justify-content-end mt-6 mt-md-8 mb-2">
                    <button class="la-btn__app col-md-4 py-3">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
<!-- EDIT CARD DETAILS MODAL: END -->

