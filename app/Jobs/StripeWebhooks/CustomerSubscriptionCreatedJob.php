<?php

namespace App\Jobs\StripeWebhooks;

use App\User;
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

use Rinvex\Subscriptions\Models\PlanSubscription;

class CustomerSubscriptionCreatedJob implements ShouldQueue
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
        $subscription = $this->webhookCall->payload['data']['object'];

        $customer_id = $subscription['customer'];

        $user = User::where('stripe_id', $customer_id)->first();
        
        if($user){
        
            $subscription_start = $subscription['current_period_start'];
            $subscription_end = $subscription['current_period_end'];

			$current_plan = $subscription['plan'];


            $plan_price_id = [
                config('rinvex.subscriptions.stripe_global_monthly') => 'monthly-global',
                config('rinvex.subscriptions.stripe_global_yearly') => 'yearly-global',
                config('rinvex.subscriptions.stripe_india_monthly') => 'monthly-india',
                config('rinvex.subscriptions.stripe_india_yearly') => 'yearly-india',
            ];
            $plan = app('rinvex.subscriptions.plan')->where('slug', $plan_price_id[$current_plan['id']])->first();
            
            $plan_subscription = $user->subscription();

            if(!$plan_subscription){
                $user->newSubscription('main', $plan);
            }else{
                $plan_subscription->starts_at = Carbon::createFromTimestamp($subscription_start)->toDateTimeString(); 
                $plan_subscription->ends_at = Carbon::createFromTimestamp($subscription_end)->toDateTimeString(); 
                $plan_subscription->trial_ends_at = Carbon::createFromTimestamp($subscription['trial_end'])->toDateTimeString(); 
                $plan_subscription->save();
            }

            UserSubscription::updateOrCreate(
                ['user_id' => $user->id],
                ['payment_method_id' => $subscription['default_payment_method'], 'subscription_id' => $subscription['id'], 'plan_id' => $current_plan['id']]
            );
                
        }else{
            echo "invalid";
            return;
        }
    }
}
