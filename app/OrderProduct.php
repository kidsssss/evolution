<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
      'product_id','product_name','product_slug','qty','order_id',
    ];

    public function order(){
      return $this->belongsTo('App\Order','order_id');
    }
}
