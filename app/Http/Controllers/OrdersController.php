<?php

namespace App\Http\Controllers;

use App\Models\Order as Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public static function sucess($id=null)
    {
        $order = Orders::find($id);
        $order->status = 'sucess';
        $order->save();
        return view('orders/sucess', compact('order'));
    }
}
