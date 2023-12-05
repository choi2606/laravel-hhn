<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeClientController extends Controller
{
    public function index() {
        $products = Product::where('status', 1)->paginate(8);
        return view('client.index', compact('products'));
    }

    public function searchAjax(Request $request) {
        $category=Category::where('name','LIKE','%'.$request->value.'%')->first();
        if($category!=null){
            $search=Product::where('name','LIKE','%'.$request->value.'%')
                ->orWhere('selling_price', 'LIKE', "%{$request->value}%")
                ->orWhere('category_id', 'LIKE', "%{$category->id}%")
                ->limit(6)->get();
        }else{
            $search=Product::where('name','LIKE','%'.$request->value.'%')
                ->orWhere('selling_price', 'LIKE', "%{$request->value}%")
                ->limit(6)->get();
        }
        $result = view('components.searchajax', ["data" => $search])->render();

        return response()->json(['result' => $result], 200);
    }
}
