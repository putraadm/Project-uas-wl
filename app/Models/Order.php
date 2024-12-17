<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    Use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['nama', 'product_id', 'jumlah', 'total'];
    
    public function product() { 
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function orderDetails() { 
        return $this->hasMany(Order_details::class);
    }
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
