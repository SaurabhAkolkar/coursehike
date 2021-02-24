@extends('learners.layouts.app')

@section('content')
    <div class="la-profile__wrap">

        <!-- Side Navbar: Start -->
        @include ('learners.pages.sidebar')
        <!-- Side Navbar: End -->

        <div class="la-profile__main">
            <div class="container">
                <!-- Alert Message: Start -->
                <div id="interest_alert_div"></div>
                 <!-- Alert Message: End -->

              <div class="la-profile__main-inner">
                <div class="la-profile__title-wrap m-0 la-anim__wrap">
                  <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-3 la-anim__stagger-item" href="{{URL::previous()}}"></a>
                  <h1 class="la-profile__title la-anim__stagger-item">Interests</h1>
                </div>

                <section class="la-interests__like la-interests__sec">
                    <div class="la-interests__inner la-anim__wrap">
                        <div class="la-interests__title la-anim__stagger-item mb-6">
                            Your Interests
                            <!--<a role="button" href="" class="text-sm ml-5" style="color:var(--app-indigo-1);font-weight:var(--font-medium)">Edit</a> -->
                        </div>
                        
                            @if(count($myInterests))
                                @php
                                $alreadyAdded = true;
                                @endphp 

                                <div class="row la-interests__list pr-5  la-anim__stagger-item">
                                    @foreach ($myInterests as $interest)
                                        @if($interest->category != null)
                                            <x-my-interest
                                                :id="$interest->category_id"
                                                :img="$interest->category->image"
                                                :name="$interest->category['title']"
                                                :alreadyAdded="$alreadyAdded"
                                            />
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="col-lg-8 mt-2 la-empty__courses la-anim__stagger-item--x">
                                    <div class="la-empty__browse-courses text-center text-md-left">
                                        <h6 class="la-empty__browse leading-tight text-lg" style="text-transform:none; letter-spacing:1px">
                                            Please Add Interests for better experience.
                                        </h6>
                                    </div>
                                </div>
                            @endif
                        

                        <div class="la-interests__like la-anim__wrap">
                            <div class="la-interests__title la-anim__stagger-item mb-6">You might also like</div>
                            
                         
                                @if(count($otherCategories) == 0)
                                    <div class="col-lg-8 mt-2 la-empty__courses la-anim__stagger-item--x">
                                        <div class="la-empty__browse-courses  text-center text-md-left">
                                            <h6 class="la-empty__browse leading-tight text-lg" style="text-transform:none; letter-spacing:1px">
                                                No more Interests available.
                                            </h6>
                                        </div>
                                    </div>
                                @else

                                    <div class="row la-interests__list pr-5  la-anim__stagger-item">
                                    @foreach ($otherCategories as $category)
                                        <x-my-interest
                                            :img="$category->image"
                                            :name="$category->title"
                                            :id="$category->id"
                                            :alreadyAdded="false"
                                        />
                                    @endforeach
                                    </div>
                                @endif
                               
                        </div>
                    </div>
                </section>
              </div>
            </div>
        </div>
    </div>
@endsection

@section('footerScripts')
<script>
    function addInterest(id){

        let category_id = id;
        if(category_id){
            $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url: '/add-to-my-interest',
            data: {category_id: category_id},
            success:function(data){   
                
                $('#interest_alert_div').html(' ');
                $('#course_'+id).remove(); 
                console.log(data == 'Interest is already added.');
                let successAlert = `<div class="la-btn__alert position-relative">
                                        <div class="la-btn__alert-success col-lg-4 offset-lg-3 alert alert-success alert-dismissible fade show" id="wishlist_alert" role="alert">
                                            <span id="wishlist_alert_message" class="la-btn__alert-msg">${data}</span>
                                            <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true" style="color:#56188C">&times;</span>
                                            </button>
                                         </div>
                                    </div>`
                $('#interest_alert_div').html(successAlert);
           
                location.reload();
              
                    
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
            }
            });
        }else{
            alert('Something went wrong');
        }
    }

    function removeInterest(id){

        let category_id = id;
        if(category_id){
            $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url: '/remove-interest',
            data: {category_id: category_id},
            success:function(data){   
                
                $('#interest_alert_div').html(' ');
                $('#course_'+id).remove(); 
                console.log(data);
                let successAlert = `<div class="la-btn__alert position-relative">
                                        <div class="la-btn__alert-success col-lg-4 offset-lg-3 alert alert-success alert-dismissible fade show" id="wishlist_alert" role="alert">
                                            <span id="wishlist_alert_message" class="la-btn__alert-msg">${data}</span>
                                            <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true" style="color:#56188C">&times;</span>
                                            </button>
                                        </div>
                                    </div>`
                $('#interest_alert_div').html(successAlert);
               
                    location.reload();
            
                    
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
            }
            });
        }else{
            alert('Something went wrong');
        }
    }

</script>
@endsection