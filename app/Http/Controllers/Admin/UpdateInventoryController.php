<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateInventoryController extends Controller
{
    public function index()  {
        return view('admin.update_inventory');
    }
}
