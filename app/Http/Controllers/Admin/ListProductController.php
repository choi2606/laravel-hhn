<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListProductController extends Controller
{
    public function index() {
        return view('admin.list_products');
    }


    public function store() {
        return view('admin.list_products');
    }
}
