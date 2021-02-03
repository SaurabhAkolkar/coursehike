<?php $__env->startSection('content'); ?>


<div class="la-profile">
    <div class="la-profile__wrap">
      
       <!-- Side Navbar: Start -->
       <?php echo $__env->make('learners.pages.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <!-- Side Navbar: End -->  

        <div class="la-profile__main pb-md-20">
            <div class="la-section__card-payments">
                <div class="container la-anim__wrap">
                    <div class="la-profile__main-inner ">
                        <h1 class="la-profile__title  text-2xl text-lg-4xl la-anim__stagger-item">
                            <a href="/billing" role="button" style="color: var(--app-indigo-1)">Billing</a>/
                                Payment Details
                        </h1>

                        <form action="/payment-details/update" name="payment-details" id="payment-form" method="post" >
                            <?php echo csrf_field(); ?>
                            <div class="row la-anim__wrap">
                              <div class="col-lg-6">
                                <div class="la-payment__details">
                                  <div class="la-payment__details-title text-2xl la-anim__stagger-item--x">Billing Address</div>
                                  <div class="la-payment__form">
                                      <div class="form-row la-payment__form-row">                        
                                          <?php
                                              $address1 = new stdClass;
                                              $address1->inputLabel = "House No./Street/Area";
                                              $address1->inputType = "text";
                                              $address1->inputValue = "H.No:7/52,BDD,Worli,Mumbai";
                                              $address1->inputName = "street_name";
                                              $address1->inputId = "bill-address";
                                              $address1->value = "bill-address";
                
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
                                          ?>
                
                                          <div class="col-12 col-md-12">
                                               <?php if (isset($component)) { $__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Payment::class, ['inputLabel' => $address1->inputLabel,'inputType' => $address1->inputType,'inputValue' => $address1->inputValue,'inputName' => $address1->inputName,'inputId' => $address1->inputId]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47)): ?>
<?php $component = $__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47; ?>
<?php unset($__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                          </div>
                
                                          <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <div class="col-12 col-md-6">
                                                   <?php if (isset($component)) { $__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Payment::class, ['inputLabel' => $address->inputLabel,'inputType' => $address->inputType,'inputValue' => $address->inputValue,'inputName' => $address->inputName,'inputId' => $address->inputId]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47)): ?>
<?php $component = $__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47; ?>
<?php unset($__componentOriginal641f81b69a265e38ea849a4e8e7658167b839d47); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                              </div>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                                          <div class="col-12 col-md-6">
                                              <div class="la-payment__card la-anim__stagger-item--x">
                                                  <label class="la-payment__card-label text-sm">Country:</label>
                                                  <select name="country" class="form-control select2 la-form__input px-0">
                                                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($country->iso); ?>" <?php echo e((old("country") == $country->iso ? "selected":"")); ?>>
                                                          <?php echo e($country->nicename); ?></option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <div class="row la-anim__wrap">
                              <div class="col-lg-6">
                                <div class="la-payment__details">
                                  <div class="la-payment__details-title text-2xl la-anim__stagger-item--x">Card Details</div>
                                  <div class="la-payment__form">
                                    <div class="form-row la-payment__form-row">
                                          <div class="col-12 col-md-6">
                                            <div class="la-payment__card la-anim__stagger-item--x">
                                              <label class="la-payment__card-label text-sm">Card Number:</label>
                                              <div id="card-number" class="la-form__input pt-3"></div>
                                            </div>
                                          </div>
                
                                          <div class="col-12 col-md-6">
                                            <div class="la-payment__card la-anim__stagger-item--x">
                                              <label class="la-payment__card-label text-sm">Expiry Date:</label>
                                              <div id="card-expiry" class="la-form__input pt-3"></div>
                                            </div>
                                          </div>
                                    </div>
                
                                    <div class="form-row la-payment__form-row">
                                          <div class="col-12 col-md-6">
                                            <div class="la-payment__card la-anim__stagger-item--x">
                                                <label class="la-payment__card-label text-sm">Card Holder's Name:</label>
                                                    <input class="form-control la-payment__card-input la-form__input" 
                                                        type="text"
                                                        name="card-owner"
                                                        placeholder="Enter Card Holder's Name"
                                                    />
                                            </div>
                                          </div>
                
                                          <div class="col-12 col-md-6">
                                            <div class="la-payment__card la-anim__stagger-item--x">
                                              <label class="la-payment__card-label text-sm">CVV/CVC:</label>
                                              <div id="card-cvc" class="la-form__input pt-1"></div>
                                            </div>
                                          </div>
                
                                    </div>
                
                                    <div class="form-row la-payment__form-row my-16">
                                      <div class="col-12 col-md">
                                          <div class="la-payment__card-check d-flex align-items-start mt-lg-1 la-anim__stagger-item--x">
                                              <label class="la-payment__card-label text-xs mt-n1">
                                                This card will be used for future transaction. Charges may apply.
                                              </label>
                                          </div>
                                      </div>
                                      <div class="col-12 col-md la-payment__pay la-anim__stagger-item--x">
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
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScripts'); ?>
<script src="https://js.stripe.com/v3/"></script>

<script>
  // Create a Stripe client.
  var stripe = Stripe('<?php echo e(env("STRIPE_KEY")); ?>');

  // Create an instance of Elements.
  var elements = stripe.elements();

  // Custom styling can be passed to options when creating an Element.
  // (Note that this demo uses a wider set of styles than the guide below.)
  var style = {
  base: {
    color: '#32325d',
    lineHeight: '32px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#cccccc',
      fontSize: '14px',
      fontWeight: '300'
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/payment-details.blade.php ENDPATH**/ ?>