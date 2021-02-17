<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = 'carts';

    protected $fillable = ['user_id', 'course_id', 'status','created_at','updated_at' ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id');
    }

    public function cartItems()
    {
        return $this->hasMany('App\CartItem','cart_id','id');
    }

    protected static function booted()
    {
        static::deleting(function ($cart) {
            $cart->cartItems()->delete();
        });
    }
}
