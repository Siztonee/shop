<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class WishlistController extends Controller
{
    public function getWishlistedProducts()
    {
        $items = Cart::instance('wishlist')->content();
        return view('wishlist', ['items' => $items]);
    }


    public function addProductToWishList(Request $request)
    {
        Cart::instance('wishlist')->add($request->id, $request->name, 1, $request->price)->associate('App\Models\Product');
        return response()->json([
            'status' => 200,
            'message' => 'Item successfully added to your wishlist !'
        ]);
    }


    public function removeProductFromWishlist(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->route('wishlist.list');
    }


    public function clearWishlist()
    {
        Cart::instance('wishlist')->destroy();
        return redirect()->route('wishlist.list');
    }


    public function moveToCart(Request $request)
    {
        $item = Cart::instance('wishlist')->get($request->rowId);
        Cart::instance('wishlist')->remove($request->rowId);
        Cart::instance('cart')->add($item->model->id, $item->model->name, 1, $item->model->regular_price)
            ->associate('App\Models\Product');
        return redirect()->route('wishlist.list');
    }
}
