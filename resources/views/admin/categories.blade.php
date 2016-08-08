@extends('layouts.admin-master')

@section('title')
  Thể Loại
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/brands.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/admin/css/modal.css')}}">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@endsection

@section('page-title')
   Thể Loại
@endsection

@section('content')
  <div class="row">
  <div class="container">
    <section id="add-brand">
      <form action="{{route('admin.categories.create')}}" method="post">
        <div class="input-form">
          <label for='name'> Thể Loại: </label>
          <input type="text" name="name" id="name">
          <button type="submit" class="btn btn-success">Thêm</button>
        </div>
       <input type="hidden" name="_token" value="{{ csrf_token()  }}" >
      </form>
    </section>
    
    <section class="brands">
      @if($categories->count())
        @foreach($categories as $category)
          <article>
            <div class="brand">
              <h3>{{$category->name}}</h3>
              <div class="edit">
                <ul>



                    <!-- Button HTML (to Trigger Modal) -->
                    <a href="#myModal" class="btn btn-primary" data-toggle="modal" style="color:white" data-target=".edit-{{$category->id}}">Sửa</a>

                    <a href="#myModal" class="btn btn-danger" data-toggle="modal" style="color:white" data-target=".delete-{{$category->id}}">Xóa</a>

                    
    
                    <!-- Modal DELETE HTML -->
                   <div id="myModal" class="modal fade delete-{{$category->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Xác Nhận Xóa</h4>
                                </div>
                                <div class="modal-body">
                                    <p class="text-warning">Bạn Muốn Xóa: <b>{{$category->name}}<b></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <a href="{{route('admin.categories.delete',['category_id'=>$category->id])}}" style="color:white"><button type="button" class="btn btn-danger">Xóa</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal EDIT HTML -->
                   <div id="myModal" class="modal fade edit-{{$category->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Sửa Tên Thể Loại</h4>
                                </div>
                                
                                  <form action="{{route('admin.categories.edit')}}" method="post">
                                    <div class="modal-body">
                                      <div class="input-form"><label for="name">Thể Loại :</label>
                                      <input type="text" name="name" id="name" value="{{$category->name}}">
                                      </div>
                                    </div>
                                    <div class="modal-footer"> 
                                      <a href="#" style="color:white"><button type="submit" class="btn btn-primary">Sửa</button></a>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="category_id" value="{{$category->id}}">
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
        <h3>Không có Thể Loại</h3>
      @endif
    
    </section>
    </div>
  </div>
  <script type="text/javascript" src="{{URL::to('src/admin/js/bootstrap.js')}}"></script>
@endsection