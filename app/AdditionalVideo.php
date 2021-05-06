<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalVideo extends Model
{
    protected $table = 'additional_videos';
	
    protected $fillable = ['course_class_id', 'vid_lang', 'lang_code','video_path','stream_url','created_at','updated_at'];

    public function courseclass()
    {
    	return $this->belongsTo('App\CourseClass','c_id','id');
    }
}
