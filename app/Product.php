<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','slug','category_id','brand_id','price','decription','color','frame','material','lens_color','made_in'];

    public function category()
    {
      return $this->belongsTo('App\Category','category_id');
    }

    public function brand()
    {
      return $this->belongsTo('App\Brand','brand_id');
    }

    public function productImg(){
      return $this->hasMany('App\ProductImages','product_id');
    }

}
