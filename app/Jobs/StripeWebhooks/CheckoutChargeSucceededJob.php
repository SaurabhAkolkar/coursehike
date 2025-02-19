<?php

namespace App\Jobs\StripeWebhooks;

use App\BundleCourse;
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
use App\Notifications\CourseNotification;
use App\Course;
use Illuminate\Support\Facades\Notification;
use App\User;

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

            $email_data = [
                'course_name' => '',
                'purchase_type' => '',
                'invoice_id' => $user_invoice->invoice_id,
                'amount' => $amount_total,
                'currenty' => $user_invoice->currency,
            ];

            $user = $user_invoice->user;

            $invoice_details = InvoiceDetail::having('invoice_id', '=', $client_reference_id)->get();
            // $invoice_details = InvoiceDetail::having('invoice_id', '=', $client_reference_id)->get()->groupBy('course_id');

            foreach($invoice_details as $invoice_items){
                // foreach($invoice_details as $course_id => $invoice_items){

                    // $course = Course::findOrFail($course_id);

                    // $already_puchased = UserPurchasedCourse::firstOrNew( ['course_id'=> $course_id , 'user_id'=> $user_invoice->user_id] );
                    // $already_puchased->order_id = $client_reference_id;
                    // $old_classess = json_decode($already_puchased->class_id);
                    // $new_classess = $invoice_items->pluck('class_id')->all();

                    // $combined_classes = array_unique(array_merge($old_classess ?? [],$new_classess));

                    // $already_puchased->class_id = json_encode($combined_classes);
                    // $already_puchased->purchase_type = $invoice_items->first()->purchase_type;
                    // $already_puchased->save();

                    // $email_data['course_name'] =  $email_data['course_name'] == '' ? $course->title : $email_data['course_name'].', '.$course->title;
                    // $email_data['purchase_type'] = $email_data['purchase_type'] == '' ? $invoice_items->first()->purchase_type : $email_data['purchase_type'].', '.$invoice_items->first()->purchase_type;
                    // $data = [
                    //     'title' => $course->title,
                    //     'image' => $course->preview_image,
                    //     'data' => 'You bought this course',
                    // ];

                    // Notification::send( $user, new CourseNotification($data));

                    if($invoice_items->purchase_type == 'bundle'){
                        $courses = BundleCourse::find($invoice_items->bundle_id)->getCourses();

                        UserPurchasedCourse::updateOrCreate(
							['order_id' => $client_reference_id, 'user_id' => $user->id, 'bundle_id' => $invoice_items->bundle_id],
							['class_id' => json_encode($courses->pluck('id')->all()), 'purchase_type' => $invoice_items->purchase_type]
						);

                    }else{
                        UserPurchasedCourse::updateOrCreate(
							['order_id' => $client_reference_id, 'user_id' => $user->id],
							['course_id' => $invoice_items->course_id, 'class_id' => 0, 'purchase_type' => $invoice_items->purchase_type]
						);
                    }
                }

                try{
                    Mail::to($user->email)->cc('aliens@learnitlikealiens.com')->later(now()->addSeconds(5), new CoursePurchased($email_data));
                }catch(\Swift_TransportException $e){
                    header( "refresh:5;url=./" );
                }

                // Clear Cart
                Cart::where('user_id', $user_invoice->user_id)->get()->each(function($cart) {
                    $cart->delete();
                });
        }

    }
}
