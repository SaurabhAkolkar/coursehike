<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Subtitle extends Model
{
	protected $table = 'subtitles';
	
    protected $fillable = ['sub_lang', ' sub_t', 'c_id'];

    public function courseclass()
    {
    	return $this->belongsTo('App\CourseClass','c_id','id');
    }

    // public function getFileUrlAttribute($value)
    // {
    //     return Storage::temporaryUrl(
    //         config('path.course.subtitles').$this->c_id. '/' . $value, now()->addMinutes(5)
    //     );
    //     // return Storage::url(config('path.course.video').$this->course_id. '/' . $value);
    // }
    
}
