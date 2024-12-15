<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['order_id', 'product_id', 'harga', 'jumlah', 'total', 'discount'];
}
