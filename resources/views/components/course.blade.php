<div class="col-12 col-md-6 col-lg" @if($addedToWhishList) id="course_{{$id}}" @endif>
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
                                <a class="dropdown-item la-cmenu__item d-inline-flex" @if($removeFromPlaylist) href="{{url()->current()}}/{{$id}}"  @else onclick="showAddToPlaylist({{$id}})" @endif><i class="icon icon-playlist la-icon la-icon--2xl mr-2"></i> @if($removeFromPlaylist) Remove From Playlist  @else Add to Playlist @endif</a>
                                <a class="dropdown-item la-cmenu__item d-inline-flex" @if($addedToWhishList) href="/remove-from-wishlist/{{$id}}" @else onclick="addToWishList({{$id}})" @endif><i class="icon icon-wishlist la-icon la-icon--2xl mr-2"></i> @if($addedToWhishList) Remove From Wishlist @else Add to Wishlist @endif </a>
                                <a class="dropdown-item la-cmenu__item d-inline-flex"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</a>
                            </div>
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
