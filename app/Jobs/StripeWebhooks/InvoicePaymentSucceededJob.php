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
use Illuminate\Support\Facades\Mail;
use App\Mail\UserSubscribed;
use App\User;

class InvoicePaymentSucceededJob implements ShouldQueue
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
        $currency = strtoupper($invoice['currency']);
        
		$invoice_paid = $invoice['paid']; // true
        $invoice_status = $invoice['status']; //paid
        
        $user_subscription = UserSubscription::where('subscription_id', $subscription['id'])->first();

        if($subscription_status == 'active' && $invoice_status == 'paid' && $invoice_paid && $user_subscription){

                $user = $user_subscription->user;
                $plan_subscription = $user->subscription();

                $plan_subscription->starts_at = Carbon::createFromTimestamp($subscription_start)->toDateTimeString(); 
                $plan_subscription->ends_at = Carbon::createFromTimestamp($subscription_end)->toDateTimeString(); 
                $plan_subscription->trial_ends_at = Carbon::createFromTimestamp($subscription['trial_end'])->toDateTimeString(); 
                $plan_subscription->save();

                
            // if($user->subscription()->ended()){
                // Create Invoice Record
                if($invoice_amount_paid > 0)
                    UserSubscriptionInvoice::create([
                        'user_id' => $user->id,
                        'subscription_id' => $user->subscription()->id,
                        'stripe_subscription_id' => $subscription['id'],
                        'start_date' => Carbon::createFromTimestamp($subscription_start)->toDateTimeString(),
                        'end_date' => Carbon::createFromTimestamp($subscription_end)->toDateTimeString(),
                        'stripe_invoice_id' => $invoice['id'],
                        'invoice_charge_id' => $invoice_charge,
                        'payment_intent_id' => $payment_intent_id,
                        'invoice_paid' => $invoice_amount_paid,
                        'status' => $invoice_status,
                    ]);

                $plan_price_id = [
					config('rinvex.subscriptions.stripe_global_monthly') => 'monthly-global',
					config('rinvex.subscriptions.stripe_global_yearly') => 'yearly-global',
					config('rinvex.subscriptions.stripe_india_monthly') => 'monthly-india',
					config('rinvex.subscriptions.stripe_india_yearly') => 'yearly-india',
				];

                $newPlan = $subscription['plan']['id'];

                $user_subscription->plan_id = $newPlan;
                $user_subscription->save();

                if(preg_match("/yearly/i",$plan_price_id[$newPlan])){
                    $plan = 'Annual';
                }else{
                    $plan = 'Monthly';
                }
                
                $email_data = [
                    'name' => $user->fullName,
                    'email' => $user->email,
                    'type' => $plan,
                    'currency' => $currency,
                    'amount' => ($invoice_amount_paid/100),
                ];
                
                try{    
                    Mail::to($user->email)->later(now()->addSeconds(5), new UserSubscribed($email_data));                    
                }catch(\Swift_TransportException $e){
                    
                }
            // }
        }
    }
}
