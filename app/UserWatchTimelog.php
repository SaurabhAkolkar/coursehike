<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWatchTimelog extends Model
{
    protected $fillable = ['id', 'course_id', 'class_id', 'user_id', 'position', 'time', 'created_at', 'updated_at'];

    public function course()
    {
    	return $this->belongsTo('App\Course','course_id','id');
    }
}
