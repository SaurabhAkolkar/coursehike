<?php $__env->startSection('headAssets'); ?>
  <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
  <link href="https://unpkg.com/@silvermine/videojs-quality-selector/dist/css/quality-selector.css" rel="stylesheet">
  <title><?php echo e($course->title); ?></title>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
use Carbon\Carbon;
?>

<?php if(session('success')): ?>
  <div class="la-btn__alert position-relative">
    <div class="la-btn__alert-success col-lg-4 offset-lg-4  alert alert-success alert-dismissible fade show" role="alert">
        <span class="la-btn__alert-msg"><?php echo e(session('success')); ?></span>
        <button type="button" class="close la-btn__alert-close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:#56188C">&times;</span>
        </button>
    </div>
  </div>
<?php endif; ?>

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

<section class="la-section__small">
    <div class="la-vcourse">
      <div class="container">
        <div class="row  mb-12"> 
          <div class="col-12 col-md-7 col-lg-7 la-anim__wrap">
            <div class="la-vcourse__header d-flex align-items-center ">
              <h1 class="la-vcourse__title  text-capitalize la-anim__fade-in-top"><?php echo e($course->title); ?></h1>
              
            </div>

            <div class="la-rtng__icons d-inline-flex la-anim__stagger-item">
              <?php for($counter=1;$counter <= round($average_rating); $counter++): ?>
                  <div class="la-icon la-icon--2xl icon-star la-rtng__fill"> </div>
              <?php endfor; ?>

              <?php for($counter=1;$counter <= 5-round($average_rating); $counter++): ?>
                  <div class="la-icon la-icon--2xl icon-star la-rtng__unfill"> </div>
              <?php endfor; ?>                      
              
            </div>
            <p class="la-vcourse__excerpt mb-5 la-anim__stagger-item"><?php echo e($course->short_detail); ?></p>
            <div class="la-vcourse__creator d-flex align-items-center">
              <div class="la-vcourse__creator-avator la-anim__fade-in-left"><img src="<?php echo e($course->user->user_img); ?>" class="img-fluid" alt=""></div>
              <div class="la-vcourse__creator-name text-capitalize la-anim__stagger-item--x"><?php echo e($course->user->fname); ?></div>
            </div>
          </div>
          
          <div class="col-12 col-md-5 col-lg-5 pt-10 pt-md-1 d-flex flex-column justify-content-start align-items-center align-items-md-end la-anim__wrap">
            <div class="la-vcourse__buy text-right mb-6 mb-md-12 la-anim__stagger-item--x">
              <a class="btn btn-primary la-btn la-btn--primary d-lg-inline-flex justify-content-end" href="/learning-plans">Subscribe Now</a>
            </div>
            <div class="la-vcourse__info-items d-flex align-items-center justify-content-end">
              <div class="la-vcourse__info-item la-vcourse__info--videos d-flex flex-column align-items-center justify-content-end">
                <div class="la--count la-anim__stagger-item--x"><?php echo e($course->courseclass->count()); ?></div>
                <span class="la--label mt-2 la-anim__stagger-item--x">Videos</span>
              </div>
              <div class="la-vcourse__info-item la-vcourse__info--learners d-flex flex-column align-items-center justify-content-end mx-10">
                <div class="la--count la-anim__stagger-item--x"><?php echo e($course->learnerCount); ?></div>
                <span class="la--label mt-2 la-anim__stagger-item--x">Learners</span>
              </div>
              <div class="la-vcourse__info-item la-vcourse__info--level d-flex flex-column align-items-center justify-content-end">
                <div class="la--icon mt-n3">
                  <?php if($course->level == 1): ?>
                    <span class="la-vcourse__info-icon la-icon la-icon--6xl icon-beginner la-anim__stagger-item--x"></span>
                  <?php elseif($course->level == 2): ?>
                  <span class="la-vcourse__info-icon la-icon la-icon--6xl icon-intermediate la-anim__stagger-item--x"></span>
                  <?php else: ?>
                  <span class="la-vcourse__info-icon la-icon la-icon--6xl icon-advanced la-anim__stagger-item--x"></span>
                  <?php endif; ?>
                </div>
                <div class="la--label mt-n2 la-anim__stagger-item--x">
                  <?php if($course->level == 1): ?>
                    Beginner
                  <?php elseif($course->level == 2): ?>
                    Intermidiate
                  <?php else: ?>
                    Advanced
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <ul class="list-unstyled d-block d-lg-flex mb-6 la-anim__wrap">
              <li class="la-vcourse__duration mr-14 la-anim__stagger-item la-anim__A"><span class="la-text-gray4">Duration: </span>  <?php echo e($course->duration); ?> Hrs</li>
              <li class="la-vcourse__updatedon mr-14 la-anim__stagger-item la-anim__A"><span class="la-text-gray4">Last Updated: </span>  <?php echo e($course->updated_at->format('d-M Y')); ?></li>
              <li class="la-vcourse__languages mr-14 la-anim__stagger-item la-anim__A"> <span class="la-text-gray4">Languages: </span>  <?php echo e($course->language->name); ?> </li>
            </ul>
          </div>
          <div class="col-12 la-vcourse__primary-info d-flex mb-2 la-anim__wrap">
            <div class="la-vcourse__classes-info pr-2 la-anim__stagger-item--x">
              <span class="la--count la-anim__stagger-item--x"><?php echo e($course->chapter->count()); ?></span>
              <span class="la--label la-anim__stagger-item--x">Classes</span>
            </div>
            <div class="la-vcourse__videos-info pl-2 la-anim__stagger-item--x">
              <span class="la--count la-anim__stagger-item--x"><?php echo e($course->courseclass->count()); ?></span>
              <span class="la--label la-anim__stagger-item--x">Videos</span>
              <?php
                  $startTime = \Carbon\Carbon::parse('2020-12-05T01:18:36.862+00:30');
                  $finishTime = \Carbon\Carbon::parse('2020-12-05T01:18:36.862+1:30');

                  $totalDuration = $finishTime->diffInHours($startTime);
                  
              ?>
            </div>
          </div>
        </div>
        <div id="vcourse_row" class="row la-vcourse__class-row ">
          <div class="col-12 col-lg-6 la-vcourse__class-col px-0 px-md-4 la-anim__wrap">
            <div class="la-player la-vcourse__video-wrap mb-3  la-anim__stagger-item">
              <video-js
                id="lila-video"
                class="la-vcourse__video video-js"
                controls
                preload="auto"
                width="100%"
                height="100%"
                poster="<?php echo e($course->preview_image); ?>"
                data-setup="{}"
                type="application/x-mpegURL" 
              >
                <source src="<?php echo e($course->getSignedStreamURL()); ?>" type="application/x-mpegURL" />
                
                <p class="vjs-no-js">
                  
                </p>
              </video-js>
            </div>
            <h2 class="la-vlesson__title m-0  text-capitalize la-anim__stagger-item"><?php echo e($course->title); ?> - Course Preview</h2>
            <small class="la-vlesson__creator text-capitalize la-anim__stagger-item"><?php echo e($course->user->fname); ?></small>
          </div>

          <div class="col-12 col-lg-6 la-vcourse__class-col px-0 px-md-2 la-anim__wrap">
            <div class="la-vcourse__curriculam la-anim__stagger-item--x">
              <?php $__currentLoopData = $course->chapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="la-vcourse__class la-anim__stagger-item la-anim__E">
                <div class="la-vcourse__class-header d-flex mb-7 ml-5 ">
                  <div class="la-vcourse__class-thumb mr-3"><img class="img-fluid" src="<?php echo e($class->thumbnail); ?>"></div>
                  <div class="d-flex flex-column">
                    <div class="la-vcourse__class-title leading-snug text-lg text-md-xl mb-1"><?php echo e($class->chapter_name); ?></div><small class="la-vcourse__class-videoscount"><?php echo e($class->courseclass->count()); ?> Videos</small>
                  </div>
                </div>

                <div class="la-vcourse__lessons">

                  <?php $__currentLoopData = $class->courseclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $lesson_access = $class_video->is_preview == '1' ? 'free' : ($video_access ? 'free' : 'locked');  
                      if($class_video->is_preview == '1')       
                        $lesson_access = 'free';
                      else{
                        if($video_access == true || (is_array($class_access) && in_array($class_video->id, $class_access)) || $class_access === 1)
                          $lesson_access = 'free';
                        else 
                          $lesson_access = 'locked';
                      }
                    ?>
                     <?php if (isset($component)) { $__componentOriginalff32d1cf202e585582bd852574666ac7f52eac32 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ClassVideo::class, ['id' => $class_video->id,'title' => $class_video->title,'thumbnail' => $class_video->image,'detail' => $class_video->detail,'author' => $class_video->courses->user->fname,'watchduration' => $class_video->duration,'statuspercentage' => $class_video->duration,'access' => $lesson_access]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalff32d1cf202e585582bd852574666ac7f52eac32)): ?>
<?php $component = $__componentOriginalff32d1cf202e585582bd852574666ac7f52eac32; ?>
<?php unset($__componentOriginalff32d1cf202e585582bd852574666ac7f52eac32); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="la-vcourse__btn-wrap text-center mt-3 la-anim__wrap">
              <div id="vcourseFullView" class="la-btn__arrow-down la-vcourse__btn d-inline-block la-anim__stagger-item">
                <span class="icon-down-arrow la-btn__icon la-btn__icon--grey"></span>
                <div class="la-btn__text la-btn__text--purple">See the list</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section__small">
    <div class="la-section__inner">
      <div class="container">
        <div class="la-ctabs d-none d-sm-block">
          <nav class="la-courses__nav ">
            <ul class="nav nav-pills la-courses__nav-tabs la-anim__wrap" id="cnav-tab" role="tablist">
              <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link active text-capitalize" id="cnav-about-tab" data-toggle="tab" href="#cnav-about" role="tab" aria-controls="cnav-about" aria-selected="true">About</a></li>
              <?php if($video_access == true): ?>
                <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link text-capitalize" id="cnav-resource-tab" data-toggle="tab" href="#cnav-resource" role="tab" aria-controls="cnav-resource" aria-selected="false">Resources</a></li>
                <li class="nav-item la-courses__nav-item la-anim__stagger-item--x"><a class="nav-link la-courses__nav-link text-capitalize" id="cnav-certificate-tab" data-toggle="tab" href="#cnav-certificate" role="tab" aria-controls="cnav-certificate" aria-selected="false">Certificate</a></li>
              <?php endif; ?>
            </ul>
          </nav>
          <div class="tab-content la-courses__content" id="cnav-tabContent">
            <div class="tab-pane fade show active" id="cnav-about" role="tabpanel" aria-labelledby="cnav-about-tab">
              <div class="col-lg-9 px-0">
                <div class="col-12 col-lg px-0 la-anim__wrap">
                  <div class="la-ctabs__about la-anim__stagger-item la-anim__C">
                    <p><?php echo e($course->short_detail); ?></p>
                    <span class="la-ctabs__about-collapse collapse" id="about_collapse">
                      <?php echo $course->detail; ?>

                    </span>
                  </div>
                  
                  <div class="la-vcourse__btn-wrap text-right mt-3 la-anim__stagger-item la-anim__C">
                    <a class="la-btn__arrow-down la-vcourse__btn-collapse d-inline-block text-center collapsed" data-toggle="collapse" href="#about_collapse">
                      <div class="la-vcourse__btn-text la-btn__text la-btn__text--purple pt-4">Read More</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <?php if($video_access == true): ?>
              <div class="tab-pane fade" id="cnav-resource" role="tabpanel" aria-labelledby="cnav-resource-tab">
                
                  <?php if(count($course->resources) == 0): ?>
                      <div class=" la-anim__wrap text-center">
                          <div class="la-empty__inner la-anim__stagger-item">
                              <h6 class="la-empty__course-title text-2xl" style="color:var(--gray8);">No Resources available for this Course.</h6>
                            </div>
                      </div>
                  <?php else: ?>
                    <div class="col-lg px-0 d-flex">
                      <?php $__currentLoopData = $course->resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-md col-lg px-0">
                          <div class="la-ctabs__resources d-flex">
                            <div class="la-ctabs__resources-pdf"><i class="la-icon--5xl icon-pdf mr-8"></i></div>
                            <div class="la-ctabs__resources-desc">
                              <div class="la-ctabs__resources-title text-lg  text-uppercase"><?php echo e($resource->file_name); ?></div><a class="la-ctabs__resources-file text-sm" href="<?php echo e($resource->file_url); ?>" target="_blank">Download Now</a>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-12 px-0 d-flex justify-content-end"> <a class="la-ctabs__download-all text-sm" href=""><span class="text-uppercase">DOWNLOAD ALL<span class="pl-1 la-icon icon-download"> </span></span></a></div>
                  <?php endif; ?>
              </div>


              <div class="tab-pane fade" id="cnav-certificate" role="tabpanel" aria-labelledby="cnav-certificate-tab">
                <div class="col-lg px-0 d-flex">
                  <div class="col-12 col-md-6 col-lg px-0">
                    <div class="la-ctabs__certificate d-flex">
                      <div class="la-ctabs__certificate-pdf"><i class="la-icon--5xl icon-download mr-8"></i></div>
                      <div class="la-ctabs__certificate-desc">
                        <div class="la-ctabs__certificate-title text-lg text-uppercase">Water Color</div><a target="_blank" class="la-ctabs__certificate-file text-sm" href="/download-certificate/<?php echo e($course->id); ?>">watercolor_certificate.pdf</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <?php endif; ?>
          </div>
        </div>

        <!-- Mobile Version: Start -->
        <div class="la-ctabs d-block d-sm-none">
          <div class="la-ctabs__content">
            <!-- About -->
            <div class="col-12 mb-6 px-0 la-anim__wrap">
              <h5 class="la-ctabs__title mb-4 la-anim__stagger-item">About</h5>
                <div class="col-12 col-lg px-0">
                  <div class="la-ctabs__about la-anim__stagger-item--x la-anim__B">
                    <?php echo $course->detail; ?>

                    <span class="la-ctabs__about-collapse collapse" id="read_more">
                      <?php echo $course->detail; ?>

                    </span>
                  </div>
                 
                  <div class="la-vcourse__btn-wrap text-center la-anim__stagger-item--x la-anim__B">
                    <a class="la-btn__arrow-down la-vcourse__btn-collapse d-inline-block text-center collapsed" data-toggle="collapse" href="#read_more">
                      <div class="la-vcourse__btn-text la-btn__text la-btn__text--purple pt-4">Read More</div>
                    </a>
                  </div>
                </div>
            </div>

            <!-- Resources -->
            <?php if($video_access == true): ?>
            <div class="col-12 mb-4 px-0 la-anim__wrap">
              <h5 class="la-ctabs__title mb-4 la-anim__stagger-item">Resources</h5>

              <?php if(count($course->resources) == 0): ?>
                  <div class=" la-anim__wrap text-center pt-4 pb-10">
                    <div class="la-empty__inner la-anim__stagger-item">
                      <h6 class="la-empty__course-title text-xl" style="color:var(--gray8);">No Resources available for this Course.</h6>
                      </div>
                  </div>
              <?php else: ?>
                  <?php $__currentLoopData = $course->resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md col-lg px-0">
                      <div class="la-ctabs__resources d-flex">
                        <div class="la-ctabs__resources-pdf la-anim__stagger-item--x"><i class="la-icon--xl la-ctabs__resources-download icon-pdf mr-3"></i></div>
                        <div class="la-ctabs__resources-desc la-anim__stagger-item--x">
                          <div class="la-ctabs__resources-title text-uppercase"><?php echo e($resource->file_name); ?></div><a class="la-ctabs__resources-file text-sm" href="<?php echo e($resource->file_url); ?>" target="_blank">Download Now</a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-12 mb-4 text-right la-anim__wrap"><a class="la-ctabs__download-all la-anim__stagger-item--x" href=""><span class="text-uppercase text-sm">DOWNLOAD ALL<span class="pl-1 la-icon icon-download"> </span></span></a></div>
              <?php endif; ?>
            </div>
            
            

            <!-- Certificate -->
            <div class="col-12 mb-4 px-0 la-anim__wrap">
              <h5 class="la-ctabs__title mb-4 la-anim__stagger-item">Certificate</h5>
              <div class="col-12 col-md-6 col-lg px-0">
                <div class="la-ctabs__certificate d-flex">
                  <div class="la-ctabs__certificate-pdf la-anim__stagger-item--x"><i class="la-icon--xl la-ctabs__resources-download icon-download mr-3"></i></div>
                  <div class="la-ctabs__certificate-desc la-anim__stagger-item--x">
                    <div class="la-ctabs__certificate-title text-uppercase"><?php echo e($course->title); ?></div><a class="la-ctabs__certificate-file text-sm" href=""><?php echo e($course->title); ?>.pdf</a>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
         <!-- Mobile Version: End -->
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section__small ">
    <div class="la-section__inner">
      <div class="container">
          <div class="row">
            <div class="col">
              <div class="la-lp__benefits la-anim__wrap">
                <h3 class="la-section__title mb-5 mb-md-8 text-2xl text-md-4xl la-anim__fade-in-bottom">Course Benefits</h3>

                <div class="la-cbenefits d-flex my-1 my-md-8">
                  <div class="row">
                    <div class="col-md-6 col-lg-4 la-cbenefits__item-col la-anim__stagger-item--x">
                      <div class="la-cbenefits__item d-flex flex-column align-items-center">
                        <div class="mb-7">
                          <img class="img-fluid d-block" src="/images/learners/course-benefits/video.svg" />
                        </div>
                        <h4 class="la-cbenefits__item-title mb-3">Unlimited Learning</h4>
                        <p class="la-cbenefits__item-desc m-0 text-center">Access to numerous courses of varied art skills</p>
                      </div>
                    </div>

                    <div class="col-md-6 col-lg-4 la-cbenefits__item-col la-anim__stagger-item--x">
                      <div class="la-cbenefits__item d-flex flex-column align-items-center">
                        <div class="mb-7"><img class="img-fluid d-block" src="/images/learners/course-benefits/certificate.svg"></div>
                        <h4 class="la-cbenefits__item-title mb-3">Certification</h4>
                        <p class="la-cbenefits__item-desc m-0 text-center">Certificates as proof of course completion</p>
                      </div>
                    </div>

                    <div class="col-md-12 col-lg-4 la-cbenefits__item-col la-anim__stagger-item--x">
                      <div class="la-cbenefits__item d-flex flex-column align-items-center">
                        <div class="mb-7"><img class="img-fluid d-block" src="/images/learners/course-benefits/online-course.svg"></div>
                        <h4 class="la-cbenefits__item-title mb-3">Resources</h4>
                        <p class="la-cbenefits__item-desc m-0 text-center">Extra resources to practice and hone your skills</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->

  <!-- Section: Start-->
  <?php if(!$video_access || !auth()->check()): ?>

  <section class="la-section__small la-section--grey la-vcourse__purchase">
    <div class="la-vcourse__purchase-inwrap container">
      <div class="row la-vcourse__purchase-row la-anim__wrap">
        <div class="col-md-7 col-lg-7 la-vcourse__purchase-left la-anim__stagger-item">
          <div class="la-vcourse__purchase-prize mb-4 mb-lg-8 ">Purchase this Course @ <span class="la-vcourse__purchase-prize--amount"><b><?php echo e(getSymbol()); ?><?php echo e($course->convertedprice); ?></b></span></div>
          <form class="la-vcourse__purchase-form" id="add_to_cart_form" name="add_to_cart_form" method="post" action="/add-to-cart">
            <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" />
            <?php echo csrf_field(); ?>
            <div class="la-vcourse__purchase-classes">
              <div class="la-vcourse__purchase-class la-vcourse__purchase-class--all mb-lg-4 la-anim__stagger-item">
                <div class="la-form__radio-wrap">
                  <input class="la-form__radio d-none la-vcourse__purchase-input" <?php if($order_type == null || $order_type == 'all_classes'): ?> checked <?php endif; ?> type="radio" value="all-classes" name="classes" id="allClasses">
                  <label class="d-flex align-items-center la-vcourse__purchase-label" for="allClasses">
                    <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center mr-2"></span>
                    <span class="">All Classes</span>
                  </label>
                </div>
              </div>
              <div class="la-vcourse__purchase-class la-vcourse__purchase-class--select ">
                <div class="la-form__radio-wrap la-anim__stagger-item">
                  <input class="la-form__radio d-none la-vcourse__purchase-input" type="radio" value="select-classes" <?php if($order_type == 'selected_classes'): ?> <?php endif; ?> name="classes" id="selectClasses">
                  <label class="d-flex align-items-center la-vcourse__purchase-label" for="selectClasses">
                    <span class="la-form__radio-circle la-form__radio-circle--typeB d-flex justify-content-center align-items-center mr-2"></span>
                    <span class="">Select Classes</span>
                  </label>
                </div>
                <div class="la-vcourse__purchase-items mt-4 mt-lg-8 la-anim__stagger-item" id="selected_class_div">
                  <table class="w-100 la-vcourse__classes-wrap">
                    <tr class="la-vcourse__sclass-item">
                      <th class="mb-4 la-vcourse__sclass-heading"></th>
                      <th class="mb-4 la-vcourse__sclass-heading">Class</th>
                      <th class="mb-4 la-vcourse__sclass-heading">Name</th>
                      <th class="mb-4 la-vcourse__sclass-heading">Mentor</th>
                      <th class="mb-4 la-vcourse__sclass-heading">Price</th>
                    </tr>
                    <?php $__currentLoopData = $course->chapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                      <tr class="la-vcourse__sclass-item align-top">
                        <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--checkbox">
                          <div>
                            <input id="selectItem_<?php echo e($class->id); ?>" name="selected_classes[]" class="la-form__checkbox-input selected_classes custom-control-input" type="checkbox" value="<?php echo e($class->id); ?>" <?php if($order_type == 'all_classes'): ?> checked <?php endif; ?>>
                            
                            <label class="" for="selectItem_<?php echo e($class->id); ?>">
                              <svg viewBox="0 0 16 16" height="16" width="16">
                                <g id="Group_5052" data-name="Group 5052" transform="translate(-129 -2108)">
                                  <g id="Rectangle_3239" data-name="Rectangle 3239" transform="translate(129 2108)" fill="none" stroke="#7400d7" stroke-width="1">
                                    <rect class="la-form__checkbox-rect" x="0.5" y="0.5" width="15" height="15" fill="none" />
                                  </g>
                                </g>
                                <path class="la-form__checkbox-mark" id="Path_17096" data-name="Path 17096" d="M147.263,194.53a.857.857,0,0,0,.56.4.994.994,0,0,0,.171.02.854.854,0,0,0,.5-.161l7.175-5.128a.856.856,0,0,0-1-1.392l-6.419,4.589-1.871-3.1a.856.856,0,1,0-1.467.882Z" transform="matrix(0.985, -0.174, 0.174, 0.985, -173.013, -153.894)" fill="#010101"/>
                              </svg>
                            </label>
                          </div>
                        </td>
                        <td class="la-vcourse__sclass-data la-vcourse__sclass-data--thumbnail">
                          <img src="https://picsum.photos/68/46" alt="purchase item">
                        </td>
                        <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--name"><?php echo e($class->chapter_name); ?></td>
                        <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--mentor"><?php echo e($course->user->fname); ?></td>
                        <td class="la-vcourse__sclass-data pt-3 la-vcourse__sclass-data--price"><?php echo e(getSymbol()); ?><?php echo e($class->convertedprice); ?></td>
                      </tr>
                     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </table>
                </div>
              </div>
            </div>
            <div class="la-vcourse__purchase-actions d-flex flex-wrap align-items-center mt-8">
              <div class="la-vcourse__purchase-btn1 w-50">
                <a class="btn btn-primary la-btn w-100 text-center" <?php if(Auth::check()): ?> onclick="$('#add_to_cart_form').submit()" <?php else: ?> data-toggle="modal" data-target="#locked_login_modal" <?php endif; ?> >Buy course</a>
              </div>
              <div class="la-vcourse__purchase-btn w-50">
                <a class="btn  la-btn__plain text--green w-100 text-center" <?php if(Auth::check()): ?> onclick="$('#add_to_cart_form').submit()" <?php else: ?> data-toggle="modal" data-target="#locked_login_modal" <?php endif; ?>>ADD TO CART</a>
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-5 col-lg-4 offset-lg-1 px-lg-0 my-auto la-vcourse__purchase-right la-anim__wrap">
          <div class="la-vcourse__purchase-content text-center la-anim__stagger-item--x la-anim__B">
            <div class="la-vcourse__purchase-prize mb-8 la-anim__stagger-item--x">Subscribe for all Courses @ <span class="la-vcourse__purchase-prize--amount"><b><?php echo e($subscription_rate); ?>/month</b></span></div>
            <p class="la-anim__stagger-item--x">Access all the current and future courses at the tiny monthly subscription payment</p>
            <div class="la-vcourse__purchase-actions d-inline-block text-center mt-8">
              <div class="la-vcourse__purchase-btn la-anim__stagger-item--x">
                <a class="btn btn-primary la-btn text-center"  href="/learning-plans">Subscribe Now</a>
              </div>

              <div class="pt-2">
                <a href="/learning-plans"  class="la-vcourse__purchase-trial--lnk text-left la-anim__stagger-item--x la-anim__C">
                  Get free 7 Days trial
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
  <?php endif; ?>
  <!-- Section: End-->

  <!-- Section: Start-->
  <section class="la-section__small">
    <div class="la-section__inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <li class="la-rtng__item">
              <div class="la-rtng__inner d-flex flex-column flex-md-row justify-content-between ">
                <div class=" la-anim__wrap">
                    <h3 class="la-rtng__title text-xl text-2xl la-anim__stagger-item">Reviews &amp; Ratings</h3>
                  <div class="la-rtng__wrapper d-flex flex-column flex-md-row justify-content-between">
                    <div class="la-rtng__overall text-left text-md-center la-anim__stagger-item">
                      <div class="la-rtng__total body-font text-5xl"><?php echo e($average_rating); ?></div>
                      <div class="la-rtng__icons d-inline-flex">
                        <?php for($counter=1;$counter <= round($average_rating); $counter++): ?>
                            <div class="la-icon la-icon--2xl icon-star la-rtng__fill"> </div>
                        <?php endfor; ?>

                        <?php for($counter=1;$counter <= 5-round($average_rating); $counter++): ?>
                            <div class="la-icon la-icon--2xl icon-star la-rtng__unfill"> </div>
                        <?php endfor; ?>                      
                        
                      </div>
                      <div class="la-rtng__course body-font text-sm mt-n1 px-3 px-md-0">Course Rating</div>
                    </div>
                    <div class="la-rtng__indicators la-anim__stagger-item">
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:<?php echo e($five_rating_percentage); ?>%" aria-valuenow="<?php echo e($five_rating_percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs"><?php echo e($five_rating_percentage); ?>%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:<?php echo e($four_rating_percentage); ?>%" aria-valuenow="<?php echo e($four_rating_percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs"><?php echo e($four_rating_percentage); ?>%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">       
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:<?php echo e($three_rating_percentage); ?>%" aria-valuenow="<?php echo e($three_rating_percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs"><?php echo e($three_rating_percentage); ?>%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">       
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:<?php echo e($two_rating_percentage); ?>%" aria-valuenow="<?php echo e($two_rating_percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs"><?php echo e($two_rating_percentage); ?>%</div>
                      </div>
                      <div class="la-rtng__bars d-flex flex-row jsutify-content-between">       
                        <div class="progress la-rtng__progress">
                          <div class="progress-bar la-rtng__progress-bar" role="progressbar" style="width:<?php echo e($one_rating_percentage); ?>%" aria-valuenow="<?php echo e($one_rating_percentage); ?>" aria-valuemin="0" aria-valuemax="100">  </div>
                        </div>
                        <div class="la-rtng__pg-rtng d-inline-flex px-3">
                          <div class="la-icon--md icon-star la-rtng__fill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                          <div class="la-icon--md icon-star la-rtng__unfill"></div>
                        </div>
                        <div class="la-rtng__percent body-font text-xs"><?php echo e($one_rating_percentage); ?>%</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="la-rtng__review-popup la-anim__wrap">
                  <a class="la-rtng__review text-uppercase text-center text-md-right text-nowrap la-anim__stagger-item" data-toggle="modal" data-target="#leave_rating">Leave a Review</a>

                  <!-- Leave a Rating Popup: Start -->
                  <div class="modal fade la-rtng__review-modal" id="leave_rating">
                    <div class="modal-dialog la-rtng__review-dialog">
                        <div class="modal-content la-rtng__review-content">
                            <div class="modal-header la-rtng__review-header">
                                <button type="button" class="close text--black" data-dismiss="modal">&times;</button> <br/>
                            </div>
                            
                            <div class="modal-body la-rtng__review-body">
                                  <form action="<?php echo e(route('rate.course')); ?>" method="post" id="rate_course_form" name="rate_course_form">
                                      <?php echo csrf_field(); ?>
                                      <div class="la-rtng__review-top">
                                          <h6 class="la-rtng__review-title">Leave a rating</h6>
                                          <div class="la-rtng__review-stars">
                                              <div class="starRatingContainer">
                                                  <div class="rate2 text-2xl" style="color:#FFC516"></div>
                                                  <input id="rating_value_input" class="border-0">
                                                  <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" class="border-0">
                                                  <input id="input2" type="hidden" name="rating_value" type="text"></div>
                                          </div>
                                      </div>

                                      <div class="la-rtng__review-btm py-8">
                                          <h6 class="la-rtng__review-title">Review</h6>
                                          <textarea cols="38" rows="5" class="la-form__textarea" name="review" id="review_input" placeholder="Type your Review here..."></textarea>
                                      </div>

                                      <div class="text-right">
                                        <a role="button" class="la-rtng__review-btn" onclick="submitRateCourseForm()">Submit Review</a>
                                      </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- Leave a Rating Popup: End -->
                </div>
              </div>
            </li>
          </div>
          <div class="col-12 pt-4 pt-md-12">
            <div class="la-mcard__slider-wrap la-anim__wrap">
              <div class="swiper-container h-100 la-lcreviews__container">
                <div class="swiper-wrapper la-lcreviews__wrapper"> 
              
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="swiper-slide la-lcreviews__slider la-anim__stagger-item">  
                      <div class="la-lcreviews__item">
                        <div class="la-lcreviews__wrapper ">
                          <div class="d-flex justify-content-between align-item-start ">
                            <div class="la-lcreviews__prfle d-inline-flex align-items-center ">
                              <div class="la-lcreviews__prfle-img">
                                <img class="img-fluid rounded-circle d-block" src="<?php echo e($review->user->user_img); ?>" alt="<?php echo e($review->user->fname); ?>">
                              </div>
                              <div class="la-lcreviews__prfle-info ml-2 ">
                                <div class="la-lcreviews__timestamp text-sm">
                                              <?php if($review->created_at->diffInWeeks(Carbon::now())> 0): ?> 
                                                  <?php echo e($review->created_at->diffInWeeks(Carbon::now())); ?> weeks ago
                                              <?php elseif($review->created_at->diffInDays(Carbon::now())>0): ?>
                                                  <?php echo e($review->created_at->diffInDays(Carbon::now())); ?> days ago 
                                              <?php else: ?>
                                                  Today                                      
                                              <?php endif; ?>
                                </div>
                                <h4 class="la-lcreviews__uname text-md text-uppercase "><?php echo e($review->user->fname.' '.$review->user->lname); ?></h4>
                              </div>
                            </div>
                            <div class="d-none d-md-block la-lcreviews__ratings"> <?php for($couter=1 ; $couter <= $review->rating; $couter++): ?><span class="la-icon--lg icon-star la-rtng__fill"></span><?php endfor; ?>  <?php for($couter=1 ; $couter <= 5 - $review->rating; $couter++): ?><span class="la-icon--lg icon-star la-rtng__unfill"></span><?php endfor; ?></div>
                          </div>

                          <div class="la-lcreviews__content">
                            <div class="d-block d-md-none la-lcreviews__ratings"> <?php for($couter=1 ; $couter <= $review->rating; $couter++): ?><span class="la-icon--xl icon-star la-rtng__fill"></span><?php endfor; ?>  <?php for($couter=1 ; $couter <= 5 - $review->rating; $couter++): ?><span class="la-icon--xl icon-star la-rtng__unfill"></span><?php endfor; ?></div>
                            <div class="la-lcreviews__comment text-sm"><?php echo e($review->review); ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> 
              </div>
              <div class="swiper-pagination swiper-pagination-custom la-lcreviews__pagination la-anim__stagger-item--x"></div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section__small la-creator__section">
    <div class="la-section__inner pb-md-10">
      <div class="container ">
        <div class="la-anim__wrap">
          <h2 class="la-section__title text-2xl text-md-4xl mb-9 la-anim__stagger-item">Creator</h2>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-5 la-creator la-anim__wrap">
            <div class="la-creator__wrap d-flex justify-content-center justify-content-md-start position-relative">
              <div class="la-creator__inwrap la-anim__stagger-item">
                <div class="la-creator__img la-anim__fade-in-top la-anim__B">
                  <img class="img-fluid mx-auto d-block" src="<?php echo e($course->user->user_img); ?>" alt="<?php echo e($course->user->fullName); ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-7 my-auto">
            <div class="la-creator__content offset-lg-1 la-anim__wrap">
              <div class="la-creator__detail">
                  <h6 class="la-creator__name text-capitalize la-anim__stagger-item--x la-anim__C"><?php echo e($course->user->fullName); ?></h6>
                  <div class="la-creator__specialist mt-1 text-capitalize la-anim__stagger-item--x la-anim__D">Design</div>
              </div>

              <div class="la-creator__para mb-6 la-anim__stagger-item--x"><?php echo e($course->user->deatail); ?></div>
                <div class="la-creator__content-btn ">
                  <div class="la-btn__arrow text--burple text-uppercase text-spacing font-weight--bold la-anim__stagger-item--x la-anim__B">
                    <a href="/creator/<?php echo e($course->user->id); ?>">read about
                    <span class="la-btn__arrow-icon la-icon la-icon--7xl icon-grey-arrow "></span></a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section__small la-section--grey">
    <div class="la-section__inner">
      <div class="container la-anim__wrap">
        <h2 class="la-section__title text-2xl text-md-4xl mb-9 la-anim__stagger-item">More from Creators</h2>
        
          <?php if(count($mentor_other_courses) == 0): ?>
               <div class="la-empty__courses w-100 d-md-flex justify-content-between align-items-center mt-0 mt-md-6 la-anim__stagger-item">
                    <div class="col la-empty__inner">
                        <h6 class="la-empty__course-title text-xl la-anim__stagger-item">No more Courses from this Creator</h6>
                    </div>
                    <div class="col text-md-right la-empty__browse-courses mt-n4 la-anim__stagger-item--x">
                        <a href="/browse/courses" class="la-empty__browse">
                            Browse Courses
                            <span class="la-empty__browse-icon la-icon la-icon--5xl icon-grey-arrow "></span>
                        </a>
                    </div>
                </div>         
            <?php else: ?>

            <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item--x la-anim__B">
              <?php $__currentLoopData = $mentor_other_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => round($course->average_rating, 2),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fname,'creatorUrl' => $course->user->id,'learnerCount' => $course->learnerCount]); ?>
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

            <?php endif; ?>
                  
      </div>
    </div>
  </section>
  <!-- Section: End-->
  <!-- Section: Start-->
  <section class="la-section__small la-section--grey">
    <div class="la-section__inner">
      <div class="container la-anim__wrap">
        <h2 class="la-section__title text-2xl text-md-4xl mb-9 la-anim__stagger-item">Looking for something else?</h2>
                
          <?php if(count($related_courses) == 0): ?>

            <div class="la-empty__courses w-100 d-md-flex justify-content-between align-items-center mt-0 mt-md-6 la-anim__stagger-item">
                <div class="col la-empty__inner">
                  <h6 class="la-empty__course-title text-xl la-anim__stagger-item--x">No more courses available right now!</h6>
                </div>
            </div>   

          <?php else: ?>

            <div class="row row-cols-md-2 row-cols-lg-3 la-anim__stagger-item--x la-anim__B">
              <?php $__currentLoopData = $related_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if (isset($component)) { $__componentOriginal541dd97498dd76400e36bb15ebc47d888e5f7706 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Course::class, ['id' => $course->id,'img' => $course->preview_image,'course' => $course->title,'url' => $course->slug,'rating' => round($course->average_rating, 2),'creatorImg' => $course->user->user_img,'creatorName' => $course->user->fname,'creatorUrl' => $course->user->id,'learnerCount' => $course->learnerCount]); ?>
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
          <?php endif; ?>

      </div>
    </div>
  </section>
  <!-- Section: End-->



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScripts'); ?>
  <script>var course_id = <?php echo json_encode($course->id); ?>;</script>
  <!-- video js -->
  <script src="https://unpkg.com/video.js/dist/video.js"></script>
  
  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <script src="https://unpkg.com/@silvermine/videojs-quality-selector/dist/js/silvermine-videojs-quality-selector.min.js"></script>
  <script src="<?php echo e(asset('/js/rater.min.js')); ?>" charset="utf-8"></script>
  
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="/js/scripts/video-progress-log.js"></script>
  <script>
            var options = {
                max_value: 5,
                step_size: 1,
                url: '/',
                initial_value: 3,
                update_input_field_name: $("#input2, #rating_value_input, #rating_value_input2, #input3"),
            }
            // $('#input2').change(function(){   
            //     $('#reating_value_input').val($this.val());
            // });
            $(".rate2").rate(options);

            $("form[name='rate_course_form']").validate({
      
                  rules: {
                    review: {
                      required: true,
                      minlength: 3
                    }
                  },
                  // Specify validation error messages
                  messages: {
                    review: {
                      required: "Please provide a review.",
                      minlength: "Review must be 3 characters in length."
                    }
                  },
                  // Make sure the form is submitted to the destination defined
                  // in the "action" attribute of the form when valid
                  submitHandler: function(form) {
                    form.submit();
                  }
                  
                });

                
                function submitRateCourseForm(){
                    $('#rate_course_form').submit();
                }

                $("form[name='add_to_cart_form']").validate({
      
                    rules: {

                      classes: {
                        required: true,
                      }, 
                      selected_classes: {
                        required: true,
                      }
                    },
                    // Specify validation error messages
                    messages: {
                      classes: {
                        required: "Please select the type of purchase.",
                      },
                      selected_classes: {
                        required: "Please select classes.",
                      }
                    },
                    // Make sure the form is submitted to the destination defined
                    // in the "action" attribute of the form when valid
                    submitHandler: function(form) {
                      form.submit();
                    }
                    
                });

                $('input[type=radio][name=classes]').change(function() {
                    if (this.value == 'all-classes') {
                        $('.selected_classes').prop('checked', true);
                    }
                    if(this.value == 'select-classes'){
                      $('.selected_classes').removeAttr('checked');
                    } 
                  
                });

                $('.selected_classes').change(function(){
                  
                    if($('.selected_classes').not(":checked"))
                    {
                      $('#selectClasses').prop('checked', true);
                    }

                    if ($('.selected_classes:checked').length == $('.selected_classes').length) {
                      $('#allClasses').prop('checked', true);
                    }
                });
              


  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/course.blade.php ENDPATH**/ ?>