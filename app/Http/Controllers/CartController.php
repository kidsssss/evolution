<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Category;
use App\Http\Requests;
use Cart;

class CartController extends Controller
{
    public function getOrder($product_slug){
      $product = Product::where('slug',$product_slug)->first();
      Cart::add(['id'=>$product->id,'name'=>$product->name,'qty'=>1,'price'=>$product->price,'options'=>['img'=>$product->front_img,'slug'=>$product->slug]]);
      $cartItems = Cart::content();
      return redirect()->route('frontend.cart');
    }

    public function postOrder(Request $request){
      $product = Product::where('slug',$request['product_slug'])->first();
      Cart::add(['id'=>$product->id,'name'=>$product->name,'qty'=>$request['qty'],'price'=>$product->price,'options'=>['img'=>$product->front_img,'slug'=>$product->slug]]);
      $cartItems = Cart::content();
      return redirect()->route('frontend.cart');
    }

    public function getCart(){
      $categories = Category::all();
      $brands = Brand::all();
      $cartItems = Cart::content();
      $totalQty = Cart::count();
      $totalPrice = Cart::subtotal(0);
      return view('frontend.cart',['categories'=>$categories,'brands'=>$brands,'cartItems'=>$cartItems,'totalQty'=>$totalQty,'totalPrice'=>$totalPrice]);
    }

    public function getCartDelete($id){
      Cart::remove($id);
      return redirect()->back();
    }

    public function postCartUpdate(Request $request){
      if($request['qty'] == 0){
        Cart::remove($request['rawId']);
      }
      else{
        Cart::update($request['rawId'], $request['qty']);
      }
      return redirect()->back();
    }

    public function getCheckOut(){
      $cartItems = Cart::content();
      $totalQty = Cart::count();
      $totalPrice = Cart::subtotal(0);
      return view('frontend.checkout',['cartItems'=>$cartItems,'totalQty'=>$totalQty,'totalPrice'=>$totalPrice]);
    }
}
