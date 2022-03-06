<?php

namespace App\Http\Controllers;

use App\Models\Order as Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public static function sucess($id=null)
    {
        if($id){
            $order = Orders::find($id);
            $order->status = 'paid';
            $order->save();
            return redirect(route('order.sucess'))->with('order', $order);
        }else{
            return redirect(route('orders.sucess'));
        }
    }
}
