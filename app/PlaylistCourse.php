<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistCourse extends Model
{
    protected $fillable = ['playlist_id','course_id','bundle_course_id'];

    public function courses()
    {
        if($this->bundle_course_id > 0){
            return $this->hasOne('App\BundleCourse','id','bundle_course_id');
            
        }else{
            return $this->hasOne('App\Course','id','course_id');
        }
    }

    public function bundle()
    {
        return $this->hasOne('App\BundleCourse','id','bundle_course_id');
    }
    
}
