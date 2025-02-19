<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubscriptionInvoice extends Model
{
	protected $table = 'user_subscription_invoices';
	
    protected $fillable = ['user_id', 'subscription_id', 'stripe_subscription_id', 'stripe_invoice_id', 'start_date', 'end_date', 'status', 'invoice_charge_id', 'plan_selection','payment_intent_id', 'invoice_paid', 'invoice_currency'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function subscription(){
        return $plan = app('rinvex.subscriptions.plan')->where('id', $this->subscription_id)->first();
    }
}
