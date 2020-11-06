@extends('learners.layouts.app')

@section('content')

@if(Session::has('errors'))
  <p class="alert alert-danger">{{ Session::get('errors') }}</p>
@endif

<section class="la-section">
    <div class="la-section__inner">
      <div class="la-section__card-payments">
        <div class="container px-lg-14">
          <div class="row">
            <div class="col-lg-6">
              <h1 class="la-payment__title text-4xl head-font">Payment Details</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5">
              <div class="la-payment__subscription d-flex justify-content-between">
                <div class="la-payment__plan">
                  <div class="text-sm la-payment__plan-selected">Plan Selected</div>
                  <div class="text-sm la-payment__plan-amount mt-2">Amount </div>
                </div>
                <div class="la-payment__amount">
                  <div class="text-md la-payment__type">{{$plan->name}} Subscription</div>
                  <div class="text-md la-payment__amount mt-2">${{$plan->price}} </div>
                </div>
              </div>
            </div>
          </div>

          <form action="/subscription/plans" name="payment-details" id="payment-form" method="post" >
            @csrf
            <input type="hidden" name="subscription_plan" value="{{$plan->slug}}">
            <!-- BILLING ADDRESS DETAILS: START -->
            <div class="row">
              <div class="col-lg-6">
                <div class="la-payment__details">
                  <div class="la-payment__details-title text-2xl">Billing Address</div>
                  <div class="la-payment__form">
                      <div class="form-row la-payment__form-row">                        
                          @php
                              $address1 = new stdClass;
                              $address1->inputLabel = "House No./Street/Area";
                              $address1->inputType = "text";
                              $address1->inputValue = "H.No:7/52,BDD,Worli,Mumbai";
                              $address1->inputName = "street_name";
                              $address1->inputId = "bill-address";

                              // $address2 = new stdClass;
                              // $address2->inputLabel = "Country";
                              // $address2->inputType = "text";
                              // $address2->inputValue = "India";
                              // $address2->inputName = "country";
                              // $address2->inputId = "bill-country";

                              $address3 = new stdClass;
                              $address3->inputLabel = "State";
                              $address3->inputType = "text";
                              $address3->inputValue = "Maharastra";
                              $address3->inputName = "state";
                              $address3->inputId = "bill-state";

                              $address4 = new stdClass;
                              $address4->inputLabel = "City";
                              $address4->inputType = "text";
                              $address4->inputValue = "Mumbai";
                              $address4->inputName = "city";
                              $address4->inputId = "bill-city";

                              $address5 = new stdClass;
                              $address5->inputLabel = "Zip Code";
                              $address5->inputType = "number";
                              $address5->inputValue = "500073";
                              $address5->inputName = "zipcode";
                              $address5->inputId = "bill-zipcode";

                              $addresses = array( $address3, $address4, $address5);
                          @endphp

                          <div class="col-12 col-md-12">
                              <x-payment 
                                  :inputLabel="$address1->inputLabel"
                                  :inputType="$address1->inputType"
                                  :inputValue="$address1->inputValue"
                                  :inputName="$address1->inputName"
                                  :inputId="$address1->inputId"
                              />
                          </div>

                          @foreach ($addresses as $address)
                              <div class="col-12 col-md-6">
                                  <x-payment 
                                      :inputLabel="$address->inputLabel"
                                      :inputType="$address->inputType"
                                      :inputValue="$address->inputValue"
                                      :inputName="$address->inputName"
                                      :inputId="$address->inputId"
                                  />
                              </div>
                          @endforeach

                          <div class="col-12 col-md-12">
                              <div class="la-payment__card">
                                  <label class="la-payment__card-label text-sm">Country</label>
                                  <select name="country" class="col-sm-9 form-control select2">
                                      @foreach ($countries as $country)
                                      <option value="{{ $country->iso }}">
                                          {{ $country->nicename }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- BILLING ADDRESS DETAILS: END -->
            
            <!-- CARD PAYMENT DETAILS: START -->
            <div class="row">
              <div class="col-lg-6">
                <div class="la-payment__details">
                  <div class="la-payment__details-title text-2xl">Card Details</div>
                  <div class="la-payment__form">
                    <div class="form-row la-payment__form-row">
                          <div class="col-12 col-md-6">
                            <div class="la-payment__card">
                              <label class="la-payment__card-label text-sm">Card Number</label>
                              <div id="card-number"></div>
                            </div>
                          </div>

                          <div class="col-12 col-md-6">
                            <div class="la-payment__card">
                              <label class="la-payment__card-label text-sm">Expiry Date</label>
                              <div id="card-expiry"></div>
                            </div>
                          </div>
                    </div>

                    <div class="form-row la-payment__form-row">
                          <div class="col-12 col-md-6">
                            <div class="la-payment__card">
                                <label class="la-payment__card-label text-sm">Card Holder's Name</label>
                                    <input class="form-control la-payment__card-input" 
                                        type="text"
                                        name="card-owner"
                                        placeholder="Enter Card Holder's Name"
                                    />
                            </div>
                          </div>

                          <div class="col-12 col-md-6">
                            <div class="la-payment__card">
                              <label class="la-payment__card-label text-sm">CVV/CVC</label>
                              <div id="card-cvc"></div>
                            </div>
                          </div>

                    </div>

                    <div class="form-row la-payment__form-row my-16">
                      <div class="col-12 col-md">
                          <div class="la-payment__card-check d-flex align-items-start mt-lg-1">
                              <label class="la-payment__card-label text-xs mt-n1">
                                This card will be used for future transaction. Charges may apply.
                              </label>
                          </div>
                      </div>
                      <div class="col-12 col-md la-payment__pay">
                        <button class="la-btn la-payment__pay-btn py-3 text-center" type="submit">Proceed to Pay</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- CARD PAYMENT DETAILS: END -->
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection


@section('footerScripts')
<script src="https://js.stripe.com/v3/"></script>

<script>
  // Create a Stripe client.
  var stripe = Stripe('{{ env("STRIPE_KEY") }}');

  // Create an instance of Elements.
  var elements = stripe.elements();

  // Custom styling can be passed to options when creating an Element.
  // (Note that this demo uses a wider set of styles than the guide below.)
  var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
  };

  // Create an instance of the card Element.
  var cardNumber = elements.create('cardNumber', {
    showIcon: true,
    style: style
  });
  cardNumber.mount('#card-number');
  var cardExpiry = elements.create('cardExpiry', {style: style});
  cardExpiry.mount('#card-expiry');
  var cardCvc = elements.create('cardCvc', {style: style});
  cardCvc.mount('#card-cvc');
  
  cardNumber.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });

  // Handle form submission.
  var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(cardNumber).then(function(result) {
      console.log(result);
      if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
      }
    });

  });

  // Submit the form with the token ID.
  function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

@endsection