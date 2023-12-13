<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function store (Request $request){
        $request->validate([
            'blogID' => 'required',
            'userID' => 'required',
            'userName' => 'required',
            'userEmail' => 'required',
            'commentContent' => 'required',
        ]);

        // if ($request->hasFile('commentImage')) {
        //     $get_file_image = $request->file('commentImage');
        //     $get_image_name = $get_file_image->getClientOriginalName();
        //     $get_image_extension = $get_file_image->getClientOriginalExtension();
        //     $name_image = current(explode('.', $get_image_name));
        //     $imagePath = time() . "-" . $name_image . "." . $get_image_extension;
        //     $get_file_image->move('./client/images/blog/comment', $imagePath);
        // } else {
        //     $imagePath = "placeholder.png";
        // }

        if ($request->userID == -1){
            BlogComment::create([
                'blog_id' => $request->blogID,
                'unreg_username' => $request->userName,
                'unreg_email' => $request->userEmail,
                'text' => $request->commentContent,
            ]);
        }
        else {
            BlogComment::create([
                'blog_id' => $request->blogID,
                'user_id' => $request->userID,
                'text' => $request->commentContent,
            ]);
        }
        
        return redirect()->back();
    }
}
