<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedMentor extends Model
{
    protected $fillable = ['user_id','course_id','status','user_thumbnail','user_image','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function courses()
    {
        return $this->belongsTo('App\Course','course_id','id');
    }   

}
