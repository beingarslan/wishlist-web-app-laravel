<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
  public function add(Request $request)
  {
      $wish = Wishlist::find($request->id); // assuming you have a Product model with id, name, description & price
      $userID = Auth::id(); // the user ID to bind the cart contents

      // add the product to cart
      \Cart::session($userID)->add(array(
          'id' => $wish->id,
          'name' => $wish->name,
          'price' => $wish->price,
          'image' => $wish->image,
          'quantity' => 1,
          'attributes' => array(),
          'associatedModel' => $wish
      ));

      Toastr::success('Success', 'Wish is added to cart');
      return redirect()->back();
      }

      public function index()
      {
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('guest.cart.index',compact('cartItems'));
      }

      public function remove(Request $request)
      {
        $cartItems = \Cart::session(auth()->id())->remove($request->id);
        return back();
      }

      public function update(Request $request)
      {
        \Cart::session(auth()->id())->update($request->id,[
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            ),
        ]);
        return back();
      }
}
