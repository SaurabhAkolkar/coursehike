<?php

namespace App\Imports;

use App\Allcity;
use App\Allcountry;
use App\Allstate;
use App\User;
use App\UserSubscription;
use App\UserSubscriptionInvoice;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // print_r($rows->count());

        foreach ($rows as $row) 
        {
            if(empty($row[9]))
                continue;

            $plan_price_id = '';
            $plan_slug = '';
            if($row[6] == 'Monthly' && $row[5] != 'India'){
                $plan_price_id = config('rinvex.subscriptions.stripe_global_monthly');
                $plan_slug = 'monthly-global';
            }elseif($row[6] == 'Annual' && $row[5] != 'India'){
                $plan_price_id = config('rinvex.subscriptions.stripe_global_yearly');
                $plan_slug = 'yearly-global';
            }elseif($row[6] == 'Monthly' && $row[5] == 'India'){
                $plan_price_id = config('rinvex.subscriptions.stripe_india_monthly');
                $plan_slug = 'monthly-india';
            }elseif($row[6] == 'Annual' && $row[5] == 'India'){
                $plan_price_id = config('rinvex.subscriptions.stripe_india_yearly');
                $plan_slug = 'yearly-india';
            }


            $plan = app('rinvex.subscriptions.plan')->where('slug', $plan_slug)->first();
            if(!$plan)
            continue;
            
            $country = Allcountry::where('nicename', 'like', '%' . $row[5] . '%')->first()->id ?? 0;

            $user = User::create([
                'fname'     => $row[0],
                'email'    => $row[1], 
                'mobile' => $row[2], 
                'password' => \Hash::make($row[0].''.$row[1]),
                'country_id' => $country,
            ]);

            

            $plan_subscription = $user->newSubscription('main', $plan);

            $plan_subscription->starts_at = Carbon::createFromFormat('m/d/Y', $row[7])->toDateTimeString(); 
            $plan_subscription->ends_at = Carbon::createFromFormat('m/d/Y', $row[9])->toDateTimeString(); 
            $plan_subscription->trial_ends_at = Carbon::now()->toDateTimeString();
            $plan_subscription->save();

            UserSubscription::create([
                'user_id' => $user->id,
                'subscription_id' => 'Admin-Purchased',
                'plan_id'    => $plan_price_id,
            ]);

            UserSubscriptionInvoice::create([
                'user_id' => $user->id,
                'subscription_id' => $user->subscription()->id,
                'stripe_subscription_id' => 'Admin-Purchased',
                'start_date' => Carbon::createFromFormat('m/d/Y', $row[7])->toDateTimeString(),
                'end_date' => Carbon::createFromFormat('m/d/Y', $row[9])->toDateTimeString(),
                'stripe_invoice_id' => 0,
                'invoice_charge_id' => 0,
                'payment_intent_id' => 0,
                'invoice_paid' => 0,
                // 'plan_selection' => $plan_price_id,
                'status' => 'paid',
            ]);
        }
    }
}