<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;

class CategoryController extends Controller
{
  public function getCategoryIndex(){
    $categories = Category::get();
    return view('admin.categories',['categories'=>$categories]);
  }

  public function postCreateCategory(Request $request){
    $this->validate($request,[
        'name' => 'required|unique:categories'
      ]);
    $category = new Category;
    $category->name = $request['name'];
    $category->slug = str_slug($category->name);
    if($category->save()){
      return redirect()->route('admin.categories')->with(['message'=>'Thành Công','type'=>'success']);
    }
    return redirect()->route('admin.category')->with(['message'=>'không Thành Công','type'=>'danger']);
  }

  public function getDeleteCategory($category_id){
    $category = Category::find($category_id);
    $category->delete();
    return redirect()->route('admin.categories')->with(['message' => 'Xóa Thành Công','type' => 'success']);
  }

  public function postEditCategory(Request $request){
    $this->validate($request,[
      'name' => 'required|unique:categories',
      ]);
    $category = Category::find($request['category_id']);
    if(!$category){
      return redirect()->route('admin.categories')->with(['message'=>'Không Tìm Thấy Thể Loại','type'=>'danger']);
    }
    $category->name = $request['name'];
    $category->save();
    return redirect()->route('admin.categories')->with(['message'=>'Sửa Thành Công','type'=>'success']);
  }
}
