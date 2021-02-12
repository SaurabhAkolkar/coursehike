<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorDetail extends Model
{
    protected $fillable = ['user_id','subscription_commission','course_commission','created_at', 'updated_at'];

}
