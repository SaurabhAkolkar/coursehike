<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublishRequest extends Model
{
    protected $fillable = ['user_id','course_id','request_type','status'];

    public function course()
    {
    	return $this->hasOne('App\Course','id','course_id');
    }
    public function user()
    {
    	return $this->hasOne('App\User','id','user_id');
    }
}
