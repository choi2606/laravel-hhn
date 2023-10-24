<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequests;
use App\Models\User;
class RegisterUserController extends Controller
{
    public function index()
    {
        return view("client.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterUserRequests $request)
    {
        $validated = $request->validated();
        User::create($validated);
        return redirect('login');
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
}
