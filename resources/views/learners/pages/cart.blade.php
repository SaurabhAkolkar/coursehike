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
                        $cart1->courseImg = "";
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
                        $cart2->courseImg = "";
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

              @php  

                $tattoo1 = new stdClass;$tattoo1->img= "https://picsum.photos/600/400";$tattoo1->course= "Tattoo Art";$tattoo1->rating= "4";$tattoo1->url= "";$tattoo1->creatorImg= "https://picsum.photos/100";$tattoo1->creatorName= "Joseph Phill";$tattoo1->creatorUrl= "/creator";
                $tattoo2 = new stdClass;$tattoo2->img= "https://picsum.photos/600/400"; $tattoo2->course= "Tattoo Art";$tattoo2->rating= "4";$tattoo2->url= "";$tattoo2->creatorImg= "https://picsum.photos/100";$tattoo2->creatorName= "Amy D'souza";$tattoo2->creatorUrl= "/creator";
                $tattoo3 = new stdClass;$tattoo3->img= "https://picsum.photos/600/400";$tattoo3->course= "Tattoo Art";$tattoo3->rating= "4";$tattoo3->url= "";$tattoo3->creatorImg= "https://picsum.photos/100";$tattoo3->creatorName= "Alton Crew";$tattoo3->creatorUrl= "/creator";
              
                $tattoos = array($tattoo1, $tattoo2, $tattoo3);
              @endphp
              
              <div class="row">
                  @foreach($tattoos as $tattoo)
                    <x-course 
                        :img="$tattoo->img" 
                        :course="$tattoo->course" 
                        :url="$tattoo->url" 
                        :rating="$tattoo->rating"
                        :creatorImg="$tattoo->creatorImg"
                        :creatorName="$tattoo->creatorName"
                        :creatorUrl="$tattoo->creatorUrl"
                      />
                  @endforeach

                <div class="col-md-6 col-lg-3">
                    <div class="la-btn__plain text--burple text-md h-100 d-flex align-items-center justify-content-center justify-content-md-start">
                      <a class="text-uppercase" href="">explore more</a>
                      <span class="icon"></span>
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