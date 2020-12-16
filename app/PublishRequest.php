<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublishRequest extends Model
{
    protected $fillable = ['user_id','course_id','request_type','status'];

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id');
    }
}
