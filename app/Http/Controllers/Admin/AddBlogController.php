<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class AddBlogController extends Controller
{
    public function index() {
        $blogs = Blog::all();
        return view('admin.add_blogs', compact('blogs'));
    }

    public function store(Request $request) {
        $request->validate([
            'title'=> 'required',
            'user_id' => 'required',
            'text' => 'required',
            'image_url' => 'nullable'
        ]);

        if ($request->hasFile('blogImage')) {
            $get_file_image = $request->file('blogImage');
            $get_image_name = $get_file_image->getClientOriginalName();
            $get_image_extension = $get_file_image->getClientOriginalExtension();
            $name_image = current(explode('.', $get_image_name));
            $imagePath = time() . "-" . $name_image . "." . $get_image_extension;
            $get_file_image->move('./client/images/blog', $imagePath);
        } else {
            $imagePath = null;
        }

        Blog::create([
            'user_id' => $request->user()->user_id,
            'title' => $request->title,
            'text' => $request->text,
            'image_url' => $imagePath,
        ]);
        
        return redirect()->back();
    }

    public function deleteBlog ($blog_id){
        Blog::where('product_id', $blog_id)->delete();
        $blogs = Blog::query();
        return view('admin.add_blogs');
    }
}
