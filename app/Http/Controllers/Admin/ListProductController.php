<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ListProductController extends Controller
{

    public function joinSelectProduct($query)
    {
        $query->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->select(
                'categories.name as category_name',
                'products.product_id',
                'products.name as product_name',
                'products.description',
                'products.price',
                'products.quantity',
                'products.image_url'
            );
    }
    public function index(Request $request)
    {
        $title = 'Xóa Sản Phẩm!';
        $text = "Bạn có chắc muốn xóa sản phẩm này không?";
        confirmDelete($title, $text);
        $queryProduct = Product::query();
        $this->joinSelectProduct($queryProduct);
        $products = $queryProduct->paginate(10);

        if ($request->ajax()) {
            return response()->json($products);
        }
        $categories = Category::all();
        return view('admin.list_products', compact('categories', 'products'));
    }


    public function store()
    {
        return view('admin.list_products');
    }

    public function removeProduct(Request $request)
    {
        Product::where('product_id', $request->productID)->delete();
        $products = Product::query();
        $this->joinSelectProduct($products);
        $products = $products->paginate(10);
        return response()->json($products);
    }

    public function loadDataOnURLDelete() {
        $queryProduct = Product::query();
        $this->joinSelectProduct($queryProduct);
        $products = $queryProduct->paginate(10);
        return response()->json($products);
    }

    public function updateProduct(Request $request, $product_id) {

        $validated = $request->validate([
            'selectCate' => 'required',
            'productName' => 'required',
            'productDesc' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required'
        ]);

        $product = Product::find($product_id);
        $product->category_id =  $validated['selectCate'];
        $product->name =  $validated['productName'];
        $product->description = $validated['productDesc'];
        $product->price = $validated['productPrice'];
        $product->quantity = $validated['productQuantity'];

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

        if($product->wasChanged()) {
            toast('Sửa thành công!', 'success');
        } else {
            toast('Sửa thất bại!', 'error');
        }
        return redirect()->back();
    }

    public function searchProducts(Request $request) {
        $queryJoin = Product::query();
        $this->joinSelectProduct($queryJoin);
        $productQuery = $queryJoin->where(function ($query) use ($request) {
            $query->where('categories.name', "LIKE", "%$request->valueSearch%")
                ->orWhere("products.name", "LIKE", "%$request->valueSearch%")
                ->orWhere("products.description", "LIKE", "%$request->valueSearch%")
                ->orWhere("products.price", "LIKE", "%$request->valueSearch%")
                ->orWhere("products.quantity", "LIKE", "%$request->valueSearch%");
        });

        $products = $productQuery->paginate(10);
        return response()->json($products, 200);
    }

    public function sortAscendingProducts(Request $request) {
        $queryProduct = Product::query();
        $this->joinSelectProduct($queryProduct);
        $products = $queryProduct->orderBy($request->fieldName, 'asc')->paginate(10);
        return response()->json($products, 200);
    }

    public function sortDescendingProducts(Request $request) {
        $queryProduct = Product::query();
        $this->joinSelectProduct($queryProduct);
        $products = $queryProduct->orderBy($request->fieldName, 'desc')->paginate(10);
        return response()->json($products, 200);
    }
}
