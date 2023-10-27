<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class UpdateOrderController extends Controller
{

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
                DB::raw('SUM(order_details.quantity * order_details.unit_price) as total_money')
            )->groupBy("orders.order_id", "users.username", "orders.status", "orders.order_date");
    }

    public function index()
    {
        $queryOrder = Order::query();
        $this->joinSelectOrderDetail($queryOrder);
        $orders = $queryOrder->get();
        return view('admin.update_orders', compact('orders'));
    }

    public function updateStatusOrder($order_id)
    {
        $order = Order::find($order_id);
        $order->status = "hoàn thành";
        $order->save();
        $queryOrder = Order::query();
        $this->joinSelectOrderDetail($queryOrder);
        $orders = $queryOrder->get();
        return response()->json($orders);
    }

    public function orderDetails($order_id)
    {
        $orderDetailQuery = Order::query();
        $this->joinOrderDetail($orderDetailQuery);
        $orderDetailQuery = $orderDetailQuery->select(
            "users.username",
            "products.name",
            "order_details.quantity",
            "order_details.unit_price")
        ->groupBy("order_details.quantity", "order_details.unit_price", "products.name", "users.username")
        ->where('orders.order_id', $order_id)->get();
        return response()->json($orderDetailQuery);
    }

   
}
