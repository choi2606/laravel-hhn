<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('client.login');
    }

    public function store(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password], true)) {
            return redirect('/');
        } else {
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không đúng.',
            ]);
        }
    }

    public function forget() {
        return view('client.forget');
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }



}