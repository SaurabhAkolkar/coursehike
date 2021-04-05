@if(count($courses) > 0)
    <div class="row">
    @foreach ($courses as $c)
        <div class="row mb-3">
            <div class="col-md-3">
                <img src="{{$c[0]->image}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-9">
                <p><strong>Title</strong>: {{$c[0]->title}}</p>
                <p class="mb-0"><strong>Uesed In</strong>:</p>

                
                    @foreach ($c[0]->getClasses() as $cc)
                        @if($loop->last)
                            {{$cc->title}}
                        @else
                            {{$cc->title.','}}
                        @endif
                    @endforeach
                    <form action ="{{route('save.exiting.video')}}" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$course_id}}"/>
                        <input type="hidden" name="video_id" value="{{$c[0]->id}}" />
                        <input type="submit" value="Select Video" class="btn btn-md btn-primary"/>
                    </form>
                
            </div>
        </div>  
    @endforeach
    </div>
@else
    <p class="text-center alert-danger">No Vidoes Found with this title</p>
@endif