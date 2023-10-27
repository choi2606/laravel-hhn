<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
}
