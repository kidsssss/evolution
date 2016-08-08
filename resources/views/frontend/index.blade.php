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
          <h2><a href="{{Route('frontend.all.products',['address' => 'man'])}}">Kính Nam</a></h2>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 girl">
        <div>
          <h2><a href="{{Route('frontend.all.products',['address' => 'woman'])}}">Kính Nữ</a></h2>
        </div>
      </div>
    </div>
  </div>

  <div class="products">
    <div class="container">
      <div class="col-md-12">
        <div class="products-info">
          <a href="{{route('frontend.all.products',['address' => 'featured'])}}"><h3 style="font-weight:bold">Sản Phẩm Nổi Bật</h3></a>
            <hr style="border-top:1px solid #B3B3B3">
          <div class="hot-products-info">
            <ul>
            @foreach($featuredProducts as $featuredProduct)
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <a href="{{route('frontend.product',['product_slug'=>$featuredProduct->slug])}}"><img class="img-responsive" src="{!! 'uploads/'.$featuredProduct->slug.'/'.$featuredProduct->front_img !!}"></a>
                  <a href="{{route('frontend.product',['product_slug'=>$featuredProduct->slug])}}"><h4>{{$featuredProduct->name}}</h4></a>
                  <p><?php
                  echo number_format($featuredProduct->price).'đ';
                  ?></p>
                  <a href="{{route('frontend.order',['product_slug'=>$featuredProduct->slug])}}"><button class="btn hv">Thêm Vào Giỏ</button class="btn hv"></a>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="products-info">
          <a href="{{route('frontend.all.products',['address' => 'all'])}}"><h3 style="font-weight:bold">Sản Phẩm Mới</h3></a>
          <hr style="border-top:1px solid #B3B3B3">
          <div class="hot-products-info">
            <ul>
            @foreach($newProducts as $newProduct)
              <li class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-info">
                  <div class="img">
                    <img class="new " src="{{URL::to('src/img/label_new.png')}}">
                    <a href="{{route('frontend.product',['product_slug'=>$newProduct->slug])}}"><img class="img-responsive" src="{!! 'uploads/'.$newProduct->slug.'/'.$newProduct->front_img !!}"></a>
                  </div>
                  <a href="{{route('frontend.product',['product_slug'=>$newProduct->slug])}}"><h4>{{$newProduct->name}}</h4></a>
                  <p><?php
                  echo number_format($newProduct->price).'đ';
                  ?></p>
                  <a href="#"><button class="btn hv">Thêm Vào Giỏ</button class="btn hv"></a>
                </div>
              </li>
            @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection