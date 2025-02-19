<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Course;
use App\Currency;
use App\InstructorSetting;
use App\Mail\SendOrderMail;
use App\Notifications\UserEnroll;
use App\Order;
use App\PendingPayout;
use App\User;
use App\Wishlist;
use App\PurchasedCourse;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use Notification;
use Razorpay\Api\Api;
use Redirect;
use Session;

class RazorpayController extends Controller
{

    public function pay()
    {
        return view('razorpay');
    }

    public function rproduct()
    {
        return view('rp');
    }

    public function dopayment(Request $request)
    {
        $currency = Currency::first();
        $user_email = Auth::User()->email;
        $com_email = env('MAIL_FROM_ADDRESS');

        $carts = Cart::where('user_id', Auth::User()->id)->get();

        foreach ($carts as $cart) {
            if ($cart->offer_price != 0) {
                $pay_amount = $cart->offer_price;
            } else {
                $pay_amount = $cart->price;
            }

            if ($cart->disamount != 0 || $cart->disamount != null) {
                $cpn_discount = $cart->disamount;
            } else {
                $cpn_discount = '';
            }

            $lastOrder = Order::orderBy('created_at', 'desc')->first();

            if (!$lastOrder) {
                // We get here if there is no order at all
                // If there is no number set it to 0, which will be 1 at the end.
                $number = 0;
            } else {
                $number = substr($lastOrder->order_id, 3);
            }

            if ($cart->type == 1) {
                $bundle_id = $cart->bundle_id;
                $bundle_course_id = $cart->bundle->course_id;
                $course_id = null;
                $duration = null;
                $instructor_payout = 0;
                $todayDate = null;
                $expireDate = null;
                $instructor_id = $cart->bundle->user_id;
            } else {

                if ($cart->courses->duration != null && $cart->courses->duration != '') {
                    $days = $cart->courses->duration * 30;
                    $todayDate = date('Y-m-d');
                    $expireDate = date("Y-m-d", strtotime("$todayDate +$days days"));
                } else {
                    $todayDate = null;
                    $expireDate = null;
                }

                $setting = InstructorSetting::first();

                if (isset($setting)) {
                    if ($cart->courses->user->role == "mentors") {
                        $x_amount = $pay_amount * $setting->instructor_revenue;
                        $instructor_payout = $x_amount / 100;
                    } else {
                        $instructor_payout = 0;
                    }
                } else {
                    $instructor_payout = 0;
                }

                $bundle_id = null;
                $course_id = $cart->course_id;
                $bundle_course_id = null;
                $duration = $cart->courses->duration;
                $instructor_id = $cart->courses->user_id;
            }

            $created_order = Order::create([
                'course_id' => $course_id,
                'user_id' => Auth::User()->id,
                'instructor_id' => $instructor_id,
                'order_id' => '#' . sprintf("%08d", intval($number) + 1),
                'transaction_id' => $request->razorpay_payment_id,
                'payment_method' => 'RazorPay',
                'total_amount' => $pay_amount,
                'coupon_discount' => $cpn_discount,
                'currency' => $currency->currency,
                'currency_icon' => $currency->icon,
                'duration' => $duration,
                'enroll_start' => $todayDate,
                'enroll_expire' => $expireDate,
                'bundle_id' => $bundle_id,
                'bundle_course_id' => $bundle_course_id,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]
            );

            Wishlist::where('user_id', Auth::User()->id)->where('course_id', $cart->course_id)->delete();

            Cart::where('user_id', Auth::User()->id)->where('course_id', $cart->course_id)->delete();

            if ($created_order) {

                if ($cart->type == 0) {

                    if ($cart->courses->user->role == "mentors") {

                        $created_payout = PendingPayout::create([
                            'user_id' => $cart->courses->user_id,
                            'course_id' => $cart->course_id,
                            'order_id' => $created_order->id,
                            'transaction_id' => $request->razorpay_payment_id,
                            'total_amount' => $pay_amount,
                            'currency' => $currency->currency,
                            'currency_icon' => $currency->icon,
                            'instructor_revenue' => $instructor_payout,
                            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        ]
                        );
                    }
                }

            }

            if ($created_order) {
                if (env('MAIL_USERNAME') != null) {
                    try {

                        /*sending email*/
                        $x = 'You are successfully enrolled in a course';
                        $order = $created_order;
                        Mail::to(Auth::User()->email)->send(new SendOrderMail($x, $order));

                    } catch (\Swift_TransportException $e) {
                        Session::flash('deleted', 'Payment Successfully ! but Invoice will not sent because of error in mail configuration !');
                        return redirect('/');
                    }
                }
            }

            if ($cart->type == 0) {

                if ($created_order) {
                    // Notification when user enroll
                    $cor = Course::where('id', $cart->course_id)->first();

                    $course = [
                        'title' => $cor->title,
                        'image' => $cor->preview_image,
                    ];

                    $enroll = Order::where('course_id', $cart->course_id)->get();

                    if (!$enroll->isEmpty()) {
                        foreach ($enroll as $enrol) {
                            $user = User::where('id', $enrol->user_id)->get();
                            Notification::send($user, new UserEnroll($course));
                        }
                    }
                }
            }

        }

        \Session::flash('success', 'Payment success');
        return redirect('/');
    }

    public function _dopayment(Request $request)
    {
        $currency = Currency::first();
        $user_email = Auth::User()->email;
        $com_email = env('MAIL_FROM_ADDRESS');

        $carts = Cart::where('user_id', Auth::User()->id)->get();

        foreach ($carts as $cart) {
            if ($cart->offer_price != 0) {
                $pay_amount = $cart->offer_price;
            } else {
                $pay_amount = $cart->price;
            }

            if ($cart->disamount != 0 || $cart->disamount != null) {
                $cpn_discount = $cart->disamount;
            } else {
                $cpn_discount = '';
            }

            $lastOrder = Order::orderBy('created_at', 'desc')->first();

            if (!$lastOrder) {
                // We get here if there is no order at all
                // If there is no number set it to 0, which will be 1 at the end.
                $number = 0;
            } else {
                $number = substr($lastOrder->order_id, 3);
            }

            $setting = InstructorSetting::first();

            if (isset($setting)) {
                if ($cart->courses->user->role == "mentors") {
                    $x_amount = $pay_amount * $setting->instructor_revenue;
                    $instructor_payout = $x_amount / 100;
                } else {
                    $instructor_payout = 0;
                }
            } else {
                $instructor_payout = 0;
            }

            $bundle_id = null;
            $course_id = $cart->course_id;
            $bundle_course_id = null;
            $duration = $cart->courses->duration;
            $instructor_id = $cart->courses->user_id;

            $created_order = Order::create([
                'course_id' => $course_id,
                'user_id' => Auth::User()->id,
                'instructor_id' => $instructor_id,
                'order_id' => '#' . sprintf("%08d", intval($number) + 1),
                'transaction_id' => $request->razorpay_payment_id,
                'payment_method' => 'RazorPay',
                'total_amount' => $pay_amount,
                'coupon_discount' => $cpn_discount,
                'currency' => $currency->currency,
                'currency_icon' => $currency->icon,
                'duration' => $duration,
                'enroll_start' => null,
                'enroll_expire' => null,
                'bundle_id' => $bundle_id,
                'bundle_course_id' => $bundle_course_id,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]
            );

            Wishlist::where('user_id', Auth::User()->id)->where('course_id', $cart->course_id)->delete();

            Cart::where('user_id', Auth::User()->id)->where('course_id', $cart->course_id)->delete();

            if ($created_order) {

                if ($cart->type == 0) {

                    if ($cart->courses->user->role == "mentors") {

                        $created_payout = PendingPayout::create([
                            'user_id' => $cart->courses->user_id,
                            'course_id' => $cart->course_id,
                            'order_id' => $created_order->id,
                            'transaction_id' => $request->razorpay_payment_id,
                            'total_amount' => $pay_amount,
                            'currency' => $currency->currency,
                            'currency_icon' => $currency->icon,
                            'instructor_revenue' => $instructor_payout,
                            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        ]
                        );
                    }
                }

            }

            if ($created_order) {
                if (env('MAIL_USERNAME') != null) {
                    try {

                        /*sending email*/
                        $x = 'You are successfully enrolled in a course';
                        $order = $created_order;
                        Mail::to(Auth::User()->email)->send(new SendOrderMail($x, $order));

                    } catch (\Swift_TransportException $e) {
                        Session::flash('deleted', 'Payment Successfully ! but Invoice will not sent because of error in mail configuration !');
                        return redirect('/');
                    }
                }
            }

            if ($cart->type == 0) {

                if ($created_order) {
                    // Notification when user enroll
                    $cor = Course::where('id', $cart->course_id)->first();

                    $course = [
                        'title' => $cor->title,
                        'image' => $cor->preview_image,
                    ];

                    $enroll = Order::where('course_id', $cart->course_id)->get();

                    if (!$enroll->isEmpty()) {
                        foreach ($enroll as $enrol) {
                            $user = User::where('id', $enrol->user_id)->get();
                            Notification::send($user, new UserEnroll($course));
                        }
                    }
                }
            }

        }

        \Session::flash('success', 'Payment success');
        return redirect('/');
    }

    public function razorpay_payment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $payment = [
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'amount' => $response['amount'] / 100,
                    'json_response' => json_encode((array) $response),
                ];
                return $payment;
            } catch (Exceptio $e) {
                return $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }
        \Session::flash('success', 'Payment success');
        return redirect()->back();
    }

    public function payment_completed(Request $request)
    {
        $user = Auth::User();
        $user_email = $user->email;
        $user_id = $user->id;

        $com_email = env('MAIL_FROM_ADDRESS');

        $carts = Cart::where('user_id', $user_id)->get();

        foreach ($carts as $cart) {
            // if ($cart->offer_price != 0) {
            //     $pay_amount = $cart->offer_price;
            // } else {
            //     $pay_amount = $cart->price;
            // }

            // if ($cart->disamount != 0 || $cart->disamount != null) {
            //     $cpn_discount = $cart->disamount;
            // } else {
            //     $cpn_discount = '';
            // }
            $payment = $this->getPaymentDetails($request->razorpay_payment_id);
            $course_id = $cart->course_id;
            $payment['course_id'] =  $course_id;
            $payment['user_id'] =  $user_id;
            $payment['user_id'] =  $user_id;
            $payment['paid_amount'] = $payment['paid_amount'];
            $payment['amount'] = $payment['paid_amount'];//$pay_amount;
            PurchasedCourse::create($payment);
            Wishlist::where('user_id', $user_id)->where('course_id', $course_id)->delete();
            Cart::where('user_id', $user_id)->where('course_id', $course_id)->delete();

            try {
                /*sending email*/
                $x = 'You are successfully enrolled in a course';
                Mail::to($user_email)->send(new SendOrderMail($x, $user));
            } catch (\Swift_TransportException $e) {
                Session::flash('deleted', 'Payment Successfully ! but Invoice will not sent because of error in mail configuration !');
                return redirect()->route('home');
            }
        }
        \Session::flash('success', 'Payment success');
        return redirect()->route('home');
    }


    public function getPaymentDetails($razorpay_payment_id){
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($razorpay_payment_id);
        if (!empty($razorpay_payment_id)) {
            try {
                $response = $api->payment->fetch($razorpay_payment_id)->capture(array('amount' => $payment['amount']));
                $payment = [
                    'transaction_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'paid_amount' => $response['amount'] / 100,
                    'json_response' => json_encode((array) $response),
                ];
                return $payment;
            } catch (Exceptio $e) {
                return $e->getMessage();
            }
        }else{
            return [];
        }
    }

}
