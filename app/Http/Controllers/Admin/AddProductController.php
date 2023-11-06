<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.add_products', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'selectCate' => 'required',
            'productName' => 'required',
            'productDesc' => 'required',
            'originalPrice' => 'required',
            'sellingPrice' => 'required',
            'productQuantity' => 'required',
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:4500'
        ]);

        if ($request->hasFile('productImage')) {
            $get_file_image = $request->file('productImage');
            $get_image_name = $get_file_image->getClientOriginalName(); // Get the image name include the extension
            $get_image_extension = $get_file_image->getClientOriginalExtension(); // Get extension .jpg, .png,...
            $name_image = current(explode('.', $get_image_name));
            $imagePath = time() . "-" . $name_image . "." . $get_image_extension;
            $get_file_image->move('./client/images/product', $imagePath);
        } else {
            $imagePath = null;
        }
        Product::create([
            'category_id' => $request->selectCate,
            'name' => $request->productName,
            'description' => $request->productDesc,
            'original_price' => $request->originalPrice,
            'selling_price' => $request->sellingPrice,
            'quantity' => intval($request->productQuantity),
            'image_url' => $imagePath,
        ]);
        toast('Thêm sản phẩm thành công!', 'success');
        // return redirect()->back();
        $categories = Category::all();
        return view('admin.add_products', compact('categories'));
    }
}
