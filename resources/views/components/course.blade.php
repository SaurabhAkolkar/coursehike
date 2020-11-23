<div class="col-12 col-md-6 col-lg">
    <div class="la-course">
        <div class="la-course__inner">
            <div class="la-course__overlay"  href= {{ $url }}>
                <ul class="la-course__options list-unstyled text-white">
                    <li class="la-course__option">
                        <a class="d-inline-block la-course__addtocart">
                            <i class="la-icon la-icon--2xl icon icon-cart"></i>
                        </a>
                    </li>

                    <li class="la-course__option">
                        <a class="d-inline-block la-course__like">
                            <i class="la-icon la-icon--2xl icon icon-wishlist"></i>
                        </a>
                    </li>

                    <li class="la-course__option">
                        <div class="dropdown">
                            <a class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);">
                                <i class="la-icon la-icon--2xl icon icon-menu"></i>
                            </a>
                            <div class="la-cmenu dropdown-menu py-0">
                                <a class="dropdown-item la-cmenu__item d-inline-flex" onclick="showAddToPlaylist({{$id}})"><i class="icon icon-playlist la-icon la-icon--2xl mr-2"></i>  Add to Playlist</a>
                                <a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-wishlist la-icon la-icon--2xl mr-2"></i>  Add to Wishlist</a>
                                <a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</a>
                            </div>

                            <!-- Add to Playlist Popup: Start -->
                            <div class="modal fade la-cart__bill-modal" id="add_to_playlist">
                                <div class="modal-dialog la-cart__bill-mdialog">
                                  <div class="modal-content la-cart__bill-mcontent">
                                  
                                    <div class="modal-header la-cart__bill-mheader">
                                      <h4 class="modal-title la-cart__bill-mtitle">Add to</h4>
                                      <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                                    </div>
                                    
                                    <div class="modal-body la-cart__bill-mbody">
                                        <div class="la-cart__bill-mapply">
                                            <input type="text" class="" id="search_playlist" name="search_playlist" placeholder="Search by Name" />
                                            <span class="la-icon icon-search la-icon--lg" > </span>
                                        </div>
                
                                        <ul class="la-cart__bill-coupons">
                                            <li class="la-cart__bill-coupon">Photography</li>
                                            <li class="la-cart__bill-coupon">Tattoo Art</li>
                                            <li class="la-cart__bill-coupon">Rangoli</li>
                                            <li class="la-cart__bill-coupon">Programming</li>
                                            <li class="la-cart__bill-coupon">Photography</li>
                                            <li class="la-cart__bill-coupon">Tattoo Art</li>
                                            <li class="la-cart__bill-coupon">Rangoli</li>
                                            <li class="la-cart__bill-coupon">Programming</li>
                                        </ul>

                                        <a class="la-playlist__add">
                                            <span class="la-icon icon-plus la-icon--lg mr-3"></span>
                                            Create Playlist
                                        </a>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <!-- Add to Playlist Popup: End -->
                        </div>
                    </li>
                </ul>

                <div class="la-course__learners"><strong>300</strong>  Learners</div>
            </div>

            <div class="la-course__imgwrap">
                <img class="img-fluid" src= {{ $img }} alt= {{ $course }} />
            </div>
        </div>

        <div class="la-course__btm">
            <div class="la-course__info d-flex align-items-center mb-1">
                <a class="la-course__title" > {{ $course }} </a>
                <div class="la-course__rating ml-auto"> {{ $rating }} </div>
            </div>
            
            <a class="la-course__creator d-inline-flex align-items-center" href= {{ $creatorUrl }} >
                <div class="la-course__creator-imgwrap">
                    <img class="img-fluid" src="https://picsum.photos/200/200" alt={{ $creatorName }} />
                    {{-- <img class="img-fluid" src={{ $creatorImg }} alt={{ $creatorName }} /> --}}
                </div>
                <div class="la-course__creator-name">{{ $creatorName }}</div>
            </a>
        </div>
    </div>
</div>
