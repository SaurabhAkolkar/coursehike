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
use App\UserSubscription;

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
		if($plan)
			return view('learners.pages.payment')->withPlan($plan)->withCountries($countries);
		else
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
		]);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}
		// $input = $request->all();
		// $input = array_except($input, array('_token'));

		// $this->stripe = \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
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

			$this->stripe->customers()->update($stripe_id, [
				// 'email' => Auth::user()->email,
				'invoice_settings' => [
					'default_payment_method' => $paymentMethodattach['id']
				]
			]);

			if($request->subscription_plan == 'monthly-plan')
				$plan_id = 'price_1Hk3QlE6m1twc6cGzy7K0Xwh';
			else if($request->subscription_plan == 'yearly-plan')
				$plan_id = 'price_1Hk3Q8E6m1twc6cGJjmdFY17';

			$subscription = $this->stripe->subscriptions()->create($stripe_id, [
				'plan' => $plan_id
			]);

			
			echo '<pre>';
			print_r($subscription);

			// $token = $this->stripe->tokens()->create([
			// 	'card' => [
			// 		'number' => $request->get('card_no'),
			// 		'exp_month' => $request->get('ccExpiryMonth'),
			// 		'exp_year' => $request->get('ccExpiryYear'),
			// 		'cvc' => $request->get('cvvNumber'),
			// 	],
			// ]);

			if ($subscription['status'] == 'trialing' || $subscription['status'] == 'active') {

				$plan = app('rinvex.subscriptions.plan')->where("slug", $request->subscription_plan)->first();
				Auth::user()->newSubscription('main', $plan);

				$userSubscription = new UserSubscription();
				$userSubscription->user_id = Auth::user()->id;
				$userSubscription->payment_id = $paymentMethod['id'];
				$userSubscription->stripe_subscription_id = $subscription['id'];
				$userSubscription->save();

				exit();
				return redirect()->route('addmoney.paymentstripe');
			} else {
				Session::flash('errors', 'Something went wrong');
				// return redirect()->back();
			}
		} catch (Exception $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back();
		} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back();
		} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
			Session::flash('errors', $e->getMessage());
			return redirect()->back();
		}
	}

	public function cancelSubscription(Request $request)
	{
		$subscription = $this->stripe->subscriptions()->cancel(Auth::user()->stripe_id, $request->subscription_id, true);
	}
}
