<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopClientController extends Controller
{
    public function index() {
        $categories = Category::all();
        $products = Product::paginate(8);
        $selectedCategory = null;
        return view('client.shop', compact('categories', 'products','selectedCategory'));
    }

    public function getProductsByCategory($category_id)
    {
        $categories = Category::all();
        if ($category_id == 0) {
            $products = Product::paginate(8);
            $selectedCategory = null;
            return view('client.shop', compact('categories', 'products','selectedCategory'));
        } else {
        $products = Product::where('category_id', $category_id)->paginate(8);
        $selectedCategory  = Category::find($category_id);

        return view('client.shop', compact('categories','products','selectedCategory'));
        }
    }

    public function searchByName(Request $request)
    {
        $name = $request->input('name');
        $selectedCategory = null;
        $categories = Category::all();

        $products = Product::where('name', 'like', "%$name%")->paginate(8);

        return view('client.shop', compact('name','products','selectedCategory','categories'));
    }
}
