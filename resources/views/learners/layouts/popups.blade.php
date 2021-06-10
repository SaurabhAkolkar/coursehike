 <!-- ==== Popup Section: Start ===== -->
 <section>
    <div class="container">
        <div class="row">
             <!-- Locked Login Popup: Start -->
            <div class="col-12">
                <!-- <a class="" data-toggle="modal" data-target="#locked_login">Locked Course Login</a>-->        
                <div class="modal fade  la-locked__modal" id="locked_login_modal">
                    <div class="modal-dialog  la-locked__modal-dialog">
                        <div class="modal-content  la-locked__modal-content px-6">
                            <div class="modal-header  la-locked__modal-header">
                                <button type="button" class="close text-4xl" data-dismiss="modal">&times;</button> <br/>
                            </div>
                                    
                            <div class="modal-body  la-locked__modal-body text-center">
                                <h5 class="modal-title la-locked__modal-title ">Login Required</h5>
                                <img src="/images/learners/status/locked-login.svg" data-src="/images/learners/status/locked-login.svg" alt="Login" class="lazy img-fluid mx-auto d-block la-locked__modal-img" />
                                <p class="la-locked__modal-desc px-md-6">Please login & subscribe to gain full access to courses.</p>
                                <a href="/login" class="la-btn__app py-3 btn btn-block w-100 la-locked__modal-btn" role="button">Login</a>

                                <div class="la-locked__modal-register pt-3">
                                    <span class="la-locked__modal-info pr-1">Don't have an account?</span>
                                    <a href="/register" role="button" class="la-locked__modal-link">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Locked Login Popup: End -->

            <!-- Locked Subscribe Popup: Start -->
            <div class="col-12">
                <!--<a class="" data-toggle="modal" data-target="#locked_subscribe">Locked Course Subscribe</a> -->
                <div class="modal fade  la-locked__modal" id="locked_subscribe">
                    <div class="modal-dialog  la-locked__modal-dialog">
                        <div class="modal-content  la-locked__modal-content px-6">
                            <div class="modal-header  la-locked__modal-header">
                                <button type="button" class="close text-4xl" data-dismiss="modal">&times;</button> <br/>
                            </div>
                                    
                            <div class="modal-body  la-locked__modal-body text-center">
                                <h5 class="modal-title la-locked__modal-title ">Subscription Required!</h5>
                                <img src="/images/learners/status/locked-subscribe.svg" data-src="/images/learners/status/locked-subscribe.svg" alt="Subscribe" class="lazy img-fluid mx-auto d-block la-locked__modal-img" />
                                <p class="la-locked__modal-desc">Please subscribe & continue to enjoy courses from you favourite mentors.</p>
                                <a href="/learning-plans" class="la-btn__app py-3 w-100 btn btn-block la-locked__modal-btn" role="button">Subscribe Now</a>

                                <div class="la-locked__modal-register pt-3">
                                    <span class="la-locked__modal-info pr-1">We have differents plans for you, check</span> <br/>
                                    <a href="/learning-plans" role="button" class="la-locked__modal-link">Learning Plans</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       
            </div>
             <!-- Locked Subscribe Popup: End -->


            <!-- Locked Signup Popup: Start -->
            <div class="col-12">
                <!--<a class="" data-toggle="modal" data-target="#locked_trial">Locked Course Signup</a>-->     
                <div class="modal fade  la-locked__modal" id="locked_trial">
                    <div class="modal-dialog  la-locked__modal-dialog">
                        <div class="modal-content  la-locked__modal-content px-6">
                            <div class="modal-header  la-locked__modal-header">
                                <button type="button" class="close text-4xl" data-dismiss="modal">&times;</button> <br/>
                            </div>
                                    
                            <div class="modal-body  la-locked__modal-body text-center">
                                <h5 class="modal-title la-locked__modal-title ">We have a gift for you!</h5>
                                <img src="/images/learners/status/locked-signup.svg" data-src="/images/learners/status/locked-signup.svg" alt="Gift for You" class="lazy img-fluid mx-auto d-block la-locked__modal-img" />
                                <p class="la-locked__modal-desc px-4 px-md-14">Access premium courses for free for first 7 days.</p>

                                <a class="la-btn__app py-3 w-100 btn btn-block la-locked__modal-btn" role="button" href="/register">Signup Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Locked Signup Popup: End -->


            <!-- Learners Terms of Use Popup: Start -->
            <div class="col-12">
                 {{-- <a class="" data-toggle="modal" data-target="#learners_terms">Learner Terms of Use</a> --}}
                <div class="modal fade  la-locked__modal" id="learners_terms">
                    <div class="modal-dialog  la-locked__modal-dialog">
                        <div class="modal-content la-locked__modal-content px-6">
                            <div class="modal-header  la-locked__modal-header d-flex align-items-center mb-3">
                                <h5 class="modal-title la-locked__modal-title ">Terms of Use</h5>
                                <button type="button" class="close text-4xl" data-dismiss="modal">&times;</button> <br/>
                            </div>
                                    
                            <div class="modal-body  la-locked__modal-body px-0 pb-0">
                                <p class="la-locked__modal-desc">We have updated our 
                                    <a role="button" class="la-entry__terms-creator" href="/terms-conditions" style="color:#498BE3;font-weight:var(--font-normal);text-decoration: underline">Terms of Use.</a><br/>
                                    Please accept the Terms and Conditions to Proceed.
                                </p>

                                <div class="form-group pt-3 mb-6">
                                    <label class="d-flex justify-content-start" for="learners_terms_popup">
                                      <input type="checkbox" class="d-none" id="learners_terms_popup" name="learners_terms_popup">
                                      <span class="gcheck position-relative" style="opacity: 1">
                                        <div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div>
                                      </span>
                                      <div class="pl-2 mt-n1 text-sm la-entry__terms" style="color:var(--gray6);opacity:1" >
                                        I have read & agree to the 
                                        <a href="/terms-conditions" class="la-entry__terms-creator" title="Read the Terms & Conditions">terms of use</a>
                                      </div>
                                    </label>
                                </div>

                                <div class="col-6 col-md-5 px-0 ml-auto mt-8 mt-md-10">
                                    <a class="la-btn__app active text-white color-black py-2 btn btn-block la-locked__modal-btn" role="button" style="font-weight:var(--font-medium);">Submit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Learners Terms of Use Popup: End -->


            <!-- Refer a Friend Popup Before Login: Start -->
            <div class="col-12">
                {{-- <a class="" data-toggle="modal" data-target="#refer_a_friend">Refer a Friend</a> --}}
                <div class="modal fade  la-locked__modal" id="refer_a_friend">
                    <div class="modal-dialog  la-locked__modal-dialog">
                        <div class="modal-content  la-locked__modal-content px-6">
                            <div class="modal-header  la-locked__modal-header">
                                <button type="button" class="close text-4xl" data-dismiss="modal">&times;</button> <br/>
                            </div>
                                    
                            <div class="modal-body  la-locked__modal-body text-center">
                                <h5 class="modal-title la-locked__modal-title ">Refer a friend</h5>
                                <p class="text-sm" style="color:var(--orange);">You will get 1 month free access!</p>
                                <img src="/images/learners/status/referal.svg" data-src="/images/learners/status/referal.svg" alt="Refer a Friend" class="lazy img-fluid mx-auto d-block la-locked__modal-img" />
                                <p class="la-locked__modal-desc text-xs">You get 1 month free access to all classes when your friend makes first payment.</p>

                                <a class="la-btn__app py-3 w-100 btn btn-block la-locked__modal-btn" role="button" href="/login">Login</a>
                            
                                <div class="la-locked__modal-register pt-3">
                                    <span class="la-locked__modal-info pr-1">Don't have an account?</span>
                                    <a href="/register" role="button" class="la-locked__modal-link">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Refer a Friend Popup Before Login: End -->


            <!-- Refer a Friend Popup After Login: Start -->
            <div class="col-12">
                {{-- <a class="" data-toggle="modal" data-target="#referal_share_link">Share Referal Link</a> --}}
                <div class="modal fade  la-locked__modal" id="referal_share_link">
                    <div class="modal-dialog  la-locked__modal-dialog">
                        <div class="modal-content  la-locked__modal-content px-6">
                            <div class="modal-header  la-locked__modal-header">
                                <button type="button" class="close text-4xl" data-dismiss="modal">&times;</button> <br/>
                            </div>
                                    
                            <div class="modal-body la-locked__modal-body text-center py-0 ">
                                <h5 class="modal-title la-locked__modal-title ">Refer a friend</h5>
                                <p class="text-sm" style="color:var(--orange);">You will get 1 month free access!</p>
                                <img src="/images/learners/status/referal.svg" data-src="/images/learners/status/referal.svg" alt="Refer a Friend" class="lazy img-fluid mx-auto d-block la-locked__modal-img" />
                                <p class="la-locked__modal-desc text-xs">You get 1 month free access to all classes when your friend makes first payment.</p>

                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="la-form__input la-form__input-border form-control text-sm" name="referal_link" id="referal_link" value="https://lila.art/referral/JS0987yu" />
                                        <div class="input-group-append">
                                            <button type="button" class="input-group-btn btn btn-outline-light bg-transparent la-form__input-btn">
                                                <span class="la-icon la-icon--lg icon-portfolio-link"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <p class="la-locked__modal-desc mb-1">Share on Social Media</p>
                                    
                                    <a href="" role="button">
                                        <span class="la-icon la-icon--4xl icon-whatsapp"></span>
                                    </a>

                                    <a href="" role="button">
                                        <span class="la-icon la-icon--4xl icon-facebook-colored"></span>
                                    </a>
                                    <a href="" role="button">
                                        <span class="la-icon la-icon--4xl icon-linkedin-colored"></span>
                                    </a>
                                    <a href="" role="button">
                                        <span class="la-icon la-icon--4xl icon-twitter"></span>
                                    </a>
                                    <a href="" role="button">
                                        <span class="la-icon la-icon--4xl icon-pinterest"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Refer a Friend Popup After Login: End -->


             <!-- Referral Successful Popup: Start -->
             <div class="col-12">
                {{-- <a class="" data-toggle="modal" data-target="#refer_success">Referral - Congratulations</a> --}}
                <div class="modal fade  la-locked__modal" id="refer_success">
                    <div class="modal-dialog  la-locked__modal-dialog">
                        <div class="modal-content  la-locked__modal-content px-6">
                            <div class="modal-header  la-locked__modal-header">
                                <button type="button" class="close text-4xl" data-dismiss="modal">&times;</button> <br/>
                            </div>
                                    
                            <div class="modal-body  la-locked__modal-body text-center py-0">
                                <h5 class="modal-title la-locked__modal-title ">Congratulations!</h5>
                                <p class="la-locked__modal-desc text-sm">You get free access to all courses for 1 month (from start - end date)</p>
                                <img src="/images/learners/status/rewards.svg" data-src="/images/learners/status/rewards.svg" alt="Referal Successful" class="lazy img-fluid mx-auto d-block la-locked__modal-img" />
                                <p class="la-locked__modal-desc text-xs">A person you referred completed registration.</p>

                                <a class="la-btn__app py-3 w-100 btn btn-block la-locked__modal-btn" role="button" href="/">Send another Referral</a>
                            
                                <div class="la-locked__modal-register pt-3">
                                    <span class="la-locked__modal-info pr-1">Want to continue learning?</span>
                                    <a href="/login" role="button" class="la-locked__modal-link">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Referral Successful Popup: End -->


        </div>
    </div>
</section>
<!-- ===== Popup Section: End ====== -->