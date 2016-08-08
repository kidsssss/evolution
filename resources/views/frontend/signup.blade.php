@extends('layouts.master')

@section("title")
Đăng ký
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/products.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/user.css')}}">
@endsection

@section("content")

  <div class="container">
    @if(count($errors)>0)
          <div class="alert alert-danger">
          @foreach($errors->all() as $error)
            {{$error}}<br>
          @endforeach
          </div>
        @endif
        @if(Session::has('message'))
          <div class="alert alert-{{Session::get('type')}}">
            {{Session::get('message')}}
          </div>
        @endif
    <div class="user_form">
      <form method="post" action="{{route('frontend.post.signup')}}">
        
        <div class="input-form">
          <label for="email">Email:</label><br>
          <input type="email" name="email" id="email" value="{{ old('email') }} " required>
        </div>
        <div class="input-form">
          <label for="password">Mật khẩu:</label><br>
          <input type="password" name="password" id="password" required>
        </div>
        <div class="input-form">
          <label for="password2">Nhập lại Mật khẩu:</label><br>
          <input type="password" name="password2" id="password2" required>
        </div>
        <div class="input-form">
          <label for="real_name">Họ Tên:</label><br>
          <input type="text" name="real_name" id="real_name" value="{{ old('real_name') }}" required>
        </div>
        <div class="input-form">
          <label for="address">Địa Chỉ:</label><br>
          <textarea name="address" cols="45" rows="5" id="address" required>{{ old('address') }}</textarea>
        </div>
        <div class="input-form">
          <label for="p_number">Số Điện Thoại:</label><br>
          <input type="tel" name="p_number" pattern="[0-9]*" id="p_number" value="{{ old('p_number') }}" required>
        </div>
        <button class="btn btn-success" type="input">Đăng Ký</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>
    </div>  
  </div>
@endsection