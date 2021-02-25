<?php $__env->startSection('content'); ?>
    <div class="la-profile__wrap">

        <!-- Side Navbar: Start -->
        <?php echo $__env->make('learners.pages.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Side Navbar: End -->

        <div class="la-profile__main">
            <div class="container">
                <!-- Alert Message: Start -->
                <div id="interest_alert_div"></div>
                 <!-- Alert Message: End -->

              <div class="la-profile__main-inner">
                <div class="la-profile__title-wrap m-0 la-anim__wrap">
                  <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-3 la-anim__stagger-item" href="<?php echo e(URL::previous()); ?>"></a>
                  <h1 class="la-profile__title la-anim__stagger-item">Interests</h1>
                </div>

                <section class="la-interests__like la-interests__sec">
                    <div class="la-interests__inner la-anim__wrap">
                        <div class="la-interests__title la-anim__stagger-item mb-6">
                            Your Interests
                            <!--<a role="button" href="" class="text-sm ml-5" style="color:var(--app-indigo-1);font-weight:var(--font-medium)">Edit</a> -->
                        </div>
                        
                            <?php if(count($myInterests)): ?>
                                <?php
                                $alreadyAdded = true;
                                ?> 

                                <div class="row la-interests__list pr-5  la-anim__stagger-item">
                                    <?php $__currentLoopData = $myInterests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($interest->category != null): ?>
                                             <?php if (isset($component)) { $__componentOriginalf43312b36df4538db01d96c5e1e44cff9e259eb0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MyInterest::class, ['id' => $interest->category_id,'img' => $interest->category->image,'name' => $interest->category['title'],'alreadyAdded' => $alreadyAdded]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalf43312b36df4538db01d96c5e1e44cff9e259eb0)): ?>
<?php $component = $__componentOriginalf43312b36df4538db01d96c5e1e44cff9e259eb0; ?>
<?php unset($__componentOriginalf43312b36df4538db01d96c5e1e44cff9e259eb0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php else: ?>
                                <div class="col-lg-8 mt-2 la-empty__courses la-anim__stagger-item--x">
                                    <div class="la-empty__browse-courses text-center text-md-left">
                                        <h6 class="la-empty__browse leading-tight text-lg" style="text-transform:none; letter-spacing:1px">
                                            Please Add Interests for better experience.
                                        </h6>
                                    </div>
                                </div>
                            <?php endif; ?>
                        

                        <div class="la-interests__like la-anim__wrap">
                            <div class="la-interests__title la-anim__stagger-item mb-6">You might also like</div>
                            
                         
                                <?php if(count($otherCategories) == 0): ?>
                                    <div class="col-lg-8 mt-2 la-empty__courses la-anim__stagger-item--x">
                                        <div class="la-empty__browse-courses  text-center text-md-left">
                                            <h6 class="la-empty__browse leading-tight text-lg" style="text-transform:none; letter-spacing:1px">
                                                No more Interests available.
                                            </h6>
                                        </div>
                                    </div>
                                <?php else: ?>

                                    <div class="row la-interests__list pr-5  la-anim__stagger-item">
                                    <?php $__currentLoopData = $otherCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php if (isset($component)) { $__componentOriginalf43312b36df4538db01d96c5e1e44cff9e259eb0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MyInterest::class, ['img' => $category->image,'name' => $category->title,'id' => $category->id,'alreadyAdded' => false]); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalf43312b36df4538db01d96c5e1e44cff9e259eb0)): ?>
<?php $component = $__componentOriginalf43312b36df4538db01d96c5e1e44cff9e259eb0; ?>
<?php unset($__componentOriginalf43312b36df4538db01d96c5e1e44cff9e259eb0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                               
                        </div>
                    </div>
                </section>
              </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerScripts'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('learners.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\lila-laravel\resources\views/learners/pages/my-interests.blade.php ENDPATH**/ ?>