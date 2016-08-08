<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\Http\Requests;
use App\ProductImages;
use Cart;

class ProductController extends Controller
{
    

    public function getFrontendProductIndex(){
      $categories = Category::all();
      $brands = Brand::all();
      $totalQty = Cart::count();
      $featuredProducts = Product::where('featured','1')->orderByRaw('RAND()')->take(4)->get();
      $newProducts = Product::orderBy('created_at','desc')->take(8)->get();
      return view('frontend.index',['featuredProducts'=>$featuredProducts,'newProducts'=>$newProducts,'categories'=>$categories,'brands'=>$brands,'totalQty'=>$totalQty]);
    }

    public function getFrontendAllProducts($address, $address2 = null){
      $categories = Category::all();
      $brands = Brand::all();
      $totalQty = Cart::count();
      if($address === 'all'){
        $title = "Tất Cả Sản Phẩm"; 
        $products = Product::orderBy('updated_at','DESC')->get();
      }

      else if($address === 'featured'){
        $title = "Sản Phẩm Nổi bật"; 
        $products = Product::where('featured','1')->orderBy('updated_at','DESC')->get();
      }

      else if ($address === 'man') {
        $title = 'Sản Phẩm Nam';
        $products = Product::where('gender',$address)->orderBy('updated_at','DESC')->get();
        foreach ($categories as $category) {
          if ($address2 == $category->slug) {
            $products = Product::where('gender',$address)->where('category_id',$category->id)->get();
            $title = $title.' theo '.$category->name;
          }
        }
      }

      elseif ($address === 'woman') {
        $title = 'Sản Phẩm Nữ';
        $products = Product::where('gender',$address)->orderBy('updated_at','DESC')->get();
        foreach ($categories as $category) {
          if ($address2 == $category->slug) {
            $products = Product::where('gender',$address)->where('category_id',$category->id)->get();
          }
        }
      }

      foreach ($brands as $brand) {
        $totalQty = Cart::count();
        if ($address == $brand->slug) {
          $title = $brand->name;
          $products = Product::where('brand_id',$brand->id)->orderBy('updated_at')->get();
        }
      }

      return view('frontend.products',['products'=>$products,'title' => $title,'categories'=>$categories,'brands'=>$brands,'totalQty'=>$totalQty]);
    }


    public function getFrontendSingleProduct($product_slug){
      $categories = Category::all();
      $brands = Brand::all();
      $product = Product::where('slug',$product_slug)->first();
      $relatedProducts = Product::where('category_id',$product->category_id)->orderByRaw('RAND()')->take(4)->get();
      return view('frontend.single',['product'=>$product,'relatedProducts'=>$relatedProducts,'categories'=>$categories,'brands'=>$brands,'totalQty'=>$totalQty]);
    }



    ///////////////////// BACKEND /////////////////////////////////////////////////////////

    public function getProductIndex(){
      $products = Product::get();
      return view('admin.products',['products'=>$products]);
    }

    public function getCreateProduct(){
      $categories = Category::get();
      $brands = Brand::get();
      return view('admin.product-create',['categories'=>$categories,'brands'=>$brands]);
    }

    public function postCreateProduct(Request $request){
      $this->validate($request,[
        'name' => 'required|unique:products',
        'category_id' => 'required',
        'brand_id' => 'required',
        'gender' => 'required',
        'price' => 'required|numeric',
        'discount_rate' => 'numeric',
        'description' => 'required',
        'color' =>'required',
        'material' => 'required',
        'frame' => 'required',
        'front_img' =>'required',
        ]);

      $product = new Product();
      $product->name = $request->input('name');
      $product->slug = str_slug($product->name);
      $product->featured = $request->input('featured');
      $product->gender= $request->input('gender');
      $product->category_id = $request->input('category_id');
      $product->brand_id = $request->input('brand_id');
      $product->price = $request->input('price');
      $product->discount_rate = $request->input('discount_rate');
      $product->description = $request->input('description');
      $product->color = $request->input('color');
      $product->material = $request->input('material');
      $product->lens_color = $request->input('lens_color');
      $product->frame = $request->input('frame');
      $product->made_in = $request->input('made_in');
      $id = $product->id;

      $img = $request->file('front_img');
      $product->front_img = $img->getClientOriginalName();
      $product->save();
      $destinationPath = 'uploads/'.$product->slug;
      $img->move($destinationPath,$product->front_img);
      
      $id = $product->id;
      //Update multiple files
      $imgs = $request->file('product_img');
        foreach ($imgs as $img) {
          $product_img = new ProductImages();
          $product_img->product_id = $id;
          $product_img->img_name = $img->getClientOriginalName();
          $img->move($destinationPath,$product_img->img_name);
          $product_img->save();
        }

        return redirect()->route('admin.products')->with(['message'=>'Thanh Cong','type' => 'success']);
    }

    public function getDeleteProduct($product_id){
      $product = Product::find($product_id)->first();
      if(!$product){
        return redirect()->route('admin.products')->with(['message'=>'id không tồn tại','type'=>'danger']);
      }
      $name = $product->name;
      $product->delete();
      return redirect()->route('admin.products')->with(['message'=>'Thành Công '.$name,'type'=>'success']);

    }

    public function getEditProduct($product_id){
      $product = Product::find($product_id)->first();
      $categories = Category::get();
      $brands = Brand::get();
      $product_imgs = ProductImages::where('product_id',$product_id)->get() ;
      return view('admin.product-update',['categories'=>$categories,'brands'=>$brands,'product'=>$product,'product_imgs'=>$product_imgs]);
    }

    public function postEditProduct(Request $request){
      $this->validate($request,[
        'name' => 'required',
        'category_id' => 'required',
        'brand_id' => 'required',
        'price' => 'required|numeric',
        'discount_rate' => 'numeric',
        'description' => 'required',
        'color' =>'required',
        'material' => 'required',
        'frame' => 'required',
        ]);

      $product = Product::find($request['product_id']);
      $product->name = $request->input('name');
      $product->slug = str_slug($product->name);
      $product->featured = $request->input('featured');
      $product->category_id = $request->input('category_id');
      $product->brand_id = $request->input('brand_id');
      $product->price = $request->input('price');
      $product->discount_rate = $request->input('discount_rate');
      $product->description = $request->input('description');
      $product->color = $request->input('color');
      $product->material = $request->input('material');
      $product->lens_color = $request->input('lens_color');
      $product->frame = $request->input('frame');
      $product->made_in = $request->input('made_in');
      $product->save();
      return redirect()->route('admin.products')->with(['message'=>'Thành Công ','type'=>'success']);
    }
}
