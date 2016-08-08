<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\User;
use App\Http\Requests;
use Auth;
use Cart;

class UserController extends Controller
{
    public function getSignUp()
    {
      $categories = Category::all();
      $brands = Brand::all();
      $totalQty = Cart::count();
      return view('frontend.signup',['brands'=>$brands,'categories'=>$categories,'totalQty'=>$totalQty]);
    }

    public function postSignUp(Request $request){
      $this->validate($request,[
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'password2' => 'required|min:6',
        'real_name' => 'required',
        'p_number' => 'required|numeric',
        'address' => 'required',
        ]);
      if($request['password'] !== $request['password2']){
        return redirect()->route('frontend.get.signup')->with(['message'=>'Mật khẩu không khớp','type'=>'danger']);
      }
      $user = new User();
      $user->real_name = $request['real_name'];
      $user->address = $request['address'];
      $user->password = bcrypt($request['password']);
      $user->email = $request['email'];
      $user->f_number = $request['p_number'];
      if ($user->save()) {
        return redirect()->route('frontend.get.login')->with(['message'=>'Thành công','type'=>'success']);
      }
      return redirect()->route('frontend.get.signup')->with(['message'=>'Không Thành công','type'=>'danger']);
    }

    public function getLogIn()
    {
      $totalQty = Cart::count();
      $categories = Category::all();
      $brands = Brand::all();
      return view('frontend.login',['brands'=>$brands,'categories'=>$categories,'totalQty'=>$totalQty]);
    }

    public function postLogIn(Request $request){
      $this->validate($request,[
        'email' =>'required',
        'password' => 'required',
        ]);
      if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        return redirect()->route('frontend.index');
      }
      return redirect()->back();
    }

    public function getLogOut(){
      Auth::logout();
      return redirect()->route('frontend.index');
    }
}
