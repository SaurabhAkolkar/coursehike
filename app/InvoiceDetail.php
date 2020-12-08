<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'id', 'invoice_id', 'course_id', 'class_id', 'purchase_type', 'price','created_at', 'updated_at'
    ];
}
