<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateBlogController extends Controller
{
    public function index() {
        return view('admin.update_blogs');
    }

    public function store() {
        return view('admin.update_blogs');
    }
}
