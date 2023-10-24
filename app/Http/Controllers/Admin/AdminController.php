<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('admin.index');
        
    }

    /**
     * Display the specified resource.
     */

}