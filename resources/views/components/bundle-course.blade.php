<!--  New Version Course Card -->
<div class="col-12 la-lcourse__card">
    <div class="la-lcourse position-relative">
        <div class="la-lcourse__inner">
            <div class="la-lcourse__inner-link">
                <div class="la-lcourse__inner-wrap">
                    <div class="la-lcourse__imgwrap">
                        <img class="img-fluid lazy" src= "{{ $img }}?width=560&height=460&auto_optimize=true" data-src= "{{ $img }}?width=560&height=460&auto_optimize=true" alt= "{{ $course }}" />
                    </div> 
                </div>
                
                <div class="la-lcourse__overlay"  > 
                    <div class="la-lcourse__overlay-info d-flex justify-content-between align-items-start mb-auto">
                        @if($price)
                        @else
                        <div class="la-lcourse__free">
                            <img src="{{ asset('images/learners/home/free-class.svg') }}" data-src="{{ asset('images/learners/home/free-class.svg') }}" class="img-fluid lazy" alt="Free Class" />
                        </div>
                        @endif
                        <ul class="la-lcourse__options list-unstyled text-white" id="la-course__nested-links">
                            <li class="la-lcourse__option">
                                @if(Auth::check())
                                @if($price && $bought == null)
                                <span class="d-inline-block la-lcourse__addtocart" onclick="addToCart({{$id}}, classes='all', bundleCourse =true)">
                                    <i class="la-icon la-icon--2xl icon icon-cart @if($checkCart) text-warning @endif"></i>
                                </span>
                                @else

                                @endif
                                @else
                                <span class="d-inline-block la-lcourse__addtocart" data-toggle="modal" data-target="#locked_login_modal">
                                    <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                </span>
                                @endif
                            </li>

                            <li class="la-lcourse__option">
                                @if(Auth::check())
                                @if($price && $bought == null)
                                <span @if($addedToWhishList && $wishlistId) onclick="location.href='/remove-from-wishlist/{{$wishlistId}}'" @else onclick="addToWishList({{$id}}, bundleCourse = true)" @endif  >
                                    <span class="d-inline-block la-lcourse__like">
                                        <i class="la-icon la-icon--2xl icon @if($checkWishList) text-warning @endif icon-wishlist @if($addedToWhishList) text-warning @endif"></i>
                                    </span>
                                </span>
                                @else

                                @endif
                                 @else
                                <span data-toggle="modal" data-target="#locked_login_modal">
                                    <span class="d-inline-block la-lcourse__like">
                                        <i class="la-icon la-icon--2xl icon icon-wishlist"></i>
                                    </span>
                                </span>
                                @endif
                            </li>

                            <li class="la-lcourse__option">
                                @if(Auth::check())
                                <span  @if($removeFromPlaylist) onclick="location.href='{{url()->current()}}/{{$id}}/bundle'"  @else onclick="showAddToPlaylist({{$id}},bundleCourse=true)" @endif>
                                    <span class="d-inline-block la-lcourse__like">
                                        <i class="la-icon  la-icon--2xl icon-playlist @if($removeFromPlaylist) text-warning  @endif"></i> 
                                    </span>
                                </span>
                                @else   
                                <span data-toggle="modal" data-target="#locked_login_modal">
                                    <span class="d-inline-block la-course__like">
                                        <i class="la-icon la-icon--2xl icon-playlist"></i> 
                                    </span>
                                </span>
                                @endif
                            </li>
                        </ul>
                    </div>               
                        
                    <div class="la-lcourse__play position-relative text-center w-100 h-100 d-flex flex-column justify-content-center align-items-center pt-20 px-2">
                        
                        <a  role="button" href= "{{ '/learn/course/'.$id.'/'.$url }}" class=" w-100 h-100 la-lcourse__play-btn stretched-link">
                            <svg class="la-lcourse__play-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"  x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                <polygon class='la-lcourse__play-triangle triangle' id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 "/> 
                                <circle class='la-lcourse__play-circle circle' id="XMLID_17_" fill="none"  stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"/>
                            </svg>
                        </a>
                        

                        <div class="la-rtng__pg-rtng d-flex justify-content-end align-items-end mt-auto ml-auto px-2 pb-2">
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

                    <div class="progress la-lcourse__progress bg-transparent align-items-end position-relative">
                        <div class="progress-bar la-lcourse__progress-bar" role="progress-bar" aria-valuenow="{{$progress}}%" aria-valuemin="0" aria-valuemax="100" style="width:{{$progress}}%; height:4px;"></div>
                    </div>     
                </div>  
                    
                <div class="la-lcourse__info w-100 d-flex flex-column">
                    <div class="la-lcourse__info-inner w-100">
                        <div class="position-relative d-inline-flex justify-content-between align-items-center w-100">
                            <div class="col-3 pl-0 pr-1">
                                <div class="la-lcourse__classes leading-none">{{$classesCount}} Classes</div>
                            </div>

                            <div class="col-3 pl-0 pr-1">
                                <div class="la-lcourse__videos leading-none">{{$videoCount}} Videos</div>
                            </div>

                            <div class="col-6 px-0 la-lcourse__rating text-right">
                                <div class="la-lcourse__learners text-right">
                                    <p class="mb-0 leading-none"><strong>{{$learnerCount}}</strong><br/> Learners</p>
                                </div>                                   
                            </div>
                        </div>

                        <div class="la-lcourse__course-name pt-3">
                            <a class="la-lcourse__title leading-tight stretched-link" href= {{ '/learn/course/'.$id.'/'.$url }}> {{ $course }} </a>
                        </div> 
                            
                        <div class="d-flex justify-content-end align-items-end position-relative w-100 pt-3">
                            <div class="la-lcourse__creator d-flex flex-row align-items-center">
                                <div class="la-lcourse__creator-name leading-tight text-right">
                                    <span>{{ $creatorName }}</span> <br/>
                                    <span>+{{count($creatorImg)}} Mentors</span>
                                </div>

                                <div class="la-lcourse__creator-imgwrap d-inline-flex position-relative">
                                    @foreach($creatorImg as $c)
                                        <img class="img-fluid lazy la-lcourse__creator-img{{$loop->index + 1}} position-absolute" src="{{ $c->user_img }}" data-src="{{ $c->user_img }}" alt="{{ $creatorName }}" />
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>


