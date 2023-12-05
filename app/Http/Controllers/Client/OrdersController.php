<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $title = 'Hủy đơn hàng!';
        $text = "Bạn có chắc muốn hủy đơn hàng này không?";
        confirmDelete($title, $text);
        $userId = User::where('user_id', Auth::user()->user_id)->first()->user_id;
        $orders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        return view('client.order', compact('orders'));
    }

    public function cancelStatusOrder($order_id)
    {
        $order = Order::find($order_id);
        $order->status = "cancel";
        $order->save();
        $orders = Order::orderBy('created_at', 'desc')->get();
        $orderComponent = view('components.order', ['orders' => $orders])->render();
        return response()->json(["orderComponent" => $orderComponent, "code" => 200], 200);
    }

}
