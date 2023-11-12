<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogComment;

class BlogClientController extends Controller
{
    public function index(){
        return view("client.blog");
    }

    public function blog_single($blog_id){
        $blog = Blog::find($blog_id);
        return view("client.blog-singles", compact("blog"));
    }
    public function store(Request $request){

    }
}
