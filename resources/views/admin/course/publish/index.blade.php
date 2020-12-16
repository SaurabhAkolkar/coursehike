<section class="content">
    <div class="row">
        <div class="col-9">
            <h3 class="la-admin__publish-title"> Rules to publish course</h3>

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
        </div>

        <div class="col-9 text-right pt-16">
            @if(!$publisRequest)
                @if(Auth::User()->role == "admin")
                    @if($cor->published == null )
                        <form action="/approve-course-to-publish" method="post">
                            @csrf
                            <input type="hidden" name="course_id" value="{{$cor->id}}" />
                            <button type="submit" class="la-admin__publish-btn">Publish</button>
                        </form>
                    @else
                        <form action="/unpublish-course" method="post">
                            @csrf
                            <input type="hidden" name="course_id" value="{{$cor->id}}" />
                            <button type="submit" class="la-admin__publish-btn">Unpublish</button>
                        </form>
                    @endif
                @else
                    <form action="/send-course-to-publish" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$cor->id}}" />
                        <button type="submit" class="la-admin__publish-btn">Publish</button>
                    </form>
                @endif
            @else
                <h3>Already Sent To Publish Approval</h3>
            @endif
        </div>
    </div>
</section> 
  
  