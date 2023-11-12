<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public static function joinOrderDetail($query)
    {
        $query->leftJoin("users", "orders.user_id", "=", "users.user_id")
            ->leftJoin('order_details', 'order_details.order_id', '=', 'orders.order_id')
            ->leftJoin('products', 'order_details.product_id', '=', 'products.product_id');
    }

    public static function joinSelectOrderDetail($query)
    {
        self::joinOrderDetail($query);
        $query->select(
            "orders.order_id",
            "orders.order_code",
            "users.username",
            "orders.status",
            "orders.total_amount",
            DB::raw("DATE_FORMAT(orders.created_at, '%d-%m-%Y') as order_date"),
            DB::raw("COUNT(order_details.order_detail_id) as total_product"),
            DB::raw("SUM(order_details.quantity) as total_quantity"),
            DB::raw('SUM(order_details.quantity * products.selling_price) as total_price'),
        )
            ->orderBy("orders.created_at", "DESC")
            ->groupBy("orders.order_id", "users.username", "orders.status", "orders.order_code", "orders.created_at", "orders.total_amount");
    }

    public function index(Request $request)
    {
        $queryOrder = Order::query();
        self::joinSelectOrderDetail($queryOrder);
        $orders = $queryOrder->get();
        return view('admin.order.list_orders', compact('orders'));
    }

    public function updateStatusOrder($order_id, Request $request)
    {
        $order = Order::find($order_id);
        $order->status = $request->status;
        $order->save();
        toast('Cập nhật thành công', 'success');
        return redirect()->back();
    }

    public function orderDetails($order_id)
    {
        $orderDetailQuery = Order::query();
        self::joinOrderDetail($orderDetailQuery);
        $orderDetailQuery = $orderDetailQuery->select(
            "users.username",
            "products.name",
            "order_details.quantity",
            "order_details.unit_price"
        )
            ->groupBy("order_details.quantity", "order_details.unit_price", "products.name", "users.username")
            ->where('orders.order_id', $order_id)->get();
        return response()->json($orderDetailQuery);
    }
}
