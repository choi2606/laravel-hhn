<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

session_start();
class AdminController extends Controller
{
    public function index()
    {
        $title = 'Xóa Đơn Hàng!';
        $text = "Bạn có chắc muốn xóa đơn hàng này không?";
        confirmDelete($title, $text);
        $data = Order::orderBy('created_at', 'desc')->get();
        $totalRevenue = Order::where('status', '=', 'delivering')
            ->sum('total_amount');
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $newUsers = User::where('created_at', '>=', date('Y-m-d', strtotime('-1 MONTH')))->count();
        return view('admin.index', compact('totalUsers', 'totalOrders', 'newUsers', 'data', 'totalRevenue', 'totalProducts'));
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