@extends('newui.layouts.master')
@section('seo_content')
    <title> {{-- $course->title --}} | Courses | Best Online Courses | CourseHike</title>
    <meta name='description' itemprop='description'
        content='Best Online Courses in art & creativity for creative minds Get Started for free and learn from passionate creators & mentors all around the world. Join now' />

    <meta property="og:description"
        content="Best Online Courses in art & creativity for creative minds Get Started for free and learn from passionate creators & mentors all around the world. Join now" />
    <meta property="og:title" content="Courses | Best Online Courses | CourseHike" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{-- $course->preview_image --}}" />
    <meta property="og:image:url" content="{{-- $course->preview_image --}}" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Courses | Best Online Courses | CourseHike" />
    <meta name="twitter:site"content="@coursehike" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Courses | Best Online Courses | CourseHike"}</script>
@section('stylesheets')
    <style type="text/css">
        .chike-apply-coupon-title {
            font-weight: 700;
            text-align: center;
        }

        .chike-apply-coupon-btn {
            position: absolute;
            right: 5px;
            top: 4px;
            width: auto;
            padding: 0px 30px;
            height: 87%;
            text-align: center;
            line-height: 45px;
            color: #fff;
        }

        .banner-form .form-control {
            height: 60px;
            border-radius: 35px;
            background: #fff;
            border-width: 2px;
            padding-right: 135px;
            padding-left: 25px;
            border: 2px solid #ddd;
        }

        .course-popular li {
            background-color: transparent;
        }

        .widget-post-thumb {
            width: 150px;
        }

        .course-header-meta .list-info li {
            margin-right: -23px;
            color: #7c7c7c;
            margin-bottom: 0px;
            padding: 0px 30px 0px 0px;
            font-size: 12px;
        }

        .course-latest .widget-post-body h6 {
            margin-bottom: 0px;
        }

        .chike-mentor-title {
            line-height: 25px;
            font-size: 14px;
        }

        .chike-course-price-title {
            color: #3479E2;
            font-weight: 700;
            font-size: 20px;
        }

        .chike-course-like-list-title {
            padding: 20px 0px;
        }

        .chike-shopping-cart-icon {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .razorpay-payment-button {
            color: chartreuse !important
        }

        @media (max-width: 767px) {
            /* .chike-course-price-title{
                                                    position: relative;
                                                    top: -225px;
                                                    left: 165px;
                                                    font-size: 24px;

                                                  }*/
        }
    </style>
@endsection
@endsection

@section('body')
<!--shop category start-->
<section class="single page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <h2><img src="{{ asset('assets/images/course-overview/chike-shopping cart-icon.svg') }}"
                        alt="Shopping Cart" class="img-fluid chike-shopping-cart-icon" width="25"
                        height="25">Shopping Cart</h2>
                <hr>
                <div class="row">
                    <div class="col-lg-10 col-xl-10 col-md-10">
                        <span>
                            <strong>
                                @if (count($carts) > 1)
                                    {{ count($carts) }} courses
                                @else
                                    {{ count($carts) }} course
                                @endif
                            </strong>
                        </span>
                    </div>
                    <div class="col-lg-2 col-xl-2 col-md-2">
                        <span><strong>Price</strong></span>
                    </div>
                </div>
                @php
                    $sub_total = 0;
                @endphp
                @foreach ($carts as $cart)
                    <!-- item -->
                    <div class="row mt-4 mb-4">
                        <div class="col-lg-10 col-xl-10 col-md-10">
                            <div class="course-latest mt-0">
                                <div class="recent-posts course-popular">
                                    <div class="widget-post-thumb chike-shopping-course-img-thumb">

                                        <a href="#"><img src="{{ $cart->courses->VideoPreviewImg }}"
                                                alt="" class="img-fluid"></a>
                                    </div>
                                    <div class="widget-post-body">
                                        <h6> <a href="#">{{ $cart->courses->title }}</a></h6>
                                        <div class="course-header-meta">
                                            <ul class="inline-list list-info">
                                                <li>
                                                    <i class="far fa-language me-2"></i>
                                                    {{ $cart->courses->language->name }}
                                                </li>
                                                <li>
                                                    <i class="far fa-play-circle me-2"></i>
                                                    {{ $cart->courses->courseclass->count() }}
                                                    {{ $cart->courses->courseclass->count() > 1 ? 'Lessons' : 'Lesson' }}
                                                </li>
                                                <li>
                                                    <i class="far fa-clock me-2"></i> {{ $cart->courses->duration }}
                                                    {{ $cart->courses->duration > 1 ? 'Hourse' : 'Hour' }}
                                                </li>
                                                {{-- <li>
                                                    <i class="far fa-sliders-h me-2"></i> Level: Beginner
                                                </li> --}}
                                            </ul>
                                        </div>
                                        <p class="chike-mentor-title mb-0"> {{ $cart->courses->user->fname }}</p>
                                        <div class="course-header-meta">
                                            <div class="course-header-meta">
                                                <ul class="inline-list list-info">
                                                    <li>
                                                        <a onclick="event.preventDefault(); document.getElementById('carts-form').submit();"
                                                            href="#">Remove</a>
                                                    </li>

                                                    <li>|</li>
                                                    <li>
                                                        <a
                                                            href="/move-to-wishlist/{{ $cart->courses->id }}/{{ $cart->id }}">Move
                                                            to Wishlist</a>
                                                    </li>
                                                </ul>
                                                <form id="carts-form" action="{{ route('carts.destroy', $cart->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xl-2 col-md-2">
                            <h6 class="chike-course-price-title">₹ {{ $cart->courses->price }}</h6>
                        </div>
                    </div>
                    <!-- /item -->
                    @php
                        $sub_total += $cart->courses->price;
                    @endphp
                @endforeach
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="cart-collaterals">
                    <div class="cart_totals">
                        <h2>Cart totals</h2>
                        <table cellspacing="0" class="shop_table shop_table_responsive">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">₹
                                            </span>{{ $sub_total }}</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Discount</th>
                                    <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">₹ </span>0</span></td>
                                </tr>
                                {{-- <tr class="cart-subtotal">
                                    <th><span>50% off</span></th>
                                    <td data-title="Subtotal"><span
                                            class="woocommerce-Price-amount amount text-decoration-line-through"><span
                                                class="woocommerce-Price-currencySymbol">$</span>6998</span></td>
                                </tr> --}}
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">₹
                                                </span>{{ $sub_total }}</span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="{{ route('pc') }}" method="POST">
                            @csrf
                            @php
                                $set = App\Setting::first();
                                $currency = App\Currency::first();
                            @endphp
                            
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}"
                                data-amount="{{ $sub_total * 100 }}" data-currency="{{ $currency->currency }}" data-order_id=""
                                data-buttontext="Checkout" data-name="{{ $set->project_title }}" data-description=""
                                data-image="{{ asset('images/logo/' . $set->logo) }}" data-prefill.name="XYZ" data-prefill.email="info@example.com"
                                data-theme.color=""></script>
                        </form>
                        {{-- <form action="{{ route('gotocheckout') }}" method="post">
                            @csrf
                            <div class="wc-proceed-to-checkout">
                                <button class="checkout-button btn btn-sm btn-main-outline m-2 rounded">
                                    checkout
                                </button>
                            </div>
                        </form> --}}
                        <hr>
                        <p class="chike-apply-coupon-title">Apply Coupon</p>
                        <div class="banner-form">
                            <form action="/apply-coupon" class="form" method="POST">
                                @csrf
                                <input type="text" class="form-control rounded-0" name="coupon">
                                <button type="submit" class="btn rounded-0 bg-dark text-white chike-apply-coupon-btn"
                                    name="apply_coupon" value="Apply coupon">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- You might also like -->
        {{-- commented for 2.0 <div class="row">
            <div class="col-xl-12 col-lg-12">
                <!-- You might also like Courses -->
                <h3 class="course-title chike-course-like-list-title">You might also like</h3>
                <div class="row justify-content-lg-center">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="course-grid tooltip-style bg-white hover-shadow">
                            <div class="course-header">
                                <div class="course-thumb">
                                    <img src="assets/images/course/course1.png" alt="" class="img-fluid">
                                    <div class="course-price">$300</div>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="rating mb-10">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>

                                    <span>3.9 (30 reviews)</span>
                                </div>
                                <h3 class="course-title mb-20"> <a href="#">SQL-Data Analysis: Crash Course</a>
                                </h3>
                                <div class="course-footer mt-20 d-flex align-items-center justify-content-between ">
                                    <span class="duration"><i class="far fa-clock me-2"></i>6.5 hr</span>
                                    <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                </div>
                            </div>
                            <div class="course-footer text-center border p-3">
                                <a href="#" class="btn btn-main-outline btn-radius btn-sm">Buy Now <i
                                        class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- COURSE END -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="course-grid tooltip-style bg-white hover-shadow">
                            <div class="course-header">
                                <div class="course-thumb">
                                    <img src="assets/images/course/course1.png" alt="" class="img-fluid">
                                    <div class="course-price">$300</div>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="rating mb-10">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>

                                    <span>3.9 (30 reviews)</span>
                                </div>
                                <h3 class="course-title mb-20"> <a href="#">SQL-Data Analysis: Crash Course</a>
                                </h3>
                                <div class="course-footer mt-20 d-flex align-items-center justify-content-between ">
                                    <span class="duration"><i class="far fa-clock me-2"></i>6.5 hr</span>
                                    <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                </div>
                            </div>
                            <div class="course-footer text-center border p-3">
                                <a href="#" class="btn btn-main-outline btn-radius btn-sm">Buy Now <i
                                        class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- COURSE END -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="course-grid tooltip-style bg-white hover-shadow">
                            <div class="course-header">
                                <div class="course-thumb">
                                    <img src="assets/images/course/course1.png" alt="" class="img-fluid">
                                    <div class="course-price">$300</div>
                                </div>
                            </div>
                            <div class="course-content">
                                <div class="rating mb-10">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>

                                    <span>3.9 (30 reviews)</span>
                                </div>
                                <h3 class="course-title mb-20"> <a href="#">SQL-Data Analysis: Crash Course</a>
                                </h3>
                                <div class="course-footer mt-20 d-flex align-items-center justify-content-between ">
                                    <span class="duration"><i class="far fa-clock me-2"></i>6.5 hr</span>
                                    <span class="lessons"><i class="far fa-play-circle me-2"></i>26 Lessons</span>
                                </div>
                            </div>
                            <div class="course-footer text-center border p-3">
                                <a href="#" class="btn btn-main-outline btn-radius btn-sm">Buy Now <i
                                        class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- COURSE END -->
                    <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                        <a href="#" class="btn btn-sm btn-main rounded">Load More</a>
                    </div>
                </div>
                <!-- /You might also like Courses -->
            </div>
        </div> --}}
        <!-- /You might also like -->

    </div>
</section>
<!--shop category end-->
@endsection
