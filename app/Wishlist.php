<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';
    
    protected $fillable = [
      'user_id', 'course_id', 'status','bundle_course_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course','course_id','id');

    }

    public function bundle()
    {
        return $this->belongsTo('App\BundleCourse','bundle_course_id','id');
    }


    public function order()
    {
        return $this->hasMany('App\Order','course_id');
    }
}
