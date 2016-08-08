<!DOCTYPE html>
<html>
<head>
  <title>Thanh Toán</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/bootstrap.css')}}">
  <script type="text/javascript" scr="{{URL::to('src/js/bootstrap.js')}}"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/main.css')}}">
  <script type="text/javascript" src="{{URL::to('src/js/scripts.js')}}"></script>
  <script src="https://use.fontawesome.com/e0998d5f5b.js"></script>
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/checkout.css')}}">
</head>
<body>
  <ul>
    @if(Auth::check())
    <li><a href="">{{Auth::user()->real_name}}</a></li>
    <li><a href="{{route('frontend.get.logout')}}">Đăng Xuất</a></li>
    @endif
  </ul>
  <h4 style="text-align:center;margin-top:20px;"><a href="{{route('frontend.cart')}}">Quay về Giỏ Hàng</a></h4>
  <div class="container">
    <div>
    <form action="{{route('frontend.post.order')}}" method="post">
      <div class="col-md-4 info">
        <h2>Thông Tin Giao Hàng</h2>
        @if(Auth::check())
        <h5>Tài Khoản</ph5>
          <div class="from-group">
            <input type="text" name="name" placeholder="Họ Và Tên" value="{{Auth::user()->real_name}}">
          </div>
          <div class="from-group">
            <input type="tel" name="p_number" placeholder="Số Điện Thoại *" required value="{{Auth::user()->f_number}}"> 
          </div>
          <div class="from-group">
            <input type="email" name="email" placeholder="Email" value="{{Auth::user()->email}}">
          </div>
          <div class="from-group">
            <textarea name="address" rows="3" placeholder="Địa Chỉ *">{{Auth::user()->address}}</textarea>
          </div>
          <div class="from-group">
            <textarea name="note" rows="3" placeholder="Ghi Chú"></textarea>
          </div>
        @else
        <a href="{{route('frontend.get.login')}}">Dùng Tài Khoản</a>
        <hr>
        <h5>Không Cần Tài Khoản</ph5>
        
          <div class="from-group">
            <input type="text" name="name" placeholder="Họ Và Tên">
          </div>
          <div class="from-group">
            <input type="tel" name="p_number" placeholder="Số Điện Thoại *" required>
          </div>
          <div class="from-group">
            <input type="email" name="email" placeholder="Email">
          </div>
          <div class="from-group">
            <textarea name="address" rows="3" placeholder="Địa Chỉ *"></textarea>
          </div>
          <div class="from-group">
            <textarea name="note" rows="3" placeholder="Ghi Chú"></textarea>
          </div>
        @endif
      </div>
      <div class="col-md-4">
        <br>
        <h3>Phương Thức Thanh Toán</h3>
        <div class="form-group">
          <input checked="checked" type="radio" name="gateway" value="cod"><span>Thanh Toán Khi Giao Hàng(COD)</span>
        </div>
      </div>
      <div class="col-md-4 total">
        <h3>Đơn Hàng ({{$totalQty}} Sản Phẩm)</h3>
        <hr>
        @foreach($cartItems as $cartItem)
          <p>{{$cartItem->qty}} x {{$cartItem->name}} </p>
          <p><b>{{ number_format($cartItem->qty * $cartItem->price)}}đ</b></p>
          
        @endforeach
        {{count($cartItems)}}
        <input type="hidden" name="total" value="{{$totalPrice}}">
        <hr>
        <div>
          <h4>TỔNG CỘNG (Chưa tính phí vận chuyển)</h4>
          <h4>{{$totalPrice}}đ</h4>
        </div>
        <button type="sunmit" class="btn btn-success"><h4>Đặt Hàng</h4></button>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    </div>
  </div>
</body>
</html>