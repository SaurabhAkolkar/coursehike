
<!--  New Version Class Card -->
<div class="col-12  la-lclass__card" @if($checkWishList) id="course_{{$id}}" @endif>
    <div class="la-lclass position-relative" id="lclass_card">
        <div class="la-lclass__inner">
            <div class="la-lclass__inner-link">
                <div class="la-lclass__inner-wrap">
                    <div class="la-lclass__imgwrap">
                        <img class="img-fluid lazy" src= "{{ $img }}?width=560&height=460&auto_optimize=true" data-src= "{{ $img }}?width=560&height=460&auto_optimize=true" alt= "{{ $course }}" />
                    </div>

                    <div class="la-lclass__info">
                        <div class="la-lclass__info-inner">
                            <div class="la-lclass__course-name position-relative">
                                <a class="la-lclass__title leading-tight" href= {{ '/learn/class/'.$id.'/'.$url }}> {{ $course }} </a>
                            </div>

                            <div class="d-flex flex-row justify-content-between align-items-end">       
                                <div class="col-9 px-0 leading-tight">
                                    <a class="la-lclass__creator d-inline-flex align-items-center" href="/mentor/{{ $creatorUrl }}/{{ $creatorName }}" >
                                        <div class="la-lclass__creator-name text-capitalize mt-3">{{ $creatorName }}</div>
                                    </a><br/>
                                   
                                    <span class="la-lclass__videos pr-1">{{$videoCount}} Videos</span>
                                    <span class="la-lclass__classes pl-1">{{$chapterCount}} @if($chapterCount > 1) Chapters @else Chapter @endif</span>
                                </div>

                                <div class="col-3 px-0 text-right d-flex justify-content-end align-items-end">
                                    <div class="la-lclass__duration">15h 20m</div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            
                <div class="la-lclass__overlay d-flex flex-column justify-content-between"> 
                    <div class="la-lclass__overlay-info d-flex justify-content-between align-items-start">
                            @if($price)
                            @else
                                <div class="la-lclass__free">
                                    <img src="{{ asset('images/learners/home/free-class.svg') }}" data-src="{{ asset('images/learners/home/free-class.svg') }}"  class="img-fluid lazy" alt="Free Class" />
                                </div>
                            @endif
                            <ul class="la-lclass__options list-unstyled text-white pb-10" id="la-course__nested-links">
                                <li class="la-lclass__option">
                                    @if(Auth::check())
                                        @if($price && $bought == null)
                                            <span class="d-inline-block la-lclass__addtocart" onclick="addToCart({{$id}})">
                                                <i class="la-icon la-icon--2xl icon icon-cart @if($checkCart) text-warning @endif"></i>
                                            </span>
                                        @else

                                        @endif
                                    @else
                                        <span class="d-inline-block la-lclass__addtocart" data-toggle="modal" data-target="#locked_login_modal">
                                            <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                        </span>
                                    @endif
                                </li>

                                <li class="la-lclass__option">
                                    @if(Auth::check())
                                        @if($price && $bought == null)
                                            <span @if($addedToWhishList) onclick="location.href='/remove-from-wishlist/{{$wishlistId}}'" @else onclick="addToWishList({{$id}})" @endif  >
                                                <span class="d-inline-block la-lclass__like">
                                                    <i class="la-icon la-icon--2xl icon @if($checkWishList) text-warning @endif icon-wishlist @if($addedToWhishList) text-warning @endif"></i>
                                                </span>
                                            </span>
                                        @else

                                        @endif
                                    @else
                                        <span data-toggle="modal" data-target="#locked_login_modal">
                                            <span class="d-inline-block la-lclass__like">
                                                <i class="la-icon la-icon--2xl icon icon-wishlist"></i>
                                            </span>
                                        </span>
                                    @endif
                                </li>

                                <li class="la-lclass__option">
                                    @if(Auth::check())
                                            <span  @if($removeFromPlaylist) onclick="location.href='{{url()->current()}}/{{$id}}'"  @else onclick="showAddToPlaylist({{$id}})" @endif>
                                                <span class="d-inline-block la-lclass__like">
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
                    
                    <div class="la-lclass__play text-center w-100 h-100 mt-20 pt-10 px-2">
                        <a  role="button" href= "{{ '/learn/class/'.$id.'/'.$url }}" class="la-lclass__play-btn stretched-link h-100">
                            <svg class="la-lclass__play-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"  x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                <polygon class='la-lclass__play-triangle triangle' id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 "/> 
                                <circle class='la-lclass__play-circle circle' id="XMLID_17_" fill="none"  stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"/>
                            </svg>
                        </a>
                    </div>  
                    <div class="progress la-lclass__progress bg-transparent align-items-end position-relative">
                        <div class="progress-bar la-lclass__progress-bar" role="progress-bar" aria-valuenow="{{$progress}}%" aria-valuemin="0" aria-valuemax="100" style="width:{{$progress}}%; height:4px;" id="course_progress_bar"></div>
                    </div>                               
                </div>         
            </div>   
        </div>
    </div>
</div>


