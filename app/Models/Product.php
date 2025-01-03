<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_product', 'harga', 'stock', 'id_kategori'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function order() {
        return $this->hasMany(Order::class);
    }

    public function scopeFilter(Builder $query): void{
        
    }
}
