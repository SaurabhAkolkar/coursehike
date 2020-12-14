<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Cart;
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
    
        if($request->classes =='all'){

            $check_course = Cart::where('user_id',Auth::User()->id)->where(['course_id'=> $request->course_id, 'class_id'=>0])->first();
            
            if($check_course){
                return 'Course already in cart.';
            }
            
            $cart = Cart::where('user_id', Auth::User()->id)->where('course_id', $request->course_id)->where('class_id','>',0)->delete();

            $course = Course::findOrFail($request->course_id);
            
            $insert['user_id'] =  Auth::User()->id;
            $insert['course_id'] = $request->course_id;
            $insert['class_id'] = 0;
            $insert['category_id'] = $course->category_id;
            $insert['price'] = $course->price;
            $insert['offer_price'] = $course->offer_price;
            $insert['type'] = 0;
            Cart::insert($insert);

            return 'Course added to cart';

        }
        
    	
    }

    public function addToCart(Request $request){
        
        if($request->classes == "all-classes"){
            $check_course = Cart::where('user_id',Auth::User()->id)->where(['course_id'=> $request->course_id, 'class_id'=>0])->first();
            
            if($check_course){
                return redirect()->back()->with('message','Course already in the cart.');
            }
            $cart_total = Cart::where('user_id',Auth::User()->id)->where('course_id', $request->course_id)->where('class_id','>',0)->sum('price');

            $cart = Cart::where('user_id', Auth::User()->id)->where('course_id', $request->course_id)->where('class_id','>',0)->delete();

            $course = Course::findOrFail($request->course_id);
            
            $insert['user_id'] =  Auth::User()->id;
            $insert['course_id'] = $request->course_id;
            $insert['class_id'] = 0;
            $insert['category_id'] = $course->category_id;
            $insert['price'] = $course->price;
            $insert['offer_price'] = $course->offer_price;
            $insert['type'] = 0;
            Cart::insert($insert);

            return redirect()->back()->with('message','Course added successfully.');

        }else if($request->classes == "select-classes"){
            
            $cart = Cart::where('user_id', Auth::User()->id)->where('course_id', $request->course_id)->delete();

            $cart_total = Cart::where('user_id',Auth::User()->id)->where('course_id', $request->course_id)->where('class_id','>',0)->sum('price');


            $classes = $request->selected_classes;
            if($classes == null){
                return redirect()->back()->with('message','Please select classes to add.');
            }  
            $course = Course::findOrFail($request->course_id);
            $insert['user_id'] =  Auth::User()->id;
            $insert['course_id'] = $request->course_id;
            $insert['category_id'] = $course->category_id;
            $insert['type'] = 1;

            foreach($classes as $class){                
                $chapter = CourseChapter::findOrFail($class);
                $insert['class_id'] = $class;
                $insert['price'] = $chapter->price;               
                Cart::insert($insert);
            }

            return redirect()->back()->with('message','Classes added to the cart.');
        }else{
            return redirect()->back()->with('message','Please select the type of class.');

        }
    }

    public function learnerCart(){
        $carts = Cart::with('chapter','courses','user')->where('user_id', Auth::User()->id)->groupBy('course_id')->get();
        $discount = Cart::where('user_id', Auth::user()->id)->sum('offer_price');
        $coupons = Coupon::where('maxusage','>',0)->get();
        $total = Cart::where('user_id', Auth::user()->id)->sum('price');
        $coupon = Null;
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
        

        return view('learners.pages.cart', compact('carts','discount','total','coupons','coupon'));
    }

    public function applyCoupon($id){
        $check = Coupon::findOrFail($id);
        $total = Cart::where('user_id', Auth::user()->id)->sum('price');
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
            Cart::where(['user_id' => Auth::User()->id, 'course_id' => $id])->delete();
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
        $cart = Cart::where('course_id', '=', $id)->firstOrFail();
        $cart->delete();
        Session::forget('appliedCoupon');
        return back()->with('delete','Course is removed from your cart');
    }

    public function cartCheckout(Request $request){

        // TODO: Grab the data from course table and sanitize the data properly
        
            $cart = Cart::where('user_id', Auth::User()->id)->get();
            if(count($cart) <= 0){
                return redirect()->back()->with('message','Your cart is empty.');
            }
            // $check = UserInvoiceDetail::where(['user_id' => Auth::User()->id, 'status'=>'pending'])->update(['status'=>'failed']);

            $insert['user_id'] =  Auth::User()->id;
            $insert['sub_total'] = $request->sub_total;
            $insert['total'] = $request->total;
            $insert['taxes'] = $request->taxes;
            $insert['discount'] = $request->discount;
            $insert['discount_type'] = $request->discount_type;
            if($request->coupon_id > 0 )
            {
                $coupon = Coupon::findOrFail($request->coupon_id);
                if($coupon){
                    $insert['coupon_appied'] = $coupon->code;
                    $insert['coupon_id'] = $request->coupon_id;
                }
            }
            $insert['status'] = 'payment-pending';
            $info = UserInvoiceDetail::create($insert);

            if($cart){
                $insertDetails['invoice_id'] = $info->id;
                foreach($cart as $c){
                    $insertDetails['course_id'] = $c->course_id;
                    $insertDetails['class_id'] = $c->class_id;
                    if($c->class_id > 0){
                        $insertDetails['purchase_type'] = 'selected_class';
                    }else{
                        $insertDetails['purchase_type'] = 'course';
                    }
                    $insertDetails['price'] = $c->price;
                    InvoiceDetail::create($insertDetails);
                }
            }

            Session::forget('appliedCoupon');
            // Cart::where('user_id',Auth::User()->id)->delete();

            $this->stripeCheckout($insert);

            return redirect()->back()->with('message','Purchase Successful.');
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

    public function stripeCheckout()
    {
        $cart = Cart::where('user_id', Auth::User()->id)->first();
        // return $cart;

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'inr',
                'unit_amount' => $cart->price * 100,
                'product_data' => [
                  'name' => 'LILA Checkout',
                  'images' => ["https://i.imgur.com/EHyR2nP.png"],
                ],
              ],
              'quantity' => 1,
            ]],
            'customer_email' => Auth::user()->email,
            'client_reference_id' => 1, // Cart ID
            'mode' => 'payment',
            'metadata' => [
                'order_id' => $cart->id,
            ],
            'success_url' => env('APP_URL') . '/checkout-successful',
            'cancel_url' => env('APP_URL') . '/checkout-failure',
          ]);
          
          $response = [
            "id" => $checkout_session->id,
        ];
        return response()->json($response, 200);
    }

    public function checkoutSuccessful($transaction_id)
    {
        $invoice = Cart::where('user_id', Auth::User()->id)->first();
        return view('learners.messages.charge-successful', compact('invoice'));
    }

    public function checkoutFailed($transaction_id)
    {
        $invoice = Cart::where('user_id', Auth::User()->id)->first();
        return view('learners.messages.charge-failure', compact('invoice'));
    }
    
}
