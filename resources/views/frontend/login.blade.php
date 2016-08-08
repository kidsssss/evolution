@extends('layouts.master')

@section("title")
Đăng Nhập
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/products.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/user.css')}}">
@endsection

@section("content")

  <div class="container">
  <h3>Đăng Nhập</h3>
  <hr>
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
      <form method="post" action="{{route('frontend.post.login')}}">
        
        <div class="input-form">
          <label for="email">Email:</label><br>
          <input type="email" name="email" id="email" value="{{ old('email') }} " required>
        </div>
        <div class="input-form">
          <label for="password">Mật khẩu:</label><br>
          <input type="password" name="password" id="password" required>
        </div>
  
        <button class="btn btn-success" type="input">Đăng Nhập</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>
    </div>  
  </div>
@endsection