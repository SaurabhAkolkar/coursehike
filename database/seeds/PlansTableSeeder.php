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
            'name' => 'Monthly Plan',
            'description' => 'Monthly Plan',
            'price' => 39,
            'signup_fee' => 0.00,
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'trial_period' => 7,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);

        // $plan = app('rinvex.subscriptions.plan')->create([
        //     'name' => 'Quarterly Plan',
        //     'description' => 'Quarterly plan',
        //     'price' => 80,
        //     'signup_fee' => 0.00,
        //     'invoice_period' => 1,
        //     'invoice_interval' => 'month',
        //     'trial_period' => 7,
        //     'trial_interval' => 'day',
        //     'sort_order' => 1,
        //     'currency' => 'USD',
        // ]);

        $plan = app('rinvex.subscriptions.plan')->create([
            'name' => 'Yearly Plan',
            'description' => 'Yearly plan',
            'price' => 306,
            'signup_fee' => 0.00,
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'trial_period' => 7,
            'trial_interval' => 'day',
            'sort_order' => 1,
            'currency' => 'USD',
        ]);
    }
}
