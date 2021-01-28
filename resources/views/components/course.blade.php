<div class="col-12 grid-view" @if($addedToWhishList) id="course_{{$id}}" @endif>
    <div class="la-course">
            <div class="la-course__inner">
                <a class="la-course__inner-link" role="button" href= "{{ '/learn/course/'.$id.'/'.$url }}" >
                    <div class="la-course__overlay">
                        <ul class="la-course__options list-unstyled text-white" id="la-course__nested-links">
                            <li class="la-course__option">
                                @if(Auth::check())
                                    <span class="d-inline-block la-course__addtocart" onclick="addToCart({{$id}})">
                                        <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                    </span>
                                @else
                                    <span class="d-inline-block la-course__addtocart" data-toggle="modal" data-target="#locked_login_modal">
                                        <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                    </span>
                                @endif
                            </li>

                            <li class="la-course__option">
                                @if(Auth::check())
                                    <span @if($addedToWhishList) onclick="location.href='/remove-from-wishlist/{{$id}}'" @else onclick="addToWishList({{$id}})" @endif  >
                                        <span class="d-inline-block la-course__like">
                                            <i class="la-icon la-icon--2xl icon icon-wishlist @if($addedToWhishList) text-warning @endif"></i>
                                        </span>
                                    </span>
                                @else
                                    <span data-toggle="modal" data-target="#locked_login_modal">
                                        <span class="d-inline-block la-course__like">
                                            <i class="la-icon la-icon--2xl icon icon-wishlist"></i>
                                        </span>
                                    </span>
                                @endif
                            </li>

                            <li class="la-course__option">
                                    <div class="dropdown">
                                        <div class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);">
                                            <i class="la-icon la-icon--2xl icon icon-menu"></i>
                                        </div>
                                        <div class="la-cmenu dropdown-menu py-0">
                                            @if(Auth::check())
                                                <span class="dropdown-item la-cmenu__item d-inline-flex" @if($removeFromPlaylist) onclick="location.href='{{url()->current()}}/{{$id}}'"  @else onclick="showAddToPlaylist({{$id}})" @endif><i class="icon icon-playlist la-icon la-cmenu__item-icon mr-2"></i> @if($removeFromPlaylist) Remove from Playlist  @else Add to Playlist @endif</span>
                                                <span class="dropdown-item la-cmenu__item d-inline-flex" @if($addedToWhishList) onclick="location.href='/remove-from-wishlist/{{$id}}'" @else onclick="addToWishList({{$id}})" @endif><i class="icon icon-wishlist la-icon la-cmenu__item-icon mr-2"></i> @if($addedToWhishList) Remove from Wishlist @else Add to Wishlist @endif </span>
                                                <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="addToCart({{$id}})"><i class="icon icon-cart la-icon la-cmenu__item-icon mr-2"></i>  Add to Cart</span>
                                            @else   

                                                <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-playlist la-icon la-cmenu__item-icon mr-2"></i>  Add to Playlist</span>
                                                <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-wishlist la-icon la-cmenu__item-icon mr-2"></i> Add to Wishlist </span>
                                                <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-cart la-icon la-cmenu__item-icon mr-2"></i>  Add to Cart</span>

                                            @endif
                                        </div>
                                    </div>
                            </li>
                        </ul>

                        <div class="la-course__learners"><strong>{{$learnerCount}}</strong>  Learners</div>
                    </div>
                </a>
                <div class="la-course__imgwrap">
                    <img class="img-fluid" src= "{{ $img }}" alt= "{{ $course }}" />
                </div>            
        </div>
         
        <div class="la-course__btm">
            <div class="la-course__info d-flex align-items-center mb-1">
                <a class="la-course__title" href= {{ '/learn/course/'.$id.'/'.$url }}> {{ strlen($course)>25?substr($course,0,25).'...':$course }} </a>
                <div class="la-course__rating ml-auto">
                    <div class="la-rtng__pg-rtng d-inline-flex pl-3">
                        @if($rating == 5)
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                        @elseif($rating >= 4)
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        @elseif($rating >= 3)
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>

                        @elseif($rating >= 2)
                        
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        @elseif($rating >= 1)
                            <div class="la-icon--lg icon-star la-rtng__fill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        @else
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                            <div class="la-icon--lg icon-star la-rtng__unfill"></div>
                        @endif
                    </div>
                </div>
            </div>
            
            <a class="la-course__creator d-inline-flex align-items-center" href= "/creator/{{ $creatorUrl }}" >
                <div class="la-course__creator-imgwrap">
                    <img class="img-fluid" src="https://picsum.photos/200/200" alt={{ $creatorName }} />
                    {{-- <img class="img-fluid" src={{ $creatorImg }} alt={{ $creatorName }} /> --}}
                </div>
                <div class="la-course__creator-name">{{ $creatorName }}</div>
            </a>
        </div>
    </div>
</div>



<!-- Course Card List View: Start -->
<div class="col-12 list-view d-none">
    <div class="la-course__list d-flex justify-content-between align-items-center">
        <div class="la-course__list-clft d-md-flex align-items-center">
            <div class="la-course__list-cimgtop">
                <a href="{{ '/learn/course/'.$id.'/'.$url }}"  class="la-course__list-cimg">
                    <img src="{{ $img }}" alt="{{ $course }}" class="img-fluid d-block" />
                </a>
            </div>
            
            <div class="la-course__list-cinfo ml-md-5">
                <h4 class="la-course__list-cname text-md text-md-2xl">{{ strlen($course)>25?substr($course,0,25).'...':$course }} </h4>
                <a href="/creator/{{ $creatorUrl }}" class="la-course__list-cauthor text-capitalize text-sm text-md-lg">{{ $creatorName }}</a>
            </div>
        </div>

        <div class="la-course__list-crht d-flex align-items-center">
            <div class="la-course__list-clearners ml-2">{{$learnerCount}} <span class="la-course__list-clearners--text">Learners</span></div>
            <div class="la-course__list-cratings ml-2 ml-md-20">  
                 <div class="la-rtng__pg-rtng d-inline-flex px-3">
                    <div class="icon-star la-rtng__fill"></div>
                    <div class="icon-star la-rtng__fill"></div>
                    <div class="icon-star la-rtng__fill"></div>
                    <div class="icon-star la-rtng__unfill"></div>
                    <div class="icon-star la-rtng__unfill"></div>
                </div>
            </div>

            <li class="la-course__option ml-2 ml-md-20">
                <div class="dropdown">
                    <div class="dropdown-toggle d-inline-block la-course__menubtn" data-toggle="dropdown" href="javascript:void(0);">
                        <i class="la-icon la-icon--2xl icon icon-menu"></i>
                    </div>
                    <div class="la-cmenu dropdown-menu py-0">
                        @if(Auth::check())
                            <span class="dropdown-item la-cmenu__item d-inline-flex" @if($removeFromPlaylist) onclick="location.href='{{url()->current()}}/{{$id}}'"  @else onclick="showAddToPlaylist({{$id}})" @endif><i class="icon icon-playlist la-icon la-cmenu__item-icon mr-2"></i> @if($removeFromPlaylist) Remove from Playlist  @else Add to Playlist @endif</span>
                            <span class="dropdown-item la-cmenu__item d-inline-flex" @if($addedToWhishList) onclick="location.href='/remove-from-wishlist/{{$id}}'" @else onclick="addToWishList({{$id}})" @endif><i class="icon icon-wishlist la-icon la-cmenu__item-icon mr-2"></i> @if($addedToWhishList) Remove from Wishlist @else Add to Wishlist @endif </span>
                            <span class="dropdown-item la-cmenu__item d-inline-flex" onclick="addToCart({{$id}})"><i class="icon icon-cart la-icon la-cmenu__item-icon mr-2"></i>  Add to Cart</span>
                        @else   
                            <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-playlist la-icon la-cmenu__item-icon mr-2"></i>  Add to Playlist</span>
                            <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-wishlist la-icon la-cmenu__item-icon mr-2"></i> Add to Wishlist </span>
                            <span class="dropdown-item la-cmenu__item d-inline-flex" data-toggle="modal" data-target="#locked_login_modal"><i class="icon icon-cart la-icon la-cmenu__item-icon mr-2"></i>  Add to Cart</span>
                        @endif
                    </div>
                </div>
            </li>
        </div>
    </div>
</div>
<!-- Course Card List View: End -->
