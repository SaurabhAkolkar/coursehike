<div class="col-12 col-md-6 col-lg-4  la-choose__plan la-anim__stagger-item px-0">
    <div class="col la-choose__plan-col">
      <div class="la-choose__plans">
        <div class="card la-choose__card">
          @if($plan == 'Yearly')
          <div class="la-choose__recommend d-flex justify-content-end">
              <img src="../images/learners/course-benefits/popular-plan.png" alt="Recommended" class="img-fluid d-block" />
          </div>
          @endif

          <div class="la-choose__card-inner">
            <div class="la-choose__box">
              <div class="la-choose__ptitle text-2xl mb-3">{{ $plan }} Plan</div>
              
              <div class="la-choose__plan-info">
                  <h5 class="la-choose__plan-info--title">What You'll Get</h5>
                  <ul class="la-choose__plan-info--list">
                    <li class="la-choose__plan-info--item d-flex align-items-start">
                      <span class="la-icon la-icon--lg icon-circle-tick mr-1"></span>
                      <span>Get access to all the Courses</span>
                    </li>
                    <li class="la-choose__plan-info--item d-flex align-items-start">
                      <span class="la-icon la-icon--lg icon-circle-tick mr-1"></span>
                      <span>Exclusive Master Classes from best of the world</span>
                    </li>
                    <li class="la-choose__plan-info--item d-flex align-items-start">
                      <span class="la-icon la-icon--lg icon-circle-tick mr-1"></span>
                      <span>Access to 600+ videos</span>
                    </li>
                  </ul>
              </div>
            </div>

            <div class="la-choose__btm text-center">
              <div class="la-choose__price mt-8">
                  {{-- <sup class="la-choose__tag text-lg">$</sup> --}}
                  <span class="la-choose__discount text-3xl text-md-5xl"> {{ $discount }}</span>/<small class="la-choose__billing text-sm">{{ $plan }}</small>
              </div>

              <div class="la-choose__oldprice-info d-flex flex-row mx-auto align-items-center justify-content-center">
                <div class="la-choose__oldprice text-sm mr-2">{{ $oldPrice }}</div> 

                @if($saving && $saving != 0)
                  <div class="la-choose__savings-bg">
                    <div class="la-choose__savings-{{ $class }} text-xxs">{{ $saving }}% OFF</div>
                  </div>
                
                @else
                
                  <div class="la-choose__savings-bg" style="visibility:hidden;">
                    <div class="la-choose__savings-{{ $class }}  text-xxs">{{ $saving }}% OFF</div>
                  </div>
                @endif
              </div>
             
            

              <div class="la-choose__subscribe mt-8">
                <p class="la-choose__subscribe-trial text-sm mb-2">Get free 7 Days trial</p>
                {{-- <a href="/subscription/{{ $slug }}" role="button" target="_self"> --}}
                @if (auth()->check() && Auth::user()->subscription())
                  <div class="btn btn-primary btn-block la-btn__white py-3 mb-3 plan-subscribe text-capitalize" data-plan={{ $slug }}>View Billing</div>
                @else
                  <div class="btn btn-primary  btn-block la-btn__white py-3 mb-3 plan-subscribe text-capitalize" data-plan={{ $slug }}>Try it now</div>
                @endif

                  <div class="btn btn-primary  btn-block la-btn la-btn--primary active py-3 plan-subscribe text-capitalize">Subscribe Now!</div>
                {{-- <a> --}}
                <!--<p class="text-sm pt-2">Get access to all the Courses</p> -->
                
                {{--<p class="la-choose__subscribe-date text-sm mb-1">You won't be charged until {{ \Carbon\Carbon::now()->addDays(7)->format('M d, Y') }}</p>--}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>





