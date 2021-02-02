@extends('learners.layouts.intro')

@section('content')
<section class="la-entry__sec">
    <div class="container-fluid la-entry__sec-inner">
      <div class="row la-entry__row h-100 la-anim__wrap">
        <div class="col-md-7 la-entry__col la-entry__col-left h-100 d-none d-md-block">
                      <div class="la-entry__slider-wrap d-flex align-items-center  la-anim__fade-in-left">
                        <div class="swiper-container entry-swiper-container h-100 la-entry__slider">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(./images/learners/login-register/slide1.png)"></div>
                            <div class="swiper-slide" style="width: 60vh;height: 60vh;background-image:url(./images/learners/creator/earn.png)"></div>
                          </div>
                          <div class="swiper-pagination swiper-pagination-black"></div>
                        </div>
                      </div>
        </div>
        <div class="col-md-5 la-entry__col la-entry__col-right h-100">
          <div class="la-entry__content-wrap d-flex flex-column justify-content-center">
            <div class="la-entry__interests-wrap la-anim__wrap">
              <div class="la-entry__interests-title la-entry__content-title text-center mb-4 la-anim__stagger-item">Your Interests</div>
              <div class="row mb-3">
                @foreach ($categories as $c)
                    <li class="col-4 la-entry__interest la-anim__stagger-item--x">
                      <div class="la-entry__interest-inner position-relative d-flex align-items-end">
                        <span class="la-entry__interest-thumbnail position-absolute z-0" role="button" onclick="addToInterest({{$c->id}})" id="interest_span_{{$c->id}}">
                          <img class="img-fluid" src="https://picsum.photos/115/115" alt="" />
                        </span>
                        <span class="la-entry__interest-name">{{$c->title}}</span>
                      </div>
                    </li>
                @endforeach
              </div>
              <div class="la-entry__interest-actions text-center pt-6 la-anim__wrap">
                <form action="/add-interests" method="post" id="add_interests">
                  @csrf
                  <input type="hidden" name="interets" id="interest_input"/>
                  <div class="la-entry__interest-next mb-2 la-anim__stagger-item--x"><a onclick="$('#add_interests').submit()" role="button">GET STARTED</a></div>
                </form>
                <div class="la-entry__interest-skip la-btn__plain text--burple la-anim__fade-in-bottom"><a href="/profile">skip</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('footerScripts')
<script>
  function addToInterest(id){
      let input = $('#interest_input').val();
     
      if($('#interest_span_'+id).hasClass('border')){
        $('#interest_span_'+id).removeClass('border border-success');

        let input = $('#interest_input').val();
        input = input.replace(id,'');
        $('#interest_input').val(input);

      }else{
        if(id){
        input = input+', '+id; 
        }else{
        input = id;
        }

        $('#interest_input').val(input);
        $('#interest_span_'+id).addClass('border border-2 border-success');
      }
      
  }
</script>
@endsection