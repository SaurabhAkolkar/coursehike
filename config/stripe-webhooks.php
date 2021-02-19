<?php

return [

    /*
     * Stripe will sign each webhook using a secret. You can find the used secret at the
     * webhook configuration settings: https://dashboard.stripe.com/account/webhooks.
     */
    'signing_secret' => env('STRIPE_WEBHOOK_SECRET'),

    /*
     * You can define the job that should be run when a certain webhook hits your application
     * here. The key is the name of the Stripe event type with the `.` replaced by a `_`.
     *
     * You can find a list of Stripe webhook types here:
     * https://stripe.com/docs/api#event_types.
     */
    'jobs' => [
        'customer_subscription_updated' => \App\Jobs\StripeWebhooks\CustomerSubscriptionUpdatedJob::class,
        'invoice_paid' => \App\Jobs\StripeWebhooks\InvoicePaymentSucceededJob::class,
        'invoice_payment_failed' => \App\Jobs\StripeWebhooks\InvoicePaymentFailedJob::class,
        // 'checkout_session_completed' => \App\Jobs\StripeWebhooks\CheckoutChargeSucceededJob::class,
        // 'invoice_payment_action_required' => \App\Jobs\StripeWebhooks\InvoiceRequireActionJob::class,
        // 'source_chargeable' => \App\Jobs\StripeWebhooks\HandleChargeableSource::class,
        
        'checkout_session_completed' => \App\Jobs\StripeWebhooks\CheckoutChargeSucceededJob::class,
        // 'charge_succeeded' => \App\Jobs\StripeWebhooks\CheckoutChargeSucceededJob::class,
        'charge_failed' => \App\Jobs\StripeWebhooks\CheckoutChargeFailedJob::class,
    ],

    /*
     * The classname of the model to be used. The class should equal or extend
     * Spatie\StripeWebhooks\ProcessStripeWebhookJob.
     */
    'model' => \Spatie\StripeWebhooks\ProcessStripeWebhookJob::class,
];
