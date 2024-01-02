<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Support\Facades\DB;

class BlogClientController extends Controller
{
    public function index()
    {
        $blogs = DB::table('blogs')
            ->leftjoin('blog_comments', 'blogs.blog_id', '=', 'blog_comments.blog_id')
            ->select('blogs.blog_id', 'blogs.title', 'blogs.text', 'blogs.image_url', 'blogs.created_at', DB::raw('count(blog_comments.blog_id) as com_count'))
            ->groupBy('blogs.blog_id', 'blogs.title', 'blogs.text', 'blogs.image_url', 'blogs.created_at')
            ->orderBy('blogs.created_at', 'desc')
            ->paginate(5);
        $category_count = DB::table('categories')
            ->join('products', 'categories.category_id', '=', 'products.category_id')
            ->select('categories.category_id', 'categories.name', DB::raw('count(*) as total'))
            ->groupBy('category_id', 'name')
            ->get();
        $randoms = DB::table('blogs')
            ->inRandomOrder()
            ->take(3)
            ->get();
        return view("client.blog", compact('blogs', 'category_count', 'randoms'));
    }

    public function blog_single_model()
    {
        return view("client.blog-singles");
    }

    public function blog_single($blog_id)
    {
        $blog = DB::table('blogs')
            ->where('blog_id', $blog_id)
            ->select('blogs.blog_id', 'blogs.title', 'blogs.text', 'blogs.image_url', 'blogs.created_at')
            ->first();
        $comments = DB::table('blog_comments')
            ->where('blog_id', $blog_id)
            ->leftjoin('users', 'blog_comments.user_id', '=', 'users.user_id')
            ->select('blog_comments.*', 'users.user_id', 'users.username')
            ->orderBy('blog_comments.created_at', 'asc')
            ->get();
        $category_count = DB::table('categories')
            ->join('products', 'categories.category_id', '=', 'products.category_id')
            ->select('categories.category_id', 'categories.name', DB::raw('count(*) as total'))
            ->groupBy('category_id', 'name')
            ->get();
        $recents = DB::table('blogs')
            ->where('blog_id', '!=', $blog_id)
            ->orderBy('blogs.created_at', 'desc')
            ->paginate(3);
        return view("client.blog-singles", compact("blog", "comments", "category_count", "recents"));
    }
    public function store(Request $request)
    {
        //
    }
}
