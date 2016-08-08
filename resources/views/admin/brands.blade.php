@extends('layouts.admin-master')

@section('title')
  Thương Hiệu
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/brands.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/modal.css')}}">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@endsection

@section('page-title')
   Thương Hiệu
@endsection

@section('content')
  <div class="row">
  <div class="container">
    <section id="add-brand">
      <form action="{{route('admin.brands.create')}}" method="post">
        <div class="input-form">
          <label for='name'> Thương Hiệu: </label>
          <input type="text" name="name" id="name">
          <button type="submit" class="btn btn-success">Thêm</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token()  }}" >
      </form>
    </section>
    
    <section class="brands">
    @if($brands->count())
      @foreach($brands as $brand)
        <article>
          <div class="brand">
            <h3>{{$brand->name}}</h3>
            <div class="edit">
              <ul>
                
                    <!-- Button HTML (to Trigger Modal) -->
                    <a href="#myModal" class="btn btn-primary" data-toggle="modal" style="color:white" data-target=".edit-{{$brand->id}}">Sửa</a>

                    <a href="#myModal" class="btn btn-danger" data-toggle="modal" style="color:white" data-target=".delete-{{$brand->id}}">Xóa</a>

                    
    
                    <!-- Modal DELETE HTML -->
                   <div id="myModal" class="modal fade delete-{{$brand->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Xác Nhận Xóa</h4>
                                </div>
                                <div class="modal-body">
                                    <p class="text-warning">Bạn Muốn Xóa: <b>{{$brand->name}}<b></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <a href="{{route('admin.brands.delete',['brand_id'=>$brand->id])}}" style="color:white"><button type="button" class="btn btn-danger">Xóa</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal EDIT HTML -->
                   <div id="myModal" class="modal fade edit-{{$brand->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Sửa Tên Thương Hiệu</h4>
                                </div>
                                
                                  <form action="{{route('admin.brands.edit')}}" method="post">
                                    <div class="modal-body">
                                      <div class="input-form"><label for="name">Thương Hiệu :</label>
                                      <input type="text" name="name" id="name" value="{{$brand->name}}">
                                      </div>
                                    </div>
                                    <div class="modal-footer"> 
                                      <a href="#" style="color:white"><button type="submit" class="btn btn-primary">Sửa</button></a>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="brand_id" value="{{$brand->id}}">
                                  </form>
                                
                                
                            </div>
                        </div>
                    </div>
                
              </ul>
            </div>
          </div>
      </article>
      @endforeach

    @else
      <h3>Không có dữ liệu</h3>
    @endif

    </section>
    </div>
  </div>
<script type="text/javascript" src="{{URL::to('src/admin/js/bootstrap.js')}}"></script>

@endsection

