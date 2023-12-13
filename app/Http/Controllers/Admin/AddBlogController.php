<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class AddBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(5);
        $record_count = Blog::count();
        return view('admin.blog.add_blogs', compact('blogs', 'record_count'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'blogTitle' => 'required',
            'blogContent' => 'required',
            'blogImage' => 'image|max:2048'
        ]);

        if ($request->hasFile('blogImage')) {
            $get_file_image = $request->file('blogImage');
            $get_image_name = $get_file_image->getClientOriginalName();
            $get_image_extension = $get_file_image->getClientOriginalExtension();
            $name_image = current(explode('.', $get_image_name));
            $imagePath = time() . "-" . $name_image . "." . $get_image_extension;
            $get_file_image->move('./client/images/blog', $imagePath);
        } else {
            $imagePath = "placeholder.png";
        }

        Blog::create([
            'title' => $request->blogTitle,
            'user_id' => $request->user()->user_id,
            'text' => $request->blogContent,
            'image_url' => $imagePath,
        ]);

        return redirect()->back();
    }

    public function updateBlog(Request $request)
    {
        $request->validate([
            'blogID' => 'required',
            'blogTitleUpdate' => 'required',
            'blogContentUpdate' => 'required',
            'blogImageUpdate' => 'image|max:2048'
        ]);

        if ($request->blogID == 0)
            return redirect()->back();

        if ($request->hasFile('blogImageUpdate')) {
            $get_file_image = $request->file('blogImageUpdate');
            $get_image_name = $get_file_image->getClientOriginalName();
            $get_image_extension = $get_file_image->getClientOriginalExtension();
            $name_image = current(explode('.', $get_image_name));
            $imagePath = time() . "-" . $name_image . "." . $get_image_extension;
            $get_file_image->move('./client/images/blog', $imagePath);

            Blog::where('blog_id', $request->blogID)->update([
                'title' => $request->blogTitleUpdate,
                'text' => $request->blogContentUpdate,
                'image_url' => $imagePath,
            ]);
        } else {
            Blog::where('blog_id', $request->blogID)->update([
            'title' => $request->blogTitleUpdate,
            'text' => $request->blogContentUpdate,
        ]);}

        return redirect()->back();
    }

    public function deleteBlog($blog_id)
    {
        Blog::where('blog_id', $blog_id)->delete();
        return redirect()->back();
    }
}
