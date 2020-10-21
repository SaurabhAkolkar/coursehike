@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">

       <!-- Side Navbar: Start -->
       @include ('learners.pages.sidebar')
       <!-- Side Navbar: End -->

      
      <div class="la-profile__main">
        <div class="container">
          <div class="la-profile__main-inner">
            <div class="la-profile__title-wrap">
              <h1 class="la-profile__title">Cart</h1>
            </div>
            <section class="la-section la-cart__sec pt-0">
              <div class="la-cart__inner">
                <div class="la-cart__row">
                  <div class="row flex-column-reverse flex-md-row">
                    <!-- Cousre Cart:  Start -->
                      @php
                        $cart1 = new stdClass;
                        $cart1->courseImg = "https://picsum.photos/160/80";
                        $cart1->course = "Photography";
                        $cart1->creator = "Charlotte Floyd";
                        $cart1->remove = "Remove";
                        $cart1->removeUrl = "";
                        $cart1->wishlist = "Move to Wishlist";
                        $cart1->wishlistUrl="";
                        $cart1->edit= "Edit";
                        $cart1->editUrl="";
                        $cart1->allClasses = "All Classes";
                        $cart1->bestPrice = 39;
                        $cart1->realPrice = 49;

                        $cart2 = new stdClass;
                        $cart2->courseImg = "https://picsum.photos/160/80";
                        $cart2->course = "Designs";
                        $cart2->creator = "Charlotte Floyd";
                        $cart2->remove = "Remove";
                        $cart2->removeUrl = "";
                        $cart2->wishlist = "Move to Wishlist";
                        $cart2->wishlistUrl="";
                        $cart2->edit= "Edit";
                        $cart2->editUrl="";
                        $cart2->allClasses = "All Classes";
                        $cart2->bestPrice = 39;
                        $cart2->realPrice = 49;

                        $carts = array($cart1, $cart2);
                    @endphp

                    <div class="col-lg-8 col-xl-9">
                        @foreach ($carts as $cart)
                            <x-cart 
                              :courseImg="$cart->courseImg"
                              :course="$cart->course"
                              :creator="$cart->creator"
                              :remove="$cart->remove"
                              :removeUrl="$cart->removeUrl"
                              :wishlist="$cart->wishlist"
                              :wishlistUrl="$cart->wishlistUrl"
                              :edit="$cart->edit"
                              :editUrl="$cart->editUrl"
                              :allClasses="$cart->allClasses"
                              :bestPrice="$cart->bestPrice"
                              :realPrice="$cart->realPrice"
                            />
                        @endforeach
                    </div>
                    <!-- Cousre Cart:  End -->

                    <!-- Cart Checkout: Start -->
                    @php
                        $checkout = new stdClass;
                        $checkout->totalAmount = 39;
                        $checkout->offerAmount = 10;
                        $checkout->applyCoupon = "Apply Coupon";
                        $checkout->discountAmount = 10;
                        $checkout->checkoutUrl = "";

                        $checkouts = array($checkout);
                    @endphp
                    <div class="col-lg-4 col-xl-3 mb-5 mb-md-0">
                        <x-cart-total 
                          :totalAmount="$checkout->totalAmount"
                          :offerAmount="$checkout->offerAmount"
                          :applyCoupon="$checkout->applyCoupon"
                          :discountAmount="$checkout->discountAmount"
                          :checkoutUrl="$checkout->checkoutUrl"
                        />
                    </div>
                     <!-- Cart Checkout: End -->

                  </div>
                </div>
              </div>
            </section>
            <section class="la-section la-cart__other-product pt-0">
              <div class="la-cart__product-title la-cart__product-title--light">
                <h2>You might also like</h2>
              </div>

              <div class="row">
                <div class="col-md-6 col-lg-3">
                  <div class="la-course">
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
                  <div class="la-course">
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
                  <div class="la-course">
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
                    <div class="la-cart__product-btm la-btn__plain text--burple text-md h-75 d-flex align-items-center justify-content-center justify-content-md-start">
                      <a class="text-uppercase la-cart__product-explore" href="">explore more</a>
                        <span class="la-cart__product-icon la-icon la-icon--5xl icon-grey-arrow"></span>
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