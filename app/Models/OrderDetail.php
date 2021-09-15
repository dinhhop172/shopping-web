<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orderdetails';

    protected $fillable = ['order_id', 'product_id', 'price', 'quantity', 'total'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
