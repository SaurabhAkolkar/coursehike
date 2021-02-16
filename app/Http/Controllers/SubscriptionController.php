<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
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

			
			// echo '<pre>';
			// print_r($subscription);

			// $token = $this->stripe->tokens()->create([
			// 	'card' => [
			// 		'number' => $request->get('card_no'),
			// 		'exp_month' => $request->get('ccExpiryMonth'),
			// 		'exp_year' => $request->get('ccExpiryYear'),
			// 		'cvc' => $request->get('cvvNumber'),
			// 	],
			// ]);

			if ($subscription['status'] == 'trialing' || $subscription['status'] == 'active') {

				$plan = app('rinvex.subscriptions.plan')->where("slug", $request->subscription_plan)->latest()->first();
				Auth::user()->newSubscription('main', $plan, !$already_subscribed);

				$userSubscription = new UserSubscription();
				$userSubscription->user_id = Auth::user()->id;
				$userSubscription->payment_method_id = $paymentMethod['id'];
				$userSubscription->stripe_subscription_id = $subscription['id'];
				$userSubscription->save();

				// if($subscription['status'] == 'trialing')
				// 	return view('learners.messages.subscription-successful', compact('userSubscription'));
				// else

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
		$this->stripe->subscriptions()->cancel($user->stripe_id, $userSubscription->stripe_subscription_id, true);
		$user->subscription('main')->cancel();
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
		\Stripe\Stripe::setApiKey(config('services.stripe.secret'));
		$user = Auth::User();
		$session = \Stripe\BillingPortal\Session::create([
			'customer' => $user->stripe_id,
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
		if($user->subscription('main')){
				$canceled_subscription = $user->subscription('main')->canceled();
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
