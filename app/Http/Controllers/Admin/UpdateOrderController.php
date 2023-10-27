<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateOrderController extends Controller
{
    public function index()
    {
        $orders = Order::leftJoin("users", "orders.user_id", "=", "users.user_id")
            ->leftJoin("order_details", "order_details.order_id", "=", "orders.order_id")
            ->leftJoin("products", "order_details.product_id", "=", "products.product_id")
            ->select(
                "orders.order_id",
                "users.username",
                "orders.status",
                "orders.order_date",
                DB::raw("COUNT(order_details.order_detail_id) as total_product"),
                DB::raw("SUM(order_details.quantity) as quantity"),
                DB::raw("SUM(order_details.quantity * products.price) as total_price"),
                DB::raw("SUM(order_details.quantity * order_details.unit_price) as total_money"),
            )
            ->groupBy("orders.order_id", "users.username", "orders.status", "orders.order_date")
            ->get();
        return view('admin.update_orders', compact('orders'));
    }

    public function updateStatusOrder($order_id) {
        $order = Order::find($order_id);
    }
}
