@extends('learners.layouts.intro')

@section('seo_content')
    <title> Mentor Signup </title>
@endsection

@section('content')
<section class="la-entry__sec">
    <div class="container-fluid la-entry__sec-inner">
      <div class="row la-entry__row h-100">
        <div class="col-md-7  la-entry__col la-entry__col-left h-100 d-none d-md-block la-anim__wrap">
              <div class="la-entry__slider-wrap d-flex align-items-center la-anim__fade-in-left">
                  <div class="swiper-container entry-swiper-container h-100 la-entry__slider">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide" style="width: 80vw;height: 80vh;background-image:url(./images/learners/creator/creator-signup1.svg)"></div>
                      <div class="swiper-slide" style="width: 80vw;height: 80vh;background-image:url(./images/learners/creator/creator-signup2.svg)"></div>
                    </div>
                    <div class="swiper-pagination swiper-pagination-black"></div>
                </div>
              </div>
        </div>
        <div class="col-md-5 la-entry__col la-entry__col-right h-100">
          <div class="la-entry__content-wrap d-flex flex-column justify-content-center la-anim__wrap">
            <div class="la-entry__content-top" id="creator_signup_div">
              @if($check == null)
              <div class="la-entry__interests-title la-entry__content-title text-center mb-8 la-anim__stagger-item">Tell us about your work</div>
              @if($errors->any())
              <h4></h4>
              <div class="alert alert-danger">{{$errors->first()}}</div>
              @endif
             
              <form class="la-entry__form" action="" method="post" name="creator-signup">
                      @csrf
                          <div class="la-form__input-wrap la-entry__input-wrap la-anim__stagger-item--x">
                            <span class="la-entry__input-icon"><span class="la-icon la-icon--lg icon-profile"></span></span>
                            <input class="la-form__input la-entry__input" type="text" name="display_name" placeholder="Display Name" required>
                          </div>
                            @error('display_name')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror 
                          

                          <div class="la-form__input-wrap la-entry__input-wrap la-anim__stagger-item--x">
                            <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-expert-in"></span></span>
                            <input class="la-form__input la-entry__input" type="text" value="" name="expert_in" placeholder="Expert In" required>
                          </div>
                          @error('expert_in')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <div class="la-form__input-wrap la-entry__input-wrap la-anim__stagger-item--x">
                            <span class="la-entry__input-icon"><span class="la-icon la-icon--lg icon-experience"></span></span>
                            <input class="la-form__input la-entry__input" type="number" value="" name="yoe" placeholder="Years of Experience" required>
                          </div>
                          @error('yoe')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <div id="added_to_awards">
                            <input type="hidden" name="all_awards" id="all_awards"/>
                          </div>
                          <div class="la-form__input-wrap la-entry__input-wrap la-anim__stagger-item--x">
                            <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-awards"></span></span>
                              <input class="la-form__input la-entry__input" value="" id="awards" name="awards" placeholder="Any Award you want to add"><span class="la-entry__input-icon" style="right:0;cursor:pointer;border:0" onclick="addToAwards();">+</span>
                          </div>
                          <div id="added_to_portfolio">
                            <input type="hidden" name="all_portfolio" id="all_portfolio" />
                          </div>
                          <div class="la-form__input-wrap la-entry__input-wrap mb-12 la-anim__stagger-item--x">
                            <span class="la-entry__input-icon"><span class="la-icon la-icon--xl icon-portfolio-link"></span></span>
                            <input class="la-form__input la-entry__input"value="" id="portfolio_links" name="portfolio_links" placeholder="Portfolio Links (if any)"><span class="la-entry__input-icon" style="right:0;cursor:pointer;border:0" onclick="addToLinks();">+</span>
                          </div>
                  
                  <div class="form-group pt-3 mb-4 la-anim__stagger-item">
                    <label class="d-flex justify-content-center" for="mentor_terms">
                      <input type="checkbox" class="d-none" id="mentor_terms" name="mentor_terms">
                      <span class="gcheck position-relative" style="opacity: 1">
                        <div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div>
                      </span>
                      <div class="pl-2 mt-n1 text-sm la-entry__terms" style="color:var(--gray6);opacity:1" >
                        I have read & agree to the 
                        <a href="mentor-terms-conditions" class="la-entry__terms-creator" title="Read the Terms & Conditions">terms & conditions</a>
                      </div>
                    </label>
                  </div>

                <button class="btn  la-btn__app la-anim__stagger-item--x w-100" type="submit">CONTINUE</button>
              </form>
              @else
              <h3> Your request has been sent to Admin. Our team will contact you soon.</h3>
              @endif
              <!-- <div class="la-entry__other-option text-center mt-5">Already have an account? <span class="la-btn__plain text--burple text--md ml-2"><a href="">Login</a></span></div> -->
            </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('footerScripts')
<script>
    let addToAwards = () =>{
        let award = $('#awards').val();
        let awardInput = $('#all_awards').val();

        if(award && !awardInput.includes(award)){
            let badge = `<span class="la-entry__badge badge badge-pill" id="award_${award}">${award} <span class="ml-2" role="button" onclick="removeAward('${award}')">x</span></span>`;
            if(awardInput){
              awardInput = awardInput+', '+award; 
            }else{
              awardInput = award;
            }
            
            $('#all_awards').val(awardInput);
            $('#added_to_awards').append(badge);
            $('#awards').val(''); 
        }
    }
    let addToLinks = () =>{
       let portfolio = $('#portfolio_links').val();
        let portfolioInput = $('#all_portfolio').val();
        
        if(portfolio && !portfolioInput.includes(portfolio)){
            let badge = `<span class="la-entry__badge badge badge-pill" id="portfolio_${portfolio}">${portfolio} <span class="ml-2" role="button" onclick="removePortfolio('${portfolio}')">x</span></span>`;
            if(portfolioInput){
              portfolioInput = portfolioInput+','+portfolio; 
            }else{
              portfolioInput = portfolio;
            }
            
            $('#all_portfolio').val(portfolioInput);
            $('#added_to_portfolio').append(badge);
            $('#portfolio_links').val(''); 
        }
    }

    let removeAward = (award) => {
        $('#award_'+award).remove();

        let awardInput = $('#all_awards').val();
        awardInput = awardInput.replace(award,'');
        $('#all_awards').val(awardInput);

    }

    let removePortfolio = (portfolio) => {
        $('#portfolio_'+portfolio).remove();

        let portfolioInput = $('#all_portfolio').val();
        portfolioInput = portfolioInput.replace(portfolio,'');
        $('#all_portfolio').val(portfolioInput);

    }

    $("form[name='creator-signup']").validate({
      
      rules: {

        display_name: {
          required: true,
        }, 
        expert_in: {
          required: true,
        },
        yoe: {
          required: true,
          number: true,
        }
      },
      // Specify validation error messages
      messages: {
        display_name: {
          required: "Please provide a Display Name."
        },
        expert_in: {
          required: "Please provide a Field of expertise."
        },
        yoe: {
          required: "Please provide a Years of experience.",
          number : "Years of experience should be a number."
        }
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
            
            $.ajax({
              url: '/creator-signup',
              type: 'post',
              data: $(form).serialize(),
              success: function(response) {
                  let message = `<h3>${response}</h3> <a class="la-btn__app" href="/profile">Update Profile</a>`;
                  $('#creator_signup_div').html(message);
              }   
            });  
      }
    });

</script>
@endsection