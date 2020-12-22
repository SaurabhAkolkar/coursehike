<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterClass extends Model
{
    protected $fillable = ['course_id','created_at','updated_at'];

    public function courses()
    {
        return $this->belongsTo('App\Course','course_id');

    } 
}
