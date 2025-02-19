<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
	protected $table = 'instructors';
	
    protected $fillable = [ 'user_id', 'fname', 'lname', 'display_name','yoe', 'awards', 'portfolio_links', 'expert_in', 'email', 'dob', 'mobile', 'gender', 'detail', 'file', 'image', 'status', ];

    public function courses()
    {
        return $this->hasMany('App\Course','user_id');

    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    } 
}
