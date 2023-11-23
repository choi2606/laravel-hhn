<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order.list_orders', compact('data'));
    }

    public function updateStatusOrder($order_id, Request $request)
    {
        $order = Order::find($order_id);
        $order->status = $request->status;
        $order->save();
        toast('Cập nhật thành công', 'success');
        return redirect()->back();
    }



 
}
