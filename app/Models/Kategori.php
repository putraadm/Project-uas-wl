<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_kategori'];

    public function produk(){
        return $this->hasMany(Product::class, 'id_kategori', 'id');
    }
}
