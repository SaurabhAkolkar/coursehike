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
			'card_no' => 'required',
			'ccExpiryMonth' => 'required',
			'ccExpiryYear' => 'required',
			'cvvNumber' => 'required',
			//'amount' => 'required',
		]);
		if ($validator->fails()) {
			return redirect('post/create')
				->withErrors($validator)
				->withInput();
		}

		$input = $request->all();
			$input = array_except($input, array('_token'));

			// $stripe = \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
			$stripe = Stripe::make();
			try {

				$customer = $stripe->customers()->create([
					'email' => Auth::user()->id,
				]);

				$subscription = $stripe->subscriptions()->create('cus_4EBumIjyaKooft', [
					'plan' => 'monthly',
				]);

				$token = $stripe->tokens()->create([
					'card' => [
						'number' => $request->get('card_no'),
						'exp_month' => $request->get('ccExpiryMonth'),
						'exp_year' => $request->get('ccExpiryYear'),
						'cvc' => $request->get('cvvNumber'),
					],
				]);


				if (!isset($token['id'])) {
					return redirect()->route('addmoney.paymentstripe');
				}
				$charge = $stripe->charges()->create([
					'card' => $token['id'],
					'currency' => 'USD',
					'amount' => 20.49,
					'description' => 'wallet',
				]);

				if ($charge['status'] == 'succeeded') {

					echo "<pre>";
					print_r($charge);
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
}
