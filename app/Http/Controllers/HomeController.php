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
        // if(Auth::user()->role == 'admin'){
        //     return redirect('/admin');
        // }
        // if(Auth::user()->role == 'user'){
        if (request()->has('search')) {
            $products = Product::where('name', 'like', '%' . request('search') . '%')->paginate(6)->appends('search', request('search'));
        } else {
            $products = Product::paginate(6);
        }
        return view('home', compact('products'));
        // // }
        // if(Auth::user()->role == 'employee'){
        //     return redirect('/admin');
        // }
    }

    public function cart()
    {
        $items = Cart::session(Auth::user()->id)->getContent();
        return view('cart', compact('items'));
    }

    public function payment(Request $request)
    {
        $total = Cart::session(Auth::user()->id)->getTotal();
        $payment = $request->input('payment');
        $order = Orders::create([
            'user_id' => Auth::user()->id,
            'products' => json_encode(Cart::session(Auth::user()->id)->getContent()),
            'status' => 'pending',
        ]);
        $order->save();
        if ($payment == 'credit card') {
            if(Auth::user()->paymentMethods->count() == 0){
                Orders::find($order->id)->delete();
                return redirect(route('paymentMethods.create'));
            }
            $paymentMethod_id = Auth::user()->paymentMethods->first()->stripe_id;
            Payment::createAndConfirmPaymentIntent($total,'usd',$paymentMethod_id);
            OrdersController::sucess($order->id);
        } elseif ($payment == 'cash') {
            OrdersController::sucess();
        } else {
            return redirect()->back()->with('error', 'Please select payment method');
        }
    }

    public function sucess($id = null)
    {
        $order = Orders::find($id);
        $order->status = 'sucess';
        $order->save();
        
        return view('orders/sucess', compact('order'));
    }
}
