<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    protected $table = "blog_comments";
    protected $fillable = [
        'user_id',
        'blog_id',
        'text',
        'image_url'
    ] ;
    protected $primaryKey = 'comment_id';
}
