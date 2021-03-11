<?php

declare(strict_types=1);

return [

    // Manage autoload migrations
    'autoload_migrations' => true,

    // Subscriptions Database Tables
    'tables' => [

        'plans' => 'plans',
        'plan_features' => 'plan_features',
        'plan_subscriptions' => 'plan_subscriptions',
        'plan_subscription_usage' => 'plan_subscription_usage',

    ],

    // Subscriptions Models
    'models' => [

        'plan' => \Rinvex\Subscriptions\Models\Plan::class,
        'plan_feature' => \Rinvex\Subscriptions\Models\PlanFeature::class,
        'plan_subscription' => \Rinvex\Subscriptions\Models\PlanSubscription::class,
        'plan_subscription_usage' => \Rinvex\Subscriptions\Models\PlanSubscriptionUsage::class,

    ],

    'plans' => [
        'monthly-global' => env('STRIPE_PLAN_MONTHLY_GLOBAL', true),
        'yearly-global' => env('STRIPE_PLAN_YEARLY_GLOBAL', true),
        'monthly-india' => env('STRIPE_PLAN_MONTHLY_INDIA', true),
        'yearly-india' => env('STRIPE_PLAN_YEARLY_INDIA', true),
    ],

    'stripe_global_monthly' => env('STRIPE_PLAN_MONTHLY_GLOBAL', true),
    'stripe_global_yearly' => env('STRIPE_PLAN_YEARLY_GLOBAL', true),
    'stripe_india_monthly' => env('STRIPE_PLAN_MONTHLY_INDIA', true),
    'stripe_india_yearly' => env('STRIPE_PLAN_YEARLY_INDIA', true),

];
