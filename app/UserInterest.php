<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    protected $fillable = [
        'id', 'category_id', 'user_id', 'created_at', 'updated_at'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Categories','category_id','id');
    }
}
