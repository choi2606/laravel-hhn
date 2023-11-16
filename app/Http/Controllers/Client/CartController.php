<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index()
    {
        $title = 'Xóa khỏi giỏ hàng!';
        $text = "Bạn có chắc muốn xóa không?";
        confirmDelete($title, $text);
        $discounts = DiscountController::listDiscounts();
        return view('client.cart', compact('discounts'));
    }

    public function addProductToCart($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        $quantity = $request->quantity;
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "image" => $product->image_url,
                "name" => $product->name,
                "description" => $product->description,
                "price" => $product->selling_price,
                "quantity" => $quantity
            ];
            ksort($cart);
        }
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }

    public function updateProductToCart(Request $request)
    {
        $dataUpdate = $request->get('dataUpdate');
        $cart = session()->get('cart', []);
        foreach ($dataUpdate as $key => $value) {
            $cart[$key]['quantity'] = $value;
        }
        session()->put('cart', $cart);
        return response()->json(session('cart'));
    }


    public function deleteProductFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        toast('Đã xóa khỏi giỏ hàng!', 'success');
        return redirect()->back();
    }

    public function applyDiscount(Request $request)
    {
        $total = $request->get('storageTotal');
        $discount_code = $request->discountName;
        if ($discount_code == '') {
            return response()->json(['total' => $total, 'discount' => 0, 'type' => 2]);
        }
        $discount = Discount::where('discount_code', $discount_code)->where('expire', '>=', date('Y-m-d'))->first();
        if ($discount) {
            if ($discount->type == 1) {
                $total = round($total - $total * $discount->discount / 100);
            } else {
                $total = $total - $discount->discount;
            }

            if ($total < 0) {
                $total = 0;
            }
            return response()->json(['total' => $total, 'discount' => $discount->discount, 'type' => $discount->type]);
        }
        return response()->json([], 400);
    }

    public function feeTransport(Request $request){
        
    }
}
