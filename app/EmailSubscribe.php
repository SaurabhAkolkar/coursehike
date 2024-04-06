<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSubscribe extends Model
{
    protected $fillable = ['email','status','user_id'];
}
