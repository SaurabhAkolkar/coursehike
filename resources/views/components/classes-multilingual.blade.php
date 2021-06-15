
<!--  Multilingual Class Card -->

    <div class="la-lclass la-lclass__multilingual position-relative" id="{{ $id }}">
        <div class="la-lclass__inner">
            <div class="la-lclass__inner-link">
                <div class="la-lclass__inner-wrap">
                    <div class="la-lclass__imgwrap">
                        <img class="img-fluid lazy" src="{{ $img }}" data-src="{{ $img }}" alt= "{{ $title }}" />
                    </div>

                    <div class="la-lclass__info">
                        <div class="la-lclass__info-inner">
                            <div class="col-8 px-0 la-lclass__course-name position-relative">
                                <a class="la-lclass__title text-md text-lg-2xl leading-tight" href="{{ $url }}" > {{ $title }} </a>
                            </div>

                            <div class="d-flex flex-row justify-content-between align-items-end">       
                                <div class="col-4 px-0 leading-tight">
                                    <a class="la-lclass__creator d-inline-flex align-items-center" href="{{ $creatorUrl }}" >
                                        <div class="la-lclass__creator-name text-capitalize mt-3">{{ $creatorName }}</div>
                                    </a>
                                </div>

                                <div class="col-8 px-0 text-right d-flex justify-content-end align-items-end">
                                    <span class="la-lclass__videos pr-1">{{ $videoCount }} Videos</span>
                                    <span class="la-lclass__videos px-1">{{ $chapterCount }} Chapters</span>
                                    <span class="la-lclass__duration pl-1">{{ $duration }}</span>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            
                <div class="la-lclass__overlay d-flex flex-column justify-content-between"> 
                    <div class="la-lclass__overlay-info d-flex justify-content-between align-items-start">
                          
                            <div class="la-lclass__multilingual-tag">
                                <div>Multi<span style="color:var(--app-indigo-1);">Lingual</span></div>
                            </div>
                           
                            <ul class="la-lclass__options list-unstyled text-white pb-10" id="la-course__nested-links">
                                <li class="la-lclass__option">
                                    @if(Auth::check())
                                        <span class="d-inline-block la-lclass__addtocart">
                                            <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                        </span>
                                    @else
                                        <span class="d-inline-block la-lclass__addtocart" data-toggle="modal" data-target="#locked_login_modal">
                                            <i class="la-icon la-icon--2xl icon icon-cart"></i>
                                        </span>
                                    @endif
                                </li>

                                <li class="la-lclass__option">
                                    @if(Auth::check())
                                        <span class="d-inline-block la-lclass__like">
                                            <i class="la-icon la-icon--2xl icon"></i>
                                        </span>
                                            
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
                                        
                                        <span class="d-inline-block la-lclass__like">
                                            <i class="la-icon  la-icon--2xl icon-playlist"></i> 
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
                        <a  role="button" href= "{{ $url }}" class="la-lclass__play-btn stretched-link h-100">
                            <svg class="la-lclass__play-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"  x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                <polygon class='la-lclass__play-triangle triangle' id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 "/> 
                                <circle class='la-lclass__play-circle circle' id="XMLID_17_" fill="none"  stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"/>
                            </svg>
                        </a>
                    </div>                              
                </div>         
            </div>   
        </div>
    </div>



