@extends('layouts.master')

@section('title')
  Evolution
@endsection

@section('content')
<div class="banner">
    <div class="container">
      <div class="col-md-6"></div>
      <div class="col-md-6 banner-content">
        <h1>Kính Evolution</h1>
        <p>"Cupcake sweet lollipop pudding lollipop I love. Jelly beans jujubes I love cookie I love bear claw macaroon. Fruitcake sweet biscuit croissant jelly I love jelly-o biscuit jelly-o. Cheesecake candy canes powder cake sweet tiramisu croissant. Cake I love sweet gummies. Bonbon croissant bonbon icing marzipan I love chupa chups jelly bear claw."</p>
        <a href="#">Learn More</a>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="banner-2">
    <div class="container">
      <div class="col-md-6 col-xs-12 guy">
        <div>
          <h2><a href="#">Kính Nam</a></h2>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 girl">
        <div>
          <h2><a href="#">Kính Nữ</a></h2>
        </div>
      </div>
    </div>
  </div>

  <div class="products">
    <div class="container">
      <div class="col-md-12">
        <div class="products-info">
          <h3 style="font-weight:bold">Sản Phẩm Nổi Bật</h3>
           <br>
            <hr style="border-top:1px solid #B3B3B3">
          <div class="hot-products-info">
            <ul>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_1.jpg')}}"></a>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_2.jpg')}}"></a>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_3.jpg')}}"></a>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_4.jpg')}}"></a>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="products-info">
          <h3 style="font-weight:bold">Sản Phẩm Mới</h3>
          <br>
          <hr style="border-top:1px solid #B3B3B3">
          <div class="hot-products-info">
            <ul>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <div class="img">
                    <img class="new " src="{{URL::to('src/img/label_new.png')}}">
                    <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_5a.jpg')}}"></a>
                  </div>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <div class="img">
                    <img class="new " src="{{URL::to('src/img/label_new.png')}}">
                    <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_6a.jpg')}}"></a>
                  </div>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <div class="img">
                    <img class="new " src="{{URL::to('src/img/label_new.png')}}">
                    <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_7a.jpg')}}"></a>
                  </div>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <div class="img">
                    <img class="new " src="{{URL::to('src/img/label_new.png')}}">
                    <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_8a.jpg')}}"></a>
                  </div>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <div class="img">
                    <img class="new " src="{{URL::to('src/img/label_new.png')}}">
                    <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_9a.jpg')}}"></a>
                  </div>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <div class="img">
                    <img class="new " src="{{URL::to('src/img/label_new.png')}}">
                    <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_10a.jpg')}}"></a>
                  </div>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <div class="img">
                    <img class="new " src="{{URL::to('src/img/label_new.png')}}">
                    <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_12a.jpg')}}"></a>
                  </div>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <div class="img">
                    <img class="new " src="{{URL::to('src/img/label_new.png')}}">
                    <a href="#"><img class="img-responsive" src="{{URL::to('src/img/kinh_11a.jpg')}}"></a>
                  </div>
                  <h4>Tên Sản Phẩm</h4>
                  <p>250,000</p>
                  <button class="btn hv"><a href="#">Thêm Vào Giỏ</a></button class="btn hv">
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection