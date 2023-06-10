<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatorPayout extends Model
{
    protected $fillable = ['user_id','start_date', 'end_date','subscription_amount','course_amount','status','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
