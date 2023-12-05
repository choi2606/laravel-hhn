<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'order_code',
        'total_amount',
        'subtotal',
    ];
    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function orderDetail() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }

    public function paymentDetails() {
        return $this->hasOne(PaymentDetail::class, 'order_id', 'order_id');
    }
}
