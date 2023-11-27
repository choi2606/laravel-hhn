<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailOrder;
use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentDetail;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $total = $request->get('total');
        $discount = $request->get('discount');
        $feeShip = $request->get('feeShip');
        $totalPrice = $request->get('totalPrice');
        $province = $request->get('province');
        $district = $request->get('district');
        $ward = $request->get('ward');
        if ($ward == 'Chọn phường xã') {
            $ward = '';
        }
        $pay = session()->get('payment', []);
        $pay['total'] = $total;
        $pay['discount'] = $discount;
        $pay['feeShip'] = $feeShip;
        $pay['totalPrice'] = $totalPrice;
        $pay['province'] = $province;
        $pay['district'] = $district;
        $pay['ward'] = $ward;
        session()->put('payment', $pay);
    }

    /**
     * Display the specified resource.
     */
    public function addPaymentDetail(Request $request, $payment_method)
    {
        if (!Auth::check()) {
            return view('client.login');
        }
        $validated = $request->validate([
            'receiveName' => 'required',
            'street' => 'required',
            'phoneNumber' => 'required',
        ]);


        DB::beginTransaction();

        $pay = session()->get('payment');
        $pay['totalPrice'] = intval(str_replace('.', '', $pay['totalPrice']));
        $pay['street'] = $validated['street'];
        session()->put('payment', $pay);
        try {
            $order_id = DB::table("orders")->insertGetId([
                'user_id' => Auth::user()->user_id,
                'total_amount' => $pay['totalPrice'],
                'subtotal' => $pay['totalPrice'] - $pay['total'] * 1000,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP')
            ]);

            if (!$order_id) {
                toast("failed!", "error");
                DB::rollBack();
                return redirect()->back();
            }

            $order = Order::where('order_id', $order_id)->first();

            $paymentDetail = DB::table("payment_details")->insert([
                'receive_name' => $validated['receiveName'],
                'street' => $validated['street'],
                'district' => $pay['district'],
                'province' => $pay['province'],
                'phone_number' => $validated['phoneNumber'],
                'ward' => $pay['ward'],
                'user_id' => Auth::user()->user_id,
                'order_id' => $order->order_id,
                'method' => $payment_method,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP')
            ]);

            $paymentDetail = PaymentDetail::where('order_id', $order->order_id)->first();

            $paymentDetailSession = session()->get('paymentDetail', []);
            $paymentDetailSession['receiveName'] = ($paymentDetail->receive_name);
            $paymentDetailSession['phoneNumber'] = ($paymentDetail->phone_number);
            $paymentDetailSession['street'] = $paymentDetail->street;
            $paymentDetailSession['orderCode'] = $order->order_code;
            $paymentDetailSession['bankId'] = env('BANKID');
            $paymentDetailSession['bankAccount'] = env('BANKACCOUNT');
            session()->put('paymentDetail', $paymentDetailSession);

            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                $product = DB::table("products")->where("product_id", $key)->first();
                if (!$product || $product->quantity < $value['quantity']) {
                    toast("Số lượng sản phẩm không đủ", "error");
                    DB::rollBack();
                    return redirect()->back();
                }

                $remaining = $product->quantity - $value['quantity'];
                DB::table('products')
                    ->where("product_id", $key)
                    ->update(['quantity' => $remaining]);
                DB::table("order_details")->insert([
                    'order_id' => $order->order_id,
                    'product_id' => $key,
                    'quantity' => $value['quantity'],
                    'unit_price' => $value['price'],
                    'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                    'updated_at' => DB::raw('CURRENT_TIMESTAMP')
                ]);
            }

            DB::commit();
            $data = [
                'cart' => $cart,
                'status' => 'pending',
                'code' => $order->order_code,
                'method' => $payment_method,
                'orderDate' => date_format($order->created_at, 'd/m/Y'),
                'pay' => $pay
            ];

            $send = new SendEmailOrder(Auth::user()->email, new OrderShipped($data, 'Đơn Hàng Mới', 'emails.orders.welcome'));
            dispatch($send);
            // Mail::to("Auth::user()->email")->send(new OrderShipped($data, 'Đơn Hàng Mới', 'emails.orders.welcome'));
            if (isset($payment_method)) {
                if ($payment_method == 'handMoney') {
                    toast('Đã đặt hàng thành công!', 'success');
                    session()->flush();
                    return redirect()->route('client.order');
                } else {
                    return view('client.scan-payment');
                }
            }

            toast('Thất bại! Vui lòng chọn phương thức thanh toán', 'error');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            toast('Đã xảy ra lỗi khi xử lý dữ liệu!', 'error');
            return redirect()->back();
        }



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
    public function destroy()
    {
        session()->flush();
        return redirect()->route('client.order');
    }
}
