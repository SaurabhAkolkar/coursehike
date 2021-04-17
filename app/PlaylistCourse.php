<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistCourse extends Model
{
    protected $fillable = ['playlist_id','course_id','bundle_course_id'];

    public function courses()
    {
        return $this->hasOne('App\Course','id','course_id');
    }
}
