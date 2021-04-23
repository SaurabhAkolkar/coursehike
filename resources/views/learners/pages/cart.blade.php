@extends('learners.layouts.app')


@section('seo_content')
    <title> Cart </title>
@endsection

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">
    
       <!-- Side Navbar: Start -->
       @include ('learners.pages.sidebar')
       <!-- Side Navbar: End -->

      <div class="la-profile__main">
        <div class="container ">
          <div class="la-profile__main-inner">
              @if(session('message'))
              <div class="la-btn__alert position-relative">
                <div class="la-btn__alert-success col-lg-4 offset-lg-2  alert alert-success alert-dismissible" role="alert">
                    <span class="la-btn__alert-msg">{{session('message')}}</span>
                    <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" style="color:#56188C">&times;</span>
                    </button>
                </div>
              </div>
            @endif
            <div class="la-profile__title-wrap la-anim__wrap">
              <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-3 la-anim__stagger-item--x" href="{{URL::previous()}}"></a>
              <h1 class="la-profile__title la-anim__stagger-item">Cart</h1>
            </div>

            <section class="la-section la-cart__sec pt-0">
              <div class="la-cart__inner">
                <div class="la-cart__row">
                  <div class="row flex-column-reverse flex-md-row">
                    <!-- Cousre Cart:  Start -->
                      @php
                        $courseImg = "https://picsum.photos/160/85";
                        $edit = 'Edit';
                        $wishlist ='Move to Wishlist';
                        $remove = 'Remove';
                    @endphp

                    <div class="col-lg-8 ">
                      <div class="la-anim__wrap">
                        <h2 class="la-cart__title text-2xl d-block d-md-none pt-10 pb-3 la-anim__stagger-item">
                            Courses in the Cart
                        </h2>
                      </div>

                      @if(count($carts) > 0)
                        @foreach ($carts as $cart)
                        
                            <x-cart
                              :cartId="$cart->id"
                              :cart="$cart"
                              :itemType="$cart->bundle_id>0?'course':'class'"
                              :courseId="$cart->course_id"
                              :collapseId="$cart->collapseId"
                              :courseImg="$cart->courses->preview_image"
                              {{-- :classType="$cart->cartItems->first() && $cart->cartItems->first()->purchase_type" --}}
                              :course="$cart->courses->title"
                              :classType="$cart->classCount"
                              :creator="$cart->courses->user->fullName"
                              :remove="$remove"
                              :removeUrl="'remove-from-cart/'.$cart->id"
                              :wishlist="$wishlist"
                              :wishlistUrl="'move-to-wishlist/'.$cart->course_id"
                              :edit="$edit"
                              :allClasses="$cart->allClasses"
                              :bestPrice="$cart->offer_price"
                              :realPrice="$cart->price"
                            />
                        @endforeach
                      @else
                          <div class="d-flex justify-content-center align-items-center la-anim__wrap ">
                              <h2 class="text-center my-20 py-10 la-anim__stagger-item" style="color: var(--gray8);">Cart is empty</h2>
                          </div>
                      @endif
                      
                    </div>
                    <!-- Cousre Cart:  End -->

                    <div class="col-md-8 col-lg-4 mb-5 mb-md-0 la-anim__wrap">
                      {{-- <div class="la-profile__title body-font text-xl  la-anim__stagger-item--x">Billing Address</div> --}}
                        {{-- <form class="form-row la-payment__form-row pb-10">                        
                            @php
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

                            <div class="col-12 col-md-6">
                                <div class="la-payment__card la-anim__stagger-item--x">
                                    <label class="la-payment__card-label text-sm">Country <span style="color:var(--danger);">*</span></label>
                                    <select name="country" class="form-control select2 la-payment__card-input">
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->iso }}" {{ ($country->iso == "IN" ? "selected":"") }} {{ old("country") == $country->iso ? "selected":"" }} >
                                            {{ $country->nicename }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                            
                        </form> --}}
                      

                        <!-- Cart Checkout: Start -->
                        @php
                            $checkout = new stdClass;
                            $checkout->totalAmount = 39;
                            $checkout->offerAmount = 10;
                            $checkout->applyCoupon = "Apply Coupon";
                            $appliedCoupon = null;
                            if(Session::get('appliedCoupon')){
                              $checkout->applyCoupon = $coupon->code;
                            }

                            $checkout->discountAmount = 10;
                            $checkout->checkoutUrl = "";

                            $checkouts = array($checkout);
                        @endphp

                        @if(count($carts) > 0)
                        
                            <x-cart-total 
                              :totalAmount="$total"
                              :subTotal="$subTotal"
                              :offerAmount="$discount"
                              :applyCoupon="$checkout->applyCoupon"
                              :coupons="$coupons"
                              :discountAmount="$checkout->discountAmount"
                              :checkoutUrl="$checkout->checkoutUrl"
                              :location="$location"
                            />
                        
                        <!-- Cart Checkout: End -->
                        @endif

                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="la-section la-cart__product pt-0 la-anim__wrap">
              <h2 class="la-cart__product-title la-cart__product-title--light la-anim__stagger-item">You might also like</h2>

              <!-- playlist : Start  -->
                <x-add-to-playlist 
                  :playlists="$playlists"
                />
              <!-- Playlist : End -->
              
              @if(count($suggested_courses) == 0)

                <div class="la-empty__courses w-100 d-md-flex justify-content-between align-items-center mt-0 mt-md-6 la-anim__stagger-item">
                  <div class="col la-empty__inner">
                    <h6 class="la-empty__course-title text-xl la-anim__stagger-item--x">No more courses available right now!</h6>
                  </div>
                </div>  
              @else

                <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item">
                  @foreach($suggested_courses as $sc)
                      <x-course 
                          :id="$sc->id"
                          :img="$sc->preview_image"
                          :course="$sc->title"
                          :url="$sc->slug"
                          :rating="round($sc->average_rating, 2)"
                          :creatorImg="$sc->user->user_img"
                          :creatorName="$sc->user->fname"
                          :creatorUrl="$sc->user->id"
                          :learnerCount="$sc->learnerCount"
                          :price="$sc->price"
                          :checkWishList="$sc->checkWishList"
                          :checkCart="$sc->checkCart"
                          :bought="$sc->isPurchased()"
                        />
                  @endforeach       
                  <div class="col-md-6 col-lg-4 offset-lg-8 text-right la-anim__stagger-item--x">
                      <div class=" la-btn__plain text--burple text-md h-75 d-flex align-items-center justify-content-center justify-content-lg-end">
                        <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8 la-anim__fade-in-right">
                          <a href="/browse/courses" >explore more<span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span></a>
                        </div>
                      </div>
                  </div>
                </div>

              @endif
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footerScripts')
<script src="https://js.stripe.com/v3/"></script>
<script>    
  function checkBoxs(type, id){
        if(type == 'all'){
            $('.selected_classes'+id).prop('checked', true);
        }
        if(type =='selected'){
            $('.selected_classes'+id).prop('checked', false);
        }

  }

  function changeInputs(){

    $('.cart_radio_button').attr('name','classes');
    
  }
  </script>

<script>
    @if(session('couponModal')) 
        $('#cartCoupons').modal('show');
    @endif

  // Create a Stripe client.
  var stripe = Stripe('{{ config("services.stripe.key") }}');

  var checkoutButton = document.getElementById('checkout-button');
  checkoutButton.addEventListener("click", function () {

    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url: "/stripe-checkout",
      // data: {playlist_name: playlistName, ajax_request: true},
      success:function(session){
        stripe.redirectToCheckout({ sessionId: session.id });
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
 
  });

  function toggleRadioButton(id){

      if($('.selected_classes'+id).not(":checked"))
      {
        $('#select_classes_'+id).prop('checked', true);
      }
      if ($('.selected_classes'+id+':checked').length == $('.selected_classes'+id).length) {
        $('#all_classes_'+id).prop('checked', true);
      }

  }
</script>

@endsection
