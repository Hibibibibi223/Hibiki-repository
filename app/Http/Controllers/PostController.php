<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post){
         // Modelで制限掛けた投稿を$posts変数に取得してビューに渡す
         //
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    public function show(Post $post){
        // ルートパラメータから暗黙の結合で取得した $post を 'posts.show' ビューに渡す
        return view('posts.show')->with(['post' => $post]);
    }
}
?>