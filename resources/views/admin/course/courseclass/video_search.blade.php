@if(count($courses) > 0)

    @foreach ($courses as $c)
        <div class="row la-admin__evideo-search mb-6">
            <div class="col-3 h-100">
                <div class="la-admin__evideo-img">
                    <img src="{{$c->image}}" alt="" class="img-fluid mx-auto d-block">
                </div>
            </div>
            <div class="col-9">
                <div class="la-admin__evideo-title d-flex align-items-start mb-2">
                    <strong>Title: </strong>
                    <span class="text-md pl-1">{{$c->title}}</span>
                </div>
                <div class="la-admin__evideo-used">
                    
                    <span><strong>Course:</strong>
                        <span>{{$c->courses->title}}</span>                            
                    </span><br>

                    <span><strong>Chapter Name:</strong>
                        <span>{{$c->coursechapters->chapter_name}}</span>                            
                    </span>
                </div>
            </div>

            <div class="col-12 text-right mt-3">
                    <form action ="{{route('save.exiting.videos')}}" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$course_id}}"/>
                        <input type="hidden" name="video_id" value="{{$c->id}}" />

                        <input type="hidden" name="chapter_id" value="{{$chapter_id}}" />
                        <input type="submit" value="Select Video" class="btn btn-sm btn-primary py-2 px-6"/>

                    </form>
            </div>

            </div>
        </div>  
    @endforeach

    @else
        <p class="text-center alert-danger">No Vidoes Found with this title</p>
@endif