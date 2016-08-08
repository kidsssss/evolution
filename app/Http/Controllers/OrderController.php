<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Http\Requests;
use App\Order;
use App\OrderProduct;

class OrderController extends Controller
{
    public function postOrder(Request $request){
      $order = new Order;
      $order->real_name = $request['name'];
      $order->email = $request['email'];
      $order->address = $request['address'];
      $order->p_number = $request['p_number'];
      $order->note = $request['note'];
      $order->gateway = $request['gateway'];
      $order->total = $request['total'];
      $order->save();

      $id = $order->id;
      $cartItems = Cart::content();
      foreach ($cartItems as $cartItem) {
        $order_product = new OrderProduct();
         $order_product->product_name = $cartItem->name;
         $order_product->product_id = $cartItem->id;
         $order_product->product_slug = $cartItem->options->slug;
         $order_product->qty = $cartItem->qty;
         $order_product->order_id = $id;
         $order_product->save();
       }
       Cart::destroy();
       return redirect()->route('frontend.cart')->with(['message'=>'Mua Hàng Thành Công','type'=>'success']);
    }

    public function getUserCart($e)
    {
      $orders = Order::where('email',$e)->get();
      return view('frontend.user',['orders'=>$orders]);
    }

    public function getOrderAdmin(){
      $orders = Order::orderBy('created_at','DESC')->get();
      return view('admin.order',['orders'=>$orders]);
    }
}
