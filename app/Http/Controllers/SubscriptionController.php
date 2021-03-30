<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
use Cartalyst\Stripe\Exception\NotFoundException;
use Exception;
use Auth;

use App\Course;
use App\Search;
use App\Question;
use App\User;
use App\UserSubscription;
use App\UserSubscriptionInvoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Stevebauman\Location\Facades\Location;

class SubscriptionController extends Controller
{
	private $stripe;

	public function __construct()
	{
		$this->stripe = Stripe::make(config('services.stripe.secret'));
	}

	public function plans($slug)
	{
		$plan = app('rinvex.subscriptions.plan')->where("slug", $slug)->first();
		$countries = DB::table('allcountry')->get();
		if($plan){
			$has_trial = !app('rinvex.subscriptions.plan_subscription')->where("user_id", Auth::user()->id)->exists();
			return view('learners.pages.payment', compact('plan','countries','has_trial'));
		}else
			return redirect('learning-plans');
	}

	public function paymentStripe()
	{
		return view('paymentstripe');
	}


	public function plan_subscription(Request $request)
	{
		$plan = app('rinvex.subscriptions.plan')->where("slug", $request->slug)->first();

		// If customer already subscribed redirect to billing portal
		// Check user inr/usd and 
		// Tax rates

		$tax_rates = [];
        if ($position = Location::get()) {
            $country = $position->countryCode;
			if($country == 'IN')
				$tax_rates = [config('rinvex.subscriptions.stripe_tax_rate')];
        }
		
		$stripe_plan_id = config('rinvex.subscriptions.plans.'.$request->slug);

		$session_data = [
			'payment_method_types' => ['card'],
            'line_items' => [
				[
					'price' => $stripe_plan_id,
					'quantity' => 1,
					'tax_rates' => $tax_rates
				]
			],
			'allow_promotion_codes' => true,
            'mode' => 'subscription',
            'success_url' => config('app.url') . "/subscription-successful/{CHECKOUT_SESSION_ID}",
            'cancel_url' => config('app.url') . "/learning-plans",
			'subscription_data' => [
				'trial_period_days' => 7
			]
		];

		$user = Auth::user();
		$stripe_id = $user->stripe_id;

		if(!empty($stripe_id)){
			try {
				// Customer Present
				// $customer = $this->stripe->customers()->find($stripe_id);


				// if (!array_key_exists('deleted', $customer))
				// 	$session_data['customer'] = $stripe_id;
				// else
				// 	$session_data['customer_email'] = $user->email;

				// Already subscribed before
				// $user_subscription = UserSubscription::where('user_id', $user->id)->first();
				// $stripe_subscription = $this->stripe->subscriptions()->find($stripe_id, $user_subscription->subscription_id ?? 0);
				
				$session_data['customer'] = $stripe_id;
				$subscriptions = $this->stripe->subscriptions()->all($stripe_id)['data'];

				// if (!array_key_exists('deleted', $customer)  && $user->subscription() && $user_subscription && $stripe_subscription){
				// if (!array_key_exists('deleted', $customer)  && $user->subscription() && count($subscriptions) > 0){
				if ($user->subscription() && count($subscriptions) > 0){
					$response = [
						"redirect" => true,
					];
					return response()->json($response, 200);
				}
			} catch (NotFoundException $e) {
				$message = $e->getMessage();
				if (!array_key_exists("customer_email", $session_data) && !array_key_exists("customer", $session_data))
					$session_data['customer_email'] = $user->email;
			}
		}else
			$session_data['customer_email'] = $user->email;
		
		try {
			$checkout_session = $this->stripe->checkout()->sessions()->create($session_data);
			$response = [
				"id" => $checkout_session['id'],
				"redirect" => false,
			];
			return response()->json($response, 200);
		} catch (Exception $e) {
			$response = [
				"message" => $e->getMessage(),
			];
			return response()->json($response, 500);
		}
		
	}

	public function success($checkout_session)
	{

		$checkout_session = $this->stripe->checkout()->sessions()->find($checkout_session);
		$user = Auth::user();
		$stripe_id = $user->stripe_id;

		try {
			// if ($stripe_id == null || $stripe_id != $checkout_session['customer']){
			// 	$user->stripe_id = $checkout_session['customer'];
			// 	$user->save();
			// 	$stripe_id = $checkout_session['customer'];
			// }

			$subscription_id = $checkout_session['subscription'];

			$subscription = $this->stripe->subscriptions()->find($stripe_id, $subscription_id);

			$subscription_start = $subscription['current_period_start'];
			$subscription_end = $subscription['current_period_end'];

			$current_plan = $subscription['plan'];

			if ($subscription['status'] == 'trialing') {

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

				$plan_subscription = app('rinvex.subscriptions.plan_subscription')->where("user_id", $user->id)->latest()->first();
				return view('learners.messages.subscription-trial', compact('plan_subscription'));

			} else {
				return redirect('/user-dashboard');
			}
		} catch (Exception $e) {
			Session::flash('errors', $e->getMessage());
			print_r($e->getMessage());
			// return redirect()->back();
		} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back();
		} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back();
		}
	}

	public function postPaymentStripe(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'stripeToken' => 'required',
			'subscription_plan' => 'required',
			'street_name' => 'required',
			'zipcode' => 'required',
			'city' => 'required',
			'state' => 'required',
			'country' => 'required',
		]);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}

		// TODO: If the user already have subscription, then remove the existing one.
		// Changing from one subscription plan to another.
		// 		- Remove trial period
		// 		- Add plans to stripe without trial dates
		// 		- Charge them immediately.
		// 		- https://stripe.com/docs/billing/subscriptions/billing-cycle
		try {

			$stripe_id = Auth::user()->stripe_id;
			if ($stripe_id == null){
				$customer = $this->stripe->customers()->create([
					'email' => Auth::user()->email,
					'name' => Auth::user()->fname,
					'address' => [
						'line1' => $request->street_name,
						'postal_code' => $request->zipcode,
						'city' => $request->city,
						'state' => $request->state,
						'country' => $request->country,
					],
				]);
				$user = Auth::user();
				$user->stripe_id = $customer['id'];
				$user->save();
				$stripe_id = $customer['id'];
			}


			$token = $request->stripeToken;
			$paymentMethod = $this->stripe->paymentMethods()->create([
				'type' => 'card',
				'card' => [
					'token' => $token
				],
				'billing_details' => [
					'email' => Auth::user()->email,
					'name' => Auth::user()->fname,
					'address' => [
						'line1' => $request->street_name,
						'postal_code' => $request->zipcode,
						'city' => $request->city,
						'state' => $request->state,
						'country' => $request->country,
					],
				]
			]);

			$paymentMethodattach = $this->stripe->paymentMethods()->attach($paymentMethod['id'], $stripe_id);

			$this->stripe->customers()->update($stripe_id, [
				// 'email' => Auth::user()->email,
				'invoice_settings' => [
					'default_payment_method' => $paymentMethodattach['id']
				]
			]);

			if($request->subscription_plan == 'monthly-plan')
				$plan_id = 'price_1Hk3QlE6m1twc6cGzy7K0Xwh';
			else if($request->subscription_plan == 'quarterly-plan')
				$plan_id = 'price_1HyL7FE6m1twc6cGxmT4KI6G';
			else if($request->subscription_plan == 'yearly-plan')
				$plan_id = 'price_1Hk3Q8E6m1twc6cGJjmdFY17';
			
			//Check if user already subscribed and got the 7 days trial
			$already_subscribed = app('rinvex.subscriptions.plan_subscription')->where("user_id", Auth::user()->id)->exists();
			$trial_period = $already_subscribed == false ? Carbon::now()->addDays(7)->timestamp : 0;
			
			$subscription = $this->stripe->subscriptions()->create($stripe_id, [
				'plan' => $plan_id,
				'trial_end' => $trial_period,
			]);		

			if ($subscription['status'] == 'trialing' || $subscription['status'] == 'active') {

				$plan = app('rinvex.subscriptions.plan')->where("slug", $request->subscription_plan)->latest()->first();
				Auth::user()->newSubscription('main', $plan, !$already_subscribed);

				$userSubscription = new UserSubscription();
				$userSubscription->user_id = Auth::user()->id;
				$userSubscription->payment_method_id = $paymentMethod['id'];
				$userSubscription->subscription_id = $subscription['id'];
				$userSubscription->save();

				$plan_subscription = app('rinvex.subscriptions.plan_subscription')->where("user_id", Auth::user()->id)->latest()->first();
				return view('learners.messages.subscription-trial', compact('plan_subscription'));

					// return view('learners.messages.subscription-trial', compact('userSubscription', 'plan'));
			} else {
				Session::flash('errors', 'Something went wrong');
				// return redirect()->back();
			}
		} catch (Exception $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back()->withInput();
		} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back()->withInput();
		} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back()->withInput();
		}
	}

	public function cancelSubscription(Request $request)
	{
		$user = Auth::user();
		$userSubscription = UserSubscription::where('user_id', $user->id)->latest()->first();
		$this->stripe->subscriptions()->cancel($user->stripe_id, $userSubscription->subscription_id, true);
		$user->subscription()->cancel();
		return redirect()->back();
	}

	public function hooks(Request $request)
	{
		// $payload = $request->all();
		// $event = null;

		$body = @file_get_contents('php://input');
		$event_json = json_decode($body);
		var_dump($event_json);
		// http_response_code(300); 
		// return;


		// for extra security, retrieve from the Stripe API
		$event_id = $event_json->id;
		// $event = Stripe_Event::retrieve($event_id);

		try {
			$event = \Stripe\Event::constructFrom(
				json_decode($body, true)
			);
		} catch(\UnexpectedValueException $e) {
			// Invalid payload
			http_response_code(400);
			exit();
		}
		
		switch ($event->type) {
			case 'payment_intent.succeeded':
				$paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
				// Then define and call a method to handle the successful payment intent.
				// handlePaymentIntentSucceeded($paymentIntent);
				break;
			
			case 'customer.subscription.updated':
				$subscription = $event->data->object;
				$this->handleSubscriptionUpdated($subscription);
				break;

			case 'customer.subscription.deleted':
				$subscription = $event->data->object;
				break;

			case 'invoice.payment_succeeded':
				$invoiceObject = $event->data->object; // contains a \Stripe\PaymentMethod
				// Then define and call a method to handle the successful attachment of a PaymentMethod.
				handleInvoicePaidUpdated($invoiceObject);
				break;

			// ... handle other event types
			default:
				echo 'Received unknown event type ' . $event->type;
		}
		
		http_response_code(200);
	}

	public function handleSubscriptionUpdated($subscription)
	{
		$customer_id = $subscription->customer;
		$customer = $this->stripe->customers()->find($customer_id);

		$subscription_id = $subscription->id;
		$start = $subscription->current_period_start;
		$end = $subscription->current_period_end;
		$status = $subscription->status;
	}

	public function handleInvoicePaidUpdated($invoiceObject)
	{
		$customer_id = $invoiceObject->customer;
		$customer = $this->stripe->customers()->find($customer_id);

		$subscription_id = $invoiceObject->subscription;

		$start = $invoiceObject->period_start;
		$end = $invoiceObject->period_end;
		$paid = $invoiceObject->paid;
		$status = $invoiceObject->status;
	}

	public function manage_billing()
	{

		$stripe_id = Auth::user()->stripe_id;

		if(!empty($stripe_id)){
			try {

				$customer = $this->stripe->customers()->find($stripe_id);

				if (array_key_exists('deleted', $customer))
					return redirect('/learning-plans');

			} catch (NotFoundException $e) {
				$message = $e->getMessage();
				return redirect('/learning-plans');
			}
		}else
			return redirect('/learning-plans');

		\Stripe\Stripe::setApiKey(config('services.stripe.secret'));

		$session = \Stripe\BillingPortal\Session::create([
			'customer' => $stripe_id,
			'return_url' => config('app.url').'/profile',
		  ]);
		
		return redirect($session->url);
	}

	public function billing()
	{
		$user = Auth::User();
		$active_plan = app('rinvex.subscriptions.plan_subscription')->ofUser($user)->latest()->first(); 
		$card = null;
		$canceled_subscription = null;
		if($active_plan){
			$subscription = UserSubscription::where('user_id', $user->id)->first();
			if($subscription)
				$card = $this->stripe->paymentMethods()->find($subscription->payment_method_id)['card'];
		}
		if($user->subscription()){
				$canceled_subscription = $user->subscription()->canceled();
		}

		$last_payment = UserSubscriptionInvoice::where('user_id', $user->id)->latest()->first();
		return view('learners.pages.billing', compact('active_plan','card','last_payment', 'canceled_subscription'));
	}

	public function payment_history()
	{
		$user = Auth::User();
		$payments = UserSubscriptionInvoice::where('user_id', $user->id)->latest()->get();
		
		return view('learners.pages.payment-history', compact('payments'));
	}

	public function payment_update()
	{
		$countries = DB::table('allcountry')->get();		
		return view('learners.pages.payment-details', compact('countries'));
	}

	public function update_payment_card(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'stripeToken' => 'required',
			'subscription_plan' => 'required',

			'street_name' => 'required',
			'zipcode' => 'required',
			'city' => 'required',
			'state' => 'required',
			'country' => 'required',
		]);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}

		try {

			if (Auth::user()->stripe_id != null)
				$stripe_id = Auth::user()->stripe_id;
			else{
				$customer = $this->stripe->customers()->create([
					'email' => Auth::user()->email,
					'name' => Auth::user()->fname,
					'address' => [
						'line1' => $request->street_name,
						'postal_code' => $request->zipcode,
						'city' => $request->city,
						'state' => $request->state,
						'country' => $request->country,
					],
				]);
				$user = Auth::user();
				$user->stripe_id = $customer['id'];
				$user->save();
				$stripe_id = $customer['id'];
			}


			$token = $request->stripeToken;
			$paymentMethod = $this->stripe->paymentMethods()->create([
				'type' => 'card',
				'card' => [
					'token' => $token
				],
				'billing_details' => [
					'email' => Auth::user()->email,
					'name' => Auth::user()->fname,
					'address' => [
						'line1' => $request->street_name,
						'postal_code' => $request->zipcode,
						'city' => $request->city,
						'state' => $request->state,
						'country' => $request->country,
					],
				]
			]);

			$paymentMethodattach = $this->stripe->paymentMethods()->attach($paymentMethod['id'], $stripe_id);

			$updated = $this->stripe->customers()->update($stripe_id, [
				// 'email' => Auth::user()->email,
				'invoice_settings' => [
					'default_payment_method' => $paymentMethodattach['id']
				]
			]);

			if ($updated) {
				return view('learners.messages.subscription-successful');
			} else {
				Session::flash('errors', 'Something went wrong');
				// return redirect()->back();
			}
		} catch (Exception $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back()->withInput();
		} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back()->withInput();
		} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back()->withInput();
		}
	}
}
