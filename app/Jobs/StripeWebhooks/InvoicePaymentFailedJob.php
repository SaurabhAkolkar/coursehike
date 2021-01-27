<?php

namespace App\Jobs\StripeWebhooks;

use App\UserSubscription;
use App\UserSubscriptionInvoice;
use Carbon\Carbon;
use Cartalyst\Stripe\Stripe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\Models\WebhookCall;

class InvoicePaymentFailedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $webhookCall;
	private $stripe;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
		$this->stripe = Stripe::make(config('services.stripe.secret'));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // you can access the payload of the webhook call with `$this->webhookCall->payload`
        $invoice = $this->webhookCall->payload['data']['object'];

        $customer_id = $invoice['customer'];
		// $customer = $this->stripe->customers()->find($customer_id);

        $subscription_id = $invoice['subscription'];
        
        $subscription = $this->stripe->subscriptions()->find($customer_id, $subscription_id);

		$subscription_start = $subscription['current_period_start'];
		$subscription_end = $subscription['current_period_end'];
        $subscription_status = $subscription['status']; //active
        
        $invoice_charge = $invoice['charge']; // charge_id
        $payment_intent_id = $invoice['payment_intent']; // payment_intent_id
        $invoice_amount_paid = $invoice['amount_paid'];
        
		$invoice_paid = $invoice['paid']; // true
        $invoice_status = $invoice['status']; //paid
        
        if($subscription_status != 'active' || $invoice_status != 'paid' || !$invoice_paid){
            $user = UserSubscription::where('stripe_subscription_id', $subscription_id)->first()->user ?? 0;
            
            $user->subscription('main')->cancel(true);
            // if($user != 0 && $user->subscription('main')->ended()){
                
                // Create Invoice Record
                UserSubscriptionInvoice::create([
                    'user_id' => $user->id ?? 0,
                    'subscription_id' => $user->subscription('main')->id,
                    'stripe_subscription_id' => $subscription['id'],
                    'start_date' => Carbon::createFromTimestamp($subscription_start)->toDateTimeString(),
                    'end_date' => Carbon::createFromTimestamp($subscription_end)->toDateTimeString(),
                    'stripe_invoice_id' => $invoice['id'],
                    'invoice_charge_id' => $invoice_charge,
                    'payment_intent_id' => $payment_intent_id,
                    'invoice_paid' => $invoice_amount_paid,
                    'status' => 'failed',
                ]);
                
            // }
        }
    }
}
