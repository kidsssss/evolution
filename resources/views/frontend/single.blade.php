@extends("layouts.master")

@section("title")
{{$product->name}}
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/single.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/jquery.bxslider/jquery.bxslider.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/custom.css')}}">
@endsection

@section("content")
  <div class="detail">
    <div class="container">
      <div class="address-bar">
        <p><a href="{{route('frontend.index')}}">Trang Chủ</a> / <a href="#">{{$product->category->name}}</a></p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="img-detail">
            
            <ul class="bxslider">
              <li><img class="image" src="{!!url::to('uploads/'.$product->slug.'/'.$product->front_img) !!}"></li>
              @foreach($product->productImg as $productImg)
              <li><img class="image" src="{!!url::to('uploads/'.$product->slug.'/'.$productImg->img_name) !!}"></li>
              @endforeach
            </ul>

           <!--  <div id="bx-pager">
              <a data-slide-index="0" href=""><img src="{!!url::to('uploads/'.$product->slug.'/'.$product->front_img) !!}" /></a>
              @if($product->productImg)
              
              @foreach($product->productImg as $productImg)
              <a data-slide-index= href=""><img src="{!!url::to('uploads/'.$product->slug.'/'.$productImg->img_name) !!}"></a>
             
              @endforeach
              @endif
              
            </div>-->
          </div> 
        </div>
        <div class="col-md-6">
          <h3>{{$product->name}}</h3>
          <h4>Màu : <i>{{$product->color}}</i></h4>
          @if($product->gender === 'man')
              <h4>Nam</h4>
              @else
              <h4>Nữ</h4>
              @endif
          
          <h4><span><?php echo number_format($product->price) ?></span>đ</h4>
          <form action="{{route('frontend.post.buy')}}" method="post">
            <label for="quantity">Số Lượng</label>
            <input id="quantity" type="number" name="qty" min="1" value="1" class="tc item-quantity">
            <input type="hidden" name="product_slug" value="{{$product->slug}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit" class="btn btn-success cart">Thêm vào Giỏ</button>
          </form>
          <div class="produc-description">
            <h4>Mô Tả Sản Phẩm</h4>
            <hr>
            <div>
            <p>{{$product->description}}</p>
            </div>
            
            
            <p><b>Thông tin chi tiêt</b>:</p>
            <table>
              <tr>
                <td>Màu Sắc</td>
                <td>{{$product->color}}</td>
              </tr>
              <tr>
                <td>Kiểu Gọng</td>
                <td>{{$product->frame}}</td>
              </tr>
              <tr>
                <td>Chất Liệu</td>
                <td>{{$product->material}}</td>
              </tr>
              <tr>
                <td>Màu Len</td>
                <td>{{$product->lens_color}}</td>
              </tr>
              <tr>
                <td>Thương Hiệu</td>
                <td>{{$product->brand->name}}</td>
              </tr>
              <tr>
                <td>Xuất Xứ</td>
                <td>{{$product->made_in}}</td>
              </tr>
            </table>
          </div>
        <div class="clearfix"></div>
        </div>
      </div>
      <div class="related-product">
        <h3>Sản Phẩm Liên Quan</h3>
        <ul class="row">
        @foreach($relatedProducts as $relatedProduct)
          <a href="{{route('frontend.product',['product_slug'=>$relatedProduct->slug])}}"><li class="col-md-3">
          <img class="img-responsive" src="{{URL::to('uploads/'.$relatedProduct->slug.'/'.$relatedProduct->front_img)}}">
          </li></a>
        @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="{{URL::to('src/jquery.bxslider/jquery.bxslider.js')}}"></script>
  <script type="text/javascript">
   
      $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
      });
   
  </script>
@endsection