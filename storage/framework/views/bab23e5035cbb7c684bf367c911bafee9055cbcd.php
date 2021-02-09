<?php $__env->startSection('content'); ?>
<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <!-- Alert Message -->
        <?php if(session('message')): ?>
          <div class="la-btn__alert position-relative">
            <div class="la-btn__alert-success col-lg-4 offset-lg-4  alert alert-success alert-dismissible fade show" role="alert">
              <span class="la-btn__alert-msg"><?php echo e(session('message')); ?></span>
              <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="color:#56188C">&times;</span>
              </button>
            </div>
          </div>
        <?php endif; ?>
        <!-- Wishlist Alert Message -->
        <div id="wishlist_alert_div"></div> 
        
        <a class="la-icon la-icon--5xl icon-back-arrow ml-n1 mt-n2 mb-5 d-block d-md-none" href="<?php echo e(URL::previous()); ?>"></a> 
        
        <div class="d-flex justify-content-between position-relative">  
          <a href="<?php echo e(URL::previous()); ?>" class="la-vcreator__back d-none d-md-block" style="top:-6px"><span class="la-icon la-icon--5xl icon-back-arrow"></span></a>
          <h1 class="la-page__title mb-8">Search Courses</h1>
        </div>

        <div class="d-flex justify-content-between align-items-start">
            <!-- Global Search: Start-->
            <div class="la-gsearch mb-0">
              <form class="form-inline "  action="<?php echo e(url('/search-course/')); ?>">
                <div class="form-group d-flex align-items-center">
                  <input class="la-gsearch__input form-control la-gsearch__input-searchcourses" style=" background:transparent" value="<?php echo e($search_input); ?>" name="course_name" type="text" placeholder="What you want to learn today?">
                  <button class="la-gsearch__submit btn mt-0" type="submit"><i class="la-icon icon icon-search la-gsearch__input-icon"></i></button>
                </div>
              </form>
            </div>
            <!-- Global Search: End-->

            <!-- Filters : Start -->
           <div class="la-courses__nav-filters d-flex align-items-start ml-6">
              <div class="la-courses__nav-props ">
                <a class="la-icon icon-list-layout la-courses__nav-filter mr-3 " id="showLayout" role="button"></a>
              </div>
              <div class="la-courses__nav-props">
                <a class="la-icon icon-sort la-courses__nav-filter  mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
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
                <!-- filter div -->
                <div class="la-courses__nav-filterprops">
                <a class="la-icon icon-filter la-courses__nav-filter " id="filteredCourses"  role="button"></a>

                  <!-- Filter Courses Dropdown -->
                  <div class="la-courses__nav-filterdropdown" id="filtered_sidebar">
                      <div class="la-form__input-wrap px-5">
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-3 text-dark">Filter by</div>
                            <button class="la-courses__nav-filterclose close text-4xl mt-1" type="button" id="filter_close">&times;</button>
                          </div>

                            <form action="<?php echo e(url()->current()); ?>" method="get" id="filter_form">
                                <input type="hidden" name="categories" id="filter_categories" value="<?php echo e(implode(',',$selected_categories)); ?>"/>
                                <input type="hidden" name="sub_categories" id="filter_sub_categories" value="<?php echo e(implode(',',$selected_subcategories)); ?>"/>
                                <input type="hidden" name="languages" id="filter_languages" value="<?php echo e(implode(',',$selected_languages)); ?>"/>
                                <input type="hidden" name="level" id="filter_level" value="<?php echo e(implode(',',$selected_level)); ?>"/>
                                <input type="hidden" name="filters" value="applied" />

                                
                                <div class="form-group pt-2">
                                  <div class="glabel-main mb-1"> Course Duration</div>
                                    <div class="glabel d-flex  align-items-center m-0">
                                        <input class="la-form__radio d-none la-vcourse__purchase-input" type="radio" name="duration" id="lessthan1" value="lessthan1">
                                        <label class="d-flex align-items-center" for="lessthan1">
                                          <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center" for="lessthan1"></span>
                                          <strong class="pl-2" style="color:var(--gray6);opacity:1;"> Less than an hr</strong>
                                        </label>
                                    </div>

                                    <div class="glabel d-flex  align-items-center m-0">
                                        <input class="la-form__radio d-none la-vcourse__purchase-input" type="radio" name="duration" id="lessthan5" value="lessthan5">
                                        <label class="d-flex align-items-center" for="lessthan5">
                                          <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center" for="lessthan5"></span>
                                          <strong class="pl-2" style="color:var(--gray6);opacity:1;">  1hr - 5hrs</strong>
                                        </label>
                                    </div>

                                    <div class="glabel d-flex  align-items-center m-0">
                                        <input class="la-form__radio d-none la-vcourse__purchase-input" type="radio" name="duration" id="morethan5" value="morethan5">
                                        <label class="d-flex align-items-center" for="morethan5">
                                          <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex  justify-content-center align-items-center" for="morethan5"></span>
                                          <strong class="pl-2" style="color:var(--gray6);opacity:1;"> More than 5hrs</strong>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group pt-2">
                                  <div class="glabel-main mb-2"> Category</div>
                                    <?php $__currentLoopData = $filter_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <label class="glabel d-flex" for="course_<?php echo e($c->id); ?>">
                                        <input class="d-none" type="checkbox" id="course_<?php echo e($c->id); ?>" <?php if(in_array($c->id, $selected_categories)): ?> checked <?php endif; ?> onclick="addToCategory(<?php echo e($c->id); ?>)" value="<?php echo e($c->id); ?>">
                                        <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                        <span class="pl-2 mt-n1 text-capitalize"><?php echo e($c->title); ?> </span>
                                      </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="form-group pt-2">
                                  <div class="glabel-main mb-2"> Language</div>
                              
                                  <?php $__currentLoopData = $langauges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="glabel d-flex" for="lang_<?php echo e($l->id); ?>">
                                      <input class="d-none" id="lang_<?php echo e($l->id); ?>" <?php if(in_array($l->id, $selected_languages)): ?> checked <?php endif; ?> type="checkbox" onclick="addToLanguage(<?php echo e($l->id); ?>)" value="<?php echo e($l->id); ?>">
                                      <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                      <span class="pl-2 mt-n1 text-capitalize"><?php echo e($l->name); ?></span>
                                    </label>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              
                                </div>

                                <div class="form-group pt-2">
                                  <div class="glabel-main mb-2">Level</div>
                                  <label class="glabel d-flex" for="level_1">
                                    <input class="d-none" id ="level_1" type="checkbox" name="" onclick="addToLevel(1)" <?php if(in_array(1, $selected_level)): ?> checked <?php endif; ?>>
                                    <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                    <span class="pl-2 mt-n1">Beginner</span>
                                  </label>

                                  <label class="glabel d-flex" for="level_2">
                                    <input class="d-none" id="level_2"  type="checkbox" name="" onclick="addToLevel(2)" <?php if(in_array(2, $selected_level)): ?> checked <?php endif; ?>>
                                    <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                    <span class="pl-2 mt-n1">Intermediate</span>
                                  </label>

                                  <label class="glabel d-flex" for="level_3">
                                    <input class="d-none" id="level_3"  type="checkbox" name="" onclick="addToLevel(3)" <?php if(in_array(3, $selected_level)): ?> checked <?php endif; ?>>
                                    <span class="gcheck position-relative"><span class="gcheck-icon la-icon icon-tick text-xs position-absolute"></span></span>
                                    <span class="pl-2 mt-n1">Advanced</span>
                                  </label>
                                </div>

                                <button onclick="$('#filter_form').submit()" class="la-btn la-btn__secondary bg-transparent text-uppercase text-center py-3 mt-6">Apply</button> 
                            </form>
                      </div>
                  </div>
                </div>
                </div>
                <!-- Filters : End -->
                </div>
                <!-- filter div : END -->


        <div class="la-courses py-4 py-md-10">
             
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.add-to-playlist','data' => ['playlists' => $playlists]]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['playlists' => $playlists]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                  <!-- Add to Playlist Modal -->
                                
                <?php if(count($courses) > 0): ?>
                    <div class="la-anim__wrap">
                      <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item">
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                           <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => $course->review->avg('rating'),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fname,'creatorUrl' => $course->user->id,'learnerCount' => $course->learnerCount]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706)): ?>
<?php $component = $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706; ?>
<?php unset($__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      </div> 
                    </div>                
                <?php endif; ?>

                
                <?php if(count($courses) == 0): ?>
                <div class="col-12 px-0 la-anim__wrap">
                  <div class="la-empty__courses d-md-flex justify-content-between align-items-center la-anim__stagger-item">
                        <div class="la-empty__inner">
                            <h6 class="la-empty__course-title la-anim__stagger-item">No Courses Found.</h6>
                        </div>
                        <div class="la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
                            <a href="<?php echo e(Url('/browse/courses')); ?>" class="la-empty__browse">
                                Browse Courses
                                <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow"></span>
                            </a>
                        </div>
                    </div>
                  </div>
                <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('footerScripts'); ?>
      <script>
          $('input[type=radio][name=sort_by]').change(function() {
             window.location.href= '<?php echo e(url()->current()); ?>?sort_by='+this.value;

          });
      </script>
  <?php $__env->stopSection(); ?>
  
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/search_courses.blade.php ENDPATH**/ ?>