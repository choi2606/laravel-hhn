<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('admin.login_admin');
    }

    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1], true)) {
            return redirect('/admin');
        } else {
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không đúng.'
            ]);
        }
    }

    public function logout()
    {
        // Auth::logout();
        Auth::logout();
        return redirect('login-admin');
    }

}