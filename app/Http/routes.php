<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Get Index
Route::get('index', [
  'uses' => 'ProductController@getFrontendProductIndex',
  'as' => 'frontend.index'
  ]);

//Get Product and Related Products
Route::get('/product/{product_slug}',[
  'uses' => 'ProductController@getFrontendSingleProduct',
  'as' => 'frontend.product'
  ]);

Route::get('products/{address}/{address2?}/',[
  'uses' => 'ProductController@getFrontendAllProducts',
  'as' => 'frontend.all.products'
  ]);


//////////ORDER///////////////

Route::get('order/{product_slug}/',[
  'uses' => 'CartController@getOrder',
  'as' => 'frontend.order'
  ]);

Route::post('order/post',[
  'uses' => 'CartController@postOrder',
  'as' => 'frontend.post.buy'
  ]);

Route::get('cart',[
  'uses' => 'CartController@getCart',
  'as' => 'frontend.cart'
  ]);

Route::get('cart/delete/{id}',[
  'uses' => 'CartController@getCartDelete',
  'as' => 'frontend.cart.delete'
  ]);

Route::post('cart/update/{id}',[
  'uses' => 'CartController@postCartUpdate',
  'as' => 'frontend.cart.update'
  ]);

Route::get('cart/checkout',[
  'uses' => 'CartController@getCheckOut',
  'as' => 'frontend.get.checkout'
  ]);

Route::post('cart/order',[
  'uses' => 'OrderController@postOrder',
  'as' => 'frontend.post.order'
  ]);


/////////////////USER//////////////////
Route::get('signup',[
  'uses' => 'UserController@getSignUp',
  'as' => 'frontend.get.signup'
  ]);

Route::post('signup',[
  'uses' => 'UserController@postSignUp',
  'as' => 'frontend.post.signup'
  ]);

Route::get('login',[
  'uses' => 'UserController@getLogIn',
  'as' => 'frontend.get.login'
  ]);

Route::post('login',[
  'uses' => 'UserController@postLogIn',
  'as' => 'frontend.post.login'
  ]);

Route::get('logout',[
  'uses' => 'UserController@getLogOut',
  'as' => 'frontend.get.logout'
  ]);

Route::get('user/cart/{e}',[
  'uses' => 'OrderController@getUserCart',
  'as' => 'frontend.user.cart'
  ]);



///////////////////////BACKEND/////////////////////////////

//Admin index
Route::group([
  'prefix'=>'admin',
  'middleware' => ['auth','admin'],
   ],function(){
  Route::get('index',[
    'uses' => 'ProductController@adminIndex',
    'as' => 'admin.index'
    ]);
//Get Brands
  Route::get('brands',[
    'uses' => 'BrandController@getBrandIndex',
    'as' => 'admin.brands'
    ]
  );
//Create Brand
  Route::post('brands',[
    'uses' => 'BrandController@postCreateBrand',
    'as' => 'admin.brands.create'
    ]);
//Delete Brand
  Route::get('brands/{brand_id}/delete',[
    'uses' => 'BrandController@getDeleteBrand',
    'as' => 'admin.brands.delete'
    ]);
//Edit Brand
  Route::post('brands/edit',[
    'uses' => 'BrandController@postEditBrand',
    'as' => 'admin.brands.edit'
    ]);
//Get Categories
  Route::get('categories',[
      'uses' => 'CategoryController@getCategoryIndex',
      'as' => 'admin.categories'
    ]
  );
//Create Category
  Route::post('categories',[
      'uses' => 'CategoryController@postCreateCategory',
      'as' => 'admin.categories.create'
    ]);
//Delete Category
  Route::get('categories/{category_id}/delete',[
      'uses' => 'CategoryController@getDeleteCategory',
      'as' => 'admin.categories.delete'
    ]);
//Edit Category
  Route::post('categories/edit',[
    'uses' => 'CategoryController@postEditCategory',
    'as' => 'admin.categories.edit'
    ]);
//Get Products
  Route::get('products',[
    'uses' => 'ProductController@getProductIndex',
    'as' => 'admin.products'
    ]);
//Create Product
  Route::get('products/create',[
    'uses' => 'ProductController@getCreateProduct',
    'as'=> 'admin.products.get.create'
     ]);

  Route::post('products/create',[
    'uses' => 'ProductController@postCreateProduct',
    'as' => 'admin.products.post.create'
    ]);
//DELETE Product
  Route::get('products/{product_id}/delete',[
    'uses' => 'ProductController@getDeleteProduct',
    'as' => 'admin.products.delete'
    ]);
//Edit Product
  Route::get('products/{product_id}/edit',[
    'uses' => 'ProductController@getEditProduct',
    'as' => 'admin.products.get.edit'
    ]);

  Route::post('products/edit',[
    'uses' => 'ProductController@postEditProduct',
    'as' => 'admin.products.post.edit'
    ]);

  Route::get('order',[
    'uses' => 'OrderController@getOrderAdmin',
    'as' => 'admin.order'
    ]);

});
