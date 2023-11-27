<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $table = 'payment_details';
    protected $primaryKey = 'payment_detail_id';
    protected $fillable = [
        'user_id',
        'order_id',
        'receive_name',
        'street',
        'district',
        'province',
        'phone_number',
        'method'
    ];
}
