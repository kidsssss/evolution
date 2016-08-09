@extends("layouts.master")

@section("title")
{{$title}}
@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/products.css')}}">
@endsection

@section("content")
  <div class="container">
    <div>
      <div class="products">
        <h2>{{$title}}</h2>
        <hr>
        <ul class="row">
        @if($products->count())
        @foreach($products as $product)
          <li class="col-md-3 col-sm-6 col-xs-12">
              <div class="product-info">
                <a href="{{route('frontend.product',['product_slug'=>$product->slug])}}"><img class="img-responsive" src="{!!url::to('uploads/'.$product->slug.'/'.$product->front_img) !!}"></a>
                <a href="{{route('frontend.product',['product_slug'=>$product->slug])}}"><h4>{{$product->name}}</h4></a>
                <p><?php echo number_format($product->price).'đ' ?></p>
                <a href="{{route('frontend.order',['product_slug'=>$product->slug])}"><button class="btn hv">Thêm Vào Giỏ</button class="btn hv"></a>
              </div>
            </li>
        @endforeach
        @else
        <h3 style="text-align:center">Không Có Sản Phẩm</h3>
        @endif
        </ul>
      </div>
    </div>  
  </div>
@endsection