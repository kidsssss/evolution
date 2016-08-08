@extends('layouts.master')

@section("title")
Giỏ Hàng
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/cart.css')}}">
@endsection

@section("content")

  <div class="container">
    <div class="row">
      <h3>Giỏ hàng</h3><hr>

        <div style="border:1px solid black;margin:0 20px 20px 0;" class="col-md-8">
          @foreach($cartItems as $cartItem)
            <div style=" border-bottom:1px solid #d9d9d9; padding:20px;overflow: hidden;"  class="product">
              <div class=" col-md-3 image">
                <img class="img-responsive" src="{!!url::to('uploads/'.$cartItem->options->slug.'/'.$cartItem->options->img) !!}">
              </div>
              <div  class=" col-md-7">
                <ul>
                  <li>Tên: <b>{{ $cartItem->name }}</b></li><hr>
                  <li>Giá: <i><?php echo number_format($cartItem->price).'đ';?></i></li>
                  <li><form action="{{route('frontend.cart.update',['id'=>$cartItem->rowId])}}" method="post">
                    <input type="number" name="qty" value="{{ $cartItem->qty }}">
                    <input type="hidden" name="rawId" value="{{$cartItem->rowId}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>  
                   </form></li>
                </ul>
              </div>
              <div  class=" col-md-2">
                <a class="btn btn-danger" href="{{route('frontend.cart.delete',['id'=>$cartItem->rowId])}}">Xóa <i class="fa fa-trash" aria-hidden="true"></i></a>
                
              </div>
            </div>
          @endforeach
          
        </div>
        <div style="border:1px solid black;padding:20px;" class="col-md-4 total">
          <p>Số Lượng: {{$totalQty}}</p>
          <hr>
          <p>Tổng: {{$totalPrice}}đ</p>
          <hr>
          <a href="{{route('frontend.get.checkout')}}"><button style="float:right" class="btn btn-success">Thanh Toán</button></a>
        </div>
    </div>
  </div>
@endsection