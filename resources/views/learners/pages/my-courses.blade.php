@extends('learners.layouts.app')

@section('content')
<section class="la-cbg--main la-section">
    <!-- Section Ongoing: Start-->
    <section class=" la-section__small">
      <div class="la-section__inner">
        <!-- Alert Message-->
        <div id="wishlist_alert_div" class="container"></div> 
        <div class="container">
          <div class="col-12 la-anim__wrap">
            <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="{{URL::previous()}}"></a>
            <h1 class="la-mycourses__title text-4xl mb-8 la-anim__stagger-item">My Courses</h1>
            <!-- Global Search: Start-->
            <div class="la-gsearch la-anim__stagger-item">
              <form class="form-inline" action="{{ url('/search-course/') }}">
                <div class="form-group ">
                  <input class="la-gsearch__input form-control w-100" style="background:transparent" type="text" name="course_name" placeholder="Search course or class">
                </div>
                <button class="la-gsearch__submit btn" type="submit"><i class="la-icon la-icon--3xl icon icon-search"></i></button>
              </form>
            </div>
            <!-- Global Search: End-->
          </div>
          <div class="col-12 d-flex justify-content-between align-items-center mb-8 la-anim__wrap ">
            <div class="la-mycourses__subtitle text-2xl head-font la-anim__stagger-item--x">Ongoing</div>
             <!-- Filters : Start -->
             <div class="la-courses__nav-filters d-flex align-items-start">
              <div class="la-courses__nav-props">
                <a class="la-icon--3xl icon-list-layout la-courses__nav-filter d-none d-lg-block mr-3" id="showLayout" role="button"></a>
              </div>
              <div class="la-courses__nav-props">
                <a class="la-icon--3xl icon-sort la-courses__nav-filter d-none d-lg-block mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                <!-- Sort Courses Dropdown -->
                <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses"  style="border:none !important;">
                  <div class="la-form__input-wrap px-5">
                      <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                      <div class=" pt-2">
                          <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular">
                                <label class="d-flex align-items-center text-sm" for="most_popular"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated">
                              <label class="d-flex align-items-center text-sm" for="highest_rated"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest">
                              <label class="d-flex align-items-center text-sm" for="latest"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                          </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="la-courses__nav-props">
                <a class="la-icon--3xl icon-filter la-courses__nav-filter d-none d-lg-block" id="filteredCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                  <!-- Filter Courses Dropdown -->
                  <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="filteredCourses"  style="border:none !important;">
                      <div class="la-form__input-wrap px-5">
                          <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                          <div class="form-group pt-2">
                            <label class="glabel-main" > Course Duration</label>
                            <label class="glabel d-flex" for="dur_hr">
                              <input class="d-none" id="dur_hr" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">less than an hr</div>
                            </label>

                            <label class="glabel d-flex" for="dur_hrs">
                              <input class="d-none" id="dur_hrs" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">1 hr - 5 hr</div>
                            </label>

                            <label class="glabel d-flex" for="dur_more">
                              <input class="d-none" id="dur_more" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">more than 5 hrs</div>
                            </label>
                          </div>

                          <div class="form-group pt-2">
                            <label class="glabel-main" > Category</label>
                            <label class="glabel d-flex" for="course_1">
                              <input class="d-none" id="course_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Tattoo 
                                  <ul class="d-flex flex-column">
                                    <li>
                                      <label class="glabel d-flex pt-1" for="sub_course_1">
                                        <input class="d-none" id="sub_course_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">Abstract</div>
                                      </label>
                                    </li>

                                    <li>
                                      <label class="glabel d-flex" for="sub_course_2">
                                        <input class="d-none" id="sub_course_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">3D Tattoo</div>
                                      </label>
                                    </li>

                                    <li>
                                      <label class="glabel d-flex" for="sub_course_3">
                                        <input class="d-none" id="sub_course_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">Blast Over</div>
                                      </label>
                                    </li>
                                  </ul>
                                </div>
                            </label>

                            <label class="glabel d-flex" for="course_2">
                              <input class="d-none" id="course_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Design</div>
                            </label>

                            <label class="glabel d-flex" for="course_3">
                              <input class="d-none" id="course_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Photography</div>
                            </label>
                          </div>

                          <div class="form-group pt-2">
                            <label class="glabel-main" > Language</label>
                            <label class="glabel d-flex" for="lang_1">
                              <input class="d-none" id="lang_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">English</div>
                            </label>

                            <label class="glabel d-flex" for="lang_2">
                              <input class="d-none" id="lang_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Hindi</div>
                            </label>

                            <label class="glabel d-flex" for="lang_3">
                              <input class="d-none" id="lang_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Japanese</div>
                            </label>
                          </div>

                          <div class="form-group pt-2">
                            <label class="glabel-main" >Level</label>
                            <label class="glabel d-flex" for="level_1">
                              <input class="d-none" id="level_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Beginner</div>
                            </label>

                            <label class="glabel d-flex" for="level_2">
                              <input class="d-none" id="level_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Intermediate</div>
                            </label>

                            <label class="glabel d-flex" for="level_3">
                              <input class="d-none" id="level_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Advanced</div>
                            </label>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
          </div>
          
          <x-add-to-playlist 
                      :playlists="$playlists"
          />
          <div class="col-12 la-anim__wrap">
            
              @if(count($courses) != 0)
                <div class="row row-cols-lg-3 ">
                  @foreach($courses as $course)
                  
                  <x-course 
                      :id="$course->course->id"
                      :img="$course->course->preview_image" 
                      :course="$course->course->title" 
                      :url="$course->course->slug" 
                      :rating="$course->course->review->avg('rating')"
                      :creatorImg="$course->course->user->img"
                      :creatorName="$course->course->user->fullName"
                      :creatorUrl="$course->course->user->id"
                    />
                  @endforeach
                </div>
              @else
                <div class="la-empty__courses d-md-flex justify-content-between align-items-start ">
                    <div class="la-empty__inner">
                        <h6 class="la-empty__course-title pb-2 la-anim__stagger-item">No Courses</h6>
                        <p class="la-empty__course-desc m-0 la-anim__stagger-item">You have not finished any course yet.</p>
                    </div>
                    <div class="la-empty__browse-courses">
                        <a href="/browse/courses" class="la-empty__browse la-anim__stagger-item">
                            Browse Courses
                            <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow la-anim__stagger-item--x"></span>
                        </a>
                    </div>
                </div> 
              @endif

          </div>
        </div>
      </div>
    </section>
    <!-- Section Ongoing: End-->
    <!-- Section Yet to Start: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <div class="container la-anim__wrap">
          <div class="col-12 d-flex justify-content-between mb-6 la-anim__stagger-item--x">
            <div class="la-mycourses__subtitle text-2xl head-font ">Yet to Start</div>
             <!-- Filters : Start -->
             <div class="la-courses__nav-filters d-flex align-items-start">
              <div class="la-courses__nav-props">
                <a class="la-icon--3xl icon-list-layout la-courses__nav-filter d-none d-lg-block mr-3" id="showLayout" role="button"></a>
              </div>
              <div class="la-courses__nav-props">
                <a class="la-icon--3xl icon-sort la-courses__nav-filter d-none d-lg-block mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                <!-- Sort Courses Dropdown -->
                <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses"  style="border:none !important;">
                  <div class="la-form__input-wrap px-5">
                      <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                      <div class=" pt-2">
                          <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular">
                                <label class="d-flex align-items-center text-sm" for="most_popular"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated">
                              <label class="d-flex align-items-center text-sm" for="highest_rated"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest">
                              <label class="d-flex align-items-center text-sm" for="latest"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                          </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="la-courses__nav-props">
                <a class="la-icon--3xl icon-filter la-courses__nav-filter d-none d-lg-block" id="filteredCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                  <!-- Filter Courses Dropdown -->
                  <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="filteredCourses"  style="border:none !important;">
                      <div class="la-form__input-wrap px-5">
                          <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                          <div class="form-group pt-2">
                            <label class="glabel-main" > Course Duration</label>
                            <label class="glabel d-flex" for="dur_hr">
                              <input class="d-none" id="dur_hr" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">less than an hr</div>
                            </label>

                            <label class="glabel d-flex" for="dur_hrs">
                              <input class="d-none" id="dur_hrs" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">1 hr - 5 hr</div>
                            </label>

                            <label class="glabel d-flex" for="dur_more">
                              <input class="d-none" id="dur_more" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">more than 5 hrs</div>
                            </label>
                          </div>

                          <div class="form-group pt-2">
                            <label class="glabel-main" > Category</label>
                            <label class="glabel d-flex" for="course_1">
                              <input class="d-none" id="course_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Tattoo 
                                  <ul class="d-flex flex-column">
                                    <li>
                                      <label class="glabel d-flex pt-1" for="sub_course_1">
                                        <input class="d-none" id="sub_course_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">Abstract</div>
                                      </label>
                                    </li>

                                    <li>
                                      <label class="glabel d-flex" for="sub_course_2">
                                        <input class="d-none" id="sub_course_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">3D Tattoo</div>
                                      </label>
                                    </li>

                                    <li>
                                      <label class="glabel d-flex" for="sub_course_3">
                                        <input class="d-none" id="sub_course_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">Blast Over</div>
                                      </label>
                                    </li>
                                  </ul>
                                </div>
                            </label>

                            <label class="glabel d-flex" for="course_2">
                              <input class="d-none" id="course_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Design</div>
                            </label>

                            <label class="glabel d-flex" for="course_3">
                              <input class="d-none" id="course_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Photography</div>
                            </label>
                          </div>

                          <div class="form-group pt-2">
                            <label class="glabel-main" > Language</label>
                            <label class="glabel d-flex" for="lang_1">
                              <input class="d-none" id="lang_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">English</div>
                            </label>

                            <label class="glabel d-flex" for="lang_2">
                              <input class="d-none" id="lang_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Hindi</div>
                            </label>

                            <label class="glabel d-flex" for="lang_3">
                              <input class="d-none" id="lang_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Japanese</div>
                            </label>
                          </div>

                          <div class="form-group pt-2">
                            <label class="glabel-main" >Level</label>
                            <label class="glabel d-flex" for="level_1">
                              <input class="d-none" id="level_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Beginner</div>
                            </label>

                            <label class="glabel d-flex" for="level_2">
                              <input class="d-none" id="level_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Intermediate</div>
                            </label>

                            <label class="glabel d-flex" for="level_3">
                              <input class="d-none" id="level_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Advanced</div>
                            </label>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
          </div>
            <div class="col-12">
                <div class="la-empty__courses d-md-flex justify-content-between align-items-start ">
                  <div class="la-empty__inner">
                      <h6 class="la-empty__course-title pb-2 la-anim__stagger-item">No Courses</h6>
                      <p class="la-empty__course-desc m-0 la-anim__stagger-item">You have not finished any course yet.</p>
                  </div>
                  <div class="la-empty__browse-courses">
                      <a href="/browse/courses" class="la-empty__browse la-anim__stagger-item">
                          Browse Courses
                          <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow la-anim__stagger-item--x"></span>
                      </a>
                  </div>
              </div> 
        </div>
      </div>
    </section>
    <!-- Section Yet to Start: End-->
    <!-- Section Completed: Start-->
    <section class="la-section__small">
      <div class="la-section__inner">
        <div class="container la-anim__wrap">
          <div class="col-12 d-flex justify-content-between mb-6 la-anim__stagger-item--x">
            <div class="la-mycourses__subtitle text-2xl head-font">Completed</div>
             <!-- Filters : Start -->
             <div class="la-courses__nav-filters d-flex align-items-start">
              <div class="la-courses__nav-props">
                <a class="la-icon--3xl icon-list-layout la-courses__nav-filter d-none d-lg-block mr-3" id="showLayout" role="button"></a>
              </div>
              <div class="la-courses__nav-props">
                <a class="la-icon--3xl icon-sort la-courses__nav-filter d-none d-lg-block mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                <!-- Sort Courses Dropdown -->
                <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses"  style="border:none !important;">
                  <div class="la-form__input-wrap px-5">
                      <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                      <div class=" pt-2">
                          <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular">
                                <label class="d-flex align-items-center text-sm" for="most_popular"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated">
                              <label class="d-flex align-items-center text-sm" for="highest_rated"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest">
                              <label class="d-flex align-items-center text-sm" for="latest"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                          </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="la-courses__nav-props">
                <a class="la-icon--3xl icon-filter la-courses__nav-filter d-none d-lg-block" id="filteredCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                  <!-- Filter Courses Dropdown -->
                  <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="filteredCourses"  style="border:none !important;">
                      <div class="la-form__input-wrap px-5">
                          <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                          <div class="form-group pt-2">
                            <label class="glabel-main" > Course Duration</label>
                            <label class="glabel d-flex" for="dur_hr">
                              <input class="d-none" id="dur_hr" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">less than an hr</div>
                            </label>

                            <label class="glabel d-flex" for="dur_hrs">
                              <input class="d-none" id="dur_hrs" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">1 hr - 5 hr</div>
                            </label>

                            <label class="glabel d-flex" for="dur_more">
                              <input class="d-none" id="dur_more" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">more than 5 hrs</div>
                            </label>
                          </div>

                          <div class="form-group pt-2">
                            <label class="glabel-main" > Category</label>
                            <label class="glabel d-flex" for="course_1">
                              <input class="d-none" id="course_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Tattoo 
                                  <ul class="d-flex flex-column">
                                    <li>
                                      <label class="glabel d-flex pt-1" for="sub_course_1">
                                        <input class="d-none" id="sub_course_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">Abstract</div>
                                      </label>
                                    </li>

                                    <li>
                                      <label class="glabel d-flex" for="sub_course_2">
                                        <input class="d-none" id="sub_course_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">3D Tattoo</div>
                                      </label>
                                    </li>

                                    <li>
                                      <label class="glabel d-flex" for="sub_course_3">
                                        <input class="d-none" id="sub_course_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                                        <div class="pl-2 mt-n1">Blast Over</div>
                                      </label>
                                    </li>
                                  </ul>
                                </div>
                            </label>

                            <label class="glabel d-flex" for="course_2">
                              <input class="d-none" id="course_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Design</div>
                            </label>

                            <label class="glabel d-flex" for="course_3">
                              <input class="d-none" id="course_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Photography</div>
                            </label>
                          </div>

                          <div class="form-group pt-2">
                            <label class="glabel-main" > Language</label>
                            <label class="glabel d-flex" for="lang_1">
                              <input class="d-none" id="lang_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">English</div>
                            </label>

                            <label class="glabel d-flex" for="lang_2">
                              <input class="d-none" id="lang_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Hindi</div>
                            </label>

                            <label class="glabel d-flex" for="lang_3">
                              <input class="d-none" id="lang_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Japanese</div>
                            </label>
                          </div>

                          <div class="form-group pt-2">
                            <label class="glabel-main" >Level</label>
                            <label class="glabel d-flex" for="level_1">
                              <input class="d-none" id="level_1" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Beginner</div>
                            </label>

                            <label class="glabel d-flex" for="level_2">
                              <input class="d-none" id="level_2" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Intermediate</div>
                            </label>

                            <label class="glabel d-flex" for="level_3">
                              <input class="d-none" id="level_3" type="checkbox" name=""><span class="gcheck position-relative"><div class="gcheck-icon la-icon icon-tick text-xs position-absolute"></div></span>
                              <div class="pl-2 mt-n1">Advanced</div>
                            </label>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
          </div>
            <div class="col-12">
              <div class="la-empty__courses d-md-flex justify-content-between align-items-start ">
                <div class="la-empty__inner">
                    <h6 class="la-empty__course-title pb-2 la-anim__stagger-item">No Courses</h6>
                    <p class="la-empty__course-desc m-0 la-anim__stagger-item">You have not finished any course yet.</p>
                </div>
                <div class="la-empty__browse-courses">
                    <a href="/browse/courses" class="la-empty__browse la-anim__stagger-item">
                        Browse Courses
                        <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow la-anim__stagger-item--x"></span>
                    </a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Completed: End-->
  </section>
@endsection