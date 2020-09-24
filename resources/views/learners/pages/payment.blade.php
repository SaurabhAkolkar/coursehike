@extends('learners.layouts.app')

@section('content')
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
                  <div class="text-md la-payment__type">Monthly Subscription</div>
                  <div class="text-md la-payment__amount mt-2">$ 20</div>
                </div>
              </div>
            </div>
          </div>

           <!-- CARD PAYMENT DETAILS: START -->
          <div class="row">
            <div class="col-lg-6">
              <div class="la-payment__details">
                <div class="la-payment__details-title text-2xl">Billing Address</div>
                <form class="la-payment__form" action="" name="billing-address">
                    <div class="form-row la-payment__form-row">
                        
                        @php
                            $address1 = new stdClass;
                            $address1->inputLabel = "House No./Street/Area";
                            $address1->inputType = "text";
                            $address1->inputValue = "H.No:7/52,BDD,Worli,Mumbai";
                            $address1->inputName = "bill-address";
                            $address1->inputId = "bill-address";

                            $address2 = new stdClass;
                            $address2->inputLabel = "Country";
                            $address2->inputType = "text";
                            $address2->inputValue = "India";
                            $address2->inputName = "bill-country";
                            $address2->inputId = "bill-country";

                            $address3 = new stdClass;
                            $address3->inputLabel = "State";
                            $address3->inputType = "text";
                            $address3->inputValue = "Maharastra";
                            $address3->inputName = "bill-state";
                            $address3->inputId = "bill-state";

                            $address4 = new stdClass;
                            $address4->inputLabel = "City";
                            $address4->inputType = "text";
                            $address4->inputValue = "Mumbai";
                            $address4->inputName = "bill-city";
                            $address4->inputId = "bill-city";

                            $address5 = new stdClass;
                            $address5->inputLabel = "Zip Code";
                            $address5->inputType = "number";
                            $address5->inputValue = "500073";
                            $address5->inputName = "bill-zipcode";
                            $address5->inputId = "bill-zipcode";

                            $addresses = array( $address2, $address3, $address4, $address5);
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
                  </div>
                </form>
              </div>
            </div>
          </div>
           <!-- BILLING ADDRESS DETAILS: END -->
          
           <!-- CARD PAYMENT DETAILS: START -->
          <div class="row">
            <div class="col-lg-6">
              <div class="la-payment__details">
                <div class="la-payment__details-title text-2xl">Card Details</div>
                <form class="la-payment__form" action="" name="payment-details">
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
                            <div class="col-12 col-md-6">
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

                  <div class="form-row la-payment__form-row my-16">
                    <div class="col-12 col-md">
                        <div class="la-payment__card-check d-flex align-items-start mt-lg-1">
                            <label class="la-payment__card-label text-xs mt-n1">
                                <input class="la-payment__card-input mr-3" type="checkbox" value="" name="check-card">
                                    Use this card for future transaction. Charges may apply.
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md la-payment__pay">
                      <div class="la-btn la-payment__pay-btn py-3 text-center">Proceed to Pay</div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- CARD PAYMENT DETAILS: END -->
        </div>
      </div>
    </div>
  </section>
@endsection