<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
	protected $table = 'user_subscriptions';
	
    protected $fillable = ['user_id', 'subscription_id', 'stripe_subscription_id', 'plan_selection','payment_id'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function subscriptionDetails()
    {
        return $this->belongsTo('App\UserSubscriptionInvoice','id','subscription_id');
    }

    public function courses()
    {
    	return $this->belongsTo('App\Course','course_id','id');
    }
}
