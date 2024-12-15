<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['order_id', 'bayar_id', 'balance', 'transac_date', 'transac_amount', 'user_id', 'payment_method'];
}
