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
        <a class="la-form__radio-edit mr-5" href="" role="button">
            <img src="./images/learners/icons/edit.svg" alt="">
        </a>
        <a class="la-form__radio-delete" href="" role="button">
            <img src="./images/learners/icons/delete.svg" alt="">
        </a>
    </div>
</div>

