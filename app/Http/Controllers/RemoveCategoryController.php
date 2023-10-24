<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RemoveCategoryController extends Controller
{
    public function remove_category($category_idSelect)
    {
        $rowCount = DB::table('categories')->where('category_id', $category_idSelect)->delete();
        $categories = DB::table('categories')->get();
        if ($rowCount > 0) {
            return response()->json($categories);
        } else {
            return response()->json($categories, 404);
        }
    }
}
