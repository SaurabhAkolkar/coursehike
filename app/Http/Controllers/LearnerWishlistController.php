<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Playlist;
use App\PlaylistCourse;
use App\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LearnerWishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Cache::remember('home_categories', $seconds = 86400, function () {
            return Categories::with('subcategory')->orderBy('id', 'ASC')->get();
        });
        $cart_items = Cart::with('courses')->where("user_id", Auth::id())->get()->count();
        $wishlists = Wishlist::with('course', 'course.review', 'course.user')->where('user_id', Auth::User()->id)->where('course_id', '>', 0)->get();
        return view("newui.wishlist")
            ->with("cart_items", $cart_items)
            ->with("categories", $categories)
            ->with("wishlists", $wishlists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
        ]);

        if ($request->bundleCourse == 'true') {

            $input['course_id'] = 0;
            $input['user_id'] = Auth::user()->id;
            $input['bundle_course_id'] = $request->course_id;

            $checkWishlist = Wishlist::where(['user_id' => $input['user_id'], 'bundle_course_id' => $input['bundle_course_id']])->get();

            if (count($checkWishlist)) {
                return 'Course Already Exist in wishlist';
            } else {
                Wishlist::create($input);
            }
            return 'Added to Wishlist';

        } else {

            $input['course_id'] = $request->course_id;
            $input['user_id'] = Auth::user()->id;

            $checkWishlist = Wishlist::where(['user_id' => $input['user_id'], 'course_id' => $input['course_id']])->get();

            if (count($checkWishlist)) {
                return 'Class Already Exist in wishlist';
            } else {
                Wishlist::create($input);
            }
            return 'Added to Wishlist';
        }

    }

    public function add_to_wishlist($course_id)
    {
        $user_id = Auth::user()->id;
        $checkWishlist = Wishlist::where(['user_id' => $user_id, 'course_id' => $course_id])->get();

        if (count($checkWishlist)) {
            return 0;
        } else {
            Wishlist::create(['user_id' => $user_id, 'course_id' => $course_id]);
            return 1;
        }

    }

    public function move_to_wishlist($course_id, $cart_id)
    {
        $user_id = Auth::user()->id;
        $checkWishlist = Wishlist::where(['user_id' => $user_id, 'course_id' => $course_id])->get();

        if (count($checkWishlist)) {
            $cart = Cart::findorfail($cart_id);
            $cart->delete();
            return back()->with('message', 'Course Already Exist in wishlist');
        } else {
            Wishlist::create(['user_id' => $user_id, 'course_id' => $course_id]);
            $cart = Cart::findorfail($cart_id);
            $cart->delete();
            return back()->with('message', 'Course Moved to Wishlist');
        }
    }

    public function move_to_cart($course_id, $wishlist_id)
    {
        $user_id = Auth::user()->id;
        $checkCart = Cart::where(['user_id' => $user_id, 'course_id' => $course_id])->get();

        if (count($checkCart)) {
            $wishlist = Wishlist::findorfail($wishlist_id);
            $wishlist->delete();
            return redirect()->route("carts.index");
        } else {
            Cart::create(['user_id' => $user_id, 'course_id' => $course_id, 'status' => 1]);
            $wishlist = Wishlist::findorfail($wishlist_id);
            $wishlist->delete();
            return redirect()->route("carts.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wishlist::where(['user_id' => Auth::user()->id, 'id' => $id])->delete();

        return redirect()->back()->with('message', 'Course Removed Successfully.');
    }

    public function deletePlaylist($id)
    {

        $check = Playlist::where(['id' => $id, 'user_id' => Auth::user()->id])->first();

        if (empty($check)) {
            return redirect()->back()->with('success', 'This Playlist Cannot be deleted By You.');
        }

        Playlist::where('id', $id)->delete();

        $delete = PlaylistCourse::where('playlist_id', $id)->delete();

        return redirect()->back()->with('success', 'Playlist Deleted Successfully');
    }
}
