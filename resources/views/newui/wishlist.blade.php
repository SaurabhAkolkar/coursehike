@extends('newui.layouts.master')
@section('seo_content')
    <title> {{-- $course->title --}} | Courses | Best Online Courses | CourseHike</title>
    <meta name='description' itemprop='description'
        content='Best Online Courses in art & creativity for creative minds Get Started for free and learn from passionate creators & mentors all around the world. Join now' />

    <meta property="og:description"
        content="Best Online Courses in art & creativity for creative minds Get Started for free and learn from passionate creators & mentors all around the world. Join now" />
    <meta property="og:title" content="Courses | Best Online Courses for Art & Creativity | LILA" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{-- $course->preview_image --}}" />
    <meta property="og:image:url" content="{{-- $course->preview_image --}}" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="Courses | Best Online Courses for Art & Creativity | LILA" />
    <meta name="twitter:site"content="@coursehike" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Courses | Best Online Courses for Art & Creativity | LILA"}</script>
@section('stylesheets')
    <style type="text/css">
        .cart-collaterals .cart_totals {
            background-color: transparent;
        }

        .topbar-search .form-control {
            background-color: #fff;
            border-color: #fff;
        }

        #chike-filter-btn {
            display: none;
        }

        @media (max-width: 768px) {
            .page-wrapper {
                position: relative;
            }

            #chike-filter-btn {
                display: inline-block;
                position: absolute;
                top: 50px;
                right: 15px;
            }

            #chike-sidebar-filter-box {
                display: none;
            }
        }
    </style>
@endsection
@endsection

@section('body')

<!--shop category start-->
<section class="single page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <h3>My Wishlist</h3>
                {{-- <button class="btn btn-sm btn-main-outline" id="chike-filter-btn"><i class="fa fa-filter"
                        aria-hidden="true"></i></button> --}}
                <hr>
            </div>
            <div class="col-lg-3 col-xl-3" id="chike-sidebar-filter-box">
                {{-- <div class="cart-collaterals mb-3">
                    <div class="topbar-search">
                        <form method="get" action="#">
                            <input type="text" placeholder="Search our courses" class="form-control">
                            <label><i class="fa fa-search"></i></label>
                        </form>
                    </div>
                </div> --}}
                <!-- Levels -->
                <div class="cart-collaterals">
                    <div class="cart_totals">
                        <h2>Levels</h2>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled="disabled" value="" id="alllevels">
                            <label class="form-check-label" for="alllevels">
                                All Levels
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled="disabled" value="" id="beginner" >
                            <label class="form-check-label" for="beginner">
                                Beginner
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled="disabled" value="" id="intermediate">
                            <label class="form-check-label" for="intermediate">
                                Intermediate
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled="disabled" value="" id="expert">
                            <label class="form-check-label" for="expert">
                                Expert
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /Levels -->

                <!-- Prices -->
                <div class="cart-collaterals mt-4">
                    <div class="cart_totals">
                        <h2>Prices</h2>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled="disabled" value="" id="free">
                            <label class="form-check-label" for="free">
                                Free
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled="disabled" value="" id="paid">
                            <label class="form-check-label" for="paid">
                                Paid
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /Prices -->

                <!-- Prices -->
                <div class="cart-collaterals mt-4">
                    <div class="cart_totals">
                        <h2>Category</h2>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" disabled="disabled" id="allcategory">
                            <label class="form-check-label" for="allcategory">
                                All Category
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" disabled="disabled" id="wishlist">
                            <label class="form-check-label" for="wishlist">
                                Wishlist
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" disabled="disabled" id="languages">
                            <label class="form-check-label" for="languages">
                                Languages
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /Prices -->

                {{-- <div class="text-center mt-4">
                    <a href="" class="btn btn-sm btn-main-outline rounded w-100" ><i
                            class="fa fa-times me-2"></i> Clear All Filters</a>
                </div> --}}

            </div>
            <div class="col-lg-9 col-xl-9">
                <!-- all Courses -->
                <div class="course-top-wrap mb-4">
                    <div class="fuild-container">
                        <div class="row align-items-center">
                            <div class="col-lg-9">
                                <p class="chike-showing-results-title">Showing {{ count($wishlists) }} results</p>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-select" aria-label="Default select example">
                                    <option value="">Select Sort by</option>
                                    <option value="Popularity">Popularity</option>
                                    <option value="Price -- Low to High">Price -- Low to High</option>
                                    <option value="Price -- High to Low">Price -- High to Low</option>
                                    <option value="Newest First</option>">Newest First</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach ($wishlists as $wishlist)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="course-grid tooltip-style bg-white hover-shadow">
                                <div class="course-header">
                                    <div class="course-thumb">
                                        <img src="{{ $wishlist->course->VideoPreviewImg }}" alt="" class="img-fluid">
                                        <div class="course-price">₹{{ $wishlist->course->price }}</div>
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
                                    <h3 class="course-title mb-10"> 
                                        <a href="#">{{ $wishlist->course->title }}</a>
                                    </h3>
                                    <div
                                        class="course-footer mt-10 d-flex align-items-center justify-content-between ">
                                        <span class="duration"><i class="far fa-clock me-2"></i>{{ $wishlist->course->duration }}</span>
                                        <span class="lessons"><i class="far fa-play-circle me-2"></i>
                                            {{ $wishlist->course->courseclass->count() }}
                                            {{ $wishlist->course->courseclass->count() > 1 ? 'Lessons' : 'Lesson' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="course-footer text-center border p-3">
                                    <a href="/move-to-cart/{{ $wishlist->course->id }}/{{ $wishlist->id }}" class="btn btn-main-outline btn-radius btn-sm">Buy Now <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- COURSE END -->
                       
                    @endforeach
                    {{-- <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                        <a href="#" class="btn btn-sm btn-main rounded"><i class="fa fa-repeat me-2"
                                aria-hidden="true"></i> Load More</a>
                    </div> --}}
                </div>
                <!-- /all Courses -->
            </div>

        </div>
    </div>
</section>
<!--shop category end-->

@section('scripts')
    <script type="text/javascript">
        $('#chike-filter-btn').click(function() {
            $('#chike-sidebar-filter-box').slideToggle();
        });
    </script>
@endsection
@endsection
