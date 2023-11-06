<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeClientController extends Controller
{
    public function index() {
        $products = Product::where('status', 1)->paginate(8);
        return view('client.index', compact('products'));
    }

}
