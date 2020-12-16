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
use Stripe\Stripe;
use Debugbar;

class CartController extends Controller
{
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

        $cart = Cart::where(['user_id' => Auth::User()->id, 'status' => 1])->first();

        if(!$cart){
           $cart = Cart::create(['user_id'=>Auth::user()->id , 'status' =>1]);
        }

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
            $insert['price'] = $course->price;
            $insert['offer_price'] = $course->offer_price;
            $insert['purchase_type'] = 'all_classes';
            $insert['cart_id'] = $cart->id;
            CartItem::insert($insert);

            return 'Course added to cart';

        }
        return 'Something Went Wrong';
    	
    }

    public function addToCart(Request $request){
        

        $cart = Cart::where(['user_id' => Auth::User()->id, 'status' => 1])->first();
   
        if(!$cart){
           $cart = Cart::create(['user_id'=>Auth::user()->id , 'status' =>1]);
        }

        $course = Course::findOrFail($request->course_id);
        if($course){
            $classes = CourseChapter::where('course_id',$course->id)->count();
            if($classes == count($request->selected_classes)){
                $request->classes ='all-classes';
            }
        }

        if($request->classes =='all-classes'){
           
            $check_course = CartItem::where(['cart_id' => $cart->id , 'course_id' => $request->course_id , 'class_id' => 0])->first();
           
            if($check_course){
                return redirect()->back()->with('message','Course already in cart.');
            }
            
            CartItem::where(['cart_id' => $cart->id,'course_id' => $request->course_id])->where('class_id','>',0)->delete();

            $insert['course_id'] = $request->course_id;
            $insert['class_id'] = 0;
            $insert['category_id'] = $course->category_id;
            $insert['price'] = $course->price;
            $insert['offer_price'] = $course->offer_price;
            $insert['purchase_type'] = 'all_classes';
            $insert['cart_id'] = $cart->id;
            $insert['created_at'] = Carbon::now();
            $insert['updated_at'] = Carbon::now();

            CartItem::insert($insert);

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
                    $insert['price'] = $class->price; 
                    $insert['created_at'] = Carbon::now();
                    $insert['updated_at'] = Carbon::now();              
                    CartItem::insert($insert);
                }
            }

            return redirect()->back()->with('message','Classes added to the cart.');
        }else{

            return redirect()->back()->with('message','Please select the type of class.');
        }

    }

    public function learnerCart(){

        $carts = Cart::with('user')->where(['user_id' => Auth::User()->id, 'status' => 1])->first();
        $cartItem = [];
        $discount = 0;
        $total = 0;
        $coupon = Null;
        $coupons = [];
        
        if($carts){
            $cartItem = CartItem::with('courses','courses.user')->where('cart_id', $carts->id)->get();
            $discount = $cartItem->sum('offer_price');
            $total = $cartItem->sum('price');
            $coupon = Null;
            $coupons = Coupon::where('expirydate', '>',  Carbon::now())->get();
            if(Session::get('appliedCoupon')){
                $coupon = Coupon::findOrFail(Session::get('appliedCoupon'));
                if($coupon){
                    if($coupon->distype == 'fix'){
                        $total = $total - $coupon->amount; 
                        $discount = $coupon->amount; 
                    }else{
                        $discount = ($total * $coupon->amount) / 100;
                        $total = $total - $discount;
                    }
                }
            }
        }     

        return view('learners.pages.cart', compact('carts','discount','total','coupons','coupon','cartItem'));
    }

    public function applyCoupon($id){

        $check = Coupon::findOrFail($id);
        $cart = Cart::where(['user_id' => Auth::User()->id, 'status' =>1 ])->first();
        $total = CartItem::where('cart_id', $cart->id)->sum('price');
        if($check){

            if($check->expiry_date > Carbon::now()){

                return redirect()->back()->with('message','Coupon already expired.');

            }else if($total < $check->minamount){

                return redirect()->back()->with('message','Coupon is not applicable.');

            }else if($check->maxusage <= 0){

                return redirect()->back()->with('message','Coupon is reached max usage.');
            }

            Session::put('appliedCoupon', $id);

            return redirect()->back()->with('message','Coupon applied.');

        }else{

            return redirect()->back()->with('message', 'Coupon Not Found.');
        }

        return redirect()->back()->with('message', 'Coupon Not Found.');
      
    }

    public function applyCouponManual(Request $request){
        
        $getCouponId = Coupon::where('code', $request->coupon_name)->first();

        if($getCouponId){

            $check = Coupon::findOrFail($getCouponId->id);
        
            $total = Cart::where('user_id', Auth::user()->id)->sum('price');
    
                if($check){
    
                    if($check->expiry_date > Carbon::now()){
    
                        return redirect()->back()->with('message','Coupon already expired.');
    
                    }else if($total < $check->minamount){
    
                        return redirect()->back()->with('message','Coupon is not applicable.');
    
                    }else if($check->maxusage <= 0){
    
                        return redirect()->back()->with('message','Coupon is reached max usage.');
                    }
    
                    Session::put('appliedCoupon', $getCouponId->id);
    
                    return redirect()->back()->with('message','Coupon applied.');
    
                }else{
    
                    return redirect()->back()->with('message', 'Coupon Not Found.');
                }

        }
        
        return redirect()->back()->with('message', 'Coupon Not Found.');
    }

    public function moveToWishlist($id){

        $check = Course::findorFail($id);
        if($check){
            Session::forget('appliedCoupon');

            $cart_id = Cart::where(['user_id'=> Auth::User()->id, 'status' => 1])->pluck('id');
            if($cart_id){

                CartItem::where(['cart_id' =>  $cart_id, 'course_id' => $id])->delete();
                Session::forget('appliedCoupon');
                
            }
            
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
        $cart_id = Cart::where(['user_id'=> Auth::User()->id, 'status' => 1])->pluck('id');
        if($cart_id){

            CartItem::where(['cart_id' =>  $cart_id, 'course_id' => $id])->delete();
            Session::forget('appliedCoupon');

            return redirect()->back()->with('message','Course is removed from your cart');
        }else{
            return redirect()->back()->with('message','Cart is already empty.');
        }
       
    }

    public function cartCheckout(Request $request){

            $check = Cart::where(['user_id' => Auth::User()->id, 'status'=>1])->first();
            $cartItems = CartItem::where('cart_id', $check->id)->get();
          
            if(empty($check) || count($cartItems) == 0){
                return redirect()->back()->with('message','Your cart is empty.');
            }
            
            $price = $cartItems->sum('price');
            
            $insert['user_id'] =  Auth::User()->id;
            $insert['taxes'] = 5;

            if(Session::has('appliedCoupon'))
            {
                $coupon = Coupon::findOrFail($request->coupon_id);
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
            
            $insert['sub_total'] = $price;
            $insert['total'] = $price;
            $insert['status'] = 'payment-pending';

            $info = UserInvoiceDetail::create($insert);

            if($cartItems){
                $insertDetails['invoice_id'] = $info->id;
                foreach($cartItems as $c){
                    $insertDetails['course_id'] = $c->course_id;
                    $insertDetails['class_id'] = $c->class_id;
                    $insertDetails['purchase_type'] = $c->purchase_type;
                    $insertDetails['price'] = $c->price;
                    InvoiceDetail::create($insertDetails);
                }
            }

            Session::forget('appliedCoupon');
            // Cart::where(['user_id'=> Auth::User()->id])->update(['status'=>0]);

            return $this->stripeCheckout($info);

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

    public function stripeCheckout($order)
    {

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'inr',
                'unit_amount' => $order->total * 100,
                'product_data' => [
                  'name' => 'LILA Checkout',
                  'images' => ["https://i.imgur.com/EHyR2nP.png"],
                ],
              ],
              'quantity' => 1,
            ]],
            'customer' => Auth::user()->stripe_id,
            'customer_email' => Auth::user()->email,
            'client_reference_id' => $order->id, // Cart ID
            'mode' => 'payment',
            'metadata' => [
                'order_id' => $order->id,
            ],
            'success_url' => env('APP_URL') . "/checkout-successful/$order->id",
            'cancel_url' => env('APP_URL') . "/checkout-failure/$order->id",
          ]);
          
          $response = [
            "id" => $checkout_session->id,
        ];
        return response()->json($response, 200);
    }

    public function checkoutSuccessful($transaction_id)
    {
        $invoice = UserInvoiceDetail::where('id', $transaction_id)->first();
        return view('learners.messages.charge-successful', compact('invoice'));
    }

    public function checkoutFailed($transaction_id)
    {
        $invoice = UserInvoiceDetail::where('id', $transaction_id)->first();
        return view('learners.messages.charge-failure', compact('invoice'));
    }
    
}
