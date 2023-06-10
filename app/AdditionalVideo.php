<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CourseClass;
use Storage;

class AdditionalVideo extends Model
{
    protected $table = 'additional_videos';
	
    protected $fillable = ['course_class_id', 'vid_lang', 'lang_code','video_path','stream_url','created_at','updated_at'];

    
    public function getVideoPathAttribute($value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL)) { 
            return  $value;
        }
        $course_class = CourseClass::find($this->course_class_id);
        return Storage::temporaryUrl(

            config('path.course.video').$course_class->course_id. '/' . $value, now()->addMinutes(60)
        );
        // return Storage::url(config('path.course.video').$this->course_id. '/' . $value);
    }


}
