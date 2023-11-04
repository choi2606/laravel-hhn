<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardClientController extends Controller
{
    public function index() {
        $products = Product::paginate(8);
        return view('client.index', compact('products'));
    }

}
