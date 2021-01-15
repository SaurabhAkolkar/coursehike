@extends('learners.layouts.app')

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
                <div class="la-btn__alert-success col-md-4 offset-md-2  alert alert-success alert-dismissible" role="alert">
                    <h6 class="la-btn__alert-msg">{{session('message')}}</h6>
                    <button type="button" class="close mt-3" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" style="color:#56188C">&times;</span>
                    </button>
                </div>
              </div>
            @endif
            <div class="la-profile__title-wrap">
              <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="{{URL::previous()}}"></a>
              <h1 class="la-profile__title">Cart</h1>
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

                    <div class="col-lg-8 col-xl-9">
                      <div class="la-anim__wrap">
                        <h2 class="la-cart__title text-2xl d-block d-md-none pt-14 pb-3 la-anim__stagger-item">
                            Courses in the Cart
                        </h2>
                      </div>

                      @if(count($carts) > 0)
                        @foreach ($carts as $cart)
                            <x-cart
                              :cartId="$cart->id"
                              :cart="$cart"
                              :courseId="$cart->course_id"
                              :collapseId="$cart->collapseId"
                              :courseImg="$cart->courses->preview_image"
                              :classType="$cart->cartItems->first()->purchase_type"
                              :course="$cart->courses->title"
                              :creator="$cart->courses->user->fullName"
                              :remove="$remove"
                              :removeUrl="'remove-from-cart/'.$cart->id"
                              :wishlist="$wishlist"
                              :wishlistUrl="'move-to-wishlist/'.$cart->course_id"
                              :edit="$edit"
                              :allClasses="$cart->allClasses"
                              :bestPrice="$cart->price"
                              :realPrice="$cart->offer_price"
                            />
                        @endforeach
                      @else
                          <div class="d-flex justify-content-center align-items-center la-anim__wrap ">
                              <h2 class="text-center my-20 py-10 la-anim__stagger-item" style="color: var(--gray8);">Cart is empty</h2>
                          </div>
                      @endif
                      
                    </div>
                    <!-- Cousre Cart:  End -->

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
                      <div class="col-lg-4 col-xl-3 mb-5 mb-md-0 la-anim__wrap">
                          <x-cart-total 
                            :totalAmount="$total"
                            :offerAmount="$discount"
                            :applyCoupon="$checkout->applyCoupon"
                            :coupons="$coupons"
                            :discountAmount="$checkout->discountAmount"
                            :checkoutUrl="$checkout->checkoutUrl"
                          />
                      </div>
                     <!-- Cart Checkout: End -->
                    @endif

                  </div>
                </div>
              </div>
            </section>
            <section class="la-section la-cart__product pt-0 la-anim__wrap">
              <div class="la-cart__product-title la-cart__product-title--light la-anim__stagger-item">
                <h2>You might also like</h2>
              </div>

              <div class="row">
                <div class="col-md-6 col-lg-3">
                  <div class="la-course la-anim__stagger-item--x">
                    <div class="la-course__inner">
                      <div class="la-course__overlay" href="">
                        <ul class="la-course__options list-unstyled text-white">
                          <li class="la-course__option"><a class="d-inline-block la-course__addtocart"><i class="la-icon la-icon--xl icon icon-cart"></i></a></li>
                          <li class="la-course__option"><a class="d-inline-block la-course__like"><i class="la-icon la-icon--xl icon icon-wishlist"></i></a></li>
                          <li class="la-course__option">
                            <div class="dropdown"><a class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);"><i class="la-icon la-icon--xl icon icon-menu"></i></a>
                              <div class="la-cmenu dropdown-menu py-0"><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-playlist la-icon la-icon--xl mr-2"></i>  Add to Playlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-wishlist la-icon la-icon--xl mr-2"></i>  Add to Wishlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--xl mr-2"></i>  Add to Cart</a></div>
                            </div>
                          </li>
                        </ul>
                        <div class="la-course__learners"><strong>300</strong>  Learners</div>
                      </div>
                      <div class="la-course__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Tattoo Art"></div>
                    </div>
                    <div class="la-course__btm">
                      <div class="la-course__info d-flex align-items-center"><a class="la-course__title" href="">Tattoo Art</a>
                        <div class="la-course__rating ml-auto">4</div>
                      </div>
                      <a class="la-course__creator d-inline-flex align-items-center " href="">
                        <div class="la-course__creator-imgwrap "><img class="img-fluid rounded-circle px-1 " src="https://picsum.photos/100/100" alt="Jospeh Phill"></div>
                        <div class="la-course__creator-name">Jospeh Phill</div>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3">
                  <div class="la-course la-anim__stagger-item--x">
                    <div class="la-course__inner">
                      <div class="la-course__overlay" href="">
                        <ul class="la-course__options list-unstyled text-white">
                          <li class="la-course__option"><a class="d-inline-block la-course__addtocart"><i class="la-icon la-icon--xl icon icon-cart"></i></a></li>
                          <li class="la-course__option"><a class="d-inline-block la-course__like"><i class="la-icon la-icon--xl icon icon-wishlist"></i></a></li>
                          <li class="la-course__option">
                            <div class="dropdown"><a class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);"><i class="la-icon la-icon--xl icon icon-menu"></i></a>
                              <div class="la-cmenu dropdown-menu py-0"><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-playlist la-icon la-icon--xl mr-2"></i>  Add to Playlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-wishlist la-icon la-icon--xl mr-2"></i>  Add to Wishlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--xl mr-2"></i>  Add to Cart</a></div>
                            </div>
                          </li>
                        </ul>
                        <div class="la-course__learners"><strong>300</strong>  Learners</div>
                      </div>
                      <div class="la-course__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Tattoo Art"></div>
                    </div>
                    <div class="la-course__btm">
                      <div class="la-course__info d-flex align-items-center"><a class="la-course__title" href="">Tattoo Art</a>
                        <div class="la-course__rating ml-auto">4</div>
                      </div><a class="la-course__creator d-inline-flex align-items-center" href="">
                        <div class="la-course__creator-imgwrap"><img class="img-fluid rounded-circle px-1 " src="https://picsum.photos/100/100" alt="Jospeh Phill"></div>
                        <div class="la-course__creator-name">Jospeh Phill</div></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3">
                  <div class="la-course la-anim__stagger-item--x">
                    <div class="la-course__inner">
                      <div class="la-course__overlay" href="">
                        <ul class="la-course__options list-unstyled text-white">
                          <li class="la-course__option"><a class="d-inline-block la-course__addtocart"><i class="la-icon la-icon--xl icon icon-cart"></i></a></li>
                          <li class="la-course__option"><a class="d-inline-block la-course__like"><i class="la-icon la-icon--xl icon icon-wishlist"></i></a></li>
                          <li class="la-course__option">
                            <div class="dropdown"><a class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);"><i class="la-icon la-icon--xl icon icon-menu"></i></a>
                              <div class="la-cmenu dropdown-menu py-0"><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-playlist la-icon la-icon--xl mr-2"></i>  Add to Playlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-wishlist la-icon la-icon--xl mr-2"></i>  Add to Wishlist</a><a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--xl mr-2"></i>  Add to Cart</a></div>
                            </div>
                          </li>
                        </ul>
                        <div class="la-course__learners"><strong>300</strong>  Learners</div>
                      </div>
                      <div class="la-course__imgwrap"><img class="img-fluid" src="https://picsum.photos/600/400" alt="Tattoo Art"></div>
                    </div>
                    <div class="la-course__btm">
                      <div class="la-course__info d-flex align-items-center"><a class="la-course__title" href="">Tattoo Art</a>
                        <div class="la-course__rating ml-auto">4</div>
                      </div><a class="la-course__creator d-inline-flex align-items-center" href="">
                        <div class="la-course__creator-imgwrap"><img class="img-fluid rounded-circle px-1 " src="https://picsum.photos/100/100" alt="Jospeh Phill"></div>
                        <div class="la-course__creator-name">Jospeh Phill</div></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-3 la-anim__stagger-item--x">
                    <div class=" la-btn__plain text--burple text-md h-75 d-flex align-items-center justify-content-center justify-content-md-start">
                      <div class=" la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold pt-8 la-anim__fade-in-right">
                        <a href="/master-classes" >explore more</a><span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow"></span>
                      </div>
                    </div>
                </div>
              </div>
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
    @if(session('couponModal')) 
        $('#cartCoupons').modal('show');
    @endif

  // Create a Stripe client.
  var stripe = Stripe('{{ env("STRIPE_KEY") }}');

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
        console.log(session);
        stripe.redirectToCheckout({ sessionId: session.id });
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
 
  });
</script>

@endsection
