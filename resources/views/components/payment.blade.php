
    <div class="la-payment__card">
        <label class="la-payment__card-label text-sm"> {{ $inputLabel }}</label>
            <input class="form-control la-payment__card-input" 
                type= {{ $inputType }} 
                {{-- value= {{ $inputValue }} --}}
                name= {{ $inputName }}
                id = {{ $inputId }}
                placeholder="Enter {{ $inputLabel }}"
            />
    </div>
