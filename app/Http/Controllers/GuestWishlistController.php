<?php

namespace App\Http\Controllers;

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
    $wishlist = $user->wishlist;


    return view('guest.wishlist.index', compact('categories', 'wishlist'));
  }

  public function store(Request $request)
  {
    $user = Auth::user();
    if (!$user) {
        abort(403);
    }
    $validated = $request->validate([
      'name' => 'required|max:200',
      'url' => 'sometimes',
      'categories' => 'required|array',
      'price' => 'required',
      'image' => 'image|mimes:jpeg,png,jpg,svg',
      'repeat' => 'sometimes'
    ]);
    $wish =  Wishlist::create([
      'name' => $request->input('name'),
      'url' => $request->input('url'),
      'image' => $request->file('image'),
      'price' => $request->input('price'),
      'repeat' => $request->input('repeat')?$request->input('repeat'):0,
  ]);
  $user->wishlist()->save($wish);
    foreach ($request->categories as $category) {
      $product =  CategoryWishlist::create([
          'category_id' => $category,
          'wishlist_id' => $wish->id
      ]);
  }
      return redirect()->back();
  }

  public function update(Request $request)
  {
    $wish = Wishlist::where('id', $request->input('id'))->first();
    if($request->hasFile('image')){
        $wish->image = $request->file('image');
    }
    $wish->name = $request->input('name');
    $wish->price = $request->input('price');
    $wish->repeat = $request->input('repeat')?$request->input('repeat'):0;
    $wish->save();
  return redirect()->back();

  }



}
