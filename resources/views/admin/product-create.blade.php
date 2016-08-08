@extends('layouts.admin-master')

@section('title')
  Thêm Sản Phẩm
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/product-create.css')}}">
@endsection

@section('page-title')
  Thêm Sản Phẩm
@endsection

@section('content')
  <div class="container">
    <form action="{{route('admin.products.post.create')}}" method="post" enctype="multipart/form-data">
      <div class="input-form">
        <label for="name">Tên Sản Phẩm</label>
        <input type="text" name="name" id="name">
      </div>
      <div class="input-form">
        <label for="featured">Nổi Bật</label>
        <input type="radio" name="featured" value="1" class="radio" > Có
        <input type="radio" name="featured" value="0" class="radio" checked> Không
      </div>

      <div class="input-form">
        <label for="gender">Giới Tính</label>
        <select name="gender" id="gender">
          <option value="man">Nam</option>
          <option value="woman">Nữ</option>
        </select>
        </div>

      <div class="input-form">
        <label for="category">Thể Loại</label>
        <select name="category_id" id="category">
          @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>

        <label for="brand">Thương Hiệu</label>
        <select name="brand_id" id="brand">
          @foreach($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
          @endforeach
        </select>
        </div>

        <div class="input-form">
        <label for="price">Giá</label>
        <input type="text" name="price" id="price">

        <label for="discount_rate">Giảm giá(tùy chọn)</label>
        <input type="text" name="discount_rate" id="discount_rate">
        </div>

        <div class="input-form">
        <h5><b>Mô Tả</b></h5>
        <textarea cols="100" rows="5" name="description" id="description"></textarea>
        </div>

        <div class="input-form">
        <label for="color">Màu Săc</label>
        <input type="text" name="color" id="color">
        </div>

        <div class="input-form">
        <label for="material">Chất Liệu</label>
        <input type="text" name="material" id="material">
        </div>

        <div class="input-form">
        <label for="frame">Khung Kính</label>
        <input type="text" name="frame" id="frame">
        </div>

        <div class="input-form">
        <label for="lens_color">Màu Len</label>
        <input type="text" name="lens_color" id="lens_color">
        </div>

        <div class="input-form">
        <label for="made_in">Xuất Xứ</label>
        <input type="text" name="made_in" id="made_in">
        </div>

        <div class="input-form">
          <label for="front_img">Ảnh Bìa</label>
          <input type="file" name="front_img" id="front_img">
        </div>

         <div class="input-form">
          <label for="product_img">Ảnh Sản Phẩm</label>
        <input type="file" name="product_img[]" id="product_img" multiple>
        </div>

        <button class="btn btn-success" type="submit">Thêm</button>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
  </div
@endsection