<?php

namespace App\Jobs\StripeWebhooks;

use App\Cart;
use App\InvoiceDetail;
use App\UserInvoiceDetail;
use App\UserPurchasedCourse;
use Cartalyst\Stripe\Stripe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\Models\WebhookCall;
use Illuminate\Support\Facades\Mail;
use App\Mail\CoursePurchased;
use App\Setting;
use App\Course;

class CheckoutChargeSucceededJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $webhookCall;
	private $stripe;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
		$this->stripe = Stripe::make(config('services.stripe.secret'));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // checkout.session.completed
        $invoice = $this->webhookCall->payload['data']['object'];

        $customer_id = $invoice['customer'];
        $client_reference_id = $invoice['client_reference_id'];
        $payment_status = $invoice['payment_status'];
        $amount_total = $invoice['amount_total'];
        $currency = $invoice['currency'];
        $livemode = $invoice['livemode'];


        $user_invoice = UserInvoiceDetail::with('user')->where([['id', $client_reference_id],['status', '!=' , 'failed']])->first();

        if($payment_status == 'paid' 
            && $invoice['mode'] == "payment"
            && $user_invoice
            && intval($user_invoice->total * 100) == $amount_total
            && strtolower($currency) == strtolower($user_invoice->currency)
            // && $livemode == false
            // && $user_invoice->user->stripe_id == $customer_id
            )
        {
            $user_invoice->status = 'paid';
            $user_invoice->save();

            // TODO: Update UserPurchasedCourse for multiple courses
            // foreach($user_invoice->details as $invoice_items){
            //     UserPurchasedCourse::create([
            //         'order_id' => $client_reference_id,
            //         'user_id' => $user_invoice->user->id,
            //         'course_id' => $invoice_items->course_id,
            //         'class_id' => json_encode($invoice_items->pluck('class_id')->all()),
            //         'purchase_type' => $user_invoice->purchase_type,
            //     ]);
            // }

            // $invoice = UserInvoiceDetail::where([['id', $transaction_id],['status', '!=' , 'failed']])->firstOrFail();

            // $invoice_details = InvoiceDetail::having('invoice_id', '=', $client_reference_id)->get()->groupBy('course_id');
            // foreach($invoice_details as $course_id => $invoice_items){
            //     UserPurchasedCourse::create([
            //         'order_id' => $client_reference_id,
            //         'user_id' => $user_invoice->user->id,
            //         'course_id' => $course_id,
            //         'class_id' => json_encode($invoice_items->pluck('class_id')->all()),
            //         'purchase_type' => $invoice_items->first()->purchase_type,
            //     ]);
            // }

            $email_data = [];
            // $email_data['course_name'] = 'dynamics';
            $email_data['course_name'] = '';
            $email_data['purchase_type'] = '';
            $email_data['amount'] = $amount_total;

            $invoice_details = InvoiceDetail::having('invoice_id', '=', $client_reference_id)->get()->groupBy('course_id');
                foreach($invoice_details as $course_id => $invoice_items){

                    $course = Course::findOrFail($course_id);
                    
                    $already_puchased = UserPurchasedCourse::firstOrNew( ['course_id'=> $course_id , 'user_id'=> $user_invoice->user_id] );
                    $email_data['course_name'] =  $email_data['course_name']==''?$course->title:$email_data['course_name'].', '.$course->title;
                    $email_data['purchase_type'] = $email_data['purchase_type']==''?$already_puchased->purchase_type:$email_data['purchase_type'].', '.$already_puchased->purchase_type; 
                    $already_puchased->order_id = $client_reference_id;
                    $old_classess = json_decode($already_puchased->class_id);
                    $new_classess = $invoice_items->pluck('class_id')->all();

                    $combined_classes = array_unique(array_merge($old_classess ?? [],$new_classess));

                    $already_puchased->class_id = json_encode($combined_classes);
                    $already_puchased->purchase_type = $invoice_items->first()->purchase_type;
                    $already_puchased->save();
                }

                $setting = Setting::first();
                if($setting->w_email_enable == 1){
                    try{
                      
                     

                        Mail::to($user_invoice->email)->send(new CoursePurchased($email_data));
                       
                    }
                    catch(\Swift_TransportException $e){
        
                        header( "refresh:5;url=./" );
                            
                    }
                }

                // Clear Cart

                Cart::where('user_id', $user_invoice->user->id)->get()->each(function($cart) {
                    $cart->delete();
                });
        }
        
    }
}
