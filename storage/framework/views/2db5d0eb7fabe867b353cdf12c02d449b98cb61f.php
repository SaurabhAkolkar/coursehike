<!-- Playlist Alert Message-->
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

<!-- Wishlist Alert Message-->
<div id="wishlist_alert_div"></div> 
<?php $__env->startSection('content'); ?>

<section class="la-section__small la-cbg--main">
    <div class="la-section__inner">
      <div class="container">
        <div class="la-anim__wrap">  
          <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5 la-anim__stagger-item--x" href="<?php echo e(URL::previous()); ?>"></a>
          <h1 class="la-page__title mb-8 la-anim__stagger-item">Browse Courses</h1>
        </div>
        
        <div class="d-flex justify-content-between align-items-start ">
            <!-- Global Search: Start-->
            <div class="la-gsearch la-anim__wrap">
              <form class="form-inline m-0 la-anim__stagger-item"  action="<?php echo e(url('/search-course/')); ?>">
                <div class="form-group d-flex align-items-center">
                  <input class="la-gsearch__input form-control la-gsearch__input-searchcourses " style="background:transparent" name="course_name" type="text" placeholder="What can we interest you in learning today?">
                  <button class="la-gsearch__submit btn mt-0" type="submit"><i class="la-icon icon icon-search la-gsearch__input-icon"></i></button>
                </div>
              </form>
            </div>
            <!-- Global Search: End-->

              <!-- Filters : Start -->
            <div class="la-courses__nav-filters  d-flex align-items-start ml-6 ">
              <!-- <div class="la-courses__nav-props">
                <a class="la-icon icon-list-layout la-courses__nav-filter  mr-3" id="showLayout" role="button"></a>
              </div> -->
              <div class="la-courses__nav-props ">
                <a class="la-icon icon-sort la-courses__nav-filter  mr-3" id="sortCourses" data-toggle="dropdown" href="javascript:void(0);" role="button"></a>
                <!-- Sort Courses Dropdown -->
                <div class="dropdown-menu dropdown-menu-right la-header__dropdown-menu" aria-labelledby="sortCourses"  style="border:none !important;">
                  <div class="la-form__input-wrap px-5">
                      <div class="la-form__lable la-form__lable--medium mb-2 text-md pt-2 text-dark">Sort by</div>
                      <div class=" pt-2">
                          <div class="la-form__radio-wrap mr-5">
                                <input class="la-form__radio d-none" type="radio" value="most_popular" name="sort_by" id="most_popular" <?php if($sort_type =='most_popular'): ?> checked <?php endif; ?>>
                                <label class="la-form__radio-filterlabel d-flex align-items-center text-sm" for="most_popular"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Most Popular</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="highest_rated" name="sort_by" id="highest_rated" <?php if($sort_type =='highest_rated'): ?> checked <?php endif; ?>>
                              <label class="la-form__radio-filterlabel d-flex align-items-center text-sm" for="highest_rated"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Highest Rated</span></label>
                          </div>
                          <div class="la-form__radio-wrap mr-5">
                              <input class="la-form__radio d-none" type="radio" value="latest" name="sort_by" id="latest" <?php if($sort_type =='latest'): ?> checked <?php endif; ?>>
                              <label class="la-form__radio-filterlabel d-flex align-items-center text-sm" for="latest"><span class="la-form__radio-circle d-flex justify-content-center align-items-center mr-2"></span><span>Latest</span></label>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
                
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
                                <div class="mt-6">
                                  <a href="/browse/courses" role="button" class="la-btn la-btn__secondary bg-transparent text-uppercase text-center py-3 mt-6">Clear</a> 
                                </div>
                            </form>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Filters : End -->
        </div>
              

        <div class="la-courses mt-6 mt-md-14 la-anim__wrap">
          <nav class="la-courses__nav d-flex justify-content-between position-relative">
              <ul class="nav nav-pills la-courses__nav-tabs" id="nav-tab" role="tablist" tabindex="0">
              <div class="d-none d-md-block la-courses__nav-prev la-anim__fade-in-left"><span class="la-courses__nav-prev--icon la-icon icon-arrow"></span></div>
                <?php if(!$filtres_applied): ?>
                  
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link <?php if($loop->first): ?> active <?php endif; ?> " id="nav-<?php echo e($category->slug); ?>-tab" data-toggle="tab" href="#nav-<?php echo e($category->slug); ?>" role="tab" aria-controls="nav-<?php echo e($category->slug); ?>" aria-selected="true"> <span class="position-relative text-nowrap"><?php echo e($category->title); ?></span></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="d-none d-md-block  la-courses__nav-next la-anim__stagger-item--x"><span class="la-courses__nav-next--icon la-icon icon-right-arrow2"></span></div>
              </ul>
          </nav>

             
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
      
            <?php if($filtres_applied): ?>
                  <div class="la-anim__wrap">
                    <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item">
                                  
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => round($course->average_rating, 2),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fname,'creatorUrl' => $course->user->id,'learnerCount' => $course->learnerCount,'price' => $course->price]); ?>
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

                    <?php if(count($courses) == 0): ?>

                      <div class="la-empty__courses d-md-flex justify-content-between align-items-start la-anim__wrap">
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
                    <?php endif; ?>
            <?php else: ?>
                <div class="tab-content la-courses__content la-anim__wrap position-relative" id="nav-tabContent">
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade show la-anim__wrap <?php if($loop->first): ?> active <?php endif; ?>" id="nav-<?php echo e($category->slug); ?>" role="tabpanel" aria-labelledby="nav-<?php echo e($category->slug); ?>-tab">
                          
                                <?php
                                    $courses = $category->courses;
                                    if($sort_type == 'highest_rated')
                                    {
                                      $courses = $category->courses->sortByDesc('average_rating');
                                    }                
                                ?>

                                <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item la-anim__C">
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                   <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => round($course->average_rating, 2),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fname,'creatorUrl' => $course->user->id,'learnerCount' => $course->learnerCount,'price' => $course->price]); ?>
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
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                    
            <?php endif; ?>
            
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('footerScripts'); ?>
      <script>
         

            function addToDuration(id){
              var level = $('#filter_duration').val();

              if(level){
                  arr = JSON.parse("[" + level + "]");
                  if(arr.includes(id)){
                      index = arr.indexOf(id);
                      arr.splice(index, 1);
                  }else{
                    arr.push(id);
                  }
                $('#filter_duration').val(arr);
              }else{
                level = [];
                level.push(id);
                $('#filter_duration').val(level);
              }
            }

      </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/courses.blade.php ENDPATH**/ ?>