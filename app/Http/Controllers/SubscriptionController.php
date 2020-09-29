<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Search;
use App\Question;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
use Exception;
use Auth;

class SubscriptionController extends Controller
{
	private $stripe;

	public function __construct()
	{
		$this->stripe = Stripe::make(config('services.stripe.secret'));
	}

	public function index(Request $request)
	{
		$searchTerm = $request->input('searchTerm');

		if (isset($searchTerm)) {
			$courses = Course::search($searchTerm)->paginate(20);
			return view('front.search', compact('courses', 'searchTerm'));
		} else {
			return back()->with('delete', 'No Search Value Found');
		}
	}

	public function paymentStripe()
	{
		return view('paymentstripe');
	}

	public function postPaymentStripe(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'stripeToken' => 'required',
		]);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}
		$input = $request->all();
		$input = array_except($input, array('_token'));

		// $this->stripe = \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
		try {

			if (Auth::user()->stripe_id != null)
				$customer = Auth::user()->stripe_id;
			else
				$customer = $this->stripe->customers()->create([
					'email' => Auth::user()->email,
					'name' => Auth::user()->fname,
					'address' => [
						'line1' => '510 Townsend St',
						'postal_code' => '98140',
						'city' => 'San Francisco',
						'state' => 'CA',
						'country' => 'US',
					],
				]);

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
						'line1' => '510 Townsend St',
						'postal_code' => '98140',
						'city' => 'San Francisco',
						'state' => 'CA',
						'country' => 'US',
					],
				]
			]);

			echo $paymentMethod['id'];


			if (!isset($token)) {
				return redirect()->route('addmoney.paymentstripe');
			}

			$paymentMethodattach = $this->stripe->paymentMethods()->attach($paymentMethod['id'], $customer['id']);

			if (!isset($paymentMethod['id'])) {
				return redirect()->route('addmoney.paymentstripe');
			}
			echo $customer['id'];

			$customer = $this->stripe->customers()->update($customer['id'], [
				'email' => Auth::user()->email,
				'invoice_settings' => [
					'default_payment_method' => $paymentMethodattach['id']
				]
			]);

			echo $customer['email'];

			$subscription = $this->stripe->subscriptions()->create($customer['id'], [
				'plan' => 'price_1HTnLpE6m1twc6cGXxJx0fGd',
				// 'source' => $token,
			]);

			// $token = $this->stripe->tokens()->create([
			// 	'card' => [
			// 		'number' => $request->get('card_no'),
			// 		'exp_month' => $request->get('ccExpiryMonth'),
			// 		'exp_year' => $request->get('ccExpiryYear'),
			// 		'cvc' => $request->get('cvvNumber'),
			// 	],
			// ]);

			if ($subscription['status'] == 'active') {

				echo "<pre>";
				print_r($subscription);
				exit();
				return redirect()->route('addmoney.paymentstripe');
			} else {
				Session::put('error', 'Money not add in wallet!!');
				return redirect()->route('addmoney.paymentstripe');
			}
		} catch (Exception $e) {
			Session::put('error', $e->getMessage());
			return redirect()->route('addmoney.paymentstripe');
		} catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
			Session::put('error', $e->getMessage());
			return redirect()->route('addmoney.paywithstripe');
		} catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
			Session::put('error', $e->getMessage());
			return redirect()->route('addmoney.paymentstripe');
		}
	}

	public function cancelSubscription(Request $request)
	{
		$subscription = $this->stripe->subscriptions()->cancel(Auth::user()->stripe_id, $request->subscription_id, true);
	}
}
