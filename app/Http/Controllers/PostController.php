<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
         // Modelで制限掛けた投稿を$posts変数に取得してビューに渡す
         //pa
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
}
?>