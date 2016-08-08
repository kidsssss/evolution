<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'real_name','email','p_number','address','mote',
    ];

    public function oderProducts(){
      return $this->hasMany('App\OrderProduct','order_id'); 
    }
}
