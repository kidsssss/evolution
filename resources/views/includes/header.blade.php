<!-- Header start here -->
  <div class="header">
    <div class="top-bg">
      <div class="container">
      <div class="header-top">
          <div class="logo">
            <a href="{{route('frontend.index')}}"><img src="{{URL::to('src/img/logo.jpg')}}"></a>
          </div>
          <div class="top-right">
            <ul>
              @if(Auth::check())
                @if(Auth::user()->class === 1)
                <li><a href="{{route('admin.index')}}">Admin</a></li>
                @endif
              <li><a href="{{route('frontend.user.cart',['id'=>Auth::user()->email])}}">{{Auth::user()->real_name}}</a></li>
              <li><a href="">Đăng Xuất</a></li>
            @else
              <li><a href="{{route('frontend.get.signup')}}">Đăng Ký</a></li>
              <li><a href="{{route('frontend.get.login')}}">Đăng Nhập</a></li>
            @endif
              <li><a href="{{route('frontend.cart')}}">Giỏ Hàng({{$totalQty}})</a></li>
            </ul>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
    <div class="nav">
      <div class="container">
        <div class="nav-bar">
          <ul class="menu parent">
            <li class="secret"></li>
            <li><a href="{{route('frontend.index')}}">Trang Chủ</a></li>
            <li><a href="{{Route('frontend.all.products',['address' => 'man'])}}">Kính Nam  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="child">
                @foreach($categories as $category)
                  <li><a href="{{Route('frontend.all.products',['address' => 'man','address2'=>$category->slug])}}">{{$category->name}}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="{{Route('frontend.all.products',['address' => 'woman'])}}">Kính Nữ  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="child">
                @foreach($categories as $category)
                  <li><a href="{{Route('frontend.all.products',['address' => 'woman','address2'=>$category->slug])}}">{{$category->name}}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="">Nhãn Hiệu <i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="child">
                @foreach($brands as $brand)
                  <li><a href="{{Route('frontend.all.products',['address' => $brand->slug])}}">{{$brand->name}}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="#">Giảm Giá</a></li>
            <li><a href="#">Liên Lạc</a></li>
          </ul>
        </div>
      </div>
    </div>
  
<!-- Header end here -->