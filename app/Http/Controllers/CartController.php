<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Cart;
use App\CartItem;
use App\Course;
use App\CourseChapter;
use App\Wishlist;
use Session;
use App\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use App\Adsense;
use App\UserInvoiceDetail;
use App\InvoiceDetail;
use Debugbar;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;
use App\Playlist;
use App\Setting;
use App\UserPurchasedCourse;
use Cartalyst\Stripe\Stripe;
use Cartalyst\Stripe\Exception\NotFoundException;
use Exception;
use App\Notifications\CourseNotification;
use Illuminate\Support\Facades\Notification;



class CartController extends Controller
{

	private $stripe;

	public function __construct()
	{
		$this->stripe = Stripe::make(config('services.stripe.secret'));
	}

    public function index()
    {
        $carts = Cart::all();
        
        return view('admin.cart.index', compact('carts'));
    }

    public function destroy($id)
    {
        $cart = Cart::findorfail($id);
        $cart->delete();

        return back()->with('delete','Course is removed from your cart');
    }

    public function addtocartAjax(Request $request)
    {

        $courseCheck = 
        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::User()->id, 'course_id' => $request->course_id, 'status' => 1]
        );

        if($request->classes =='all'){
            
            $check_course = CartItem::where(['cart_id' => $cart->id , 'course_id' => $request->course_id , 'class_id' => 0])->first();

            if($check_course){
                return 'Course already in cart.';
            }
            
            CartItem::where('course_id', $request->course_id)->where('class_id','>',0)->delete();

            $course = Course::findOrFail($request->course_id);
            
            $insert['course_id'] = $request->course_id;
            $insert['class_id'] = 0;
            $insert['category_id'] = $course->category_id;
            $insert['price'] = $course->convertedprice?$course->convertedprice:0;
            $insert['offer_price'] = $course->offer_price;
            $insert['purchase_type'] = 'all_classes';
            $insert['cart_id'] = $cart->id;
           
            CartItem::insert($insert);

            return 'Course added to cart';

        }
        return 'Something Went Wrong';
    	
    }

    public function addToCart(Request $request){
        
        $course = Course::findOrFail($request->course_id);
        if($course){
            $classes = CourseChapter::where('course_id',$course->id)->count();
            if($request->classes == 'selected-classes'){
                if(!$request->selected_classes){
                    return redirect()->back()->with('message','Please select classes to add to cart.');
                }
                if($classes == count($request->selected_classes)){
                    $request->classes ='all-classes';
                }
            }            
        }
        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::User()->id, 'course_id' => $request->course_id, 'status' => 1]
        );

        if($request->classes =='all-classes'){
           
            $check_course = CartItem::where(['cart_id' => $cart->id , 'course_id' => $request->course_id , 'class_id' => 0])->first();
           
            if($check_course){
                return redirect()->back()->with('message','Course already in cart.');
            }
            
            CartItem::where(['cart_id' => $cart->id,'course_id' => $request->course_id])->where('class_id','>',0)->delete();

            $insert['course_id'] = $request->course_id;
            $insert['class_id'] = 0;
            $insert['category_id'] = $course->category_id;
            $insert['price'] = $course->convertedprice;
            $insert['offer_price'] = $course->offer_price;
            $insert['purchase_type'] = 'all_classes';
            $insert['cart_id'] = $cart->id;
            $insert['created_at'] = Carbon::now();
            $insert['updated_at'] = Carbon::now();

            CartItem::insert($insert);

            if($request->has('buy_type') && $request->buy_type == 'buy_now')
                return redirect('/cart')->with('message','Course added to the cart.');
            else
                return redirect()->back()->with('message','Course added to the cart.');

        }elseif($request->classes == "select-classes"){
            
            CartItem::where(['cart_id' => $cart->id, 'course_id' => $request->course_id])->delete();

            $classes = $request->selected_classes;

            if($classes == null){
                return redirect()->back()->with('message','Please select classes to add.');
            }  

            $insert['course_id'] = $request->course_id;
            $insert['category_id'] = $course->category_id;
            $insert['purchase_type'] = 'selected_classes';
            $insert['cart_id'] = $cart->id;

            $classes = CourseChapter::whereIn('id',$classes)->get();

            foreach($classes as $class){                
                if($class){
                    $insert['class_id'] = $class->id;
                    $insert['price'] = $class->convertedprice; 
                    $insert['created_at'] = Carbon::now();
                    $insert['updated_at'] = Carbon::now();              
                    CartItem::insert($insert);
                }
            }
            
            if($request->has('buy_type') && $request->buy_type == 'buy_now')
                return redirect('/cart')->with('message','Course added to the cart.');
            else
                return redirect()->back()->with('message','Course added to the cart.');
        }else{

            return redirect()->back()->with('message','Please select the type of class.');
        }

    }

    public function learnerCart(){
        // dd(Session::all());
        $carts = Cart::with('user','cartItems')->where(['user_id' => Auth::User()->id, 'status' => 1])->get();
		$countries = DB::table('allcountry')->get();
        $cartItem = [];
        $discount = 0;
        $total = 0;
        $coupon = Null;
        $coupons = [];
        $suggested_courses = [];
        $playlists = [];
        $gst = Null;
        $subTotal = Null;
        $position = Location::get();
        if($position){
            $location = $position->countryName;
        }else{
            $location = [];
        }
        

        if(Auth::check()){
			$playlists = Playlist::where('user_id', Auth::user()->id)->get();   
        }
        
        $suggested_courses = Course::with('user')->where(['status'=>1])->limit(3)->get();

        if($carts){
            // $cartItem = CartItem::with('courses','courses.user')->where('cart_id', $carts->id)->get();
            // $discount = $cartItem->sum('offer_price');
            // dd($carts);
            // $discount = $carts->sum('cartItems.price');
            $discount = $carts->sum(function ($item) {
                return array_sum(array_column($item['cartItems']->toArray(), 'offer_price'));
            });

            $subTotal = $carts->sum(function ($item) {
                return array_sum(array_column($item['cartItems']->toArray(), 'price'));
            });

         
            // $total = $cartItem->sum('price');
           

            $coupon = Null;
            $coupons = Coupon::where('expirydate', '>',  Carbon::now())->get();

            if(Session::get('appliedCoupon')){
                $coupon = Coupon::findOrFail(Session::get('appliedCoupon'));
                if($coupon){
                    if($coupon->distype == 'fix'){
                        $subTotal = $subTotal - $coupon->amount; 
                        $discount = $coupon->amount; 
                    }else{
                        $discount = ($subTotal * $coupon->amount) / 100;
                        $subTotal = $subTotal - $discount;
                    }
                }
            }

            if($location == 'India'){
                $total = $subTotal + ($subTotal * 18) / 100;
            }else{
                $total = $subTotal;
            }


        }     

        return view('learners.pages.cart', compact('carts','location','discount','gst','subTotal','playlists','suggested_courses','total','coupons','coupon','countries'));
    }

    public function applyCoupon($id){

        $check = Coupon::findOrFail($id);
        $cart = Cart::where(['user_id' => Auth::User()->id, 'status' =>1 ])->first();
        $total = CartItem::where('cart_id', $cart->id)->sum('price');
        if($check){

            if($check->expiry_date > Carbon::now()){
                
                Session::flash('couponModal','True');
                return redirect()->back()->with('message','Coupon already expired.');

            }else if($total < $check->minamount){
                Session::flash('couponModal','True');
                return redirect()->back()->with('message','Coupon is not applicable.');

            }else if($check->maxusage <= 0){
                Session::flash('couponModal','True');
                return redirect()->back()->with('message','Coupon is reached max usage.');
            }

            Session::put('appliedCoupon', $id);

            return redirect()->back()->with('message','Coupon applied.');

        }else{
            Session::flash('couponModal','True');
            return redirect()->back()->with('message', 'Coupon Not Found.');
        }
            Session::flash('couponModal','True');   
        return redirect()->back()->with('message', 'Coupon Not Found.');
      
    }

    public function applyCouponManual(Request $request){
        
        $getCouponId = Coupon::where('code', $request->coupon_name)->first();

        if($getCouponId){

            $check = Coupon::findOrFail($getCouponId->id);
        
            $total = Cart::where('user_id', Auth::user()->id)->sum('price');
    
                if($check){
    
                    if($check->expiry_date > Carbon::now()){
                        Session::flash('couponModal','True');
                        return redirect()->back()->with('message','Coupon already expired.');
    
                    }else if($total < $check->minamount){
                        Session::flash('couponModal','True');
                        return redirect()->back()->with('message','Coupon is not applicable.');
    
                    }else if($check->maxusage <= 0){
                        Session::flash('couponModal','True');
                        return redirect()->back()->with('message','Coupon is reached max usage.');
                    }
    
                    Session::put('appliedCoupon', $getCouponId->id);
    
                    return redirect()->back()->with('message','Coupon applied.');
    
                }else{
                    Session::flash('couponModal','True');
                    return redirect()->back()->with('message', 'Coupon Not Found.');
                }

        }
        Session::flash('couponModal','True');
        return redirect()->back()->with('message', 'Coupon Not Found.');
    }

    public function moveToWishlist($id){

        $check = Course::findorFail($id);
        if($check){
            Session::forget('appliedCoupon');

            $cart_id = Cart::where(['user_id'=> Auth::User()->id, 'course_id' => $id,'status' => 1])->pluck('id');
            if($cart_id){

                CartItem::where(['cart_id' =>  $cart_id, 'course_id' => $id])->delete();
                Session::forget('appliedCoupon');
                
            }
            
            Cart::where(['user_id'=> Auth::User()->id, 'course_id' => $id, 'status' => 1])->delete();

            $checkWishlist =  Wishlist::where(['user_id' => Auth::User()->id, 'course_id' => $id])->first();
            if(empty($checkWishlist)){
                Wishlist::create(['user_id'=> Auth::User()->id , 'course_id' => $id]);
            }else{
                return redirect()->back()->with('message','Course already in wishlist.');
            }
            
            return redirect()->back()->with('message','Course Moved To Wishlist');
        }
        return redirect()->back()->with('message','Internal Serve Error');
    }

    public function removefromcart($id)
    {
        $cart = Cart::find($id)->delete();
        // $cart->delete();
        CartItem::where(['cart_id' =>  $id ])->delete();

        Session::forget('appliedCoupon');
        return back()->with('message','Course is removed from your cart');
    }

    public function cartCheckout(Request $request){

        $cart = Cart::with('user','cartItems')->where(['user_id' => Auth::User()->id, 'status'=>1])->get();
        
        if(empty($cart) || count($cart) < 1){
            return redirect()->back()->with('message','Your cart is empty.');
        }
        
        $price = $cart->sum(function ($item) {
            return array_sum(array_column($item['cartItems']->toArray(), 'price'));
        });

        $tax_rates = false;
        $currency = 'USD';
        if ($position = Location::get()) {
            $country = $position->countryCode;
			if($country == 'IN'){
                $tax_rates = true;
                $currency = 'INR';
            }
        }

        $random = Str::of(Str::orderedUuid())->upper()->explode('-');
        $insert['invoice_id'] = '#LILA-'. date('m-d') . '-'. $random[0]. '-'. $random[1];
        $insert['user_id'] =  Auth::User()->id;



        if(Session::has('appliedCoupon'))
        {
            $coupon = Coupon::findOrFail(Session::get('appliedCoupon'));
            if($coupon){
                if($coupon->distype == 'fix'){
                    $insert['discount'] = $coupon->amount;
                }else{
                    $insert['discount'] = ( $price * $coupon->amount) / 100;
                }
                $insert['coupon_appied'] = $coupon->code;
                $insert['coupon_id'] = $request->coupon_id;
                $insert['discount_type'] = 'coupon_discount';
                $price = $price - $insert['discount'];
            }else{
                $insert['discount_type'] = 'regular_discount';
            }
        }else{
            $insert['discount_type'] = 'regular_discount';
        }
        
        $insert['taxes'] = ($tax_rates) ? (($price * 1.18) - $price) : 0; // 18% GST
        
        $insert['currency'] = $currency;
        
        $insert['total'] = ($tax_rates) ? ($price * 1.18) : $price;
        $insert['sub_total'] = $price;

        $insert['purchase_type'] = $cart->first()->cartItems->first()->purchase_type;
        $insert['status'] = 'payment-pending';

        $info = UserInvoiceDetail::create($insert);
        foreach($cart as $single_cart){
            $insertDetails['invoice_id'] = $info->id;
            foreach($single_cart->cartItems as $c){
                $insertDetails['course_id'] = $c->course_id;
                $insertDetails['class_id'] = $c->class_id;
                $insertDetails['purchase_type'] = $c->purchase_type;
                $insertDetails['price'] = $c->price;
                InvoiceDetail::create($insertDetails);
            }
        }

        Session::forget('appliedCoupon');
        // Cart::where(['user_id'=> Auth::User()->id])->update(['status'=>0]);

        return $this->stripeCheckout($info, $request);

        // return redirect()->back()->with('message','Purchase Successful.');
    }

    public function cartpage(Request $request)
    {

        $coupanapplieds = Session::get('coupanapplied');
        if(empty($coupanapplieds) == true ){
                 
            Cart::where('user_id', Auth::user()
                        ->id)
                        ->update(['distype' => NULL, 'disamount' => NULL]);

        }

        $wishlist = Wishlist::all();
        $course = Course::all();
        $carts = Cart::where('user_id', Auth::User()->id)->get();

        $ad = Adsense::first();

       
        
        $cartitems = Cart::where('user_id', Auth::User()->id)->first();
        if ($cartitems == NULL){

            //when cart empty 
            return view('front.cart',compact('course', 'carts', 'wishlist', 'ad'));

            
           
        }
        else {

            $price_total = 0;
            $offer_total = 0;
            $cpn_discount = 0;


            //cart price after offer
            foreach ($carts as $key => $c)
            {
                if ($c->offer_price != 0)
                {
                    $offer_total = $offer_total + $c->offer_price;
                }
                else
                {
                    $offer_total = $offer_total + $c->price;
                }
            }

            //for price total
            foreach ($carts as $key => $c)
            {
                
                $price_total = $price_total + $c->price;
                
            }


            //for coupon discount total
            foreach ($carts as $key => $c)
            {
                
                $cpn_discount = $cpn_discount + $c->disamount;
            }


            $cart_total = 0;
            
            foreach ($carts as $key => $c)
            {

                if ($cpn_discount != 0)
                {
                    $cart_total = $offer_total - $cpn_discount;
                }
                else{

                    $cart_total = $offer_total;
                }
            }


            //for offer percent
            foreach ($carts as $key => $c)
            {
                if ($cpn_discount != 0)
                {
                    $offer_amount  = $price_total - ($offer_total - $cpn_discount);
                    $value         =  $offer_amount / $price_total;
                    $offer_percent = $value * 100;
                }
                else
                {
                    $offer_amount  = $price_total - $offer_total;
                    $value         =  $offer_amount / $price_total;
                    $offer_percent = $value * 100; 
                }
            }
            

        }
        

        return view('front.cart',compact('course', 'carts', 'wishlist','offer_total','price_total', 'offer_percent', 'cart_total', 'cpn_discount', 'ad'));
       
    }

    public function stripeCheckout($order, $request)
    {

        $tax_rates = [];
        $currency = 'USD';
        $total_amount = $order->sub_total * 100;

        $setting = Setting::find(1);
        if ($position = Location::get()) {
            $country = $position->countryCode;
			if($country == 'IN'){
				$tax_rates = ['txr_1IJH0jDEIHJhoye20gUfOsMF'];
                $currency = 'INR';
                // $total_amount *= ($setting->dollar_price) ? $setting->dollar_price : 75;
            }
        }

        $session_obj = [
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => $currency,
                'unit_amount' => $total_amount,
                'product_data' => [
                  'name' => 'LILA Art',
                  'images' => [asset('/images/status/pay.png')],
                ],
              ],
              'quantity' => 1,
              'tax_rates' => $tax_rates,
            ]],
            'client_reference_id' => $order->id, // Cart ID
            'mode' => 'payment',
            'metadata' => [
                'order_id' => $order->id,
            ],
            'success_url' => env('APP_URL') . "/checkout-successful/$order->id",
            'cancel_url' => env('APP_URL') . "/checkout-failure/$order->id",
        ];
        
        $stripe_id = Auth::user()->stripe_id;

		if(!empty($stripe_id)){
			try {
				$customer = $this->stripe->customers()->find($stripe_id);

				if (!array_key_exists('deleted', $customer)){
					$session_obj['customer'] = $stripe_id;
				}else
					$session_obj['customer_email'] = Auth::user()->email;

			} catch (NotFoundException $e) {
				$message = $e->getMessage();
				$session_obj['customer_email'] = Auth::user()->email;
			}
		}else
			$session_obj['customer_email'] = Auth::user()->email;        
        
		$checkout_session = $this->stripe->checkout()->sessions()->create($session_obj);

        $order->stripe_session_id = $checkout_session['id'];
        $order->save();

          $response = [
            "id" => $checkout_session['id'],
        ];
        return response()->json($response, 200);
    }

    public function checkoutSuccessful($transaction_id)
    {
        $invoice = UserInvoiceDetail::where([['id', $transaction_id],['status', '!=' , 'failed']])->firstOrFail();        

        try {
            $checkout_session = $this->stripe->checkout()->sessions()->find($invoice->stripe_session_id);
            $amount_total = $checkout_session['amount_total'];
            $currency = $checkout_session['currency'];

            $user = Auth::user();

            if($checkout_session && $invoice->user->id == $user->id 
                    && $checkout_session['client_reference_id'] == $transaction_id
                    && $checkout_session['payment_status'] == 'paid'
                    && ($amount_total/100) == $invoice->total
                    && strtolower($currency) == strtolower($invoice->currency)
            ){

                $invoice_details = InvoiceDetail::having('invoice_id', '=', $transaction_id)->get()->groupBy('course_id');
                // dd($invoice_details);
                foreach($invoice_details as $course_id => $invoice_items){
                    // dd($invoice_items, $invoice->user_id, $course_id);

                    $already_puchased = UserPurchasedCourse::firstOrNew( ['course_id'=> $course_id , 'user_id'=> $invoice->user_id] );
                    $already_puchased->order_id = $transaction_id;

                    if($already_puchased->exists)
                    $old_classess = json_decode($already_puchased->class_id);
                    $new_classess = $invoice_items->pluck('class_id')->all();

                    $combined_classes = array_unique(array_merge($old_classess ?? [],$new_classess));
                    
                    $already_puchased->class_id = json_encode($combined_classes);
                    $already_puchased->purchase_type = $invoice_items->first()->purchase_type;
                    $already_puchased->save();

                    // UserPurchasedCourse::create([
                    //     'order_id' => $transaction_id,
                    //     'user_id' => $invoice->user_id,
                    //     'course_id' => $course_id,
                    //     'class_id' => json_encode($invoice_items->pluck('class_id')->all()),
                    //     'purchase_type' => $invoice_items->first()->purchase_type,
                    // ]);
                }

                // Clear Cart
                Cart::where('user_id', $invoice->user->id)->get()->each(function($cart) {
                    $cart->delete();
                });
                
				$user->stripe_id = $checkout_session['customer'];
				$user->save();
    
                return view('learners.messages.charge-successful', compact('invoice'));
            }
        } catch (Exception $e) {
            Session::flash('errors', $e->getMessage());
            print_r($e->getMessage());
        }
    }

    public function checkoutFailed($transaction_id)
    {
        $invoice = UserInvoiceDetail::where([['id', $transaction_id],['user_id', Auth::user()->id],['status', '!=' , 'paid']])->firstOrFail();
        $invoice->status = 'failed';
        $invoice->save();
        return view('learners.messages.charge-failure', compact('invoice'));
    }
    
}
