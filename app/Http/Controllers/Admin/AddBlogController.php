<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AddBlogController extends Controller
{
    public function index() {
        return view('admin.add_blogs');
    }

    public function store() {
        return view('admin.add_blogs');
    }
}
