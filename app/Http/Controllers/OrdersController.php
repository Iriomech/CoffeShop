<?php

namespace App\Http\Controllers;

use App\Models\Order as Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // public static function sucess($id=null)
    // {
    //     if($id){
    //         $order = Orders::find($id);
    //         $order->status = 'paid';
    //         $order->save();
    //         // echo '<h1>Pedido pagado</h1>';
    //         return redirect()->route('order.sucess',$order->id);
    //     }else{
    //         return redirect(route('order.sucess'));
    //     }
    // }
}
