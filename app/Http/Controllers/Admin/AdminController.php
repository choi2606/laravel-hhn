<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

session_start();
class AdminController extends Controller
{
    public function index()
    {
        $title = 'Xóa Đơn Hàng!';
        $text = "Bạn có chắc muốn xóa đơn hàng này không?";
        confirmDelete($title, $text);
        $queryOrder = Order::query();
        $this->joinSelectOrderDetail($queryOrder);
        $orders = $queryOrder->get();
        $totalPrices = OrderDetail::sum(DB::raw('order_details.quantity * order_details.unit_price'));
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $newUsers = User::where('created_at', '>=', date('Y-m-d', strtotime('-1 MONTH')))->count();
        // dd($orders);
        return view('admin.index',compact('totalPrices', 'totalUsers', 'totalOrders', 'newUsers', 'orders'));
    }

    public function joinOrderDetail($query) {
        $query->leftJoin("users", "orders.user_id", "=", "users.user_id")
            ->leftJoin('order_details', 'order_details.order_id', '=', 'orders.order_id')
            ->leftJoin('products', 'order_details.product_id', '=', 'products.product_id');
    }



    public function joinSelectOrderDetail($query)
    {
            $this->joinOrderDetail($query);
            $query->select(
                "orders.order_id",
                "users.username",
                "orders.status",
                "orders.order_date",
                DB::raw("COUNT(order_details.order_detail_id) as total_product"),
                DB::raw("SUM(order_details.quantity) as total_quantity"),
                DB::raw('SUM(order_details.quantity * products.price) as total_price'),
                DB::raw('SUM(order_details.unit_price * order_details.quantity) as total_money')
            )->groupBy("orders.order_id", "users.username", "orders.status", "orders.order_date");
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