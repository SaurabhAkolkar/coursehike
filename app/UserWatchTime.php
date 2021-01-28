<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWatchTime extends Model
{
	protected $table = 'user_watch_timelogs';
	
    protected $fillable = ['user_id', 'course_id', 'class_id', 'position', 'time'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id');
    }

    public function courseclass()
    {
    	return $this->belongsTo('App\CourseClass','class_id','id');
    }
}
