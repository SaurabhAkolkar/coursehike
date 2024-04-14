<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasedCourse extends Model
{
    protected $fillable = ['course_id', 'user_id', 'order_id', 'transaction_id'
    , 'payment_method', 'amount', 'paid_amount', 'coupon_discount', 'currency'
    , 'currency_icon', 'status', 'duration','json_response'];
}
