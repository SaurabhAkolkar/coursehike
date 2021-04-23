<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = 'carts';

    protected $fillable = ['user_id', 'course_id', 'bundle_id','type','price','category_id','status','created_at','updated_at' ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function courses()
    {
       	return $this->belongsTo('App\Course','course_id','id');
    }

    public function bundle(){
        return $this->belongsTo('App\BundleCourse','bundle_id','id');

    }

    public function getClassCountAttribute()
    {
        if($this->bundle_id >0){
        	$course = BundleCourse::where(['id'=>$this->bundle_id])->first();

            return count($course->course_id);
        }else{
        	return 'All Chapters';
        }
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
