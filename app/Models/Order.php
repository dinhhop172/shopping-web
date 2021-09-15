<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['customer_id', 'date_order', 'delivery_address', 'total_price', 'status', 'note'];
}
