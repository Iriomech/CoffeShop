<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;
class ProductsController extends Controller
{

    public static function list($number = null)
    {
        $products = ($number != null) ? Product::all()->take($number) : Product::all();
        return $products;
    }

    public function addToCart()
    {
        $product = Product::find(request('id'));
        $items = Cart::session(Auth::user()->id)->getContent();
        if(!$items->has($product->id)) {
            Cart::session(Auth::user()->id)->add($product->id, $product->name, $product->price, 1);
        }else{
            Cart::session(Auth::user()->id)->update($product->id, ['quantity' => 1]);
        }

        return back();
    }

    public function removeFromCart()
    {
        $product = Product::find(request('id'));
        Cart::session(Auth::user()->id)->remove($product->id);
        return back();
    }

    public function show()
    {
        $product = Product::find(request('id'));
        return view('products/show', compact('product'));
    }

    public function clearCart()
    {
        Cart::session(Auth::user()->id)->clear();
        return back();
    }

    public function reduceToCart()
    {
        $product = Product::find(request('id'));
        if(Cart::session(Auth::user()->id)->get($product->id)->quantity > 1) {
            Cart::session(Auth::user()->id)->update($product->id, ['quantity' => -1]);
        }else{
            Cart::session(Auth::user()->id)->remove($product->id);
        }
        return back();
    }
}
