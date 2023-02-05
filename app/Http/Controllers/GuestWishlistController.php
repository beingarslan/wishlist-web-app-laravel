<?php

namespace App\Http\Controllers;

use Toastr;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\CategoryWishlist;
use Illuminate\Support\Facades\Auth;
use Validator;

class GuestWishlistController extends Controller
{

  public function index()
  {
    $user = Auth::user();
    if (!$user) {
      abort(403);
    }
    $categories = Category::get();
    return view('guest.wishlist.index', compact('categories', 'user'));
  }

  public function store(Request $request)
  {
    // dd($request->all());
    $user = Auth::user();
    if (!$user) {
      abort(403);
    }
    try {
      $wishlist = new Wishlist();
      $wishlist->name = $request->name;
      $wishlist->price = $request->price;
      $wishlist->repeat_purchase = $request->repeat_purchase ? $request->repeat_purchase : 0;
      $wishlist->url = $request->url;
      $wishlist->user_id = $user->id;
      if ($request->hasFile('image')) {
        $wishlist->image = $request->file('image');
      }
      $wishlist->save();
      foreach ($request->categories as $category) {
        CategoryWishlist::create([
          'wishlist_id' => $wishlist->id,
          'category_id' => $category
        ]);
      }
      Toastr::success('Wishlist added successfully', 'Success');
      return redirect()->back();
    } catch (\Exception $e) {
      Toastr::error('Something went wrong', 'Error');
      return redirect()->back();
    }
  }

  public function update(Request $request)
  {
    $user = Auth::user();
    if (!$user) {
      abort(403);
    }
    try {
      $wishlist = Wishlist::find($request->id);
      $wishlist->name = $request->name;
      $wishlist->price = $request->price;
      $wishlist->repeat_purchase = $request->repeat_purchase ? $request->repeat_purchase : 0;
      $wishlist->url = $request->url;
      $wishlist->user_id = $user->id;
      if ($request->hasFile('image')) {
        $wishlist->image = $request->file('image');
      }
      $wishlist->save();

      Toastr::success('Wishlist updated successfully', 'Success');
      return redirect()->back();
    } catch (\Exception $e) {
      Toastr::error('Something went wrong', 'Error');
      return redirect()->back();
    }
  }

  public function destroy(Request $request)
  {
    $wishlist = Wishlist::where('id', $request->id)->delete();
    return redirect()->back();
  }
}
