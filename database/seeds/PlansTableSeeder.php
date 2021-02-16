<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => 'Monthly - Global',
            'description' => 'Monthly US',
            'price' => 39,
            'signup_fee' => 0.00,
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'grace_period' => 1,
            'grace_interval' => 'day',
            'trial_period' => 7,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);

        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => 'Yearly - Global',
            'description' => 'Yearly US',
            'price' => 309,
            'signup_fee' => 0.00,
            'invoice_period' => 12,
            'invoice_interval' => 'month',
            'grace_period' => 1,
            'grace_interval' => 'day',
            'trial_period' => 7,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);

        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => 'Monthly - India',
            'description' => 'Monthly India',
            'price' => 2899,
            'signup_fee' => 0.00,
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'grace_period' => 1,
            'grace_interval' => 'day',
            'trial_period' => 7,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'INR',
        ]);

        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => 'Yearly - India',
            'description' => 'Yearly India',
            'price' => 22599,
            'signup_fee' => 0.00,
            'invoice_period' => 12,
            'invoice_interval' => 'month',
            'grace_period' => 1,
            'grace_interval' => 'day',
            'trial_period' => 7,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'INR',
        ]);
    }
}
