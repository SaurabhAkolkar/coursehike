<div class="col-12 la-anim__stagger-item--x" @if($addedToWhishList) id="course_{{$id}}" @endif>
    <div class="la-course">
        <div class="la-course__inner">
            <a class="la-course__inner-link" role="button" href= {{ '/learn/course/'.$id.'/'.$url }}>
            
                <div class="la-course__overlay">
                    
                        <ul class="la-course__options list-unstyled text-white" id="la-course__nested-links">
                            <li class="la-course__option">
                                <span class="d-inline-block la-course__addtocart" onclick="addToCart({{$id}})">
                                    <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                </span>
                            </li>

                            <li class="la-course__option">
                                <span class="d-inline-block la-course__like">
                                    <i class="la-icon la-icon--2xl icon icon-wishlist"></i>
                                </span>
                            </li>

                            <li class="la-course__option">
                                <div class="dropdown">
                                    <span class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);">
                                        <i class="la-icon la-icon--2xl icon icon-menu"></i>
                                    </span>
                                    <div class="la-cmenu dropdown-menu py-0">
                                        <span class="dropdown-item la-cmenu__item d-inline-flex" @if($removeFromPlaylist) href="{{url()->current()}}/{{$id}}"  @else onclick="showAddToPlaylist({{$id}})" @endif><i class="icon icon-playlist la-icon la-icon--2xl mr-2"></i> @if($removeFromPlaylist) Remove from Playlist  @else Add to Playlist @endif</span>
                                        <span class="dropdown-item la-cmenu__item d-inline-flex" @if($addedToWhishList) href="/remove-from-wishlist/{{$id}}" @else onclick="addToWishList({{$id}})" @endif><i class="icon icon-wishlist la-icon la-icon--2xl mr-2"></i> @if($addedToWhishList) Remove from Wishlist @else Add to Wishlist @endif </span>
                                        <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="addToCart({{$id}})"><i class="icon icon-cart la-icon la-icon--2xl mr-2"></i>  Add to Cart</span>
                                        <a href= {{ '/learn/course/'.$id.'/'.$url }}>
                                            <span class="dropdown-item la-cmenu__item d-inline-flex" >View Course</span>
                                        </a>
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
                <a class="la-course__title" > {{ strlen($course)>25?substr($course,0,25).'...':$course }} </a>
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
