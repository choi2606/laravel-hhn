<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
    ];
    protected $primaryKey = 'category_id';
    public $timestamps = false;
    public function produtcs()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}
