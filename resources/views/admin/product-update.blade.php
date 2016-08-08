@extends('layouts.admin-master')

@section('title')
  Thêm Sản Phẩm
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/product-create.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/product-edit.css')}}">
@endsection

@section('page-title')
  Sửa Sản Phẩm
@endsection

@section('content')
  <div class="container">
    <form action="{{route('admin.products.post.edit')}}" method="post" ">
      <div class="input-form">
        <label for="name">Tên Sản Phẩm</label>
        <input type="text" name="name" id="name" value="{{$product->name}}">
      </div>
      <div class="input-form">
        <label for="featured">Nổi Bật</label>
        <input type="radio" name="featured" value="1" class="radio" >Có
        <input type="radio" name="featured" value="0" class="radio">Không
      </div>

      <div class="input-form">
        <label for="category">Thể Loại</label>
        <select name="category_id" id="category">
          <option value="" disabled selected >{{$product->category->name}}</option>
          @foreach($categories as $category)
            <option style="color:#FA3768" value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>

        <label for="brand">Thương Hiệu</label>
        <select name="brand_id" id="brand">
        <option value="" disabled selected>{{$product->brand->name}}</option>
          @foreach($brands as $brand)
            <option style="color:#FA3768" value="{{$brand->id}}">{{$brand->name}}</option>
          @endforeach
        </select>
        </div>

        <div class="input-form">
        <label for="price">Giá</label>
        <input type="text" name="price" id="price" value="{{$product->price}}">

        <label for="discount_rate">Giảm giá(tùy chọn)</label>
        <input type="text" name="discount_rate" id="discount_rate" value="{{$product->discount_rate}}">%
        </div>

        <div class="input-form">
        <h5><b>Mô Tả</b></h5>
        <textarea cols="100" rows="5" name="description" id="description" >{{$product->description}}</textarea>
        </div>

        <div class="input-form">
        <label for="color">Màu Săc</label>
        <input type="text" name="color" id="color" value="{{$product->color}}">
        </div>

        <div class="input-form">
        <label for="material">Chất Liệu</label>
        <input type="text" name="material" id="material" value="{{$product->material}}">
        </div>

        <div class="input-form">
        <label for="frame">Khung Kính</label>
        <input type="text" name="frame" id="frame" value="{{$product->frame}}">
        </div>

        <div class="input-form">
        <label for="lens_color">Màu Len</label>
        <input type="text" name="lens_color" id="lens_color" value="{{$product->lens_colo}}r">
        </div>

        <div class="input-form">
        <label for="made_in">Xuất Xứ</label>
        <input type="text" name="made_in" id="made_in" value="{{$product->made_in}}">
        </div>

        <div class="input-form">
          <p>Ảnh Bìa</p>
          <img class="front-img" src="{!! asset('uploads/'.$product->slug.'/'.$product->front_img)  !!}">
        </div>

         <div class="input-form">
          <p>Ảnh Sản Phẩm</p>
            @foreach($product_imgs as $product_img)
            <img class="product-img" src="{!! asset('uploads/'.$product->slug.'/'.$product_img->img_name)  !!}">
            @endforeach
        </div>

        <button class="btn btn-success" type="submit">Sửa</button>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="product_id" value="{{$product->id}}">
    </form>
  </div
@endsection