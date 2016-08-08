@extends('layouts.admin-master')

@section('title')
  Sản Phẩm
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/product.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/modal.css')}}">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@endsection

@section('page-title')
   <h3>Sản Phẩm</h3>
@endsection

@section('content')
  <div class="row">
    <div class="container">
      <div class="add">
        <h4><a href="{{route('admin.products.get.create')}}">Thêm Sản Phẩm <i class="fa fa-plus-circle" aria-hidden="true"></i></a></h4>
      </div>

      <div class="search">
        <form action="" method="get">
          <input type="text" name="name">
          <button  class="btn btn-success" type="submit">Tìm</button>
        </form>
      </div>
    @if($products->count())
      <div class="list">
        <table>
          <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Thể Loại</th>
            <th>Thương Hiệu</th>
            <th>Giá</th>
            <th>Giảm Giá</th>
            <th>Nổi Bật</th>
            <th>Xóa</th>
          </tr>
          @foreach($products as $product)
          <tr>
            <td>{{$product->id}}</td>
            <td><a href="{{route('admin.products.get.edit',['product_id'=>$product->id])}}">{{$product->name}} <i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->brand->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->discount_rate}} %</td>
            <td>{{$product->featured}}</td>
            <td>

               <!-- Button HTML (to Trigger Modal) -->
              <a href="#myModal" data-toggle="modal" style="color:red" data-target=".delete-{{$product->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>

               <!-- Modal DELETE HTML -->
                <div id="myModal" class="modal fade delete-{{$product->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Xác Nhận Xóa</h4>
                      </div>
                      <div class="modal-body">
                        <p class="text-warning">Bạn Muốn Xóa: <b>{{$product->name}}<b></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="{{route('admin.products.delete',['product_id'=>$product->id])}}" style="color:white"><button type="button" class="btn btn-danger">Xóa</button></a>
                      </div>
                     </div>
                    </div>
                  </div>

            </td>
          </tr>
          @endforeach
        </table>
      </div>
    @else
      <h3>Không Có Sản Phẩm</h3>
    @endif
    </div>
  </div>
@endsection

@section('scripts')
 <script src="https://use.fontawesome.com/e0998d5f5b.js"></script>
@endsection