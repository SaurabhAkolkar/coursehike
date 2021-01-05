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
                  <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5 la-anim__stagger-item" href="{{URL::previous()}}"></a>
                  <h1 class="la-profile__title la-anim__stagger-item">Interests</h1>
                </div>

                

                <section class="la-interests__like la-interests__sec">
                    <div class="la-interests__inner la-anim__wrap">
                        <div class="la-interests__title la-anim__stagger-item">
                            Your Interests
                            <!--<a role="button" href="" class="text-sm ml-5" style="color:var(--app-indigo-1);font-weight:var(--font-medium)">Edit</a> -->
                        </div>
                        <ul class="row la-interests__list  pr-5">
                            
                            @if(count($myInterests))
                                @php
                                $alreadyAdded = true;
                                @endphp

                                @foreach ($myInterests as $interest)
                                    
                                    <x-my-interest
                                        :id="$interest->category_id"
                                        :img="'https://picsum.photos/100/100'"
                                        :name="$interest->category['title']"
                                        :alreadyAdded="$alreadyAdded"
                                    />
                                @endforeach
                            @endif
                        </ul>

                        <div class="la-interests__like la-anim__wrap">
                            <div class="la-interests__title la-anim__stagger-item">You might also like</div>
                            <ul class="row la-interests__list pr-5">
                         

                                @foreach ($otherCategories as $category)
                                    <x-my-interest
                                        :img="'https://picsum.photos/100/100'"
                                        :name="$category->title"
                                        :id="$category->id"
                                        :alreadyAdded="false"
                                    />
                                @endforeach
                            </ul>   
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
                                        <div class="la-btn__alert-success col-md-4 offset-md-4 alert alert-success alert-dismissible fade show" id="wishlist_alert" role="alert">
                                            <h6 id="wishlist_alert_message" class="la-btn__alert-msg">${data}</h6>
                                            <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
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
                                        <div class="la-btn__alert-success col-md-4 offset-md-4 alert alert-success alert-dismissible fade show" id="wishlist_alert" role="alert">
                                            <h6 id="wishlist_alert_message" class="la-btn__alert-msg">${data}</h6>
                                            <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
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