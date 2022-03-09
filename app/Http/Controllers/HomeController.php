<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order as Orders;
use App\Models\Product;
use App\MyServices\Facades\Payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // If the search query is not empty, then search for the product.
        if (request()->has('search')) {
            $products = Product::where('name', 'like', '%' . request('search') . '%')->paginate(6)->appends('search', request('search'));
        } else {
            $products = Product::paginate(6);
        }
        return view('home', compact('products'));
    }

    public function cart()
    {
        // Get the cart instance.
        $items = Cart::session(Auth::user()->id)->getContent();
        return view('cart', compact('items'));
    }

    public function payment(Request $request)
    {
        // Coge el total de la compra
        $total = Cart::session(Auth::user()->id)->getTotal();
        $payment = $request->input('payment');
        // Crea el pedido
        $order = Orders::create([
            'user_id' => Auth::user()->id,
            'products' => json_encode(Cart::session(Auth::user()->id)->getContent()),
            'status' => 'pending',
        ]);
        $order->save();
        if ($payment == 'credit card') {
            // Redirecciona a la pagina de crear tarjeta de credito si el usuario eligio pagar con tarjeta de credito y no tiene una tarjeta de credito asociada
            if (Auth::user()->paymentMethods->count() == 0) {
                Orders::find($order->id)->delete();
                return redirect(route('paymentMethods.create'));
            }
            // Obtiene el metodo de pago
            $paymentMethod_id = Auth::user()->paymentMethods->first()->stripe_id;
            // Realiza el pago
            Payment::createAndConfirmPaymentIntent($total, 'usd', $paymentMethod_id);
            // Actualiza el estado del pedido y borra el contenido del carrito
            $order->update(['status' => 'paid']);
            Cart::session(Auth::user()->id)->clear();
            // Redirecciona a la pagina de comfirmacion de la compra
            return redirect()->route('orders.sucess')->with([
                'order' => $order
            ]);
        } elseif ($payment == 'cash') {
            //Borra el contenido del carrito
            Cart::session(Auth::user()->id)->clear();
            // Redirecciona a la pagina de comfirmacion de la compra
            return redirect()->route('orders.sucess')->with([
                'order' => $order
            ]);
        } else {
            return redirect()->back()->with('error', 'Please select payment method');
        }
    }
}
