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
        return view('admin.index', [
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
            'data' => $data,
            'totalRevenue' => $totalRevenue,
            'dataCharOrderDeliver' => self::dataChartOrderDeliver(),
            'dataCharOrderCancel' => self::dataChartOrderCancel(),
            'chartTotalPrice' => self::chartTotalPrice(),
        ]);
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

    public function dataChartOrderDeliver()
    {
        $date = getdate();
        $thisYear = $date['year'];
        $charOrders = array();
        for ($i = 1; $i <= 12; $i++) {
            $charOrders[] = Order::where('status', 'delivering')->whereYear('created_at', $thisYear)->whereMonth('created_at', $i)->count();
        }
        return json_encode($charOrders);

    }

    public function dataChartOrderCancel()
    {
        $date = getdate();
        $thisYear = $date['year'];
        $charOrders = array();
        for ($i = 1; $i <= 12; $i++) {
            $charOrders[] = Order::where('status', 'cancel')->whereYear('created_at', $thisYear)->whereMonth('created_at', $i)->count();
        }
        return json_encode($charOrders);

    }

    public function chartTotalPrice()
    {
        $date = getdate();
        $thisYear = $date['year'];
        $totalPrice = array();
        for ($i = 1; $i <= 12; $i++) {
            $totalPrice[] = intval(Order::where('status', 'delivering')->whereYear('created_at', $thisYear)->whereMonth('created_at', $i)->sum('total_amount'));
        }
        return json_encode($totalPrice);

    }
}