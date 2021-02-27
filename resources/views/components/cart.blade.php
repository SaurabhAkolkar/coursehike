    @php
        if($classType == 'all_classes'){

            $classes_id = App\CourseChapter::where('course_id', $courseId)->pluck('id'); 
            $classes = App\CourseChapter::where('course_id', $courseId)->get(); 

        }else{

            $classes_id = App\CartItem::where('cart_id', $cartId)->pluck('class_id'); 
            $classes = App\CourseChapter::where('course_id', $courseId)->get(); 

        }
    @endphp
    <div class="la-cart__items ">
        <div class="la-cart__items mb-8  ">
            <div class="la-cart__item row la-anim__wrap">
                <div class="la-cart__item-course col-8 col-md-8 col-lg-7 pr-0 la-anim__stagger-item">
                    <div class="">
                        <div class="la-cart__item-label mb-4 ">Course</div>
                    </div>
                    <div class="la-cart__item-content d-md-flex">
                        <div class="la-cart__item-left  mr-md-4">
                            <div class="la-cart__item-img">
                                <img src= "{{ $courseImg }}" class="img-fluid" alt= {{ $course }} />
                            </div>
                        </div>
                        <div class="la-cart__item-right ">
                            <div class="la-cart__item-name">{{ $course }}</div>
                            <div class="la-cart__item-author mb-2 mb-lg-4">by <span class="text-capitalize ">{{ $creator}}</span></div>
                            <div class="la-cart__item-actions d-flex">
                                <div class="la-cart__item-action remove"> 
                                    <a href= {{ $removeUrl }}>{{ $remove }}</a>
                                </div>
                                <div class="la-cart__item-action wishlist">
                                    <a href={{ $wishlistUrl }}>{{ $wishlist }}</a>
                                </div>
                                <div class="la-cart__item-action edit ">
                                    <a  data-toggle="modal" data-target="#edit_cart_{{$cartId}}"> {{ $edit }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($classType != 'all_classes')
                        <div class="la-cart__item-cartclasses py-2 ">
                            <div class="la-cart__item-carttoggler collapsed position-relative mx-md-2" data-toggle="collapse"  href="#cart_class_{{ $collapseId }}" aria-expanded="false">
                                Classes in the Cart
                            </div>
                            
                            <div class="la-cart__item-cartclass collapse show mx-2 my-2" id="cart_class_{{ $collapseId }}">
                                <ol class="la-cart__item-cartlist pl-6 pl-md-7 mr-md-7">
                                    @foreach($cart->cartItems as $class)
                                        <li class="la-cart__item-cartitem">{{ strlen($class->chapter->chapter_name) > 50? substr($class->chapter->chapter_name, 0, 45).'....': $class->chapter->chapter_name}}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif
                </div>
                

                <div class="col-4 col-md-4 col-lg-5 pl-0 la-cart__item-info d-flex align-items-start la-anim__wrap">
                    <div class="la-cart__item-classes la-anim__stagger-item">
                        <div class="la-cart__item-label mb-4 ">Classes</div>
                        <div class="la-cart__item-content leading-snug "><span>@if($classType == 'all_classes') All Classes @else Selected Classes @endif</span></div>
                    </div>

                    <div class="la-cart__item-price ml-4 ml-md-20 la-anim__stagger-item">
                        <div class="la-cart__item-label mb-4 ">Price</div>
                        <div class="la-cart__item-content">
                            <div class="la-soffer ml-0">
                                <div class="la-soffer__bestprice la-cart__item-cost"> 
                                   <sup>{{ getSymbol() }}</sup><span>{{ $cart->cartItems->sum('price')}}</span>
                                </div>
                                <div class="la-soffer__realprice "> 
                                   <sup>{{ getSymbol() }}</sup><span>{{ $cart->cartItems->sum('offer_price') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


 <!-- Edit Selection Popup: Start -->
 <div class="modal fade la-cart__edit-modal" id="edit_cart_{{$cartId}}">
                                        <div class="modal-dialog la-cart__edit-dialog">
                                            <div class="modal-content la-cart__edit-content">
                                                <div class="modal-header la-cart__edit-header">
                                                    <h4 class="modal-title la-cart__edit-title">Edit Selection</h4>
                                                    <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                                                </div>
                                                <form action="/add-to-cart" method="post" id="update_cart_form" onsubmit="return changeInputs()" >
                                                @csrf
                                                <input type = "hidden" value="{{$courseId}}" name="course_id"/>
                                                <div class="modal-body la-cart__edit-body">
                                                    <div class="la-form__radio-wrap pb-2">
                                                        <input type="radio" name="classes_{{ $courseId }}" onclick="checkBoxs('all', {{ $courseId }})" value="all-classes" id="all_classes_{{ $courseId }}" class="la-form__radio d-none cart_radio_button" @if($classType == 'all_classes') checked @endif>
                                                        <label for="all_classes_{{ $courseId }}" class="d-flex align-items-center">
                                                            <span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span>
                                                            <span class="la-cart__edit-classes"> All Classes</span>
                                                        </label> 
                                                    </div>
                                                    <div class="la-form__radio-wrap">
                                                        <input type="radio" name="classes_{{ $courseId }}" onclick="checkBoxs('selected', {{ $courseId }})" value="select-classes" id="select_classes_{{ $courseId }}" class="la-form__radio d-none cart_radio_button" @if($classType  == 'selected_classes') checked @endif >
                                                        <label for="select_classes_{{ $courseId }}" class="d-flex align-items-center">
                                                            <span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span>
                                                            <span class="la-cart__edit-classes"> Select Classes</span>
                                                        </label> 
                                                    </div>

                                                    <div class="row la-cart__edit-info">
                                                        <div class="col-2 col-md-2"></div>
                                                        <div class="col-2 col-md-2">
                                                            <div class="la-cart__edit-main">Class</div>
                                                        </div>
                                                        <div class="col-3 col-md-3">
                                                            <div class="la-cart__edit-main">Name</div>
                                                        </div>
                                                        <div class="col-2 col-md-3 px-0 px-md-2">
                                                            <div class="la-cart__edit-main">Mentor</div>
                                                        </div>
                                                        <div class="col-3 col-md-2">
                                                            <div class="la-cart__edit-main">Price</div>
                                                        </div>
                                                    </div>

                                                    
                                                        @foreach($cart->courses->chapter as $class)
                                                        <div class="row la-cart__edit-info ">
                                                            <div class="col-2 col-md-2 text-center my-auto ">
                                                                <div class="form-group m-0">
                                                                    <label class="glabel d-flex justify-content-center m-0">
                                                                        <input type="checkbox" name="selected_classes[]" onclick="toggleRadioButton({{ $courseId }})" class="d-none selected_classes{{ $courseId }}" @if(in_array($class->id, $classes_id->toArray())) checked @endif value="{{$class->id}}">
                                                                        <span class="gcheck position-relative px-1">
                                                                            <div class="gcheck-icon la-icon icon-tick text-xs position-absolute" style="margin-left:-6px;"></div>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 col-md-2 p-0 my-auto">
                                                                <img class="la-cart__edit-img img-fluid d-block" src="https://picsum.photos/80/50" alt="" />
                                                            </div>
                                                            <div class="col-3 col-md-3 my-auto">
                                                                <div class="la-cart__edit-submain">{{$class->chapter_name}}</div>
                                                            </div>
                                                            <div class="col-2 col-md-3 px-0 px-md-2 my-auto">
                                                                <div class="la-cart__edit-submain text-capitalize">{{ $creator }}</div>
                                                            </div>
                                                            <div class=" col-3 col-md-2 my-auto">
                                                                <div class="la-cart__edit-submain  text-sm">$ {{ $class->price }}</div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    
                                                    <!-- 
                                                    <div class="row la-cart__edit-info">
                                                        <div class="col-2 col-md-2 text-center my-auto">
                                                            <input type="checkbox" name="" class="">
                                                        </div>
                                                        <div class="col-2 col-md-2 p-0 my-auto">
                                                            <img class="la-cart__edit-img img-fluid d-block" src="https://picsum.photos/80/50" alt="" />
                                                        </div>
                                                        <div class="col-3 col-md-3 my-auto">
                                                            <div class="la-cart__edit-submain  text-sm">At vero eos et accusam et</div>
                                                        </div>
                                                        <div class="col-3 col-md-3 my-auto">
                                                            <div class="la-cart__edit-submain  text-sm">Amy D'souza</div>
                                                        </div>
                                                        <div class="col-2 col-md-2 my-auto">
                                                            <div class="la-cart__edit-submain  text-sm">$ 20</div>
                                                        </div>
                                                    </div>
                                                    -->

                                                    <div class="la-cart__edit-update text-right">
                                                        <a onclick="$('#update_cart_form').submit()" role="button" class="la-cart__edit-btn">Update Cart</a>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Selection Popup: End -->
                                   