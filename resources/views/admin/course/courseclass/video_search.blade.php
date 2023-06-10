@if(count($courses) > 0)
   <div class="row">
    @foreach ($courses as $c)
        <div class="col-md-6 px-md-1">
            <div class="row la-admin__evideo-search mb-4 mx-md-1">
                <div class="col-4 px-0 h-100">
                    <div class="la-admin__evideo-img mx-auto ">
                        <a href="/courseclass/{{$c->id}}" target="_{{$c->title}}"><img src="{{$c->image}}" alt="{{$c->title}}" class="img-fluid mx-auto d-block"></a>
                    </div>
                </div>
                <div class="col-8 px-0">
                    <div class="la-admin__evideo-title d-flex align-items-start mb-2">
                        <span class="text-sm" style="font-weight:var(--font-semibold);">Title: </span>
                        <span class="text-sm pl-1">{{$c->title}}</span>
                    </div>
                    <div class="la-admin__evideo-title d-flex align-items-start">
                        <span class="text-sm"  style="font-weight:var(--font-semibold);">Course: </span>
                        <span class="text-sm pl-1">{{$c->courses->title}}</span>                            
                    </div>
                    <div class="la-admin__evideo-title d-flex align-items-start">
                        <span class="text-sm"  style="font-weight:var(--font-semibold);">Chapter Name: </span>
                        <span class="text-sm pl-1">{{$c->coursechapters->chapter_name}}</span>                            
                    </div>
                </div>

                <div class="col-12 text-right mt-4">
                        <form action ="/save-existing-videos" method="post">
                            @csrf
                            <input type="hidden" name="course_id" value="{{$course_id}}"/>
                            <input type="hidden" name="video_id" value="{{$c->id}}" />

                            <input type="hidden" name="chapter_id" value="{{$chapter_id}}" />
                            <input type="submit" value="Select Video" class="btn btn-sm btn-primary py-1 px-4" style="font-size:14px !important;border-radius:6px !important;letter-spacing:0;"/>

                        </form>
                </div>
            </div>
        </div>  
    @endforeach
   </div>
    @else
        <p class="text-center alert-danger">No Vidoes Found with this title</p>
@endif