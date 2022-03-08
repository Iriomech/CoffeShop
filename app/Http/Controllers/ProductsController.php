<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;
class ProductsController extends Controller
{

    public static function list($number = null)
    {
        // List all products if no number is specified. 
        $products = ($number != null) ? Product::all()->take($number) : Product::all();
        return $products;
    }

    public function addToCart()
    {
        // Add product to cart.
        $product = Product::find(request('id'));
        $items = Cart::session(Auth::user()->id)->getContent();
        // Check if the product is already in the cart.
        if(!$items->has($product->id)) {
            // If not, add it.
            Cart::session(Auth::user()->id)->add($product->id, $product->name, $product->price, 1);
        }else{
            // If it is, increase the quantity.
            Cart::session(Auth::user()->id)->update($product->id, ['quantity' => 1]);
        }

        return back();
    }

    public function removeFromCart()
    {
        // Remove product from cart.
        $product = Product::find(request('id'));
        Cart::session(Auth::user()->id)->remove($product->id);
        return back();
    }

    public function show()
    {
        // Show the product details.
        $product = Product::find(request('id'));
        return view('products/show', compact('product'));
    }

    public function clearCart()
    {
        // Clear the cart.
        Cart::session(Auth::user()->id)->clear();
        return back();
    }

    public function reduceToCart()
    {
        // Reduce the quantity of the product in the cart.
        $product = Product::find(request('id'));
        // Check if the product quantity is greater than 1.
        if(Cart::session(Auth::user()->id)->get($product->id)->quantity > 1) {
            // If it is, reduce the quantity.
            Cart::session(Auth::user()->id)->update($product->id, ['quantity' => -1]);
        }else{
            // If it is not, remove the product from the cart.
            Cart::session(Auth::user()->id)->remove($product->id);
        }
        return back();
    }
}
