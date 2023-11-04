<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ShopClientController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('client.shop', compact('categories'));
    }

    public function store() {
        
    }
}
