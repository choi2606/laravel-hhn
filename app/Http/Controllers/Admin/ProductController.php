<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.product.add_products', compact('categories'));
    }


    public function addProduct(Request $request)
    {
        $request->validate([
            'selectCate' => 'required',
            'productName' => 'required',
            'productDesc' => 'required',
            'originalPrice' => 'required',
            'sellingPrice' => 'required',
            'productQuantity' => 'required',
            'status' => 'required',
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:4500'
        ]);

        switch ($request->status) {
            case 'hiện':
                $request->status = 1;
                break;
            case 'ẩn':
                $request->status = 0;
                break;
            default:
                break;
        }

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
            'status' => $request->status,
            'image_url' => $imagePath,
        ]);
        toast('Thêm sản phẩm thành công!', 'success');
        // return redirect()->back();
        $categories = Category::all();
        return view('admin.product.add_products', compact('categories'));
    }

    public function store()
    {
        return view('admin.product.list_products');

    }

    public function listProduct(Request $request)
    {
        $title = 'Xóa Sản Phẩm!';
        $text = "Bạn có chắc muốn xóa sản phẩm này không?";
        confirmDelete($title, $text);
        $queryProduct = Product::query();
        $this->joinSelectProduct($queryProduct);
        $products = $queryProduct->orderBy('products.created_at', 'desc')->paginate(10);

        if ($request->ajax()) {
            return response()->json($products);
        }
        $categories = Category::all();
        return view('admin.product.list_products', compact('categories', 'products'));
    }


    public function joinSelectProduct($query)
    {
        $query->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->select(
                'categories.name as category_name',
                'products.product_id',
                'products.name as product_name',
                'products.description',
                'products.original_price',
                'products.selling_price',
                'products.quantity',
                'products.status',
                'products.image_url'
            );
    }


    public function removeProduct(Request $request)
    {
        Product::where('product_id', $request->productID)->delete();
        $products = Product::query();
        $this->joinSelectProduct($products);
        $products = $products->orderBy('products.created_at', 'desc')->paginate(10);
        return response()->json($products);
    }

    public function loadDataOnURLDelete()
    {
        $queryProduct = Product::query();
        $this->joinSelectProduct($queryProduct);
        $products = $queryProduct->orderBy('products.created_at', 'desc')->paginate(10);
        return response()->json($products);
    }

    public function updateProduct(Request $request, $product_id)
    {

        $validated = $request->validate([
            'selectCate' => 'required',
            'productName' => 'required',
            'productDesc' => 'required',
            'originalPrice' => 'required',
            'sellingPrice' => 'required',
            'productQuantity' => 'required',
            'status' => 'required'
        ]);

        if ($validated['status'] == 'hiện') {
            $validated['status'] = 1;
        } else {
            $validated['status'] = 0;
        }

        $product = Product::find($product_id);
        $product->category_id = $validated['selectCate'];
        $product->name = $validated['productName'];
        $product->description = $validated['productDesc'];
        $product->original_price = $validated['originalPrice'];
        $product->selling_price = $validated['sellingPrice'];
        $product->quantity = $validated['productQuantity'];
        $product->status = $validated['status'];

        if ($request->hasFile('productImage')) {
            $get_file_image = $request->file('productImage');
            $get_image_name = $get_file_image->getClientOriginalName(); // Get the image name include the extension
            $get_image_extension = $get_file_image->getClientOriginalExtension(); // Get extension .jpg, .png,...
            $name_image = current(explode('.', $get_image_name));
            $imagePath = time() . "-" . $name_image . "." . $get_image_extension;
            $product->image_url = $imagePath;
            $get_file_image->move('./client/images/product', $imagePath);
        }
        $product->save();

        if ($product->wasChanged()) {
            toast('Sửa thành công!', 'success');
        } else {
            toast('Sửa thất bại!', 'error');
        }
        return redirect()->back();
    }

    public function updateStatus($product_id)
    {
        $product = Product::find($product_id);
        if ($product->status == 1) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        $product->save();
        if ($product->wasChanged()) {
            $queryProduct = Product::query();
            $this->joinSelectProduct($queryProduct);
            $products = $queryProduct->orderBy('products.created_at', 'desc')->paginate(10);
            return response()->json($products, 200);
        }
    }

    public function searchProducts(Request $request)
    {
        $queryJoin = Product::query();
        $this->joinSelectProduct($queryJoin);
        $productQuery = $queryJoin->where(function ($query) use ($request) {
            $query->where('categories.name', "LIKE", "%$request->valueSearch%")
                ->orWhere("products.name", "LIKE", "%$request->valueSearch%")
                ->orWhere("products.description", "LIKE", "%$request->valueSearch%")
                ->orWhere("products.original_price", "LIKE", "%$request->valueSearch%")
                ->orWhere("products.selling_price", "LIKE", "%$request->valueSearch%")
                ->orWhere("products.quantity", "LIKE", "%$request->valueSearch%")
                ->orWhere("products.status", "LIKE", "%$request->valueSearch%");
        });

        $products = $productQuery->orderBy('products.created_at', 'desc')->paginate(10);
        return response()->json($products, 200);
    }

    public function sortAscendingProducts(Request $request)
    {
        $queryProduct = Product::query();
        $this->joinSelectProduct($queryProduct);
        $products = $queryProduct->orderBy($request->fieldName, 'asc')->paginate(10);
        return response()->json($products, 200);
    }

    public function sortDescendingProducts(Request $request)
    {
        $queryProduct = Product::query();
        $this->joinSelectProduct($queryProduct);
        $products = $queryProduct->orderBy($request->fieldName, 'desc')->paginate(10);
        return response()->json($products, 200);
    }
}
