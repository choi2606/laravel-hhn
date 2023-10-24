<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    public function index() {
        return view('admin.add_products');
    }


    public function store() {
        return view('admin.add_products');
    }
}
