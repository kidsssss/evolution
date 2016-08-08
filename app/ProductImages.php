<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{   

    protected $table = 'detail_images';

    protected $fillable=(['img_name','product_id']);

    public function product(){
      return $this->belongsTo('App/Product','product_id');
    }
}
