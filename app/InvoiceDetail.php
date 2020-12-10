<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'id', 'invoice_id', 'course_id', 'class_id', 'purchase_type', 'price','created_at', 'updated_at'
    ];

    public function course()
    {
        return $this->hasOne('App\Course','id','course_id');
    }

    public function chapter()
    {
        return $this->hasOne('App\CourseChapter','id','class_id');
    }
}
