@extends('layouts.admin-master')

@section('title')
  Thành Viên
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/users.css')}}">
@endsection

@section('page-title')
   Thành Viên
@endsection

@section('content')
  <div class="row">
    <div class="container">
      <div class="search">
        <input type="text" name="name">
        <button class="btn btn-success" type="submit">Tìm</button>
      </div>
      <div class="list">
        <table>
          <tr>
            <th>ID</th>
            <th>Tài Khoản</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Xóa</th>
          </tr>

          <tr>
            <td>1</td>
            <th><a href="#">kidsssss</a></th>
            <th>Vy Tiến Đạt</th>
            <th>thorngoc@gmail.com</th>
            <th>0987656790</th>
            <td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          </tr>

          <tr>
            <td>1</td>
            <th><a href="#">kidsssss</a></th>
            <th>Vy Tiến Đạt</th>
            <th>thorngoc@gmail.com</th>
            <th>0987656790</th>
            <td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          </tr>

          <tr>
            <td>1</td>
            <th><a href="#">kidsssss</a></th>
            <th>Vy Tiến Đạt</th>
            <th>thorngoc@gmail.com</th>
            <th>0987656790</th>
            <td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          </tr>

          <tr>
            <td>1</td>
            <th><a href="#">kidsssss</a></th>
            <th>Vy Tiến Đạt</th>
            <th>thorngoc@gmail.com</th>
            <th>0987656790</th>
            <td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
 <script src="https://use.fontawesome.com/e0998d5f5b.js"></script>
@endsection