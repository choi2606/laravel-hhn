<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'original_price',
        'selling_price',
        'image_url',
        'quantity',
        
    ];

    public function category() {
        return self::hasOne(Category::class, 'category_id', 'category_id');
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'product_id', 'product_id');
    }
}
