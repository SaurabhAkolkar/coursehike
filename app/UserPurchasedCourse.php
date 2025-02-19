<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPurchasedCourse extends Model
{
    protected $fillable = [
        'id', 'order_id', 'user_id', 'bundle_id','course_id', 'class_id', 'purchase_type','created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function user_invoice_details()
    {
        return $this->belongsTo('App\UserInvoiceDetail','order_id','id');
    }

    public function course()
    {
        return $this->hasOne('App\Course','id','course_id');
    }

    public function bundle()
    {
        return $this->hasOne('App\BundleCourse','id','bundle_id');
    }
    

    public function chapter()
    {
        return $this->hasOne('App\CourseChapter','id','class_id');
    }
}
