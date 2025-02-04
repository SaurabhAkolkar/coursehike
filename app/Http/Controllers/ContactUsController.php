<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Contact;
use App\Categories;
use App\Cart;
use Auth;

class ContactUsController extends Controller
{
	public function contact_us(){
		$categories = Cache::remember('home_categories', $seconds = 86400, function () {
            return Categories::with('subcategory')->orderBy('id', 'ASC')->get();
		});
        $carts = Cart::where("user_id", Auth::id())->get()->count();
		$data = [
            'categories' => $categories,
            'cart_items' => $carts,
        ];

        return view("newui.contact_us")->with($data);
		
	}
	public function index()
	{
		$items = Contact::all();
    	return view('admin.contact.index',compact('items'));
	}

	public function edit($id)
	{
    	$show = Contact::where('id', $id)->first();
    	return view('admin.contact.view',compact('show'));
	}

	public function update(Request $request, $id)
	{
		$data = Contact::findorfail($id);
        $input = $request->all();
        $data->update($input);

		return redirect()->route('usermessage.index');
	}

	public function destroy($id)
	{
		Contact::where('id',$id)->delete();
        return redirect()->route('usermessage.index');
	}

    public function usermessage(Request $request)
    {	
    	$data = $this->validate($request,[
            'user_id' => 'required',
            'fname' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required',
        ]);

        $input = $request->all();
        $data = Contact::create($input);
        $data->save();
        
        
        return back()->with('success','Message send successfully!');
	}
	
	public function contactUs(Request $request)
    {	

    	$data = $this->validate($request,[
            'fname' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required',
		]);

		if(Auth::check()){	
			$request->user_id = Auth::user()->id;
		}

        $input = $request->all();
        $data = Contact::create($input);
        $data->save();
    
        return back()->with('success','We will get back to you!');
	}
	
}
