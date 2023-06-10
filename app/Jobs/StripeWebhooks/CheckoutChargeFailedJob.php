<?php

namespace App\Jobs\StripeWebhooks;

use App\UserInvoiceDetail;
use App\UserSubscription;
use App\UserSubscriptionInvoice;
use Carbon\Carbon;
use Cartalyst\Stripe\Stripe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\Models\WebhookCall;

class CheckoutChargeFailedJob implements ShouldQueue
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

        if (!array_key_exists("client_reference_id", $invoice))
            return;

        $customer_id = $invoice['customer'];
        $client_reference_id = $invoice['client_reference_id'];
        $payment_status = $invoice['payment_status'];
        $amount_total = $invoice['amount_total'];
        $livemode = $invoice['livemode'];

        // TODO: Update Invoice successfull

        $user_invoice = UserInvoiceDetail::where('id', $client_reference_id)->first();

        if($payment_status != 'paid' && 
            $user_invoice->status != 'paid' 
            // && $livemode == false 
            // intval($user_invoice->total * 100) == $amount_total &&
            // && $user_invoice->user->stripe_id == $customer_id
        )
        {
            $user_invoice->status = 'failed';
            $user_invoice->save();
        }

        
    }
}
