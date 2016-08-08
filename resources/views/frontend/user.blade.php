<!DOCTYPE html>
<html>
<head>
  <title>{{Auth::user()->real_name}}</title>
</head>
<body>
@foreach($orders as $order)
  <div style="border:1px solid">
    @foreach($order->oderProducts as $orderProduct)
      <p>{{$orderProduct->qty}} X {{$orderProduct->product_name}}</p>
    @endforeach
    <p>Tiền :{{$order->total}}</p>
  </div>
@endforeach

</body>
</html>