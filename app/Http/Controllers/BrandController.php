<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Http\Requests;

class BrandController extends Controller
{
  public function getBrandIndex(){
    $brands = Brand::get();
    return view('admin/brands',['brands'=>$brands]);
  }

  public function postCreateBrand(Request $request){
    $this->validate($request,[
        'name' => 'required|unique:brands'
      ]);
    $brand = new Brand();
    $brand->name = $request['name'];
    $brand->slug = str_slug($brand->name);
    if($brand->save()){
      return redirect()->route('admin.brands')->with(['message'=>'Thành Công','type'=>'success']);
    }
  }

  public function getDeleteBrand($brand_id){
    $brand = Brand::find($brand_id);
    $brand->delete();
      return redirect()->route('admin.brands')->with(['message'=>'Xóa Thành Công','type'=>'success']);
  }

  public function postEditBrand(Request $request){
    $this->validate($request,[
      'name' => 'required|unique:brands',
      ]);

    $brand = Brand::find($request['brand_id']);
    if (!$brand) {
      return redirect()->route('admin.brands')->with(['message'=>'Không Tìm Thấy Thương Hiệu','type'=>'danger']);
    }
    $brand->name = $request['name'];
    $brand->save();
    return redirect()->route('admin.brands')->with(['message'=>'Sửa Thành Công','type'=>'success']);
  }
}
