<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['order_id', 'product_id', 'harga', 'jumlah', 'total'];
    
    public function order() {
        return $this->belongsTo(Order::class);
    }
    public function product() {
        return $this->belongsTo(Product::class); 
    }
}
