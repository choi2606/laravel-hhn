<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;

class CategoryDashboardController extends Controller
{
    public function index() {
        $title = 'Xóa Danh Mục!';
        $text = "Bạn có chắc muốn xóa danh mục này không?";
        confirmDelete($title, $text);
        $categories = Category::all();
        return view('admin.list_categories', compact('categories'));
    }

    public function add_category(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'string',
        ]);
        $category = Category::create($validateData);
        $categories = Category::all();
        if ($category) {
            return response()->json($categories);
        } else {
            return response()->json($categories, 400);
        }
    }

    public function remove_category($category_idSelect)
    {
        $rowCount = Category::where('category_id', $category_idSelect)->delete();
        $categories = Category::all();
        if ($rowCount > 0) {
            return response()->json($categories);
        } else {
            return response()->json($categories, 404);
        }
    }

    public function update_category($category_idSelect, Request $request)
    {
        $category = Category::find($category_idSelect);
        $category->name = $request->name;
        $category->save();
        $categories = Category::all();
        if ($category->wasChanged()) {
            return response()->json($categories);
        } else {
            return response()->json($categories, 500);
        }
    }
}
