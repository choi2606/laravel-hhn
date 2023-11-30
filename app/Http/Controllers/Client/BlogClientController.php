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
            ->join('users', 'blogs.user_id', '=', 'users.user_id')
            ->select('blogs.blog_id','blogs.title','blogs.text','blogs.image_url','blogs.created_at','users.user_id','users.username')
            ->paginate(5);
        return view("client.blog", compact('blogs'));
    }

    public function blog_single_model()
    {
        return view("client.blog-singles");
    }

    public function blog_single($blog_id)
    {

        $blog = DB::table('blogs')
        ->where('blog_id', $blog_id)
        ->join('users', 'blogs.user_id', '=', 'users.user_id')
        ->select('blogs.blog_id','blogs.title','blogs.text','blogs.image_url','blogs.created_at','users.user_id','users.username')
        ->first();
        // $comments = DB::table('blog_comments')
        // ->join('users', 'blog_comments.user_id', '=', 'users.user_id')
        // ->select('blog_comments.comment_id','blog_comments.unreg_username','blog_comments.text','blog_comments.image_url','blog_comments.created_at','users.user_id','users.username')
        // ->orderBy('blog_comments.created_at','desc')
        // ->get();
        $comments = DB::table('blog_comments')
        ->where('blog_id', $blog_id)
        ->leftjoin('users', 'blog_comments.user_id', '=', 'users.user_id')
        ->select('blog_comments.comment_id','blog_comments.unreg_username','blog_comments.text','blog_comments.image_url','blog_comments.created_at','users.user_id','users.username')
        ->orderBy('blog_comments.created_at','asc')
        ->get();
        return view("client.blog-singles", compact("blog","comments"));
    }
    public function store(Request $request)
    {
        //
    }
}
