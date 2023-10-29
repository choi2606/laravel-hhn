<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    public function index()
    {
        return view('admin.add_user');
    }


    public function store(Request $request)
    {
        $request->validate([
            'userName' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required'
        ]);


        User::create([
            'username' => $request->userName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone_number' => $request->phoneNumber
        ]);
        toast('Thêm người dùng thành công!', 'success');
        return redirect()->back();
    }
}
