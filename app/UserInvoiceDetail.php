<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInvoiceDetail extends Model
{
    protected $fillable = [
        'id', 'user_id', 'sub_total', 'taxes', 'total', 'discount', 'discount_type', 'coupon_applied', 'coupon_id', 'status','created_at', 'updated_at'
    ];
}
