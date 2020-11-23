<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistCourse extends Model
{
    protected $fillable = ['playlist_id','course_id'];

    public function courses()
    {
        return $this->hasMany('App\Course','id','course_id');
    }
}
