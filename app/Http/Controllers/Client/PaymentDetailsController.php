<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentDetail;
use Auth;
use Illuminate\Http\Request;

class PaymentDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.checkout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $total = $request->get('total');
        $discount = $request->get('discount');
        $feeShip = $request->get('feeShip');
        $totalPrice = $request->get('totalPrice');
        $pay = session()->get('payment', []);
        $pay['total'] = $total;
        $pay['discount'] = $discount;
        $pay['feeShip'] = $feeShip;
        $pay['totalPrice'] = $totalPrice;
        session()->put('payment', $pay);
    }

    /**
     * Display the specified resource.
     */
    public function addPaymentDetail(Request $request, $payment_method)
    {
        if(!Auth::check()) {
            return view('client.login');
        }
        
        $validated = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'province' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email'
        ]);


        $pay = session()->get('payment');
        $pay['totalPrice'] = intval(str_replace('.', '', $pay['totalPrice']));
        $order = Order::create([
            'user_id' => Auth::user()->user_id,
            'total_amount' => $pay['totalPrice'],
        ]);

        $order = Order::where('order_id', $order->order_id)->first();

        $paymentDetail = PaymentDetail::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'address' => $validated['address'],
            'province' => $validated['province'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],
            'user_id' => Auth::user()->user_id,
            'order_id' => $order->order_id,
            'method' => $payment_method
        ]);

        $paymentDetail = PaymentDetail::where('order_id', $order->order_id)->first();

        $paymentDetailSession = session()->get('paymentDetail', []);
        $paymentDetailSession['full_name'] = ($paymentDetail->first_name." ".$paymentDetail->last_name);
        $paymentDetailSession['address'] = $paymentDetail->address;
        $paymentDetailSession['province'] = $paymentDetail->province;
        $paymentDetailSession['phone_number'] = $paymentDetail->phone_number;
        $paymentDetailSession['email'] = $paymentDetail->email;
        $paymentDetailSession['orderCode'] = $order->order_code;
        $paymentDetailSession['bankId']=env('BANKID', '');
        $paymentDetailSession['bankAccount']=env('BANKACCOUNT', '');
        session()->put('paymentDetail', $paymentDetailSession);

        $cart = session()->get('cart');
        foreach ($cart as $key => $value) {
            OrderDetail::create([
                'order_id' => $order->order_id,
                'product_id' => $key,
                'quantity' => $value['quantity'],
                'unit_price' => $value['price']
            ]);
        }

        if (isset($payment_method)) {
            if ($payment_method == 'handMoney') {
                toast('Đã đặt hàng thành công!', 'success');
                return redirect()->back();
            } else {
                return view('client.scan-payment');
            }
        }
        
        toast('Thất bại! Vui lòng chọn phương thức thanh toán', 'error');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function paymentOnline(PaymentDetail $paymentDetails)
    {
        return view('client.scan-payment');
    }

    /**
     * Update the specified resource in storage.
     */

}
