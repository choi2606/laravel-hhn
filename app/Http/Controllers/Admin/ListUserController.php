<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListUserController extends Controller
{


    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.user.list_users', compact('users'));
    }
}
