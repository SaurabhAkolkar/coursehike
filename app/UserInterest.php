<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    protected $fillable = [
        'id', 'course_id', 'user_id', 'created_at', 'updated_at'
    ];
}
