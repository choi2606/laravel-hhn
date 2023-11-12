<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.discount.add_discounts');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codeName' => 'required',
            'description' => 'required',
            'selectType' => 'required',
            'expire' => 'required',
            'discount' => 'required'
        ]);

        Discount::create([
            'expire' => $request->expire,
            'discount_code' => $request->codeName,
            'description' => $request->description,
            'type' => $request->selectType,
            'discount' => $request->discount

        ]);

        toast('Thêm mã giảm giá thành công!', 'success');
        return redirect()->back();
    }

    public function listDiscounts()
    {
        $title = 'Xóa Mã Giảm Giá!';
        $text = "Bạn có chắc muốn xóa không?";
        confirmDelete($title, $text);
        $discounts = Discount::select('discount_id', 'description', 'discount_code', 'expire', 'type','discount', DB::raw('DATEDIFF(expire, NOW()) as remainingDays'))->get();
        return view('admin.discount.list_discounts', compact('discounts'));
    }

    public function deleteDiscount($discount_id)
    {
        $rowCount = Discount::where('discount_id', $discount_id)->delete();
        if ($rowCount > 0) {
            toast('Xóa thành công!', 'success');
        } else {
            toast('Xóa thất bại!', 'error');
        }
        return redirect()->back();
    }

    public function updateDiscount($discount_id, Request $request) {
        $validated = $request->validate([
            'codeName' => 'required',
            'selectType' => 'required',
            'expire' => 'required',
            'description' => 'required',
            'discount' => 'required',
        ]);

        $discount = Discount::find($discount_id);
        $discount->discount_code = $validated['codeName'];
        $discount->type = $validated['selectType'];
        $discount->expire = $validated['expire'];
        $discount->description = $validated['description'];
        $discount->discount = $validated['discount'];

        $discount->save();

        if($discount->wasChanged()) {
            toast('Sửa thành công', 'success');
        } else {
            toast('Sửa thất bại!', 'error');
        }
        return redirect()->back();

    }

}
