<section class="content">
    <div class="row">
        <div class="col-8">
       
            <?php if(!$publisRequest): ?>
                <h3 class="la-admin__publish-title"> Rules to publish Course</h3>

                <div class="la-admin__publish-list">
                    <div class="la-admin__publish-item d-inline-flex align-items-start">
                        <span class="la-admin__publish-dot pr-2">&#8226;</span> 
                        <span class="la-admin__publish-desc" >Visit this link: <a class="la-admin__publish-link" href="https://www.learnitlikealiens.com" target="_blank">https://www.learnitlikealiens.com</a></span>
                    </div><br/>

                    <div class="la-admin__publish-item d-inline-flex align-items-start">
                        <span class="la-admin__publish-dot pr-2">&#8226;</span> 
                        <span class="la-admin__publish-desc" >Sign up</span>
                    </div><br/>

                    <div class="la-admin__publish-item d-inline-flex align-items-start">
                        <span class="la-admin__publish-dot pr-2">&#8226;</span> 
                        <span class="la-admin__publish-desc" >Request access as a mentor & await approval</span>
                    </div><br/>

                    <div class="la-admin__publish-item d-inline-flex align-items-start">
                        <span class="la-admin__publish-dot pr-2">&#8226;</span> 
                        <span class="la-admin__publish-desc" >Upload your video</span>
                    </div><br/>

                </div>
            <?php else: ?>
                    <h3 class="la-admin__publish-title"> Rules to unpublish course</h3>

                    <div class="la-admin__publish-list">
                        <div class="la-admin__publish-item d-inline-flex align-items-start">
                            <span class="la-admin__publish-dot pr-2">&#8226;</span> 
                            <span class="la-admin__publish-desc" >Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                        </div>

                        <div class="la-admin__publish-item d-inline-flex align-items-start">
                            <span class="la-admin__publish-dot pr-2">&#8226;</span> 
                            <span class="la-admin__publish-desc" >Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                        </div>

                        <div class="la-admin__publish-item d-inline-flex align-items-start">
                            <span class="la-admin__publish-dot pr-2">&#8226;</span> 
                            <span class="la-admin__publish-desc" >Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</span>
                        </div>

                        <div class="la-admin__publish-item d-inline-flex align-items-start">
                            <span class="la-admin__publish-dot pr-2">&#8226;</span> 
                            <span class="la-admin__publish-desc" >Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                        </div>

                    </div>
            <?php endif; ?>
        </div>

        <div class="col-8 text-right pt-12">
            <?php if(!$publisRequest): ?>
                 <?php if($cor->status != 1): ?>   
                    <form action="/send-course-to-publish" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="course_id" value="<?php echo e($cor->id); ?>" />
                        <button type="submit" class="la-admin__publish-btn">Publish</button>
                    </form>
                <?php else: ?>
                    <form action="/send-course-to-unpublish" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="course_id" value="<?php echo e($cor->id); ?>" />
                        <button type="submit" class="la-admin__publish-btn">Unpublish</button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <?php if($publisRequest->request_type == 'publish'): ?>
                    <form action="/send-course-to-unpublish" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="course_id" value="<?php echo e($cor->id); ?>" />
                        <button type="submit" class="la-admin__publish-btn">Unpublish</button>
                    </form>
                <?php else: ?>
                    <h3>Your Request to unpublish is already sent.</h3>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section> 
  
  <?php /**PATH E:\lila-laravel\resources\views/admin/course/publish/index.blade.php ENDPATH**/ ?>