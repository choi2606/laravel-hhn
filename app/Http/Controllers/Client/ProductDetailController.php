<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index($product_id)
    {
        $product = Product::find($product_id);
        $products = Product::paginate(4);
        return view("client.product-detail", compact("product", "products"));
    }
}
