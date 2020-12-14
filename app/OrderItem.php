<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['invoice_id','course_id','class_id','category_id', 'purchase_type', 'price', 'offer_price','disamount','distype', 'created_at','updated_at' ];

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id');
    }

    public function chapter()
    {
        return $this->belongsTo('App\CourseChapter','class_id','id');
    }
}
