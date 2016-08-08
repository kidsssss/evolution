@extends('layouts.admin-master')

@section('title')
  Đơn Hàng
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/product.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/modal.css')}}">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/order.css')}}">
@endsection

@section('page-title')
   <h3>Đơn Hàng</h3>
@endsection

@section('content')
  <div class="row">
    <div class="container">
      @foreach($orders as $order)
        <div class="order">
            <p>{{date_format($order->created_at, "d/m/Y")}}</p>
            <p>{{$order->real_name}}</p>
            <p> {{$order->email}}</p>
            <p><b>{{$order->p_number}}</b></p>
            <p><b>Địa chỉ : {{$order->address}}</b></p>
            <p><b>Thanh Toán : {{$order->gateway}}</b></p>
            <div class="order-products">
          @foreach($order->oderProducts as $outPut)
          <p>{{$outPut->qty}} x {{$outPut->product_name}}</p>  
        @endforeach
         </div>
          <p><b>Tổng Cộng: {{$order->total}}đ</b></p>
        </div>
      @endforeach

    </div>
  </div>
@endsection

@section('scripts')
 <script src="https://use.fontawesome.com/e0998d5f5b.js"></script>
@endsection